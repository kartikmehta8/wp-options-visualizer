<?php
/**
 * Edit option form template - used to display the edit option form.
 */

// Ensure the $edit_option variable is set before accessing it.
if ( isset( $edit_option ) && $edit_option ) :
?>

<h2><?php esc_html_e( 'Edit Option', 'wp-options-visualizer' ); ?></h2>
<form method="post">
    <?php wp_nonce_field( 'wp_options_visualizer_edit_action', 'wp_options_visualizer_edit_nonce' ); ?>
    <input type="hidden" name="edit_option_name" value="<?php echo esc_attr( $edit_option->option_name ); ?>" />
    <table class="form-table">
        <tr>
            <th scope="row"><label for="edit_option_value"><?php esc_html_e( 'Option Value', 'wp-options-visualizer' ); ?></label></th>
            <td><textarea name="edit_option_value" id="edit_option_value" class="regular-text" required><?php echo esc_textarea( $edit_option->option_value ); ?></textarea></td>
        </tr>
        <tr>
            <th scope="row"><label for="edit_autoload"><?php esc_html_e( 'Autoload', 'wp-options-visualizer' ); ?></label></th>
            <td>
                <select name="edit_autoload" id="edit_autoload" required>
                    <option value="yes" <?php selected( $edit_option->autoload, 'yes' ); ?>><?php esc_html_e( 'Yes', 'wp-options-visualizer' ); ?></option>
                    <option value="no" <?php selected( $edit_option->autoload, 'no' ); ?>><?php esc_html_e( 'No', 'wp-options-visualizer' ); ?></option>
                </select>
            </td>
        </tr>
    </table>
    <p class="submit"><input type="submit" name="wp_options_visualizer_edit_submit" id="submit" class="button button-primary" value="<?php esc_attr_e( 'Update Option', 'wp-options-visualizer' ); ?>"></p>
</form>
<?php endif; ?>