<h4><b>0014 UIKit Header Slideshow</b></h4>

<p>Redaxo Modul für das Erstellen von Slideshows als Header mit Hilfe von UIkit und eigenen Stilen. Die Bilder werden eingepflegt durch Metadaten. Dazu die Klassen art_slideshow, art_effect, cat_slideshow, cat_effect, anlegen.
art_slideshow und cat_slideshow mit dem Feldtyp REX_MEDIALIST_WIDGET anlegen, art_effect und cat_effect mit dem Feldtyp checkbox. Floating Buttons bei Bedarf rausnehmen (direkt nach dem Gallery Container)
</p>
<p>Code für Javascript</p>
<pre><code>
$(document).ready(function() {
	$('#floating_buttons_phone_button').click(function() {
		$(this).next().toggleClass('floating_buttons_phone_visible');
		$('#floating_buttons_info_field').removeClass('floating_buttons_info_visible');
		$('#floating_buttons_search_field').removeClass('floating_buttons_search_visible');
	});
	$('#floating_buttons_info_button').click(function() {
		$(this).next().toggleClass('floating_buttons_info_visible');
		$('#floating_buttons_phone_field').removeClass('floating_buttons_phone_visible');
		$('#floating_buttons_search_field').removeClass('floating_buttons_search_visible');
	});
	$('#floating_buttons_search_button').click(function() {
		$(this).next().toggleClass('floating_buttons_search_visible');
		$('#floating_buttons_phone_field').removeClass('floating_buttons_phone_visible');	
		$('#floating_buttons_info_field').removeClass('floating_buttons_info_visible');
	});
	$('#floating_buttons_phone_field').click(function() {
		$(this).removeClass('floating_buttons_phone_visible');
	});
	$('#floating_buttons_info_field').click(function() {
		$(this).removeClass('floating_buttons_info_visible');
	});
});
</code></pre>
