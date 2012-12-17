<?php
if (!empty($_FILES)) {
	
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT']."/app/webroot/contents/";
	$targetFile =  str_replace('//','/',$targetPath) . $_FILES['Filedata']['name'];
	 move_uploaded_file($tempFile,$targetFile);
	
	 $filesize = $_FILES['Filedata']['size'];
	
	 if ($filesize>999999)
	 {
		$theDiv = $filesize / 1000000;
		$theFileSize = round($theDiv, 1)." MB";
	 }
	 else
	 {
		$theDiv = $filesize / 1000;
		$theFileSize = round($theDiv, 1)." KB";
	 }
	
	 echo $theFileSize;
}

?>