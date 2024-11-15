<?php
/**
 * Admin page template - used to display the admin page.
 * 
 * @package SYO_Options_Visualizer
 */

?>

<div class="wrap">
	<h1><?php esc_html_e( 'See Your Options - Visualizer', 'syo-options-visualizer' ); ?></h1>

	<?php settings_errors(); ?>

	<?php require plugin_dir_path( __FILE__ ) . 'add-option-form.php'; ?>
	<?php require plugin_dir_path( __FILE__ ) . 'search-form.php'; ?>
	<?php require plugin_dir_path( __FILE__ ) . 'options-table.php'; ?>
	<?php require plugin_dir_path( __FILE__ ) . 'pagination.php'; ?>

	<?php 
	if ( isset( $_GET['edit_option'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		require_once plugin_dir_path( __FILE__ ) . 'edit-option-form.php';
	} 
	?>
</div>
