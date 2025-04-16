<?php

/**
 * @var rex_yform_value_captcha $this
 * @psalm-scope-this rex_yform_value_captcha
 */

$class_group = 'uk-margin';
if (isset($this->params['warning_messages'][$this->getId()]) && !$this->params['hide_field_warning_messages']) {
    $class_group .= ' uk-form-danger';
}

$notice = '';
if (isset($this->params['warning_messages'][$this->getId()]) && !$this->params['hide_field_warning_messages']) {
    $notice = '<p class="uk-form-help-block uk-text-small"><span class="uk-text-danger">' . rex_i18n::translate($this->params['warning_messages'][$this->getId()], false) . '</span></p>';
}

?>
<div class="<?= $class_group ?>">
    <label class="uk-form-label uk-form-required" for="<?= $this->getFieldId() ?>"><?= $this->getElement('label') ?></label>
    <div class="uk-form-controls">
        <img src="<?= $link ?>" onclick="javascript:this.src='<?= $link ?>&'+Math.random();" class="captcha" alt="<?= rex_i18n::translate($this->getElement('label')) ?>" />
        <div class="uk-margin-small-top">
            <input class="uk-input<?= $class_group != 'uk-margin' ? ' uk-form-danger' : '' ?>" id="<?= $this->getFieldId() ?>" 
                   name="<?= $this->getFieldName() ?>" type="text" 
                   autocomplete="off" 
                   value="" />
        </div>
        <?= $notice ?>
    </div>
</div>
