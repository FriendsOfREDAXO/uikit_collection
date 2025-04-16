<?php

/**
 * @var rex_yform_value_checkbox $this
 * @psalm-scope-this rex_yform_value_checkbox
 */

$value = $this->getValue() ?? '';

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

$class_group = trim('uk-margin ' . $this->getHTMLClass() . ' ' . $this->getWarningClass());

$attributes = [
    'type' => 'checkbox',
    'id' => $this->getFieldId(),
    'name' => $this->getFieldName(),
    'value' => 1,
    'class' => 'uk-toggle',
];
if (1 == $value) {
    $attributes['checked'] = 'checked';
}

if ($this->getWarningClass()) {
    $attributes['class'] .= ' uk-form-danger';
}

$attributes = $this->getAttributeElements($attributes, ['required', 'disabled', 'autofocus']);

?>
<div class="<?= $class_group ?>" id="<?= $this->getHTMLId() ?>">
    <div class="uk-form-controls uk-form-controls-text">
        <label>
            <input <?= implode(' ', $attributes) ?> uk-toggle="target: #toggle-usage" />
            <span class="uk-margin-small-left"><?= $this->getLabel() ?></span>
        </label>
        <?= $notice ?>
    </div>
</div>