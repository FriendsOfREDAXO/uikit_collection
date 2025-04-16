<?php

/**
 * @var rex_yform_value_abstract|rex_yform $this
 * @psalm-scope-this rex_yform_value_abstract
 */

$option ??= '';

switch ($option) {
    case 'open':
        $attributes = [
            'class' => 'uk-fieldset ' . $this->getHTMLClass(),
            'id' => $this->getHTMLId(),
        ];

        $attributes = $this->getAttributeElements($attributes, []);
        echo '<fieldset ' . implode(' ', $attributes) . '>';
        if ($this->getLabel()) {
            echo '<legend class="uk-legend" id="' . $this->getFieldId() . '">' . $this->getLabel() . '</legend>';
        }
        break;
    case 'close':
        echo '</fieldset>';
        break;
}
