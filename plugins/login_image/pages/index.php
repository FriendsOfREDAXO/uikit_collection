<?php
$plugin = rex_plugin::get('klxm_defaults', 'login_image');

$content = '
	<p>Hier kann ein anderes Bild als das default Bild angegeben werden.<br/>
	<p>Einfach eine .jpg Datei mit den Abmessungen von 340px x 90px aus dem Medienpool auswählen.</p><br/><br/>';

if (rex_post('config-submit', 'boolean')) {
    $plugin->setConfig(rex_post('config', [
        ['bild', 'string'],
    ]));

    $content .= rex_view::info('Änderung gespeichert');
}

$content .=  '
<div class="rex-form">
    <form action="' . rex_url::currentBackendPage() . '" method="post">
        <fieldset>';

$formElements = [];

$n = [];
$n['label'] = '<label for="rex-out5-login_image">Datei</label>';

$n['field'] = '
<div class="rex-js-widget rex-js-widget-media">
	<div class="input-group">
		<input class="form-control" type="text" name="config[bild]" value="'.$plugin->getConfig('bild') . '" id="REX_MEDIA_1" readonly="">
		<span class="input-group-btn">
        <a href="#" class="btn btn-popup" onclick="openREXMedia(1);return false;" title="Medium auswählen">
        	<i class="rex-icon rex-icon-open-mediapool"></i>
        </a>
        <a href="#" class="btn btn-popup" onclick="addREXMedia(1);return false;" title="Neues Medium hinzufügen">
        	<i class="rex-icon rex-icon-add-media"></i>
        </a>
	</div>
 </div>
';                
                
$formElements[] = $n;

$fragment = new rex_fragment();
$fragment->setVar('elements', $formElements, false);
$content .= $fragment->parse('core/form/form.php');

$content .= '
        </fieldset>

        <fieldset class="rex-form-action">';

$formElements = [];

$n = [];
$n['field'] = '
<div class="btn-toolbar"><button id="rex-out5-login_image-editieren-save" type="submit" name="config-submit" class="btn btn-save rex-form-aligned" value="1">Einstellungen speichern</button></div>';
$formElements[] = $n;

$fragment = new rex_fragment();
$fragment->setVar('elements', $formElements, false);
$content .= $fragment->parse('core/form/submit.php');

$content .= '
        </fieldset>

    </form>
</div>';

$fragment = new rex_fragment();
$fragment->setVar('class', 'edit');
$fragment->setVar('title', 'Login Image - Einstellungen');
$fragment->setVar('body', $content, false);
echo $fragment->parse('core/page/section.php');
