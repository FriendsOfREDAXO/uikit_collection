<?php

$package = rex_addon::get('uikit_collection');
$path = $package->getConfig('path');
$prefix = $package->getConfig('prefix');

if ($prefix!='')
{
  $prefix  = '.'.$prefix;
}

if (rex_plugin::get('yform', 'manager')->isAvailable()) {
    rex_yform::addTemplatePath($package->getPath('ytemplates'));
}


if (rex::isBackend() && rex::getUser()) {
    rex_perm::register('uikit_modul[]');
        // Korrekte Pfade für das UIkit im Backend
        rex_view::addCssFile($package->getAssetsUrl('css/uikit'.$prefix.'.min.css'));
        rex_view::addCssFile($package->getAssetsUrl('uikit_backend_fix.css'));
        rex_view::addJsFile($package->getAssetsUrl('js/uikit.min.js'));
        rex_view::addJsFile($package->getAssetsUrl('js/uikit-icons.min.js'));
}

// Hilfsklasse einbinden
require_once rex_path::addon('uikit_collection').'lib/uikitCollection.php';

// Frontend: UIkit Assets einbinden, wenn aktiviert
if (rex::isFrontend() && $package->getConfig('include_assets', false) === true) {
    rex_extension::register('OUTPUT_FILTER', function(rex_extension_point $ep) use ($path, $prefix, $package) {
        $content = $ep->getSubject();
        
        // UIkit CSS - korrekte Pfade
        $cssFile = $package->getAssetsUrl('css/uikit'.$prefix.'.min.css');
        $cssLink = '<link rel="stylesheet" href="'.$cssFile.'">';
        
        // UIkit JS - korrekte Pfade
        $jsFile = $package->getAssetsUrl('js/uikit.min.js');
        $jsIconsFile = $package->getAssetsUrl('js/uikit-icons.min.js');
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

