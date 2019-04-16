<?php

$MForm = new MForm();

$MForm->addInputField("datetime", 1.8, array('label'=>'Datetime field'));
echo $MForm->show();
