<?php

/**
 * @var rex_yform_value_be_manager_inline_relation $this
 * @psalm-scope-this rex_yform_value_be_manager_inline_relation
 */

$relation_name ??= '';
$add_label ??= '';

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
    <label class="<?= implode(' ', $class_label) ?>" for="<?= $this->getFieldId() ?>">
        <?= $this->getLabel() ?>
    </label>
    <div class="uk-form-controls">
        <?= $notice ?>
        <div id="rex-<?= $relation_name ?>" class="uk-margin-small-top" data-yform-be-relation-inline>
            <div class="uk-margin-small-bottom">
                <button type="button" class="uk-button uk-button-small uk-button-primary" data-yform-be-relation-inline-add="<?= $relation_name ?>"><?= $add_label ?></button>
            </div>
            <div class="yform-be-relation-inline-form-area" id="rex-<?= $relation_name ?>-form"></div>
            <div class="yform-be-relation-inline-items" id="rex-<?= $relation_name ?>-items"></div>
        </div>
    </div>
</div>