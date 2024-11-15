<?php
/**
 * File used to define the SYO Options Visualizer handler class.
 * 
 * @package SYO_Options_Visualizer
 */

/**
 * SYO Options Visualizer handler class - used to handle form submissions and database operations.
 */
class SYO_Options_Visualizer_Handler {

	/**
	 * Handle form submission.
	 */
	public static function handle_form_submission() {
		// Add new option.
		if ( isset( $_POST['syo_options_visualizer_submit'] ) && check_admin_referer( 'syo_options_visualizer_action', 'syo_options_visualizer_nonce' ) ) {
			self::validate_and_sanitize_option();
		}

		// Delete option.
		if ( isset( $_GET['delete_option'] ) && check_admin_referer( 'syo_options_visualizer_delete_action', 'syo_options_visualizer_delete_nonce' ) ) {
			self::delete_option();
		}

		// Edit option.
		if ( isset( $_POST['syo_options_visualizer_edit_submit'] ) && check_admin_referer( 'syo_options_visualizer_edit_action', 'syo_options_visualizer_edit_nonce' ) ) {
			self::edit_option();
		}
	}

	/**
	 * Validate and sanitize the option data.
	 */
	private static function validate_and_sanitize_option() {
		// Validate and sanitize the option data.
        // phpcs:disable
		$option_name  = sanitize_text_field( $_POST['option_name'] );
		$option_value = sanitize_textarea_field( $_POST['option_value'] );
		$autoload     = sanitize_text_field( $_POST['autoload'] );
        // phpcs:enable

		// Check if the required fields are empty.
		if ( empty( $option_name ) || empty( $autoload ) ) {
			add_settings_error( 'syo_options_visualizer', 'invalid_option', __( 'All fields are required.', 'syo-options-visualizer' ), 'error' );
			return;
		}

		// Add the option to the database.
		add_option( $option_name, $option_value, '', (bool) $autoload );
		add_settings_error( 'syo_options_visualizer', 'option_added', __( 'Option added successfully.', 'syo-options-visualizer' ), 'updated' );
	}

	/**
	 * Delete the option.
	 */
	private static function delete_option() {
		// Delete the option.
		$option_name = sanitize_text_field( isset( $_GET['delete_option'] ) ? $_GET['delete_option'] : '' ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		// Check if the option exists.
		if ( ! get_option( $option_name ) ) {
			add_settings_error( 'syo_options_visualizer', 'invalid_option', __( 'Invalid option.', 'syo-options-visualizer' ), 'error' );
			return;
		}

		// Delete the option.
		delete_option( $option_name );
		add_settings_error( 'syo_options_visualizer', 'option_deleted', __( 'Option deleted successfully.', 'syo-options-visualizer' ), 'updated' );
	}

	/**
	 * Edit the option.
	 */
	private static function edit_option() {
		// Sanitize the option data.
        // phpcs:disable
		$option_name  = sanitize_text_field( $_POST['edit_option_name'] );
		$option_value = sanitize_textarea_field( $_POST['edit_option_value'] );
		$autoload     = sanitize_text_field( $_POST['edit_autoload'] ); 
        // phpcs:enable

		// Check if the required fields are empty.
		if ( empty( $option_name ) || empty( $autoload ) ) {
			add_settings_error( 'syo_options_visualizer', 'invalid_option', __( 'All fields are required.', 'syo-options-visualizer' ), 'error' );
			return;
		}

		// Check if the option exists.
		if ( ! get_option( $option_name ) ) {
			add_settings_error( 'syo_options_visualizer', 'invalid_option', __( 'Invalid option.', 'syo-options-visualizer' ), 'error' );
			return;
		}

		// Update the option.
		update_option( $option_name, $option_value );
		global $wpdb;

        // phpcs:disable
		$wpdb->update(
			$wpdb->options,
			array( 'autoload' => $autoload ),
			array( 'option_name' => $option_name )
		);
        // phpcs:enable

		add_settings_error( 'syo_options_visualizer', 'option_updated', __( 'Option updated successfully.', 'syo-options-visualizer' ), 'updated' );
	}

	/**
	 * Get the options from the database.
	 */
	public static function get_options() {
		global $wpdb;

		// Get the options from the database.
		$options_per_page = 10;
		$current_page     = isset( $_GET['paged'] ) ? intval( $_GET['paged'] ) : 1; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$offset           = ( $current_page - 1 ) * $options_per_page;
		$search_query     = isset( $_GET['s'] ) ? sanitize_text_field( $_GET['s'] ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		// Prepare the search query.
        // phpcs:disable
		$search_sql = $search_query ? $wpdb->prepare( 'WHERE option_name LIKE %s', '%' . $wpdb->esc_like( $search_query ) . '%' ) : '';

		// Get the options.
		$options = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT option_name, option_value, autoload FROM {$wpdb->options} $search_sql LIMIT %d OFFSET %d",
				$options_per_page,
				$offset
			)
		);
        // phpcs:enable

		return $options;
	}

	/**
	 * Get the pagination data.
	 */
	public static function get_pagination() {
		global $wpdb;

		// Get the pagination data.
        // phpcs:disable
		$options_per_page = 10;
		$search_query     = isset( $_GET['s'] ) ? sanitize_text_field( $_GET['s'] ) : '';
		$search_sql       = $search_query ? $wpdb->prepare( 'WHERE option_name LIKE %s', '%' . $wpdb->esc_like( $search_query ) . '%' ) : '';

		// Get the total number of options.
		$total_options = $wpdb->get_var( "SELECT COUNT(*) FROM {$wpdb->options} $search_sql" );
		$total_pages   = ceil( $total_options / $options_per_page );
        // phpcs:enable

		return array(
			'total_pages'  => $total_pages,
			'current_page' => isset( $_GET['paged'] ) ? intval( $_GET['paged'] ) : 1, // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		);
	}

	/**
	 * Get the option data.
	 * 
	 * @param string $option_name The option name.
	 * 
	 * @return object The option data.
	 */
	public static function get_option( $option_name ) {
		global $wpdb;
  
		// Get the option data.
        // phpcs:disable
		$edit_option = $wpdb->get_row(
			$wpdb->prepare(
				"SELECT option_name, option_value, autoload FROM {$wpdb->options} WHERE option_name = %s",
				$option_name
			)
		);
        // phpcs:enable
  
		return $edit_option;
	}
}
