<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 */
get_header();
?>   
<div class="page_heading_container">
    <div class="container">
        <div class="row">
            <div class="colo-md-12">
                <div class="page_heading_content">
                    <h1><?php _e('This is somewhat embarrassing, isn&rsquo;t it?', 'butterbelly'); ?></h1>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="page-container">
    <div class="container">
        <div class="row">
            <div class="page-content">
                <div class="col-md-8">
                    <div class="content-bar">
                        <header class="entry-header">
                            <p class="error_pera">
                                <?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'butterbelly'); ?>
                            </p>            
                            <div class="error_list">
                                <?php the_widget('WP_Widget_Recent_Posts', array('number' => 10), array('widget_id' => '404')); ?>
                                <div class="widget">
                                    <h2 class="widgettitle">
                                        <?php _e('Most Used Categories', 'butterbelly'); ?>
                                    </h2>
                                    <ul class="error_list">
                                        <?php wp_list_categories(array('orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10)); ?>
                                    </ul>
                                </div>
                                <?php
                                /* translators: %1$s: smilie */
                                $archive_content = '<p>' . sprintf(__('Try looking in the monthly archives. %1$s', 'butterbelly'), convert_smilies(':)')) . '</p>';
                                the_widget('WP_Widget_Archives', array('count' => 0, 'dropdown' => 1), array('after_title' => '</h2>' . $archive_content));
                                ?>
                            </div>
                            <?php get_search_form(); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <!--Start Sidebar-->
                    <?php get_sidebar(); ?>
                    <!--End Sidebar-->
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div>
</div>
<?php get_footer(); ?>