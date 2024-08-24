<?php
/**
 * File used to define the WP Options Visualizer admin class.
 */

/**
 * WP Options Visualizer admin class - used to define the admin functionality.
 */
class WP_Options_Visualizer_Admin {

    /**
     * Add the admin menu page.
     */
    public static function add_menu_page() {
        // Add the admin menu page.
        add_options_page(
            __('WP Options Visualizer', 'wp-options-visualizer'),
            __('WP Options Visualizer', 'wp-options-visualizer'),
            'manage_options',
            'wp-options-visualizer',
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
        WP_Options_Visualizer_Handler::handle_form_submission();
        
        // Get the options and pagination data.
        $options = WP_Options_Visualizer_Handler::get_options();
        $pagination = WP_Options_Visualizer_Handler::get_pagination();
        $search_query = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : ''; 
    
        include plugin_dir_path( __FILE__ ) . '../templates/admin-page.php';
    
        // Check if an option is being edited.
        if ( isset( $_GET['edit_option'] ) ) {
            $edit_option_name = sanitize_text_field( $_GET['edit_option'] );
    
            $edit_option = WP_Options_Visualizer_Handler::get_option( $edit_option_name );
    
            // Display the edit option form.
            if ( $edit_option ) {
                include plugin_dir_path( __FILE__ ) . '../templates/edit-option-form.php';
            } else {
                echo '<p>' . esc_html__( 'No option found to edit.', 'wp-options-visualizer' ) . '</p>';
            }
        }
    }    
}
