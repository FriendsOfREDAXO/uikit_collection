<?php
/**
 * UIkit Collection - Hauptdatei für das Backend
 */



// Titel für die Seite
echo rex_view::title('UIkit Collection');

// Automatisches Einbinden der Unterseiten
rex_be_controller::includeCurrentPageSubPath();
?>