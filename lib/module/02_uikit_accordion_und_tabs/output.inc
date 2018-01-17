<?php
$values = rex_var::toArray("REX_VALUE[1]");
$type = 'REX_VALUE[20]';

if($type == 1) {
?>
	<div class="accordion_container">
		<div uk-accordion>
<?php
		$i = 0;
		foreach($values as $value) {
			$title = $value['titel'];
			$text = $value['text'];
			if($i == 0) {
				echo '
					<div class="uk-open">
		        		<h3 class="uk-accordion-title">'.$title.'</h3>
		        		<div class="uk-accordion-content">
		            		<p>'.$text.'</p>
		        		</div>
		    		</div>';
			}
			else {
		 		echo '
					<div>
		        		<h3 class="uk-accordion-title">'.$title.'</h3>
		        		<div class="uk-accordion-content">
		            		<p>'.$text.'</p>
		        		</div>
		    		</div>';
			}
			$i = $i +1;
		}
?>
		</div>
	</div>
<?php
	}
if($type == 2) {
	?>
	<div class="tabs_container">
		<div class="uk-margin-medium-top">
	    	<div class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-fade">
	    <?php
			foreach($values as $value) {
				$title = $value['titel'];
				echo '<div><a href="#">'.$title.'</a></div>';
			}
		?>
			</div>
			<div class="uk-switcher uk-margin">
			<?php
	    		foreach($values as $value) {
				$text = $value['text'];
				echo '<div>'.$text.'</div>';
			}
		?>
			</div>
		</div>
	</div>
	<?php
	}
	?>
