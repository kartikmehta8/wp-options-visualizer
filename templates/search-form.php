<?php
/**
 * Search form template - used to display the search form.
 */
?>

<h2><?php esc_html_e('Search Options', 'wp-options-visualizer'); ?></h2>
<form method="get">
    <input type="hidden" name="page" value="wp-options-visualizer" />
    <input type="text" name="s" value="<?php echo esc_attr($search_query); ?>" placeholder="<?php esc_attr_e('Search options...', 'wp-options-visualizer'); ?>" />
    <input type="submit" value="<?php esc_attr_e('Search', 'wp-options-visualizer'); ?>" class="button" />
</form>
