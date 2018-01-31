<?php

$MForm = new MForm();

$MForm->addTextField("2", array('label' => 'Überschrift:'));
$MForm->addSelectField("1");
$MForm->setOptions(array("h1" => "H1", "h2" => "H2","h3" => "H3", "h4" => "H4", "h5" => "H5", "h6" => "H6"));
echo $MForm->show();
