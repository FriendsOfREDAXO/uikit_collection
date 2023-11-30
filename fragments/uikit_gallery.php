<?php
if (isset($this->media) && $this->media!='') 
{
$out = $images  = $galery_thumb2 = '';
$files = explode(",", $this->media);  
foreach ($files as $GalItem) {
$pic = rex_media::get($GalItem);
if($pic){
$picTitle = $pic->getTitle();
}
else { continue; }    
$copyright  = '';
if (klxmWebsite::mediacopy($GalItem)!='')
{    
$picTitle =  $picTitle.' '.klxmWebsite::mediacopy($GalItem,'text');
$copyright = '<div class="uk-width-1-1"><span class="uk-text-meta">'.klxmWebsite::mediacopy($GalItem,'text').'</span></div>'; 
}



$images .= '
<div>
    <div class="uk-card uk-card-default"><a href="/media/galbig/'.$GalItem.'" uk-tooltip title="'.$picTitle.'" data-caption="'.$picTitle.'"><img src="/media/galthumb/'.$GalItem.'" alt="'.$picTitle.'"></a>'.$copyright.'</div>
</div>'; 
}
    

$galstyle= 'uk-child-width-1-2@s uk-child-width-1-3@m';    
if (count($files)==1)
{
$galstyle = 'uk-child-width-1-1';
}

$out = '<div class="'.$galstyle.'" uk-grid="masonry: true"  uk-lightbox="animation: slide">
    '.$images.'</div>';

}

echo $out; 
