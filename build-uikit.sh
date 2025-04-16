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

# Abhängigkeiten installieren
echo -e "${BLUE}Installiere Abhängigkeiten...${NC}"
npm install

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
npm run compile

# Kompilierte Dateien kopieren - KORREKTUR: Direktes Ablegen im assets-Ordner
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