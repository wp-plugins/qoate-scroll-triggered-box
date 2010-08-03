<?php
/*
Plugin Name: Qoate Scroll Triggered Box
Plugin URI: http://qoate.com/wordpress-plugins/scroll-triggered-box/
Description: A scroll triggered box for easy social bookmarks or a newsletter sign-up form. Great call to action!
Version: 2.2
Author: Danny van Kooten
Author URI: http://qoate.com
License: GPL2
*/

/*  Copyright 2010  Danny van Kooten  (email : danny@qoate.com)

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
define('QOATE_NS_PLUGIN_PATH',WP_CONTENT_URL.'/plugins/'. plugin_basename(dirname(__FILE__).'/')); 

$social_sites = Array(
	'del.icio.us' => Array(
		'url' => 'http://delicious.com/post?url=PERMALINK&amp;title=TITLE&amp;notes=EXCERPT',
	),
	'Digg' => Array(
		'url' => 'http://digg.com/submit?phase=2&amp;url=PERMALINK&amp;title=TITLE&amp;bodytext=EXCERPT',
	),
	'Facebook' => Array(
		'url' => 'http://www.facebook.com/share.php?u=PERMALINK&amp;t=TITLE',
	),
	'FriendFeed' => Array(
		'url' => 'http://www.friendfeed.com/share?title=TITLE&amp;link=PERMALINK',
	),
	'Google' => Array(
		'url' => 'http://www.google.com/bookmarks/mark?op=edit&amp;bkmk=PERMALINK&amp;title=TITLE&amp;annotation=EXCERPT',
	),
	'LinkedIn' => Array(
		'url' => 'http://www.linkedin.com/shareArticle?mini=true&amp;url=PERMALINK&amp;title=TITLE&amp;source=BLOGNAME&amp;summary=EXCERPT',
	),
	'Mixx' => Array(
		'url' => 'http://www.mixx.com/submit?page_url=PERMALINK&amp;title=TITLE',
	),
	'MySpace' => Array(
		'url' => 'http://www.myspace.com/Modules/PostTo/Pages/?u=PERMALINK&amp;t=TITLE',
	),
	'Netvibes' => Array(
		'url' => 'http://www.netvibes.com/share?title=TITLE&amp;url=PERMALINK',
	),
	'Posterous' => Array(
		'url' => 'http://posterous.com/share?linkto=PERMALINK&amp;title=TITLE&amp;selection=EXCERPT',
	),
	'Reddit' => Array(
		'url' => 'http://reddit.com/submit?url=PERMALINK&amp;title=TITLE',
	),
	'RSS' => Array(
		'url' => 'FEEDLINK',
	),
	'StumbleUpon' => Array(
		'url' => 'http://www.stumbleupon.com/submit?url=PERMALINK&amp;title=TITLE',
	),
	'Technorati' => Array(
		'url' => 'http://technorati.com/faves?add=PERMALINK',
	),
	'Tumblr' => Array(
		'url' => 'http://www.tumblr.com/share?v=3&amp;u=PERMALINK&amp;t=TITLE&amp;s=EXCERPT',
	),
	'Twitter' => Array(
		'url' => 'http://twitter.com/home?status=TITLE%20-%20PERMALINK',
	),
);

/* Load the plugin files, only when they're needed!*/
add_action("wp", "qoate_load_sb_plugin");
function qoate_load_sb_plugin() {
$options = get_option('qoate_sb_holder',array('do_on_posts'=>'1')); 
   if($options['do_on_posts']=='1' && is_single()) {
		include("qoate-sb-plugin.php");
   } elseif($options['do_on_pages']=='1' && is_page()) {
		include("qoate-sb-plugin.php");
   } elseif($options['do_on_home']=='1' && is_home()) {
		include("qoate-sb-plugin.php");
   } elseif($options['do_on_archive']=='1' && (is_archive() || is_tag() || is_category() || is_author())) {
		include("qoate-sb-plugin.php");
   }
   
}

if(is_admin()) {
		 include("qoate-sb-dashboard.php");
}

$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'qoate_sb_settings_link' );
// Add settings link on plugin page
function qoate_sb_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=qoate-sb-settings">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
?>