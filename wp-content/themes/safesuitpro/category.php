<?php
/**
 * The template for displaying Category pages.
 *
 */
get_header();
?>  
<div class="page_heading_container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">                 
                <div class="page_heading_content">
                    <h1><?php printf(__('Category Archives: %s', 'butterbelly'), '' . single_cat_title('', false) . ''); ?></h1>
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
                            if (have_posts()): while (have_posts()): the_post();
                                    get_template_part('templates/content');
                                endwhile;
                            endif;
                            ?>
                            <div class="clear"></div>
                            <?php
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
<div class="clear"></div>
</div>
<?php get_footer(); ?>