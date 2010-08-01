<?php
/*
Plugin Name: Qoate Scroll Triggered Box!
Plugin URI: http://qoate.com/wordpress-plugins/scroll-triggered-box/
Description: Slides in a beautiful box where visitors can share or sign-up.
Version: 1.1
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

/* Load the plugin files, only when they're needed!*/
add_action("wp", "qoate_load_sb_plugin");
function qoate_load_sb_plugin() {
   if(is_single()) {
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



