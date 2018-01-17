<?php
if (rex::isBackend()) {
	if ($this->getConfig('status') != 'deaktiviert') {
		rex_extension::register('OUTPUT_FILTER',function(rex_extension_point $ep){
			$filepath = '';
			$bild = $this->getConfig('bild');
					
					
						
			if ($bild != 'out5_login_image.jpg') {
				$filepath = '<img src="/media/'.$bild.'" width="100%" height="auto" alt="Bitte anmelden"/>';
			} else {
				$filepath = '<img src="/assets/addons/klxm_defaults/plugins/login_image/images/'.$bild.'" width="100%" height="auto" alt="Bitte anmelden"/>';
	  		}
	  		
	  		$suchmuster = '<header class="panel-heading"><div class="panel-title">Bitte anmelden.</div></header>';
	  		$ersetzen = '<header class="panel-heading">'.$filepath.'</header>';
	  		$ep->setSubject(str_replace($suchmuster, $ersetzen, $ep->getSubject()));
    	});
	}
}
