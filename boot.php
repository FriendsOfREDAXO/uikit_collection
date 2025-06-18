<?php

$package = rex_addon::get('uikit_collection');
$path = $package->getConfig('path');
$prefix = $package->getConfig('prefix');

// Backend-spezifische Konfiguration
$backend_path = $package->getConfig('backend_path', $path);
$backend_prefix = $package->getConfig('backend_prefix', $prefix);

if ($prefix!='')
{
  $prefix  = '.'.$prefix;
}

if ($backend_prefix!='')
{
  $backend_prefix  = '.'.$backend_prefix;
}

if (rex_plugin::get('yform', 'manager')->isAvailable()) {
    rex_yform::addTemplatePath($package->getPath('ytemplates'));
}


if (rex::isBackend() && rex::getUser()) {
    rex_perm::register('uikit_modul[]');
        // Backend-spezifische UIkit Assets verwenden
        if ($backend_path) {
            $backend_css_file = $backend_path.'/css/uikit'.$backend_prefix.'.min.css';
            $backend_js_file = $backend_path.'/js/uikit.min.js';
            $backend_js_icons_file = $backend_path.'/js/uikit-icons.min.js';
        } else {
            // Standard-Assets verwenden wenn kein Backend-Pfad gesetzt
            $backend_css_file = $package->getAssetsUrl('css/uikit'.$backend_prefix.'.min.css');
            $backend_js_file = $package->getAssetsUrl('js/uikit.min.js');
            $backend_js_icons_file = $package->getAssetsUrl('js/uikit-icons.min.js');
        }
        
        rex_view::addCssFile($backend_css_file);
        rex_view::addCssFile($package->getAssetsUrl('uikit_backend_fix.css'));
        rex_view::addJsFile($backend_js_file);
        rex_view::addJsFile($backend_js_icons_file);
}


// Frontend: UIkit Assets einbinden, wenn aktiviert
if (rex::isFrontend() && $package->getConfig('include_assets', false) === true) {
    rex_extension::register('OUTPUT_FILTER', function(rex_extension_point $ep) use ($path, $prefix, $package) {
        $content = $ep->getSubject();
        
        // UIkit CSS - korrekte Pfade
        if ($path) {
            $cssFile = $path.'/css/uikit'.$prefix.'.min.css';
        } else {
            $cssFile = $package->getAssetsUrl('css/uikit'.$prefix.'.min.css');
        }
        $cssLink = '<link rel="stylesheet" href="'.$cssFile.'">';
        
        // UIkit JS - korrekte Pfade  
        if ($path) {
            $jsFile = $path.'/js/uikit.min.js';
            $jsIconsFile = $path.'/js/uikit-icons.min.js';
        } else {
            $jsFile = $package->getAssetsUrl('js/uikit.min.js');
            $jsIconsFile = $package->getAssetsUrl('js/uikit-icons.min.js');
        }
        $jsLink = '<script src="'.$jsFile.'"></script>';
        $jsIconsLink = '<script src="'.$jsIconsFile.'"></script>';
        
        // Im </head> einfügen
        $content = str_replace('</head>', $cssLink."\n</head>", $content);
        $content = str_replace('</body>', $jsLink."\n".$jsIconsLink."\n</body>", $content);
        
        return $content;
    });
}

// Füge die Optionen für das AddOn in der config.yml hinzu, wenn sie noch nicht vorhanden sind
if (!$package->hasConfig('include_assets')) {
    $package->setConfig('include_assets', false);
}
if (!$package->hasConfig('path')) {
    $package->setConfig('path', 'assets/addons/uikit_collection');
}
if (!$package->hasConfig('prefix')) {
    $package->setConfig('prefix', '');
}

// Backend-spezifische Konfigurationen hinzufügen
if (!$package->hasConfig('backend_path')) {
    $package->setConfig('backend_path', '');
}
if (!$package->hasConfig('backend_prefix')) {
    $package->setConfig('backend_prefix', '');
}

