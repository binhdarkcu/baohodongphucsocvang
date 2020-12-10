<?php
/*
  Template Name: Blog Page
 */
get_header();
?>
<div class="page_heading_container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page_heading_content">
                    <?php butterbelly_breadcrumbs(); ?>
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
                    <div class="row">
                        <div class="content-bar blog">   
                            <?php
                            $limit = get_option('posts_per_page');
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = array(
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'paged' => $paged,
                                'posts_per_page' => $limit
                            );
                            $wp_query = new WP_Query($args);
                            if ($wp_query->have_posts()):while ($wp_query->have_posts()): $wp_query->the_post();
                                    get_template_part('templates/content');
                                endwhile;
                            else:
                                ?>
                                <div class="post">
                                    <p>
                                        <?php _e('Sorry, no posts matched your criteria.', 'butterbelly'); ?>
                                    </p>
                                </div>
                            <?php
                            endif;
                            butterbelly_pagination();
                            ?> 
                        </div>
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
</div>
<?php get_footer(); ?>