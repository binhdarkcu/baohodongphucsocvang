<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
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
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="page-container">
    <div class="container">
        <div class="row">
            <div class="page-content">
                <div class="col-md-8">
                    <div class="content-bar">
                        <h1 class="page_title"><?php the_title(); ?></h1>
                        <?php
                        if (have_posts()) : the_post();
                            the_content();
                            wp_link_pages(array(
                                'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'butterbelly') . '</span>',
                                'after' => '</div>',
                                'link_before' => '<span>',
                                'link_after' => '</span>',
                            ));
                        endif;
                        comments_template();
                        ?>	
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