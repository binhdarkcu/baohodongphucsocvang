<?php
/**
 * * Latest Downloads Wocommorce
 * 
 * Retrieves the latest downloads.
 * 
 * @return   string
 * @access   private
 * @since    1.0
 */
if (!function_exists('wocommorce_latest_products')) {

    function wocommorce_latest_products($args = array()) {
        global $product, $woocommerce;
        if (get_option('inkthemes_prod_no') != "") {
            $limit = esc_attr(butterbelly_get_option('inkthemes_prod_no'));
        } else {
            $limit = 8;
        }
        $args = array(
            'posts_per_page' => $limit,
            'post_type' => array('product'),
            'post_status' => array('publish'),
        );
// The Query
        $wp_query = new WP_Query($args);
        if ($wp_query->have_posts()) {
            $counter = 1;
            ?>
            <div class="homepage-prod-wrapper woocommerce row">
                <?php
                while ($wp_query->have_posts()) : $wp_query->the_post();
                    global $woocommerce, $product;
                    ?>
                    <div id="product-<?php echo $counter; ?>" class="homepage-product col-md-3 col-sm-6 col-xs-6">
                        <div class="product-list woo-home-product">
                            <?php do_action('woocommerce_before_shop_loop_item'); ?>
                            <section class="hp_prod_img edd-image">
                                <?php
                                do_action('woocommerce_before_shop_loop_item_title');
                                ?>	
                                <div class="hp_prod_details">

                                    <section class="thumb-content">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="prod-button">
                                            <span class="new-link"><?php _e('View Details', 'butterbelly'); ?></span>
                                        </a>
                                        <?php
                                        do_action('woocommerce_after_shop_loop_item');
                                        ?>
                                    </section>                                  
                                </div>
                            </section>
                            <div class="product_info">
                                <h6><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h6>
                                <?php if ($price_html = $product->get_price_html()) { ?>
                                    <div class="price_sec">
                                        <div class="price"><?php echo $price_html; ?></div>
                                    </div>
                                    <?php
                                }
                                if ($product->get_rating_html()) {
                                    ?>
                                    <div class="rating_sec">
                                        <?php echo $product->get_rating_html(); ?>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="rating_sec">
                                        <div class="star-rating" title="Rated 0 out of 5">
                                            <span style="width:0%"><strong class="rating">0</strong> out of 5</span>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>                       
                    <?php
                    if ($counter % 4 == 0) {
                        echo '</div><div class="homepage-prod-wrapper woocommerce row">';
                    }

                    $counter++;
                endwhile;
                ?>
                <div class="clear"></div>
            </div>
            <?php
        }
    }

}

/**
 * Show Latest Product Of Wocommorce
 *
 * Echoes the latest Product on the store front page
 *
 * @return   string
 * @access   private
 * @since    1.0
 */
add_action('wocommorce_store_front', 'wocommorce_latest_products', 3);
?>
