<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <?php
        if (is_front_page()) {
            if (butterbelly_get_option('inkthemes_keyword') != '') {
                ?>
                <meta name="keywords" content="<?php echo butterbelly_get_option('inkthemes_keyword'); ?>" />
            <?php } if (butterbelly_get_option('inkthemes_description') != '') {
                ?>
                <meta name="description" content="<?php echo butterbelly_get_option('inkthemes_description'); ?>" />
            <?php } if (butterbelly_get_option('inkthemes_author') != '') {
                ?>
                <meta name="author" content="<?php echo butterbelly_get_option('inkthemes_author'); ?>" />
                <?php
            }
        }
        ?>		
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="menu_container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="menu-wrapper">
                            <div id="MainNav">
                                <?php butterbelly_nav(); ?> 
                            </div> 
                        </div>
                        <div class="taptocall">
                            <?php
                            $tap_tocall = (butterbelly_get_option('inkthemes_contact_number')) ? butterbelly_get_option('inkthemes_contact_number') : __('Call Us', 'butterbelly');
                            $tap_icon = (butterbelly_get_option('inkthemes_tapto_icon') != '') ? butterbelly_get_option('inkthemes_tapto_icon') : 'fa-phone';
                            ?>
                            <a class="btn" href="tel:<?php echo wp_kses_post($tap_tocall); ?>"><i class="fa <?php echo $tap_icon; ?>"></i><?php echo $tap_tocall; ?></a>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="index_container">
            <div class="header_container <?php if (is_home()) { ?>home <?php
            } else {
                echo 'not_home';
            }
            ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header">
                                <div class="logo"> <?php if (butterbelly_get_option('inkthemes_logo') != '') { ?>
                                        <a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo butterbelly_get_option('inkthemes_logo'); ?>" alt="<?php
                                            bloginfo('name');
                                            _e('logo', 'butterbelly')
                                            ?> "/></a>
                                        <?php } else { ?>
                                        <hgroup>
                                            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                            <h4 class="site-description"><?php bloginfo('description'); ?></h4>
                                        </hgroup>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>