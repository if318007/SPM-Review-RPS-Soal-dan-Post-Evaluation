<?php
if(ISSET($_REQUEST['upload'])){
	$files = $_REQUEST['upload'];
	
		//header("Cache-Control: public");
		//header("Content-Description: File Transfer");
	header("Content-Disposition: attachment; filename=".basename($files));
	header("Content-Type: application/octet-stream;");
		//header("Content-Transfer-Encoding: binary");
	readfile($files);
}
?>