<?php

// author: Joachim Dörr
// support: jd@dev51.com
// license: LGPL-3.0

// init mform
$mform = new MForm();

$mform->addFieldset('Text', ['class' => 'grey-legend-background']);
$mform->addTextField("3.subline", ['label' => 'Sub-Headline']);
$mform->addTextField("3.headline", ['label' => 'Headline']);
$mform->addTextAreaField("3.text", ['label' => 'Text', 'data-profile' => 'light', 'data-lang' => \Cke5\Utils\Cke5Lang::getUserLang(), 'class' => 'cke5-editor']);

$mform->addFieldset('Button', ['class' => 'grey-legend-background']);
$mform->addCustomLinkField('2.link', ['label' => 'Link-Ziel', 'data-media' => 'disable']);
$mform->addTextField('2.link_text', ['label' => 'Link-Text']);

$mform->addFieldset('Background (optional)', ['class' => 'grey-legend-background']);
$mform->addMediaField('1', ['label' => 'Hintergundbild']);


// print mform
print $mform->show();