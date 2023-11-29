<?php
class uikitCollection {

    public static function cke5LightboxHelper(): void
    {
        rex_extension::register('OUTPUT_FILTER', function (rex_extension_point $ep) {
            $html = $ep->getSubject();
            // Ersetze alle gefundene <figure> Tags mit der Callback-Funktion
            $html = preg_replace_callback('/<figure\b[^>]*\bclass\s*=\s*["\'][^"\']*?\bimage\b[^"\']*["\'][^>]*>.*?<a[^>]+href=[\'"]([^\'"]+?\.(jpg|jpeg|png|mp4|gif))[\'"][^>]*><img[^>]+src=[\'"]([^\'"]+?)[\'"][^>]*>.*?<\/figure>/i', function ($matches) {
                // Hole die abgeglichenen Werte
                $link = $matches[0];
                $href = $matches[1];
                $ext = $matches[2];
                $src = $matches[3];

                // Überprüfe, ob der href-Wert auf .jpg, .jpeg, .png oder .gif endet
                if (in_array($ext, ['jpg', 'jpeg', 'png', 'mp4', 'gif'])) {
                    // Ersetze das <figure> Tag mit der aktualisierten Version
                    return str_replace('<figure ', '<figure uk-lightbox ', $link);
                }
                // Ansonsten gib das Original zurück
                return $link;
            }, $html);
        }, rex_extension::LATE);
    }
    
    public static function uikitIcon($file, $ratio = 1): string {
        if (empty($file)) {
            return '';
        }

        $ext = rex_file::extension($file);
        $ext = strtolower($ext);

        $iconMap = [
            'doc' => 'file-word',
            'docx' => 'file-word',
            'xls' => 'file-excel',
            'xlsx' => 'file-excel',
            'txt' => 'file-text',
            'rtf' => 'file-text',
            'ppt' => 'file-powerpoint',
            'pptx' => 'file-powerpoint',
            'pdf' => 'file-pdf',
            'zip' => 'file-archive',
            'jpg' => 'file-image',
            'png' => 'file-image',
            'gif' => 'file-image',
        ];

        $icon = isset($iconMap[$ext]) ? $iconMap[$ext] : 'file';

        return "<span uk-icon='icon: $icon; ratio: $ratio'></span>";
    }
}
?>
