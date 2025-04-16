<?php

/**
 * @var rex_yform_value_abstract $this
 * @psalm-scope-this rex_yform_value_abstract
 */

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

$class_group = trim('uk-margin ' . $this->getWarningClass());

echo '
<div class="' . $class_group . '" id="' . $this->getHTMLId() . '">
    <label class="uk-form-label">' . $this->getLabel() . '</label>
    <div class="uk-form-controls">
        <div class="uk-text-muted uk-padding-small uk-padding-remove-horizontal" id="' . $this->getFieldId() . '">' . nl2br(rex_escape($this->getValue())) . '</div>
        ' . $notice . '
    </div>
</div>';
?>
