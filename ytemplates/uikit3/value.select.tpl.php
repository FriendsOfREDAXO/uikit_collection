<?php

/**
 * @var rex_yform_value_abstract $this
 * @psalm-scope-this rex_yform_value_abstract
 */

$multiple ??= false;
$size ??= 1;
$options ??= [];

$notice = [];
if ('' != $this->getElement('notice')) {
    $notice[] = rex_i18n::translate($this->getElement('notice'), false);
}
if (isset($this->params['warning_messages'][$this->getId()]) && !$this->params['hide_field_warning_messages']) {
    $notice[] = '<span class="uk-text-danger">' . rex_i18n::translate($this->params['warning_messages'][$this->getId()], false) . '</span>';
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

$attributes = [];
$attributes['class'] = 'uk-select';
$attributes['id'] = $this->getFieldId();
if ($multiple) {
    $attributes['name'] = $this->getFieldName() . '[]';
    $attributes['multiple'] = 'multiple';
} else {
    $attributes['name'] = $this->getFieldName();
}
if ($size > 1) {
    $attributes['size'] = $size;
}

if ($this->getWarningClass()) {
    $attributes['class'] .= ' uk-form-danger';
}

$attributes = $this->getAttributeElements($attributes, ['autocomplete', 'pattern', 'required', 'disabled', 'readonly']);

echo '
<div class="' . implode(' ', $class_group) . '" id="' . $this->getHTMLId() . '">
    <label class="' . implode(' ', $class_label) . '" for="' . $this->getFieldId() . '">' . $this->getLabel() . '</label>
    <div class="uk-form-controls">
        <select ' . implode(' ', $attributes) . '>';
foreach ($options as $key => $value):
    echo '<option value="' . rex_escape($key) . '" ';
    if (in_array((string) $key, $this->getValue(), true)) {
        echo ' selected="selected"';
    }
    echo '>';
    echo $this->getLabelStyle($value);
    echo '</option>';
endforeach;
echo '
        </select>
        ' . $notice . '
    </div>
</div>';
