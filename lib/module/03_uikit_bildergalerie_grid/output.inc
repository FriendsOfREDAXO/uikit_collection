<?php
$values = rex_var::toArray("REX_VALUE[1]");
$animation = 'REX_VALUE[15]';
$kachelnanzahl = 'REX_VALUE[16]';

$grid_output .= '<div class="uk-grid-match uk-text-center" uk-grid uk-lightbox="animation: '.$animation.';">';

foreach($values as $value) {
	$picture = rex_escape($value['REX_MEDIA_1']);
	$caption = rex_escape($value['caption']);
	if($caption != '') {
	    $grid_output .= ' 
	    <div class="'.$kachelnanzahl.'">
			<a href="/images/Lightbox_uikit/'.$picture.'" caption="'.$caption.'">
				<div class="uk-card uk-card-default uk-card-hover uk-padding" uk-lightbox>
					<img src="/images/thumbnail_uikit/'.$picture.'"  alt="">
				</div>
			</a>
		</div>';
	}
	else {
	    $grid_output .= ' 
	    <div class="'.$kachelnanzahl.'">
			<a href="/images/Lightbox_uikit/'.$picture.'">
				<div class="uk-card uk-card-default uk-card-hover uk-padding" uk-lightbox>
					<img src="/images/thumbnail_uikit/'.$picture.'"  alt="">
				</div>
			</a>
		</div>';	
	}
}	
$grid_output .= '</div>';
echo $grid_output;
