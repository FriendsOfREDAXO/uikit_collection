<?php
$path = rex_article::getCurrent()->getPathAsArray();
$path1 = $path[0] ?: $this->getValue('id');
$path2 = $path[1] ?: $this->getValue('id');
$navigation = '';
foreach (rex_category::getRootCategories(true) as $lev1) {
    $active = $lev1->getId() == $path1 ? ' class="uk-active"' : '';
    $navigation .= '<li' . $active . '><a href="' . $lev1->getUrl() . '">' . htmlspecialchars($lev1->getValue('name')) . '</a>';
    $lev1Childs = $lev1->getChildren(true);
    if (count($lev1Childs) > 0) {
        $navigation .= '<div class="uk-navbar-dropdown"><ul class="uk-nav uk-navbar-dropdown-nav">';
        foreach ($lev1Childs as $lev2) {
            $active = $lev2->getId() == $path2 ? ' class="uk-active"' : '';
            $navigation .= '<li' . $active . '><a href="' . $lev2->getUrl() . '">' . htmlspecialchars($lev2->getValue('name')) . '</a></li>';
        }
        $navigation .= '</ul></div>';
    }
    $navigation .= '</li>';
}
?>

<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
    <nav class="uk-navbar-container uk-margin" uk-navbar style="position: relative; z-index: 980;" uk-navbar="mode: hover">
         <div class="uk-navbar-left">
            <div class="uk-navbar-left">
                <a class="uk-navbar-item uk-logo" href="#">Logo</a>
            </div>
            <ul class="uk-navbar-nav">
                <?= $navigation ?>
            </ul>

        </div>
    </nav>
</div>
