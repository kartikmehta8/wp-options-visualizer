<?php
/**
 * Add option form template - used to display the add option form.
 * 
 * @package SYO_Options_Visualizer
 */

?>

<h2><?php esc_html_e( 'Add New Option', 'syo-options-visualizer' ); ?></h2>
<form method="post">
	<?php wp_nonce_field( 'syo_options_visualizer_action', 'syo_options_visualizer_nonce' ); ?>
	<table class="form-table">
		<tr>
			<th scope="row"><label for="option_name"><?php esc_html_e( 'Option Name', 'syo-options-visualizer' ); ?></label></th>
			<td><input name="option_name" type="text" id="option_name" value="" class="regular-text" required></td>
		</tr>
		<tr>
			<th scope="row"><label for="option_value"><?php esc_html_e( 'Option Value', 'syo-options-visualizer' ); ?></label></th>
			<td><textarea name="option_value" id="option_value" class="regular-text" required></textarea></td>
		</tr>
		<tr>
			<th scope="row"><label for="autoload"><?php esc_html_e( 'Autoload', 'syo-options-visualizer' ); ?></label></th>
			<td>
				<select name="autoload" id="autoload" required>
					<option value="yes"><?php esc_html_e( 'Yes', 'syo-options-visualizer' ); ?></option>
					<option value="no"><?php esc_html_e( 'No', 'syo-options-visualizer' ); ?></option>
				</select>
			</td>
		</tr>
	</table>
	<p class="submit"><input type="submit" name="syo_options_visualizer_submit" id="submit" class="button button-primary" value="<?php esc_attr_e( 'Add Option', 'syo-options-visualizer' ); ?>"></p>
</form>
