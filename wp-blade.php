<?php
/*
Plugin Name:  WP Blade
Description:  Bring the power of Laravel's Blade to your WordPress theme.
Plugin URI: http://tormorten.no
Author: Tor Morten Jensen
Author URI: http://tormorten.no
Version: 0.0.1
*/

define('WP_BLADE_PHP_VERSION', '5.4.0');
define('WP_BLADE_WP_VERSION', '4.5');

function wp_blade_requirements_met() {

	global $wp_version;

	if ( version_compare( PHP_VERSION, WP_BLADE_PHP_VERSION, '<' ) ) {
		return false;
	}
	if ( version_compare( $wp_version, WP_BLADE_WP_VERSION, '<' ) ) {
		return false;
	}
	return true;
}

if(wp_blade_requirements_met()) {

	/**
	 * Force the current theme to support blade
	 * @return void
	 */
	function wp_blade_add_blade_support() {
		add_theme_support( 'blade-templates' );
	}
	// add_action( 'after_setup_theme', 'wp_blade_add_blade_support' );

	/**
	 * Bootstrap if current theme supports blade templates
	 * @return void
	 */
	function wp_blade_require_blade_support() {
		require_if_theme_supports( 'blade-templates', trailingslashit( plugin_dir_path( __FILE__ ) ) . 'bootstrap.php' );
	}
	add_action( 'init', 'wp_blade_require_blade_support' );

} else {
	function wp_blade_requirements_error() {
		global $wp_version;
		?>
		<div class="error">
			<p><strong>WP Blade Error:</strong> Your environment doesn't meet all of the system requirements listed below.</p>

			<ul class="ul-disc">
				<li>
					<strong>PHP <?php echo WP_BLADE_PHP_VERSION ?>+</strong>
					<em>(You're running version <?php echo PHP_VERSION; ?>)</em>
				</li>

				<li>
					<strong>WordPress <?php echo WP_BLADE_WP_VERSION ?>+</strong>
					<em>(You're running version <?php echo esc_html( $wp_version ); ?>)</em>
				</li>

				<?php //<li><strong>Plugin XYZ</strong> activated</em></li> ?>
			</ul>

			<p>If you need to upgrade your version of PHP you can ask your hosting company for assistance, and if you need help upgrading WordPress you can refer to <a href="http://codex.wordpress.org/Upgrading_WordPress">the Codex</a>.</p>
		</div>
		<?php
	}
	add_action( 'admin_notices', 'wp_blade_requirements_error' );
}
