<?php
if (rex_plugin::get('yform', 'manager')->isAvailable()) {
    rex_yform::addTemplatePath($this->getPath('ytemplates'));
}

if (rex::isBackend() && rex::getUser()) {
    rex_perm::register('uikit_modul[]');
        rex_view::addCssFile($this->getAssetsUrl('uikit/dist/css/uikit.min.css'));
        rex_view::addCssFile($this->getAssetsUrl('uikit_backend_fix.css'));
        rex_view::addJsFile($this->getAssetsUrl('uikit/dist/js/uikit.min.js'));
        rex_view::addJsFile($this->getAssetsUrl('uikit/dist/js/uikit-icons.min.js'));
}
rex_extension::register('PACKAGES_INCLUDED', function($ep) {
       # include_once rex_path::addon('uikit_collection/inc').'funcs.php';
});
 
