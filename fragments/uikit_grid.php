<?php
/**
 * @var rex_fragment $this
 * @psalm-scope-this rex_fragment
 */

// Hilfe anzeigen, wenn angefordert
if (isset($this->help) && $this->help === true) {
    $help = [];
    $help['info']              = 'Fragment für UIkit Grid/Masonry Layout: https://getuikit.com/docs/grid';
    $help['items']             = 'Array mit Items. Jedes Item ist ein Array mit beliebigen Keys, die im Template ausgegeben werden können';
    $help['masonry']           = 'Masonry-Layout aktivieren (true/false)';
    $help['parallax']          = 'Parallax-Effekt in Pixel (z.B. 150)';
    $help['gap']               = 'Abstand zwischen den Items (small, medium, large oder Pixelwert)';
    $help['divider']           = 'Trennlinie zwischen den Elementen anzeigen (true/false)';
    $help['match_height']      = 'Gleiche Höhe für alle Elemente (true/false)';
    $help['grid_classes']      = 'CSS-Klassen für das Grid-Element';
    $help['cols']              = 'Anzahl der Spalten (Default: 1-2@s 1-3@m 1-4@l)';
    $help['item_template']     = 'HTML-Template für jedes Item. Verfügbare Platzhalter: {{class}}, {{index}}, alle Keys aus dem Item-Array';
    
    dump($help);
    return;
}

// Default Werte
$items = isset($this->items) && is_array($this->items) ? $this->items : [];
$masonry = isset($this->masonry) && $this->masonry === true;
$parallax = isset($this->parallax) ? (int)$this->parallax : 0;
$gap = isset($this->gap) ? $this->gap : '';
$divider = isset($this->divider) && $this->divider === true;
$matchHeight = isset($this->match_height) && $this->match_height === true;
$gridClasses = isset($this->grid_classes) ? $this->grid_classes : '';
$cols = isset($this->cols) ? $this->cols : 'uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l';
$itemTemplate = isset($this->item_template) ? $this->item_template : '<div class="{{class}}">{{content}}</div>';

if (empty($items)) {
    return;
}

// Grid-Attribute
$gridAttributes = [];
if ($masonry) {
    $gridAttributes[] = 'uk-grid="masonry: true"';
} elseif ($parallax > 0) {
    $gridAttributes[] = 'uk-grid="parallax: ' . $parallax . '"';
} else {
    $gridAttributes[] = 'uk-grid';
}

// Grid-Klassen
$gridClassList = [$cols];
if ($gap) {
    if (in_array($gap, ['small', 'medium', 'large'], true)) {
        $gridClassList[] = 'uk-grid-' . $gap;
    } elseif (is_numeric($gap)) {
        $gridClassList[] = 'uk-grid-' . $gap;
    }
}
if ($divider) {
    $gridClassList[] = 'uk-grid-divider';
}
if ($matchHeight) {
    $gridClassList[] = 'uk-grid-match';
}
if ($gridClasses) {
    $gridClassList[] = $gridClasses;
}

$gridClass = implode(' ', $gridClassList);

?>

<div class="<?= $gridClass ?>" <?= implode(' ', $gridAttributes) ?>>
    <?php foreach ($items as $index => $item): ?>
        <?php
            // Bereite ein Item-Template vor
            $itemHtml = $itemTemplate;
            
            // Ersetze den Klassen-Platzhalter
            $itemHtml = str_replace('{{class}}', 'uk-grid-item ' . (isset($item['class']) ? $item['class'] : ''), $itemHtml);
            
            // Ersetze den Index-Platzhalter
            $itemHtml = str_replace('{{index}}', $index, $itemHtml);
            
            // Ersetze alle Item-Schlüssel als Platzhalter
            foreach ($item as $key => $value) {
                $itemHtml = str_replace('{{' . $key . '}}', $value, $itemHtml);
            }
            
            echo $itemHtml;
        ?>
    <?php endforeach; ?>
</div>