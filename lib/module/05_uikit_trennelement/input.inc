<?php
$mform = new MForm();
$mform->addSelectField(1, array('klxm_klein_trenner'=>'klein','klxm_mittel_trenner'=>'mittel','klxm_gross_trenner'=>'groß','uk-divider-small'=>'UI kleiner Trenner','uk-divider-icon'=>'UI Trenner mit Icon'), array('label'=>'Trennelement Höhe', 'class'=>'selectpicker'));
echo $mform->show();