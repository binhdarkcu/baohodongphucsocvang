<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage ButterBelly
 * @since ButterBelly 1.0
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
                    <div class="content-bar single_post">
                        <!-- Start the Loop. -->
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <!--Start post-->
                                <div class="post single">
                                    <h1 class="post_title"><?php the_title(); ?></h1>
                                    <div class="post_content">                
                                        <ul class="post_meta">                 
                                            <li class="post_date"><span class="glyphicon glyphicon-calendar"></span>&nbsp;<span><?php _e('On', 'butterbelly'); ?></span>&nbsp;<?php echo get_the_time('M, d, Y') ?></li>
                                            <li class="posted_by"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php the_author_posts_link(); ?></li>
                                            <li class="post_category"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;<a href="#"><?php the_category(', '); ?></li>
                                        </ul>                                           
                                        <?php
                                        the_content();
                                        wp_link_pages(array(
                                            'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'butterbelly') . '</span>',
                                            'after' => '</div>',
                                            'link_before' => '<span>',
                                            'link_after' => '</span>',
                                        ));
                                        ?>
                                        <div class="clear"></div>
                                        <?php if (has_tag()) { ?>
                                            <div class="tag">
                                                <?php the_tags(__('Post Tagged with : ', 'butterbelly'), ', ', ''); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!--End post-->
                                <div class="clear"></div>
                                <nav id="nav-single"> <span class="nav-previous">
                                        <?php previous_post_link('%link', '<span class="meta-nav">&larr;</span> Previous Post '); ?>
                                    </span> <span class="nav-next">
                                        <?php next_post_link('%link', 'Next Post <span class="meta-nav">&rarr;</span>'); ?>
                                    </span> </nav>
                                <div class="clear"></div>
                                <?php
                            endwhile;
                        else:
                            ?>
                            <div class="post single">
                                <p>
                                    <?php _e('Sorry, no posts matched your criteria.', 'butterbelly'); ?>
                                </p>
                            </div>
                        <?php
                        endif;
                        ?>
                        <!--End post-->
                        <!--Start Comment box-->
                        <?php comments_template(); ?>
                        <!--End Comment box-->
                    </div>
                </div>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div>
</div>
<?php get_footer(); ?>