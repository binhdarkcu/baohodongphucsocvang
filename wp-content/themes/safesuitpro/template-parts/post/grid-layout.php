<?php
/**
 * Template part for displaying posts
 * @package WordPress
 * @subpackage supermarket-ecommerce
 * @since 1.0
 * @version 1.4
 */
?>

<div class="item" style="padding-bottom: 15px;">
	<a href="<?php echo esc_url( get_permalink() );?>" class="item-link new-item" title="<?php the_title(); ?>"><?php echo the_post_thumbnail() ;?></a>
  <div class="item-info item-news">
	<h2 class="item-title tilte-news"><a href="<?php echo esc_url( get_permalink() );?>" class="item-link new-item" title="<?php the_title(); ?>"><?php echo esc_html(the_title())?></a></h2>
	<div class="item-date">Đăng: <?php echo get_the_date( 'd-m-Y' ); ?></div>
	<h10 class="item-short-description"><?php echo wp_trim_words(get_the_excerpt(), 20) ; ?></h10>
	<a href="<?php echo esc_url( get_permalink() );?>" class="item-link new-item" title="<?php the_title(); ?>"><span style="color: #ff541e; text-decoration: underline; padding-left: 10px; margin-top: 10px;float: left;">Xem chi tiết</span></a>
  </div>
  <div style="clear: both;"></div>
</div>
