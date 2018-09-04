<?php

/*
	
@package camera-cliques
	
	========================
		ADMIN PAGE
	========================
*/

// This is the Camera Cliques link to our admin page that will be added to the WordPress admin menu
function camera_cliques_add_admin_page() {

    add_menu_page( 'Camera Cliques Theme Options', 'Camera Cliques', 'manage_options', 'camera_cliques', 'camera_cliques_create_page', get_template_directory_uri() . '/img/camera-cliques-icon.png', 110 );

      	
    // Generate Camera Cliques Admin Sub Pages
    add_submenu_page( 'camera_cliques', 'Camera Cliques Theme Options', 'General', 'manage_options', 'camera_cliques', 'camera_cliques_create_page' );
 	add_submenu_page( 'camera_cliques', 'Camera Cliques CSS Options', 'Custom CSS', 'manage_options', 'camera_cliques_css', 'camera_cliques_settings_page');

    // Activate customer settings
    add_action( 'admin_init', 'camera_cliques_custom_settings' );
}

// Hook our admin page into the WordPress admin menu
add_action( 'admin_menu', 'camera_cliques_add_admin_page' );

function camera_cliques_create_page() {
    //generation of our admin General page
    require_once( get_template_directory().'/inc/templates/camera-cliques-admin.php' );
}

function camera_cliques_settings_page() {
    //generation of our admin Settings page
    echo '<h1>Camera Cliques Custom CSS</h1>';
}

function camera_cliques_custom_settings() {

    register_setting( 'camera-cliques-settings-group', 'first_name' );
    register_setting( 'camera-cliques-settings-group2', 'first_name' );
    
    add_settings_section( 'camera-cliques-sidebar-options', 'Sidebar Options', 'camera_cliques_sidebar_optoions', 'camera_cliques' );
    add_settings_field( 'sidebar-name', 'First Name', 'camera_cliques_sidebar_name', 'camera_cliques', 'camera-cliques-sidebar-options' );
}

function camera_cliques_sidebar_optoions() {

    echo 'Customize your sidebar options...';
}

function camera_cliques_sidebar_name() {
    
    $firstName = esc_attr( get_option('first_name') );
    echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" />';
}

?>