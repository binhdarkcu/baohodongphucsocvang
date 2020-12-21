<?php
/**
 * Template part for displaying page content in homepage.php
 * @package WordPress
 * @subpackage supermarket-ecommerce
 * @since 1.0
 * @version 0.1
 */

?>
<?php
  $sanPham = '/product-category/san-pham/';
  $url = get_home_url();
  $eto_options = get_option('eto_settings');
  $sub_header_top_color = '#'.$eto_options['sub_header_top_color'];
  $amount_product_home_new = $eto_options['amount_product_home_new'];
?>
<div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_row-no-padding">
  <div class="wpb_column vc_column_container vc_col-sm-12">
    <div class="vc_column-inner">
      <div class="wpb_wrapper">
        <div class="section section-list-categories taxonomy-product_cat">
          <div class="container">
            <div class="section-header" style="border-bottom: 3px solid <?php if (!empty($sub_header_top_color)) echo $sub_header_top_color ?>;">
              <div class="title-wrap">
                <h3 class="title">Sản phẩm mới</h3>
              </div>
              <div class="actions">
                <a class="link" href="<?php echo $url.$sanPham?>" style="color: <?php if (!empty($sub_header_top_color)) echo $sub_header_top_color ?>">Xem tất cả
                  <i class="fa fa-angle-right" aria-hidden="true"></i>
                </a>
              </div>
            </div>
            <div class="section-content bg-none list-posts-inner">
              <div class="layout-grid grid-style-1 columns-5 product-section">
                <?php
                $amountProduct = $amount_product_home_new;
                $args = array(
                  'category' => array( 'Sản phẩm' ),
                  'orderby'  => 'modified',
                  'order' => 'DESC',
                  'limit' => $amountProduct,
                );
                $products = wc_get_products( $args );
                $countProducts = count($products);
                if ($products) {
                  foreach ($products as $product) {
					  $image_id  = $product->get_image_id();
						  $image_url = wp_get_attachment_image_url( $image_id, 'thumbnail' );
                        ?>
                        <div class="post-item">
                          <div class="card full shadow">
                            <a style="color: black" class="menu-link-hover" href="<?php echo esc_url(get_permalink( $product->get_id() )); ?>">
                                <div class="cover-img">
                                  <div class="background">
                                        <img width="300" height="300" src="<?php echo $image_url;?>" alt="<?php echo $product->get_name();?>" name="<?php echo $product->get_name();?>"/>
                                  </div>
                                </div>
                                <div class="lower-padding item-padding-8">
                                  <div class="text-name">
                                    <h4 class="product-name">
                                      <?php echo wp_trim_words($product->get_name(), 10) ; ?>
                                  </h4>
                                  </div>
                                  <div class="price">
                                    <div class="original-price"><?php echo number_format($product->get_regular_price(), 0 , '.', '.'); ?>
                                      <span class="currency-symbol">₫</span>
                                    </div>
                                    <div class="price-gap">/</div>
                                    <div class="current-price"><?php echo number_format($product->get_price(), 0, '.', '.'); ?>
                                      <span class="currency-symbol">₫</span>
                                    </div>
                                    <div class="spacer"></div>
                                  </div>
                                  <div class="extra-badge-wrapper"></div>
                                  <div>
                                    <div class="section-actions">
                                      <div class="btn-likes">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        <div class="text"><?php echo get_comments_number($product->get_id())?></div>
                                      </div>
                                      <div class="btn-gap"></div>
                                      <div class="btn-comments">
                                        <div class="rating">
                                          <span class="rating-count"><?php if(get_comments_number($product->get_id()) == 0) {echo 'Chưa có đánh giá'; } else { echo get_comments_number($product->get_id()).' đánh giá';}?></span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </a>
                          </div>

                        </div>
                    <?php }
                  }?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
