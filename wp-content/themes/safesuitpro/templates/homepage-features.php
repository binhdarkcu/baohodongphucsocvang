<div class="feature_mid_content">
    <?php if (butterbelly_get_option('inkthemes_feature_section', 'on') == 'on') { ?>
        <div class="col-md-8">
            <div class="featurebox">
                <?php if (butterbelly_get_option('inkthemes_services_head') != '') { ?>
                    <h2><?php echo wp_kses_post(butterbelly_get_option('inkthemes_services_head')); ?></h2>
                <?php } else { ?>
                    <h2><?php _e('ButterBelly Theme Features', 'butterbelly'); ?></h2>
                <?php } if (butterbelly_get_option('inkthemes_services_desc') != '') { ?>
                    <p class="short_desc"><?php echo wp_kses_post(butterbelly_get_option('inkthemes_services_desc')); ?></p>
                <?php } else { ?>
                    <p class="short_desc"><?php _e('Features that will make your website awesome.', 'butterbelly'); ?></p>
                <?php } ?>	
                <div id="tabs">
                    <ul class="col-md-6 col-sm-6 col-xs-6">
                        <li><a href="#tabs-1"><?php
                                if (butterbelly_get_option('inkthemes_tab_head1') != '') {
                                    echo wp_kses_post(butterbelly_get_option('inkthemes_tab_head1'));
                                } else {
                                    _e('Clean & Elegant Design', 'butterbelly');
                                }
                                ?></a></li>
                        <li><a href="#tabs-2"><?php
                                if (butterbelly_get_option('inkthemes_tab_head2') != '') {
                                    echo wp_kses_post(butterbelly_get_option('inkthemes_tab_head2'));
                                } else {
                                    _e('Fullwidth Slider on Homepage', 'butterbelly');
                                }
                                ?></a></li>
                        <li><a href="#tabs-3"><?php
                                if (butterbelly_get_option('inkthemes_tab_head3') != '') {
                                    echo wp_kses_post(butterbelly_get_option('inkthemes_tab_head3'));
                                } else {
                                    _e('Various Amazing Colors', 'butterbelly');
                                }
                                ?></a></li>
                        <li><a href="#tabs-4"><?php
                                if (butterbelly_get_option('inkthemes_tab_head4') != '') {
                                    echo wp_kses_post(butterbelly_get_option('inkthemes_tab_head4'));
                                } else {
                                    _e('Responsive Nature', 'butterbelly');
                                }
                                ?></a></li>
                    </ul>
                    <div class="col-md-6 col-sm-6 col-xs-6 tab_desc">
                        <div class="row">
                            <div id="tabs-1">
                                <?php if (butterbelly_get_option('inkthemes_tab_desc1') != '') { ?>
                                    <p><?php echo wp_kses_post(butterbelly_get_option('inkthemes_tab_desc1')); ?></p>
                                <?php } else { ?>
                                    <p><?php _e('ButterBelly is designed beautifully with clean coding. You can easily install it on your dashboard within a single click  and make your website within no time. ButterBelly is designed beautifully with clean coding. You can easily install it on your dashboard within a single click  and make your website within no time.ButterBelly is designed beautifully with clean coding. You can easily install it on your dashboard within a single click.', 'butterbelly'); ?></p>   
                                <?php } ?>
                            </div>
                            <div id="tabs-2">
                                <?php if (butterbelly_get_option('inkthemes_tab_desc2') != '') { ?>
                                    <p><?php echo wp_kses_post(butterbelly_get_option('inkthemes_tab_desc2')); ?></p>
                                <?php } else { ?>
                                    <p><?php _e('You can showcase multiple images on slider maximum of 6 that will attract visitor\'s attention. The recommended size of the images is 1920 px x 860 px.', 'butterbelly'); ?></p><?php } ?>	               
                            </div>                      
                            <div id="tabs-3">
                                <?php if (butterbelly_get_option('inkthemes_tab_desc3') != '') { ?>
                                    <p><?php echo wp_kses_post(butterbelly_get_option('inkthemes_tab_desc3')); ?></p>
                                <?php } else { ?>
                                    <p><?php _e('8 beautiful colors are given in the theme option. You can choose the best as per your requirement.', 'butterbelly'); ?> </p>	
                                <?php } ?>
                            </div>
                            <div id="tabs-4">
                                <?php if (butterbelly_get_option('inkthemes_tab_desc4') != '') { ?>
                                    <p><?php echo wp_kses_post(butterbelly_get_option('inkthemes_tab_desc4')); ?></p>
                                <?php } else { ?>
                                    <p><?php _e('The most important feature that everybody wants nowadays. The theme is completely responsive and will look on mobile devices. The theme is also compatible with latest browsers.', 'butterbelly'); ?></p>  
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <div class="col-md-4 formget">
            <?php if (is_active_sidebar('home-page-widget-area')) : ?>
                <div class="sidebar home">
                    <?php dynamic_sidebar('home-page-widget-area'); ?>
                </div>
            <?php else : ?>			
                <div class="feature_home_widget">	
                    <?php
                    if (butterbelly_get_option('inkthemes_right_widget') != '') {
                        echo wp_kses_post(butterbelly_get_option('inkthemes_right_widget'));
                    } else {
                        ?>
                        <iframe height='436' allowTransparency='true' frameborder='0' scrolling='no' style='width:100%;border:none' src="<?php echo esc_url('http://www.formget.com/app/embed/form/zl27-23894'); ?>"><?php _e('Your Contact', 'butterbelly'); ?> </iframe>
                    <?php } ?>
                </div>	
            <?php endif; ?>
        </div>
        <div class="clear"></div>   
        <div class="col-md-12">
            <hr class="hp_content_bottom_border"/>
        </div>
    <?php } ?>
    <div class="feature_blog_heading">
        <div class="col-md-12">
            <?php if (butterbelly_get_option('inkthemes_blog_heading') != '') { ?>
                <h2><?php echo wp_kses_post(butterbelly_get_option('inkthemes_blog_heading')); ?></h2>
            <?php } else { ?>
                <h2><?php _e('Show your latest posts here.', 'butterbelly'); ?></h2>
            <?php } if (butterbelly_get_option('inkthemes_blog_desc') != '') { ?>
                <p class="short_desc"><?php echo wp_kses_post(butterbelly_get_option('inkthemes_blog_desc')); ?></p>
            <?php } else { ?>
                <p class="short_desc"><?php _e('By default no posts will appear. You need to create one.', 'butterbelly'); ?></p>
            <?php } ?>
        </div>
    </div>
    <div class="clear"></div>
    <div class="feature_blog_content blog">
        <?php
        if (butterbelly_get_option('inkthemes_blog_post') != '') {
            $post_limit = wp_kses_post(butterbelly_get_option('inkthemes_blog_post'));
        } else {
            $post_limit = 3;
        }
//            $post_limit = get_option('posts_per_page');
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'paged' => $paged,
            'posts_per_page' => $post_limit
        );
        global $post;
        $wp_query = new WP_Query($args);
        if ($wp_query->have_posts()):while ($wp_query->have_posts()): $wp_query->the_post();
                get_template_part('templates/content');
            endwhile;
        else:
            ?>
            <div class="post">
                <p>
                    <?php _e('Sorry, no posts matched your criteria.', 'butterbelly'); ?>
                </p>
            </div>
        <?php
        endif;
        butterbelly_pagination();
        ?> 
    </div>
    <div class="clear"></div> 
</div>
<div class="clear"></div>
</div>
</div>
</div>