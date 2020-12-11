<?php
/**
 * Template part for displaying  Single Posts
 * @package WordPress
 * @subpackage supermarket-ecommerce
 * @since 1.0
 * @version 1.4
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="single-post">
    <div class="article_content">
      <div class="article-text">
        <div class="metabox1" style="margin-bottom: 15px;"> 
          <span class="entry-author"><i class="fa fa-user" style="margin-right: 5px;"></i><?php the_author(); ?></span>
          <span class="entry-date"><i class="fa fa-calendar-alt" style="margin-right: 5px;"></i><?php the_time( get_option( 'date_format' ) ); ?></span>
          <span class="entry-comments"><i class="fa fa-comments" style="margin-right: 5px;"></i><?php comments_number( __('0 Comments','supermarket-ecommerce'), __('0 Comments','supermarket-ecommerce'), __('% Comments','supermarket-ecommerce') ); ?></span>
        </div>
        <div class="content-single-post"><?php the_content(); ?></div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>