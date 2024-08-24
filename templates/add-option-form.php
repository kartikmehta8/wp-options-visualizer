<?php
/**
 * Add option form template - used to display the add option form.
 */
?>

<h2><?php esc_html_e('Add New Option', 'wp-options-visualizer'); ?></h2>
<form method="post">
    <?php wp_nonce_field('wp_options_visualizer_action', 'wp_options_visualizer_nonce'); ?>
    <table class="form-table">
        <tr>
            <th scope="row"><label for="option_name"><?php esc_html_e('Option Name', 'wp-options-visualizer'); ?></label></th>
            <td><input name="option_name" type="text" id="option_name" value="" class="regular-text" required></td>
        </tr>
        <tr>
            <th scope="row"><label for="option_value"><?php esc_html_e('Option Value', 'wp-options-visualizer'); ?></label></th>
            <td><textarea name="option_value" id="option_value" class="regular-text" required></textarea></td>
        </tr>
        <tr>
            <th scope="row"><label for="autoload"><?php esc_html_e('Autoload', 'wp-options-visualizer'); ?></label></th>
            <td>
                <select name="autoload" id="autoload" required>
                    <option value="yes"><?php esc_html_e('Yes', 'wp-options-visualizer'); ?></option>
                    <option value="no"><?php esc_html_e('No', 'wp-options-visualizer'); ?></option>
                </select>
            </td>
        </tr>
    </table>
    <p class="submit"><input type="submit" name="wp_options_visualizer_submit" id="submit" class="button button-primary" value="<?php esc_attr_e('Add Option', 'wp-options-visualizer'); ?>"></p>
</form>
