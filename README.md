# UIKIT Collection für REDAXO 5.x

## Einleitung
Liefert Module und Templates zur Realisierung von UiKit-Projekten
https://getuikit.com

Im Backend wird ein modifiziertes UiKit eingebunden.  

Es wird ein UiKit für das Frontend mitgeliefert. 
Eigene Themes sollten aber entsprechend der Anleitung selbst erstellt werden. 

Siehe z.B.: https://getuikit.com/docs/less

## Navigationen

Das AddOn liefert eine eigene Function zur Generierung eines Navigationsarrays. 

***Aufruf:***
```php
structureArray($start = 0, $depth = 0, $ignoreOffline = true)
```

***$Start***

numerisch

Hier wird die Id der Start-Kategorie anegegben ab der das Array erzeugt wird

***$depth***
numerisch

Hier wird die gewünschte Tiefe der Navigation festgelegt

***$ignoreOffline***

true / false

Bei true werden Offline-Kategirien ignoriert. 

Das Array kann anschließend mit einer eigenen Function verarbeitet werden. 
Ein Beispiel findet sich im Template [0013 - Off Canvas Navi mit UIKit](https://github.com/FriendsOfREDAXO/uikit_collection/blob/master/lib/templates/0013_off_canvas_navi/template.inc) 


## Autoren

Woflgang Bund

Christian Gehrke

Christian Kolloch

Thomas Skerbis


## Basiert auf

Modulsammlung 

**Friends Of REDAXO**

* http://www.redaxo.org
* https://github.com/FriendsOfREDAXO

**Projekt-Lead**

[Thomas Skerbis](https://github.com/KLXM)
