<div class="sidebar">
    <?php if (!dynamic_sidebar('primary-widget-area')) : ?>
        <div class="widget_area">
            <span class="widget_heading"><?php _e('Search:', 'butterbelly'); ?></span>
            <?php get_search_form(); ?>
            <span class="widget_heading">
                <?php _e('Categories', 'butterbelly'); ?>
            </span>
            <ul>
                <?php wp_list_categories('title_li'); ?>
            </ul>
            <span class="widget_heading">
                <?php _e('Archives', 'butterbelly'); ?>
            </span>
            <ul>
                <?php wp_get_archives('type=monthly'); ?>
            </ul> 	
        </div>
    <?php endif; ?>      
</div>