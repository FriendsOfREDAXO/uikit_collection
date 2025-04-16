<?php

$notice = [];
if ($this->getElement('notice') != '') {
    $notice[] = rex_i18n::translate($this->getElement('notice'), false);
}
if (isset($this->params['warning_messages'][$this->getId()]) && !$this->params['hide_field_warning_messages']) {
    $notice[] = '<span class="uk-text-danger">' . rex_i18n::translate($this->params['warning_messages'][$this->getId()], false) . '</span>';
}
if (count($notice) > 0) {
    $notice = '<p class="uk-text-small">' . implode('<br />', $notice) . '</p>';
} else {
    $notice = '';
}

$class = $this->getElement('required') ? 'uk-form-required ' : '';
$class_group = trim('uk-margin ' . $class . $this->getWarningClass());

?>

<div class="<?= $class_group ?>" id="<?= $this->getHTMLId() ?>">
    <label class="uk-form-label" for="<?= $this->getFieldId() ?>">
        <?= $this->getLabel() ?>
    </label>
    
    <div class="uk-form-controls">
        <div class="uk-inline uk-width-1-1 uk-width-auto@s">
            <div uk-form-custom="target: true">
                <input type="file" id="<?= $this->getFieldId() ?>" name="file_<?= md5($this->getFieldName('file')) ?>" accept="<?= $this->getElement("types") ?>">
                <input class="uk-input uk-form-width-large" type="text" placeholder="Datei auswählen" disabled>
                <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: upload"></span>
            </div>
            <button type="button" class="uk-button uk-button-primary uk-margin-small-left">Hochladen</button>
        </div>
        
        <?php if ($this->getValue()): ?>
            <div class="uk-margin-small-top">
                <div class="uk-card uk-card-default uk-card-small uk-padding-small">
                    <h4 class="uk-card-title uk-margin-remove-top">Aktuelle Datei</h4>
                    <div class="uk-flex uk-flex-middle">
                        <div class="uk-margin-right" uk-icon="file"></div>
                        <div>
                            <a href="<?= rex_url::media($this->getValue()) ?>" target="_blank"><?= htmlspecialchars($this->getValue()) ?></a>
                        </div>
                    </div>
                    <div class="uk-margin-small-top uk-flex uk-flex-middle">
                        <input class="uk-checkbox" type="checkbox" name="<?= md5($this->getFieldName('delete')) ?>" value="1" id="<?= $this->getFieldId('delete') ?>">
                        <label for="<?= $this->getFieldId('delete') ?>" class="uk-margin-small-left">Datei löschen</label>
                    </div>
                </div>
            </div>
        <?php endif ?>
        
        <input type="hidden" name="<?= $this->getFieldName() ?>" value="<?= htmlspecialchars($this->getValue()) ?>" />
        <?= $notice ?>
    </div>
</div>
