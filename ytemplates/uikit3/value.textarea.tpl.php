<?php

/**
 * @var rex_yform_value_textarea $this
 * @psalm-scope-this rex_yform_value_textarea
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
    'class' => 'uk-textarea',
    'name' => $this->getFieldName(),
    'id' => $this->getFieldId(),
    'rows' => $this->getElement('rows') ?: 10,
    'cols' => $this->getElement('cols') ?: 80,
];

if ($this->getWarningClass()) {
    $attributes['class'] .= ' uk-form-danger';
}

$attributes = $this->getAttributeElements($attributes, ['required', 'disabled', 'readonly']);

echo '<div class="' . $class_group . '" id="' . $this->getHTMLId() . '">
    <label class="' . implode(' ', $class_label) . '" for="' . $this->getFieldId() . '">' . $this->getLabel() . '</label>
    <div class="uk-form-controls">
        <textarea ' . implode(' ', $attributes) . '>' . rex_escape($this->getValue()) . '</textarea>
        ' . $notice . '
    </div>
</div>';
?>
