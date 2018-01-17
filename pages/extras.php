<?php

$func               = rex_request('func', 'string');
$status             = rex_request('status', 'string');
$plugin_status		= rex_request('key', 'string');
if ($func == 'setstatus') {

	$plugin_temp = rex_plugin::get('klxm_defaults', $plugin_status);
	
	if ($status == "aktivieren") {
		$plugin_temp->setConfig('status', 'aktiviert');  		
	} else {
		$plugin_temp->setConfig('status', 'deaktiviert');  				
	}
	
	
	
	
    $func 	= '';
    $status = '';
    $plugin 	= '';
}


if ($func == '') {
$content = '
<section class="rex-page-section">
  <div class="panel panel-default">
  <header class="panel-heading"><div class="panel-title">Liste der verfügbaren Extras</div></header>
  <form action="index.php?page=out5/extras" method="post">
    <table class="table">
      <thead>
        <tr>
          <th class="rex-table-icon"></th>
          <th>Name</th>
          <th>Kurzbeschreibung</th>
          <th>Umgebung</th>
          <th>Status</th>          
          <th></th>
        </tr>
      </thead>
      <tbody>
';

$AvailablePlugins = $this->getAvailablePlugins();
$i=0;
if(!empty($AvailablePlugins)) {
  $Page = $this->getProperty('page');
  foreach($AvailablePlugins as $key => $plugin) {

    $i++;

    $icon = $plugin->getProperty('nav_icon');
    if (!$icon) {
      $icon = 'fa-cubes';
    }
    $title = $plugin->getProperty('title');
    if (!$title) {
      $title = $key;
    }
    $kurzbeschreibung = $plugin->getProperty('kurzbeschreibung');
    if (!$kurzbeschreibung) {
      $kurzbeschreibung = $key;
    }
    $umgebung = $plugin->getProperty('umgebung');
    if (!$umgebung) {
      $umgebung = $key;
    }
    $status = $plugin->getConfig('status');
    if (!$status) {
      $status = 'kein Status vergeben';
    } 
    
    rex_perm::register('klxm_defaults['.$key.']'); // with perms?
    $Page['subpages']['main']['subpages'][$key] = [
      'title' => $title,
      'perm' => 'klxm_defaults['.$key.']', // with perms?
      'icon' => 'rex-icon '.$icon.''
    ];

$content .= '
  <tr>
    <td class="rex-table-icon"><a href="index.php?page=klxm_defaults/'.$key.'&amp;func=edit"><i class="rex-icon '.$icon.'"></i></a></td>
    <td data-title="Name">
      <a href="index.php?page=klxm_defaults/'.$key.'&amp;func=edit">'.$title.'</a>
    </td>

    <td  data-title="Kurzbeschreibung" >'.$kurzbeschreibung.'</td>
    <td data-title="Umgebung">'.$umgebung.'</td>';
    
    if ($status == 'deaktiviert') {
$content .= '
    <td data-title="Status"><a class="rex-offline" style="white-space: nowrap;" href="index.php?page=klxm_defaults/extras&amp;func=setstatus&status=aktivieren&key='.$key.'"><i class="rex-icon rex-icon-active-false"></i>'.$status.'</a></td>';	    
    } else {
$content .= '
    <td data-title="Status"><a class="rex-online" style="white-space: nowrap;" href="index.php?page=klxm_defaults/extras&amp;func=setstatus&status=deaktivieren&key='.$key.'"><i class="rex-icon rex-icon-active-true"></i>'.$status.'</a></td>';	    
    }
   
$content .='    
    <td class="rex-table-action"><a style="white-space: nowrap;" href="index.php?page=klxm_defaults/'.$key.'/"><i class="rex-icon rex-icon-edit"></i> editieren</a></td>
  </tr>
';

  }
  $this->setProperty('page',$Page);
}

$content .= '
     </tbody>
    </table>
</form>
  </div>
</section>
';

echo $content;
}
