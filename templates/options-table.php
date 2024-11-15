<?php
/**
 * Options table template - used to display the options table.
 * 
 * @package SYO_Options_Visualizer
 */

?>

<h2><?php esc_html_e( 'Options Table', 'syo-options-visualizer' ); ?></h2>
<table class="widefat fixed" cellspacing="0">
	<thead>
		<tr>
			<th><?php esc_html_e( 'Option Name', 'syo-options-visualizer' ); ?></th>
			<th><?php esc_html_e( 'Option Value', 'syo-options-visualizer' ); ?></th>
			<th><?php esc_html_e( 'Autoload', 'syo-options-visualizer' ); ?></th>
			<th><?php esc_html_e( 'Actions', 'syo-options-visualizer' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php if ( ! empty( $options ) ) : ?>
			<?php foreach ( $options as $option ) : ?>
				<tr>
					<td><?php echo esc_html( $option->option_name ); ?></td>
					<td><?php echo esc_html( $option->option_value ); ?></td>
					<td><?php echo esc_html( $option->autoload ); ?></td>
					<td>
						<a href="
						<?php
						echo esc_url(
							add_query_arg(
								array(
									'delete_option' => $option->option_name,
									'syo_options_visualizer_delete_nonce' => wp_create_nonce( 'syo_options_visualizer_delete_action' ),
								)
							)
						);
						?>
							" class="button button-secondary"
							onclick="return confirm('<?php esc_html_e( 'Are you sure you want to delete this option?', 'syo-options-visualizer' ); ?>');"><?php esc_html_e( 'Delete', 'syo-options-visualizer' ); ?></a>
						<a href="<?php echo esc_url( add_query_arg( 'edit_option', $option->option_name ) ); ?>"
							class="button button-primary"><?php esc_html_e( 'Edit', 'syo-options-visualizer' ); ?></a>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php else : ?>
			<tr>
				<td colspan="4"><?php esc_html_e( 'No options found.', 'syo-options-visualizer' ); ?></td>
			</tr>
		<?php endif; ?>
	</tbody>
</table>
