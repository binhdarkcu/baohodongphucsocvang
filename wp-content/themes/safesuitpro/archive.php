<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 */
get_header();
?>   
<div class="page_heading_container">
    <div class="container">
        <div class="row">
            <div class="page_heading_content">
                <div class="col-md-12">
                    <h1 class="page_title single-heading">
                        <?php if (is_day()) : ?>
                            <?php printf(__('Daily Archives: %s', 'butterbelly'), get_the_date()); ?>
                        <?php elseif (is_month()) : ?>
                            <?php printf(__('Try looking in the monthly archives. %1$s', 'butterbelly'), get_the_date('F Y')); ?>
                        <?php elseif (is_year()) : ?>
                            <?php printf(YEARLY_ARCHIVES, get_the_date('Y')); ?>
                        <?php else : ?>
                            <?php echo __('Yearly Archives: %s', 'butterbelly'); ?>
                        <?php endif; ?>
                    </h1> 
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
                            if (have_posts()) : while (have_posts()) : the_post();
                                    get_template_part('templates/content');
                                    ?>
                                    <div class="clear"></div>
                                    <?php
                                endwhile;
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
<div class="clear"></div>
</div>
<?php get_footer(); ?>