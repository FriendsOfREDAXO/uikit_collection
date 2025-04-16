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

### uikit_gallery.php

Dieses Fragment nimmt über dem Parameter media eine Liste von Medien des Medienpools auf und gibt eine Galerie aus. 

> Es wird ein Metafeld med_copyright in den Medien-Metas benötigt. 

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

### uikit_grid.php

Ein flexibles Fragment zur Erstellung von Grid- oder Masonry-Layouts mit UIkit. Ideal für responsive Darstellungen von Content-Elementen, Bildern oder Cards.

**Parameter**

```
$help['items']             = 'Array mit Items. Jedes Item ist ein Array mit beliebigen Keys';
$help['masonry']           = 'Masonry-Layout aktivieren (true/false)';
$help['gap']               = 'Abstand zwischen den Items (small, medium, large oder Pixelwert)';
$help['cols']              = 'Anzahl der Spalten (Default: 1-2@s 1-3@m 1-4@l)';
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

### uikit_offcanvas.php

Mit diesem Fragment können Off-Canvas-Navigationen oder -Inhalte erstellt werden, die von der Seite eingeblendet werden.

**Parameter**

```
$help['id']              = 'ID für das Offcanvas (erforderlich)';
$help['position']        = 'Position des Offcanvas: left, right, top, bottom (Standard: left)';
$help['mode']            = 'Animation: slide, push, reveal, none (Standard: slide)';
$help['content']         = 'Hauptinhalt des Offcanvas';
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


## Autoren

Wolfgang Bund

Christian Gehrke

Christian Kolloch

Thomas Skerbis

Markus Wottrich

**Friends Of REDAXO**

* http://www.redaxo.org
* https://github.com/FriendsOfREDAXO
