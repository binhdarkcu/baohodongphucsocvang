<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * 
 */
get_header();
?>  
<div class="page_heading_container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page_heading_content">
                    <h1><?php printf(__('Search Results for: %s', 'butterbelly'), '' . get_search_query() . ''); ?></h1>
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
                    <div class="content-bar blog">
                        <?php
                        if (have_posts()) : while (have_posts()) : the_post();
                                get_template_part('templates/content');
                                ?>
                                <div class="clear"></div>
                                <?php
                            endwhile;
                        else :
                            ?>
                            <article id="post-0" class="no-results not-found">
                                <header class="entry-header">
                                    <h1 class="entry-title">
                                        <?php _e('Nothing Found here', 'butterbelly'); ?>
                                    </h1>
                                </header>
                                <!-- .entry-header -->
                                <div class="entry-content">
                                    <p>
                                        <?php _e('Sorry, but nothing matched your search criteria. Please try again with some diffrent keyword', 'butterbelly'); ?>
                                    </p>
                                    <?php get_search_form(); ?>
                                </div>
                                <!-- .entry-content -->
                            </article>
                        <?php endif; ?>
                        <div class="clear"></div>
                        <?php butterbelly_pagination(); ?> 
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