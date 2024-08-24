<?php
/**
 * File used to define the main plugin class.
 */

/**
 * WP Options Visualizer main class - used to initialize the plugin.
 */
class WP_Options_Visualizer {

    /**
     * Initialize the plugin.
     */
    public static function init() {
        // Add the admin menu.
        add_action('admin_menu', array( 'WP_Options_Visualizer_Admin', 'add_menu_page' ));
    }

    /**
     * Activate the plugin.
     */
    public static function activate() {
        // Activation tasks.
    }

    /**
     * Deactivate the plugin.
     */
    public static function deactivate() {
        // Deactivation tasks.
    }
}
