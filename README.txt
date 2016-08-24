=== WP Blade ===
Contributors: tormorten
Donate link: http://tormorten.no/
Tags: blade, laravel, templates, themes
Requires at least: 4.4
Tested up to: 4.6
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

WP Blade brings the beloved Blade template engine to your WordPress-theme.

== Description ==

Blade is a much simpler template language than vanilla PHP, and compiles down to readable PHP.

The plugin is intended for WordPress theme-developers that want to write a different flavor of template languages.

Read more about Blade in the [Laravel documentation](https://laravel.com/docs/5.2/blade).

For documentation and tips on how to get started using Blade in WordPress, please [check the docs](http://blade.tormorten.no/).

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/wp-blade` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Create a views-folder in your theme e.g. `wp-content/themes/my-theme/views`
4. Add theme support for blade templates by adding `add_theme_support('blade-templates')` within your `after_setup_theme` hook (probably located in your functions.php).
5. Start creating amazing themes!

