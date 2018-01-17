<?php
$path = rex_article::getCurrent()->getPathAsArray();
$path1 = ((!empty($path[1])) ? $path[1] : '');
$navigation .= '
<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
	<nav class="uk-navbar-container uk-margin" uk-navbar style="position: relative; z-index: 980; uk-navbar="mode: hover">
	<div class="uk-navbar-left">
		<a class="uk-navbar-item uk-logo" href="#">Logo</a>
	</div>
    <div class="uk-navbar-center">
        <ul class="uk-navbar-nav">';
foreach (rex_category::getRootCategories() as $lev1) {
    if ($lev1->isOnline(true)) {
		$active = ($lev1->getId() == $path1) ? ' class="uk-active"' : '';
		 $navigation .= '<li'.$active.'><a href="'.$lev1->getUrl().'">'.htmlspecialchars($lev1->getValue('name')).'</a><div class="uk-navbar-dropdown">';
		             $lev1Size = sizeof($lev1->getChildren());    
            if ($lev1Size != "0") {
                $navigation .= '<ul class="uk-nav uk-navbar-dropdown-nav">';
                    foreach ($lev1->getChildren() as $lev2) {
                        if ($lev2->isOnline(true)) {
                            $active = ($lev2->getId() == $path2) ? ' class="uk-active"' : '';
                            $navigation .='<li'.$active.'><a href="'.$lev2->getUrl().'">'.htmlspecialchars($lev2->getValue('name')).'</a></li>';
                        }
                    }
				$navigation .='</ul>';
            }
    $navigation .= '</li>';
	}
}
$navigation .= '<ul></div></nav></div>';
echo $navigation;