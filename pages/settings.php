<?php
$content = '';
$buttons = '';
// Einstellungen speichern
if (rex_post('formsubmit', 'string') == '1') {
    $this->setConfig(rex_post('config', [
        ['check_scss', 'string'],
    ]));
    echo rex_view::success($this->i18n('config_saved'));
}
$content .= '<fieldset><legend>' . $this->i18n('config_legend1') . '</legend>';


// Checkbox
$formElements = [];
$n = [];
$n['label'] = '<label for="check_scss">' . $this->i18n('check_scss') . '</label>';
$n['field'] = '<input type="checkbox" id="check_scss" name="config[check_scss]"' . (!empty($this->getConfig('check_scss')) && $this->getConfig('check_scss') == '1' ? ' checked="checked"' : '') . ' value="1" />';
$formElements[] = $n;
$fragment = new rex_fragment();
$fragment->setVar('elements', $formElements, false);
$content .= $fragment->parse('core/form/checkbox.php');

// Save-Button
$formElements = [];
$n = [];
$n['field'] = '<button class="btn btn-save rex-form-aligned" type="submit" name="save" value="' . $this->i18n('config_save') . '">' . $this->i18n('config_save') . '</button>';
$formElements[] = $n;
$fragment = new rex_fragment();
$fragment->setVar('elements', $formElements, false);
$buttons = $fragment->parse('core/form/submit.php');
$buttons = '
<fieldset class="rex-form-action">
    ' . $buttons . '
</fieldset>
';
// Ausgabe Formular
$fragment = new rex_fragment();
$fragment->setVar('class', 'edit');
$fragment->setVar('title', $this->i18n('config'));
$fragment->setVar('body', $content, false);
$fragment->setVar('buttons', $buttons, false);
$output = $fragment->parse('core/page/section.php');
$output = '
<form action="' . rex_url::currentBackendPage() . '" method="post">
<input type="hidden" name="formsubmit" value="1" />
    ' . $output . '
</form>
';
echo $output;