# REDAXO UIkit Theme

Dieses Verzeichnis enthält die LESS-Dateien für ein angepasstes UIkit-Theme, das speziell für die Integration in das REDAXO-Backend entwickelt wurde.

## Über UIkit

UIkit ist ein leichtgewichtiges und modulares Front-End-Framework für die Entwicklung schneller und leistungsstarker Web-Interfaces. Weitere Informationen: [UIkit Website](https://getuikit.com).

## Theme-Struktur

- `_import.less` - Hauptimport-Datei, die alle Theme-Komponenten zusammenführt
- `variables.less` - Globale Variablen, die das Design des Themes bestimmen
- `base.less` - Basis-Anpassungen (mit Vorsicht zu verwenden)
- `form.less` - Anpassungen für Formularkomponenten
- `button.less` - Anpassungen für Buttons
- `table.less` - Anpassungen für Tabellen
- `nav.less` - Anpassungen für Navigation
- `utility.less` - Hilfsfunktionen und -klassen
- `misc.less` - Allgemeine Anpassungen und Überschreibungen

## Anpassungen

Das Theme wurde speziell entwickelt, um mit dem REDAXO-Backend zu funktionieren, ohne dessen Basis-Stile zu überschreiben. Es werden hauptsächlich UIkit-Komponenten angepasst, die von:

1. YForm-Formularen verwendet werden
2. In AddOn-Ausgaben benötigt werden
3. In benutzerdefinierten Bereichen zum Einsatz kommen

## Build-Prozess

Das Theme wird automatisch durch eine GitHub Action gebaut. Der Build-Prozess:

1. Klont das UIkit-Repository
2. Installiert alle Abhängigkeiten
3. Kopiert unser angepasstes Theme in den UIkit-Ordner
4. Kompiliert UIkit mit unserem Theme
5. Kopiert die kompilierten Dateien in das Assets-Verzeichnis

## Manuelle Anpassungen

Um das Theme manuell anzupassen:

1. Bearbeite die entsprechenden LESS-Dateien
2. Commit und Push in das Repository
3. Die GitHub Action baut automatisch eine neue Version des Themes