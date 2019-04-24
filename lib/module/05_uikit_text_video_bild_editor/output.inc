<?php
###################################################
###################################################
###########    INITIAL FUNCTIONS       ###########
###################################################
###################################################
if (rex::isBackend()) {
    echo '<i class="fa fa-anchor" aria-hidden="true"></i> Anker: <span class="label label-success">#topicREX_ARTICLE_ID-REX_SLICE_ID</span> <i>Animationen werden im Backend nicht angezeigt</i>';
}
$text = $media = $mediacheck = $link = $flyIn = $position_bild = $groesse_bild = $bild_unterschrift_anzeigen = $caption_bild = $autoplayStandard = $hideControls = $clickToPlay = $media_output = $uk_lightbox = $columns = '';
###################################################
###################################################
###########   TEXT FUNCTIONS        ###########
###################################################
###################################################
$text    = 'REX_VALUE[id=1 output=html]';
$columns = 'REX_VALUE[8]';
###################################################
###################################################
###########    MEDIA FUNCTIONS        ###########
###################################################
###################################################
$media   = 'REX_VALUE[6]';
$poster  = 'REX_MEDIA[1]';
if ($poster != "") {
    $poster = 'poster="/images/poster/REX_MEDIA[1]"';
}
$mediacheck                 = new rex_video();
$link                       = $mediacheck->getVideoType($media);
$position_bild              = 'REX_VALUE[2]';
$groesse_bild               = 'REX_VALUE[3]';
$bild_unterschrift_anzeigen = 'REX_VALUE[4]';
$caption_bild               = 'REX_VALUE[5]';
$uk_lightbox                = 'REX_VALUE[7]';
$bild_schatten              = 'REX_VALUE[9]';
$bild_als_kreis             = 'REX_VALUE[10]';
$animiere_bild              = 'REX_VALUE[11]';
$repeat_animation           = 'REX_VALUE[12]';
$autoplayStandart           = rex_config::get('video', 'autoplay_plyr');
$hideControls               = rex_config::get('video', 'controls_plyr');
$clickToPlay                = rex_config::get('video', 'click_plyr');
if (empty($caption_bild) == true) {
    $caption_bild = ' ';
}
## Bild bekommen für Typ oder ähnliches ##
$media_type = rex_media::get($media);
if ($media_type) {
    // Medium vorhanden
    $media_type = $media_type->getType();
} else {
    // Kein Medium ausgewählt
}
## animiere Bild ##
if (!rex::isBackend()) {
    if ($repeat_animation == 'ja') {
        $repeatIt = ' repeat: true';
    }
    if ($repeat_animation == 'nein') {
        $repeatIt = ' repeat: false';
    }
    if ($animiere_bild == 'ja') {
        if ($position_bild == 'klxm_pright') {
            $flyIn = 'uk-scrollspy="cls:uk-animation-slide-right;' . $repeatIt . '"';
        }
        if ($position_bild == 'klxm_pleft') {
            $flyIn = 'uk-scrollspy="cls:uk-animation-slide-left;' . $repeatIt . '"';
        }
        if ($position_bild == ' ') {
            $flyIn = 'uk-scrollspy="cls:uk-animation-scale-up;' . $repeatIt . '"';
        }
    }
}
if ($animiere_bild == 'nein') {
    $flyIn = ' ';
}
## Bild als Kreis Funktion ##
if ($bild_als_kreis == 'ja') {
    if ($media_type == 'image/svg+xml') {
        $klxm_image = '<img class="' . $bild_schatten . ' uk-border-circle" src="/media/' . $media . '">';
    } else {
        $klxm_image = '<img class="' . $bild_schatten . ' uk-border-circle" src="/images/uikit_quadrat/' . $media . '">';
    }
}
if ($bild_als_kreis == 'nein') {
    if ($media_type == 'image/svg+xml') {
        $klxm_image = '<img class="' . $bild_schatten . '" src="/media/' . $media . '">';
    } else {
        $klxm_image = '<img class="' . $bild_schatten . '" src="/images/uikit_standard/' . $media . '" >';
    }
}
## Lightbox Funktion ##
if ($uk_lightbox != ' ') {
    $media_output = '<a class="uk-inline" href="/images/uikit_standard/' . $media . '" alt="' . $caption_bild . '" caption="' . $caption_bild . '" >
                        ' . $klxm_image . '
                    </a>
                    <p class="klxm_bild_unterschrift uk-margin-small ' . $bild_unterschrift_anzeigen . '">' . $caption_bild . '</p>';
} else {
    $media_output = $klxm_image . '<p class="klxm_bild_unterschrift uk-margin-small ' . $bild_unterschrift_anzeigen . '">' . $caption_bild . '</p>';
}
## Wenn Video dann wird Bild überschrieben ##
if ($media == '') {
    $media_output = '';
}
if ($mediacheck->checkYoutube($link) == true) {
    $media_output = '<div class="' . $bild_schatten . ' rex_video ' . $autoplayStandard . ' ' . $hideControls . ' ' . $clickToPlay . '" data-type="youtube"  data-video-id="' . $mediacheck->getYoutubeId($link) . '"></div></br>';
}
if ($mediacheck->checkVimeo($link) == true) {
    $media_output = '<div class="' . $bild_schatten . ' rex_video ' . $hideControls . ' ' . $autoplayStandard . ' ' . $clickToPlay . '" data-type="vimeo" data-video-id="' . $mediacheck->getVimeoId($link) . '"></div></br>';
}
if ($mediacheck->checkMedia($media) !== false) {
    if ($autoplayStandard == 'Ja') {
        $localAutoplay = "autoplay";
    }
    $media_output = '
        <section>
            <video ' . $poster . ' class="' . $bild_schatten . '">
                <source src="' . $link . '" type="video/mp4">
            </video>
        </section>
         ';
}
if ($mediacheck->checkAudio($file) !== false) {
    $media_output = '  
        <section>
            <audio ' . $autoplay_audio . ' ' . $loop_audio . '>
                <source src="' . $link . '" type="audio/mp3">
            </audio>
        </section>
        ';
}
###################################################
###################################################
###########           Main Part         ###########
###################################################
###################################################
?>
<section class="uk-section uk-section-default">
    <div class="uk-container">
    <div id="topicREX_ARTICLE_ID-REX_SLICE_ID" class="klxm_text_container">

        <div class="klxm_text <?= $columns ?>">    
            <?php
if (!empty($media_output)) {
?>
           <div class="klxm_bild <?= $groesse_bild ?> <?= $position_bild ?>" <?= $uk_lightbox ?> <?= $flyIn ?>>
                <?php
    echo $media_output;
?>
           </div>
            <?php
}
?>
           <?= $text ?>
       </div>
    </div>
</div>
</section>
