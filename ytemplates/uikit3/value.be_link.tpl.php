<?php

/**
 * @var rex_yform_value_be_link $this
 * @psalm-scope-this rex_yform_value_be_link
 */

$counter ??= 1;

$buttonId = 'yf_' . uniqid() . '_' . $counter;
$categoryId = 0;
$name = $this->getFieldName();
$value = rex_escape($this->getValue() ?? '');

if (1 == $this->getElement('multiple')) {
    $widget = rex_var_linklist::getWidget($buttonId, $name, $value, []);
} else {
    $widget = rex_var_link::getWidget($buttonId, $name, $value, []);
}

$class_group = trim('uk-margin ' . $this->getHTMLClass() . ' ' . $this->getWarningClass());

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

$class_label = ['uk-form-label'];
if ($this->getElement('required')) {
    $class_label[] = 'uk-form-required';
}

?>
<div class="<?= $class_group ?>" id="<?= $this->getHTMLId() ?>">
    <label class="<?= implode(' ', $class_label) ?>" for="<?= $this->getFieldId() ?>"><?= $this->getLabel() ?></label>
    <div class="uk-form-controls">
        <?= $widget ?>
        <?= $notice ?>
    </div>
</div>