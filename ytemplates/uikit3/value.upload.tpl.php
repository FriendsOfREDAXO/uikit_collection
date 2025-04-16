<?php

/**
 * @var rex_yform_value_upload $this
 * @psalm-scope-this rex_yform_value_upload
 */

$unique ??= '';
$filename ??= '';
$download_link ??= '';
$error_messages ??= [];
$configuration ??= [];
$allowed_extensions = $configuration['allowed_extensions'] ?? ['*'];
$allowed_extensions = '*' == $allowed_extensions[0] ? '*' : '.' . implode(',.', $configuration['allowed_extensions']);

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

$class_label = ['uk-form-label'];
if ($this->getElement('required')) {
    $class_label[] = 'uk-form-required';
}

$inputAttributes = [
    'class' => $this->getWarningClass() ? 'uk-form-danger' : '',
    'id' => $this->getFieldId(),
    'type' => 'file',
    'name' => $unique,
    'accept' => $allowed_extensions,
];
$inputAttributes = $this->getAttributeElements($inputAttributes, ['required', 'disabled', 'readonly']);

?>
<div class="<?= $class_group ?>" id="<?= $this->getHTMLId() ?>">
    <label class="<?= implode(' ', $class_label) ?>" for="<?= $this->getFieldId() ?>"><?= $this->getLabel() ?></label>
    <div class="uk-form-controls">
        <div class="uk-inline uk-width-1-1">
            <div class="uk-flex uk-flex-middle">
                <div class="uk-width-expand">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: upload"></span>
                        <input <?= implode(' ', $inputAttributes) ?> />
                    </div>
                </div>
                <div class="uk-margin-small-left">
                    <button class="uk-button uk-button-default" type="button" onclick="document.getElementById('<?= $this->getFieldId() ?>').value = ''">&times;</button>
                </div>
            </div>
        </div>
        <?= $notice ?>
        <input type="hidden" name="<?= $this->getFieldName('unique') ?>" value="<?= rex_escape($unique, 'html') ?>" />
    </div>
</div>

<?php
    if ('' != $filename) {
        $label = rex_escape($filename);

        if (rex::isBackend() && '' != $download_link) {
            $label = '<a href="' . $download_link . '">' . $label . '</a>';
        }

        echo '
            <div class="uk-margin" id="' . $this->getHTMLId('checkbox') . '">
                <div class="uk-form-controls uk-form-controls-text">
                    <label>
                        <input class="uk-checkbox" type="checkbox" id="' . $this->getFieldId('delete') . '" name="' . $this->getFieldName('delete') . '" value="1" />
                        <span class="uk-margin-small-left">' . ($error_messages['delete_file'] ?? 'delete-file-msg') . ' "' . $label . '"</span>
                    </label>
                </div>
            </div>';
    }
?>
