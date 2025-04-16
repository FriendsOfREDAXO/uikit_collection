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
        $content .= '<div class="uk-card uk-card-small uk-card-body uk-card-primary">';
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
        $content .= '<div class="uk-card uk-card-small uk-card-body uk-card-secondary">';
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
