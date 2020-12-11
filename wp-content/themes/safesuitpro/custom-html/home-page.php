<?php
/**
 * Template part for displaying page content in homepage.php
 * @package WordPress
 * @subpackage supermarket-ecommerce
 * @since 1.0
 * @version 0.1
 */

?>

<?php get_template_part('custom-html/home-page', 'banner');?>
<div class="vc_row-full-width vc_clearfix"></div>
<?php get_template_part('custom-html/home-page', 'categories');?>
<div class="vc_row-full-width vc_clearfix"></div>
<?php get_template_part('custom-html/home-page-feature', 'products');?>
<div class="vc_row-full-width vc_clearfix"></div>
<?php get_template_part('custom-html/home-page', 'products');?>
<div class="vc_row-full-width vc_clearfix"></div>
<?php get_template_part('custom-html/home-page', 'news');?>