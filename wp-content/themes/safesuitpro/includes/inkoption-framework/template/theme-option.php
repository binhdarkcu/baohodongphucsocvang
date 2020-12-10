<?php
//$themename = InkOption_Framwork::THEME_NAME;
$themename = wp_get_theme();
$options = InkOption_Framwork_OptionSetup::get_default_options();
?>
<div class="wrap" id="of_container">
    <?php //if (InkThemes_License::is_activated() || InkThemes_License::is_localhost() ) {  ?>
    <div id="of-popup-save" class="of-save-popup">
        <div class="of-save-save"><?php _e('Options Updated', self::THEME_SLUG); ?></div>
    </div>
    <div id="of-popup-reset" class="of-save-popup">
        <div class="of-save-reset"><?php _e('Options Reset', self::THEME_SLUG); ?></div>
    </div>
    <form action="" enctype="multipart/form-data" id="ofform">
        <?php wp_nonce_field('theme-update-option', 'theme_option_nonce'); ?>
        <div id="header">
            <div class="logo">
                <h2><?php printf(__('%s Options', self::THEME_SLUG), $themename); ?></h2>
            </div>
            <a href="http://www.inkthemes.com" target="_new">
                <div class="icon-option"> </div>
            </a>
            <div class="clear"></div>
        </div>
        <?php
// Rev up the Options Machine
        $return = $this->options($options);
        ?>
        <div id="main">
            <div id="of-nav">
                <ul>
                    <?php echo $return[1] ?>
                </ul>
            </div>
            <div id="content"> <?php echo $return[0]; /* Settings */ ?> </div>
            <div class="clear"></div>
        </div>
        <div class="save_bar_top save_bar_right">
            <img style="display:none" src="<?php echo $this->path_uri; ?>images/loading-bottom.gif" class="ajax-loading-img ajax-loading-img-bottom" alt="Working..." />
            <input type="submit" value="<?php _e('Save All Changes', self::THEME_SLUG); ?>" class="button-primary" />
        </div>
    </form>
    <div class="save_bar_top save_bar_left">
        <form action="<?php echo esc_attr($_SERVER['REQUEST_URI']) ?>" method="post" style="display:inline" id="ofform-reset">
            <span class="submit-footer-reset">
                <input name="reset" type="submit" value="<?php _e('Reset Options', self::THEME_SLUG); ?>" class="button submit-button reset-button" onclick="return confirm('Click OK to reset. Any settings will be lost!');" />
                <input type="hidden" name="of_save" value="reset" />
            </span>
        </form>
    </div>
    <div style="clear:both;"></div>
    <?php
//} else {
//	printf( '<p>%s</p>', __( 'Your theme license is not activated. Please activate it from <a href="' . admin_url( '/admin.php?page=inkoption-setting' ) . '">here</a> to get complete option of this theme.', self::THEME_SLUG ) );
//}
    ?>
</div>
<!--wrap-->