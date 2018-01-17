<style>
	.uikit_builder_hide {
		display: none;
	}
</style>
<?php
$auswahl = new Mform();
$auswahl->addSelectField(15, array(1=>'Ken Burns Effect',2=>'mit Text',3=>'Spezieller Slide'), array('label'=>'Darstellung','id'=>'uikit_builder'));
$auswahl->addSelectField(16, array(1=>'Ja',2=>'Nein'), array('label'=>'Autoplay'));
$auswahl->addTextField(17, array('label'=>'Ratio </br>(z.B. 16:9, 4:3, etc.)'));
$auswahl->addSelectField(18, array('slide'=>'slide','fade'=>'fade','scale'=>'scale','pull'=>'pull','push'=>'push'), array('label'=>'Übergangs-</br>effekt'));
$auswahl->addSelectField(19, array('ja'=>'Ja',2=>'Nein'), array('label'=>'Navigations-</br>punkte anzeigen'));



echo $auswahl->show();
?>
<div class="ken_burn_uikit">
<?php
$id = 1;
$mform = new MForm();
$mform->addFieldset('Bilder');
//$mform->addTextField("$id.0.titel", array('label'=>'Titel'));
$mform->addMediaField(1, array('label'=>'Bild'));
$mform->addTextField("$id.0.title", array('label'=>'Titel', 'class'=>'uikit_textfield'));
$mform->addTextField("$id.0.text", array('label'=>'Text', 'class'=>'uikit_textfield'));
$mform->addSelectField("$id.0.posText", array('uk-position-bottom'=>'Unten','uk-position-bottom-left'=>'Unten Links','uk-position-bottom-right'=>'Unten Rechts','uk-position-top'=>'Oben','uk-position-top-left'=>'Oben Links','uk-position-top-right'=>'Oben Rechts','uk-position-center'=>'Mittig','uk-position-center-left'=>'Mittig Links','uk-position-center-right'=>'Mittig Rechts'), array('label'=>'Position des Text', 'class'=>'uikit_textfield'));
$mform->addSelectField("$id.0.colText", array(''=>'Keine Hintergrundfarbe','uk-overlay uk-overlay-primary'=>'Grau','uk-overlay uk-overlay-default'=>'Weiß'), array('label'=>'Farbe', 'class'=>'uikit_textfield'));
$mform->addSelectField("$id.0.aniText", array(''=>'Keine Animation','uk-transition-slide-bottom'=>'von Unten','uk-transition-slide-left'=>'von Links','uk-transition-slide-right'=>'von Rechts','uk-transition-slide-top'=>'von Oben','uk-transition-fade'=>'Fade','uk-transition-scale-up'=>'Scale Up','uk-transition-scale-down'=>'Scale Down'),array('label'=>'Animation', 'class'=>'uikit_textfield', 'class'=>'uikit_textfield_animation'));
echo MBlock::show($id, $mform->show()); 

?>
</div>

<script>
$(document).on('rex:ready', function() {
		var e = document.getElementById("uikit_builder");
		var strUser = e.options[e.selectedIndex].value;
		if(strUser == 1) {
			$('.uikit_textfield').parent().parent().addClass('uikit_builder_hide');
		}
		if(strUser == 2) {
			$('.uikit_textfield').parent().parent().removeClass('uikit_builder_hide');
		}
		if(strUser == 3 || strUser == 1) {
			$('.uikit_textfield_animation').parent().parent().addClass('uikit_builder_hide');
		}
		if(strUser == 2) {
			$('.uikit_textfield_animation').parent().parent().removeClass('uikit_builder_hide');
		}
	$('#uikit_builder').change(function() {
		var e = document.getElementById("uikit_builder");
		var strUser = e.options[e.selectedIndex].value;
		if(strUser == 1) {
			$('.uikit_textfield').parent().parent().addClass('uikit_builder_hide');
		}
		if(strUser == 2 || strUser == 3) {
			$('.uikit_textfield').parent().parent().removeClass('uikit_builder_hide');
		}
		if(strUser == 3 || strUser == 1) {
			$('.uikit_textfield_animation').parent().parent().addClass('uikit_builder_hide');
		}
		if(strUser == 2) {
			$('.uikit_textfield_animation').parent().parent().removeClass('uikit_builder_hide');
		}
	});
});
</script>