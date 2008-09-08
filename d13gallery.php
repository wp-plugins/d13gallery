<?php
/*
Plugin Name: d13gallery
Plugin URI: http://www.d13design.co.uk/d13gallery/
Description: Create simple photo galleries in your posts using the syntax <strong>{gallery}path/to/images{/gallery}</strong>.
Author: Dave Waller
Version: 3.3.3
Author URI: http://www.d13design.co.uk/
*/ 

// Hook for adding admin menus
add_action('admin_menu', 'd13g_add_pages');
// Hook for adding options to DB
add_option('d13g_numCols', 4);
add_option('d13g_maxWidth', 100);
add_option('d13g_maxHeight', 80);
add_option('d13g_quality', 80);
add_option('d13g_savethumbs', 'false');
add_option('d13g_savethumbsfolder', 'thumbs');
add_option('d13g_target', '_blank');
add_option('d13g_tblclass', 'gallerytable');
add_option('d13g_trclass', 'galleryrow');
add_option('d13g_tdclass', 'gallerycell');
add_option('d13g_imgclass', 'gallerythumb');
add_option('d13g_incrementcolclass', 'false');
add_option('d13g_aclass', 'gallerylink');
add_option('d13g_layout', 'table');
// action function for above hook
function d13g_add_pages() {
    // Add a new submenu under Options:
    add_options_page('D13galleries', 'D13galleries', 8, 'd13galleries', 'd13g_options_page');
}

