<?php

/**
 * @var rex_yform_value_text $this
 * @psalm-scope-this rex_yform_value_text
 */

$type ??= 'text';
$class = 'text' == $type ? '' : 'uk-form-' . $type . ' ';
if (!isset($value)) {
    $value = $this->getValue();
}

$notice = [];
if ('' != $this->getElement('notice')) {
    $notice[] = rex_i18n::translate($this->getElement('notice'), false);
}
if (isset($this->params['warning_messages'][$this->getId()]) && !$this->params['hide_field_warning_messages']) {
    $notice[] = '<span class="uk-text-danger">' . rex_i18n::translate($this->params['warning_messages'][$this->getId()]) . '</span>';
}
if (count($notice) > 0) {
    $notice = '<p class="uk-form-help-block uk-text-small">' . implode('<br />', $notice) . '</p>';
} else {
    $notice = '';
}

$class_group = ['uk-margin'];
if (!empty($this->getWarningClass())) {
    $class_group[] = $this->getWarningClass();
}

$class_label = ['uk-form-label'];
if ($this->getElement('required')) {
    $class_label[] = 'uk-form-required';
}

$attributes = [
    'class' => 'uk-input ' . $class,
    'name' => $this->getFieldName(),
    'type' => $type,
    'id' => $this->getFieldId(),
    'value' => $value,
];

if ($this->getWarningClass()) {
    $attributes['class'] .= ' uk-form-danger';
}

$attributes = $this->getAttributeElements($attributes, ['placeholder', 'autocomplete', 'pattern', 'required', 'disabled', 'readonly']);

$input_group_start = '';
$input_group_end = '';

$prepend_view = '';
if (!empty($prepend)) {
    $prepend_view = '<span class="uk-form-icon">' . $prepend . '</span>';
    $input_group_start = '<div class="uk-inline">';
    $input_group_end = '</div>';
}

$append_view = '';
if (!empty($append)) {
    $append_view = '<span class="uk-form-icon uk-form-icon-flip">' . $append . '</span>';
    $input_group_start = '<div class="uk-inline">';
    $input_group_end = '</div>';
}

echo '<div class="' . implode(' ', $class_group) . '" id="' . $this->getHTMLId() . '">
        <label class="' . implode(' ', $class_label) . '" for="' . $this->getFieldId() . '">' . $this->getLabel() . '</label>
        <div class="uk-form-controls">' . $input_group_start . $prepend_view . '<input ' . implode(' ', $attributes) . ' />' . $append_view . $input_group_end . $notice . '
        </div>
    </div>';
