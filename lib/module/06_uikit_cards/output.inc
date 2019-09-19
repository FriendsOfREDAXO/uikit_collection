<?php
$footer = '';        
$rexInputVars = rex_var::toArray("REX_VALUE[1]");
$rexSettingVars = rex_var::toArray("REX_VALUE[2]") [0];
$rexColorVars = rex_var::toArray("REX_VALUE[3]") [0];
?>
<section class="uk-section uk-preserve-color uk-section-<?=$rexColorVars['ukcolor']?>REX_VALUE[14]">
<?php echo '<div class="uk-container">'; ?>

<?php
 $footer = '';        
$rexInputVars = rex_var::toArray("REX_VALUE[1]");
$rexSettingVars = rex_var::toArray("REX_VALUE[2]") [0];


// settings vars
$ukGutterWidth = 'uk-grid-' . $rexSettingVars['gutterWidth'];
$ukMatchHeight = isset($rexSettingVars['matchHeight']) ? ' uk-grid-match' : '';

// start output
$output = array();
$output[] = '<div uk-height-match=".uk-card" uk-scrollspy="target: > div; cls:uk-animation-fade; delay: 500" class="' . $ukGutterWidth . $ukMatchHeight . ' uk-child-width-expand@m uk-flex-center" uk-grid>';

foreach ($rexInputVars as $rexVar)
{

    // uk vars
    $ukColor = 'uk-background-' . $rexVar['ukColor'];
    $ukFontColor = $rexVar['ukFontColor'];
    $ukWidth = 'uk-width-' . $rexVar['ukWidth'];

    // content vars
    $header = $rexVar['header'];
    $title = $rexVar['imageTitle'];
    $content = $rexVar['content']; 
    $image = $rexVar['REX_MEDIA_1'];
    $link = $rexVar[1];
    $LinkText = $rexVar['LinkText'];
    if ($LinkText =='')
    {
        $LinkText = 'Weitere Informationen';
    }
        

if ($link!='')
{  
$linkout = infolink($link);    
$linkout ='<a class="uk-preserve-color uk-button uk-button-text" href="'.$linkout.'">' . $LinkText . ' <i class="fa fa-chevron-right"></i></a>'; 
} 
   
    // wrapper
    $output[] = '<div class="' . $ukWidth . '">';

    $output[] = '<div class="uk-card uk-card-default ' . $ukColor .  $ukFontColor .'">';


    
    // IMAGE
    if ($image != '')
    {
        $output[] = '<div class="uk-card-media-top"><div class="uk-overflow-hidden"><img class="dopic uk-animation-kenburns" src="/images/card/' . $image . '" title="' . $title . '" alt="' . $header . '"></div></div>';
    }
    // header
    if ($header!='')
    {
    $output[] = '<div class="uk-card-header'.$ukFontColor.'">';
    $output[] = '<div class="uk-card-title">' . $header . '</div>';
    $output[] = '</div>';
    }
    
    // body / content
    $output[] = '<div class="uk-card-body">';
    $output[] = $content;
    $output[] = '</div>';
    // footer
    if($rexVar[1])
    {
    $output[] = '<div class="uk-card-footer">';
    $output[] = $linkout;
    $output[] = '</div>';
    }
   
    // end wrapper
    $output[] = '</div>';
    $output[] = '</div>';

}

$output[] = '</div>';

echo join("\n", $output);
?>
<?php echo '</div>'; ?>
</section>





