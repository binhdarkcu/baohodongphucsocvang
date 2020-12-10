<?php
/*
  Template Name: Fullwidth Page
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
            <div class="col-md-12">
                <div class="page-content">
                    <div class="fullwidth">
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
                        ?>	  
                    </div> 
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="clear"></div>
</div>
<?php get_footer(); ?>