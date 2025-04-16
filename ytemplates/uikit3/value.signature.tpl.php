<?php

/**
 * @var rex_yform_value_signature $this
 * @psalm-scope-this rex_yform_value_signature
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

$height = $this->getElement('height');
$width = $this->getElement('width');
$json = htmlspecialchars($this->getValue('json'), ENT_QUOTES);
$showSignature = ('' != $this->getValue('signature') && strlen($this->getValue('signature')) > 10) ? true : false;

echo '<div class="' . $class_group . '" id="' . $this->getHTMLId() . '" data-yform-signature-field>';

echo '<label class="' . implode(' ', $class_label) . '">' . $this->getLabel() . '</label>';
echo '<div class="uk-form-controls">';

echo '<div style="width:' . $width . 'px">
    <canvas class="rex-js-signature" data-width="' . $width . '" data-height="' . $height . '" style="border: 1px solid #888;"></canvas>
    <div class="uk-text-right uk-margin-small-top">
        <button type="button" class="uk-button uk-button-small uk-button-danger signature-clear">' . rex_i18n::msg('yform_signature_clear') . '</button>
    </div>
</div>';

// Original signature
if ($showSignature) {
    echo '<div class="uk-margin-top">';
    echo '<img class="yform-signature-image" src="' . $this->getValue('signature') . '" />
          <button type="button" class="uk-button uk-button-small uk-button-default">' . rex_i18n::msg('yform_signature_undo') . '</button>';
    echo '</div>';
}

echo '<input type="hidden" name="' . $this->getFieldName('json') . '" value="' . $json . '" class="signature-json" />';
echo '<input type="hidden" name="' . $this->getFieldName('signature') . '" value="' . rex_escape($this->getValue('signature')) . '" class="signature-output" />';

echo $notice;
echo '</div>';
echo '</div>';
?>