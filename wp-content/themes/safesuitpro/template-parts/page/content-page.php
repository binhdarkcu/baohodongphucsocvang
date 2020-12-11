<?php
/**
 * Template part for displaying page content in page.php
 * @package WordPress
 * @subpackage supermarket-ecommerce
 * @since 1.0
 * @version 0.1
 */

?>

<article id="post-<?php the_ID();?>" <?php post_class();?>>
	<?php if (!is_front_page() ) {?>
	<header class="entry-header">
		<?php the_title('<h1 class="entry-title">', '</h1>');?>
		<?php supermarket_ecommerce_edit_link(get_the_ID());?>
	</header>
  <?php } ?>
	<div class="entry-content">
		<?php if (is_front_page()) {?>
      <?php get_template_part( 'custom-html/home', 'page' ); ?>
    <?php } else {
      the_post_thumbnail();
    ?>
		<p><?php the_content(); ?></p>
    <?php
    }
      wp_link_pages(
        array(
              'before' => '<div class="page-links">' . __('Pages:', 'supermarket-ecommerce'),
              'after' => '</div>',
        )
      );
    ?>
	</div>
</article>
