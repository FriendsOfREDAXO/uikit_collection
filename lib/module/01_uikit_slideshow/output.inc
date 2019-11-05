<?php
///////////////////
//INIT VARIABLES//
/////////////////

$set_autoplay = $picture = $autoplay = $type = $values = $id = $text = $title = $animation_type = $nav = $show_navi = '';

//////////////////
//SET VARIABLES//
////////////////

$type = 'REX_VALUE[15]';
$autoplay = 'REX_VALUE[16]';
$ratio = rex_escape('REX_VALUE[17]');
$animation_type = 'REX_VALUE[18]';
$show_navi = 'REX_VALUE[19]';

if($autoplay == 1) {
	$set_autoplay = 'true';

}
if($autoplay == 2) {
	$set_autoplay = 'false';
}
$values = rex_var::toArray("REX_VALUE[1]");

$nav = $id = 0;

/////////////////
//DO THE MAGIC// 
///////////////


// KEN BURNS EFFECT 

if($type == 1) {
	
	$nav = 0;
	$gallery_output .= '<div class="gallery_container">
		<div class="uk-position-relative uk-visible-toggle uk-light" uk-slideshow="autoplay-interval: 8000; autoplay: '.$set_autoplay.'; animation: '.$animation_type.'; ratio: '.$ratio.';">
			<div class="uk-slideshow-items">';
			foreach($values as $value) {
				$picture = rex_escape($value['REX_MEDIA_1']);
				
                $kenburns  = '';
                if(rex_plyr::checkMedia($picture)==true)
                {    
                $media = '<video src="/media/'.$picture.'" autoplay loop muted playsinline uk-cover></video>';
                }
                else
                {
                $media = '<img src="/media/'.$picture.'" alt="" uk-cover>';
                $kenburns = ' uk-animation-kenburns ';    
                }
				if($i%2 == 0) {
					$gallery_output .=  '
						<div class="uk-position-cover'.$kenburns.'uk-animation-reverse uk-transform-origin-center-right">
		            		'.$media.'
		        		</div>';
				}
				else {
					$gallery_output .=  '
						<div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
		            		'.$media.'
		        		</div>';
				}
				$i = $i + 1; 
				$nav = $nav + 1;
			}
			$gallery_output .= '
				</div>
				<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
	    		<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>';
			if($show_navi == 'ja') {
		    	$gallery_output .=  '
		    	 <div class="uk-position-bottom-center uk-position-small">
		    	<div class="uk-dotnav uk-flex-center uk-margin">';
				for ($x = 0; $x < $nav; $x++) {
	    			$gallery_output .=  '
	    			<div uk-slideshow-item="'.$x.'"><a href="#">Item '.$x.'</a></div>';
				}
				$gallery_output .=  '</div></div>';

			}

	$gallery_output .=  '
	</div>
	</div>';
	echo $gallery_output;
}

// NUR MIT TEXT 

if($type == 2) {
	$nav = 0;
	$gallery_output .= '<div class="gallery_container">
		<div class="uk-position-relative uk-visible-toggle uk-light" uk-slideshow="autoplay-interval: 8000; autoplay: '.$set_autoplay.'; animation: '.$animation_type.'; ratio: '.$ratio.';">
			<div class="uk-slideshow-items">';
			foreach($values as $value) {
				$picture = rex_escape($value['REX_MEDIA_1']);
                $kenburns  = '';
                if(rex_plyr::checkMedia($picture)==true)
                {    
                $media = '<video src="/media/'.$picture.'" autoplay loop muted playsinline uk-cover></video>';
                }
                else
                {
                $media = '<img src="/media/'.$picture.'" alt="" uk-cover>';
                $kenburns = ' uk-animation-kenburns ';    
                }
                
				$text = rex_escape($value['text']);
				$title = rex_escape($value['title']);
				$textPos = rex_escape($value['posText']);
				$textCol = rex_escape($value['colText']);
				$textAni = rex_escape($value['aniText']);
				$gallery_output .= '
						<div>
		            		'.$media.'
		            			<div class="'.$textPos.' '.$textCol.' uk-position-medium uk-text-center uk-light '.$textAni.'">
                				<h2 uk-heading-line uk-heading-medium uk-slideshow-parallax="x: 200,0,0;">'.$title.'</h2>
                					<p uk-heading-small" cuk-slideshow-parallax="x: 400,0,0;">'.$text.'</p>
            					</div>
		        		</div>';
				$nav = $nav + 1; 
			}
			$gallery_output .= '</div>
			<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
	    	<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>';
			if($show_navi == 'ja') {
		    	$gallery_output .=  '
		    	 <div class="uk-position-bottom-center uk-position-small">
		    	<div class="uk-dotnav uk-flex-center uk-margin">';
				for ($x = 0; $x < $nav; $x++) {
	    			$gallery_output .=  '
	    			<div uk-slideshow-item="'.$x.'"><a href="#">Item '.$x.'</a></div>';
				}
				$gallery_output .=  '</div></div>';

			}
	$gallery_output .=		
	'</div>
	</div>';
	echo $gallery_output;
}

// Spezial Funktion 
if($type == 3) {
	$nav = 0;
	$gallery_output .= '<div class="gallery_container">
		<div class="uk-position-relative uk-visible-toggle uk-light" uk-slideshow="autoplay-interval: 8000; autoplay: '.$set_autoplay.'; animation: '.$animation_type.'; ratio: '.$ratio.';">
			<div class="uk-slideshow-items">';
			foreach($values as $value) {
				$picture = rex_escape($value['REX_MEDIA_1']);
                if(rex_plyr::checkMedia($picture)==true)
                {    
                $media = '<video src="/media/'.$picture.'" autoplay loop muted playsinline uk-cover></video>';
                }
                else
                {
                $media = '<img src="/media/'.$picture.'" alt="" uk-cover>';
                $kenburns = ' uk-animation-kenburns ';    
                }
				$text = rex_escape($value['text']);
				$title = rex_escape($value['title']);
				$textPos = rex_escape($value['posText']);
				$textCol = rex_escape($value['colText']);
				$gallery_output .= '
					<div>
						<div class="uk-position-cover uk-animation-kenburns" uk-slideshow-parallax="scale: 1.2,1.2,1">
		            		'.$media.'<div style="opacity: 0.2;" class="uk-overlay-primary uk-position-cover"></div>
		            	</div>
		            		<div class="'.$textPos.' '.$textCol.' uk-position-medium uk-text-center uk-light" uk-slideshow-parallax="scale: 1,1,0.9;">
		            			<div uk-slideshow-parallax="scale: 1,1,0.8;">
                					<h2 class="uk-heading-line uk-heading-medium uk-text-center" uk-slideshow-parallax="x: 200,0,0;"><span>'.$title.'</span></h2>
                					<p class="uk-heading-small" cuk-slideshow-parallax="x: 400,0,0;">'.$text.'</p>
                				</div>
                			</div>
                            
		        		</div>';
				$nav = $nav + 1; 
			}
			$gallery_output .= '</div>
			<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
	    	<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>';
			if($show_navi == 'ja') {
		    	$gallery_output .=  '
		    	 <div class="uk-position-bottom-center uk-position-small">
		    	<div class="uk-dotnav uk-flex-center uk-margin">';
				for ($x = 0; $x < $nav; $x++) {
	    			$gallery_output .=  '
	    			<div uk-slideshow-item="'.$x.'"><a href="#">Item '.$x.'</a></div>';
				}
				$gallery_output .=  '</div></div>';

			}

	$gallery_output .=		
	'</div>
	</div>';
	echo $gallery_output;
}
