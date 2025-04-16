<?php

/**
 * @var rex_fragment $this
 * @psalm-scope-this rex_fragment
 */

// Deklaration der Variablen
$id = uniqid('uikit-countdown-');
$date = date('Y-m-d', strtotime('+1 week'));
$showdays = true;
$showhours = true;
$showminutes = true;
$showseconds = true;
$labels = true;
$separator = ':';
$textAlign = 'center';
$size = 'medium'; // small, medium, large

if (isset($this->help) && $this->help === true) {
    $help = [];
    $help['info'] = 'Das Fragment erzeugt einen UIkit-Countdown: https://getuikit.com/docs/countdown';
    $help['date'] = 'Zieldatum für den Countdown im Format YYYY-MM-DD oder YYYY-MM-DD HH:MM:SS (String)';
    $help['showdays'] = 'Zeigt die Tage an (bool, Standard: true)';
    $help['showhours'] = 'Zeigt die Stunden an (bool, Standard: true)';
    $help['showminutes'] = 'Zeigt die Minuten an (bool, Standard: true)';
    $help['showseconds'] = 'Zeigt die Sekunden an (bool, Standard: true)';
    $help['labels'] = 'Zeigt Beschriftungen unter den Zahlen an (bool, Standard: true)';
    $help['separator'] = 'Trennzeichen zwischen den Zeiteinheiten (String, Standard: :)';
    $help['textAlign'] = 'Textausrichtung: left, right, center (String, Standard: center)';
    $help['size'] = 'Größe des Countdowns: small, medium, large (String, Standard: medium)';
    dump($help);
}

// Werte überschreiben, wenn sie gesetzt sind
if (isset($this->date) && $this->date !== '') {
    $date = $this->date;
}
if (isset($this->id) && $this->id !== '') {
    $id = $this->id;
}
if (isset($this->showdays)) {
    $showdays = (bool) $this->showdays;
}
if (isset($this->showhours)) {
    $showhours = (bool) $this->showhours;
}
if (isset($this->showminutes)) {
    $showminutes = (bool) $this->showminutes;
}
if (isset($this->showseconds)) {
    $showseconds = (bool) $this->showseconds;
}
if (isset($this->labels)) {
    $labels = (bool) $this->labels;
}
if (isset($this->separator) && $this->separator !== '') {
    $separator = $this->separator;
}
if (isset($this->textAlign) && in_array($this->textAlign, ['left', 'right', 'center'])) {
    $textAlign = $this->textAlign;
}
if (isset($this->size) && in_array($this->size, ['small', 'medium', 'large'])) {
    $size = $this->size;
}

// CSS-Klassen auf Basis der Einstellungen
$sizeClass = '';
switch ($size) {
    case 'small':
        $sizeClass = 'uk-countdown-small';
        break;
    case 'large':
        $sizeClass = 'uk-countdown-large';
        break;
    default:
        $sizeClass = '';
}

// Erstellen der Countdown-Elemente
$elements = [];
if ($showdays) {
    $elements[] = '<div>
                    <div class="uk-countdown-number uk-countdown-days"></div>
                    ' . ($labels ? '<div class="uk-countdown-label uk-margin-small uk-text-center uk-visible@s">Tage</div>' : '') . '
                </div>';
}
if ($showhours) {
    if (!empty($elements) && !empty($separator)) {
        $elements[] = '<div class="uk-countdown-separator">' . $separator . '</div>';
    }
    $elements[] = '<div>
                    <div class="uk-countdown-number uk-countdown-hours"></div>
                    ' . ($labels ? '<div class="uk-countdown-label uk-margin-small uk-text-center uk-visible@s">Stunden</div>' : '') . '
                </div>';
}
if ($showminutes) {
    if (!empty($elements) && !empty($separator)) {
        $elements[] = '<div class="uk-countdown-separator">' . $separator . '</div>';
    }
    $elements[] = '<div>
                    <div class="uk-countdown-number uk-countdown-minutes"></div>
                    ' . ($labels ? '<div class="uk-countdown-label uk-margin-small uk-text-center uk-visible@s">Minuten</div>' : '') . '
                </div>';
}
if ($showseconds) {
    if (!empty($elements) && !empty($separator)) {
        $elements[] = '<div class="uk-countdown-separator">' . $separator . '</div>';
    }
    $elements[] = '<div>
                    <div class="uk-countdown-number uk-countdown-seconds"></div>
                    ' . ($labels ? '<div class="uk-countdown-label uk-margin-small uk-text-center uk-visible@s">Sekunden</div>' : '') . '
                </div>';
}

// HTML-Ausgabe
$html = '<div class="uk-text-' . $textAlign . ' uk-margin">
            <div id="' . $id . '" class="uk-grid-small uk-child-width-auto uk-flex-center ' . $sizeClass . '" uk-grid uk-countdown="date: ' . $date . '">
                ' . implode("\n", $elements) . '
            </div>
         </div>';

echo $html;
?>