<?php 
//---------------------------------------------
// TEXT / BILD / Slideshow classic
// AUSGABE
// Version: 5.0.1
// Stand: 06.01.2018
// Original: 21.12.2015
// Erstellt von: Thomas Skerbis
// www.klxm.de
//----------------------------------------------

if(rex::isBackend())
{
echo "Anker: #topicREX_ARTICLE_ID-REX_SLICE_ID";
}

############ Bildeinstellungen ###############
$pictype="REX_VALUE[5]";
//Bildgröße default
if ("REX_VALUE[6]"!="pic_round")
{
$picsize="dopic";
}
else
{
$picsize="dopic_q";
}

$picsizebig="dopic_big";



$resizer='/images/'.$picsize.'/';  // Normal
$resizer2='/images/'.$picsizebig.'/';  // Für Vergrößerung
$resizer3='images/rex_mediapool_detail/';  // Vorschau Backend

/* Definition des CSS-Stils */
/* Bildgrößen ausgelagert [2] in das CSS */
$picclass='pic_REX_VALUE[2] REX_VALUE[7] '.$border;




######### Allgemeine Definitionen #############


$clesstext='<i class="fa fa-chevron-up"></i> REX_VALUE[17]';

$block_style="";

if ($clesstext=="")
{ $clesstext='<i class="fa fa-chevron-up"></i> Abschnitt ausblenden';

}




// Rahmen 
$border='';
$border="REX_VALUE[6]";
if ("REX_VALUE[16]"=="video")
{
$picsize="dopic_video";
$videolink=    'data-target="flare"';
}
else
{
	$videolink='';
}













if ("REX_MEDIA[id=1 output=1]"!="" and "REX_VALUE[12]"=="ja" )
{
if ("REX_VALUE[12]"=="ja" and $border!="") 
{
$pcaption='<div class="pcaption">REX_VALUE[1]</div>';
}
else
{
$pcaption='<div class="pcaption2">REX_VALUE[1]</div>';
}

if ("REX_MEDIALIST[id=1 output=1]"!="")
{
$pcaption='<div class="pcaption">REX_VALUE[1] - Klicken Sie auf das Bild für eine Slideshow</div>';
}


}




if ("REX_VALUE[12]"=="dl" and "REX_MEDIA[id=1 output=1]"!="")
{
$pic = rex_media::get("REX_MEDIA[id=1 output=1]");
$pcaption='<div class="pcaption">REX_VALUE[1]<br/><a href=/media/REX_MEDIA[id=1 output=1]>Download</a></div>';
}

############ ENDE Bildeinstellungen ###############


// Textblock-Stil ermitteln 
$block_style="REX_VALUE[11]";
 

if ("REX_VALUE[11]"=="xx") {  } else {?>
<div class="kblock textblock<?php echo $block_style;?>">


<?php
}

// Gibt es überhaupt ein Bild?
if ("REX_MEDIA[id=1 output=1]"!="") {


###############Bild-Definition (Standard) #########
$klxmimage1=$resizer."REX_MEDIA[id=1 output=1]";
$klxm_out1 = <<<EOD
<img src="$klxmimage1" alt="REX_VALUE[1]" class="dopic" title="REX_VALUE[1]"/>
EOD;

################Vorschau #############################
$klxm_prev = <<<EOD
<img style="height:auto; width:200px" src="$klxmimage1" $bstyle  alt="REX_VALUE[1]" title="REX_VALUE[1]"/>
EOD;
####################AUSGABE BACKEND ###############
if(rex::isBackend()==1) 
{
###############################################
# Infomeldung, wenn Vergrößerung gewählt      #
###############################################
  if($pictype=="pic_big")
    {
      echo'<span style="background-color:#ffffff; display:block; margin-bottom:10px;"><strong>Vorschau Bild mit Vergrößerung: </strong><br/>Testen Sie bitte die Anzeige im Frontend, klicken Sie dazu auf &quot;Anzeigen&quot;.<br/>
      Größe bei Vergrößerung: REX_VALUE[3] Pixel<br/><hr size="1"/></span>';
    }
###############################################
#Normale Ausgabe                              #
###############################################
  else 
    {
      echo '<span style="background-color:#ffffff; display:block; margin-bottom:10px;">Normales Bild oder Bild mit Link <br/> Testen Sie die Verlinkungen bitte im Frontend <br/></span>';
    }

###############################################
# Ausgabe des Bildes                          #
###############################################

echo ($klxm_prev);

}
############# ENDE AUSGABE BACKEND ########


  
  
#################### AUSGABE FRONTEND ######

################################################
# Ausgabe Vergrößerung                         #
################################################


if ("REX_MEDIA[id=1 output=1]" !="" and rex::isBackend()!=1 and $pictype=="pic_big")
{
$klxmimage3=$resizer2."REX_MEDIA[id=1 output=1]";

if ("REX_MEDIALIST[id=1 output=1]"!="")
{
$related=' data-flare-gallery="gallery1REX_SLICE_ID" data-flare-scale="fitmax" data-target="flare"';	
}
else
{
$related='  data-flare-scale="fitmax" data-target="flare"';	
}


$output = <<<EOD
<div class="$picclass dopic-wrapper REX_VALUE[20]"><a $related  title="REX_VALUE[1]"  data-ktitle="REX_VALUE[1]"  href="$klxmimage3">$klxm_out1<span class="gallery-show"><i class="pe-7s-search"></i></span></a>$pcaption</div>
EOD;
echo ($output);
  
}


###############################################
# Ausgabe Normalbild                          #
###############################################

if ("REX_MEDIA[id=1 output=1]" !="" and rex::isBackend()!=1 and $pictype=="normal") 
{ 

$output = <<<EOD
<div class="$picclass REX_VALUE[20]">$klxm_out1 $pcaption</div>
EOD;
echo ($output);


}

###############################################
# Ausgabe mit Verlinkung                      #
###############################################
// DEV: sollte überarbeitet werden


if (rex::isBackend()!=1) 
{

  if ("REX_VALUE[5]"=="extern" or "REX_VALUE[5]"=="intern" or "REX_VALUE[5]"=="datei") 
  { 
      if ("REX_VALUE[5]"=="extern") 
        {
$output= <<<EOD
<div class="$picclass REX_VALUE[20]"><a $videolink href="REX_VALUE[4]"  title="REX_VALUE[1]" >$klxm_out1</a>$pcaption</div>
EOD;
          echo ($output); 
     
        }
 
 
      
      if ("REX_VALUE[5]"=="intern") 
        {
			
$klxmlink="$REX[HTDOCS_PATH]". rex_getUrl("REX_LINK[id=1]", $REX["CUR_CLANG"]);


$output= <<<EOD
<div class="$picclass REX_VALUE[20]"><a href="$klxmlink" title="REX_VALUE[1]">$klxm_out1</a>$pcaption</div>
EOD;
      echo ($output); 
    
    

        }
    
    
      if ("REX_VALUE[5]"=="datei") 
        {

$output= <<<EOD
<div class="$picclass REX_VALUE[20]"><a href="/media/REX_MEDIA[id=2 output=1]">$klxm_out1</a>$pcaption</div>
EOD;
      echo ($output); 
     
        }   
    
    
    
    
    
   
  }


}
if ("REX_VALUE[7]"=="pnormal")
{
?>
<div class="clear"></div>
<?php
}}

