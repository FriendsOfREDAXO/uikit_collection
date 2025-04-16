<?php
/**
 * @var rex_fragment $this
 * @psalm-scope-this rex_fragment
 */

// Hilfe anzeigen, wenn angefordert
if (isset($this->help) && $this->help === true) {
    $help = [];
    $help['info']            = 'Fragment für UIkit Offcanvas: https://getuikit.com/docs/offcanvas';
    $help['id']              = 'ID für das Offcanvas (erforderlich)';
    $help['title']           = 'Titel/Überschrift des Offcanvas';
    $help['content']         = 'Hauptinhalt des Offcanvas';
    $help['button_text']     = 'Text für den auslösenden Button';
    $help['button_class']    = 'CSS-Klassen für den Button (Standard: uk-button uk-button-default)';
    $help['position']        = 'Position des Offcanvas: left, right, top, bottom (Standard: left)';
    $help['mode']            = 'Animation: slide, push, reveal, none (Standard: slide)';
    $help['overlay']         = 'Overlay anzeigen (true/false, Standard: true)';
    $help['esc_close']       = 'Schließen mit ESC-Taste erlauben (true/false, Standard: true)';
    $help['bg_close']        = 'Schließen durch Klick im Hintergrund erlauben (true/false, Standard: true)';
    $help['close_button']    = 'Schließen-Button anzeigen (true/false, Standard: true)';
    $help['flip']            = 'Ausrichtung umkehren (true/false, Standard: false)';
    
    dump($help);
    return;
}

// Erforderliche Parameter prüfen
if (!isset($this->id) || empty($this->id)) {
    echo 'Fehler: Parameter "id" ist erforderlich für das Offcanvas.';
    return;
}

// Default-Werte setzen
$id = $this->id;
$title = isset($this->title) ? $this->title : '';
$content = isset($this->content) ? $this->content : '';
$buttonText = isset($this->button_text) ? $this->button_text : 'Öffnen';
$buttonClass = isset($this->button_class) ? $this->button_class : 'uk-button uk-button-default';
$position = isset($this->position) ? $this->position : 'left';
$mode = isset($this->mode) ? $this->mode : 'slide';
$overlay = !isset($this->overlay) || $this->overlay === true;
$escClose = !isset($this->esc_close) || $this->esc_close === true;
$bgClose = !isset($this->bg_close) || $this->bg_close === true;
$closeButton = !isset($this->close_button) || $this->close_button === true;
$flip = isset($this->flip) && $this->flip === true;

// Offcanvas-Attribute
$offcanvasAttributes = [
    'id' => $id,
    'uk-offcanvas' => ''
];

// Optionen für uk-offcanvas
$offcanvasOptions = ["mode: $mode"];
if ($flip) {
    $offcanvasOptions[] = 'flip: true';
}
if (!$overlay) {
    $offcanvasOptions[] = 'overlay: false';
}
if (!$escClose) {
    $offcanvasOptions[] = 'esc-close: false';
}
if (!$bgClose) {
    $offcanvasOptions[] = 'bg-close: false';
}

$offcanvasAttributes['uk-offcanvas'] = implode('; ', $offcanvasOptions);

// Container-Klassen basierend auf Position
$containerClass = 'uk-offcanvas-bar';
if ($position === 'right' || $position === 'top' || $position === 'bottom') {
    $containerClass .= " uk-offcanvas-bar-$position";
}

?>

<!-- Button zum Öffnen des Offcanvas -->
<?php if (isset($this->button_text)): ?>
<button class="<?= $buttonClass ?>" type="button" uk-toggle="target: #<?= $id ?>">
    <?= $buttonText ?>
</button>
<?php endif; ?>

<!-- Das Offcanvas -->
<div <?= implode(' ', array_map(function($key, $value) { return $key . '="' . $value . '"'; }, array_keys($offcanvasAttributes), $offcanvasAttributes)) ?>>
    <div class="<?= $containerClass ?>">
        
        <?php if ($closeButton): ?>
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        <?php endif; ?>
        
        <?php if ($title): ?>
        <h3><?= $title ?></h3>
        <?php endif; ?>
        
        <?php if ($content): ?>
        <div>
            <?= $content ?>
        </div>
        <?php endif; ?>
        
    </div>
</div>