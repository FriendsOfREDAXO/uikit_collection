<?php
/**
 * UIkit Collection Demo Seite
 */
// Aktiver Tab
$currentTab = rex_request('component', 'string', 'overview');

// Definiere die Tabs für die Demo-Seite
$tabs = [
    'overview' => 'Übersicht',
    'accordions' => 'Akkordeon & Tabs',
    'cards' => 'Cards',
    'gallery' => 'Galerie',
    'slideshow' => 'Slideshow',
    'grid' => 'Grid',
    'modal' => 'Modal',
    'notification' => 'Benachrichtigungen',
    'offcanvas' => 'Offcanvas',
    'countdown' => 'Countdown'
];

// Navigation erstellen
echo '<div class="nav-tabs-wrapper">';
echo '<nav class="navbar navbar-default" role="navigation">';
echo '<div class="container-fluid">';
echo '<div class="navbar-header"><div class="navbar-brand">UIkit Collection Demo</div></div>';
echo '<ul class="nav navbar-nav">';

foreach ($tabs as $key => $value) {
    $class = ($key === $currentTab) ? ' active' : '';
    echo '<li class="' . $class . '"><a href="' . rex_url::currentBackendPage(['component' => $key]) . '">' . $value . '</a></li>';
}

echo '</ul>';
echo '</div>';
echo '</nav>';
echo '</div>';

// Inhalte anzeigen basierend auf dem ausgewählten Tab
$content = '';

