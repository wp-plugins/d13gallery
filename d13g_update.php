<?php
if($_POST["action"] == "update"){
	$filename = 'd13g_settings.php';
	$somecontent = "<?php\n\$d13g_numCols = ".$_POST["numCols"].";\n
	\$d13g_maxWidth = ".$_POST["maxWidth"].";\n
	\$d13g_maxHeight = ".$_POST["maxHeight"].";\n
	\$d13g_quality = ".$_POST["quality"].";\n
	\$d13g_savethumbs = ".$_POST["savethumbs"].";\n
	\$d13g_savethumbsfolder = \"d13gthumbs\";\n
	\$d13g_target = \"".$_POST["target"]."\";\n
	\$d13g_tblclass = \"".$_POST["tblclass"]."\";\n
	\$d13g_trclass = \"".$_POST["trclass"]."\";\n
	\$d13g_tdclass = \"".$_POST["tdclass"]."\";\n
	\$d13g_imgclass = \"".$_POST["imgclass"]."\";\n
	\$d13g_aclass = \"".$_POST["aclass"]."\";\n
	\$d13g_layout = \"".$_POST["layout"]."\";\n	?>";
	
	if (is_writable($filename)) {
		if (!$handle = fopen($filename, 'w')) {
			$written = false;
		}
		if (fwrite($handle, $somecontent) === FALSE) {
			$written = false;
		}
			$written = true;
		fclose($handle);
	}else{
		$written = false;
	}
	if($written){
		echo("<script language='javascript'>window.location='".$_SERVER['HTTP_REFERER']."';</script>");
	}else{ ?>
		<h2>The settings file for the d13gallery plugin is not writable on your server.</h2>
		You should update the contents of the file "wp-content/plugins/d13g_settings.php" with the following:
		<hr>
		<textarea name="" cols="60" rows="10">
		<? echo($somecontent); ?>
		</textarea>
		<hr>
		<a href="<? echo($_SERVER['HTTP_REFERER']); ?>">Click here to go back.</a>
	<?php }
}
?> 