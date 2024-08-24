<?php
/**
 * Options table template - used to display the options table.
 */
?>

<h2><?php esc_html_e('Options Table', 'wp-options-visualizer'); ?></h2>
<table class="widefat fixed" cellspacing="0">
    <thead><tr><th><?php esc_html_e('Option Name', 'wp-options-visualizer'); ?></th><th><?php esc_html_e('Option Value', 'wp-options-visualizer'); ?></th><th><?php esc_html_e('Autoload', 'wp-options-visualizer'); ?></th><th><?php esc_html_e('Actions', 'wp-options-visualizer'); ?></th></tr></thead>
    <tbody>
        <?php if (! empty($options)) : ?>
            <?php foreach ($options as $option) : ?>
                <tr>
                    <td><?php echo esc_html($option->option_name); ?></td>
                    <td><?php echo esc_html($option->option_value); ?></td>
                    <td><?php echo esc_html($option->autoload); ?></td>
                    <td>
                        <a href="<?php echo esc_url(add_query_arg(array( 'delete_option' => $option->option_name, 'wp_options_visualizer_delete_nonce' => wp_create_nonce('wp_options_visualizer_delete_action') ))); ?>" class="button button-secondary" onclick="return confirm('<?php esc_html_e('Are you sure you want to delete this option?', 'wp-options-visualizer'); ?>');"><?php esc_html_e('Delete', 'wp-options-visualizer'); ?></a>
                        <a href="<?php echo esc_url(add_query_arg('edit_option', $option->option_name)); ?>" class="button button-primary"><?php esc_html_e('Edit', 'wp-options-visualizer'); ?></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr><td colspan="4"><?php esc_html_e('No options found.', 'wp-options-visualizer'); ?></td></tr>
        <?php endif; ?>
    </tbody>
</table>