switch ($currentTab) {
    case 'overview':
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-width-1-1 uk-margin-bottom">';
        $content .= '<h2 class="uk-card-title">Willkommen zur UIkit Collection Demo</h2>';
        $content .= '<p>Diese Demo-Seite zeigt die verschiedenen UIkit-Elemente und Fragmente, die in der UIkit Collection enthalten sind.</p>';
        $content .= '<p>Wählen Sie oben einen der Tabs, um die entsprechenden Komponenten zu sehen.</p>';

        $content .= '<h3>Verfügbare Fragmente:</h3>';
        $content .= '<ul class="uk-list uk-list-divider">';
        foreach ($tabs as $key => $value) {
            if ($key !== 'overview') {
                $content .= '<li><a href="' . rex_url::currentBackendPage(['component' => $key]) . '"><strong>' . $value . '</strong></a></li>';
            }
        }
        $content .= '</ul>';

        $content .= '</div>';
        
        // Aktuelle Uhrzeit und Datum anzeigen
        $content .= '<div class="uk-alert-primary uk-margin-medium-bottom" uk-alert>';
        $content .= '<p>Heute ist der ' . date('d.m.Y') . ' und die aktuelle Uhrzeit ist ' . date('H:i:s') . ' Uhr.</p>';
        $content .= '</div>';
        
        break;

    case 'countdown':
        // Countdown Demo
        $content .= '<h2>Countdown-Komponente</h2>';
        $content .= '<p class="lead">Das Fragment <code>uikit_countdown.php</code> ermöglicht die einfache Erstellung von Countdown-Timern für Events oder Aktionen.</p>';

        // Beispiel 1: Standard-Countdown
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Beispiel 1: Standard-Countdown</h3>';
        $content .= '<p>Ein einfacher Countdown mit allen Standardeinstellungen (Ziel: 1 Woche in der Zukunft):</p>';

        $content .= '<pre><code>&lt;?php
$fragment = new rex_fragment();
echo $fragment->parse(\'uikit_countdown.php\');
?&gt;</code></pre>';

        $content .= '<div class="uk-background-muted uk-padding">';
        
        $fragment = new rex_fragment();
        $content .= $fragment->parse('uikit_countdown.php');
        
        $content .= '</div>';
        $content .= '</div>';

        // Beispiel 2: Angepasster Countdown
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Beispiel 2: Angepasster Countdown</h3>';
        $content .= '<p>Ein Countdown mit angepasstem Datum, Größe und ohne Sekunden-Anzeige:</p>';

        $content .= '<pre><code>&lt;?php
$fragment = new rex_fragment();
$fragment->setVar(\'date\', \'2026-01-01\', false);
$fragment->setVar(\'size\', \'large\', false);
$fragment->setVar(\'showseconds\', false, false);
$fragment->setVar(\'separator\', \'.\', false);
echo $fragment->parse(\'uikit_countdown.php\');
?&gt;</code></pre>';

        $content .= '<div class="uk-background-muted uk-padding">';
        
        $fragment = new rex_fragment();
        $fragment->setVar('date', '2026-01-01', false);
        $fragment->setVar('size', 'large', false);
        $fragment->setVar('showseconds', false, false);
        $fragment->setVar('separator', '.', false);
        $content .= $fragment->parse('uikit_countdown.php');
        
        $content .= '</div>';
        $content .= '</div>';

        // Beispiel 3: Minimal-Countdown
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Beispiel 3: Minimal-Countdown</h3>';
        $content .= '<p>Ein minimalistischer Countdown ohne Labels und nur mit Stunden und Minuten:</p>';

        $content .= '<pre><code>&lt;?php
$fragment = new rex_fragment();
$fragment->setVar(\'date\', date(\'Y-m-d H:i:s\', strtotime(\'+2 hours +30 minutes\')), false);
$fragment->setVar(\'showdays\', false, false);
$fragment->setVar(\'showseconds\', false, false);
$fragment->setVar(\'labels\', false, false);
$fragment->setVar(\'size\', \'small\', false);
$fragment->setVar(\'textAlign\', \'left\', false);
echo $fragment->parse(\'uikit_countdown.php\');
?&gt;</code></pre>';

        $content .= '<div class="uk-background-muted uk-padding">';
        
        $fragment = new rex_fragment();
        $fragment->setVar('date', date('Y-m-d H:i:s', strtotime('+2 hours +30 minutes')), false);
        $fragment->setVar('showdays', false, false);
        $fragment->setVar('showseconds', false, false);
        $fragment->setVar('labels', false, false);
        $fragment->setVar('size', 'small', false);
        $fragment->setVar('textAlign', 'left', false);
        $content .= $fragment->parse('uikit_countdown.php');
        
        $content .= '</div>';
        $content .= '</div>';

        // Parameter-Dokumentation
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Parameter</h3>';
        $content .= '<p>Die folgenden Parameter können für das Countdown-Fragment gesetzt werden:</p>';

        $content .= '<div class="uk-overflow-auto">';
        $content .= '<table class="uk-table uk-table-divider uk-table-hover uk-table-small">';
        $content .= '<thead><tr><th>Parameter</th><th>Typ</th><th>Standard</th><th>Beschreibung</th></tr></thead>';
        $content .= '<tbody>';
        $content .= '<tr><td><code>date</code></td><td>String</td><td>+1 Woche</td><td>Zieldatum für den Countdown im Format YYYY-MM-DD oder YYYY-MM-DD HH:MM:SS</td></tr>';
        $content .= '<tr><td><code>id</code></td><td>String</td><td>auto-generiert</td><td>Eine eindeutige ID für das Countdown-Element</td></tr>';
        $content .= '<tr><td><code>showdays</code></td><td>Bool</td><td>true</td><td>Zeigt die Tage an</td></tr>';
        $content .= '<tr><td><code>showhours</code></td><td>Bool</td><td>true</td><td>Zeigt die Stunden an</td></tr>';
        $content .= '<tr><td><code>showminutes</code></td><td>Bool</td><td>true</td><td>Zeigt die Minuten an</td></tr>';
        $content .= '<tr><td><code>showseconds</code></td><td>Bool</td><td>true</td><td>Zeigt die Sekunden an</td></tr>';
        $content .= '<tr><td><code>labels</code></td><td>Bool</td><td>true</td><td>Zeigt Beschriftungen unter den Zahlen an</td></tr>';
        $content .= '<tr><td><code>separator</code></td><td>String</td><td>:</td><td>Trennzeichen zwischen den Zeiteinheiten</td></tr>';
        $content .= '<tr><td><code>textAlign</code></td><td>String</td><td>center</td><td>Textausrichtung: left, right, center</td></tr>';
        $content .= '<tr><td><code>size</code></td><td>String</td><td>medium</td><td>Größe des Countdowns: small, medium, large</td></tr>';
        $content .= '</tbody>';
        $content .= '</table>';
        $content .= '</div>';
        $content .= '</div>';
        
        break;

    case 'accordions':
        // Accordions & Tabs Demo
        $content .= '<h2>Akkordeon & Tabs</h2>';
        $content .= '<p class="lead">Das Fragment <code>uikit_accordeon_tabs.php</code> kann für Akkordeons und Tabs verwendet werden.</p>';
        
        // Beispiel für Accordion
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Beispiel: Akkordeon</h3>';
        
        $content .= '<pre><code>&lt;?php
$accordion_items = [
    [
        \'titel\' => \'Erster Abschnitt\',
        \'text\' => \'&lt;p&gt;Inhalt des ersten Abschnitts.&lt;/p&gt;\',
    ],
    [
        \'titel\' => \'Zweiter Abschnitt\',
        \'text\' => \'&lt;p&gt;Inhalt des zweiten Abschnitts.&lt;/p&gt;\'
    ]
];

$fragment = new rex_fragment();
$fragment->setVar(\'items\', $accordion_items, false);
$fragment->setVar(\'type\', \'1\', false); // 1 für Accordion
echo $fragment->parse(\'uikit_accordeon_tabs.php\');
?&gt;</code></pre>';

        $content .= '<div class="uk-background-muted uk-padding">';
        
        $accordion_items = [
            [
                'titel' => 'Erster Abschnitt',
                'text' => '<p>Inhalt des ersten Abschnitts.</p>',
            ],
            [
                'titel' => 'Zweiter Abschnitt',
                'text' => '<p>Inhalt des zweiten Abschnitts.</p>'
            ]
        ];

        $fragment = new rex_fragment();
        $fragment->setVar('items', $accordion_items, false);
        $fragment->setVar('type', '1', false); // 1 für Accordion
        $content .= $fragment->parse('uikit_accordeon_tabs.php');
        
        $content .= '</div>';
        $content .= '</div>';
        
        break;

    case 'cards':
        // Cards Demo
        $content .= '<h2>Cards</h2>';
        $content .= '<p class="lead">Das Fragment <code>uikit_card.php</code> ermöglicht das einfache Erstellen von Card-Layouts.</p>';
        
        // Beispiel 1: Einfache Card
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Beispiel 1: Einfache Card</h3>';
        
        $content .= '<pre><code>&lt;?php
$media = \'&lt;img src="/media/beispiel_bild.jpg" alt="Beispielbild"&gt;\';
$title = \'Beispiel Card\';
$body = \'&lt;p&gt;Dies ist ein Beispieltext für eine UIkit Card.&lt;/p&gt;\';
$footer = \'&lt;a href="#" class="uk-button uk-button-text"&gt;Mehr erfahren&lt;/a&gt;\';

$fragment = new rex_fragment();
$fragment->setVar(\'media\', $media, false);
$fragment->setVar(\'title\', $title, false);
$fragment->setVar(\'body\', $body, false);
$fragment->setVar(\'footer\', $footer, false);
$fragment->setVar(\'main_attributes\', [\'class\' => \'uk-card-default uk-card-hover\'], false);
echo $fragment->parse(\'uikit_card.php\');
?&gt;</code></pre>';

        $content .= '<div class="uk-background-muted uk-padding">';
        
        $media = '<div style="height:200px;background:#f0f0f0;display:flex;align-items:center;justify-content:center">Beispielbild</div>';
        $title = 'Beispiel Card';
        $body = '<p>Dies ist ein Beispieltext für eine UIkit Card.</p>';
        $footer = '<a href="#" class="uk-button uk-button-text">Mehr erfahren</a>';

        $fragment = new rex_fragment();
        $fragment->setVar('media', $media, false);
        $fragment->setVar('title', $title, false);
        $fragment->setVar('body', $body, false);
        $fragment->setVar('footer', $footer, false);
        $fragment->setVar('main_attributes', ['class' => 'uk-card-default uk-card-hover'], false);
        $content .= $fragment->parse('uikit_card.php');
        
        $content .= '</div>';
        $content .= '</div>';
        
        // Beispiel 2: Card-Varianten
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Beispiel 2: Card-Varianten (Default, Primary, Secondary)</h3>';
        $content .= '<p>UIkit bietet verschiedene Stilvarianten für Cards:</p>';
        
        $content .= '<pre><code>&lt;?php
// Eine Funktion zur Card-Erstellung mit verschiedenen Stilen
function create_card($title, $style) {
    $body = \'&lt;p&gt;Diese Card verwendet den \' . $style . \' Stil.&lt;/p&gt;\';
    $footer = \'&lt;a href="#" class="uk-button uk-button-text"&gt;Aktion&lt;/a&gt;\';
    
    $fragment = new rex_fragment();
    $fragment->setVar(\'title\', $title, false);
    $fragment->setVar(\'body\', $body, false);
    $fragment->setVar(\'footer\', $footer, false);
    $fragment->setVar(\'main_attributes\', [\'class\' => \'uk-card-\' . $style . \' uk-card-hover\'], false);
    return $fragment->parse(\'uikit_card.php\');
}

// Default Card
echo create_card(\'Default Card\', \'default\');

// Primary Card
echo create_card(\'Primary Card\', \'primary\');

// Secondary Card
echo create_card(\'Secondary Card\', \'secondary\');
?&gt;</code></pre>';

        $content .= '<div class="uk-background-muted uk-padding">';
        $content .= '<div class="uk-child-width-1-3@m" uk-grid>';
        
        // Default Card
        $content .= '<div>';
        $fragment = new rex_fragment();
        $fragment->setVar('title', 'Default Card', false);
        $fragment->setVar('body', '<p>Diese Card verwendet den default Stil.</p>', false);
        $fragment->setVar('footer', '<a href="#" class="uk-button uk-button-text">Aktion</a>', false);
        $fragment->setVar('main_attributes', ['class' => 'uk-card-default uk-card-hover'], false);
        $content .= $fragment->parse('uikit_card.php');
        $content .= '</div>';
        
        // Primary Card
        $content .= '<div>';
        $fragment = new rex_fragment();
        $fragment->setVar('title', 'Primary Card', false);
        $fragment->setVar('body', '<p>Diese Card verwendet den primary Stil.</p>', false);
        $fragment->setVar('footer', '<a href="#" class="uk-button uk-button-text">Aktion</a>', false);
        $fragment->setVar('main_attributes', ['class' => 'uk-card-primary uk-card-hover'], false);
        $content .= $fragment->parse('uikit_card.php');
        $content .= '</div>';
        
        // Secondary Card
        $content .= '<div>';
        $fragment = new rex_fragment();
        $fragment->setVar('title', 'Secondary Card', false);
        $fragment->setVar('body', '<p>Diese Card verwendet den secondary Stil.</p>', false);
        $fragment->setVar('footer', '<a href="#" class="uk-button uk-button-text">Aktion</a>', false);
        $fragment->setVar('main_attributes', ['class' => 'uk-card-secondary uk-card-hover'], false);
        $content .= $fragment->parse('uikit_card.php');
        $content .= '</div>';
        
        $content .= '</div>';
        $content .= '</div>';
        $content .= '</div>';

        // Beispiel 3: Cards mit verschiedenen Größen
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Beispiel 3: Cards mit verschiedenen Größen</h3>';
        $content .= '<p>UIkit Cards können in verschiedenen Größen dargestellt werden:</p>';
        
        $content .= '<pre><code>&lt;?php
// Klein (Small)
$fragment = new rex_fragment();
$fragment->setVar(\'title\', \'Small Card\', false);
$fragment->setVar(\'body\', \'&lt;p&gt;Eine kleine Card.&lt;/p&gt;\', false);
$fragment->setVar(\'main_attributes\', [\'class\' => \'uk-card-default uk-card-small\'], false);
echo $fragment->parse(\'uikit_card.php\');

// Standard (keine Größenangabe)
$fragment = new rex_fragment();
$fragment->setVar(\'title\', \'Standard Card\', false);
$fragment->setVar(\'body\', \'&lt;p&gt;Eine Card in Standardgröße.&lt;/p&gt;\', false);
$fragment->setVar(\'main_attributes\', [\'class\' => \'uk-card-default\'], false);
echo $fragment->parse(\'uikit_card.php\');

// Groß (Large)
$fragment = new rex_fragment();
$fragment->setVar(\'title\', \'Large Card\', false);
$fragment->setVar(\'body\', \'&lt;p&gt;Eine große Card.&lt;/p&gt;\', false);
$fragment->setVar(\'main_attributes\', [\'class\' => \'uk-card-default uk-card-large\'], false);
echo $fragment->parse(\'uikit_card.php\');
?&gt;</code></pre>';

        $content .= '<div class="uk-background-muted uk-padding">';
        
        // Klein (Small)
        $fragment = new rex_fragment();
        $fragment->setVar('title', 'Small Card', false);
        $fragment->setVar('body', '<p>Eine kleine Card.</p>', false);
        $fragment->setVar('main_attributes', ['class' => 'uk-card-default uk-card-small uk-margin-bottom'], false);
        $content .= $fragment->parse('uikit_card.php');
        
        // Standard (keine Größenangabe)
        $fragment = new rex_fragment();
        $fragment->setVar('title', 'Standard Card', false);
        $fragment->setVar('body', '<p>Eine Card in Standardgröße.</p>', false);
        $fragment->setVar('main_attributes', ['class' => 'uk-card-default uk-margin-bottom'], false);
        $content .= $fragment->parse('uikit_card.php');
        
        // Groß (Large)
        $fragment = new rex_fragment();
        $fragment->setVar('title', 'Large Card', false);
        $fragment->setVar('body', '<p>Eine große Card.</p>', false);
        $fragment->setVar('main_attributes', ['class' => 'uk-card-default uk-card-large'], false);
        $content .= $fragment->parse('uikit_card.php');
        
        $content .= '</div>';
        $content .= '</div>';
        
        // Beispiel 4: Cards in einem Grid-Layout
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Beispiel 4: Cards in einem Grid-Layout</h3>';
        $content .= '<p>Mehrere Cards können mit dem UIkit Grid-System übersichtlich angeordnet werden:</p>';
        
        $content .= '<pre><code>&lt;?php
// Funktion zum Erstellen einer Card
function create_card_for_grid($title, $body, $style = \'default\', $size = \'\') {
    $sizeClass = $size ? " uk-card-$size" : \'\';
    $media = \'&lt;div style="height:120px;background:#f0f0f0;display:flex;align-items:center;justify-content:center"&gt;Bild&lt;/div&gt;\';
    
    $fragment = new rex_fragment();
    $fragment->setVar(\'title\', $title, false);
    $fragment->setVar(\'media\', $media, false);
    $fragment->setVar(\'body\', $body, false);
    $fragment->setVar(\'footer\', \'&lt;a href="#" class="uk-button uk-button-text"&gt;Mehr&lt;/a&gt;\', false);
    $fragment->setVar(\'main_attributes\', [\'class\' => "uk-card-$style uk-card-hover$sizeClass"], false);
    return $fragment->parse(\'uikit_card.php\');
}

// Cards mit Grid-Layout ausgeben
echo \'&lt;div class="uk-grid-match uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m" uk-grid&gt;\';

echo \'&lt;div&gt;\';
echo create_card_for_grid(\'Card 1\', \'&lt;p&gt;Beschreibung der ersten Card.&lt;/p&gt;\');
echo \'&lt;/div&gt;\';

echo \'&lt;div&gt;\';
echo create_card_for_grid(\'Card 2\', \'&lt;p&gt;Beschreibung der zweiten Card.&lt;/p&gt;\', \'primary\');
echo \'&lt;/div&gt;\';

echo \'&lt;div&gt;\';
echo create_card_for_grid(\'Card 3\', \'&lt;p&gt;Beschreibung der dritten Card.&lt;/p&gt;\', \'secondary\');
echo \'&lt;/div&gt;\';

echo \'&lt;div&gt;\';
echo create_card_for_grid(\'Card 4\', \'&lt;p&gt;Beschreibung der vierten Card.&lt;/p&gt;\', \'default\', \'small\');
echo \'&lt;/div&gt;\';

echo \'&lt;div&gt;\';
echo create_card_for_grid(\'Card 5\', \'&lt;p&gt;Beschreibung der fünften Card.&lt;/p&gt;\', \'primary\', \'small\');
echo \'&lt;/div&gt;\';

echo \'&lt;div&gt;\';
echo create_card_for_grid(\'Card 6\', \'&lt;p&gt;Beschreibung der sechsten Card.&lt;/p&gt;\', \'secondary\', \'small\');
echo \'&lt;/div&gt;\';

echo \'&lt;/div&gt;\';
?&gt;</code></pre>';

        $content .= '<div class="uk-background-muted uk-padding">';
        
        $content .= '<div class="uk-grid-match uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m" uk-grid>';
        
        // Card 1
        $content .= '<div>';
        $media = '<div style="height:120px;background:#f0f0f0;display:flex;align-items:center;justify-content:center">Bild</div>';
        $fragment = new rex_fragment();
        $fragment->setVar('title', 'Card 1', false);
        $fragment->setVar('media', $media, false);
        $fragment->setVar('body', '<p>Beschreibung der ersten Card.</p>', false);
        $fragment->setVar('footer', '<a href="#" class="uk-button uk-button-text">Mehr</a>', false);
        $fragment->setVar('main_attributes', ['class' => 'uk-card-default uk-card-hover'], false);
        $content .= $fragment->parse('uikit_card.php');
        $content .= '</div>';
        
        // Card 2
        $content .= '<div>';
        $media = '<div style="height:120px;background:#f0f0f0;display:flex;align-items:center;justify-content:center">Bild</div>';
        $fragment = new rex_fragment();
        $fragment->setVar('title', 'Card 2', false);
        $fragment->setVar('media', $media, false);
        $fragment->setVar('body', '<p>Beschreibung der zweiten Card.</p>', false);
        $fragment->setVar('footer', '<a href="#" class="uk-button uk-button-text">Mehr</a>', false);
        $fragment->setVar('main_attributes', ['class' => 'uk-card-primary uk-card-hover'], false);
        $content .= $fragment->parse('uikit_card.php');
        $content .= '</div>';
        
        // Card 3
        $content .= '<div>';
        $media = '<div style="height:120px;background:#f0f0f0;display:flex;align-items:center;justify-content:center">Bild</div>';
        $fragment = new rex_fragment();
        $fragment->setVar('title', 'Card 3', false);
        $fragment->setVar('media', $media, false);
        $fragment->setVar('body', '<p>Beschreibung der dritten Card.</p>', false);
        $fragment->setVar('footer', '<a href="#" class="uk-button uk-button-text">Mehr</a>', false);
        $fragment->setVar('main_attributes', ['class' => 'uk-card-secondary uk-card-hover'], false);
        $content .= $fragment->parse('uikit_card.php');
        $content .= '</div>';
        
        // Card 4
        $content .= '<div>';
        $media = '<div style="height:120px;background:#f0f0f0;display:flex;align-items:center;justify-content:center">Bild</div>';
        $fragment = new rex_fragment();
        $fragment->setVar('title', 'Card 4', false);
        $fragment->setVar('media', $media, false);
        $fragment->setVar('body', '<p>Beschreibung der vierten Card.</p>', false);
        $fragment->setVar('footer', '<a href="#" class="uk-button uk-button-text">Mehr</a>', false);
        $fragment->setVar('main_attributes', ['class' => 'uk-card-default uk-card-hover uk-card-small'], false);
        $content .= $fragment->parse('uikit_card.php');
        $content .= '</div>';
        
        // Card 5
        $content .= '<div>';
        $media = '<div style="height:120px;background:#f0f0f0;display:flex;align-items:center;justify-content:center">Bild</div>';
        $fragment = new rex_fragment();
        $fragment->setVar('title', 'Card 5', false);
        $fragment->setVar('media', $media, false);
        $fragment->setVar('body', '<p>Beschreibung der fünften Card.</p>', false);
        $fragment->setVar('footer', '<a href="#" class="uk-button uk-button-text">Mehr</a>', false);
        $fragment->setVar('main_attributes', ['class' => 'uk-card-primary uk-card-hover uk-card-small'], false);
        $content .= $fragment->parse('uikit_card.php');
        $content .= '</div>';
        
        // Card 6
        $content .= '<div>';
        $media = '<div style="height:120px;background:#f0f0f0;display:flex;align-items:center;justify-content:center">Bild</div>';
        $fragment = new rex_fragment();
        $fragment->setVar('title', 'Card 6', false);
        $fragment->setVar('media', $media, false);
        $fragment->setVar('body', '<p>Beschreibung der sechsten Card.</p>', false);
        $fragment->setVar('footer', '<a href="#" class="uk-button uk-button-text">Mehr</a>', false);
        $fragment->setVar('main_attributes', ['class' => 'uk-card-secondary uk-card-hover uk-card-small'], false);
        $content .= $fragment->parse('uikit_card.php');
        $content .= '</div>';
        
        $content .= '</div>';
        $content .= '</div>';
        $content .= '</div>';
        
        // Beispiel 5: Media-Platzierung bei Cards
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Beispiel 5: Medieninhalte oben oder unten platzieren</h3>';
        $content .= '<p>Bilder können bei Cards oben oder unten positioniert werden:</p>';
        
        $content .= '<pre><code>&lt;?php
// Media oben (Standard)
$media_top = \'&lt;img src="/media/beispiel_bild.jpg" alt="Beispielbild"&gt;\';
$fragment = new rex_fragment();
$fragment->setVar(\'title\', \'Media oben\', false);
$fragment->setVar(\'media\', $media_top, false);
$fragment->setVar(\'body\', \'&lt;p&gt;Das Bild wird standardmäßig oben angezeigt.&lt;/p&gt;\', false);
$fragment->setVar(\'main_attributes\', [\'class\' => \'uk-card-default\'], false);
echo $fragment->parse(\'uikit_card.php\');

// Media unten
$media_bottom = \'&lt;img src="/media/beispiel_bild.jpg" alt="Beispielbild"&gt;\';
$fragment = new rex_fragment();
$fragment->setVar(\'title\', \'Media unten\', false);
$fragment->setVar(\'media\', $media_bottom, false);
$fragment->setVar(\'media_bottom\', true, false); // Media unten anzeigen
$fragment->setVar(\'body\', \'&lt;p&gt;Das Bild wird unten angezeigt.&lt;/p&gt;\', false);
$fragment->setVar(\'main_attributes\', [\'class\' => \'uk-card-default\'], false);
echo $fragment->parse(\'uikit_card.php\');
?&gt;</code></pre>';

        $content .= '<div class="uk-background-muted uk-padding">';
        $content .= '<div class="uk-child-width-1-2@s" uk-grid>';
        
        // Media oben
        $content .= '<div>';
        $media_top = '<div style="height:150px;background:#e1e1e1;display:flex;align-items:center;justify-content:center">Bild oben</div>';
        $fragment = new rex_fragment();
        $fragment->setVar('title', 'Media oben', false);
        $fragment->setVar('media', $media_top, false);
        $fragment->setVar('body', '<p>Das Bild wird standardmäßig oben angezeigt.</p>', false);
        $fragment->setVar('main_attributes', ['class' => 'uk-card-default'], false);
        $content .= $fragment->parse('uikit_card.php');
        $content .= '</div>';
        
        // Media unten
        $content .= '<div>';
        $media_bottom = '<div style="height:150px;background:#e1e1e1;display:flex;align-items:center;justify-content:center">Bild unten</div>';
        $fragment = new rex_fragment();
        $fragment->setVar('title', 'Media unten', false);
        $fragment->setVar('media', $media_bottom, false);
        $fragment->setVar('media_bottom', true, false);
        $fragment->setVar('body', '<p>Das Bild wird unten angezeigt.</p>', false);
        $fragment->setVar('main_attributes', ['class' => 'uk-card-default'], false);
        $content .= $fragment->parse('uikit_card.php');
        $content .= '</div>';
        
        $content .= '</div>';
        $content .= '</div>';
        $content .= '</div>';

        // Parameter-Dokumentation
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Parameter</h3>';
        $content .= '<p>Die folgenden Parameter können für das Card-Fragment gesetzt werden:</p>';

        $content .= '<div class="uk-overflow-auto">';
        $content .= '<table class="uk-table uk-table-divider uk-table-hover uk-table-small">';
        $content .= '<thead><tr><th>Parameter</th><th>Typ</th><th>Beschreibung</th></tr></thead>';
        $content .= '<tbody>';
        $content .= '<tr><td><code>media</code></td><td>String</td><td>Nimmt Markup für ein Medium/Bild an</td></tr>';
        $content .= '<tr><td><code>media_bottom</code></td><td>Boolean</td><td>Definiert, ob das Medium am Ende dargestellt werden soll</td></tr>';
        $content .= '<tr><td><code>title</code></td><td>String</td><td>Titel bzw. Header der Card</td></tr>';
        $content .= '<tr><td><code>body</code></td><td>String</td><td>Hauptinhalt der Card</td></tr>';
        $content .= '<tr><td><code>body_prepend</code></td><td>String</td><td>Inhalt vor dem Body</td></tr>';
        $content .= '<tr><td><code>body_append</code></td><td>String</td><td>Inhalt nach dem Body</td></tr>';
        $content .= '<tr><td><code>footer</code></td><td>String</td><td>Footer-Inhalt der Card</td></tr>';
        $content .= '<tr><td><code>main_attributes</code></td><td>Array</td><td>Hier können Attribute zur uk-card ergänzt werden</td></tr>';
        $content .= '<tr><td><code>body_attributes</code></td><td>Array</td><td>Hier können Attribute zum Body ergänzt werden</td></tr>';
        $content .= '</tbody>';
        $content .= '</table>';
        $content .= '</div>';
        $content .= '</div>';
        
        break;

    case 'gallery':
        // Gallery Demo
        $content .= '<h2>Galerie</h2>';
        $content .= '<p class="lead">Das Fragment <code>uikit_gallery.php</code> erstellt Bildergalerien aus einer Liste von Mediendateien.</p>';
        
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Beispiel: Galerie-Anwendung</h3>';
        
        $content .= '<pre><code>&lt;?php
// Komma-separierte Liste von Mediendateien aus dem Medienpool
$bilder = \'bild1.jpg,bild2.jpg,bild3.jpg,bild4.jpg\';

$fragment = new rex_fragment();
$fragment->setVar(\'media\', $bilder, false);
echo $fragment->parse(\'uikit_gallery.php\');
?&gt;</code></pre>';

        $content .= '<p class="uk-text-warning">Hinweis: Für eine echte Vorschau werden Medien aus dem Medienpool benötigt.</p>';
        $content .= '</div>';
        
        break;

    case 'grid':
        // Grid Demo
        $content .= '<h2>Grid-Layout</h2>';
        $content .= '<p class="lead">Das Fragment <code>uikit_grid.php</code> ermöglicht flexible Grid-Layouts mit verschiedenen Optionen.</p>';

        // Beispiel 1: Einfaches Grid
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Beispiel 1: Einfaches Grid</h3>';
        $content .= '<p>Ein Basis-Grid mit unterschiedlicher Anzahl von Spalten je nach Bildschirmgröße:</p>';

        $content .= '<pre><code>&lt;?php
$items = [
    [\'content\' => \'&lt;div class="uk-card uk-card-default uk-card-body"&gt;Item 1&lt;/div&gt;\'],
    [\'content\' => \'&lt;div class="uk-card uk-card-default uk-card-body"&gt;Item 2&lt;/div&gt;\'],
    [\'content\' => \'&lt;div class="uk-card uk-card-default uk-card-body"&gt;Item 3&lt;/div&gt;\'],
    [\'content\' => \'&lt;div class="uk-card uk-card-default uk-card-body"&gt;Item 4&lt;/div&gt;\'],
];

$fragment = new rex_fragment();
$fragment->setVar(\'items\', $items, false);
$fragment->setVar(\'cols\', \'uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l\', false);
$fragment->setVar(\'gap\', \'medium\', false);
echo $fragment->parse(\'uikit_grid.php\');
?&gt;</code></pre>';

        $content .= '<div class="uk-background-muted uk-padding">';
        
        $items = [
            ['content' => '<div class="uk-card uk-card-default uk-card-body">Item 1</div>'],
            ['content' => '<div class="uk-card uk-card-default uk-card-body">Item 2</div>'],
            ['content' => '<div class="uk-card uk-card-default uk-card-body">Item 3</div>'],
            ['content' => '<div class="uk-card uk-card-default uk-card-body">Item 4</div>'],
        ];

        $fragment = new rex_fragment();
        $fragment->setVar('items', $items, false);
        $fragment->setVar('cols', 'uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l', false);
        $fragment->setVar('gap', 'medium', false);
        $content .= $fragment->parse('uikit_grid.php');
        
        $content .= '</div>';
        $content .= '</div>';

        // Beispiel 2: Grid mit Masonry-Layout
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Beispiel 2: Masonry-Layout</h3>';
        $content .= '<p>Ein Grid mit unterschiedlich hohen Elementen im Masonry-Layout:</p>';

        $content .= '<pre><code>&lt;?php
$items = [
    [\'content\' => \'&lt;div class="uk-card uk-card-default uk-card-body"&gt;Kurzer Inhalt&lt;/div&gt;\'],
    [\'content\' => \'&lt;div class="uk-card uk-card-default uk-card-body"&gt;
        &lt;h4&gt;Größerer Inhalt&lt;/h4&gt;
        &lt;p&gt;Dieser Inhalt ist größer und nimmt mehr Platz ein.&lt;/p&gt;
        &lt;p&gt;Masonry passt die Elemente optimal an.&lt;/p&gt;
    &lt;/div&gt;\'],
    [\'content\' => \'&lt;div class="uk-card uk-card-default uk-card-body"&gt;Mittelgroßer Inhalt mit etwas Text&lt;/div&gt;\'],
    [\'content\' => \'&lt;div class="uk-card uk-card-default uk-card-body"&gt;
        &lt;p&gt;Noch ein längerer Text in diesem Element.&lt;/p&gt;
        &lt;p&gt;Mit mehreren Absätzen.&lt;/p&gt;
    &lt;/div&gt;\'],
    [\'content\' => \'&lt;div class="uk-card uk-card-default uk-card-body"&gt;Kurzer Text&lt;/div&gt;\'],
    [\'content\' => \'&lt;div class="uk-card uk-card-default uk-card-body"&gt;Ein weiteres Element&lt;/div&gt;\'],
];

$fragment = new rex_fragment();
$fragment->setVar(\'items\', $items, false);
$fragment->setVar(\'cols\', \'uk-child-width-1-2@s uk-child-width-1-3@m\', false);
$fragment->setVar(\'masonry\', true, false);
$fragment->setVar(\'gap\', \'small\', false);
echo $fragment->parse(\'uikit_grid.php\');
?&gt;</code></pre>';

        $content .= '<div class="uk-background-muted uk-padding">';
        
        $items = [
            ['content' => '<div class="uk-card uk-card-default uk-card-body">Kurzer Inhalt</div>'],
            ['content' => '<div class="uk-card uk-card-default uk-card-body">
                <h4>Größerer Inhalt</h4>
                <p>Dieser Inhalt ist größer und nimmt mehr Platz ein.</p>
                <p>Masonry passt die Elemente optimal an.</p>
            </div>'],
            ['content' => '<div class="uk-card uk-card-default uk-card-body">Mittelgroßer Inhalt mit etwas Text</div>'],
            ['content' => '<div class="uk-card uk-card-default uk-card-body">
                <p>Noch ein längerer Text in diesem Element.</p>
                <p>Mit mehreren Absätzen.</p>
            </div>'],
            ['content' => '<div class="uk-card uk-card-default uk-card-body">Kurzer Text</div>'],
            ['content' => '<div class="uk-card uk-card-default uk-card-body">Ein weiteres Element</div>'],
        ];

        $fragment = new rex_fragment();
        $fragment->setVar('items', $items, false);
        $fragment->setVar('cols', 'uk-child-width-1-2@s uk-child-width-1-3@m', false);
        $fragment->setVar('masonry', true, false);
        $fragment->setVar('gap', 'small', false);
        $content .= $fragment->parse('uikit_grid.php');
        
        $content .= '</div>';
        $content .= '</div>';

        // Beispiel 3: Grid mit Trennlinien und gleicher Höhe
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Beispiel 3: Grid mit Trennlinien und gleicher Höhe</h3>';
        $content .= '<p>Ein Grid mit Trennlinien zwischen den Elementen und gleicher Höhe für alle Elemente:</p>';

        $content .= '<pre><code>&lt;?php
$items = [
    [\'content\' => \'&lt;div class="uk-card uk-card-default uk-card-body"&gt;
        &lt;h4&gt;Feature 1&lt;/h4&gt;
        &lt;p&gt;Beschreibung der ersten Funktion.&lt;/p&gt;
    &lt;/div&gt;\'],
    [\'content\' => \'&lt;div class="uk-card uk-card-default uk-card-body"&gt;
        &lt;h4&gt;Feature 2&lt;/h4&gt;
        &lt;p&gt;Beschreibung der zweiten Funktion mit etwas mehr Text.&lt;/p&gt;
    &lt;/div&gt;\'],
    [\'content\' => \'&lt;div class="uk-card uk-card-default uk-card-body"&gt;
        &lt;h4&gt;Feature 3&lt;/h4&gt;
        &lt;p&gt;Beschreibung der dritten Funktion.&lt;/p&gt;
    &lt;/div&gt;\'],
];

$fragment = new rex_fragment();
$fragment->setVar(\'items\', $items, false);
$fragment->setVar(\'cols\', \'uk-child-width-1-3@m\', false);
$fragment->setVar(\'divider\', true, false);
$fragment->setVar(\'match_height\', true, false);
echo $fragment->parse(\'uikit_grid.php\');
?&gt;</code></pre>';

        $content .= '<div class="uk-background-muted uk-padding">';
        
        $items = [
            ['content' => '<div class="uk-card uk-card-default uk-card-body">
                <h4>Feature 1</h4>
                <p>Beschreibung der ersten Funktion.</p>
            </div>'],
            ['content' => '<div class="uk-card uk-card-default uk-card-body">
                <h4>Feature 2</h4>
                <p>Beschreibung der zweiten Funktion mit etwas mehr Text.</p>
            </div>'],
            ['content' => '<div class="uk-card uk-card-default uk-card-body">
                <h4>Feature 3</h4>
                <p>Beschreibung der dritten Funktion.</p>
            </div>'],
        ];

        $fragment = new rex_fragment();
        $fragment->setVar('items', $items, false);
        $fragment->setVar('cols', 'uk-child-width-1-3@m', false);
        $fragment->setVar('divider', true, false);
        $fragment->setVar('match_height', true, false);
        $content .= $fragment->parse('uikit_grid.php');
        
        $content .= '</div>';
        $content .= '</div>';

        // Beispiel 4: Grid mit benutzerdefiniertem Template
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Beispiel 4: Grid mit benutzerdefiniertem Template</h3>';
        $content .= '<p>Ein Grid mit einem benutzerdefinierten Template für die Items:</p>';

        $content .= '<pre><code>&lt;?php
$items = [
    [\'title\' => \'Titel 1\', \'text\' => \'Beschreibung 1\', \'icon\' => \'check\'],
    [\'title\' => \'Titel 2\', \'text\' => \'Beschreibung 2\', \'icon\' => \'heart\'],
    [\'title\' => \'Titel 3\', \'text\' => \'Beschreibung 3\', \'icon\' => \'star\'],
    [\'title\' => \'Titel 4\', \'text\' => \'Beschreibung 4\', \'icon\' => \'world\'],
];

$template = \'&lt;div class="{{class}} uk-text-center"&gt;
    &lt;div class="uk-card uk-card-primary uk-card-body"&gt;
        &lt;span uk-icon="icon: {{icon}}; ratio: 2"&gt;&lt;/span&gt;
        &lt;h4&gt;{{title}}&lt;/h4&gt;
        &lt;p&gt;{{text}}&lt;/p&gt;
    &lt;/div&gt;
&lt;/div&gt;\';

$fragment = new rex_fragment();
$fragment->setVar(\'items\', $items, false);
$fragment->setVar(\'cols\', \'uk-child-width-1-2@s uk-child-width-1-4@m\', false);
$fragment->setVar(\'gap\', \'medium\', false);
$fragment->setVar(\'item_template\', $template, false);
echo $fragment->parse(\'uikit_grid.php\');
?&gt;</code></pre>';

        $content .= '<div class="uk-background-muted uk-padding">';
        
        $items = [
            ['title' => 'Titel 1', 'text' => 'Beschreibung 1', 'icon' => 'check'],
            ['title' => 'Titel 2', 'text' => 'Beschreibung 2', 'icon' => 'heart'],
            ['title' => 'Titel 3', 'text' => 'Beschreibung 3', 'icon' => 'star'],
            ['title' => 'Titel 4', 'text' => 'Beschreibung 4', 'icon' => 'world'],
        ];

        $template = '<div class="{{class}} uk-text-center">
            <div class="uk-card uk-card-primary uk-card-body">
                <span uk-icon="icon: {{icon}}; ratio: 2"></span>
                <h4>{{title}}</h4>
                <p>{{text}}</p>
            </div>
        </div>';

        $fragment = new rex_fragment();
        $fragment->setVar('items', $items, false);
        $fragment->setVar('cols', 'uk-child-width-1-2@s uk-child-width-1-4@m', false);
        $fragment->setVar('gap', 'medium', false);
        $fragment->setVar('item_template', $template, false);
        $content .= $fragment->parse('uikit_grid.php');
        
        $content .= '</div>';
        $content .= '</div>';

        // Beispiel 5: Grid mit Parallax-Effekt
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Beispiel 5: Grid mit Parallax-Effekt</h3>';
        $content .= '<p>Ein Grid mit Parallax-Effekt beim Scrollen:</p>';

        $content .= '<pre><code>&lt;?php
$items = [
    [\'content\' => \'&lt;div class="uk-card uk-card-secondary uk-card-body uk-height-medium"&gt;Item 1&lt;/div&gt;\'],
    [\'content\' => \'&lt;div class="uk-card uk-card-secondary uk-card-body uk-height-medium"&gt;Item 2&lt;/div&gt;\'],
    [\'content\' => \'&lt;div class="uk-card uk-card-secondary uk-card-body uk-height-medium"&gt;Item 3&lt;/div&gt;\'],
    [\'content\' => \'&lt;div class="uk-card uk-card-secondary uk-card-body uk-height-medium"&gt;Item 4&lt;/div&gt;\'],
    [\'content\' => \'&lt;div class="uk-card uk-card-secondary uk-card-body uk-height-medium"&gt;Item 5&lt;/div&gt;\'],
    [\'content\' => \'&lt;div class="uk-card uk-card-secondary uk-card-body uk-height-medium"&gt;Item 6&lt;/div&gt;\'],
];

$fragment = new rex_fragment();
$fragment->setVar(\'items\', $items, false);
$fragment->setVar(\'cols\', \'uk-child-width-1-2@s uk-child-width-1-3@m\', false);
$fragment->setVar(\'parallax\', 150, false);
$fragment->setVar(\'gap\', \'medium\', false);
echo $fragment->parse(\'uikit_grid.php\');
?&gt;</code></pre>';

        $content .= '<div class="uk-background-muted uk-padding">';
        
        $items = [
            ['content' => '<div class="uk-card uk-card-secondary uk-card-body uk-height-medium">Item 1</div>'],
            ['content' => '<div class="uk-card uk-card-secondary uk-card-body uk-height-medium">Item 2</div>'],
            ['content' => '<div class="uk-card uk-card-secondary uk-card-body uk-height-medium">Item 3</div>'],
            ['content' => '<div class="uk-card uk-card-secondary uk-card-body uk-height-medium">Item 4</div>'],
            ['content' => '<div class="uk-card uk-card-secondary uk-card-body uk-height-medium">Item 5</div>'],
            ['content' => '<div class="uk-card uk-card-secondary uk-card-body uk-height-medium">Item 6</div>'],
        ];

        $fragment = new rex_fragment();
        $fragment->setVar('items', $items, false);
        $fragment->setVar('cols', 'uk-child-width-1-2@s uk-child-width-1-3@m', false);
        $fragment->setVar('parallax', 150, false);
        $fragment->setVar('gap', 'medium', false);
        $content .= $fragment->parse('uikit_grid.php');
        
        $content .= '</div>';
        $content .= '</div>';

        // Parameter-Dokumentation
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Parameter</h3>';
        $content .= '<p>Die folgenden Parameter können für das Grid-Fragment gesetzt werden:</p>';

        $content .= '<div class="uk-overflow-auto">';
        $content .= '<table class="uk-table uk-table-divider uk-table-hover uk-table-small">';
        $content .= '<thead><tr><th>Parameter</th><th>Typ</th><th>Standard</th><th>Beschreibung</th></tr></thead>';
        $content .= '<tbody>';
        $content .= '<tr><td><code>items</code></td><td>Array</td><td>-</td><td>Array mit Items. Jedes Item ist ein Array mit beliebigen Keys</td></tr>';
        $content .= '<tr><td><code>cols</code></td><td>String</td><td>uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l</td><td>Anzahl der Spalten als UIkit-Klassen</td></tr>';
        $content .= '<tr><td><code>masonry</code></td><td>Boolean</td><td>false</td><td>Masonry-Layout aktivieren</td></tr>';
        $content .= '<tr><td><code>parallax</code></td><td>Int</td><td>0</td><td>Parallax-Effekt in Pixel (z.B. 150)</td></tr>';
        $content .= '<tr><td><code>gap</code></td><td>String</td><td>-</td><td>Abstand zwischen den Items (small, medium, large oder Pixelwert)</td></tr>';
        $content .= '<tr><td><code>divider</code></td><td>Boolean</td><td>false</td><td>Trennlinie zwischen den Elementen anzeigen</td></tr>';
        $content .= '<tr><td><code>match_height</code></td><td>Boolean</td><td>false</td><td>Gleiche Höhe für alle Elemente</td></tr>';
        $content .= '<tr><td><code>grid_classes</code></td><td>String</td><td>-</td><td>CSS-Klassen für das Grid-Element</td></tr>';
        $content .= '<tr><td><code>item_template</code></td><td>String</td><td>&lt;div class="{{class}}"&gt;{{content}}&lt;/div&gt;</td><td>HTML-Template für jedes Item</td></tr>';
        $content .= '</tbody>';
        $content .= '</table>';
        $content .= '</div>';
        $content .= '</div>';
        break;

    case 'modal':
        // Modal Demo
        $content .= '<h2>Modal</h2>';
        $content .= '<p class="lead">Das Fragment <code>uikit_modal.php</code> erstellt Dialog-Fenster, die sich über dem Inhalt öffnen.</p>';
        
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Beispiel: Modal-Dialog</h3>';
        
        $content .= '<pre><code>&lt;?php
$fragment = new rex_fragment();
$fragment->setVar(\'id\', \'beispiel-modal\', false);
$fragment->setVar(\'title\', \'Beispiel Modal\', false);
$fragment->setVar(\'content\', \'&lt;p&gt;Dies ist der Inhalt des Modals. Hier könnten Texte, Bilder oder Formulare stehen.&lt;/p&gt;\', false);
$fragment->setVar(\'button_text\', \'Modal öffnen\', false);
$fragment->setVar(\'size\', \'small\', false);
echo $fragment->parse(\'uikit_modal.php\');
?&gt;</code></pre>';

        $content .= '<div class="uk-background-muted uk-padding">';
        
        $fragment = new rex_fragment();
        $fragment->setVar('id', 'beispiel-modal', false);
        $fragment->setVar('title', 'Beispiel Modal', false);
        $fragment->setVar('content', '<p>Dies ist der Inhalt des Modals. Hier könnten Texte, Bilder oder Formulare stehen.</p>', false);
        $fragment->setVar('button_text', 'Modal öffnen', false);
        $fragment->setVar('size', 'small', false);
        $content .= $fragment->parse('uikit_modal.php');
        
        $content .= '</div>';
        $content .= '</div>';
        
        break;

    case 'notification':
        // Notification Demo
        $content .= '<h2>Benachrichtigungen</h2>';
        $content .= '<p class="lead">Das Fragment <code>uikit_notification.php</code> erzeugt System-Benachrichtigungen.</p>';
        
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Beispiel: Benachrichtigung</h3>';
        
        $content .= '<pre><code>&lt;?php
$fragment = new rex_fragment();
$fragment->setVar(\'message\', \'Ihre Anfrage wurde erfolgreich gesendet!\', false);
$fragment->setVar(\'status\', \'success\', false);
$fragment->setVar(\'position\', \'top-center\', false);
$fragment->setVar(\'show_immediately\', false, false); // Button zum Anzeigen
echo $fragment->parse(\'uikit_notification.php\');
?&gt;</code></pre>';

        $content .= '<div class="uk-background-muted uk-padding">';
        
        $fragment = new rex_fragment();
        $fragment->setVar('message', 'Ihre Anfrage wurde erfolgreich gesendet!', false);
        $fragment->setVar('status', 'success', false);
        $fragment->setVar('position', 'top-center', false);
        $fragment->setVar('show_immediately', false, false);
        $content .= $fragment->parse('uikit_notification.php');
        
        $content .= '</div>';
        $content .= '</div>';
        
        break;

    case 'offcanvas':
        // Offcanvas Demo
        $content .= '<h2>Offcanvas</h2>';
        $content .= '<p class="lead">Das Fragment <code>uikit_offcanvas.php</code> erstellt seitlich einfahrende Navigationsleisten oder Menüs.</p>';
        $content .= '<div class="uk-alert-warning uk-margin-bottom" uk-alert>';
        $content .= '<p><span uk-icon="icon: warning"></span> Wichtiger Hinweis: Im REDAXO-Backend sollte Offcanvas immer von rechts geöffnet werden, damit es nicht vom linken Menü verdeckt wird.</p>';
        $content .= '</div>';
        
        // Beispiel 1: Standard Offcanvas (rechts)
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Beispiel 1: Standard Offcanvas (rechts)</h3>';
        $content .= '<p>Ein einfaches Offcanvas mit Standardeinstellungen, das von rechts eingeblendet wird:</p>';
        
        $content .= '<pre><code>&lt;?php
$fragment = new rex_fragment();
$fragment->setVar(\'id\', \'demo-offcanvas-rechts-1\', false);
$fragment->setVar(\'title\', \'Offcanvas Menü\', false);
$fragment->setVar(\'content\', \'&lt;ul class="uk-nav uk-nav-default"&gt;
    &lt;li class="uk-active"&gt;&lt;a href="#"&gt;Startseite&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="#"&gt;Über uns&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="#"&gt;Leistungen&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="#"&gt;Kontakt&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;\', false);
$fragment->setVar(\'button_text\', \'Menü öffnen\', false);
$fragment->setVar(\'position\', \'right\', false); // Position rechts statt links
echo $fragment->parse(\'uikit_offcanvas.php\');
?&gt;</code></pre>';

        $content .= '<div class="uk-background-muted uk-padding">';
        
        $fragment = new rex_fragment();
        $fragment->setVar('id', 'demo-offcanvas-rechts-1', false);
        $fragment->setVar('title', 'Offcanvas Menü', false);
        $fragment->setVar('content', '<ul class="uk-nav uk-nav-default">
    <li class="uk-active"><a href="#">Startseite</a></li>
    <li><a href="#">Über uns</a></li>
    <li><a href="#">Leistungen</a></li>
    <li><a href="#">Kontakt</a></li>
</ul>', false);
        $fragment->setVar('button_text', 'Menü öffnen', false);
        $fragment->setVar('position', 'right', false); // Position rechts statt links
        $content .= $fragment->parse('uikit_offcanvas.php');
        
        $content .= '</div>';
        $content .= '</div>';

        // Beispiel 2: Offcanvas rechts mit Push-Animation
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Beispiel 2: Offcanvas rechts mit Push-Animation</h3>';
        $content .= '<p>Ein Offcanvas, das von rechts kommt und einen Push-Effekt verwendet:</p>';
        
        $content .= '<pre><code>&lt;?php
$fragment = new rex_fragment();
$fragment->setVar(\'id\', \'demo-offcanvas-rechts\', false);
$fragment->setVar(\'title\', \'Filter\', false);
$fragment->setVar(\'content\', \'&lt;form class="uk-form-stacked"&gt;
    &lt;div class="uk-margin"&gt;
        &lt;label class="uk-form-label"&gt;Kategorie&lt;/label&gt;
        &lt;div class="uk-form-controls"&gt;
            &lt;select class="uk-select"&gt;
                &lt;option&gt;Alle Kategorien&lt;/option&gt;
                &lt;option&gt;Kategorie 1&lt;/option&gt;
                &lt;option&gt;Kategorie 2&lt;/option&gt;
            &lt;/select&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="uk-margin"&gt;
        &lt;label class="uk-form-label"&gt;Preis&lt;/label&gt;
        &lt;div class="uk-form-controls"&gt;
            &lt;input class="uk-range" type="range" value="2" min="0" max="10" step="0.1"&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;button class="uk-button uk-button-primary uk-width-1-1"&gt;Anwenden&lt;/button&gt;
&lt;/form&gt;\', false);
$fragment->setVar(\'button_text\', \'Filter anzeigen\', false);
$fragment->setVar(\'button_class\', \'uk-button uk-button-secondary\', false);
$fragment->setVar(\'position\', \'right\', false);
$fragment->setVar(\'mode\', \'push\', false);
echo $fragment->parse(\'uikit_offcanvas.php\');
?&gt;</code></pre>';

        $content .= '<div class="uk-background-muted uk-padding">';
        
        $fragment = new rex_fragment();
        $fragment->setVar('id', 'demo-offcanvas-rechts', false);
        $fragment->setVar('title', 'Filter', false);
        $fragment->setVar('content', '<form class="uk-form-stacked">
    <div class="uk-margin">
        <label class="uk-form-label">Kategorie</label>
        <div class="uk-form-controls">
            <select class="uk-select">
                <option>Alle Kategorien</option>
                <option>Kategorie 1</option>
                <option>Kategorie 2</option>
            </select>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Preis</label>
        <div class="uk-form-controls">
            <input class="uk-range" type="range" value="2" min="0" max="10" step="0.1">
        </div>
    </div>
    <button class="uk-button uk-button-primary uk-width-1-1">Anwenden</button>
</form>', false);
        $fragment->setVar('button_text', 'Filter anzeigen', false);
        $fragment->setVar('button_class', 'uk-button uk-button-secondary', false);
        $fragment->setVar('position', 'right', false);
        $fragment->setVar('mode', 'push', false);
        $content .= $fragment->parse('uikit_offcanvas.php');
        
        $content .= '</div>';
        $content .= '</div>';

        // Beispiel 3: Offcanvas von oben mit Reveal-Animation
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Beispiel 3: Offcanvas von oben mit Reveal-Animation</h3>';
        $content .= '<p>Ein Offcanvas, das von oben kommt und einen Reveal-Effekt verwendet:</p>';
        
        $content .= '<pre><code>&lt;?php
$fragment = new rex_fragment();
$fragment->setVar(\'id\', \'demo-offcanvas-top\', false);
$fragment->setVar(\'title\', \'Suche\', false);
$fragment->setVar(\'content\', \'&lt;div class="uk-margin"&gt;
    &lt;form class="uk-search uk-search-default uk-width-1-1"&gt;
        &lt;span uk-search-icon&gt;&lt;/span&gt;
        &lt;input class="uk-search-input" type="search" placeholder="Suchbegriff eingeben..."&gt;
    &lt;/form&gt;
    &lt;div class="uk-margin uk-grid-small uk-child-width-auto" uk-grid&gt;
        &lt;label&gt;&lt;input class="uk-checkbox" type="checkbox"&gt; In Artikeln&lt;/label&gt;
        &lt;label&gt;&lt;input class="uk-checkbox" type="checkbox"&gt; In Bildern&lt;/label&gt;
    &lt;/div&gt;
    &lt;button class="uk-button uk-button-primary"&gt;Suchen&lt;/button&gt;
&lt;/div&gt;\', false);
$fragment->setVar(\'button_text\', \'Suche öffnen\', false);
$fragment->setVar(\'button_class\', \'uk-button uk-button-primary\', false);
$fragment->setVar(\'position\', \'top\', false);
$fragment->setVar(\'mode\', \'reveal\', false);
echo $fragment->parse(\'uikit_offcanvas.php\');
?&gt;</code></pre>';

        $content .= '<div class="uk-background-muted uk-padding">';
        
        $fragment = new rex_fragment();
        $fragment->setVar('id', 'demo-offcanvas-top', false);
        $fragment->setVar('title', 'Suche', false);
        $fragment->setVar('content', '<div class="uk-margin">
    <form class="uk-search uk-search-default uk-width-1-1">
        <span uk-search-icon></span>
        <input class="uk-search-input" type="search" placeholder="Suchbegriff eingeben...">
    </form>
    <div class="uk-margin uk-grid-small uk-child-width-auto" uk-grid>
        <label><input class="uk-checkbox" type="checkbox"> In Artikeln</label>
        <label><input class="uk-checkbox" type="checkbox"> In Bildern</label>
    </div>
    <button class="uk-button uk-button-primary">Suchen</button>
</div>', false);
        $fragment->setVar('button_text', 'Suche öffnen', false);
        $fragment->setVar('button_class', 'uk-button uk-button-primary', false);
        $fragment->setVar('position', 'top', false);
        $fragment->setVar('mode', 'reveal', false);
        $content .= $fragment->parse('uikit_offcanvas.php');
        
        $content .= '</div>';
        $content .= '</div>';
        
        // Parameter-Dokumentation
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Parameter</h3>';
        $content .= '<p>Die folgenden Parameter können für das Offcanvas-Fragment gesetzt werden:</p>';

        $content .= '<div class="uk-overflow-auto">';
        $content .= '<table class="uk-table uk-table-divider uk-table-hover uk-table-small">';
        $content .= '<thead><tr><th>Parameter</th><th>Typ</th><th>Standard</th><th>Beschreibung</th></tr></thead>';
        $content .= '<tbody>';
        $content .= '<tr><td><code>id</code></td><td>String</td><td>-</td><td>Eine eindeutige ID für das Offcanvas-Element (erforderlich)</td></tr>';
        $content .= '<tr><td><code>title</code></td><td>String</td><td>-</td><td>Titel des Offcanvas</td></tr>';
        $content .= '<tr><td><code>content</code></td><td>String</td><td>-</td><td>Hauptinhalt des Offcanvas</td></tr>';
        $content .= '<tr><td><code>button_text</code></td><td>String</td><td>Öffnen</td><td>Text für den auslösenden Button</td></tr>';
        $content .= '<tr><td><code>button_class</code></td><td>String</td><td>uk-button uk-button-default</td><td>CSS-Klassen für den Button</td></tr>';
        $content .= '<tr><td><code>position</code></td><td>String</td><td>left</td><td>Position des Offcanvas: left, right, top, bottom (für REDAXO-Backend wird \'right\' empfohlen)</td></tr>';
        $content .= '<tr><td><code>mode</code></td><td>String</td><td>slide</td><td>Animation: slide, push, reveal, none</td></tr>';
        $content .= '<tr><td><code>overlay</code></td><td>Boolean</td><td>true</td><td>Overlay anzeigen</td></tr>';
        $content .= '<tr><td><code>esc_close</code></td><td>Boolean</td><td>true</td><td>Schließen mit ESC-Taste erlauben</td></tr>';
        $content .= '<tr><td><code>bg_close</code></td><td>Boolean</td><td>true</td><td>Schließen durch Klick im Hintergrund erlauben</td></tr>';
        $content .= '<tr><td><code>close_button</code></td><td>Boolean</td><td>true</td><td>Schließen-Button anzeigen</td></tr>';
        $content .= '<tr><td><code>flip</code></td><td>Boolean</td><td>false</td><td>Ausrichtung umkehren</td></tr>';
        $content .= '</tbody>';
        $content .= '</table>';
        $content .= '</div>';
        $content .= '</div>';
        
        // Reale Anwendungsbeispiele
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Typische Anwendungsbeispiele</h3>';
        
        $content .= '<div class="uk-child-width-1-2@s uk-grid-match" uk-grid>';
        
        // Beispiel: Mobile Navigation
        $content .= '<div>';
        $content .= '<div class="uk-card uk-card-small uk-card-body uk-card-default">';
        $content .= '<h4>Mobile Navigation</h4>';
        $content .= '<p>Verwenden Sie Offcanvas für responsive Navigationsmenüs auf kleinen Bildschirmen:</p>';
        $content .= '<pre><code>// HTML/Template
&lt;button class="uk-button uk-hidden@m" uk-toggle="target: #mobile-nav"&gt;Menü&lt;/button&gt;

&lt;?php
// Nur auf kleinen Bildschirmen anzeigen
$fragment = new rex_fragment();
$fragment->setVar(\'id\', \'mobile-nav\', false);
$fragment->setVar(\'title\', \'Navigation\', false);
$fragment->setVar(\'content\', $navigation_html, false);
// Kein Button anzeigen, wird separat gesteuert
$fragment->setVar(\'button_text\', \'\', false);
echo $fragment->parse(\'uikit_offcanvas.php\');
?&gt;</code></pre>';
        $content .= '</div>';
        $content .= '</div>';
        
        // Beispiel: Warenkorb
        $content .= '<div>';
        $content .= '<div class="uk-card uk-card-small uk-card-body uk-card-default">';
        $content .= '<h4>Warenkorb</h4>';
        $content .= '<p>Zeigen Sie den aktuellen Warenkorb in einer E-Commerce-Anwendung an:</p>';
        $content .= '<pre><code>&lt;?php
// Warenkorb-Inhalt aus der Session laden
$cart_items = $_SESSION[\'cart\'] ?? [];
$cart_html = \'\';

if (empty($cart_items)) {
    $cart_html = \'&lt;p&gt;Ihr Warenkorb ist leer.&lt;/p&gt;\';
} else {
    $cart_html = \'&lt;ul class="uk-list uk-list-divider"&gt;\';
    foreach ($cart_items as $item) {
        $cart_html .= \'&lt;li&gt;\' . $item[\'name\'] . \' - \' . $item[\'price\'] . \'€&lt;/li&gt;\';
    }
    $cart_html .= \'&lt;/ul&gt;\';
    $cart_html .= \'&lt;a href="/checkout" class="uk-button uk-button-primary"&gt;Zur Kasse&lt;/a&gt;\';
}

$fragment = new rex_fragment();
$fragment->setVar(\'id\', \'cart-panel\', false);
$fragment->setVar(\'title\', \'Warenkorb\', false);
$fragment->setVar(\'content\', $cart_html, false);
$fragment->setVar(\'position\', \'right\', false);
$fragment->setVar(\'button_text\', \'Warenkorb\', false);
$fragment->setVar(\'button_class\', \'uk-button uk-button-default\', false);
echo $fragment->parse(\'uikit_offcanvas.php\');
?&gt;</code></pre>';
        $content .= '</div>';
        $content .= '</div>';
        
        $content .= '</div>';
        $content .= '</div>';
        
        break;

    default:
        $content .= '<div class="uk-alert-primary" uk-alert>';
        $content .= '<p>Bitte wählen Sie oben eine Komponente aus, um deren Demo anzuzeigen.</p>';
        $content .= '</div>';
        
        break;
}

// Ausgabe des Inhalts
echo $content;

// Fußzeile mit Dokumentationslinks
echo '<div class="uk-section uk-section-muted uk-section-xsmall uk-margin-top">';
echo '<div class="uk-container">';
echo '<div class="uk-grid uk-child-width-1-2@s" uk-grid>';
echo '<div>';
echo '<h4>UIkit Collection</h4>';
echo '<p>Die UIkit Collection bietet Fragmente und Helper für das UIkit 3 Framework.</p>';
echo '</div>';
echo '<div class="uk-text-right@s">';
echo '<h4>Dokumentation</h4>';
echo '<p><a href="https://getuikit.com/docs" target="_blank" class="uk-button uk-button-text">UIkit Dokumentation aufrufen</a></p>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
?>
