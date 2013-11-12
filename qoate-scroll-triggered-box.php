<?php
/*
Plugin Name: Qoate Scroll Triggered Box
Plugin URI: http://qoate.com/wordpress-plugins/scroll-triggered-box/
Description: This plugin is extremely outdated. Please use the <a href="http://wordpress.org/plugins/scroll-triggered-boxes/">new and improved plugin called "Scroll Triggered Boxes"</a> instead.
Version: 2.3.1
Author: Danny van Kooten
Author URI: http://dannyvankooten.com
License: GPL2
*/

/*  Copyright 2010-2013  Danny van Kooten  (email: hi@dannyvankooten.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

defined("ABSPATH") or exit;

define("QSTB_PLUGIN_DIR", plugin_dir_path(__FILE__)); 
define("QSTB_PLUGIN_URL", plugins_url( '/' , __FILE__ ));

if ( is_admin() ) {
	include QSTB_PLUGIN_DIR . "/admin.php";
} else {
	add_action( "wp", "qstb_init" );
}

function qstb_init() {
	$options = qstb_get_options();
	$load = false;

	if ( $options['do_on_posts'] && is_single() ) {
		$load = true;
	} elseif ( $options['do_on_pages']=='1' && is_page() ) {
		$load = true;
	} elseif ( $options['do_on_home']=='1' && is_home() ) {
		$load = true;
	} elseif ( $options['do_on_archive']=='1' && ( is_archive() || is_tag() || is_category() || is_author() ) ) {
		$load = true;
	}

	if($load) {
		include QSTB_PLUGIN_DIR . '/frontend.php';
	}
}

function qstb_get_options()
{	
	$defaults = array( 
		'vplacement' => 'bottom', 'hplacement' => 'right', 'animation' => 'slide', 'percentage' => 75, 
		'text' => 'Your HTML-content goes here..',
		'with_minimize' => 0, 'do_on_home' => 0, 'do_on_posts' => 0, 'do_on_archive' => 0, 'do_on_pages' => 0, 'show_at_comments' => 0
	);

	return array_merge($defaults, get_option( 'qoate_sb_holder', array()));
}

function qstb_get_social_mediums()
{
	return array(
		'del.icio.us' => array(
			'url' => 'http://delicious.com/post?url=PERMALINK&amp;title=TITLE&amp;notes=EXCERPT',
		),
		'Facebook' => array(
			'url' => 'http://www.facebook.com/share.php?u=PERMALINK&amp;t=TITLE',
		),
		'Google' => array(
			'url' => 'http://www.google.com/bookmarks/mark?op=edit&amp;bkmk=PERMALINK&amp;title=TITLE&amp;annotation=EXCERPT',
		),
		'LinkedIn' => array(
			'url' => 'http://www.linkedin.com/shareArticle?mini=true&amp;url=PERMALINK&amp;title=TITLE&amp;source=BLOGNAME&amp;summary=EXCERPT',
		),
		'MySpace' => array(
			'url' => 'http://www.myspace.com/Modules/PostTo/Pages/?u=PERMALINK&amp;t=TITLE',
		),
		'Posterous' => array(
			'url' => 'http://posterous.com/share?linkto=PERMALINK&amp;title=TITLE&amp;selection=EXCERPT',
		),
		'Reddit' => array(
			'url' => 'http://reddit.com/submit?url=PERMALINK&amp;title=TITLE',
		),
		'RSS' => array(
			'url' => 'FEEDLINK',
		),
		'StumbleUpon' => array(
			'url' => 'http://www.stumbleupon.com/submit?url=PERMALINK&amp;title=TITLE',
		),
		'Technorati' => array(
			'url' => 'http://technorati.com/faves?add=PERMALINK',
		),
		'Tumblr' => array(
			'url' => 'http://www.tumblr.com/share?v=3&amp;u=PERMALINK&amp;t=TITLE&amp;s=EXCERPT',
		),
		'Twitter' => array(
			'url' => 'http://twitter.com/home?status=TITLE%20-%20PERMALINK',
		),
	);
}