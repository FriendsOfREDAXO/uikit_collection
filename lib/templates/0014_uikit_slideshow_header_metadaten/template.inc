<?php
///////////////////
//INIT VARIABLES//
/////////////////

$tree_article   = $values = $id = $text = $title  = $nav = $show_navi = '';

$nav = $id = 0;
$infocenter = rex_getUrl(17);
/////////////////
//DO THE MAGIC// 
///////////////


//if($type == 1) {
	$nav = 0;
	$gallery_output .= '<div class="gallery_container_start">
	<div class="floating_buttons uk-visible@s">
		<ul class="floating_buttons_ul">
			<li class="floating_buttons_phone">
				<button id="floating_buttons_phone_button" class="uk-button uk-button-primary"><i class="fas fa-phone"></i></button>
	        	<div id="floating_buttons_phone_field" class="floating_buttons_invisible">
	        		REX_ARTICLE[18]
	        	</div>
			</li>
			<li class="floating_buttons_info">
				<button id="floating_buttons_info_button" class="uk-button uk-button-primary"><i class="fas fa-info-circle"></i></button>
				<div id="floating_buttons_info_field" class="floating_buttons_invisible">
					<a href="'.$infocenter.'">zum Infocenter</a>
				</div>
			</li>
			<li class="floating_buttons_search">
				<button id="floating_buttons_search_button" class="uk-button uk-button-primary"><i class="fas fa-search"></i></button>
				<div id="floating_buttons_search_field" class="floating_buttons_invisible">
					<form class="uk-search uk-search-default">
						<span uk-search-icon></span>
					    <input class="uk-search-input" type="search" placeholder="Search...">
					</form>
				</div>
			</li>	
		</ul>
	</div>
		<div class="uk-position-relative uk-visible-toggle uk-light" uk-slideshow="autoplay-interval: 10000; autoplay: true; animation: fade ; ratio:16:7; velocity: 0.4; max-height: 400; min-height: 200;">
			<div class="uk-slideshow-items">';
			
		$tree_article = rex_article::get($this->getValue('article_id'));
		$ken_burns = $this->getValue('art_effect');
		$ken_burns_cat = $this->getValue('cat_effect');
		if($ken_burns_cat == '|true|') {
			$ken_burns_effect = 'uk-animation-kenburns'; 
		}
		if($ken_burns_cat != '|true|') {
			$ken_burns_effect = ' '; 
		}
		if($ken_burns == '|true|') {
			$ken_burns_effect = 'uk-animation-kenburns'; 
		}
		if($ken_burns != '|true|' && $ken_burns_cat != '|true|') {
			$ken_burns_effect = ' '; 
		}
		$art_tree = $tree_article->getParentTree();

		$root_cat = $art_tree[0]->getID();
		// Wenn in den Artikeldaten hinterlegt
		    
		$iSlideshow = $this->getValue('art_slideshow');

		if (false === empty ($iSlideshow)) {
		        $slideshowdata = $iSlideshow;
		        } 
		else{
		        $slideshowdata = $art_tree[0]->getValue('cat_slideshow');
		        }
		if ($slideshowdata !="") {
		$slidedata = explode(",", $slideshowdata) ;

			foreach($slidedata as $slideItem) {
				if($i%2 == 0) {
					$gallery_output .=  '
						<div class="uk-position-cover '.$ken_burns_effect.' uk-animation-reverse uk-transform-origin-center">
		            		<img src="/images/slidestart/'.$slideItem.'" alt=""  uk-cover>
		        		</div>';
				}
				else { 
					$gallery_output .=  '
						<div class="uk-position-cover '.$ken_burns_effect.' uk-animation-reverse uk-transform-origin-center">
		            		<img src="/images/slidestart/'.$slideItem.'" alt="" uk-cover>
		        		</div>';
				}
				$i = $i +1;
				$nav = $nav + 1;
			}
		}
			$gallery_output .= '
				</div>
				<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
	    		<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>';
		    	$gallery_output .=  '<div class="uk-position-bottom-center uk-position-small">
		    	<div class="uk-dotnav uk-flex-center uk-margin uk-visible@m">';
				for ($x = 0; $x < $nav; $x++) {
	    			$gallery_output .=  '
	    			<div uk-slideshow-item="'.$x.'"><a href="#">Item '.$x.'</a></div>';
				}
	    		$gallery_output .=  '
	    		</div></div>';
	$gallery_output .=  '
	</div>
	</div>';
	echo $gallery_output;
