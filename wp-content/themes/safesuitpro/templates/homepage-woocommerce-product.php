<?php if (butterbelly_get_option('inkthemes_product_sec_on_off') == 'on' && class_exists('WooCommerce')) { ?>
    <div class="page-add-container home-product-page">
        <div class="homepage_title">
            <p class="product_section_heading feature_heading"><?php
                if (butterbelly_get_option('inkthemes_prod_sec_head') != "") {
                    echo wp_kses_post(butterbelly_get_option('inkthemes_prod_sec_head'));
                } else {
                    _e('WooCommerce Products', 'slice-pro');
                }
                ?><span class="head_bottom_circle"></span></p>
        </div>
        <div class="hp-product col-md-12">
            <div class="Butterbelly_WC">
                <?php
                do_action('wocommorce_store_front');
                ?>
            </div>
        </div>
        <div class="clear"></div>   
        <div class="col-md-12">
            <hr class="hp_content_bottom_border prod_border"/>
        </div>
    </div>
    <div class="clear"></div>
<?php } ?>
