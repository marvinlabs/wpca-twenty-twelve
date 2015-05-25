<?php

/**
 * Declare the features that are supported by your theme
 */
function cuar_theme_declare_supported_features()
{
    // if ( true ) return; // Remove or comment this line to see the following code in action

    //-------------------------------------------------------------------------------------------------------------
    // Tells Customer Area that this theme is providing its own stylesheet (will hide CSS settings from the plugin
    // options page)
    //--
// 	add_theme_support( 'customer-area.stylesheet' );

    //-------------------------------------------------------------------------------------------------------------
    // Tells Customer Area that this theme is already outputting the Customer Area navigation menu somewhere (will
    // hide automatic navigation menu printing settings from the plugin options page)
    //--
    add_theme_support('customer-area.navigation-menu');

    //-------------------------------------------------------------------------------------------------------------
    // Tells Customer Area that this theme is providing single post templates for the private content and
    // containers. The plugin will disabled the settings linked to 'single post footer' for the given post types.
    //--
//	add_theme_support( 'customer-area.single-post-templates', array( 
//			'cuar_private_file', 	// Customize display in file single-cuar_private_file.php
//			'cuar_private_page',  	// Customize display in file single-cuar_private_page.php
//			'cuar_conversation',  	// Customize display in file single-cuar_conversation.php
//			'cuar_project',  	 	// Customize display in file single-cuar_project.php
//		) );

    //-------------------------------------------------------------------------------------------------------------
    // Tells Customer Area that this theme is already providing its own styles and javascript files for the
    // jquery.select2 library (otherwise, this library's files would be taken from the Customer Area plugin folder)
    // This is also a way to disable those libraries if you want to use an alternative. In that case, you should
    // also take care to write the corresponding javascript code and include the proper files (JS/CSS).
    //--

    // For instance, the following line tells the plugin that we will take care of including the files required for
    // the jQuery Select2 script. However, the plugin is still responsible for writing the markup to enable the
    // jQuery Select2 library on the appropriate elements.
//	add_theme_support( 'customer-area.library.jquery.select2', array( 'files' ) );

    // If we want to disable jQuery Select2 and replace it with our own alternative, we should tell the plugin that
    // not only we don't want it to include the files, but also that we don't want it to output any related markup.
//	add_theme_support( 'customer-area.library.jquery.select2', array( 'files', 'markup' ) );

    // Other libraries that may be also disabled/taken care of. If we don't specify an array as a parameter, the
    // plugin assumes that the theme is taking care of everything for that library (files, markup, ...)
//	add_theme_support( 'customer-area.library.bootstrap.dropdown' );
//	add_theme_support( 'customer-area.library.bootstrap.transition' );
//	add_theme_support( 'customer-area.library.bootstrap.collapse' );


    //-------------------------------------------------------------------------------------------------------------
}

add_action('after_setup_theme', 'cuar_theme_declare_supported_features');


/**
 * This is how you would provide your own nav menu walker to change the navigation menu's markup (here, we'd use a
 * class to output bootstrap-friendly markup).
 *
 * Note that this only changes how the menu items are output. To change the wrapping of the menu itself, please
 * override the template "customer-pages-navigation-menu.template.php"
 */
function cuar_theme_custom_nav_walker($args)
{
    require_once('bootstrap-nav-walker.class.php');

    $args['depth'] = 2;
    $args['container'] = 'div';
    $args['container_class'] = 'cuar-collapse cuar-navbar-collapse cuar-nav-container';
    $args['menu_class'] = 'cuar-nav cuar-navbar-nav';
    $args['fallback_cb'] = 'CUAR_BootstrapNavWalker::fallback';
    $args['walker'] = new CUAR_BootstrapNavWalker();

    return $args;
}

add_filter('cuar/core/page/nav-menu-args', 'cuar_theme_custom_nav_walker');

/**
 * Add the full width body class to our private post types
 */
function cuar_body_class($classes)
{
    $post_type = get_post_type();
    $private_post_types = array_merge(
        CUAR_Plugin::get_instance()->get_content_post_types(),
        CUAR_Plugin::get_instance()->get_container_post_types());

    if (in_array($post_type, $private_post_types))
    {
        $classes[] = 'full-width';
    }

    return $classes;
}

add_filter('body_class', 'cuar_body_class');
 
 
 
 
 
 
 