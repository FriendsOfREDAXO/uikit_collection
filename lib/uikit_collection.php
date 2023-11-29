<?php
class uikitCollection {
 if (rex::isFrontend())
    { 
    public static function cke5LightboxHelper(): void
    {
      rex_extension::register('OUTPUT_FILTER', function (rex_extension_point $ep) {
                $html = $ep->getSubject();

                // Verwende reguläre Ausdrücke, um verlinkte Bilder im HTML zu finden
                preg_match_all('/<figure\b[^>]*\bclass\s*=\s*["\'][^"\']*?\bimage\b[^"\']*["\'][^>]*>.*?<a[^>]+href=[\'"]([^\'"]+?\.(jpg|jpeg|png|mp4|gif))[\'"][^>]*><img[^>]+src=[\'"]([^\'"]+?)[\'"][^>]*>.*?<\/figure>/i', $html, $matches, PREG_SET_ORDER);

                // Durchlaufe alle Treffer
                foreach ($matches as $match) {
                    // Hole die abgeglichenen Werte
                    $link = $match[0];
                    $href = $match[1];
                    $ext = $match[2];
                    $src = $match[3];

                    // Überprüfe, ob der href-Wert auf .jpg, .jpeg, .png oder .gif endet
                    if (in_array($ext, ['jpg', 'jpeg', 'png', 'mp4', 'gif'])) {
                        // Wenn es ein Bild ist, ersetze das <figure>-Tag mit der aktualisierten Version
                        $updated_link = str_replace('<figure ', '<figure uk-lightbox ', $link);
                        $html = str_replace($link, $updated_link, $html);
                    }
                }

                // Setze das geänderte HTML als neues Subjekt
                $ep->setSubject($html);
            }, rex_extension::LATE);
    }
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
