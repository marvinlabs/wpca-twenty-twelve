![TwentyTwelve+ theme art](https://raw.githubusercontent.com/marvinlabs/wpca-twenty-twelve/master/screenshot.png)

A Twenty-Twelve child theme optimized for the [WP Customer Area](http://wp-customerarea.com) plugin suite.

The 2012 theme for WordPress is a fully responsive theme that looks great on any device. Features include a front page
template with its own widgets, an optional display font, styling for post formats on both index and single views, and
an optional no-sidebar page template. Make it yours with a custom menu, header image, and background.

Additionally, this theme is a great source of inspiration for theme developers who would like to offer better support 
for WP Customer Area in their themes.

## Setting up the theme for use with WP Customer Area

Once WP Customer Area is installed and setup, you will need to change the page template associated to the pages created 
by the plugin.

- Open `Pages` 
- Select all pages from WP Customer Area (Dashboard, My Files, etc.)
- In the bulk actions, select `Edit` and submit
- Change the page template to `WP Customer Area Page Template`
- Save changes

After that, all pages for WP Customer Area should be shown using the full width, without any default sidebar.

## Developer hints

### Navigation menu 

Have a look at how we include the main WP Customer Area menu so that it always appear at the same place in the theme:

- Declare a theme support for that menu (`functions.php`)
- Output the menu only on the WP Customer Area pages (`header.php`)

### Single content templates

Notice how we have copied `page.php` and created `single-cuar_*.php` templates so that our private content shows up 
using the page template rather than the post template.

Currently, WP Customer Area offers 6 custom post types for private content (including add-ons).