<?php

// settings
$MForm = new MForm();
$MForm->addFieldset('UiKit Cards:');
# grids / grid width
$MForm->addTab('Einstellungen für alle UiKit Cards:');
$MForm->addSelectField("2.0.gutterWidth");
$MForm->setLabel('Abstand:');
$MForm->setOptions(array(
    'medium' => 'normal',
    'small' => 'eng',
    'large' => 'weit',
    'collapse' => 'entfernen'
));
$MForm->addSelectField("3.0.ukcolor");
$MForm->setLabel('Hintergrund:');
$MForm->setOptions(array(
    'default' => 'Standard',
    'muted' => 'Stumm',
    'primary' => 'Hauptfarbe',
    'secondary' => 'Zusatzfarbe'
));
$MForm->addSelectField("4.0.scrollspy");
$MForm->setLabel('Scrollspy:');
$MForm->setOptions(array(
    '' => 'Nein',
    'scrollspy' => 'Ja',
));






$MForm->addDescription("Abstände zwischen den 'Cards' verändern");

// checkbox
$MForm->addCheckboxField("2.0.matchHeight", array(
    1 => 'Ja'
) , array(
    'label' => 'Alle gleiche Höhe:'
));
$MForm->closeTab();

echo $MForm->show();

$id = 1;
$MForm = new MForm();
$MForm->addFieldset('UiKit Cards:');
$MForm->addTextField("$id.0.header", array(
    'label' => 'Kopfzeile:'
));
$MForm->addMediaField(1, array(
    'label' => '<i class="fa fa-picture-o" aria-hidden="true"></i> Bild',
    'preview' => '1'
));
$MForm->addTextField("$id.0.imageTitle", array(
    'label' => 'Bildbeschreibung:'
));

$MForm->addTextAreaField("$id.0.content", array(
    'label' => 'Inhalt:',
    'data-lang' => \Cke5\Utils\Cke5Lang::getUserLang() ,
    'data-profile' => 'default',
    'class' => 'cke5-editor'
));
$MForm->addCustomLinkField("$id.0.1",array('label'=>'Link'));
$MForm->addTextField("$id.0.LinkText", array(
    'label' => 'Linktext (optional):'
));
$MForm->addFieldset("Einstellung für diese UiKit Card");

$MForm->addSelectField("$id.0.ukWidth");
$MForm->setLabel('Breite:');
$MForm->setOptions(array(
    'auto@m' => 'automatisch',
    '1-1@m' => '100%',
    '2-3@m' => '66%',
    '1-2@m' => '50%',
    '1-3@m' => '33%',
    '1-4@m' => '25%',
    '1-5@m' => '20%',
    'expand@m' => 'Ausdehnen'
));

$MForm->addSelectField("$id.0.ukColor");
$MForm->setLabel('Farbe:');
$MForm->setOptions(array(
    'default' => 'Standard',
    'muted' => 'Stumm',
    'primary' => 'Hauptfarbe',
    'secondary' => 'Zusatzfarbe'
));

$MForm->addSelectField("$id.0.ukFontColor");
$MForm->setLabel('Schriftarbe:');
$MForm->setOptions(array(
    '' => 'Standard',
    ' uk-light' => 'hell',
));


$MForm->closeFieldset();

echo MBlock::show($id, $MForm->show() , array(
    'max' => 100
));
?>
<!----
<style>
    .mblock_wrapper > div {
    zoom: 1;
    width: 33.3%;
    float: left;
}</style>
--->



