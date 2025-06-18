<?php
/**
 * UIkit Collection - Konfiguration
 */

$addon = rex_addon::get('uikit_collection');

// Formular verarbeiten
if (rex_post('config-submit', 'boolean')) {
    $addon->setConfig(rex_post('config', [
        ['include_assets', 'boolean'],
        ['path', 'string'],
        ['prefix', 'string'],
        ['backend_path', 'string'],
        ['backend_prefix', 'string']
    ]));
    
    echo rex_view::success('Einstellungen wurden gespeichert!');
}

// Aktuelle Konfiguration laden
$config = $addon->getConfig();

$content = '';

// Frontend-Einstellungen
$formElements = [];

$n = [];
$n['label'] = '<label for="rex-uikit-include-assets">UIkit Assets automatisch einbinden</label>';
$n['field'] = '<input type="checkbox" id="rex-uikit-include-assets" name="config[include_assets]" value="1" '. ($config['include_assets'] ? 'checked="checked"' : '') .' />';
$n['note'] = 'Wenn aktiviert, werden UIkit CSS und JS automatisch im Frontend eingebunden.';
$formElements[] = $n;

$n = [];
$n['label'] = '<label for="rex-uikit-path">Frontend-Pfad</label>';
$n['field'] = '<input class="form-control" type="text" id="rex-uikit-path" name="config[path]" value="'. rex_escape($config['path'] ?? '') .'" placeholder="assets/addons/uikit_collection" />';
$n['note'] = 'Pfad zu den UIkit Assets im Frontend (z.B. für CDN). Leer lassen für Standard-Pfad.';
$formElements[] = $n;

$n = [];
$n['label'] = '<label for="rex-uikit-prefix">Frontend-Prefix</label>';
$n['field'] = '<input class="form-control" type="text" id="rex-uikit-prefix" name="config[prefix]" value="'. rex_escape($config['prefix'] ?? '') .'" placeholder="rtl, custom, etc." />';
$n['note'] = 'Prefix für UIkit-Dateien im Frontend (z.B. "rtl" für uikit.rtl.min.css).';
$formElements[] = $n;

$fragment = new rex_fragment();
$fragment->setVar('elements', $formElements, false);
$frontend_form = $fragment->parse('core/form/form.php');

// Backend-Einstellungen
$formElements = [];

$n = [];
$n['label'] = '<label for="rex-uikit-backend-path">Backend-Pfad</label>';
$n['field'] = '<input class="form-control" type="text" id="rex-uikit-backend-path" name="config[backend_path]" value="'. rex_escape($config['backend_path'] ?? '') .'" placeholder="Leer = Frontend-Pfad verwenden" />';
$n['note'] = 'Separater Pfad für UIkit Assets im Backend. Leer lassen um Frontend-Pfad zu verwenden.';
$formElements[] = $n;

$n = [];
$n['label'] = '<label for="rex-uikit-backend-prefix">Backend-Prefix</label>';
$n['field'] = '<input class="form-control" type="text" id="rex-uikit-backend-prefix" name="config[backend_prefix]" value="'. rex_escape($config['backend_prefix'] ?? '') .'" placeholder="Leer = Frontend-Prefix verwenden" />';
$n['note'] = 'Separater Prefix für UIkit-Dateien im Backend. Leer lassen um Frontend-Prefix zu verwenden.';
$formElements[] = $n;

$fragment = new rex_fragment();
$fragment->setVar('elements', $formElements, false);
$backend_form = $fragment->parse('core/form/form.php');

// Formular zusammenbauen
$content .= '<form action="'. rex_url::currentBackendPage() .'" method="post">';
$content .= '<input type="hidden" name="config-submit" value="1" />';

$content .= '<fieldset><legend><i class="rex-icon fa-globe"></i> Frontend-Einstellungen</legend>';
$content .= $frontend_form;
$content .= '</fieldset>';

$content .= '<fieldset><legend><i class="rex-icon fa-cogs"></i> Backend-Einstellungen</legend>';
$content .= $backend_form;
$content .= '</fieldset>';

$formElements = [];
$n = [];
$n['field'] = '<button class="btn btn-primary" type="submit"><i class="rex-icon fa-save"></i> Einstellungen speichern</button>';
$formElements[] = $n;

$fragment = new rex_fragment();
$fragment->setVar('elements', $formElements, false);
$buttons = $fragment->parse('core/form/submit.php');
$content .= $buttons;

$content .= '</form>';

// Ausgabe mit Section
$fragment = new rex_fragment();
$fragment->setVar('class', 'edit', false);
$fragment->setVar('title', 'UIkit Collection - Konfiguration', false);
$fragment->setVar('body', $content, false);
echo $fragment->parse('core/page/section.php');

// Hilfe-Section
$help_content = '
<h3><i class="rex-icon fa-info-circle"></i> Hinweise</h3>
<div class="alert alert-info">
    <h4>Frontend vs. Backend</h4>
    <ul>
        <li><strong>Frontend:</strong> Wird für die Website-Besucher verwendet</li>
        <li><strong>Backend:</strong> Wird für das REDAXO-Backend verwendet</li>
        <li>Wenn Backend-Felder leer sind, werden die Frontend-Einstellungen verwendet</li>
    </ul>
    
    <h4>Beispiele für Prefixe</h4>
    <ul>
        <li><code>rtl</code> → uikit.rtl.min.css (für Rechts-nach-Links-Sprachen)</li>
        <li><code>custom</code> → uikit.custom.min.css (für angepasste Versionen)</li>
        <li>Leer → uikit.min.css (Standard)</li>
    </ul>
    
    <h4>Beispiele für Pfade</h4>
    <ul>
        <li><code>assets/addons/uikit_collection</code> → Standard-Pfad</li>
        <li><code>https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist</code> → CDN</li>
        <li><code>/custom/uikit</code> → Eigener Pfad</li>
    </ul>
</div>';

$fragment = new rex_fragment();
$fragment->setVar('title', 'Hilfe', false);
$fragment->setVar('body', $help_content, false);
echo $fragment->parse('core/page/section.php');
?>
