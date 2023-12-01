# UIkit Collection // REDAXO AddOn

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







## Autoren

Wolfgang Bund

Christian Gehrke

Christian Kolloch

Thomas Skerbis

Markus Wottrich

**Friends Of REDAXO**

* http://www.redaxo.org
* https://github.com/FriendsOfREDAXO