// d13g_options_page() displays the page content for the Options menu
function d13g_options_page() { ?>
	<div class="wrap"> 
		<h2>Customize your D13Galleries <sub style="font-size:0.7em;">- <a href="#help_main">Help</a></sub></h2> 
		<form method="post" action="options.php">
		<?php wp_nonce_field('update-options'); ?>
		<input type="hidden" name="action" value="update" />
		<table width="100%" cellspacing="2" cellpadding="5" class="form-table"> 
		<tr> 
		<th width="33%" scope="row">Number of thumbnails in each row: </th> 
		<td>
		<input type="text" name="d13g_numCols" value="<?php echo get_option('d13g_numCols'); ?>" size="10"/></td> 
		</tr> 
		<tr>
		<th scope="row">Maximum size for each thumbnail: </th>
		<td><input type="text" name="d13g_maxWidth" value="<?php echo get_option('d13g_maxWidth'); ?>" size="10"/>
		  x 
			<input type="text" name="d13g_maxHeight" value="<?php echo get_option('d13g_maxHeight'); ?>" size="10"/>
			(width x height in pixels) 	</td>
		</tr>
		<tr>
		<th scope="row">JPEG quality to use for thumbnails: </th>
		<td><select name="d13g_quality" id="quality">
		  <option value="10" <?php if(get_option('d13g_quality') == 10){ echo("selected"); } ?>>10%</option>
		  <option value="20" <?php if(get_option('d13g_quality') == 20){ echo("selected"); } ?>>20%</option>
		  <option value="30" <?php if(get_option('d13g_quality') == 30){ echo("selected"); } ?>>30%</option>
		  <option value="40" <?php if(get_option('d13g_quality') == 40){ echo("selected"); } ?>>40%</option>
		  <option value="50" <?php if(get_option('d13g_quality') == 50){ echo("selected"); } ?>>50%</option>
		  <option value="60" <?php if(get_option('d13g_quality') == 60){ echo("selected"); } ?>>60%</option>
		  <option value="70" <?php if(get_option('d13g_quality') == 70){ echo("selected"); } ?>>70%</option>
		  <option value="80" <?php if(get_option('d13g_quality') == 80){ echo("selected"); } ?>>80%</option>
		  <option value="90" <?php if(get_option('d13g_quality') == 90){ echo("selected"); } ?>>90%</option>
		  <option value="100" <?php if(get_option('d13g_quality') == 100){ echo("selected"); } ?>>100%</option>
				</select></td>
		</tr>
		<tr>
		<th scope="row">Should thumbnails be saved: </th>
		<td><select name="d13g_savethumbs" id="quality">
		  <option value="false" <?php if(get_option('d13g_savethumbs') == 'false'){ echo("selected"); } ?>>No</option>
		  <option value="true" <?php if(get_option('d13g_savethumbs') == 'true'){ echo("selected"); } ?>>Yes</option>
		</select></td>
		</tr>
		<tr>
		<th scope="row">Folder for saved thumbnails: </th>
		<td><input type="text" name="d13g_savethumbsfolder" value="<?php echo get_option('d13g_savethumbsfolder'); ?>" size="25"/>	     
		   *changing this <strong>does not</strong> remove previously created thumbnail folders.
		</td>
		</tr>
		<tr>
		<th scope="row">Target window for full-size images:</th>
		<td><input type="text" name="d13g_target" value="<?php echo get_option('d13g_target'); ?>" size="25"/></td>
		</tr>
		<tr>
		<th scope="row"></th>
		<td>- Use &quot;js&quot; for auto-sized JavaScript window (may be blocked by popup blockers)
		<br/>- Use &quot;_blank&quot; for standard browser-based new windows
		<br/>- Use &quot;lightbox&quot; if you're using a lightbox JS component</td>
		</tr>
		<tr>
		<th scope="row">HTML layout method: </th>
		<td><select name="d13g_layout" id="layout">
		  <option value="css" <?php if(get_option('d13g_layout') == "css"){ echo("selected"); } ?>>CSS</option>
		  <option value="table" <?php if(get_option('d13g_layout') == "table"){ echo("selected"); } ?>>Tables</option>
		   </select></td>
		</tr>
		<tr>
		<th scope="row">Gallery CSS (&lt;TABLE&gt;/&lt;DIV&gt;): </th>
		<td><input name="d13g_tblclass" type="text" id="tblclass" size="25" value="<?php echo(get_option('d13g_tblclass')); ?>"/></td>
		</tr>
		<tr>
		<th scope="row">Row CSS (&lt;TR&gt;/&lt;DIV&gt;): </th>
		<td><input name="d13g_trclass" type="text" id="trclass" size="25" value="<?php echo(get_option('d13g_trclass')); ?>"/></td>
		</tr>
		<tr>
		<th scope="row">Cell CSS (&lt;TD&gt;&lt;DIV&gt;): </th>
		<td><input name="d13g_tdclass" type="text" id="tdclass" size="25" value="<?php echo(get_option('d13g_tdclass')); ?>"/></td>
		</tr>
		<tr>
		<th scope="row">CSS class to use for &lt;IMG&gt; tags: </th>
		<td><input name="d13g_imgclass" type="text" id="imgclass" size="25" value="<?php echo(get_option('d13g_imgclass')); ?>"/></td>
		</tr>
		<tr>
		<th scope="row">CSS class to use for &lt;A&gt; tags: </th>
		<td><input name="d13g_aclass" type="text" id="aclass" size="25" value="<?php echo(get_option('d13g_aclass')); ?>"/></td>
		</tr>
		<tr>
		<th scope="row">Increment image class for columns: </th>
		<td><select name="d13g_incrementcolclass" id="incrementcolclass">
		  <option value="true" <?php if(get_option('d13g_incrementcolclass') == "true"){ echo("selected"); } ?>>Yes</option>
		  <option value="false" <?php if(get_option('d13g_incrementcolclass') == "false"){ echo("selected"); } ?>>No</option>
		   </select></td>
		</tr>
		</table> 
		<input type="hidden" name="page_options" value="d13g_numCols,d13g_maxWidth,d13g_maxHeight,d13g_quality,d13g_target,d13g_tblclass,d13g_trclass,d13g_tdclass,d13g_imgclass,d13g_aclass,d13g_layout,d13g_savethumbs,d13g_savethumbsfolder,d13g_incrementcolclass" />
		<p class="submit">
			<input type="submit" name="Submit" value="<?php _e('Update Options &raquo;') ?>" />
		</p>
		</form>
	</div>
	<p>&nbsp;</p>
	<?php require("d13g_help.php"); ?>
<?php }

