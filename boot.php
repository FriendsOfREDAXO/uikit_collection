<?php
if (rex::isBackend() && rex::getUser()) {
    rex_perm::register('uikit_modul[]');
    rex_view::addCssFile($this->getAssetsUrl('css/styles.css'));
        rex_view::addCssFile($this->getAssetsUrl('uikit_backend/css/uikit.css'));
        rex_view::addJsFile($this->getAssetsUrl('uikit_backend/js/uikit.min.js'));
        rex_view::addJsFile($this->getAssetsUrl('uikit_backend/js/uikit-icons.min.js'));
}

    rex_extension::register('PACKAGES_INCLUDED', function($ep) {
        include_once rex_path::addon('uikit_collection/inc').'functions.php';
    });