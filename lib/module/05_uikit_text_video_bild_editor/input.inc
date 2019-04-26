<?php
$mform = new MForm();
$mform->addTab('Text');
// Check Texteditor 
if (rex_addon::exists('Cke5')) {
    $mform->addTextAreaField(1, array(
        'label' => 'Text:',
        'data-lang' => \Cke5\Utils\Cke5Lang::getUserLang(),
        'data-profile' => 'default',
        'class' => 'cke5-editor'
    ));
} elseif (rex_addon::exists('tinymce4')) {
    $mform->addTextAreaField(1, array(
        'label' => 'Text:',
        'data-profile' => 'default',
        'class' => 'tinyMCEEditor'
    ));
}
$mform->addSelectField(8, array(
    'uk-column-1-1' => '1 Spaltig',
    'uk-column-1-2' => '2 Spaltig',
    'uk-column-1-3' => '3 Spaltig'
), array(
    'label' => 'Text Spalten',
    'class' => 'selectpicker'
));
$mform->addTab('Media');
$mform->addCustomLinkField(6, array(
    'label' => 'Media',
    'data-tel' => 'disable',
    'data-mailto' => 'disable',
    'data-formlink' => 'disable',
    'data-intern' => 'disable'
));
$mform->addMediaField(1, array(
    'label' => 'Vorschaubild für lokales Video'
));
$mform->addSelectField(2, array(
    'uk-clearfix uk-margin-small-bottom' => 'Standard',
    'uk-float-left uk-margin-small-right' => 'links',
    'uk-float-right uk-margin-small-left' => 'rechts'
), array(
    'label' => 'Position des Bildes',
    'class' => 'selectpicker'
));
$mform->addSelectField(3, array(
    'uk-width-1-4' => 'klein',
    'uk-width-1-3' => 'mittel',
    'uk-width-1-2' => 'groß',
    'uk-width-1-1' => 'Volle Breite'
), array(
    'label' => 'Größe des Bildes',
    'class' => 'selectpicker'
));
$mform->addTextAreaField(5, array(
    'label' => 'Caption'
));
$mform->addSelectField(4, array(
    'klxm_bildunterschrift_verstecken' => 'Nein',
    ' ' => 'Ja'
), array(
    'label' => 'Caption auch als Bildunterschrift anzeigen',
    'class' => 'selectpicker'
));
$mform->addSelectField(7, array(
    ' ' => 'Nein',
    'uk-lightbox' => 'Ja'
), array(
    'label' => 'Lightbox-Funktion',
    'class' => 'selectpicker'
));
$mform->addSelectField(9, array(
    'noshadow' => 'ohne Schatten',
    'uk-box-shadow-medium' => 'Mittlerer Schatten',
    'uk-box-shadow-xlarge' => 'Großer Schatten'
), array(
    'label' => 'Bildschatten',
    'class' => 'selectpicker'
));
$mform->addSelectField(10, array(
    'nein' => 'nein',
    'ja' => 'ja'
), array(
    'label' => 'Bild als Kreis',
    'class' => 'selectpicker'
));
$mform->addSelectField(11, array(
    'nein' => 'nein',
    'ja' => 'ja'
), array(
    'label' => 'Bild animieren',
    'class' => 'selectpicker'
));
$mform->addSelectField(12, array(
    'nein' => 'nein',
    'ja' => 'ja'
), array(
    'label' => 'Bild Animation wiederholen?',
    'class' => 'selectpicker'
));
echo $mform->show();
