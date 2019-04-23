<?php

//
// DEMO ::UiKit-Aufklappmenü
//
function myNavi($data = array())
{
    foreach ($data as $cat) {
        $subnavi = $li = $ul = "";
        if ($cat['level'] == 0 && $cat['hasChildren'] == true)
         {
            $li = ' class="uk-parent"';
            $ul = ' class="uk-nav-sub"';
         }
        if ($cat['hasChildren'] == true) {
            $sub = [];
            $sub[] = '<ul'.$ul.'>';
            $sub[] = myNavi($cat['children']);
            $sub[] = '</ul>';
            $subnavi = join("\n", $sub);
        }
        
        $catname = $cat['catName'];
        
        if ($cat['active'] == true) {
            $catname = '<strong>' . $catname . '</strong>';
        }
        
        $catname = '<a href="'.$cat['url'].'">'.$catname.'</a>';
       
        $output[] = '<li'.$li.'>' . $catname . $subnavi . '</li>';
    }
    return join("\n", $output);
}



// Erstellen des Arrays
$daten = structureArray($start = 0, $depth = 1, $ignoreoffline = true);

// Navigation erzeugen aus Array
$navigation = '<div class="uk-width-1-2@s uk-width-2-5@m">
    <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>'
    .myNavi(structureArray($start = 0, $depth = 4, true)).
    '</ul>
</div>';




?>
<div class="nav" data-uk-sticky="top: 200; animation: uk-animation-slide-top">
    <nav class="uk-navbar-container" data-uk-navbar>
        <div class="uk-navbar-left">
            <a class="uk-navbar-item uk-logo" href="/">LOGO</a>
        </div>
        <div class="uk-navbar-right">
            <button class="uk-navbar-toggle" uk-icon="icon: menu; ratio: 2" type="button" uk-toggle="target: #sidebar-navi"></button>
            <div id="sidebar-navi" uk-offcanvas="overlay: true; flip: false;">
                <div class="uk-offcanvas-bar uk-dark">
                    <button class="uk-offcanvas-close" type="button" uk-close></button>
                   
                        <?=$navigation;?>
                
                </div>
            </div>
        </div>
    </nav>
</div>
