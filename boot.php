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
        rex_view::addCssFile(rex_url::frontend($path.'css/uikit'.$prefix.'.min.css'));
        rex_view::addCssFile($package->getAssetsUrl('/uikit_backend_fix.css'));
        rex_view::addJsFile(rex_url::frontend($path.'js/uikit.min.js'));
        rex_view::addJsFile(rex_url::frontend($path.'js/uikit-icons.min.js'));
}
rex_extension::register('PACKAGES_INCLUDED', function($ep) {
       # include_once rex_path::addon('uikit_collection/inc').'funcs.php';
});
 
