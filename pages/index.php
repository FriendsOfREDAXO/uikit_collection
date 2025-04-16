<?php
/**
 * UIkit Collection - Hauptdatei für das Backend
 */

// Verhindere direkten Aufruf
if (!defined('REDAXO')) {
    die('Direct access denied!');
}

// Titel für die Seite
echo rex_view::title('UIkit Collection');

// Automatisches Einbinden der Unterseiten
rex_be_controller::includeCurrentPageSubPath();
?>