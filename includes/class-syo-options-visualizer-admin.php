<?php
/**
 * File used to define the SYO Options Visualizer Admin class.
 * 
 * @package SYO_Options_Visualizer
 */

/**
 * SYO Options Visualizer admin class - used to define the admin functionality.
 */
class SYO_Options_Visualizer_Admin {

	/**
	 * Add the admin menu page.
	 */
	public static function add_menu_page() {
		// Add the admin menu page.
		add_options_page(
			__( 'See Your Options', 'syo-options-visualizer' ),
			__( 'See Your Options', 'syo-options-visualizer' ),
			'manage_options',
			'syo-options-visualizer',
			array( __CLASS__, 'render_admin_page' )
		);
	}

	/**
	 * Render the admin page.
	 */
	public static function render_admin_page() {
		// Check if the current user has the required capability.
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
	
		// Handle form submission.
		SYO_Options_Visualizer_Handler::handle_form_submission();
		
		// Get the options and pagination data.
		$options      = SYO_Options_Visualizer_Handler::get_options();
		$pagination   = SYO_Options_Visualizer_Handler::get_pagination();
		$search_query = isset( $_GET['s'] ) ? sanitize_text_field( $_GET['s'] ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	
		include plugin_dir_path( __FILE__ ) . '../templates/admin-page.php';
	
		// Check if an option is being edited.
		if ( isset( $_GET['edit_option'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$edit_option_name = sanitize_text_field( $_GET['edit_option'] ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	
			$edit_option = SYO_Options_Visualizer_Handler::get_option( $edit_option_name );
	
			// Display the edit option form.
			if ( $edit_option ) {
				include plugin_dir_path( __FILE__ ) . '../templates/edit-option-form.php';
			} else {
				echo '<p>' . esc_html__( 'No option found to edit.', 'syo-options-visualizer' ) . '</p>';
			}
		}
	}
}
