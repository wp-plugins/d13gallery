<div class="wrap"> 
	<a name="help_main"></a><h2>Using D13Gallery</h2>
	<h3>Contents</h3>
	<ol>
		<li><a href="#help_section_1">Requirements</a></li>
		<li><a href="#help_section_2">Adding galleries to your posts</a></li>
		<li><a href="#help_section_3">Modifying your settings</a></li>
		<li><a href="#help_section_4">Working with lightbox components</a></li>
		<li><a href="#help_section_5">Work still to come</a></li>
	</ol>
	<a name="help_section_1"></a><h3>1. Requirements</h3>
	<p>The system requirements detailed here are intended as a guide only and d13Gallery may operate correctly at a lower specification. These are the installed versions used for testing and therefore act as an accurate guide.</p>
	<ul>
		<li>PHP version 5</li>
		<li>GD libraries version 2</li>
		<li>Wordpress version 2.3.x</li>
	</ul>
	<p>If you're unsure of how your server is set up then have a check through the diagnostic window below. You can also locate your Wordpress version number by checking the footer of any of your Wordpress admin pages.</p>
	<iframe src="<?php echo(bloginfo('wpurl')); ?>/wp-content/plugins/d13gallery/d13g_phpinfo.php" width="80%" height="300"></iframe>
	<a name="help_section_2"></a><h3>2. Adding galleries to your posts</h3>
	<p>This help document will focus on the following example:</p>
	<p><em>You have a Wordpress blog installed at &quot;http://www.yourblog.com/blog&quot; and you want to create a gallery of your wedding photos and attach them to the post &quot;Look! We're married...&quot;.</em></p>
	<p>The first step, as stated above, is to upload the images that you want to include in your gallery. To keep all of your galleries tidy, you may want to create a folder called &quot;galleries&quot; to hold all of your d13Gallery files - this would be created at <em>&quot;http://www.yourblog.com/blog/galleries&quot;</em>. Within that folder you'd create a new folder just to hold your wedding photos <em>&quot;http://www.yourblog.com/blog/galleries/wedding&quot;</em>. You're then ready to upload all of your image files (GIF, JPG or PNG) to this new folder.</p>
	<p>Now that your images are uploaded you can create a link to your gallery within a post. Use the Wordpress admin pages to edit or create a post and start typing. When you get to the place in your post where you'd like to add a gallery just use the following text:</p>
	<p><strong>{gallery}location/of/images{/gallery}</strong></p>
	<p>In the example this text would be:</p>
	<p><strong>{gallery}galleries/wedding{/gallery}</strong></p>
	<p>Save or publish your post and then view your blog - your new image gallery will be embedded within your new post. </p>
	<a name="help_section_3"></a><h3>3. Modifying your settings</h3>
	<p>D13Gallery offers a number of flexible, customisable settings to help you display your galleries exactly you want to. Below is an outline of each of the settings that you can customise.</p>
	<p><strong>Number of thumbnails in each row</strong><br>
	  This determines the number of images to show in each row of the grid. By default, this is set to 4 but can be any number you choose apart from 0.</p>
	<p><strong>Maximum size for each thumbnail</strong><br>
	  D13Gallery will automatically resize each of your images to display as thumbnails - these settings will adjust the maximum size to use. D13Gallery won't distort your images but instead will shrink them to ensure that they fit within the size you specify.</p>
	<p><strong>JPEG quality to use for thumbnails</strong><br>
	  When working with JPG images, d13gallery can specify the quality to use for each of the generated thumbnails. 100% is the highest quality setting but will produce the largest file sizes. 60%-80% is recommended.</p>
	<p><strong>Target window for full-size images</strong><br>
	  D13Gallery will let you specify how to display your full size images once a thumbnail is clicked.</p>
	<ul>
	  <li>You can use any name for this setting to force images to open in windows with the same name - especially useful when working with frames or windows created with JavaScript.</li>
      <li>Using &quot;_blank&quot; for this setting will allow your internet browser to create new, blank windows for each image.</li>
      <li>By using &quot;js&quot; for this setting you can tell d13gallery to use JavaScript to create new windows for each new image - each new window will be resized automatically to fit the image.</li>
      <li>By using &quot;lightbox&quot; for this setting you can incorporate any 3rd party lightbox* components to handle displaying your full-size images.</li>
  </ul>
	<p>* see <a href="#help_section_4">section 4</a> for more information on using lightbox components.</p>
	<p><strong>HTML layout method</strong><br>
    D13Gallery lets you specify how it should display your thumbnail images. Selecting &quot;tables&quot; will output your galleries as HTML tables within your posts while &quot;css&quot; will ouput your galleries in a series of DIVs.</p>
	<p><strong>CSS class names</strong><br>
	  The 5 css settings allow you to specify custom stylesheet classes for each of the gallery elements including gallery surround, gallery row, gallery cell, link and image. </p>
	<a name="help_section_4"></a><h3>4. Working with lightbox components</h3>
	<p>If you specify &quot;lightbox&quot; as the target window for your galleries, each image link will have the <em>rel=&quot;lightbox&quot;</em> attribute added:</p>
	<p><em>&lt;a href=&quot;gallery/fullimage.jpg&quot; rel=&quot;lightbox&quot;&gt;&lt;img src=&quot;gallery/thumbnail.jpg&quot;/&gt;&lt;/a&gt;</em></p>
	<p>By including this attribute you are able to include JavaScript lightbox components to handle the display of your full size images. This functionality has been tested using the Lightbox v2.03.3 component by Lokesh Dhakar (<a href="http://huddletogether.com/projects/lightbox2/" target="_blank">http://huddletogether.com/projects/lightbox2/</a>).</p>
	<p>When using a lightbox component it is important to add all of the lightbox files (JS and CSS) to the root of your chosen theme. You can then link these files into the head of your theme using code along the lines of:</p>
	<p><em>&lt;script type=&quot;text/javascript&quot; src=&quot;&lt;?php bloginfo('template_directory'); ?&gt;/prototype.js&quot;&gt;&lt;/script&gt;<br>
&lt;script type=&quot;text/javascript&quot; src=&quot;&lt;?php bloginfo('template_directory'); ?&gt;/scriptaculous.js?load=effects&quot;&gt;&lt;/script&gt;<br>
&lt;script type=&quot;text/javascript&quot; src=&quot;&lt;?php bloginfo('template_directory'); ?&gt;/lightbox.js&quot;&gt;&lt;/script&gt;<br>
&lt;link rel=&quot;stylesheet&quot; href=&quot;&lt;?php bloginfo('template_directory'); ?&gt;/lightbox.css&quot; type=&quot;text/css&quot; media=&quot;screen&quot; /&gt; </em></p>
	<a name="help_section_5"></a><h3>5. Work still to come</h3>
	<ul>
	  <li>Streamline plugin code - especially references between plugin files</li>
      <li>All saving of generated thumbnails  </li>
  </ul>
</div> 
