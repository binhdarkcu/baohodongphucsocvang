<?php
/**
 * Template part for displaying page content in page.php
 * @package WordPress
 * @subpackage supermarket-ecommerce
 * @since 1.0
 * @version 0.1
 */
$baiviet = '/tin-tuc/';
$url = get_home_url();
$eto_options = get_option('eto_settings');
$sub_header_top_color = '#'.$eto_options['sub_header_top_color'];
?>

<div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_row-no-padding">
  <div class="wpb_column vc_column_container vc_col-sm-12">
    <div class="vc_column-inner">
      <div class="wpb_wrapper home-news-section">
        <div class="section section-list-categories taxonomy-product_cat">
          <div class="container">
            <div class="section-header" style="border-bottom: 3px solid <?php if (!empty($sub_header_top_color)) echo $sub_header_top_color ?>;">
              <div class="title-wrap">
                <h3 class="title"><a class="link" href="<?php echo $url.$baiviet; ?>" style="color: <?php if (!empty($sub_header_top_color)) echo $sub_header_top_color ?>">Tin tức</a></h3>
              </div>
              <div class="actions">
                <a class="link" href="<?php echo $url.$baiviet; ?>" style="color: <?php if (!empty($sub_header_top_color)) echo $sub_header_top_color ?>">Xem tất cả
                  <i class="fa fa-angle-right" aria-hidden="true"></i>
                </a>
              </div>
            </div>
            <div class="section-content bg-white">
              <div class="layout-grid grid-style-2 columns-1">
                <?php
                $args = array(
                  'post_type' => 'tin_tuc',
                  // 'orderby' => 'ID',
                  'post_status' => 'publish',
                  'order' => 'DESC',
                  'posts_per_page' => 4, // this will retrive all the post that is published
                );
                $result = new WP_Query($args);
                if ($result->have_posts()): ?>
                  <?php while ($result->have_posts()): $result->the_post();?>
                    <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) ); ?>
                      <div class="item" style="padding-bottom: 15px;">
                        <a href="<?php echo get_permalink( $post->ID ); ?>" class="item-link" title="<?php the_title(); ?>">
                          <?php
                            if ($url) {
                              ?> <img src="<?php echo $url ;?>" alt="<?php echo esc_html(the_title())?>" name="<?php echo esc_html(the_title())?>" class="image-news"/> <?php
                            } else {
                              ?> <img src="https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg" alt="no post" class="image-news" /> <?php
                            }
                          ?>
                        </a>
                          <div class="item-info item-news">
                            <h2 class="item-title tilte-news"><a href="<?php echo get_permalink( $post->ID ); ?>" class="item-link" title="<?php the_title(); ?>"><?php echo esc_html(the_title())?></a></h2>
                            <div class="item-date">Đăng: <?php echo get_the_date( 'd-m-Y' ); ?></div>
                            <h10 class="item-short-description">
                              <?php echo wp_trim_words(get_the_excerpt(), 20) ; ?>
                            </h10>
                            <a href="<?php echo get_permalink( $post->ID ); ?>" class="item-link" title="<?php the_title(); ?>"><span style="color: #ff541e; text-decoration: underline; padding-left: 10px; margin-top: 10px;float: left;">Xem chi tiết</span></a>
                          </div>
                          <div style="clear: both;"></div>
                      </div>
                  <?php endwhile;?>
                <?php endif;
                wp_reset_postdata();?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
