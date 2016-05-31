# How to move the WP Customer Area navigation menu

## PHP code to show the navigation menu 

```php
/**
 * HACKED MENU !
 * -------------
 * This hack allow you to display the WPCA menu outside of our main container.
 * We call this a hacked menu because of a CSS overflow issue : See styles.css for more information.
 * ---
 * You will not be able to display the menu outside of our main container without using the hack in styles.css
 * ---
 * Turn off customer-area.navigation-menu theme_support in functions.php if you experience any issue with the menu,
 * or if you want it back to the original location.
 */
if ( ( cuar_is_customer_area_page( get_queried_object_id() )
        || cuar_is_customer_area_private_content( get_queried_object_id() ) ) && current_theme_supports( 'customer-area.navigation-menu' ) ) {
    cuar_the_customer_area_menu(true, 'cuar-css-wrapper cuar-menu-overflow-fix');
}
```

## Provide a custom NavWalker

The NavWalker code is provided in the includes folder from this theme.

```php
/**
 * This is how you would provide your own nav menu walker to change the navigation menu's markup (here, we'd use a
 * class to output bootstrap-friendly markup).
 *
 * Note that this only changes how the menu items are output. To change the wrapping of the menu itself, please
 * override the template "customer-pages-navigation-menu.template.php"
 */
function cuar_theme_custom_nav_walker($args)
{
    require_once('includes/cuar_bootstrap_navwalker.php');

    $args['depth'] = 2;
    $args['container'] = 'div';
    $args['container_class'] = 'collapse navbar-collapse nav-container';
    $args['menu_class'] = 'nav navbar-nav';
    $args['fallback_cb'] = 'wp_bootstrap_navwalker::fallback';
    $args['walker'] = new CUAR_BootstrapNavWalker();

    return $args;
}

add_filter('cuar/core/page/nav-menu-args', 'cuar_theme_custom_nav_walker');
```


## Add corresponding theme support

```php
/**
 * Declare the features that are supported by your theme
 */
function cuar_theme_declare_supported_features()
{
    //-------------------------------------------------------------------------------------------------------------
    // Tells Customer Area that this theme is already outputting the Customer Area navigation menu somewhere (will
    // hide automatic navigation menu printing settings from the plugin options page)
    //--
    add_theme_support('customer-area.navigation-menu');
}
add_action('after_setup_theme', 'cuar_theme_declare_supported_features');
```

## CSS fixes 

Only needed if you do not have a full CSS stylesheet for the menu and wish to use the one from our skins.

```css
/*
 MENU HACK to output the WPCA menu outside of the main WPCA container
 We simply can't use both overflow-x and overflow-y on a same wrapper
 See : http://stackoverflow.com/questions/6421966/css-overflow-x-visible-and-overflow-y-hidden-causing-scrollbar-issue
 For this solution to work properly, we need to make sure that the parent div is position: relative;
 ----------------
 If you experience any issue with the menu positioning, you should turn off the feature that allow you to move the
 menu outside our container. To do that, comment in functions.php the line :
 add_theme_support('customer-area.navigation-menu');
*/
#main {
    position: relative;
}
#main > .cuar-css-wrapper.cuar-menu-overflow-fix {
    position: absolute;
    z-index: initial;
    width: 100%;
    height: 100%;
    overflow-x: hidden !important;
    background: none;
    border: none;
}
#main > .cuar-css-wrapper.cuar-menu-overflow-fix + #primary {
    z-index: 2;
    position: relative;
    top: 50px;
}
#main > .cuar-css-wrapper.cuar-menu-overflow-fix .navbar-collapse.collapse.in {
    z-index: 1000;
    position: relative;
}
/*
 ----------------
 MENU HACK : End
*/
```