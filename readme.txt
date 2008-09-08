=== d13gallery ===
Contributors: d13design
Donate link: http://www.d13design.co.uk/d13gallery/
Tags: photo, image, gallery, thumbnail, images, photos, galleries
Requires at least: 2.0.2
Tested up to: 2.6
Stable tag: 3.3.3

Simply and quickly add thumbnail image galleries to your posts and pages using a html-like tag...

== Description ==

D13Gallery is a simple Wordpress plugin that allows you to quickly add thumbnail image galleries to your posts and pages. By including a simple HTML-like tag to the body of your post, a folder on your web server can be scanned for images and a gallery generated automatically.

Editing the settings of your d13galleries is quick and simple using the inbuilt options screen - simple adjust your settings for size, quality and layout and click 'update' to apply the changes to all of your galleries.

**What's new in version 3.3.2?**

This version has some slightly adjusted markup for when you're using a lightbox. Rather than display the path to the image as the image title within the lightbox popup, the post title will now be used--much nicer.

**What's new in version 3.3.1?**

Version 3.3.1 includes a simple addition to increment the class names for images depending on their column - this means that you can apply different styling to the left images, middle images and right images.

**What's new in version 3.3?**

Version 3.3 revives the function of saving generated thumbnails on your server. Using the admin screen choose whether to save thumbnails and where and let d13gallery handle the rest.

**What's new in version 3.2?**

Version 3.2 has had a full re-write of all admin functionality to bring it inline with the Wordpress 2.5.x releases. Making use of the Wordpress database for settings rather than an external settings file makes v3.2 a more flexible and streamlined version.

**What's new in version 3.1?**

Version 3.1 extends the flexibility of the d13gallery plugin. Using the admin screens it is possible to define settings for how all of your d13galleries will appear - version 3.1 allows you to override these settings for specific galleries. This allows you to create gallery layouts for specific galleries, control the image quality for specific galleries or even use a javascript lightbox for a specific gallery.

**What's new in version 3.0?**

The plugin code has been completely re-written providing faster processing and more robust support for the Wordpress platform. The infamous 'permalink bug' has now been fixed and additional functionality has been added to support CSS layout and lightbox components.

The inbuilt options screen as part of your Wordpress admin pages and also features extensive support documentation helping you get the most from the plugin.

== Installation ==

1. Begin by downloading the plugin file using the link above.
1. Extract the files to your local machine.
1. Upload the whole d13gallery folder (including the folder itself) to your plugins directory - typically http://www.yourblog.com/wp-content/plugins/
1. Activate the plugin using your Wordpress admin pages.
1. Familiarise yourself with the documentation under 'options > d13galleries'
1. Get cracking!

== Frequently Asked Questions ==

= How do I add a gallery to a post? =

You have a Wordpress blog installed at "http://www.yourblog.com/blog" and you want to create a gallery of your wedding photos and attach them to the post "Look! We're married...".

The first step, as stated above, is to upload the images that you want to include in your gallery. To keep all of your galleries tidy, you may want to create a folder called "galleries" to hold all of your d13Gallery files - this would be created at "http://www.yourblog.com/blog/galleries". Within that folder you'd create a new folder just to hold your wedding photos "http://www.yourblog.com/blog/galleries/wedding". You're then ready to upload all of your image files (GIF, JPG or PNG) to this new folder.

Now that your images are uploaded you can create a link to your gallery within a post. Use the Wordpress admin pages to edit or create a post and start typing. When you get to the place in your post where you'd like to add a gallery just use the following text:

{gallery}location/of/images{/gallery}

In the example this text would be:

{gallery}galleries/wedding{/gallery}

Save or publish your post and then view your blog - your new image gallery will be embedded within your new post. 

= How do I use a lightbox component? =

D13gallery works great with the [Lightbox 2](http://www.lokeshdhakar.com/projects/lightbox2/) component from Lokesh Dhakar. As well as being small, elegant and reliable this component also has a [great Wordpress plugin](http://wordpress.org/extend/plugins/lightbox-2/) that handles all of the script inclusion for you.

Once you have the lightbox added you can set the "target window" setting in your d13galleries settings to "lightbox".

== Screenshots ==

1. An example of a d13gallery reading a folder with 8 images of flowers.
2. The d13gallery admin screen.
3. An example of adding a simple gallery inside a post.
4. An example of adding a complex gallery inside a post.

