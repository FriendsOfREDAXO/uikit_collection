<?php
/**
 * @var rex_fragment $this
 * @psalm-scope-this rex_fragment
 */

// Hilfe anzeigen, wenn angefordert
if (isset($this->help) && $this->help === true) {
    $help = [];
    $help['info']            = 'Fragment für UIkit Modal/Dialog: https://getuikit.com/docs/modal';
    $help['id']              = 'ID für das Modal (erforderlich)';
    $help['title']           = 'Titel/Überschrift des Modals';
    $help['content']         = 'Hauptinhalt des Modals';
    $help['footer']          = 'Fußzeile des Modals';
    $help['button_text']     = 'Text für den auslösenden Button';
    $help['button_class']    = 'CSS-Klassen für den Button (Standard: uk-button uk-button-default)';
    $help['size']            = 'Größe des Modals: container, small, large, full (Standard: container)';
    $help['center']          = 'Inhalt zentrieren (true/false)';
    $help['close_button']    = 'Schließen-Button anzeigen (true/false, Standard: true)';
    $help['esc_close']       = 'Schließen mit ESC-Taste erlauben (true/false, Standard: true)';
    $help['bg_close']        = 'Schließen durch Klick im Hintergrund erlauben (true/false, Standard: true)';
    $help['stack']           = 'Für gestapelte Modals (true/false)';
    $help['full_screen']     = 'Vollbild-Modal anzeigen (true/false)';
    
    dump($help);
    return;
}

// Erforderliche Parameter prüfen
if (!isset($this->id) || empty($this->id)) {
    echo 'Fehler: Parameter "id" ist erforderlich für das Modal.';
    return;
}

// Default-Werte setzen
$id = $this->id;
$title = isset($this->title) ? $this->title : '';
$content = isset($this->content) ? $this->content : '';
$footer = isset($this->footer) ? $this->footer : '';
$buttonText = isset($this->button_text) ? $this->button_text : 'Öffnen';
$buttonClass = isset($this->button_class) ? $this->button_class : 'uk-button uk-button-default';
$size = isset($this->size) ? $this->size : 'container';
$center = isset($this->center) && $this->center === true;
$closeButton = !isset($this->close_button) || $this->close_button === true;
$escClose = !isset($this->esc_close) || $this->esc_close === true;
$bgClose = !isset($this->bg_close) || $this->bg_close === true;
$stack = isset($this->stack) && $this->stack === true;
$fullScreen = isset($this->full_screen) && $this->full_screen === true;

// Modal-Attribute
$modalAttributes = [
    'id' => $id,
    'uk-modal' => ''
];

// Optionen für uk-modal
$modalOptions = [];
if (!$escClose) {
    $modalOptions[] = 'esc-close: false';
}
if (!$bgClose) {
    $modalOptions[] = 'bg-close: false';
}
if ($stack) {
    $modalOptions[] = 'stack: true';
}
if (!empty($modalOptions)) {
    $modalAttributes['uk-modal'] = implode('; ', $modalOptions);
}

// Container-Klassen je nach Größe
$containerClass = 'uk-modal-dialog';
if ($size === 'small') {
    $containerClass .= ' uk-modal-body uk-width-large';
} elseif ($size === 'large') {
    $containerClass .= ' uk-width-2xlarge';
} elseif ($size === 'full') {
    $containerClass .= ' uk-width-viewport';
}
if ($fullScreen) {
    $containerClass .= ' uk-modal-full';
}
if ($center) {
    $containerClass .= ' uk-text-center';
}

?>

<!-- Button zum Öffnen des Modals -->
<?php if (isset($this->button_text)): ?>
<button class="<?= $buttonClass ?>" type="button" uk-toggle="target: #<?= $id ?>">
    <?= $buttonText ?>
</button>
<?php endif; ?>

<!-- Das Modal -->
<div <?= implode(' ', array_map(function($key, $value) { return $key . '="' . $value . '"'; }, array_keys($modalAttributes), $modalAttributes)) ?>>
    <div class="<?= $containerClass ?>">
        
        <?php if ($closeButton): ?>
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <?php endif; ?>
        
        <?php if ($title): ?>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title"><?= $title ?></h2>
        </div>
        <?php endif; ?>
        
        <?php if ($content): ?>
        <div class="uk-modal-body">
            <?= $content ?>
        </div>
        <?php endif; ?>
        
        <?php if ($footer): ?>
        <div class="uk-modal-footer uk-text-right">
            <?= $footer ?>
        </div>
        <?php endif; ?>
        
    </div>
</div>