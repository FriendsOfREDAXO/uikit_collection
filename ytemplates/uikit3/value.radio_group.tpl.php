<?php

/**
 * @var rex_yform_value_radio_group $this
 * @psalm-scope-this rex_yform_value_radio_group
 */

$options ??= [];
$value = $this->getValue();

$notices = [];
if ('' != $this->getElement('notice')) {
    $notices[] = rex_i18n::translate($this->getElement('notice'), false);
}
if (isset($this->params['warning_messages'][$this->getId()]) && !$this->params['hide_field_warning_messages']) {
    $notices[] = '<span class="uk-text-danger">' . rex_i18n::translate($this->params['warning_messages'][$this->getId()], false) . '</span>';
}

$notice = '';
if (count($notices) > 0) {
    $notice = '<p class="uk-form-help-block uk-text-small">' . implode('<br />', $notices) . '</p>';
}

$class_group = trim('uk-margin ' . $this->getWarningClass());

?>
<div class="<?= $class_group ?>" id="<?= $this->getHTMLId() ?>">
    <label class="uk-form-label <?= $this->getElement('required') ? 'uk-form-required' : '' ?>"><?= $this->getLabel() ?></label>
    <div class="uk-form-controls uk-form-controls-text">
        <?php foreach ($options as $index => $option): ?>
            <?php
            $attributes = [];
            $attributes['id'] = $this->getFieldId() . '-' . $index;
            $attributes['name'] = $this->getFieldName();
            $attributes['value'] = $option['value'];
            $attributes['type'] = 'radio';
            $attributes['class'] = 'uk-radio';
            
            if ($this->getWarningClass()) {
                $attributes['class'] .= ' uk-form-danger';
            }
            
            if ($value == $option['value']) {
                $attributes['checked'] = 'checked';
            }
            
            $attributes = $this->getAttributeElements($attributes, ['required', 'disabled', 'readonly']);
            ?>
            <div class="uk-margin-small-top">
                <label>
                    <input <?= implode(' ', $attributes) ?> />
                    <span class="uk-margin-small-left"><?= $option['label'] ?></span>
                </label>
            </div>
        <?php endforeach ?>
        <?= $notice ?>
    </div>
</div>