<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage supermarket-ecommerce
 * @since 1.0
 * @version 1.4
 */
$eto_options = get_option('eto_settings');
?>

<div class="site-info" style="text-align: center;padding-top: 10px;">
	<p><?php echo $eto_options['copy_right'];?></p>
</div>
