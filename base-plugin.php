<?php

use BasePlugin\BasePlugin;

/**
 *
 * Plugin Name:       Base Filter
 * Plugin URI:        https://premmerce.com
 * Description:       1 base plugin for wordpress
 * Version:           1.0
 * Author:            Sentius Dev Team
 * Author URI:        https://premmerce.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       base-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

call_user_func( function () {

    $libraries = require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

	$main = new BasePlugin( __FILE__ );

	register_activation_hook( __FILE__, [ $main, 'activate' ] );

	register_deactivation_hook( __FILE__, [ $main, 'deactivate' ] );

	register_uninstall_hook( __FILE__, [ BasePlugin::class, 'uninstall' ] );

	$main->run( $libraries );
} );