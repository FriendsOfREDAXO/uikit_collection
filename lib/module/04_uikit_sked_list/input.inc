<?php
// Perioden zur Auswahl stellen. 
// ------------------------------------
$select_p = new rex_select();
$select_p->setId('period'); 
$select_p->setAttribute('class', 'selectpicker form-control');
$select_p->setName('REX_INPUT_VALUE[2]');
$select_p->addOption('Gesamter Zeitraum','all');
$select_p->addOption('Halbes Jahr','halfayear');
$select_p->addOption('Vierteljahr','quarter');
$select_p->setSelected('REX_VALUE[2]');
$periodselect = $select_p->get(); 

// Sked-Kategorien zur Auswahl stellen. 
// ------------------------------------
$select = new rex_select();
$select->setId('sked_category');
$select->setAttribute('class', 'selectpicker form-control');
$select->setName('REX_INPUT_VALUE[3]');
$select->addOption('Alle','');
$select->addSqlOptions('SELECT `name_1`, `id` FROM `' . rex::getTablePrefix() . 'sked_categories` ORDER BY `name_1` ASC');
$select->setSelected('REX_VALUE[3]');
$catselect = $select->get(); 

// Venues zur Auswahl stellen. 
// ------------------------------------
$select_v = new rex_select();
$select_v->setId('sked_category');
$select_v->setAttribute('class', 'selectpicker form-control');
$select_v->addOption('Alle',null);
$select_v->setName('REX_INPUT_VALUE[4]');
$select_v->addSqlOptions('SELECT `name_1`, `id` FROM `' . rex::getTablePrefix() . 'sked_venues` ORDER BY `name_1` ASC');
$select_v->setSelected('REX_VALUE[4]');
$venueselect = $select_v->get(); 
?>

<fieldset class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-2 control-label" for="category">Kategorie</label>
    <div class="col-sm-10">
    <?= $catselect ?>
    </div>
  </div>
</fieldset>
<fieldset class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-2 control-label" for="period">Zeitraum</label>
    <div class="col-sm-10">
        <?= $periodselect ?>
    </div>
  </div>
</fieldset>
<fieldset class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-2 control-label" for="venues">Location</label>
    <div class="col-sm-10">
        <?= $venueselect ?>
    </div>
  </div>
</fieldset>