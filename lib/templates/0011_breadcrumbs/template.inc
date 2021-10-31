<?php
// Aktuellen Artikel ermitteln
$article = rex_article::get($this->article_id);
// Array der Elternkategorien
$parent = $article->getParentTree();

$breadcrumb = '<ul class="uk-breadcrumb">';

    // Startartikel als Erstes anzeigen
    $breadcrumb .= '<li><a href="'.rex_getUrl(rex_article::getSiteStartArticleId()).'">Start</a></li>';


    // rekursiv den Kategoriebaum der gerade aktiven Kategorien durchlaufen
    foreach($parent as $cat) {
        $breadcrumb .= '<li><a href="'.$cat->getUrl().'">'.$cat->getName().'</a></li>';
    }

$breadcrumb .= '</ul>';
echo $breadcrumb;
?>
