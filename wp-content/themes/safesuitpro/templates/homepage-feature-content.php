<div class="home_container">
    <div class="container">
        <div class="row">
            <div class="home-content">
                <div class="feature-content">
                    <div class="col-md-4">
                        <div class="feature-content-inner">
                            <?php if (butterbelly_get_option('inkthemes_headline1') != '') { ?><h3><a href="<?php
                                    if (butterbelly_get_option('inkthemes_feature_link1') != '') {
                                        echo esc_url(butterbelly_get_option('inkthemes_feature_link1'));
                                    }
                                    ?>"><?php echo wp_kses_post(butterbelly_get_option('inkthemes_headline1')); ?></a></h3>
                                <?php } else { ?>
                                <h3><a href="<?php
                                    if (butterbelly_get_option('inkthemes_feature_link1') != '') {
                                        echo esc_url(butterbelly_get_option('inkthemes_feature_link1'));
                                    }
                                    ?>"><?php _e('Happy Customers', 'butterbelly'); ?></a></h3>
                                <?php } ?>
                            <span id="image"><?php if (butterbelly_get_option('inkthemes_fimg1') != '') { ?>
                                    <img src="<?php echo esc_url(butterbelly_get_option('inkthemes_fimg1')); ?>" alt="<?php _e('First Feature Image', 'butterbelly'); ?>" />
                                <?php } else { ?>
                                    <img src="<?php echo BUTTERBELLY_DIR_URI . 'assets/images/img.jpg'; ?>" /><?php } ?></span>				                            <div class="feature-content-text">
                                <div class="circle">
                                    <?php if (butterbelly_get_option('inkthemes_circle_img1') != '') { ?>
                                        <a href="<?php
                                        if (butterbelly_get_option('inkthemes_feature_link1') != '') {
                                            echo esc_url(butterbelly_get_option('inkthemes_feature_link1'));
                                        }
                                        ?>"><img src="<?php echo esc_url(butterbelly_get_option('inkthemes_circle_img1')); ?>" alt="<?php _e('First Feature Image', 'butterbelly'); ?>" /></a>
                                       <?php } else { ?>
                                        <a href="<?php
                                        if (butterbelly_get_option('inkthemes_feature_link1') != '') {
                                            echo esc_url(butterbelly_get_option('inkthemes_feature_link1'));
                                        }
                                        ?>"><img src="<?php echo BUTTERBELLY_DIR_URI . 'assets/images/c_img.jpg'; ?>" alt="<?php _e('Feature image', 'butterbelly'); ?>" /></a><?php } ?></div>
                                    <?php if (butterbelly_get_option('inkthemes_firstdesc') != '') { ?>
                                    <p><?php echo wp_kses_post(butterbelly_get_option('inkthemes_firstdesc')); ?></p>
                                <?php } else { ?>
                                    <p><?php _e('You can use this feature section to showcase your happy customers those use your business services. It will help to build trust among the audience.', 'butterbelly'); ?></p>
                                <?php } ?>
                            </div> </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-content-inner second">
                            <?php if (butterbelly_get_option('inkthemes_headline2') != '') { ?><h3><a href="<?php
                                    if (butterbelly_get_option('inkthemes_feature_link2') != '') {
                                        echo esc_url(butterbelly_get_option('inkthemes_feature_link2'));
                                    }
                                    ?>"><?php echo wp_kses_post(butterbelly_get_option('inkthemes_headline2')); ?></a></h3>
                                <?php } else { ?>
                                <h3><a href="<?php
                                    if (butterbelly_get_option('inkthemes_feature_link2') != '') {
                                        echo esc_url(butterbelly_get_option('inkthemes_feature_link2'));
                                    }
                                    ?>"><?php _e('Share Testimonials', 'butterbelly'); ?></a></h3>
                                <?php } ?>
                            <span id="image"><?php if (butterbelly_get_option('inkthemes_fimg2') != '') { ?>
                                    <img src="<?php echo esc_url(butterbelly_get_option('inkthemes_fimg2')); ?>" alt="<?php _e('Second Feature Image', 'butterbelly'); ?>" />
                                <?php } else { ?>
                                    <img src="<?php echo BUTTERBELLY_DIR_URI . 'assets/images/img.jpg'; ?>" /><?php } ?></span>
                            <div class="feature-content-text">
                                <div class="circle">
                                    <?php if (butterbelly_get_option('inkthemes_circle_img2') != '') { ?>
                                        <a href="<?php
                                        if (butterbelly_get_option('inkthemes_feature_link2') != '') {
                                            echo esc_url(butterbelly_get_option('inkthemes_feature_link2'));
                                        }
                                        ?>"><img src="<?php echo esc_url(butterbelly_get_option('inkthemes_circle_img2')); ?>" alt="<?php _e('Second Feature Image', 'butterbelly'); ?>" /></a>
                                       <?php } else { ?>
                                        <a href="<?php
                                        if (butterbelly_get_option('inkthemes_feature_link2') != '') {
                                            echo esc_url(butterbelly_get_option('inkthemes_feature_link2'));
                                        }
                                        ?>"><img src="<?php echo BUTTERBELLY_DIR_URI . 'assets/images/c_img.jpg'; ?>" alt="<?php _e('Feature image', 'butterbelly'); ?>" /></a><?php } ?></div>
                                    <?php if (butterbelly_get_option('inkthemes_seconddesc') != '') { ?>
                                    <p><?php echo wp_kses_post(butterbelly_get_option('inkthemes_seconddesc')); ?></p>
                                <?php } else { ?>
                                    <p><?php _e('You can also share testimonials in feature section that will prove how much your services are reliable that will make positive impact on visitors coming to your website.', 'butterbelly'); ?></p>
                                <?php } ?>
                            </div></div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-content-inner third">
                            <?php if (butterbelly_get_option('inkthemes_headline3') != '') { ?><h3><a href="<?php
                                    if (butterbelly_get_option('inkthemes_feature_link3') != '') {
                                        echo esc_url(butterbelly_get_option('inkthemes_feature_link3'));
                                    }
                                    ?>"><?php echo wp_kses_post(butterbelly_get_option('inkthemes_headline3')); ?></a></h3>
                                <?php } else { ?>
                                <h3><a href="<?php
                                    if (butterbelly_get_option('inkthemes_feature_link3') != '') {
                                        echo esc_url(butterbelly_get_option('inkthemes_feature_link3'));
                                    }
                                    ?>"><?php _e('Introduce Team', 'butterbelly'); ?></a></h3>
                                <?php } ?>
                            <span id="image"><?php if (butterbelly_get_option('inkthemes_fimg3') != '') { ?>
                                    <img src="<?php echo butterbelly_get_option('inkthemes_fimg3'); ?>" alt="<?php _e('Third Feature Image', 'butterbelly'); ?>" />
                                <?php } else { ?>
                                    <img src="<?php echo BUTTERBELLY_DIR_URI . 'assets/images/img.jpg'; ?>" /><?php } ?></span>
                            <div class="feature-content-text">
                                <div class="circle">
                                    <?php if (butterbelly_get_option('inkthemes_circle_img3') != '') { ?>
                                        <a href="<?php
                                        if (butterbelly_get_option('inkthemes_feature_link3') != '') {
                                            echo esc_url(butterbelly_get_option('inkthemes_feature_link3'));
                                        }
                                        ?>"><img src="<?php echo esc_url(butterbelly_get_option('inkthemes_circle_img3')); ?>" alt="<?php _e('Third Feature Image', 'butterbelly'); ?>" /></a>
                                       <?php } else { ?>
                                        <a href="<?php
                                        if (butterbelly_get_option('inkthemes_feature_link3') != '') {
                                            echo esc_url(butterbelly_get_option('inkthemes_feature_link3'));
                                        }
                                        ?>"><img src="<?php echo BUTTERBELLY_DIR_URI . 'assets/images/c_img.jpg'; ?>" alt="<?php _e('Feature image', 'butterbelly'); ?>" /></a><?php } ?></div>
                                    <?php if (butterbelly_get_option('inkthemes_thirddesc') != '') { ?>
                                    <p><?php echo wp_kses_post(butterbelly_get_option('inkthemes_thirddesc')); ?></p>
                                <?php } else { ?>
                                    <p><?php _e('Even you can introduce your team in the feature section. The people that stand your business. This will give a chance to visitors to know the kind of work your team does.', 'butterbelly'); ?>
                                    </p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="col-md-12">
                        <hr class="hp_content_bottom_border"/>
                    </div>
                </div>
                <div class="clear"></div>
