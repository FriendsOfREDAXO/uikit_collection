<?php
$uk_navigation = '';
$path = rex_article::getCurrent()->getPathAsArray();
if (!empty($path[0]))
{
    $path1 = $path[0];
}
if (!empty($path[1]))
{
    $path2 = $path[1];
}

foreach (rex_category::getRootCategories() as $lev1)
{
    if ($lev1->isOnline(true))
    {
        if ($lev1->isOnline(true))
        {
            $active = ' ';
            if ($lev1->getId() == $path1)
            {
                $active = ' uk-active';
            }
        }
        $uk_navigation .= '<li class="uk-parent' . $active . '"> <a href="' . $lev1->getUrl() . '">' . htmlspecialchars($lev1->getValue('name')) . '</a>';
        $lev1Size = sizeof($lev1->getChildren());

        if ($lev1Size != "0")
        {
            $uk_navigation .= '<ul class="uk-nav-sub ">';
            foreach ($lev1->getChildren() as $lev2)
            {
                if ($lev2->isOnline(true))
                {
                    $active = ' ';
                    if ($lev2->getId() == $path2)
                    {
                        $active = ' class="uk-active"';
                    }
                    $uk_navigation .= '<li' . $active . '><a href="' . $lev2->getUrl() . '">' . htmlspecialchars($lev2->getValue('name')) . '</a></li>';
                }
            }
            $uk_navigation .= '</ul>';
        }
        $navigation .= '</li>';
    }
}?>
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
                    <ul class="uk-nav uk-nav-default">
                        <?=$uk_navigation;?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
