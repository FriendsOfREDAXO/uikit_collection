#!/bin/bash

# Lokales Build-Script für UIkit mit REDAXO-Theme
# Dieses Script ermöglicht das lokale Bauen von UIkit mit dem angepassten Theme

# Farben für Konsolenausgaben
GREEN='\033[0;32m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Verzeichnisse definieren
ROOT_DIR="$(pwd)"
TEMP_DIR="${ROOT_DIR}/temp-uikit"
# Verwende die neueste Version von UIkit statt einer festen Version
UIKIT_VERSION="master"

echo -e "${BLUE}=== UIkit Build für REDAXO starten (neueste Version) ===${NC}"

# Prüfen, ob Git installiert ist
if ! command -v git &> /dev/null; then
    echo "Git ist nicht installiert. Bitte installieren Sie Git."
    exit 1
fi

# Prüfen, ob npm installiert ist
if ! command -v npm &> /dev/null; then
    echo "npm ist nicht installiert. Bitte installieren Sie Node.js und npm."
    exit 1
fi

# Temporäres Verzeichnis löschen, falls vorhanden
if [ -d "$TEMP_DIR" ]; then
    echo "Lösche vorhandenes temporäres Verzeichnis..."
    rm -rf "$TEMP_DIR"
fi

# UIkit Repository klonen
echo -e "${BLUE}Klone UIkit Repository (neueste Version)...${NC}"
git clone https://github.com/uikit/uikit.git "$TEMP_DIR"
cd "$TEMP_DIR"
# Verwende den master-Branch für die neueste Version
git checkout "$UIKIT_VERSION"

# Hole die aktuelle Version aus package.json
ACTUAL_VERSION=$(node -p "require('./package.json').version")
echo -e "${BLUE}Verwende UIkit Version: ${ACTUAL_VERSION}${NC}"

# Prüfen, ob im package.json pnpm als Abhängigkeit oder in den Scripts erwähnt wird
USE_PNPM=false
if grep -q "pnpm" package.json; then
    USE_PNPM=true
    echo -e "${BLUE}pnpm wird für diese UIkit-Version benötigt${NC}"
    
    # Prüfen, ob pnpm installiert ist
    if ! command -v pnpm &> /dev/null; then
        echo -e "${BLUE}pnpm ist nicht installiert. Installiere pnpm...${NC}"
        npm install -g pnpm
    fi
fi

# Abhängigkeiten installieren
echo -e "${BLUE}Installiere Abhängigkeiten...${NC}"
if [ "$USE_PNPM" = true ]; then
    pnpm install
else
    npm install
fi

# Unser angepasstes Theme kopieren
echo -e "${BLUE}Erstelle angepasstes Theme...${NC}"
mkdir -p custom/redaxo-theme
cp -r "${ROOT_DIR}/uikit-theme/"* custom/redaxo-theme/

# Erstelle die Hauptdatei für das Theme
cat > custom/redaxo-theme.less <<EOL
// Import UIkit core (ohne default theme)
@import "../src/less/uikit.less";

// Import redaxo-spezifische Anpassungen
@import "redaxo-theme/_import.less";
EOL

# UIkit mit angepasstem Theme bauen
echo -e "${BLUE}Kompiliere UIkit mit angepasstem Theme...${NC}"
if [ "$USE_PNPM" = true ]; then
    # Bei neueren Versionen von UIkit werden die Befehle getrennt ausgeführt
    pnpm compile-less || echo "pnpm compile-less fehlgeschlagen, versuche Fallback mit npm"
    pnpm compile-js || echo "pnpm compile-js fehlgeschlagen, versuche Fallback mit npm"
    
    # Fallback auf npm, falls pnpm-Befehle fehlschlagen
    if [ ! -d "dist" ] || [ ! -f "dist/css/uikit.css" ]; then
        echo -e "${BLUE}Fallback auf npm run compile...${NC}"
        npm run compile
    fi
else
    npm run compile
fi

# Kompilierte Dateien kopieren
echo -e "${BLUE}Kopiere kompilierte Dateien in das assets-Verzeichnis...${NC}"
ASSETS_DIR="${ROOT_DIR}/assets"
mkdir -p "${ASSETS_DIR}"

# Kopiere die kompilierten CSS-Dateien
mkdir -p "${ASSETS_DIR}/css"
cp dist/css/uikit*.css "${ASSETS_DIR}/css/"

# Kopiere die kompilierten JavaScript-Dateien
mkdir -p "${ASSETS_DIR}/js"
cp dist/js/uikit*.js "${ASSETS_DIR}/js/"

# Aufräumen
echo -e "${BLUE}Räume auf...${NC}"
cd "$ROOT_DIR"
rm -rf "$TEMP_DIR"

echo -e "${GREEN}UIkit wurde erfolgreich mit dem REDAXO-Theme gebaut!${NC}"
echo -e "${GREEN}Die Dateien befinden sich in: ${ASSETS_DIR}${NC}"
echo -e "${GREEN}Verwendete UIkit Version: ${ACTUAL_VERSION}${NC}"