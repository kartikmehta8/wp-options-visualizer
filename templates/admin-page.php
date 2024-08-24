<?php
/**
 * Admin page template - used to display the admin page.
 */
?>

<div class="wrap">
    <h1><?php esc_html_e('WP Options Visualizer', 'wp-options-visualizer'); ?></h1>

    <?php settings_errors(); ?>

    <?php include plugin_dir_path(__FILE__) . 'add-option-form.php'; ?>
    <?php include plugin_dir_path(__FILE__) . 'search-form.php'; ?>
    <?php include plugin_dir_path(__FILE__) . 'options-table.php'; ?>
    <?php include plugin_dir_path(__FILE__) . 'pagination.php'; ?>

    <?php if (isset($_GET['edit_option'])) {
        require_once plugin_dir_path(__FILE__) . 'edit-option-form.php';
    } ?>
</div>
