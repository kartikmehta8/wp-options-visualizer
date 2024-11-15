<?php
/**
 * Plugin Name: See Your Options - Visualizer
 * Description: A plugin to visualize, add, edit, and delete options from the wp-options table.
 * Version: 1.0.0
 * Author: Kartik Mehta
 * Author URI: https://mrmehta.in
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: syo-options-visualizer
 * Requires at least: 6.0
 * Requires PHP: 8.1.29
 * 
 * @package SYO_Options_Visualizer
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Autoload classes.
require_once plugin_dir_path( __FILE__ ) . 'includes/class-syo-options-visualizer-autoloader.php';
SYO_Options_Visualizer_Autoloader::register();

// Activation, deactivation hooks.
register_activation_hook( __FILE__, array( 'SYO_Options_Visualizer', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'SYO_Options_Visualizer', 'deactivate' ) );

// Initialize the plugin.
add_action( 'plugins_loaded', array( 'SYO_Options_Visualizer', 'init' ) );
