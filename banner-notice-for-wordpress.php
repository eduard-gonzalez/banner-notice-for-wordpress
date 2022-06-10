<?php

/**
 * 
 *
 * @link              http://eduardogonzalez.me/
 * @since             1.0.0
 * @package           Banner_Notice_For_Wordpress
 *
 * @wordpress-plugin
 * Plugin Name:       Banner Notice for Wordpress
 * Plugin URI:        http://eduardogonzalez.me/
 * Description:       Allows you to set single  banner for a notice on the WooCommerce shop 
 * Version:           1.0.0
 * Author:            Efrain Gonzalez
 * Author URI:        http://eduardogonzalez.me/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       banner-notice-for-wordpress
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BANNER_NOTICE_FOR_WORDPRESS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-banner-notice-for-wordpress-activator.php
 */
function activate_banner_notice_for_wordpress() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-banner-notice-for-wordpress-activator.php';
	Banner_Notice_For_Wordpress_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-banner-notice-for-wordpress-deactivator.php
 */
function deactivate_banner_notice_for_wordpress() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-banner-notice-for-wordpress-deactivator.php';
	Banner_Notice_For_Wordpress_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_banner_notice_for_wordpress' );
register_deactivation_hook( __FILE__, 'deactivate_banner_notice_for_wordpress' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-banner-notice-for-wordpress.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_banner_notice_for_wordpress() {

	$plugin = new Banner_Notice_For_Wordpress();
	$plugin->run();

}
run_banner_notice_for_wordpress();
add_action('acf/init', 'my_acf_op_init');

if ( function_exists( 'acf_add_options_page' ) ) {

    // Add a top menu page
    acf_add_options_page(
        array(
            'page_title' => 'Banner para su sitio',
            'menu_title' => 'Banners de envio',
            'menu_slug'  => 'banner-notice',
            'redirect'   => false,
            'capability' => 'administrator',
            'position'   => 5.4
        )
    );
	
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-acf.php';

	add_action('wp_head', 'add_header_banner_notice_for_wordpress');
	function add_header_banner_notice_for_wordpress(){
      
            $post_id = "option";
            $select = get_field('tipo_de_banner', $post_id);
            $imagenes = get_field('imagenes', $post_id);
            $mobile = $imagenes['imagen_mobile'];
            $desktop = $imagenes['imagen_escritorio'];
            $texto = get_field('texto', $post_id);
			
            if (!is_page('carrito') && !is_page('finalizar-compra')) { ?>
				<style>
					header{padding-top:0px !important;}
					.responsive-img{
						width: 100%;
						margin: 0 auto;
						max-width:100%;
					}
					.text-responsive{ 
						align-items: center; 
						padding: 5px 20px;
					}
					.desktopimg{
						display: block;
						padding: 0px 0px;
						width: 100%;
						background: white;
					}
					.mobileimg{
						display: none;
						padding: 0px 0px;
						width: 100%;
						background: white;
					}
					@media (max-width: 998px) {
						.desktopimg{display: none !important;}
						.mobileimg{display: block !important;}
					}
				</style>
                <?php if ($select== 1) { ?>
				<div class="desktopimg">
					<img src="<?php echo $desktop ?>" class="responsive-img desktopimg" />
				</div>
				<div class="mobileimg">
					<img src="<?php echo $mobile ?>" class="responsive-img mobileimg" />
				</div>
				<?php } elseif ($select== 2) { ?>
				<div style="width: 100%;background: white;" class="responsive-img">
					<div class="text-responsive">
						<?php echo $texto;?>
					</div>
				</div>
				<?php } else {	/* Deactivated */
                }
				
            }
     
		
	};


}