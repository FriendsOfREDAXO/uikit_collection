<?php

if (!function_exists('infolink')) {

    function infolink($url) {

        // Wurde ein Wert für $url übergeben?
        if ($url) {

            // Prüfe ob es sich um eine URL handelt, dann weiter
            if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
                
            }
            // Ist es eine Mediendatei?
            if (file_exists(rex_path::media($url)) === true) {
                $url = rex_url::media($url);
            } else {
                // Ist es keine Mediendatei oder URL, dann als Redaxo-Artikel-ID behandeln
                if (filter_var($url, FILTER_VALIDATE_URL) === FALSE and is_numeric($url)) {
                    $url = rex_getUrl($url);
                }
            }
            $link = $url;
            return $link;
        }
    }

}