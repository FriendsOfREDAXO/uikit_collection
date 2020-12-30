<?php 
if(rex::isBackend())
{
echo 'Anker: <span class="label label-success">#topicREX_ARTICLE_ID-REX_SLICE_ID</span>';
}?>
<?php $data = rex_var::toArray("REX_VALUE[1]"); 
#dump( $data);

/*
     // Sort the multidimensional array
     usort($data, "custom_sort_REX_SLICE_ID");
     // Define the custom sort function
     function custom_sort_REX_SLICE_ID($a,$b) {
          return $a['alt']>$b['alt'];
     }
*/




$list ='';
$count = 1;
foreach ($data as $value) {
   
  $extern = $urlextra = '';
  $count++;  
  $list .= '
     <div class="uk-inline">
<a class="uk-button uk-button-primary uk-margin-small-bottom" title ="'.$value['alt'].'" href="#modal-text_REX_SLICE_ID-'.$count.'" uk-toggle>'.$value['alt'].'</a>
 </div>';

$modals .= '
<div  id="modal-text_REX_SLICE_ID-'.$count.'"  uk-modal>
    <div class="uk-modal-dialog"> <button class="uk-light uk-modal-close-default" type="button" uk-close></button> 
         <div class="uk-modal-header uk-light uk-background-primary">     
     <h2 class="uk-animation-slide-left uk-modal-title">'.$value['alt'].'</h2>
        </div>
        <div class="uk-animation-scale-up uk-modal-body uk-container-small">
            '.$value['content'].'
        </div>
    </div>
</div>

'; 
    
    
}
?>
  <div class="uk-container uk-container-default uk-padding uk-text-center">
<div data-uk-scrollspy="cls: uk-animation-scale-down; target: > div; delay: 100" class=" uk-text-center sponsor_box">
    <?= $list ?>
</div>
      </div>
<?= $modals ?>