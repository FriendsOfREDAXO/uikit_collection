<?php
if (isset($this->media) && $this->media != '') {
    $out = '';
    $files = array_filter(explode(",", $this->media));  
    foreach ($files as $GalItem) {
        // Abfragen des Medienobjekts
        $pic = rex_media::get($GalItem);
        if (!$pic) {
            continue; // Wenn kein Bild gefunden wird, mit dem nächsten fortfahren
        }

        // Titel des Bildes abfragen
        $picTitle = $pic->getTitle();

        // Urheberrechtsinformationen holen, falls vorhanden
        $copyrightText = uikitCollection::mediaCopyright($GalItem, 'text');
        $copyright = '';
        if ($copyrightText != '') {    
            $picTitle .= ' ' . $copyrightText;
            $copyright = '<div class="uk-width-1-1"><span class="uk-text-meta">' . $copyrightText . '</span></div>';
        }

        // Bild und Urheberrecht in HTML-Struktur einfügen
        $images .= '
        <div>
            <div class="uk-card uk-card-default">
                <a href="/media/galbig/'.$GalItem.'" uk-tooltip title="'.$picTitle.'" data-caption="'.$picTitle.'">
                    <img src="/media/galthumb/'.$GalItem.'" alt="'.$picTitle.'">
                </a>
                '.$copyright.'
            </div>
        </div>'; 
    }

    // Stil der Galerie anpassen, abhängig von der Anzahl der Bilder
    $galstyle = (count($files) == 1) ? 'uk-child-width-1-1' : 'uk-child-width-1-2@s uk-child-width-1-3@m';

    // Gesamte Galerie ausgeben
    $out = '<div class="'.$galstyle.'" uk-grid="masonry: true" uk-lightbox="animation: slide">'.$images.'</div>';
}

echo $out;
?>
