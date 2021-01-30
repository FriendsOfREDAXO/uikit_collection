<?php

$notice = [];
if ($this->getElement('notice') != '') {
    $notice[] = rex_i18n::translate($this->getElement('notice'), false);
}
if (isset($this->params['warning_messages'][$this->getId()]) && !$this->params['hide_field_warning_messages']) {
    $notice[] = '<span class="text-warning">' . rex_i18n::translate($this->params['warning_messages'][$this->getId()], false) . '</span>'; //    var_dump();
}
if (count($notice) > 0) {
    $notice = '<p class="help-block">' . implode('<br />', $notice) . '</p>';
} else {
    $notice = '';
}

$class_group = trim('form-group ' . $this->getHTMLClass() . ' ' . $this->getWarningClass());

?>

<div class="<?= $class_group ?>">

 <label class="control-label" for="<?= $this->getFieldId() ?>">
     <div class="uk-form-label "><?= $this->getLabel() ?></div>

        <div uk-form-custom="target: true">
             <a class="uk-form-icon uk-form-icon-flip" href="" uk-icon="icon: upload"></a>
            <input type="file" id="<?= $this->getFieldId() ?>" name="file_<?= md5($this->getFieldName('file')) ?>" accept="<?= $this->getElement("types") ?>">
            <input class="uk-input uk-form-width-medium" type="text" placeholder="Datei auswählen" disabled>
              </div>
        <button class="uk-button uk-button-default">Hochladen</button>

 </label>

    <?php if ($this->getValue()): ?>
        <div class="help-block">
            <dl class="<?= $this->getHTMLClass() ?>-info">
                <dt>Dateiname</dt>
                <dd><?php
                    echo '<a href="'.rex_url::media($this->getValue()).'">'.htmlspecialchars($this->getValue()).'</a>';
                ?></dd>
            </dl>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="<?php echo md5($this->getFieldName('delete')) ?>" value="1" />
                    Datei löschen
                </label>
            </div>
        </div>
    <?php endif ?>
    <input type="hidden" name="<?php echo $this->getFieldName() ?>" value="<?php echo htmlspecialchars($this->getValue()) ?>" />
    <?php echo $notice ?>
</div>
