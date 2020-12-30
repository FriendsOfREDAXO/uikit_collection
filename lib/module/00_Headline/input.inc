<?php
$mform = new MForm();
$mform->addTextField(16, array(
    'label' => 'Überschrift'
));
$mform->addSelectField(17, array(
    'h1'=>'Überschrift 1',
    'h2'=>'Überschrift 2',
    'h3'=>'Überschrift 3'
    ), array('label'=>'Ebene', 'class'=>'selectpicker'));
$mform->addSelectField(18, array(
    'my_default'=>'Standard',
    'uk-heading-small'=>'Klein',
    'uk-heading-medium'=>'Medium',
    'uk-heading-large'=>'Groß',
    ), array('label'=>'Größe', 'class'=>'selectpicker'));

$mform->addSelectField(19, array(
    ' my_default'=>'Standard',
    ' uk-heading-divider'=>'unterstrichen',
    ' uk-heading-line uk-text-center'=>'Mittel-Linie Zentriert'
    ), array('label'=>'Design', 'class'=>'selectpicker'));

echo $mform->show();