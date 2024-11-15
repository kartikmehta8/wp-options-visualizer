<?php
/**
 * File used to define the SYO Options Visualizer autoloader class.
 * 
 * @package SYO_Options_Visualizer
 */

/**
 * Autoloader class - used to autoload classes.
 */
class SYO_Options_Visualizer_Autoloader {

	/**
	 * Register the autoloader.
	 */
	public static function register() {
		spl_autoload_register( array( __CLASS__, 'autoload' ) );
	}

	/**
	 * Autoload the class.
	 *
	 * @param string $class_name The class name.
	 */
	public static function autoload( $class_name ) {
		// If the class does not start with 'SYO_Options_Visualizer', return.
		if ( 0 !== strpos( $class_name, 'SYO_Options_Visualizer' ) ) {
			return;
		}

		// Convert the class name to lowercase and replace '_' with '-'.
		$class_name = str_replace( '_', '-', strtolower( $class_name ) );
		$file       = __DIR__ . '/class-' . $class_name . '.php';

		// If the file exists, require it.
		if ( file_exists( $file ) ) {
			require $file;
		}
	}
}
