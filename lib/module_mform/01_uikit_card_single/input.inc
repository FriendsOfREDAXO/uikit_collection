<?php

$MForm = new MForm();

$MForm->addTab('Inhalt:');
$MForm->addFieldset('UiKit Cards:');
$MForm->addTextField("1.0.header", array('label'=>'Kopfzeile:'));
$MForm->addTextAreaField("1.0.content", array('label'=>'Inhalt:'));
$MForm->addTextField("1.0.footer", array('label'=>'Fusszeile:'));
$MForm->closeTab();

$MForm->addTab('Einstellungen:');
$MForm->addSelectField("2.0.ukWidth");
$MForm->setLabel('Breite:');
$MForm->setOptions( array('auto@m'=>'automatisch', '1-1@m'=>'100%','1-2@m'=>'50%','1-3@m'=>'33%','1-4@m'=>'25%','1-5@m'=>'20%', 'expand@m' => 'Ausdehnen'));

$MForm->addSelectField("2.0.ukColor");
$MForm->setLabel('Farbe:');
$MForm->setOptions( array('default'=>'Standard', 'muted'=>'hellgrau','primary'=>'Hauptfarbe','secondary'=>'Zusatzfarbe'));
$MForm->closeTab();

echo $MForm->show();
