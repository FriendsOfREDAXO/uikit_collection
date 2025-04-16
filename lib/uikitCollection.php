<?php

class uikitCollection
{
    /**
     * Fügt UIkit-Lightbox-Funktionalität zu Bildern hinzu, die mit Bildern oder MP4-Dateien verlinkt sind
     *
     * @param string $selector Optional: CSS-Selector, Standard ist 'main'
     * @return void
     */
    public static function cke5LightboxHelper($selector = 'main')
    {
        rex_extension::register('OUTPUT_FILTER', function (rex_extension_point $ep) use ($selector) {
            $subject = $ep->getSubject();
            
            // Finde alle img-Tags mit einem a-Tag als Elternelement
            $pattern = '/<a\s+(?:[^>]*?\s+)?href="([^"]*\.(jpg|jpeg|png|gif|mp4|webm|ogg))"[^>]*>(\s*<img[^>]*>)/i';
            $replacement = '<a href="$1" data-uk-lightbox>$3';
            
            // Finde Selektoren im Content und wende Ersetzung an
            $content = preg_replace_callback(
                '/<' . preg_quote($selector, '/') . '[^>]*>(.*?)<\/' . preg_quote($selector, '/') . '>/si',
                function ($matches) use ($pattern, $replacement) {
                    return '<' . $selector . '>' . preg_replace($pattern, $replacement, $matches[1]) . '</' . $selector . '>';
                },
                $subject
            );
            
            return $content;
        });
    }

    /**
     * Gibt ein UIkit-Icon für den angegebenen Dateityp zurück
     *
     * @param string $filename Dateiname
     * @param int $ratio Größenverhältnis des Icons, Standard ist 1
     * @return string HTML des Icons
     */
    public static function uikitIcon($filename, $ratio = 1)
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $icon = 'file';
        
        switch (strtolower($ext)) {
            case 'pdf':
                $icon = 'file-pdf';
                break;
            case 'doc':
            case 'docx':
                $icon = 'file-text';
                break;
            case 'xls':
            case 'xlsx':
                $icon = 'file-excel';
                break;
            case 'ppt':
            case 'pptx':
                $icon = 'file-powerpoint';
                break;
            case 'zip':
            case 'rar':
            case 'tar':
            case 'gz':
                $icon = 'file-archive';
                break;
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
                $icon = 'file-image';
                break;
            case 'mp3':
            case 'wav':
            case 'ogg':
                $icon = 'file-audio';
                break;
            case 'mp4':
            case 'avi':
            case 'mov':
                $icon = 'file-video';
                break;
        }
        
        return '<span uk-icon="icon: ' . $icon . '; ratio: ' . $ratio . '"></span>';
    }
}