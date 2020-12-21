<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $counterArchieProduct, $firstCategory;

$catParentId = $category->category_parent;
$category_parent = get_term_by("id", $catParentId, "product_cat");
$parent_name = $category_parent->name;
$parent_slug = $category_parent->slug;

if($parent_slug === 'danh-muc') {?>
	<div class="post-item danh-muc">
		  <div class="item-wrapper product type-product status-publish first instock product_cat-may-anh-may-quay-phim has-post-thumbnail sale shipping-taxable purchasable product-type-variable has-default-attributes">
			<div class="card full shadow">
			      <a style="color: black" class="menu-link-hover" href="<?php echo get_category_link( $category ); ?>" >
			        <div class="cover-img">
			        <div class="background">
			            <?php do_action( 'woocommerce_before_subcategory_title', $category ); ?>
			        </div>
			        </div>
			        <div class="lower-padding item-padding-8">
			        <div class="text-name">
			          <?php do_action( 'woocommerce_shop_loop_subcategory_title', $category ); ?>
			        </div>

			        <div class="extra-badge-wrapper"></div>
			        <?php do_action( 'woocommerce_after_subcategory', $category );?>
			        </div>
			      </a>
	    </div>
	  </div>
  </div>
  <style>
		h2.woocommerce-loop-category__title {
			font-size: 14px;
			text-align: center;
			margin-top: 8px;
		}
		.product-section .danh-muc .item-wrapper .item-padding-8 {
			min-height: 40px;
		}
		mark.count {
			color: #fff;
		}
  </style>
<?php
} else { ?>
	<?php if (!in_array($catParentId, $counterArchieProduct)) {?>
	<!--section-->
	<div class="section-header" style="border-bottom: 3px solid <?php if (!empty($sub_header_top_color)) echo $sub_header_top_color ?>;">
	  <div class="title-wrap">
		<h3 class="title"><?php echo esc_html($parent_name); ?></h3>
	  </div>
	</div>
	<!--section-->
	<?php
			$eto_options = get_option('eto_settings');
			$amountProduct = $eto_options['amount_product_categories'];
			$args = array(
	            'posts_per_page' => $amountProduct,
							'paged' => get_query_var( 'paged' ),
	            'tax_query' => array(
	                'relation' => 'AND',
	                array(
	                    'taxonomy' => 'product_cat',
	                    'field' => 'slug',
	                    // 'terms' => 'white-wines'
	                    'terms' => array($parent_slug)
	                )
	            ),
	            'post_type' => 'product',
	            'orderby' => 'title,'
	        );
	        $products = new WP_Query( $args );
	        while ( $products->have_posts() ) {
	            	$products->the_post();
					$productId = get_the_ID();
					$product = wc_get_product($productId);
	            ?>

					<div class="post-item">
					  <div class="item-wrapper product type-product status-publish first instock product_cat-may-anh-may-quay-phim has-post-thumbnail sale shipping-taxable purchasable product-type-variable has-default-attributes">

						<div class="card full shadow">
							<a style="color: black" class="menu-link-hover" href="<?php the_permalink(); ?>">
							  <div class="cover-img">
								<div class="background">
									  <img src="<?php echo get_the_post_thumbnail_url($productId);?>"/>
								</div>
							  </div>
							  <div class="lower-padding item-padding-8">
								<div class="text-name">
								  <h4 class="product-name">
									<?php echo get_the_title($productId); ?>
								</h4>
								</div>
								<div class="price">
								  <div class="original-price"><?php echo number_format($product->get_regular_price(), 0, '.', '.'); ?>
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
					</div>
	            <?php
	        }
			$counterArchieProduct[] = $catParentId;
			?>
			<div style="padding-bottom: 16px;display: block;width: 100%;"></div>
    <?php }?>
	<!--section-->
	<div class="section-header" style="border-bottom: 3px solid <?php if (!empty($sub_header_top_color)) echo $sub_header_top_color ?>;">
	  <div class="title-wrap">
		<h3 class="title"><?php echo esc_html($category->name); ?></h3>
	  </div>
	  <div class="actions">
		<a class="link" href="<?php echo get_category_link( $category ); ?>" style="color: <?php if (!empty($sub_header_top_color)) echo $sub_header_top_color ?>">Xem tất cả
		  <i class="fa fa-angle-right" aria-hidden="true"></i>
		</a>
	  </div>
	</div>
	<!--section-->

	<?php
			$args = array(
	            'posts_per_page' => 15,
				'paged' => get_query_var( 'paged' ),
	            'tax_query' => array(
	                'relation' => 'AND',
	                array(
	                    'taxonomy' => 'product_cat',
	                    'field' => 'slug',
	                    // 'terms' => 'white-wines'
	                    'terms' => array($category->slug)
	                )
	            ),
	            'post_type' => 'product',
	            'orderby' => 'title,'
	        );
	        $products = new WP_Query( $args );
	        while ( $products->have_posts() ) {
	            	$products->the_post();
					$productId = get_the_ID();
					$product = wc_get_product($productId);
	            ?>

					<div class="post-item">
					  <div class="item-wrapper product type-product status-publish first instock product_cat-may-anh-may-quay-phim has-post-thumbnail sale shipping-taxable purchasable product-type-variable has-default-attributes">

						<div class="card full shadow">
							<a style="color: black" class="menu-link-hover" href="<?php the_permalink(); ?>">
							  <div class="cover-img">
								<div class="background">
									  <img src="<?php echo get_the_post_thumbnail_url($productId);?>"/>
								</div>
							  </div>
							  <div class="lower-padding item-padding-8">
								<div class="text-name">
								  <h4 class="product-name">
									<?php echo get_the_title($productId); ?>
								</h4>
								</div>
								<div class="price">
								  <div class="original-price"><?php echo number_format($product->get_regular_price(), 0, '.', '.'); ?>
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
										<span class="rating-count"><?php if(get_comments_number($product->get_id()) == 0) {echo 'đánh giá'; } else { echo get_comments_number($product->get_id()).' đánh giá';}?></span>
									  </div>
									</div>
								  </div>
								</div>
							  </div>
						  </a>
						</div>
					  </div>
					</div>
	            <?php
	        }
			?>
			<div style="padding-bottom: 16px;display: block;width: 100%;"></div>
<?php

}


?>
