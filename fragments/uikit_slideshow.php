<?php
/**
 * @var rex_fragment $this
 * @psalm-scope-this rex_fragment
 */

// Hilfe anzeigen, wenn angefordert
if (isset($this->help) && $this->help === true) {
    $help = [];
    $help['info']              = 'Fragment für UIkit Slideshow: https://getuikit.com/docs/slideshow';
    $help['slides']            = 'Array mit Slides. Jeder Slide ist ein Array mit den Keys "media", "title", "content"';
    $help['animation']         = 'Animation-Typ: fade, slide, scale, pull, push (Standard: slide)';
    $help['ratio']             = 'Seitenverhältnis der Bilder, z.B. "16:9" oder "4:3" (Optional)';
    $help['min_height']        = 'Minimale Höhe in Pixel (Optional)';
    $help['max_height']        = 'Maximale Höhe in Pixel (Optional)';
    $help['velocity']          = 'Geschwindigkeit der Animation (Default: 1)';
    $help['autoplay']          = 'Automatische Wiedergabe (true/false)';
    $help['autoplay_interval'] = 'Intervall in ms für Autoplay (Default: 7000)';
    $help['pause_on_hover']    = 'Pause bei Mauszeiger über Slideshow (true/false)';
    $help['slide_show_nav']    = 'Navigation anzeigen (true/false)';
    $help['slide_show_nav_pos'] = 'Position der Navigation: außen oder innen (outside/inside, Default: inside)';
    $help['dotnav']            = 'Punktnavigation anzeigen (true/false)';
    $help['dotnav_pos']        = 'Position der Punktnavigation: außen, innen, unten (outside/inside/bottom, Default: bottom)';
    
    dump($help);
    return;
}

// Default Werte
$animation = isset($this->animation) ? $this->animation : 'slide';
$velocity = isset($this->velocity) ? $this->velocity : '1';
$autoplay = isset($this->autoplay) && $this->autoplay === true ? 'true' : 'false';
$autoplayInterval = isset($this->autoplay_interval) ? $this->autoplay_interval : '7000';
$pauseOnHover = isset($this->pause_on_hover) && $this->pause_on_hover === true ? 'true' : 'false';
$showNav = isset($this->slide_show_nav) && $this->slide_show_nav === true;
$navPosition = isset($this->slide_show_nav_pos) ? $this->slide_show_nav_pos : 'inside';
$showDotnav = isset($this->dotnav) && $this->dotnav === true;
$dotnavPosition = isset($this->dotnav_pos) ? $this->dotnav_pos : 'bottom';

// Prüfe, ob Slides definiert sind
$slides = isset($this->slides) && is_array($this->slides) ? $this->slides : [];

if (empty($slides)) {
    return;
}

// Attribute für die Slideshow
$attributes = [
    'uk-slideshow' => 'animation: ' . $animation . ';' . 
                      'velocity: ' . $velocity . ';' .
                      'autoplay: ' . $autoplay . ';' . 
                      'autoplay-interval: ' . $autoplayInterval . ';' . 
                      'pause-on-hover: ' . $pauseOnHover
];

// Styles für die Slideshow
$styles = [];
if (isset($this->min_height)) {
    $styles[] = 'min-height: ' . $this->min_height . 'px';
}
if (isset($this->max_height)) {
    $styles[] = 'max-height: ' . $this->max_height . 'px';
}
$styleAttr = !empty($styles) ? ' style="' . implode(';', $styles) . '"' : '';

// Ratio für die Bilder
$ratio = isset($this->ratio) ? ' uk-slideshow-item="' . $this->ratio . '"' : '';

// Klassen und Attribute für unterschiedliche Positionen der Navigation
$slideshowClass = 'uk-position-relative uk-visible-toggle';
if ($showNav && $navPosition === 'outside') {
    $slideshowClass .= ' uk-slideshow-nav-outside';
}
if ($showDotnav && $dotnavPosition === 'outside') {
    $slideshowClass .= ' uk-slideshow-dotnav-outside';
}

?>

<div class="<?= $slideshowClass ?>" tabindex="-1" <?= implode(' ', array_map(function($key, $value) { return $key . '="' . $value . '"'; }, array_keys($attributes), $attributes)) ?><?= $styleAttr ?>>

    <ul class="uk-slideshow-items"<?= $ratio ?>>
        <?php foreach ($slides as $slide): ?>
            <li>
                <?php if (isset($slide['media']) && $slide['media']): ?>
                    <?php if (preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $slide['media'])): ?>
                        <img src="<?= $slide['media'] ?>" alt="<?= isset($slide['title']) ? htmlspecialchars($slide['title']) : '' ?>" uk-cover>
                    <?php elseif (preg_match('/\.(mp4|webm|ogv)$/i', $slide['media'])): ?>
                        <video src="<?= $slide['media'] ?>" autoplay loop muted playsinline uk-cover></video>
                    <?php elseif (preg_match('/^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)/', $slide['media'])): ?>
                        <iframe src="<?= $slide['media'] ?>" width="1920" height="1080" frameborder="0" uk-cover></iframe>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ((isset($slide['title']) && $slide['title']) || (isset($slide['content']) && $slide['content'])): ?>
                <div class="uk-position-cover uk-flex uk-flex-center uk-flex-middle uk-position-small">
                    <div class="uk-overlay uk-overlay-primary uk-light uk-text-center uk-width-2-3@m">
                        <?php if (isset($slide['title']) && $slide['title']): ?>
                            <h3><?= $slide['title'] ?></h3>
                        <?php endif; ?>
                        
                        <?php if (isset($slide['content']) && $slide['content']): ?>
                            <div><?= $slide['content'] ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php if ($showNav): ?>
    <div class="uk-light">
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
    </div>
    <?php endif; ?>

    <?php if ($showDotnav): ?>
    <div class="uk-position-bottom-center uk-position-small">
        <ul class="uk-slideshow-nav uk-dotnav"></ul>
    </div>
    <?php endif; ?>

</div>