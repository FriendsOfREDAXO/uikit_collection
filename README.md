# UIkit Collection :: REDAXO AddOn

## Einleitung

Das Addon liefert das UIKit 3 Standard-Theme, Fragmente sowie ein Template für YForm.

https://getuikit.com


## YForm Template

Verwendung: 

PHP
```php 
$yform->setObjectparams('form_ytemplate', 'uikit3,bootstrap');
```

PIPE
```
objparams|form_ytemplate|uikit3,bootstrap
```
Bootstrap wird als Fallback verwendet. 

## cke5LightboxHelper (Outputfilter) 

Werden Bilder mit einem Bild oder mp4 verlinkt, wird es eine Uikit-Lightbox

Verwendung in boot.php des project addons: 

```php
uikitCollection::cke5LightboxHelper();
```

Optionaler Parameter für einen benutzerdefinierten Selector (Standard ist 'main'):

```php
uikitCollection::cke5LightboxHelper('article');
```

## UikitIcon

Verwendung: 

```PHP
echo uikitCollection::uikitIcon('dokument.pdf', 2);
```
Die 2 ist das gewünschte Ratio, Standard ist 1


## Fragmente

Das AddOn liefert einige Hilfsfragmente zur Ausgabe von Uikit-Elementen mit. 

### uikit_accordeon_tabs.php
Hiermit können Accordeons oder Tabs ausgegeben werden. Werden medien mit übergeben in einem item so wird auch eine Bildergalerie erzeugt. 

**Parameter**

info =  Nimmt ein Array an und erstellt eine Tab oder Akkordeon Liste
type  = Bei 1 > Akkordeon, bei 2 Tabs
items = Array mit den Keys title, body, media;

Bei Verwendung von media wird das gallery fragment verwendet und die Galerie nach dem body ausgegeben

> Es wird ein Metafeld med_copyright in den Medien-Metas benötigt. 

**Beispiel Accordion**
```php
<?php
$accordion_items = [
    [
        'titel' => 'Erster Abschnitt',
        'text' => '<p>Inhalt des ersten Abschnitts.</p>',
        'media' => 'beispiel_bild_1.jpg,beispiel_bild_2.jpg'
    ],
    [
        'titel' => 'Zweiter Abschnitt',
        'text' => '<p>Inhalt des zweiten Abschnitts.</p>'
    ]
];

$fragment = new rex_fragment();
$fragment->setVar('items', $accordion_items, false);
$fragment->setVar('type', '1', false); // 1 für Accordion
echo $fragment->parse('uikit_accordeon_tabs.php');
?>
```

**Beispiel Tabs**
```php
<?php
$tabs_items = [
    [
        'titel' => 'Tab 1',
        'text' => '<p>Inhalt des ersten Tabs.</p>',
        'media' => 'beispiel_bild_1.jpg'
    ],
    [
        'titel' => 'Tab 2',
        'text' => '<p>Inhalt des zweiten Tabs.</p>'
    ],
    [
        'titel' => 'Tab 3',
        'text' => '<p>Inhalt des dritten Tabs.</p>',
        'media' => 'beispiel_bild_2.jpg,beispiel_bild_3.jpg'
    ]
];

$fragment = new rex_fragment();
$fragment->setVar('items', $tabs_items, false);
$fragment->setVar('type', '2', false); // 2 für Tabs
echo $fragment->parse('uikit_accordeon_tabs.php');
?>
```

### uikit_card.php

Mit diesem Fragment können Uikit-Cards generiert werden. 

Auszug aus der Hilfe im Fragment 

```
$help['info']         = 'Das Fragment ezeugt UiKit-Cards: https://getuikit.com/assets/uikit/tests/card.html';
$help['media']        = 'Nimmt Markup für ein Medium / uk-media an (String)';
$help['media_bottom'] = 'Definiert ob das Medium am Ende dargestellt werden soll (bool)';
$help['title']        = 'Titel bzw. Header (String)';
$help['body']         = 'Body (String)';
$help['body_prepend'] = 'vor Body (String)';
$help['body_append']  = 'nach Body (String)';
$help['footer']       = 'Footer (String)';
$help['main_attributes']   = 'Hier können Attribute zur uk-card ergänzt werden (array), bei class werden diese an .uk-card angehägnt ';
$help['body_attributes']   = 'Hier können Attribute zum body ergänzt werden (array), bei class werden diese angehägnt ';
```

