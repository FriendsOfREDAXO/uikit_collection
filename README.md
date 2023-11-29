# UIkit Collection // REDAXO AddOn

## Einleitung

Das Addon liefert das UIKit 3 Standard-Theme sowie ein Template für YForm.

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

Verwendung: 

```php
uikitCollection::cke5LightboxHelper();
```

## UikitIcon

Verwendung: 

```PHP
echo uikitCollection::uikitIcon('dokument.pdf', 2);
```
Die 2 ist das gewünschte Ratio, Standard ist 1

## Autoren

Wolfgang Bund

Christian Gehrke

Christian Kolloch

Thomas Skerbis

Markus Wottrich

**Friends Of REDAXO**

* http://www.redaxo.org
* https://github.com/FriendsOfREDAXO