?>



<div id="topicREX_ARTICLE_ID-REX_SLICE_ID" class="textcontainer REX_VALUE[8]" lang="de">

REX_VALUE[id=10 output=html]

<?php   if("REX_LINK[id=4]"!="")
{
?>
<div  class="morebox boxinfoREX_SLICE_ID"><a class="cmore" href="<?php echo rex_getUrl("REX_LINK[id=4]"); ?>#infoREX_SLICE_ID"><i class="fa fa-chevron-down"></i> REX_VALUE[id=18 output=html]</a></div>
<?php } ?>
</div>
<?php   if("REX_LINK[id=4]"!="")
{
?>
<div class="superinfoREX_SLICE_ID hide superbox">

<?php
if(rex::isBackend()==1 && "REX_ARTICLE_ID"!="REX_LINK[id=4]")
{
 $master = new rex_article_content('REX_LINK[id=4]');

  echo '<div style="border: 2px solid #F90;background-color:#ffffff;">'; 
 echo'<p style="color: #333333; background-color: #FF9; padding: 4px; 	border: 1px solid  #333333;"><strong>Eingebundener Artikel:</strong> <a href="index.php?page=content&article_id=REX_LINK_ID[4]&mode=edit&clang=0">Aufrufen</a></p>';
}
else {
if(rex::isBackend()==1)
{
echo "<strong>FEHLER:: DIESER ARTIKEL KANN NICHT EINGEBUNDEN WERDEN</strong>";
}
}

?>


<?php 
if("REX_ARTICLE_ID" != "REX_LINK[id=4]")
{
  if ("REX_LINK[id=4]" != "") 
  {



$article = new rex_article_content('REX_LINK[id=4]',rex_clang::getCurrentId());
if ($article != null) {



if ($_SESSION[$REX['INSTNAME']]['UID']>0) // REDAXO 4
{ 
    echo '<div class="editarticle"><a href="/redaxo/index.php?page=content&article_id=REX_LINK_ID[4]&mode=edit&clang=0" target="editor"><img src="/lib/buttons/edit.png" /></a></div>';
    }

    echo $article->getArticle(1);
 
    
    } 
    
    else {} 

  }
}
 if(rex::isBackend()==1) {?>
</div>
<?php }?>



<div class="clessblock">
<a rel="nofollow" class="cmore" href="/#infoREX_SLICE_ID"><?php echo $clesstext; ?></a></div></div>


<?php  }if ("REX_VALUE[11]"!="xx") { ?>

</div>


<?php
} $pcaption=""; $related="";

if ("REX_MEDIALIST[id=1 output=1]"!="")
{


$related=' data-flare-gallery="gallery1REX_SLICE_ID" data-flare-scale="fitmax" data-target="flare"';	



?>


<div class="hide">
<?php $gcount=1;
foreach ((explode(",", "REX_MEDIALIST[id=1 output=1]")) as $GalItem) 

{
// Prüfen ob Datei existiert
$file=getCwd()."/".$d."/media/".$GalItem;
   if (!file_exists($file))
   {  $GallItem=""; }
   unset($file); 
 $gcount ++; 
$pic = rex_media::get($GalItem);
$picTitle = $pic->getTitle();
$piclink = '<a class="galerie" data-ktitle="'.$picTitle.'" '.$related.' href="'.$resizer2.$GalItem.'">Bild '.$gcount.' </a>';

echo $piclink;

}  
?> 
</div>

<?php } $bild=$piclink=""; 

if ("REX_VALUE[8]" != '') { ?>

<div class="trennelement_b"></div>

<?php }

?>

