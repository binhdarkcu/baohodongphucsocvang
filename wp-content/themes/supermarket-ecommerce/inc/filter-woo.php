<?php 
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title',10);
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);
remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs',10);


function woo_related_products_limit() {
  global $product;
	$args['posts_per_page'] = 8;
	return $args;
}


?>