<?php
// UIkit NAVIGATION uses navigation_array
function myNavi_demo($data = array())
{
    foreach ($data as $cat) {
        $subnavi = $liclass = $ul = "";
        $subclass = 'uk-default';
        if ($cat['level'] == 0 && $cat['hasChildren'] == true)
         {
            $liclass = 'uk-parent';
            $ul = ' class="uk-nav uk-navbar-dropdown-nav"';
            $subclass = 'uk-navbar-dropdown';
         }
        if ($cat['hasChildren'] == true) {
            $sub = [];
            $sub[] = '<div class="'.$subclass.'">'; 
            $sub[] = '<ul'.$ul.'>';
            $sub[] = myNavi_demo($cat['children']);
            $sub[] = '</ul>';
            $sub[] = '</div>';
            $subnavi = join("\n", $sub);
        }       
        $catname = $cat['catName'];
        if ($cat['active'] == true) {
            $catname = '<strong>' . $catname . '</strong>';
            $liclass .= 'uk-active';
        }
        if ($liclass!='')
        {
        $liclass =  ' class="'.$liclass.'"';
        }
        $catname = '<a href="'.$cat['url'].'">'.$catname.'</a>';     
        $output[] = '<li'.$liclass.'>' . $catname . $subnavi . '</li>';
    }
    return join("\n", $output);
    
}
// Navigation erzeugen
$navigation = '
    <ul class="uk-navbar-nav">'
    .myNavi_demo(navArray($start = 0, $depth = 4, true)).
    '</ul>
';
?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    if(rex_addon::get("yrewrite")->isInstalled() && rex_addon::get("yrewrite")->isAvailable()) {
        $seo = new rex_yrewrite_seo();
        echo $seo->getTitleTag() . PHP_EOL;
        echo $seo->getDescriptionTag() . PHP_EOL;
        echo $seo->getRobotsTag() . PHP_EOL;
        echo $seo->getHreflangTags() . PHP_EOL;
        echo $seo->getCanonicalUrlTag() . PHP_EOL;
    }
    ?>
    <link rel="stylesheet" href="<?= rex_url::addonAssets("uikit_collection", "/uikit-frontend/css/uikit.min.css"); ?>">
</head>
<body>
<!--- NAVI-BAR --->
    <div class="nav" data-uk-sticky="top: 200; animation: uk-animation-slide-top">
        <nav class="uk-navbar-container" uk-navbar>
            <div class="uk-navbar-left">
                <a class="uk-navbar-item uk-logo" href="/">LOGO</a>
            </div>
            <div class="uk-navbar-right">
              <?=$navigation;?>
            </div>
        </nav>
    </div>
<!--- ENDE NAVI-BAR --->
<div class="uk-container">      
    <div class="article_container">
        REX_ARTICLE[]
    </div>
</div>
<script type="text/javascript" src="<?= rex_url::addonAssets("uikit_collection", "/uikit-frontend/js/uikit.min.js"); ?>"></script>
    <script type="text/javascript" src="<?= rex_url::addonAssets("uikit_collection", "/uikit-frontend/js/uikit-icons.min.js"); ?>"></script>
 </body>
</html>
