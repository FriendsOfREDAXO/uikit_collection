<?php
$auswahl = new Mform();
$auswahl->addSelectField(20, array(1=>'Accordion',2=>'Tab-Darstellung'), array('class'=>'selectpicker','label'=>'Darstellung','id'=>'uikit_builder'));
echo $auswahl->show();
$id = 1;
$mform = new MForm();
$mform->addFieldset('Accordion');
$mform->addTextField("$id.0.titel", array('label'=>'Titel'));

if (rex_addon::exists('cke5')) {
    $mform->addTextAreaField("$id.0.text", array(
        'label' => 'Text:',
        'data-lang' => \Cke5\Utils\Cke5Lang::getUserLang(),
        'data-profile' => 'default',
        'class' => 'cke5-editor'
    ));
} elseif (rex_addon::exists('tinymce4')) {
    $mform->addTextAreaField("$id.0.text", array(
        'label' => 'Text:',
        'data-profile' => 'default',
        'class' => 'tinyMCEEditor'
    ));
}

echo MBlock::show($id, $mform->show()); 
