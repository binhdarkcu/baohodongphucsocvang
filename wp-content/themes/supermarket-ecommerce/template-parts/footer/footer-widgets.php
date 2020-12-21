<?php
/**
 * Displays footer widgets if assigned
 *
 * @package WordPress
 * @subpackage supermarket-ecommerce
 * @since 1.0
 * @version 1.4
 */
$eto_options = get_option('eto_settings');
$support_phone = $eto_options['support_phone']
?>

<aside class="widget-area" role="complementary" style="padding-bottom: 30px;">
    <div class="row">
        <div class="widget-column footer-widget-1 col-lg-3 col-md-3">
            <?php dynamic_sidebar( 'footer-1' ); ?>
        </div>
        <div class="widget-column footer-widget-2 col-lg-3 col-md-3">
            <section id="custom_html-3" class="widget_text widget widget_custom_html">
              <h2 class="widget-title">HOTLINE</h2>
                <div class="contact-info">
                  <?php
                  if ( $eto_options['support_name'] ) {
                    $eto_col2 = $eto_options['support_phone'];
                    foreach($eto_options['support_name'] as $key=>$row) {
                  ?>
                    <div class="name">
                      <?php echo $row; ?> : <a href="tel:<?php echo str_replace(".", "", $eto_col2[$key]); ?>"><?php echo $eto_col2[$key]; ?></a>
                    </div>
                  <?php
                    }
                  }
                  ?>
              </div>
            <div class="address-info">
              Địa chỉ: <a target="_blank" href="https://maps.google.com/?ll=10.7918531,106.6327206"><?php echo $eto_options['address_info'];?></a>
            </div>
          </section>
        </div>
        <div class="widget-column footer-widget-3 col-lg-3 col-md-3">
            <!-- <?php dynamic_sidebar( 'footer-3' ); ?> -->
            <section id="custom_html-3" class="widget_text widget widget_custom_html"><h2 class="widget-title">Liên hệ chúng tôi</h2><div class="textwidget custom-html-widget"><h1>
              <a href="<?php echo $eto_options['url_facebook']; ?>">
              <i class="fa fa-facebook-square" style="color: #3b5998"></i>
              </a>
              <a href="<?php echo $eto_options['instagram']; ?>">
              <i class="fa fa-instagram" style="color: #517fa4"></i>
              </a>
              <a href="<?php echo $eto_options['twitter']; ?>">
                <i class="fa fa-twitter" style="color: #00aced"></i>
              </a>
              <a href="<?php echo $eto_options['url_linkedin']; ?>">
                <i class="fa fa-linkedin" style="color: #007bb6"></i>
              </a>
              <a href="<?php echo $eto_options['url_google']; ?>">
              <i class="fa fa-google-plus-g" style="color: #dd4b39"></i>
              </a>
            </h1>

            <div class="mapouter">
                <div class="gmap_canvas" style="width: 277px; height: 225px;">
                    <?php echo $eto_options['google_map'];?>
                </div>
                <style>.mapouter{position:relative;text-align:right;height:225px;width:277px;}.gmap_canvas {overflow:hidden;background:none!important;height:225px;width:277px;}</style>
            </div>
            <style>
              .gmap_canvas iframe {
                width: 277px; height: 225px;
              }
            </style>
        </section>
        </div>
        <div class="widget-column footer-widget-4 col-lg-3 col-md-3">
            <?php dynamic_sidebar( 'footer-4' ); ?>
        </div>
    </div>
</aside>
