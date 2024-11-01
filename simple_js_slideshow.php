<?php

/*
  Plugin Name: Simple JS SlideShow
  Plugin URI: http://www.finrod.info/simple-js-slideshow-en/
  Description: Display a javascript slideshow based on <a href="http://smoothgallery.jondesign.net/">JonDesign's SmoothGallery</a>
  Version: 1.0.3
  Author: Sylvain Fav&eacute;
  Author URI: http://www.finrod.info


  Copyright 2011  Sylvain Favé  (email : sylvain.fave@gmail.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

#### FRONT END PART ####

function sjss_display_slideshow() {
	echo '<div id="myGallery" style="width:' . get_option('sjss_width') . '; height:' . get_option('sjss_height') . '; ' . get_option('sjss_custom_css') . '">';

	for ($i = 1; $i < NB_PICTURES + 1; $i++) {
		if (get_option('sjss_title_' . $i) != false) {
			echo '<div class="imageElement">';
			echo '<h3>' . get_option('sjss_title_' . $i) . '</h3>';
			echo '<p>' . get_option('sjss_legend_' . $i) . '</p>';
			echo '<a href="' . get_option('sjss_url_' . $i) . '" title="' . _e('Read the article', 'simple_js_slideshow') . '" class="open"></a>';
			echo '<img src="' . get_option('sjss_image_' . $i) . '" class="full" />';
			echo '</div>';
		}
	}

	echo '</div>';
}

function sjss_style_head() {
	if (is_home()) {
		wp_register_style('slideshowStyle', plugins_url('/css/jd.gallery.css', __FILE__));
		wp_enqueue_style('slideshowStyle');
	}
}

function sjss_script_head() {
	if (is_home()) {
		wp_enqueue_script('mootools', plugins_url('/js/mootools.v1.11.js', __FILE__));
		wp_enqueue_script('slideshowScript', plugins_url('/js/jd.gallery.js', __FILE__));
	}
}

function sjss_init_head() {
	if (is_home()) {
		echo '<script type="text/javascript">function startGallery() {var myGallery = new gallery($(\'myGallery\'), {timed: true,showArrows: true,showCarousel: false,embedLinks: true});}';
		echo 'window.addEvent(\'domready\', startGallery);';
		echo '</script>';
	}
}

add_action('wp_print_styles', 'sjss_style_head');
add_action('wp_enqueue_scripts', 'sjss_script_head');
add_action('wp_head', 'sjss_init_head');

#### INSTALL PROCESS ####

define("NB_PICTURES_DEFAULT", 3);
$nb_pic = get_option('sjss_nb_pictures');
define("NB_PICTURES", empty($nb_pic) ? NB_PICTURES_DEFAULT : $nb_pic);

function sjss_set_options() {
	add_option('sjss_nb_pictures', NB_PICTURES, '', 'yes');
	add_option('sjss_height', '250px', '', 'yes');
	add_option('sjss_width', '545px', '', 'yes');
	add_option('sjss_custom_css', 'margin-bottom:10px;', '', 'yes');

	for ($i = 1; $i < NB_PICTURES + 1; $i++) {
		add_option('sjss_title_' . $i, '', '', 'yes');
		add_option('sjss_legend_' . $i, '', '', 'yes');
		add_option('sjss_image_' . $i, '', '', 'yes');
		add_option('sjss_url_' . $i, '', '', 'yes');
	}
}

function sjss_unset_options() {
	delete_option('sjss_nb_pictures');
	delete_option('sjss_height');
	delete_option('sjss_width');
	delete_option('sjss_custom_css');

	for ($i = 1; $i < NB_PICTURES + 1; $i++) {
		delete_option('sjss_title_' . $i);
		delete_option('sjss_legend_' . $i);
		delete_option('sjss_image_' . $i);
		delete_option('sjss_url_' . $i);
	}
}

register_activation_hook(__FILE__, 'sjss_set_options');
register_uninstall_hook(__FILE__, 'sjss_unset_options');

#### ADMIN OPTIONS PAGES ####

function sjss_i18n_init() {
	load_plugin_textdomain('simple_js_slideshow', false, basename(dirname(__FILE__)) . '/languages');
}

function sjss_admin_init() {
	register_setting('sjss_options', 'sjss_nb_pictures');
	register_setting('sjss_options', 'sjss_height');
	register_setting('sjss_options', 'sjss_width');
	register_setting('sjss_options', 'sjss_custom_css');

	for ($i = 1; $i < NB_PICTURES + 1; $i++) {
		register_setting('sjss_slideshow', 'sjss_title_' . $i);
		register_setting('sjss_slideshow', 'sjss_legend_' . $i);
		register_setting('sjss_slideshow', 'sjss_image_' . $i);
		register_setting('sjss_slideshow', 'sjss_url_' . $i);
	}
}

function sjss_admin_menu() {
	add_menu_page(__('Simple JS Slideshow', 'simple_js_slideshow'), __('Slideshow', 'simple_js_slideshow'), 'administrator', 'sjss_option_menu', 'sjss_admin_options');
	add_submenu_page('sjss_option_menu', __('General options', 'simple_js_slideshow'), __('Options', 'simple_js_slideshow'), 'administrator', 'sjss_option_menu', 'sjss_admin_options');
	add_submenu_page('sjss_option_menu', __('Slideshow options', 'simple_js_slideshow'), __('Slideshow', 'simple_js_slideshow'), 'administrator', 'sjss_slideshow_menu', 'sjss_admin_slideshow');
}

add_action('init', 'sjss_i18n_init');
add_action('admin_init', 'sjss_admin_init');
add_action('admin_menu', 'sjss_admin_menu');

require_once('admin/functions.php');
require_once('admin/options.php');
require_once('admin/slideshow.php');
?>