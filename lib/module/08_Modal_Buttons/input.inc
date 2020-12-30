<?php 
// base ID
$id = 1;
// init mform
$mform = new MForm();
$mform->addFieldset('Sponsorenliste');
$mform->addTextField("$id.0.alt", array('label'=>'Button-Text')); // use string for x.0 json values
$mform->addTextAreaField("$id.3.content", array(
    'label' => 'Inhalt:',
    'data-lang' => \Cke5\Utils\Cke5Lang::getUserLang() ,
    'data-profile' => 'default',
    'class' => 'cke5-editor'
));



echo MBlock::show($id, $mform->show(), array('min'=>1,'max'=>40)); // add settings min and max
?>