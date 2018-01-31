<?php

$rexInputVars = rex_var::toArray("REX_VALUE[1]");
$rexSettingVars = rex_var::toArray("REX_VALUE[2]")[0];


// settings vars
$ukGutterWidth = 'uk-grid-'.$rexSettingVars['gutterWidth'];
$ukMatchHeight = isset($rexSettingVars['matchHeight']) ? ' uk-grid-match' : '';

// start output
$output = array();
$output[] = '<div class="'.$ukGutterWidth.$ukMatchHeight.' uk-child-width-expand@m" uk-grid>';


foreach($rexInputVars as $rexVar) {

    // uk vars
    $ukColor = 'uk-background-'.$rexVar['ukColor'];
    $ukWidth = 'uk-width-'.$rexVar['ukWidth'];

    // content vars
    $header = rex_escape($rexVar['header']);
    $content = rex_escape($rexVar['content']);
    $footer = rex_escape($rexVar['footer']);

    // wrapper
    $output[] = '<div class="'.$ukWidth.'">';
    $output[] = '<div class="uk-card '.$ukColor.' uk-card-body">';

    // header
    $output[] = '<div class="uk-card-header">';
    $output[] = '<h3 class="uk-card-title">'.$header.'</h3>';
    $output[] = '</div>';
    // body / content
    $output[] = '<div class="uk-card-body">';
    $output[] = '<p>'.$content.'</p>';
    $output[] = '</div>';
    // footer
    $output[] = '<div class="uk-card-footer">';
    $output[] = '<p>'.$footer.'</p>';
    $output[] = '</div>';

    // end wrapper
    $output[] = '</div>';
    $output[] = '</div>';

}

$output[] = '</div>';


echo join("\n", $output);
