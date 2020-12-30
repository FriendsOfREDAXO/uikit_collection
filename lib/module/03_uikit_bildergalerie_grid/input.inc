<?php

$auswahl = new Mform();
$auswahl->addSelectField(15, array('scale'=>'Scale','fade'=>'Fade','slide'=>'Slide'), array('label'=>'Darstellung','id'=>'uikit_builder'));
$auswahl->addSelectField(16, array('uk-width-1-1@m'=>'eine Kachel','uk-width-1-2@m'=>'zwei Kacheln','uk-width-1-3@m'=>'drei Kacheln','uk-width-1-4@m'=>'vier Kacheln','uk-width-1-5@m'=>'fünf Kacheln'), array('label'=>'Kachelanzahl in einer Reihe','id'=>'uikit_builder'));

echo $auswahl->show();

$id = 1;
$mform = new MForm();
$mform->addFieldset('Bilder');
$mform->addImagelistField(1,array('types'=>'gif,jpg,png','preview'=>0,'category'=>0,'label'=>'Auswahl'));
$mform->addTextAreaField("$id.0.caption", array('label'=>'Caption', 'class'=>'ckeditor', 'data-ckeditor-profile'=>'lite'));

echo MBlock::show($id, $mform->show()); 