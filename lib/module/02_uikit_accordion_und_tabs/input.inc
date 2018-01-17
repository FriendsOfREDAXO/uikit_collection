<?php
$auswahl = new Mform();
$auswahl->addSelectField(20, array(1=>'Accordion',2=>'Tab-Darstellung'), array('class'=>'selectpicker','label'=>'Darstellung','id'=>'uikit_builder'));
echo $auswahl->show();
$id = 3;
$mform = new MForm();
$mform->addFieldset('Accordion');
$mform->addTextField("$id.0.titel", array('label'=>'Titel'));
$mform->addTextAreaField("$id.0.text", array('label'=>'Text','class'=>'redactorEditor2-full'));
echo MBlock::show($id, $mform->show()); 
