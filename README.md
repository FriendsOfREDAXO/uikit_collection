# UIkit Collection // REDAXO AddOn

## Einleitung
Liefert Demo-Module und -Templates für den Start eines UIkit-Projektes. 
https://getuikit.com

- Die Navigation des Quickstart-Templates ist mit dem navigation_array gebaut worden. 

- Im Backend wird UIkit eingebunden, so dass die Frontendausgaben auch im Backend funktionieren.   

> Es wird UIkit für das Frontend mitgeliefert, eigene Themes sollten jedoch besser entsprechend der Anleitung selbst entwickelt werden. 

Siehe z.B.: https://getuikit.com/docs/less

![Screenshot](https://raw.githubusercontent.com/FriendsOfREDAXO/uikit_collection/assets/screenshot.png)

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


## Autoren

Wolfgang Bund

Christian Gehrke

Christian Kolloch

Thomas Skerbis

Markus Wottrich


## Basiert auf

Modulsammlung von Oliver Kreischer

**Friends Of REDAXO**

* http://www.redaxo.org
* https://github.com/FriendsOfREDAXO
