<section class="uk-section uk-section-default">
    <div class="uk-container">

<?php
$rexInputVars = rex_var::toArray("REX_VALUE[1]");
$rexSettingVars = rex_var::toArray("REX_VALUE[2]") [0];

// settings vars
$ukGutterWidth = 'uk-grid-' . $rexSettingVars['gutterWidth'];
$ukMatchHeight = isset($rexSettingVars['matchHeight']) ? ' uk-grid-match' : '';

// start output
$output = array();
$output[] = '<div uk-scrollspy="target: > div; cls:uk-animation-fade; delay: 500" class="' . $ukGutterWidth . $ukMatchHeight . ' uk-child-width-expand@m" uk-grid>';

foreach ($rexInputVars as $rexVar)
{

    // uk vars
    $ukColor = 'uk-background-' . $rexVar['ukColor'];
    $ukWidth = 'uk-width-' . $rexVar['ukWidth'];

    // content vars
    $header = $rexVar['header'];
    $title = $rexVar['imageTitle'];
    $content = $rexVar['content'];
    $footer = $rexVar['footer'];
    $image = $rexVar['REX_MEDIA_1'];

    // wrapper
    $output[] = '<div class="' . $ukWidth . '">';

    $output[] = '<div class="linkdiv uk-card  uk-card-default ' . $ukColor . '">';

    // IMAGE
    if ($image != '')
    {
        $output[] = '<div class="uk-card-media-top"><div class="uk-overflow-hidden"><img class="uk-animation-kenburns" src="/images/card/' . $image . '" title="' . $title . '" alt="' . $header . '"></div></div>';
    }

    // header
    $output[] = '<div class="uk-card-header">';
    $output[] = '<div class="uk-card-title">' . $header . '</div>';
    $output[] = '</div>';
    // body / content
    $output[] = '<div class="uk-card-body">';
    $output[] = $content;
    $output[] = '</div>';
    // footer
    $output[] = '<div class="uk-card-footer">';
    $output[] = $footer;
    $output[] = '</div>';

    // end wrapper
    $output[] = '</div>';
    $output[] = '</div>';

}

$output[] = '</div>';

echo join("\n", $output);
?>
</div>
</section>
