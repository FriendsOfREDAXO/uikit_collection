<?php
$output = array();
$output[] = '<REX_VALUE[1] id="topicREX_ARTICLE_ID-REX_SLICE_ID">REX_VALUE[2]</REX_VALUE[1]>';

if (rex::isBackend()) {
    $output[] = '<i class="fa fa-anchor" aria-hidden="true"></i> Anker: <span class="label label-success">#topicREX_ARTICLE_ID-REX_SLICE_ID</span>';
}

echo join("\n", $output);
