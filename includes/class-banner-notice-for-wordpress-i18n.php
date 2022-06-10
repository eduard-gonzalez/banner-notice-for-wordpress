<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://eduardogonzalez.me/
 * @since      1.0.0
 *
 * @package    Banner_Notice_For_Wordpress
 * @subpackage Banner_Notice_For_Wordpress/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Banner_Notice_For_Wordpress
 * @subpackage Banner_Notice_For_Wordpress/includes
 * @author     Efrain Gonzalez <elandaverdeg@gmail.com>
 */
class Banner_Notice_For_Wordpress_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'banner-notice-for-wordpress',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
