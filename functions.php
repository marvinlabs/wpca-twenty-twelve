<?php

/**
 * Declare the features that are supported by your theme
 */
function cuar_theme_declare_supported_features() {

	// Tells Customer Area that this theme is providing its own stylesheet (will hide CSS settings from the plugin 
	// options page)
	add_theme_support( 'customer-area.stylesheet' );
	
	// Tells Customer Area that this theme is already outputting the Customer Area navigation menu somewhere (will 
	// hide automatic navigation menu printing settings from the plugin options page)
	add_theme_support( 'customer-area.navigation-menu' );
}
add_action( 'after_setup_theme', 'cuar_theme_declare_supported_features' );


/**
 * This is how you would provide your own nav menu walker to change the navigation menu's markup (here, we'd use a 
 * class to output bootstrap-friendly markup). 
 *
 * Note that this only changes how the menu items are output. To change the wrapping of the menu itself, please 
 * override the template "customer-pages-navigation-menu.template.php"
 */
 function cuar_theme_custom_nav_walker($args) {
	require_once( 'includes/wp_bootstrap_navwalker.php' );		
	
	$args['depth'] = 2;
	$args['container'] = 'div';
	$args['container_class'] = 'collapse navbar-collapse cuar-nav-container';
	$args['menu_class'] = 'nav navbar-nav';
	$args['fallback_cb'] = 'wp_bootstrap_navwalker::fallback';
	$args['walker'] = new wp_bootstrap_navwalker();		
	
	return $args;
 }
 add_filter( 'cuar/core/page/nav-menu-args', 'cuar_theme_custom_nav_walker' );