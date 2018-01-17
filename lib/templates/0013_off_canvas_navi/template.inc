<?php
$path = rex_article::getCurrent()->getPathAsArray();
if(!empty($path[0])) { 
	$path1 = $path[0];
} 
if(!empty($path[1])) { 
	$path2 = $path[1];
} 
?>
<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar"> 
	<nav class="uk-navbar-container" uk-navbar style="position: relative; z-index: 980;">
	
	<div class="uk-navbar-left koch_svg_logo">
		<a class="uk-navbar-item uk-margin-large-left uk-logo uk-padding-remove" href="<?=rex_getUrl(7)?>">
			<svg width="300px" height="120px" viewBox="0 0 387 120" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;"><text x="120.783px" y="73.355px" style="font-family:'Hind-SemiBold', 'Hind';font-weight:600;font-size:27px;fill:#fff;">KOCH-KLIMATECHNIK</text><path d="M67.793,5.856l-67.793,67.5l67.793,0l0,-67.5Z" style="fill:#fff;fill-rule:nonzero;"/><clipPath id="_clip1"><rect x="0" y="5.856" width="447.879" height="82.176" clip-rule="nonzero"/></clipPath><g clip-path="url(#_clip1)"><path d="M73.71,7.731l0,61.108c20.44,-20.37 40.879,-40.738 61.318,-61.108l-61.318,0Z" style="fill:none;stroke:#fff;stroke-width:3.75px;"/></g></svg>
		</a>
	</div>
<?php	
    $navigation .= '<div class="uk-navbar-right">
	    <button class="uk-margin-large-right uk-padding-remove uk-navbar-toggle" uk-icon="icon: menu; ratio: 2" type="button" uk-toggle="target: #offcanvas-overlay"></button>
	    <div id="offcanvas-overlay" uk-offcanvas="overlay: true; flip: true;">
        	<div class="uk-offcanvas-bar uk-dark">
    			<button class="uk-offcanvas-close" type="button" uk-close></button>
    			<ul class="uk-nav uk-nav-default">';
    			
					foreach (rex_category::getRootCategories() as $lev1) {
					    if ($lev1->isOnline(true)) {
					    	if ($lev1->isOnline(true)) {
					        	$active = ' ';
					            if($lev1->getId() == $path1) {
					            	$active = ' class="active_nav"';
					            }
					    	}
							$navigation .= '<li class="uk-parent"> <a '.$active.' href="'.$lev1->getUrl().'">'.htmlspecialchars($lev1->getValue('name')).'</a>';
							$lev1Size = sizeof($lev1->getChildren());
							
					        if ($lev1Size != "0") {
					        	$navigation .= '<ul class="uk-nav-sub ">';
					                foreach ($lev1->getChildren() as $lev2) {
					                    if ($lev2->isOnline(true)) {
					                    	$active = ' ';
					                    if($lev2->getId() == $path2) {
					                        $active = ' class="active_nav"';
					                    }
					                        $navigation .='<li'.$active.'><a href="'.$lev2->getUrl().'">'.htmlspecialchars($lev2->getValue('name')).'</a></li>';
					                    }
					                }
								$navigation .='</ul>';
					        }
					    $navigation .= '</li>';
						}
					}
		$navigation .= '<ul></div></div></div></nav></div>';
echo $navigation;