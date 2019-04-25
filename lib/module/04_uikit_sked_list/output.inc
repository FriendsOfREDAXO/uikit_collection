<?php

$out = '';
$out .= '<div class="uk-card uk-box-shadow-hover-large uk-card-default"> 

<div class="uk-card-header">
        <h3 class="skedlist">Aktuelle Termine</h3>
</div>
<ul class="uk-list uk-list-striped uk-padding-remove" uk-scrollspy="target: > li; cls:uk-animation-fade; delay: 200; repeat: true">';

setlocale(LC_ALL, 'de_DE.utf8');
$counter = 0;
$categoryId = '';
$filter_date = "";
$today = date("Y-m-d H:i:s");
$today = strtotime($today);

$start = date("Y-m-d H:i:s");
$end = REX_VALUE[2];

//react to period filter
if ($end == 'all')
{
    $start = new DateTime("1900-08-09");
    $filter_date = ("2100-01-01");
}
if ($end == 'halfayear')
{
    $halfayear = strtotime('+ 6 month', $today);
    $filter_date = date("Y-m-d", $halfayear);
}
if ($end == 'quarter')
{
    $quarter = strtotime('+ 3 month', $today);
    $filter_date = date("Y-m-d", $quarter);
}
//get CategoryID and VenueID
$categoryId = REX_VALUE[3];
if ($categoryId == '')
{
    $categoryId = null;
}
else
{
    $categoryId = REX_VALUE[3];
}
$venues = REX_VALUE[4];
if ($venues == '')
{
    $entries = \Sked\Handler\SkedHandler::getEntries($start, $filter_date, true, 'SORT_ASC', $categoryId);
}
if ($venues != '')
{
    $entries = \Sked\Handler\SkedHandler::getEntries($start, $filter_date, true, 'SORT_ASC', $categoryId, $venues);
}













////////////////////////////////////////////////////////////
//////////You get the dates from every Sked entry//////////
//////////////////////////////////////////////////////////
foreach ($entries as $data)
{
    $counter++;
    // dump($data);   // Array ausgeben
    $event = $data['entry'];
    //Format start and end date
    $end_date = rex_formatter::format(date_timestamp_get($event->entry_end_date) , 'strftime', '%d. %B %Y');
    $start_date = rex_formatter::format(date_timestamp_get($event->entry_start_date) , 'strftime', '%d. %B %Y');
    //Format start time without seconds
    $entry_start_time = $event->entry_start_time;
    $entry_start_time_date = new DateTime($entry_start_time);
    $start_time = $entry_start_time_date->format('H:i');
    //Format end time without seconds
    $entry_end_time = $event->entry_end_time;
    $entry_end_time_date = new DateTime($entry_end_time);
    $end_time = $entry_end_time_date->format('H:i');
    //dump($events);
    if ($event->entry_id != '0')
    {

        $out .= '<li style="border-left: 8px solid ' . $event->category_color . '" class="uk-padding-remove">';
        $out .= '<div class="uk-grid-collapse uk-child-width-expand@s " uk-grid>';
        if ($start_time == '00:00')
        {
            $start_time = '';
        }
        else
        {
            $start_time = '<span class="">' . $start_time . ' Uhr<span>';
        }

        $mytext = '';
        if ($event->entry_text != '')
        {
            $mytext = '<!-- This is a button toggling the modal -->
<button class="uk-button uk-float-right uk-button-default uk-margin-small-right" uk-toggle="target: #my-id-' . $event->entry_id . '" type="button">…mehr</button>
<!-- This is the modal -->
<div id="my-id-' . $event->entry_id . '" uk-modal>
    <div class="uk-modal-dialog  uk-margin-auto-vertical">
       <div style="background-color: ' . $event->category_color . '; color: #fff;" class="uk-modal-header">
            <h2 class="uk-modal-title">' . $event->entry_name . '</h2>
        </div>
        <div class="uk-modal-body">
        ' . $event->entry_text . '
        </div>
          <div class="uk-modal-footer">
          
           <button class="uk-modal-close uk-float-right uk-button uk-button-default uk-margin-small-right" type="button">Schließen</button>
          </div>
       
    </div>
</div>';
        }
        $out .= '<div class="uk-text-center@m uk-padding-small  uk-width-1-5@m">
<div>
<strong>' . $start_date . '</strong><br>' . $start_time . '
</div>
</div>';

        $out .= '<div class="uk-padding-small  uk-width-1-2@m">
<div>
' . $event->entry_name . '<br><i>' . $event->venue_name . '</i>
</div>
</div>';

        if ($event->entry_teaser != '')
        {
            $teaser = '<div class="entry_teaser">' . $event->entry_teaser . $mytext . '</div>';
        }
        else $teaser = '';

        $out .= '<div class="uk-padding-small ">
<div>
' . $teaser . '
</div>
</div>';

        if ($event->entry_teaser != '')
        {
            $teaser = '<div class="entry_teaser">' . $event->entry_teaser . '</div>';
        }
        else $teaser = '';

        $out .= '</div>';
        $out .= '</li>';

        if ($counter == 5)
        {
            break;
        }

    }
}
$out .= '</ul></div>';




echo $out; 





