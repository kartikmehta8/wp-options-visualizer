<?php
/**
 * Search form template - used to display the search form.
 * 
 * @package SYO_Options_Visualizer
 */

?>

<h2><?php esc_html_e( 'Search Options', 'syo-options-visualizer' ); ?></h2>
<form method="get">
	<input type="hidden" name="page" value="syo-options-visualizer" />
	<input type="text" name="s" value="<?php echo esc_attr( $search_query ); ?>" placeholder="<?php esc_attr_e( 'Search options...', 'syo-options-visualizer' ); ?>" />
	<input type="submit" value="<?php esc_attr_e( 'Search', 'syo-options-visualizer' ); ?>" class="button" />
</form>
