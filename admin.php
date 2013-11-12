<?php
add_action( 'admin_init', 'qoate_sb_settings_init' );
add_action( 'admin_menu', 'qoate_add_sb_options_page' );
add_filter( "plugin_action_links_qoate-scroll-triggered-box/qoate-scroll-triggered-box.php", 'qstb_add_settings_link' );

function qstb_add_settings_link( $links ) {
	$settings_link = '<a href="' . admin_url( 'options-general.php?page=qoate-sb-settings' ) . '">Settings</a>';
	array_unshift( $links, $settings_link );
	return $links;
}

// Add menu page
function qoate_add_sb_options_page() {
	add_options_page( 'Qoate Scroll Triggered Box', 'Qoate Scroll Triggered Box', 'manage_options', 'qoate-sb-settings', 'qoate_create_sb_options_page' );
}

// Init plugin options to white list our options
function qoate_sb_settings_init() {
	register_setting( 'qoate_sb_options', 'qoate_sb_holder' );
	register_setting( 'qoate_sb_options', 'qoate_sb_settings' );
}

// Draw the menu page itself
function qoate_create_sb_options_page() {
	$social_sites = qstb_get_social_mediums();
	require QSTB_PLUGIN_DIR . '/views/settings-page.php';
} 