//Core functions - do not edit below this point...
function d13gallery_replace($content){
	//split on opening gallery tags...
	$d13g_contentArray = preg_split("/{gallery}/",$content);
	//loop through entries and split any on closing gallery tags...
	$d13g_finalArray = array();
	$d13g_types = array();
	for($d13g_a=0;$d13g_a<count($d13g_contentArray);$d13g_a++){
		$d13g_split = preg_split("/{\Sgallery}/",$d13g_contentArray[$d13g_a]);
		for($d13g_b=0;$d13g_b<count($d13g_split);$d13g_b++){
			$d13g_finalArray[] = $d13g_split[$d13g_b];
			if(count($d13g_split)>1 && $d13g_b==0){
				$d13g_types[] = "path";
			}else{
				$d13g_types[] = "text";
			}
		}
	}
	
	//you now have 2 arrays...
	//print_r($d13g_finalArray); - contains all text elements to display
	//print_r($d13g_types);      - contains a "type" for each element : text or path (path to the folder to be galleryed
	
	//this function will generate the ouput for the post...
	$d13g_postOutput = "";
	for($d13g_a=0;$d13g_a<count($d13g_finalArray);$d13g_a++){
		if($d13g_types[$d13g_a] == "text"){
			$d13g_postOutput = $d13g_postOutput.$d13g_finalArray[$d13g_a];
		}else{
			$d13g_galleryelements = split(",", $d13g_finalArray[$d13g_a]);
			//$d13g_postOutput = $d13g_postOutput."<br><br>".count($d13g_galleryelements)."<br><br>";
			$d13g_postOutput = $d13g_postOutput.createGallery($d13g_galleryelements);
		}
	}
	return $d13g_postOutput;
}

