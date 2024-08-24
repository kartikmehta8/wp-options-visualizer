<?php
/**
 * Pagination template - used to display the pagination links.
 */
?>

<?php if ($pagination['total_pages'] > 1) : ?>
    <div class="tablenav"><div class="tablenav-pages">
        <?php if ($pagination['current_page'] > 1) : ?>
            <a class="button" href="<?php echo esc_url(add_query_arg(array( 'paged' => $pagination['current_page'] - 1, 's' => $search_query ))); ?>">&laquo; <?php esc_html_e('Previous', 'wp-options-visualizer'); ?></a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $pagination['total_pages']; $i++) : ?>
            <?php if ($i == $pagination['current_page']) : ?>
                <span class="button disabled"><?php echo esc_html($i); ?></span>
            <?php else : ?>
                <a class="button" href="<?php echo esc_url(add_query_arg(array( 'paged' => $i, 's' => $search_query ))); ?>"><?php echo esc_html($i); ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($pagination['current_page'] < $pagination['total_pages']) : ?>
            <a class="button" href="<?php echo esc_url(add_query_arg(array( 'paged' => $pagination['current_page'] + 1, 's' => $search_query ))); ?>"><?php esc_html_e('Next', 'wp-options-visualizer'); ?> &raquo;</a>
        <?php endif; ?>
    </div></div>
<?php endif; ?>
