<?php

/**
 * @var rex_yform_value_url $this
 * @psalm-scope-this rex_yform_value_url
 */

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

$class_label = ['uk-form-label'];
if ($this->getElement('required')) {
    $class_label[] = 'uk-form-required';
}

$attributes = [
    'class' => 'uk-input',
    'name' => $this->getFieldName(),
    'type' => 'url',
    'id' => $this->getFieldId(),
    'value' => $this->getValue(),
];

if ($this->getWarningClass()) {
    $attributes['class'] .= ' uk-form-danger';
}

$attributes = $this->getAttributeElements($attributes, ['required', 'disabled', 'readonly', 'autocomplete', 'pattern', 'maxlength']);

echo '<div class="' . $class_group . '" id="' . $this->getHTMLId() . '">
    <label class="' . implode(' ', $class_label) . '" for="' . $this->getFieldId() . '">' . $this->getLabel() . '</label>
    <div class="uk-form-controls">
        <div class="uk-inline uk-width-1-1">
            <span class="uk-form-icon" uk-icon="icon: link"></span>
            <input ' . implode(' ', $attributes) . ' />
        </div>
        ' . $notice . '
    </div>
</div>';