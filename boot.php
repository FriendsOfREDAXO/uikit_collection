<?php

$this->setProperty('author', 'klxm');

if (rex::isBackend() && rex::getUser()) {

    rex_perm::register('klxm_modul[]');

    // Sortierung Medienpool aufsteigend
    if (rex::isBackend() && rex::getUser()) {

        rex_extension::register('MEDIA_LIST_QUERY', function (rex_extension_point $ep) {
            $subject = $ep->getSubject();
            $subject = str_replace("f.updatedate", "f.filename, f.updatedate", $subject);
            $subject = str_replace("desc", "asc", $subject);
            return $subject;

        });

        rex_extension::register('PACKAGES_INCLUDED', function () {
            if (rex_request_method() == 'get' && $this->getConfig('check_scss') == '1') {

                $compiler = new rex_scss_compiler();
                $scss_files = rex_extension::registerPoint(new rex_extension_point('BE_STYLE_SCSS_FILES', [$this->getPath('SCSS/uikit/own.scss')]));
                $compiler->setRootDir(rex_path::addon('klxm_defaults'));
                $compiler->setScssFile($scss_files);
                $compiler->setCssFile($this->getPath('assets/uikit/css/uikit.css'));
                $compiler->compile();
                rex_file::copy($this->getPath('assets/uikit/css/uikit.css'), $this->getAssetsPath('uikit/css/uikit.css'));
            }
        });
        rex_view::addCssFile($this->getAssetsUrl('css/styles.css'));
        rex_view::addCssFile($this->getAssetsUrl('css/text_bild_video_modul/style.css'));
        rex_view::addCssFile($this->getAssetsUrl('uikit_backend/css/uikit.css'));
        rex_view::addJsFile($this->getAssetsUrl('uikit_backend/js/uikit.min.js'));
        rex_view::addJsFile($this->getAssetsUrl('uikit_backend/js/uikit-icons.min.js'));
    }

}

