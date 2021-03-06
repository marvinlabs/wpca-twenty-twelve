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
//    add_theme_support('customer-area.navigation-menu');

    //-------------------------------------------------------------------------------------------------------------
    // Tells Customer Area that this theme is providing single post templates for the private content and
    // containers. The plugin will disabled the settings linked to 'single post footer' for the given post types.
    //--
//	add_theme_support( 'customer-area.single-post-templates', array( 
//			'cuar_private_file', 	// Customize display in file single-cuar_private_file.php
//			'cuar_private_page',  	// Customize display in file single-cuar_private_page.php
//			'cuar_conversation',  	// Customize display in file single-cuar_conversation.php
//			'cuar_project',  	 	// Customize display in file single-cuar_project.php
//			'cuar_tasklist',  	 	// Customize display in file single-cuar_tasklist.php
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
 * Load the style sheet from the parent theme.
 */
function cuar_enqueue_parent_theme_styles()
{

    // Enqueue the parent stylesheet
    wp_enqueue_style('twentytwelve-parent-style', get_template_directory_uri() . '/style.css', array(), '0.1', 'all');

    // Enqueue the parent rtl stylesheet
    if (is_rtl()) {
        wp_enqueue_style('twentytwelve-parent-style-rtl', get_template_directory_uri() . '/rtl.css', array(), '0.1', 'all');
    }

}

add_action('wp_enqueue_scripts', 'cuar_enqueue_parent_theme_styles');

/**
 * Add the full width body class to our private post types
 */
function cuar_body_class($classes)
{
    if ( !class_exists('CUAR_Plugin')) return $classes;

    if (function_exists('cuar_is_customer_area_page')
        && (cuar_is_customer_area_page(get_queried_object())
            || cuar_is_customer_area_private_content(get_the_ID()))
    ) {
        $classes[] = 'full-width';
    }

    return $classes;
}

add_filter('body_class', 'cuar_body_class');

/**
 * Adjust content width in certain contexts.
 *
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since Twenty Twelve 1.0
 */
function cuar_content_width()
{
    if (function_exists('cuar_is_customer_area_page')
        && (cuar_is_customer_area_page(get_queried_object())
            || cuar_is_customer_area_private_content(get_the_ID()))
    ) {
        global $content_width;
        $content_width = 960;
    }
}

add_action('template_redirect', 'cuar_content_width');

/**
 * Get the entry class for the main content block so the default .entry-content class does not override our styles
 */
function cuar_entry_class()
{
    if (function_exists('cuar_is_customer_area_page')
        && (cuar_is_customer_area_page(get_queried_object())
            || cuar_is_customer_area_private_content(get_the_ID()))
    ) {
        return 'wpca-content';
    }

    return 'entry-content';
}
