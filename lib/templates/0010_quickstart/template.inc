<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo rex_escape($this->getValue('name')); ?></title>
    <link rel="stylesheet" href="<?= rex_url::base('assets/addons/klxm_defaults/uikit/css/uikit.css') ?>"> 
    <script type="text/javascript" src="<?= rex_url::base('assets/addons/klxm_defaults/uikit/js/uikit.min.js') ?>"></script>
    <script type="text/javascript" src="<?= rex_url::base('assets/addons/klxm_defaults/uikit/js/uikit-icons.min.js') ?>"></script> 

</head>
<body>
	
<?php
// NAVIGATION

$path = rex_article::getCurrent()->getPathAsArray();
$path1 = ((!empty($path[1])) ? $path[1] : '');
$navigation .= '
<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
	<nav class="uk-navbar-container uk-margin" uk-navbar style="position: relative; z-index: 980; uk-navbar="mode: hover">
	<div class="uk-navbar-left">
		<a class="uk-navbar-item uk-logo" href="#">Logo</a>
	</div>
    <div class="uk-navbar-center">
        <ul class="uk-navbar-nav">';
foreach (rex_category::getRootCategories() as $lev1) {
    if ($lev1->isOnline(true)) {
		$active = ($lev1->getId() == $path1) ? ' class="uk-active"' : '';
		 $navigation .= '<li'.$active.'><a href="'.$lev1->getUrl().'">'.htmlspecialchars($lev1->getValue('name')).'</a><div class="uk-navbar-dropdown">';
		             $lev1Size = sizeof($lev1->getChildren());    
            if ($lev1Size != "0") {
                $navigation .= '<ul class="uk-nav uk-navbar-dropdown-nav">';
                    foreach ($lev1->getChildren() as $lev2) {
                        if ($lev2->isOnline(true)) {
                            $active = ($lev2->getId() == $path2) ? ' class="uk-active"' : '';
                            $navigation .='<li'.$active.'><a href="'.$lev2->getUrl().'">'.htmlspecialchars($lev2->getValue('name')).'</a></li>';
                        }
                    }
				$navigation .='</ul>';
            }
    $navigation .= '</li>';
	}
}
$navigation .= '<ul></div></nav></div>';

//MAIN PART

?>
<div class="wrapper">
	<?php echo $navigation; ?>
	<div class="article_container">
		REX_ARTICLE[]
		
	</div>	
</div>
</body>
</html>