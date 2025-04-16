<?php

/**
 * @var rex_yform_value_heading $this
 * @psalm-scope-this rex_yform_value_heading
 */

$level = $this->getElement('level') ? (int)$this->getElement('level') : 1;
if ($level < 1 || $level > 6) {
    $level = 1;
}

$attributes = [
    'class' => 'uk-heading-' . ($level > 2 ? 'small' : 'medium') . ' uk-margin-large-top',
    'id' => $this->getHTMLId()
];

if ($level == 1) {
    $attributes['class'] .= ' uk-heading-divider';
}

$attr_string = '';
foreach ($attributes as $key => $value) {
    $attr_string .= ' ' . $key . '="' . $value . '"';
}

echo '<div class="uk-margin"><h' . $level . $attr_string . '>' . $this->getValue() . '</h' . $level . '></div>';
?>