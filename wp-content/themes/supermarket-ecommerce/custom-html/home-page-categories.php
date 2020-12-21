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
  $category = '/product-category/danh-muc/';
  $url = get_home_url();
  $eto_options = get_option('eto_settings');
  $sub_header_top_color = '#'.$eto_options['sub_header_top_color'];
?>
<div id="fixedMobile" data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_row-no-padding">
  <div class="wpb_column vc_column_container vc_col-sm-12">
    <div class="vc_column-inner">
      <div class="wpb_wrapper">
        <div class="section section-list-categories taxonomy-product_cat">
          <div class="container">
            <div class="section-content bg-white list-categories-inner">
              <div class="layout-grid grid-style-2 columns-8-5" id="categorySlider"  style="border-bottom: 3px solid <?php if (!empty($sub_header_top_color)) echo $sub_header_top_color ?>;">
                  <ul class="category-list-ul">
                    <?php
                    $args = array(
                        //'number'     => $number,
    //                    'orderby' => 'title',
    //                    'order' => 'ASC',
                        'hide_empty' => 0,
                        'parent' => 18,
                        'number' => 8,
                        //'include'    => $ids
                    );
                    $product_categories = get_terms('product_cat', $args);
                    $count = count($product_categories);
                    if ($count > 0) {
                        foreach ($product_categories as $product_category) {
                            $product_cat_id = $product_category->term_id;
                            $cat_link = get_category_link($product_cat_id);
							$limitTitle = 10;
							  if($iMobile == TRUE) {
								  $limitTitle = 5;
							  }
                            ?>
                            <li class="item">
                              <a href="<?php echo esc_url(get_term_link($product_category)); ?>" class="item-link" title="<?php echo $product_category->name?>">
                                <?php
                                      $thumbnail_id = get_term_meta( $product_category->term_id, 'thumbnail_id', true );
                                      if ($thumbnail_id == 0) {
                                        $image = 'wp-content/uploads/woocommerce-placeholder-300x300.png';
                                      } else {
                                        $image = wp_get_attachment_url( $thumbnail_id );
                                      }
                                ?>
                                <div class="item-info">
                                  <h2 class="item-title" style="background: url(<?php echo $image ?>) no-repeat left center; background-size: 16px;"><?php echo wp_trim_words($product_category->name, $limitTitle)?></h2>
                                </div>
                              </a>
                              <?php
                                if($product_category->count > 0) {
                                  $args1 = array(
                                    'parent' => $product_cat_id,
                                  );
                                  $sub_cats = get_terms('product_cat', $args1);
                                  $countProducts = count($sub_cats);
                                  if(count($sub_cats) > 0) {
                              ?>
                              <ul class="sub-menu" style="background-color: <?php if (!empty($header_top_color)) echo $header_top_color ?>">
                                <?php

                                  if ($sub_cats) {
                                    foreach ($sub_cats as $sub_cat) {
                                      $sub_cat_id = $sub_cat->term_id;
                                      $sub_cat_link = get_category_link($sub_cat_id);
                                      # code...
                                      ?>
                                <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat" style="background-color: <?php if (!empty($header_top_color)) echo $header_top_color ?>">
                                  <a href="<?php echo esc_url($sub_cat_link); ?>">
                                    <?php echo esc_html($sub_cat->name); ?>
                                  </a>
                                </li>
                                <?php }
                                  }
                                  ?>
                              </ul>

                            <?php } }?>
                          </li>
                        <?php }
                      }?>

                      <?php if($count > 10) {?>
                        <a href="javascript:void(0)" id="toggleDanhMuc" class="menu-danh-muc"></a>
                      <?php }?>
                    </ul>
              </div>

            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo TEMPLATE_PATH ?>/assets/js/slick.min.js"></script>

<script>
    jQuery(window).load(function() {
      console.log(jQuery(window).innerWidth())
      if(jQuery(window).innerWidth() > 767) {
        var headerH = jQuery('header').height();
        var bannerH = jQuery('.home-banners').outerHeight();
        var totalH = headerH + bannerH;
        jQuery(window).scroll(function(){
            if (jQuery(this).scrollTop() > totalH) {
                jQuery('#fixedMobile').addClass('fixed');
            } else {
                jQuery('#fixedMobile').removeClass('fixed');
            }
        });
      }
    })
</script>
