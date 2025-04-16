<?php
/**
 * UIkit Collection Demo Seite
 */

// Verhindere direkten Aufruf
if (!defined('REDAXO')) {
    die('Direct access denied!');
}

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
        
        // Beispiel für eine Card
        $content .= '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">';
        $content .= '<h3 class="uk-card-title">Beispiel: Standard Card</h3>';
        
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