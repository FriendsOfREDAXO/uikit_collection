<?php

class klxmcms
{
	

public static function get_filesize($URL) {
    $groesse = filesize($URL);
    if($groesse<1000) {
      return number_format($groesse, 0, ",", ".")." Bytes";
    } elseif($groesse<1000000) {
      return number_format($groesse/1024, 0, ",", ".")." kB";
    } else {
      return number_format($groesse/1048576, 0, ",", ".")." MB";
    }
  }

// Legt das Downloadicon fest. 


public static function get_icon($file) {
  	$ext = substr(strrchr($file, '.'), 1); 
    switch (strtolower($ext)) {
    	
      case 'doc': case 'docx': return '<i class="fa fa-file-word-o"></i>&nbsp;';
      case 'xls': case 'xlsx': return '<i class="fa fa-file-excel-o" aria-hidden="true"></i>&nbsp;';
      case 'txt': case 'rtf': return '<i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;';
      case 'ppt': case 'pptx': return '<i class="fa fa-file-powerpoint-o" aria-hidden="true"></i>&nbsp;';
      case 'pdf': return '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;';
      case 'zip': return '<i class="fa fa-archive-pdf-o" aria-hidden="true"></i>&nbsp;';
      case 'jpg': return '<i class="fa fa-file-image-o" aria-hidden="true"></i>&nbsp;';
      case 'png': return '<i class="fa fa-file-image-o" aria-hidden="true"></i>&nbsp;';
      case 'gif': return '<i class="fa fa-file-image-o" aria-hidden="true"></i>&nbsp;';
      default: return '<i class="fa fa-file-o" aria-hidden="true"></i>&nbsp;';
     
    }
}




public static function get_date_de($date) {
   setlocale(LC_TIME, "de_DE");
   # $ddate = strftime("%A, %e. %B %Y", strtotime($date)); // Deutsches Datum
   return strftime("%e. %B %Y", strtotime($date)); // Deutsches Datum
}

public static function get_updateuser($user) {
$author = rex_article::getCurrent()->getUpdateUser();
$updateuser_sql = rex_sql::factory();
$updateuser_sql->setQuery("SELECT name FROM rex_user WHERE login = '$author'");
return $updateuser_sql->getValue('name'); 
}


public static function bs_downloadpanel($files) {
	

		if ($files!="") { 
		$ptop = '<div id="downloads" class="panel panel-primary">
		  <div class="panel-heading"><i class="fa fa-download" aria-hidden="true"></i> Downloads</div>
		  <div class="panel-body">
		<div class="textcontainer">';

		foreach ((explode(",", $files)) as $file) {
		 
				$parsed_icon = get_icon($file);
				$file_size = ' ('.get_filesize(rex_path::media($file)).')';
				$media = rex_media::get($file);
				$file_desc = $media->getValue('med_description');
				$file_name = $media->getTitle();
				if ($file_name=="")
				{
					$file_name = $file;
				}
				
				$pfiles.= '<div class="col-sm-12"><a href="/media/'.$file.'">'.$parsed_icon.$file_name.$file_size.'</a></div>';
			}
		
		$pbottom = '</div></div></div>';
		$output = $ptop.$pfiles.$pbottom;
		return $output; 
		
		 }
	 
	 }
}
