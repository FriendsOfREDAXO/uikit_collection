<?php
global $output;
$settings    = rex_var::toArray('REX_VALUE[1]'); // settings
$custom_link  = rex_var::toArray('REX_VALUE[2]'); // custom link
$headline    = rex_var::toArray('REX_VALUE[3]'); // headline
$image       = 'REX_MEDIA[id=1]';

if (isset($custom_link['link'])) {
    $custom_link = MFormOutputHelper::prepareCustomLink(array(1 => $custom_link['link'], 'customlink_text' => $custom_link['link_text']));
}

$sectionOpen = (!empty($image))
    ? "<section class=\"uk-section uk-section-secondary uk-light uk-background-cover background-blend-soft\" uk-parallax=\"bgy: -200\" style=\"background-image: url(/media/fullbackground/$image)\">\n"
    : "<section class=\"uk-section uk-section-primary uk-light\">\n";
$h1 = (isset($headline['headline']) && !empty($headline['headline'])) ? "<h1 class=\"uk-margin-remove-top uk-heading-line uk-heading-primary uk-text-center uk-animation-slide-left-medium\"><span>{$headline['headline']}</span></h1>" : "";

$h4 = (isset($headline['subline']) && !empty($headline['subline'])) ? "<h4 class=\"  uk-margin-remove-top uk-text-center uk-margin-small-bottom\">{$headline['subline']}</h4>" : "";
$p = (isset($headline['text']) && !empty(str_replace('<p>&nbsp;</p>', '', $headline['text']))) ? "<div class=\"uk-text-center uk-margin-medium-top\">{$headline['text']}</div>" : "";
$link = (isset($custom_link['customlink_url'])) ? "<p><a class=\"uk-button uk-button-secondary\" href=\"{$custom_link['customlink_url']}\" {$custom_link['customlink_target']}>{$custom_link['customlink_text']}</a></p>" : "";

    $output['header'] = "
            <!-- Page Header-->
            {$sectionOpen}
                <div class=\"uk-container\">
                    <div class=\"uk-width-1-1 uk-row-first\">
                        <div class=\"uk-panel\">
                            {$h1}{$h4}{$p}{$link}
                        </div>
                    </div>
                </div>
            </section>
            <!-- / Page Header -->
";

    echo $output['header'];


