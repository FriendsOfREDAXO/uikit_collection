<?php
if (rex::isBackend() && rex::getUser()) {

    rex_perm::register('uikit_modul[]');

        rex_extension::register('PACKAGES_INCLUDED', function () {
            if (rex_request_method() == 'get' && $this->getConfig('check_scss') == '1') {

                $compiler = new rex_scss_compiler();
                $scss_files = rex_extension::registerPoint(new rex_extension_point('BE_STYLE_SCSS_FILES', [$this->getPath('SCSS/uikit/my-theme.scss')]));
                $compiler->setRootDir(rex_path::addon('uikit_collection'));
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

