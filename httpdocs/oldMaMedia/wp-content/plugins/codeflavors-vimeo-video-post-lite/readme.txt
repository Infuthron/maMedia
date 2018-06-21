=== WordPress Vimeo videos ===
Contributors: codeflavors, constantin.boiangiu
Tags: embed videos, wordpress vimeo embed, vimeo embed, vimeo plugin, video post
Requires at least: 4.0
Tested up to: 4.8
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Create WordPress posts from Vimeo videos complete with video embed, title, description and featured image. 

== Description ==

**Vimeo Video Post** is a Vimeo WordPress plugin that allows quick importing of Vimeo videos as WordPress posts with attached video player from channels, albums, user, groups or categories. Posts are creating having all details from Vimeo (title, description, video etc).

A demonstration on how easy it is to use this Vimeo WordPress plugin:

http://vimeo.com/70033244

The plugin allows importing of single videos (needs only video ID to fill title and description and attach the video) or bulk imports from Vimeo feeds (channels, albums, etc). Bulk importing can be done manually or automatically and importing of details is made according to your settings (ie. description can be imported as post excerpt and/or content).
Please note that before being able to perform bulk imports, you need to [register the plugin](https://developer.vimeo.com/apps/new "register Vimeo app") as an app on Vimeo (requires a valid Vimeo account). 


After importing, all videos can be embedded into posts using a visual interface that creates and places the shortcode into your post/page content. Available shortcodes are for single videos as well as video playlists.

**Features**

* Responsive design;
* Vimeo HTML5 video player support;
* Multiple video embeds on the same page;
* Latest videos widget;
* Single video shortcode;
* Import as custom post;
* Full video import (title, description, thumbnail, video);
* Single video import;
* Manual bulk import;
* Playlist themes;
* Automatic bulk import (**PRO version only**);
* Import private videos (**PRO version only**);
* Image import in WordPress Media gallery as post Featured Image (**PRO version only**);
* Video playlist for latest videos widget (**PRO version only**);
* WordPress third party theme support (**PRO version only**; currently available only for themes [deTube](http://themeforest.net/item/detube-professional-video-wordpress-theme/2664497), [Avada](http://themeforest.net/item/avada-responsive-multipurpose-theme/2833226), [SimpleMag](http://themeforest.net/item/simplemag-magazine-theme-for-creative-stuff/4923427) and [GoodWork](http://themeforest.net/item/goodwork-modern-responsive-multipurpose-wordpress-theme/4574698));
* Import videos as regular post type (**PRO version only**);
* Single video shortcode customization (**PRO version only**);
* Priority support (**PRO version only**).

**Important links:**

* [Forums](https://codeflavors.com/codeflavors-forums/forum/vimeo-video-post-for-wordpress/?utm_source=wordpressorg&utm_medium=readme&utm_campaign=vimeo-lite-plugin-readme "CodeFlavors Community Forums") (while we try to keep up with the forums here, please post any requests on our forums for a faster response);
* [CodeFlavors Vimeo Video Post homepage](https://codeflavors.com/vimeo-video-post/?utm_source=wordpressorg&utm_medium=readme&utm_campaign=vimeo-lite-plugin-readme "Vimeo WordPress plugin")

== Installation ==

Like any other plugin, it can be installed manually or directly from WordPress installation Plugins page. 

Once activated a new menu entry will be created called **Videos** (look for the Vimeo logo).

In order to be able to perform bulk imports, you will first need to register the plugin as an app on Vimeo website. Registration can be made [here](https://developer.vimeo.com/apps/new "register Vimeo app"). Please note that you must have a Vimeo account before you can register the app.
After successfull registration, go to plugin page **Settings** and under **Vimeo authentication** enter your consumer and secret key provided by Vimeo. Now you can make bulk imports.

For a detailed tutorial on how to set up Vimeo access registration, please see [this tutorial](https://codeflavors.com/documentation/vimeo-video-post-wp-plugin/vimeo-oauth/?utm_source=wordpressorg&utm_medium=readme&utm_campaign=vimeo-lite-plugin-readme "How to set up Vimeo OAuth").

That's  all, enjoy.  

== Screenshots ==

1. Manual bulk import - step 1
2. Manual bulk import - step 2 (choose videos to import)
3. Front-end playlist shortcode display

== Changelog ==

= 1.2.5.2 =
* Solved a JavaScript bug that was preventing volume to be set to 0 (mute);
* Added friendly, user dismissible notice asking for plugin review on WordPress.org (thank you in advance for your review). 

= 1.2.5.1 =
* Solved a JavaScript bug that was preventing the volume setting from being set on videos embedded by the plugin;
* Solved a bug that was setting embed color scheme to red (#FF0000) by default even when not filled.

= 1.2.5 =
* Solved a bug that was displaying the video on password protected posts even if the correct password was not provided;
* Updated several documentation links;
* Added JSON "fields" parameter to requests to Vimeo API in order to increase the number of requests per hour.

= 1.2.4 =
* Updated player embed script to only use the iframe player embed (removed deprecated Flash player entirely).
* Wrapped widget classes in conditional statements to avoid PHP errors when certain page builders are used.

= 1.2.3 = 
* Solves a rare, ocasional mixed content error when using https and images from Vimeo aren't delivered over https.

= 1.2.2 =
* Solved a bug related to playlist shortcode that was preventing videos from being embedded in certain cases.

= 1.2.1 =
* Solved a shortcode bug that was preventing videos from being embedded when using the single video shortcode in pages or posts.

= 1.2 =

* Video embed details available as data-... attributes on video div element;
* Added tags to video post type;
* Added filter 'cvm_automatic_video_embed' that can be used to prevent embeds to be made by the plugin automatically (return false from callback function);
* Added translation files;
* Added various templating and utility functions;
* Now compatible with the [tutorial](http://www.codeflavors.com/documentation/vimeo-video-post-wp-plugin-tutorials/using-vimeo-video-post-plugin-in-wp-theme/?utm_source=wordpressorg&utm_medium=readme&utm_campaign=vimeo-lite-plugin-readme "Using Vimeo video post plugin in WordPress theme") on how to create template files for the custom post type.

= 1.1.3 =

* Added custom post type "vimeo-video" archive (modified has_archive parameter to reflect public settings from Plugin settings)

= 1.1.2 =

* Vimeo video player SSL compatible

= 1.1.1 =

* Plugin compatible with WordPress 4.3 (scheduled for release on August 18th, 2015);
* Added Vimeo video albums import (not functional in version 1.1).

= 1.1 =
* Compatibility with Vimeo OAuth2;
* Restructured plugin Settings page into tabs for easier options management.

= 1.0 =
* Initial release

== Troubleshooting ==

Plugin was tested using WordPress 3.5 with theme Twenty Twelve in FireFox, Chrome, IE8, Safari (iPhone and iPad). If anything is wrong on your installation, please post on [CodeFlavors forums](http://www.codeflavors.com/codeflavors-forums/forum/vimeo-video-post-for-wordpress/?utm_source=wordpressorg&utm_medium=readme&utm_campaign=vimeo-lite-plugin-readme "CodeFlavors Community Forums") the theme you're using, WordPress version and browser/device used for testing. 