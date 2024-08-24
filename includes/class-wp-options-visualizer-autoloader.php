<?php
/**
 * File used to define the WP Options Visualizer autoloader class.
 */

/**
 * Autoloader class - used to autoload classes.
 */
class WP_Options_Visualizer_Autoloader {

    /**
     * Register the autoloader.
     */
    public static function register() {
        spl_autoload_register(array( __CLASS__, 'autoload' ));
    }

    /**
     * Autoload the class.
     *
     * @param string $class_name The class name.
     */
    public static function autoload($class_name) {
        // If the class does not start with 'WP_Options_Visualizer', return.
        if (0 !== strpos($class_name, 'WP_Options_Visualizer')) {
            return;
        }

        // Convert the class name to lowercase and replace '_' with '-'.
        $class_name = str_replace('_', '-', strtolower($class_name));
        $file       = dirname(__FILE__) . '/class-' . $class_name . '.php';

        // If the file exists, require it.
        if (file_exists($file)) {
            require $file;
        }
    }
}
