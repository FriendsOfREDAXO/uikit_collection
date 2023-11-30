<?php

/**
 * @var rex_fragment $this
 * @psalm-scope-this rex_fragment
 */

// Deklaration der Variablen
$footer = $media = '';
$attributes_main = $attributes_body = [];
$media_bottom  = false;

if (isset($this->help) && $this->help === true) {
    $help = [];
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
    dump($help);
}

// main check if media and position are set
if (isset($this->media) && $this->media !== '') {
    $media  = '<div class="uk-card-media-top">' . $this->media . '</div>';
    
    if (isset($this->media_bottom) && $this->media_bottom === true) {
        $media = '';
        $media_bottom  = '<div class="uk-card-media-bottom">' . $this->media . '</div>';
    }
}

// main check if footer isset
if (isset($this->footer) && $this->footer !== '') {
    $footer  = '<div class="uk-card-footer stretch_footer">'.$this->footer.'</div>';
    }




// default is allways uk-card
$main_attributes = [];
$main_attributes['class'] = 'uk-cover-container uk-card';
if (isset($this->main_attributes) && is_array($this->main_attributes)) {
    $attributes = $this->main_attributes;
    if (array_key_exists('class', $this->main_attributes)) {
        $class = $this->main_attributes['class'];
        $main_attributes['class'] = 'uk-cover-container uk-card ' . $class;
    }
}
$attributes_main = rex_string::buildAttributes($main_attributes);
// default body is allways uk-card-body
$body_attributes = [];
$body_attributes['class'] = 'uk-card-body stretch_body';
if (isset($this->body_attributes) && is_array($this->body_attributes)) {
    $attributes = $this->body_attributes;
    if (array_key_exists('class', $this->body_attributes)) {
        $class = $this->body_attributes['class'];
        $body_attributes['class'] = 'uk-card-body ' . $class;
    }
}
$attributes_body = rex_string::buildAttributes($body_attributes);
?>     
    <div<?= $attributes_main ?>>
     <div class="uk-card-wrapper">
        <?= $media ?>
        <?php if (isset($this->title) && is_string($this->title) && $this->title !== '') : ?>
            <div class="uk-card-header">
                <h3 class="uk-card-title"><?= $this->title ?></h3>
            </div>
        <?php endif; ?>
       <?php if (isset($this->body_prepend) && is_string($this->body_prepend) && $this->body_prepend !== '') : ?>
       <?= $this->body_prepend ?>
       <?php endif; ?> 
         <?php if (isset($this->body) && is_string($this->body) && $this->body !== '') : ?>
        <div<?= $attributes_body ?>>   
                <?= $this->body ?>
        </div>
         <?php endif; ?>
        <?php if (isset($this->body_append) && is_string($this->body_append) && $this->body_append !== '') : ?>
        <?= $this->body_append ?>
        <?php endif; ?> 
                <?= $footer ?>
        <?= $media_bottom ?>
        </div>
    </div>
