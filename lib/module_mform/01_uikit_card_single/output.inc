<?php

$rexInputVars = $rexSettingVars = null;

$rexInputVars = rex_var::toArray("REX_VALUE[1]")[0];
$rexSettingVars = rex_var::toArray("REX_VALUE[2]")[0];


// settings vars
$ukGutterWidth = 'uk-grid-' . $rexSettingVars['gutterWidth'];
$ukColor = 'uk-background-' . $rexSettingVars['ukColor'];
$ukWidth = 'uk-width-' . $rexSettingVars['ukWidth'];


// content vars
$header = $rexInputVars['header'];
$content = $rexInputVars['content'];
$footer = $rexInputVars['footer'];


// start output
$output = array();
$output[] = '<div class="uk-width-'.$rexSettingVars['ukWidth'].'" uk-grid>';

// wrapper
$output[] = '<div class="uk-width-1-1">';
$output[] = '<div class="uk-card ' . $ukColor . ' uk-card-body">';

// header
$output[] = '<div class="uk-card-header">';
$output[] = '<h3 class="uk-card-title">' . $header . '</h3>';
$output[] = '</div>';
// body / content
$output[] = '<div class="uk-card-body">';
$output[] = '<p>' . $content . '</p>';
$output[] = '</div>';
// footer
$output[] = '<div class="uk-card-footer">';
$output[] = '<p>' . $footer . '</p>';
$output[] = '</div>';

// end wrapper
$output[] = '</div>';
$output[] = '</div>';


$output[] = '</div>';
echo join("\n", $output);