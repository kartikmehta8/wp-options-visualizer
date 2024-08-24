<?php
/**
 * Plugin Name: WP Options Visualizer
 * Description: A plugin to visualize, add, edit, and delete options from the wp-options table.
 * Version: 1.0
 * Author: Kartik Mehta
 * Author URI: https://mrmehta.in
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: captcha
 * Requires at least: 6.0
 * Requires PHP: 8.1.29
 */

// Exit if accessed directly.
if (! defined('ABSPATH')) {
    exit; 
}

// Autoload classes.
require_once plugin_dir_path(__FILE__) . 'includes/class-wp-options-visualizer-autoloader.php';
WP_Options_Visualizer_Autoloader::register();

// Activation, deactivation hooks.
register_activation_hook(__FILE__, array( 'WP_Options_Visualizer', 'activate' ));
register_deactivation_hook(__FILE__, array( 'WP_Options_Visualizer', 'deactivate' ));

// Initialize the plugin.
add_action('plugins_loaded', array( 'WP_Options_Visualizer', 'init' ));
