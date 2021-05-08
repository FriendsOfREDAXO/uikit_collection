<?php
if (rex_plugin::get('yform', 'manager')->isAvailable()) {
    rex_yform::addTemplatePath($this->getPath('ytemplates'));
}

if (rex::isBackend() && rex::getUser()) {
    rex_perm::register('uikit_modul[]');
    rex_view::addCssFile($this->getAssetsUrl('css/styles.css'));
        rex_view::addCssFile($this->getAssetsUrl('uikit/css/uikit.min.css'));
        rex_view::addJsFile($this->getAssetsUrl('uikit/js/uikit.min.js'));
        rex_view::addJsFile($this->getAssetsUrl('uikit/js/uikit-icons.min.js'));
}

    rex_extension::register('PACKAGES_INCLUDED', function($ep) {
        include_once rex_path::addon('uikit_collection/inc').'infolink_func.php';
    });
