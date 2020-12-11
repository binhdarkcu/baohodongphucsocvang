<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;


global $product;
// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$image_id  = $product->get_image_id();
$image_url = wp_get_attachment_image_url( $image_id, 'thumbnail' );
?>
<div class="post-item">
  <div class="item-wrapper product type-product status-publish first instock product_cat-may-anh-may-quay-phim has-post-thumbnail sale shipping-taxable purchasable product-type-variable has-default-attributes">

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
					<span class="rating-count"><?php if(get_comments_number($product->get_id()) == 0) {echo ' đánh giá'; } else { echo get_comments_number($product->get_id()).' đánh giá';}?></span>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
	  </a>
	</div>
  </div>
</div>
