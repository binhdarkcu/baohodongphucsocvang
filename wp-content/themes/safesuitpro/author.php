<?php
/**
 * The template for displaying Author pages.
 *
 */
get_header();
?>  
<div class="page_heading_container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page_heading_content">
                    <?php if (have_posts()) : the_post(); ?>
                        <h1><?php printf(__('Author Archives: %s', 'butterbelly'), "<span class='vcard'><a class='url fn n' href='" . get_author_posts_url(get_the_author_meta('ID')) . "' title='" . esc_attr(get_the_author()) . "' rel='me'>" . get_the_author() . "</a></span>"); ?></h1>
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
                                if (have_posts()) : the_post();
                                    // If a user has filled out their description, show a bio on their entries.
                                    if (get_the_author_meta('description')) :
                                        ?>
                                        <div id="entry-author-info">
                                            <div id="author-avatar"> <?php echo get_avatar(get_the_author_meta('user_email'), apply_filters('inkthemes_author_bio_avatar_size', 60)); ?> </div>
                                            <!-- #author-avatar -->
                                            <div id="author-description">
                                                <h2><?php printf(__('About: %s', 'butterbelly'), get_the_author()); ?></h2>
                                                <?php the_author_meta('description'); ?>
                                            </div>
                                            <!-- #author-description	-->
                                        </div>
                                        <!-- #entry-author-info -->
                                        <?php
                                    endif;
                                    rewind_posts();
                                    while (have_posts()) {
                                        the_post();
                                        get_template_part('templates/content');
                                    }
                                    ?>
                                    <div class="clear"></div>
                                    <?php
                                endif;
                                butterbelly_pagination();
                            endif;
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