**Beispiel Card**
```php
<?php
$media = '<img src="/media/beispiel_bild.jpg" alt="Beispielbild">';
$title = 'Beispiel Card';
$body = '<p>Dies ist ein Beispieltext für eine UIkit Card.</p>';
$footer = '<a href="#" class="uk-button uk-button-text">Mehr erfahren</a>';

$fragment = new rex_fragment();
$fragment->setVar('media', $media, false);
$fragment->setVar('title', $title, false);
$fragment->setVar('body', $body, false);
$fragment->setVar('footer', $footer, false);
$fragment->setVar('main_attributes', ['class' => 'uk-card-default uk-card-hover'], false);
echo $fragment->parse('uikit_card.php');
?>
```

### uikit_gallery.php

Dieses Fragment nimmt über dem Parameter media eine Liste von Medien des Medienpools auf und gibt eine Galerie aus. 

> Es wird ein Metafeld med_copyright in den Medien-Metas benötigt. 

**Beispiel Galerie**
```php
<?php
// Komma-separierte Liste von Mediendateien aus dem Medienpool
$bilder = 'bild1.jpg,bild2.jpg,bild3.jpg,bild4.jpg';

$fragment = new rex_fragment();
$fragment->setVar('media', $bilder, false);
echo $fragment->parse('uikit_gallery.php');
?>
```

### uikit_slideshow.php

Mit diesem Fragment können Slideshows mit Bildern, Videos und Inhalten erstellt werden. Es unterstützt verschiedene Animationstypen und Navigationsmöglichkeiten.

**Parameter**

```
$help['slides']            = 'Array mit Slides. Jeder Slide ist ein Array mit den Keys "media", "title", "content"';
$help['animation']         = 'Animation-Typ: fade, slide, scale, pull, push (Standard: slide)';
$help['ratio']             = 'Seitenverhältnis der Bilder, z.B. "16:9" oder "4:3" (Optional)';
$help['autoplay']          = 'Automatische Wiedergabe (true/false)';
$help['slide_show_nav']    = 'Navigation anzeigen (true/false)';
$help['dotnav']            = 'Punktnavigation anzeigen (true/false)';
```

**Beispiel Slideshow**
```php
<?php
$slides = [
    [
        'media' => '<img src="/media/slide1.jpg" alt="Slide 1">',
        'title' => 'Erster Slide',
        'content' => '<p>Beschreibung des ersten Slides</p>'
    ],
    [
        'media' => '<img src="/media/slide2.jpg" alt="Slide 2">',
        'title' => 'Zweiter Slide',
        'content' => '<p>Beschreibung des zweiten Slides</p>'
    ],
    [
        'media' => '<video src="/media/demo.mp4" controls></video>',
        'title' => 'Video-Slide',
        'content' => '<p>Ein Video als Slide-Element</p>'
    ],
];

$fragment = new rex_fragment();
$fragment->setVar('slides', $slides, false);
$fragment->setVar('animation', 'fade', false);
$fragment->setVar('ratio', '16:9', false);
$fragment->setVar('autoplay', true, false);
$fragment->setVar('slide_show_nav', true, false);
$fragment->setVar('dotnav', true, false);
echo $fragment->parse('uikit_slideshow.php');
?>
```

### uikit_grid.php

Ein flexibles Fragment zur Erstellung von Grid- oder Masonry-Layouts mit UIkit. Ideal für responsive Darstellungen von Content-Elementen, Bildern oder Cards.

**Parameter**

```
$help['items']             = 'Array mit Items. Jedes Item ist ein Array mit beliebigen Keys';
$help['masonry']           = 'Masonry-Layout aktivieren (true/false)';
$help['gap']               = 'Abstand zwischen den Items (small, medium, large oder Pixelwert)';
$help['cols']              = 'Anzahl der Spalten (Default: 1-2@s 1-3@m 1-4@l)';
```

