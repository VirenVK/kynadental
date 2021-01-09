<?php
$weburl = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$weburl .= "://".$_SERVER['HTTP_HOST'];
$weburl .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
define('WEB_URL',$weburl.'');
define('WEB_PATH_APJS',$weburl.'assets/app_assets/');
define('WEB_PATH',$weburl.'assets/layout/');
define('WEB_IMG_PATH',$weburl.'uploads/');
define('ROOT_PATH',$_SERVER['DOCUMENT_ROOT'].'/kynadental/');
define('FILE_UPLOAD_PATH',$_SERVER['DOCUMENT_ROOT'].'/kynadental/uploads/');
?>
