<?php
/**
 * The header for our theme
 *
 * @package WordPress
 * @subpackage supermarket-ecommerce
 * @since 1.0
 * @version 0.1
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">

<?php
  $eto_options = get_option('eto_settings');
  $bg_color = '#'.$eto_options['color_of_page'];
  $header_top_color = '#'.$eto_options['header_top_color'];
  $sub_header_top_color = '#'.$eto_options['sub_header_top_color'];
  $logo_header = eto_get_image('logo_header');
?>
<head>
	<meta name="google-site-verification" content="RGyGUCc51dk3blNo1ZEHWFVjwLtUC-HrFKv0Y0kL_rE" />
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-164213081-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-164213081-1');
</script>

	<meta name = "yandex-verify" content = "f10d6bedcdf4827b" />
	<meta name="msvalidate.01" content="8AF83111CEFCDF39D587D3DAFC632515" />
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="shortcut icon" href="<?php echo TEMPLATE_PATH ?>/assets/images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?php echo TEMPLATE_PATH ?>/assets/images/favicon.ico" type="image/x-icon">

  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'supermarket-ecommerce' ) ); ?>">

  <?php wp_head(); ?>

  <style>
    ::selection {
      background: <?php echo $sub_header_top_color ?> !important;
      color: #fff;
    }
    #menu-item-151:hover,
    #menu-item-151:active,
    .social-icons i:hover {
      background: <?php echo $sub_header_top_color ?> !important;
      color: #fff;
    }
	.header-search .dgwt-wcas-search-wrapp .dgwt-wcas-search-form .dgwt-wcas-search-submit, .header-search .dgwt-wcas-search-wrapp .dgwt-wcas-search-form button[type=submit] {
		background: url(<?php echo TEMPLATE_PATH;?>/assets/images/search.png) no-repeat center <?= $header_top_color;?>!important;
	}
	.toggleSupport{
		color: <?= $header_top_color;?> !important;
	}
    .price-gap {
        width: 8px;
        position: relative;
        top: -6px;
        margin-left: 5px;
    }
    .section .section-header {
        width: 100%;
    }
	.zoomWindowContainer >div {
		cursor: zoom-in!important;
	}
  </style>

</head>
<?php
$getQuery = get_queried_object();
$slugName = $getQuery -> name;

?>
<body <?php body_class(); ?> style="background-color: <?php if (!empty($bg_color)) echo $bg_color ?>">

  <div id="page" class="site <?php echo $slugName; ?>">
    <header class="header-wrapper">
      <div class="header-top color-<?php echo $header_top_color ?>" style="background-color: <?php if (!empty($header_top_color)) echo $header_top_color ?>">
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand d-block d-md-none mr-auto" href="<?php echo HOME_URL;?>">
              <img src="<?php echo $logo_header; ?>" width="72" class="logo-header-desktop"
                    alt="Đồng phục sóc vàng" data-no-lazy="1"> </a>
            <div class="profile-top order-lg-last">
              <div class="dropdown">
                <?php if(class_exists('woocommerce')){ ?>
                <!--Check loggedin or not-->
                <a class="profile-url" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>">
                  <div class="avatar-border">
                    <img class="avatar user-avatar ls-is-cached lazyloaded" src="<?php echo eto_get_image('no_avatar'); ?>"
                      data-src="<?php echo $eto_options['no_avatar']; ?>" alt="Guest">
                  </div>
                  <?php if ( is_user_logged_in() ) { ?>
                  <span>
                    <?php esc_html_e('Tài khoản của tôi','supermarket-ecommerce'); ?>
                  </span>
                  <?php }
							   else { ?>
                  <span>
                    <?php esc_html_e('Đăng nhập - Đăng ký','supermarket-ecommerce'); ?>
                  </span>
                  <?php } ?>
                </a>
                <?php }?>

              </div>
            </div>
            <div class="frnavbar frnavbar-collapse" id="topmenu">
              <ul class="navbar-nav has-separator mr-auto">
                <li class="menu-item social-top">
                  <span class="label">Kết nối</span>
                  <a href="<?php echo $eto_options['url_facebook']; ?>" target="_blank">
                    <i class="fa fa-facebook-official" aria-hidden="true"></i>
                  </a>
                  <a href="<?php echo $eto_options['url_youtube']; ?>" target="_blank">
                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                  </a>
                  <a href="<?php echo $eto_options['url_google']; ?>" target="_blank">
                    <i class="fa fa-google-plus-official" aria-hidden="true"></i>
                  </a>
                </li>
              </ul>
              <ul class="navbar-nav navbar-support-top">
                <li class="menu-item">
                  <a href="<?php echo HOME_URL?>/ho-tro">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i> Trợ giúp</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
      <div class="header-main color-<?php echo $sub_header_top_color ?>" style="background-color: <?php if (!empty($sub_header_top_color)) echo $sub_header_top_color ?>">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-2 d-none d-md-block">
              <div class="header-logo">
                <h1 class="headline"><?php echo SLOGAN?></h1>
                <a href="<?php echo HOME_URL;?>" title="Đồng phục sóc vàng">
                  <img src="<?php echo $logo_header; ?>" width="72" class="logo-header-desktop"
                    alt="Đồng phục sóc vàng" data-no-lazy="1"> </a>
              </div>
            </div>
            <div class="col-10 col-sm-10 col-md-10 col-lg-8">
              <div class="header-search">
                <div class="dgwt-wcas-search-wrapp dgwt-wcas-is-detail-box woocommerce dgwt-wcas-has-submit" data-wcas-context="7c8b">
                  <form class="dgwt-wcas-search-form" role="search" action="<?php echo HOME_URL; ?>" method="get">
                    <div class="dgwt-wcas-sf-wrapp">
                      <label class="screen-reader-text">Products search</label>

                      <?php get_product_search_form()?>

                      <div class="dgwt-wcas-preloader" style="right: 80px;">
                      </div>
                      <input type="hidden" name="post_type" value="product">
                      <input type="hidden" name="dgwt_wcas" value="1">
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-2 col-sm-2 col-md-2 col-lg-2">
              <div class="header-cart">
                <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" class="cart-btn" id="cart-mini-btn">
                  <i class="fa fa-shopping-basket icon-font" aria-hidden="true"> Giỏ hàng </i>
                  <span class="number-badge" style="color: <?php if (!empty($sub_header_top_color)) echo $sub_header_top_color ?>; border-color: <?php if (!empty($sub_header_top_color)) echo $sub_header_top_color ?>;">
                    <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?>
                  </span>
                </a>
                <div class="cart-popup">
                  <div id="mini-cart-box">
                    <div class="cart-mini-container">
                      <?php woocommerce_mini_cart(); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="menu-container" style="background-color: <?php if (!empty($header_top_color)) echo $header_top_color ?>">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-lg-12 ">
              <div class="menu">
                <ul>
                  <li class="hot-tag">
                    <a href="<?php echo HOME_URL; ?>">Trang chủ</a>
                  </li>
                  <li class="hot-tag">
                    <a href="<?php echo HOME_URL; ?>/about">Giới thiệu</a>
                  </li>
                  <li class="hot-tag menu-item menu-item-has-children">
                      <a id="danh-muc-link" href="javascript:void(0)">Sản phẩm</a>
                      <ul id="horizontal-menu" class="sub-menu" style="border-top: 1px solid #ccc;background-color: <?php if (!empty($header_top_color)) echo $header_top_color ?>">
                        <?php
                         $args = array(
                             //'number'     => $number,
                            //  'orderby' => 'title',
                            //  'order' => 'ASC',
                             'hide_empty' => 0,
                             'parent' => 18,
                             //'include'    => $ids
                         );
                         $product_categories = get_terms('product_cat', $args);
                         $count = count($product_categories);
                         if ($count > 0) {
                           foreach ($product_categories as $product_category) {
                             $product_cat_id = $product_category->term_id;
                             $cat_link = get_category_link($product_cat_id);
                       ?>
                        <li style="background-color: <?php if (!empty($header_top_color)) echo $header_top_color ?>">
                          <a class="link-title" href="<?php echo $cat_link;?>">
                            <span><?php echo esc_html($product_category->name); ?><//span/>
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

                        <?php
                           }
                         }
                       ?>
                      </ul>

                  </li>
                  <li class="hot-tag">
                    <a href="<?php echo HOME_URL; ?>/tin-tuc">Tin tức</a>
                  </li>
                  <li class="hot-tag">
                    <a href="<?php echo HOME_URL; ?>/lien-he">Liên hệ</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="site-content-contain">
      <div id="content" class="site-content">

        <?php if(!is_front_page()) {?>
          <?php get_template_part('custom-html/home-page', 'categories');?>
        <?php }?>