//this function will create an image gallery from a specified folder...
function createGallery($d13g_galleryelements){
	$d13g_path = $d13g_galleryelements[0];
	if($d13g_galleryelements[1]){ $d13g_numCols=$d13g_galleryelements[1]; }else{ $d13g_numCols=get_option('d13g_numCols'); }
	$d13g_tblclass = get_option('d13g_tblclass');
	$d13g_trclass = get_option('d13g_trclass');
	$d13g_tdclass = get_option('d13g_tdclass');
	$d13g_imgclass = get_option('d13g_imgclass');
	$d13g_aclass = get_option('d13g_aclass');
	if($d13g_galleryelements[2]){ $d13g_maxWidth=$d13g_galleryelements[2]; }else{ $d13g_maxWidth=get_option('d13g_maxWidth'); }
	if($d13g_galleryelements[3]){ $d13g_maxHeight=$d13g_galleryelements[3]; }else{ $d13g_maxHeight=get_option('d13g_maxHeight'); }
	if($d13g_galleryelements[4]){ $d13g_quality=$d13g_galleryelements[4]; }else{ $d13g_quality=get_option('d13g_quality'); }
	if($d13g_galleryelements[5]){ $d13g_target=$d13g_galleryelements[5]; }else{ $d13g_target=get_option('d13g_target'); }
	$d13g_savethumbs = get_option('d13g_savethumbs');
	$d13g_savethumbsfolder = get_option('d13g_savethumbsfolder');
	$d13g_layout = get_option('d13g_layout');
	//create HTML tags...
	if($d13g_layout=="css"){
		$gallery_start = "<div class=\"$d13g_tblclass\">";
		$row_start = "<div class=\"$d13g_trclass\">";
		$thumb_start = "<div class=\"$d13g_tdclass\">";
		$thumb_end = "</div>";
		$row_end = "</div>";
		$gallery_end = "</div>";
	}else{
		$gallery_start = "<table class=\"$d13g_tblclass\">";
		$row_start = "<tr class=\"$d13g_trclass\">";
		$thumb_start = "<td class=\"$d13g_tdclass\">";
		$thumb_end = "</td>";
		$row_end = "</tr>";
		$gallery_end = "</table>";
	}
	//get the URL for the site...
		global $wpdb;
		$d13g_dbdata = $wpdb->get_row("SELECT option_value FROM $wpdb->options WHERE option_id = 1");
		$d13g_siteurl = $d13g_dbdata->option_value;
	//build the gallery...
	$d13g_col = 1;
	$d13g_path2 = $d13g_siteurl."/".$d13g_path;
	
	$page_address_array = split("[/]",get_permalink());
	$site_address_array = split("[/]",$d13g_siteurl);
	
	$new_page_address_array = array();
	for($d13g_a=0;$d13g_a<count($page_address_array)-1;$d13g_a++){
		if($page_address_array[$d13g_a]!="index.php" && substr($page_address_array[$d13g_a],0,1)!="?"){
			$new_page_address_array[count($new_page_address_array)] = $page_address_array[$d13g_a];
		}
	}

	$dotdots = "";
	for($d13g_a=1;$d13g_a<count($new_page_address_array)-count($site_address_array);$d13g_a++){
		$dotdots = $dotdots."../";
	}
	
	if(is_dir($d13g_path)){
		$d13g_temp = $gallery_start;
		if ($d13g_handle = opendir($d13g_path)) {
			while (false !== ($d13g_file = readdir($d13g_handle))) {
				$filenames[] = $d13g_file;
			}
			sort($filenames);
			if($d13g_savethumbs=='false' || count($d13g_galleryelements)>1){
				//thumb saving is off
				foreach ($filenames as $d13g_file) {
					if ($d13g_file!="." && $d13g_file!=".."){
						if(substr($d13g_file,-3,3)=="jpg" || substr($d13g_file,-3,3)=="JPG" || substr($d13g_file,-4,4)=="jpeg" || substr($d13g_file,-4,4)=="JPEG" || substr($d13g_file,-3,3)=="gif" || substr($d13g_file,-3,3)=="GIF" || substr($d13g_file,-3,3)=="png" || substr($d13g_file,-3,3)=="png") {
							if($d13g_col == 1){
								$d13g_temp = $d13g_temp.$row_start;
							}
							list($d13gfullwidth, $d13gfullheight) = getimagesize(/*$d13g_siteurl."/".*/$d13g_path."/".$d13g_file);
							if(get_option('d13g_incrementcolclass')=='true'){
								$d13g_imgclass2 = $d13g_imgclass."_".$d13g_col;
							}else{
								$d13g_imgclass2 = $d13g_imgclass;
							}
							if($d13g_target == "js"){
								$d13g_temp = $d13g_temp.$thumb_start."<a href=\"#$d13g_path/$d13g_file\" onClick=\"d13gfull=window.open('','','width=$d13gfullwidth,height=$d13gfullheight,menubar=no,toolbar=no,location=no,resizable=yes,scrollbars=no');d13gfull.document.write('<html><head><title>d13gallery fullsize image</title></head><body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0><img src=\'$d13g_siteurl/$d13g_path/$d13g_file\'></body></html>');\" name=\"$d13g_path/$d13g_file\" class=\"$d13g_aclass\"><img src=\"$d13g_siteurl/wp-content/plugins/d13gallery/d13thumbnail.php?path=../../../$d13g_path/$d13g_file&amp;w=$d13g_maxWidth&amp;h=$d13g_maxHeight&amp;q=$d13g_quality\" class=\"$d13g_imgclass2\" alt=\"$d13g_path/$d13g_file\"/></a>".$thumb_end;
							}else if($d13g_target == "lightbox"){
								$d13g_temp = $d13g_temp.$thumb_start."<a rel=\"lightbox[$d13g_path]\" href=\"$d13g_siteurl/$d13g_path/$d13g_file\" class=\"$d13g_aclass\"><img src=\"$d13g_siteurl/wp-content/plugins/d13gallery/d13thumbnail.php?path=../../../$d13g_path/$d13g_file&amp;w=$d13g_maxWidth&amp;h=$d13g_maxHeight&amp;q=$d13g_quality\" class=\"$d13g_imgclass2\" alt=\"".the_title('', '', FALSE)."\"/></a>".$thumb_end;
							}else{
								$d13g_temp = $d13g_temp.$thumb_start."<a href=\"$d13g_siteurl/$d13g_path/$d13g_file\" target=\"$d13g_target\" class=\"$d13g_aclass\"><img src=\"$d13g_siteurl/wp-content/plugins/d13gallery/d13thumbnail.php?path=../../../$d13g_path/$d13g_file&amp;w=$d13g_maxWidth&amp;h=$d13g_maxHeight&amp;q=$d13g_quality\" class=\"$d13g_imgclass2\" alt=\"$d13g_path/$d13g_file\"/></a>".$thumb_end;
							}
								
							if($d13g_col == $d13g_numCols){
								$d13g_temp = $d13g_temp.$row_end;
								$d13g_col = 1;
							}else{
								$d13g_col++;
							}
						}
					}
				}
			}else{
				//thumb saving is on $d13g_savethumbsfolder
				if(!is_dir($d13g_path."/".$d13g_savethumbsfolder)){ // folder doesn't exist
					mkdir($d13g_path."/".$d13g_savethumbsfolder,0777);
					//thumb saving is ON
					foreach ($filenames as $d13g_file) {
						if ($d13g_file!="." && $d13g_file!=".."){
							if(substr($d13g_file,-3,3)=="jpg" || substr($d13g_file,-3,3)=="JPG" || substr($d13g_file,-4,4)=="jpeg" || substr($d13g_file,-4,4)=="JPEG" || substr($d13g_file,-3,3)=="gif" || substr($d13g_file,-3,3)=="GIF" || substr($d13g_file,-3,3)=="png" || substr($d13g_file,-3,3)=="png") {
								if($d13g_col == 1){
									$d13g_temp = $d13g_temp.$row_start;
								}
								list($d13gfullwidth, $d13gfullheight) = getimagesize(/*$d13g_siteurl."/".*/$d13g_path."/".$d13g_file);
			
								$d13g_temp = $d13g_temp.$thumb_start."<img src=\"$d13g_siteurl/wp-content/plugins/d13gallery/d13thumbnail.php?path=../../../$d13g_path/$d13g_file&amp;w=$d13g_maxWidth&amp;h=$d13g_maxHeight&amp;q=$d13g_quality&amp;s=../../../$d13g_path/$d13g_savethumbsfolder/$d13g_file\" class=\"$d13g_imgclass2\" alt=\"-saved-\"/>".$thumb_end;
									
								if($d13g_col == $d13g_numCols){
									$d13g_temp = $d13g_temp.$row_end;
									$d13g_col = 1;
								}else{
									$d13g_col++;
								}
							}
						}
					}
				}else{
					//create gallery pointing to saved thumbs
					foreach ($filenames as $d13g_file) {
						if ($d13g_file!="." && $d13g_file!=".."){
							if(substr($d13g_file,-3,3)=="jpg" || substr($d13g_file,-3,3)=="JPG" || substr($d13g_file,-4,4)=="jpeg" || substr($d13g_file,-4,4)=="JPEG" || substr($d13g_file,-3,3)=="gif" || substr($d13g_file,-3,3)=="GIF" || substr($d13g_file,-3,3)=="png" || substr($d13g_file,-3,3)=="png") {
								if($d13g_col == 1){
									$d13g_temp = $d13g_temp.$row_start;
								}
								list($d13gfullwidth, $d13gfullheight) = getimagesize(/*$d13g_siteurl."/".*/$d13g_path."/".$d13g_file);
			
								if($d13g_target == "js"){
									$d13g_temp = $d13g_temp.$thumb_start."<a href=\"#$d13g_path/$d13g_file\" onClick=\"d13gfull=window.open('','','width=$d13gfullwidth,height=$d13gfullheight,menubar=no,toolbar=no,location=no,resizable=yes,scrollbars=no');d13gfull.document.write('<html><head><title>d13gallery fullsize image</title></head><body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0><img src=\'$d13g_siteurl/$d13g_path/$d13g_file\'></body></html>');\" name=\"$d13g_path/$d13g_file\" class=\"$d13g_aclass\"><img src=\"$d13g_siteurl/$d13g_path/$d13g_savethumbsfolder/$d13g_file\" class=\"$d13g_imgclass2\" alt=\"$d13g_path/$d13g_file\"/></a>".$thumb_end;
								}else if($d13g_target == "lightbox"){
									$d13g_temp = $d13g_temp.$thumb_start."<a rel=\"lightbox[$d13g_path]\" href=\"$d13g_siteurl/$d13g_path/$d13g_file\" class=\"$d13g_aclass\"><img src=\"$d13g_siteurl/$d13g_path/$d13g_savethumbsfolder/$d13g_file\" class=\"$d13g_imgclass2\" alt=\"".the_title('', '', FALSE)."\"/></a>".$thumb_end;
								}else{
									$d13g_temp = $d13g_temp.$thumb_start."<a href=\"$d13g_siteurl/$d13g_path/$d13g_file\" target=\"$d13g_target\" class=\"$d13g_aclass\"><img src=\"$d13g_siteurl/$d13g_path/$d13g_savethumbsfolder/$d13g_file\" class=\"$d13g_imgclass2\" alt=\"$d13g_path/$d13g_file\"/></a>".$thumb_end;
								}
									
								if($d13g_col == $d13g_numCols){
									$d13g_temp = $d13g_temp.$row_end;
									$d13g_col = 1;
								}else{
									$d13g_col++;
								}
							}
						}
					}
				}
			}
		}
		if($d13g_col != $d13g_numCols){
			$d13g_temp = $d13g_temp.$row_end;
		}
		$d13g_temp = $d13g_temp.$gallery_end;
	}
	return $d13g_temp;
}


add_filter('the_content','d13gallery_replace');
?>