**Beispiel Grid**
```php
<?php
// Grid-Items erstellen
$items = [];
for ($i = 1; $i <= 6; $i++) {
    $items[] = [
        'content' => '<div class="uk-card uk-card-default uk-padding">' . 
                     '<h3>Item ' . $i . '</h3>' .
                     '<p>Beschreibung für Item ' . $i . '</p>' .
                     '</div>'
    ];
}

$fragment = new rex_fragment();
$fragment->setVar('items', $items, false);
$fragment->setVar('masonry', true, false);
$fragment->setVar('gap', 'medium', false);
$fragment->setVar('cols', 'uk-child-width-1-2@s uk-child-width-1-3@m', false);
echo $fragment->parse('uikit_grid.php');
?>
```

### uikit_modal.php

Dieses Fragment ermöglicht die einfache Integration von UIkit Modals/Dialogen mit verschiedenen Einstellungsmöglichkeiten.

**Parameter**

```
$help['id']              = 'ID für das Modal (erforderlich)';
$help['title']           = 'Titel/Überschrift des Modals';
$help['content']         = 'Hauptinhalt des Modals';
$help['button_text']     = 'Text für den auslösenden Button';
$help['size']            = 'Größe des Modals: container, small, large, full';
```

**Beispiel Modal**
```php
<?php
$fragment = new rex_fragment();
$fragment->setVar('id', 'beispiel-modal', false);
$fragment->setVar('title', 'Beispiel Modal', false);
$fragment->setVar('content', '<p>Dies ist der Inhalt des Modals. Hier könnten Texte, Bilder oder Formulare stehen.</p>', false);
$fragment->setVar('button_text', 'Modal öffnen', false);
$fragment->setVar('size', 'small', false);
echo $fragment->parse('uikit_modal.php');
?>
```

### uikit_offcanvas.php

Mit diesem Fragment können Off-Canvas-Navigationen oder -Inhalte erstellt werden, die von der Seite eingeblendet werden.

**Parameter**

```
$help['id']              = 'ID für das Offcanvas (erforderlich)';
$help['position']        = 'Position des Offcanvas: left, right, top, bottom (Standard: left)';
$help['mode']            = 'Animation: slide, push, reveal, none (Standard: slide)';
$help['content']         = 'Hauptinhalt des Offcanvas';
```

**Beispiel Offcanvas**
```php
<?php
$content = '
    <div class="uk-padding">
        <h3>Navigation</h3>
        <ul class="uk-nav uk-nav-default">
            <li class="uk-active"><a href="#">Startseite</a></li>
            <li><a href="#">Über uns</a></li>
            <li><a href="#">Leistungen</a></li>
            <li><a href="#">Kontakt</a></li>
        </ul>
    </div>
';

$fragment = new rex_fragment();
$fragment->setVar('id', 'main-navigation', false);
$fragment->setVar('position', 'left', false);
$fragment->setVar('mode', 'push', false);
$fragment->setVar('content', $content, false);
$fragment->setVar('button_text', 'Menü', false);
echo $fragment->parse('uikit_offcanvas.php');
?>
```

### uikit_notification.php

Dieses Fragment ermöglicht die Erstellung von dynamischen Benachrichtigungen mit UIkit.

**Parameter**

```
$help['message']         = 'Nachrichtentext der Benachrichtigung';
$help['status']          = 'Status der Benachrichtigung: primary, success, warning, danger';
$help['position']        = 'Position: top-left, top-center, top-right, bottom-left, bottom-center, bottom-right';
$help['show_immediately'] = 'Sofort anzeigen ohne Button (true/false)';
```

**Beispiel Notification**
```php
<?php
$fragment = new rex_fragment();
$fragment->setVar('message', 'Ihre Anfrage wurde erfolgreich gesendet!', false);
$fragment->setVar('status', 'success', false);
$fragment->setVar('position', 'top-center', false);
$fragment->setVar('show_immediately', true, false);
echo $fragment->parse('uikit_notification.php');
?>
```


## Autoren

Wolfgang Bund

Christian Gehrke

Christian Kolloch

Thomas Skerbis

Markus Wottrich

**Friends Of REDAXO**

* http://www.redaxo.org
* https://github.com/FriendsOfREDAXO
