<?php

if (!empty($_FILES)) {
	
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT']."/getranslators/app/webroot/contents/";
	$targetFile =  str_replace('//','/',$targetPath) . $_FILES['Filedata']['name'];
	
		
	move_uploaded_file($tempFile,$targetFile)or die("There is error.");
	echo str_replace($_SERVER['DOCUMENT_ROOT'],'',$targetFile);
}
?>