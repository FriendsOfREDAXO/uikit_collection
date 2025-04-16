<?php

/**
 * @var rex_yform_value_abstract $this
 * @psalm-scope-this rex_yform_value_abstract
 */

$options ??= [];

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

$class = $this->getElement('required') ? 'uk-form-required ' : '';
$class_group = trim('uk-margin ' . $class . $this->getWarningClass());

if ('' != trim($this->getLabel())) {
    echo '<div class="' . $class_group . '" id="' . $this->getHTMLId() . '">
    <label class="uk-form-label">' . $this->getLabel() . '</label>
    <div class="uk-form-controls uk-form-controls-text">';
}

foreach ($options as $key => $value) {
    $is_inline = (bool) $this->getElement('inline');
    $classes = ['uk-radio'];
    
    if ($this->getWarningClass()) {
        $classes[] = 'uk-form-danger';
    }
    
    $attributes = [
        'id' => $this->getFieldId() . '-' . rex_escape($key),
        'name' => $this->getFieldName(),
        'value' => $key,
        'type' => 'radio',
        'class' => implode(' ', $classes),
    ];

    if ($key == $this->getValue()) {
        $attributes['checked'] = 'checked';
    }

    $attributes = $this->getAttributeElements($attributes);

    echo '<label class="' . ($is_inline ? 'uk-margin-right' : 'uk-display-block') . '">
            <input ' . implode(' ', $attributes) . ' />
            <span class="uk-margin-small-left">' . $this->getLabelStyle($value) . '</span>
        </label>';
}

echo $notice;

if ('' != trim($this->getLabel())) {
    echo '</div></div>';
}
