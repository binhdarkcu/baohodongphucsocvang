<div class="footer_top_container">
    <div class="container">
        <div class="row">
            <div class="footer_top_content">
                <?php if ((butterbelly_get_option('inkthemes_twitter') != '') || (butterbelly_get_option('inkthemes_facebook') != '') || (butterbelly_get_option('inkthemes_rss') != '') || (butterbelly_get_option('inkthemes_google') != '') || (butterbelly_get_option('inkthemes_pinterest') != '')) { ?>
                    <div class="col-md-6">     
                        <ul class="social_logos">
                            <?php if (butterbelly_get_option('inkthemes_twitter') != '') { ?>
                                <li><a href="<?php echo esc_url(butterbelly_get_option('inkthemes_twitter')); ?>" target="_blank"><img src="<?php echo BUTTERBELLY_DIR_URI . 'assets/images/tw.png'; ?>" alt="<?php _e('Twitter icon', 'butterbelly'); ?>" title="<?php _e('Twitter', 'butterbelly'); ?>" /></a></li>
                            <?php } if (butterbelly_get_option('inkthemes_facebook') != '') { ?>
                                <li><a href="<?php echo esc_url(butterbelly_get_option('inkthemes_facebook')); ?>" target="_blank"><img src="<?php echo BUTTERBELLY_DIR_URI . 'assets/images/fb.png'; ?>" alt="<?php _e('Facebook icon', 'butterbelly'); ?>" title="<?php _e('Facebook', 'butterbelly'); ?>" /></a></li>   
                            <?php } if (butterbelly_get_option('inkthemes_rss') != '') { ?>		  
                                <li><a href="<?php echo esc_url(butterbelly_get_option('inkthemes_rss')); ?>" target="_blank"><img src="<?php echo BUTTERBELLY_DIR_URI . 'assets/images/rss.png'; ?>" alt="<?php _e('Rss Feed icon', 'butterbelly'); ?>" title="<?php _e('Rss Feed', 'butterbelly'); ?>" /></a></li>  
                            <?php } if (butterbelly_get_option('inkthemes_google') != '') { ?>
                                <li><a href="<?php echo esc_url(butterbelly_get_option('inkthemes_google')); ?>" target="_blank"><img src="<?php echo BUTTERBELLY_DIR_URI . 'assets/images/gp.png'; ?>" alt="<?php _e('Google Plus icon', 'butterbelly'); ?>" title="<?php _e('Google Plus', 'butterbelly'); ?>" /></a></li>
                            <?php } if (butterbelly_get_option('inkthemes_pinterest') != '') { ?>
                                <li><a href="<?php echo esc_url(butterbelly_get_option('inkthemes_pinterest')); ?>" target="_blank"><img src="<?php echo BUTTERBELLY_DIR_URI . 'assets/images/pn.png'; ?>" alt="<?php _e('Pinterest icon', 'butterbelly'); ?>" title="<?php _e('Pinterest', 'butterbelly'); ?>" /></a></li>
                            <?php } ?> 
                        </ul>
                    </div>
                <?php } ?>
                <div class="col-md-6 call_us_section">  
                    <div class="call_us">
                        <?php if (butterbelly_get_option('inkthemes_topright') != '') { ?>
                            <p> <?php echo wp_kses_post(butterbelly_get_option('inkthemes_topright')); ?></p>
                        <?php } else { ?>
                            <p><?php _e('For Reservation Call : 1.888.222.5847', 'butterbelly'); ?> </p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="footer_container">
    <div class="container">
        <div class="row">
            <div class="footer">
                <?php
                /* A sidebar in the footer? Yep. You can can customize
                 * your footer with four columns of widgets.
                 */
                get_sidebar('footer');
                ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="bottom_footer_container">
    <div class="container">
        <div class="row">
            <div class="bottom_footer_content">
                <div class="col-md-5">        
                    <div class="copyrightinfo">
                        <div class="copyrightinfo">
                            <?php if (butterbelly_get_option('inkthemes_footertext') != '') { ?>
                                <p class="copyright"><?php echo butterbelly_get_option('inkthemes_footertext'); ?></p> 
                            <?php } else { ?>
                                <p class="copyright"><?php _e('ButterBelly Theme Designed And Developed by ', 'butterbelly'); ?><a href="<?php echo esc_url('http://www.inkthemes.com'); ?>"><?php _e('InkThemes.com', 'butterbelly'); ?></a></p>
                            <?php } ?>
                        </div>
                    </div>			 
                </div>
                <div class="col-md-7">
                    <?php butterbelly_footer_nav(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php wp_footer(); ?>
</body>
</html>
