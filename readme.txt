=== Plugin Name ===
Contributors: Finrod
Donate link: http://www.finrod.info
Tags: javascript, slideshow
Requires at least: 3.2
Tested up to: 3.2.1
Stable tag: 1.0.3

Display a javascript slideshow based on JonDesign's SmoothGallery

== Description ==

Display a javascript slideshow based on <a href="http://smoothgallery.jondesign.net/">JonDesign's SmoothGallery</a>.

I've made it for my own needs, to have a slideshow doing what I want and **without too much parameters**.

It's possible to customize the number of pictures displayed and its size. It's also possible to add some custom CSS.

For each pictures you can set a title, a legend, the picture URL and a link.

= Available languages: =
* English
* French

= Live demo: =
* <a href="http://www.finrod.info">Finrod.info</a>
* <a href="http://www.accesson.org">ACCesson.org</a>

= Known issue: =
* when setting only one picture in the slideshow, the picture is not displayed :(

== Installation ==

1. Download the zip file of the plugin and extract it on your computer
2. Upload the directory `simple_js_slideshow` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place `<?php if(function_exists('sjss_display_slideshow')) { sjss_display_slideshow(); } ?>` in your templates
4. You can use `is_home()` in the `if` statement to display the slideshow only on the homepage

== Frequently Asked Questions ==

= What languages are available? =

For now, only English and French are available

= Will you add some awesome features? =

Not now, I want to keep it very simple, but if you have an amazing idea, let me know !

== Screenshots ==

1. First admin page : general options
2. Second admin page : slideshow content

== Changelog ==

= 1.0.3 =
* Small bug fix and project file organisation

= 1.0 =
* First public release

== Upgrade Notice ==

= 1.0.3 =
Small bug fix and project file organisation

= 1.0 =
First public release
