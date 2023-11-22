<?php
class uikitCollection {

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

        return "<span uk-icon='icon: $icon; ratio: $ratio'></span>&nbsp;";
    }
}
?>
