<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    if(rex_addon::get("yrewrite")->isInstalled() && rex_addon::get("yrewrite")->isAvailable()) {
        $seo = new rex_yrewrite_seo();
        echo $seo->getTitleTag() . PHP_EOL;
        echo $seo->getDescriptionTag() . PHP_EOL;
        echo $seo->getRobotsTag() . PHP_EOL;
        echo $seo->getHreflangTags() . PHP_EOL;
        echo $seo->getCanonicalUrlTag() . PHP_EOL;
    }
    ?>
    <link rel="stylesheet" href="<?= rex_url::base('assets/addons/uikit_collection/uikit-3.0.3/css/uikit.css') ?>">
</head>
<body>
<?php
// NAVIGATION

$path = rex_article::getCurrent()->getPathAsArray();
$path1 = ((!empty($path[0])) ? $path[0] : '');
$navigation = '';
$navigation .= '<ul class="uk-navbar-nav">';
foreach (rex_category::getRootCategories() as $lev1) {
    if ($lev1->isOnline(true)) {
        $active = ($lev1->getId() == $path1) ? ' class="uk-active"' : '';
        $navigation .= '<li' . $active . '>';
        $navigation .= '<a href="' . $lev1->getUrl() . '">' . htmlspecialchars($lev1->getValue('name')) . '</a>';
        $lev1Size = sizeof($lev1->getChildren());
        if ($lev1Size != "0") {
            $navigation .= '<div class="uk-navbar-dropdown">';
            $navigation .= '<ul class="uk-nav uk-navbar-dropdown-nav">';
            foreach ($lev1->getChildren() as $lev2) {
                if ($lev2->isOnline(true)) {
                    $active = ($lev2->getId() == $path2) ? ' class="uk-active"' : '';
                    $navigation .= '<li' . $active . '>';
                    $navigation .= '<a href="' . $lev2->getUrl() . '">' . htmlspecialchars($lev2->getValue('name')) . '</a>';
                    $navigation .= '</li>';
                }
            }
            $navigation .= '</ul>';
            $navigation .= '</div>';
        }
        $navigation .= '</li>';
    }
}
$navigation .= '<ul>';


?>
<div class="wrapper">
    <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
        <nav class="uk-navbar-container uk-margin" style="position: relative; z-index: 980;" uk-navbar="mode: hover" uk-navbar>
            <div class="uk-navbar-left">
                <a class="uk-navbar-item uk-logo" href="#">Logo</a>
            </div>
            <div class="uk-navbar-center">

                <?php echo $navigation; ?>
            </div>
        </nav>
    </div>
    <div class="article_container">
        REX_ARTICLE[]
    </div>
</div>
    <script type="text/javascript" src="<?= rex_url::base('assets/addons/uikit_collection/uikit-3.0.3/js/uikit.min.js') ?>"></script>
    <script type="text/javascript" src="<?= rex_url::base('assets/addons/uikit_collection/uikit-3.0.3/js/uikit-icons.min.js') ?>"></script>    
</body>
</html>
