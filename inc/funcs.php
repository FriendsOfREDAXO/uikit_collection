<?php
// Checks if Media is Video	
if (!function_exists('uikit_checkMedia')) {
    function uikit_checkMedia($url)
    {
        $media = rex_media::get($url);
        $checkPath = pathinfo($url);
        if ($media) {
            if (strtolower($checkPath['extension']) == "mp4") {
                return true;
            }
            if (strtolower($checkPath['extension']) == "mov") {
                return true;
            }
            if (strtolower($checkPath['extension']) == "m4v") {
                return true;
            }
        }
        return false;
    }
}
// Checks kind of URL

if (!function_exists('uikit_checklink')) {
    function uikit_checklink($url)
    {

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
                    return false;
                }
            }
            $link = $url;
            return $link;
        }
    }
} 


// deprecated Function zur Ermittlung eines Linktyps 
if (!function_exists('infolink')) {
    function infolink($url)
 {
 uikit_checklink($url);
}
}
