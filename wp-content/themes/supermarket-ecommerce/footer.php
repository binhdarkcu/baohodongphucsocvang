<?php
/**
 * The template for displaying the footer
 * @package Supermarket Ecommerce
 * @subpackage supermarket-ecommerce
 * @since 1.0
 * @version 0.1
 */
 $eto_options = get_option('eto_settings');
 $sub_header_top_color = '#'.$eto_options['sub_header_top_color'];
	$first_col_title = $eto_options['first_col_title'];
	$first_col_detail = $eto_options['first_col_detail'];
	$sec_col_title = $eto_options['sec_col_title'];
	$sec_col_detail = $eto_options['sec_col_detail'];
	$third_col_title = $eto_options['third_col_title'];
	$third_col_detail = $eto_options['third_col_detail'];
?>
		</div>
		<?php get_template_part('tpl', 'support');?>
		<footer class="footer-wrapper" role="contentinfo" style="border-top: 4px solid <?php if (!empty($sub_header_top_color)) echo $sub_header_top_color ?>;" >
			<div class="block-top d-none d-md-block"><div class="container">
				<div class="block-container row middle-xs between-xs">
					<div class="block-wrapper top-xs tappable">
            <div class="content-img">
              <svg class="icon" viewBox="0 0 47.72 48" style="fill: <?php if (!empty($sub_header_top_color)) echo $sub_header_top_color ?>;">
                <path d="m47.54 4.96c-15.05.44-23.68-4.92-23.68-4.92s-8.63 5.36-23.68 4.92c0 0-1.46 17.33 4 28.48a25.9 25.9 0 005.81 6.93 72.37 72.37 0 0013.87 7.67 72.37 72.37 0 0013.84-7.64 25.9 25.9 0 005.81-6.93c5.5-11.19 4.03-28.51 4.03-28.51zm-8.06 18.34-14.44-7.6c-2.4-.85-3.16 1-3.16 1-1.06 2.62 2.19 3.86 2.19 3.86l14.2 7.36c-.23.65-.47 1.28-.75 1.88a16.54 16.54 0 01-3.66 4.67 35.07 35.07 0 01-10 5.85 36 36 0 01-10-5.78 16 16 0 01-3.68-4.65 24.66 24.66 0 01-1.46-4.26l12.84 6.71c2.4.87 3.25-.84 3.25-.84 1.18-2.37-2.07-3.62-2.07-3.62l-15-7.72a61.75 61.75 0 01-.38-8.81c10.5.28 16.5-3.61 16.5-3.61s6 3.89 16.48 3.61a60 60 0 01-.86 11.95z"></path>
              </svg>
            </div>
            <div class="content tappable">
              <div class="title"><?php echo esc_html_e($first_col_title); ?></div>
              <div class="detail"><?php echo esc_html_e($first_col_detail); ?></div>
            </div>
          </div>
          <div class="block-wrapper top-xs">
            <div class="content-img">
              <svg class="icon" viewBox="0 0 44.94 48" style="fill: <?php if (!empty($sub_header_top_color)) echo $sub_header_top_color ?>;">
                <path d="m13.9 37.68a1.18 1.18 0 01-.64-.95 1 1 0 01 .94-1 1.54 1.54 0 01 .84.33l14.75 8.82 4.81-2.7-14.45-8.5a1.17 1.17 0 01-.76-1 1 1 0 011.69-.77l15.39 9.21 4.82-2.71-15-8.83c-.39-.24-.76-.51-.76-1a1 1 0 011.69-.77l15.85 9.48a6.54 6.54 0 001.88-5.08v-.87l-19.19-11.48a5.63 5.63 0 00-5.23.32l-7.7 4.48a5.26 5.26 0 01-5.54 0l-2.46-1.6s-.47-.35 0-.64l15.39-9.27a5.87 5.87 0 015.85 0l7.4 3.66a7.55 7.55 0 006.47-.52l4.89-2.94a5.24 5.24 0 00-2.6-3.48l-16.12-8.78a6.43 6.43 0 00-5.95-.64l-17.83 9.91s-2.33.82-2.33 4.76v17.61s-.12 3.87 2.7 5.4l15.77 8.68a7.1 7.1 0 007.26.32l2.13-1.2z" fill-rule="evenodd"></path>
              </svg>
            </div>
            <div class="content">
              <div class="title"><?php echo esc_html_e($sec_col_title); ?></div>
              <div class="detail"><?php echo esc_html_e($sec_col_detail); ?></div>
            </div>
          </div>
          <div class="block-wrapper top-xs">
            <div class="content-img">
              <svg class="icon" enable-background="new 0 0 48 48" viewBox="0 0 48 48" x="0" y="0" style="fill: <?php if (!empty($sub_header_top_color)) echo $sub_header_top_color ?>;">
                <path d="m42.4 14.3c.1-4.3-1.5-6.3-1.5-6.3s-3.6-4.5-5.4-6.2c-1.5-1.5-3.3-1.7-3.9-1.8-.2 0-.3 0-.3 0h-6.9-6.9s-.1 0-.3 0c-.7.1-2.5.3-3.9 1.8-1.7 1.8-5.3 6.2-5.3 6.2s-1.5 2-1.5 6.2v6.6l35.9-6.3s0-.1 0-.2zm-17.9-2.3c-2.1 0-3.8-1.7-3.8-3.8s1.7-3.8 3.8-3.8 3.8 1.7 3.8 3.8c-.1 2.1-1.7 3.8-3.8 3.8zm14.3 35.9c-4.3.1-14.3.1-14.3.1v-1.7 1.7s-10 0-14.4-.1c-3.9-.3-3.6-2.7-3.6-2.7s0-2.7 0-6.6l35.9-6.3v12.9s.3 2.4-3.6 2.7zm-34.3-24.1 9-1.6v3.6l-4.6.8v1.5l4.6-.8v3.5l-4.6.8v4.4l-4.4.8zm17.8 4.5 1.8 4.8-3.9.8-1.4-4.4-.4.1v.2 4.5l-3.7.7v-13l4.7-.8c.6-.1 1.2-.1 1.7-.1.5.1 1 .2 1.4.5.4.2.7.6 1 1s .4.9.5 1.4c.2 1 .1 1.9-.2 2.7-.3.7-.8 1.2-1.5 1.6zm-1.7-3.5c-.1-.4-.2-.6-.5-.7s-.6-.1-1.1 0l-.8.1v2.2l.8-.1c.5-.1 1-.3 1.2-.5.4-.3.5-.6.4-1zm13.6-2.8v-3.6l-9.2 1.6v13l9.2-1.6v-3.6l-4.9 1v-1.4l4.9-.8v-3.3l-4.9.8v-1.3zm10.2-1.8v-3.6l-9.2 1.6v13l9.2-1.6v-3.6l-4.9 1v-1.4l4.9-.8v-3.3l-4.9.8v-1.3z"></path>
              </svg>
            </div>
            <div class="content">
              <div class="title"><?php echo esc_html_e($third_col_title); ?></div>
              <div class="detail"><?php echo esc_html_e($third_col_detail); ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
			<div class="container">
				<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
			</div>
			<div class="clearfix"></div>
			<div class="copyright" style="border-top: 2px solid <?php if (!empty($sub_header_top_color)) echo $sub_header_top_color ?>;">
				<div class="container">
					<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
				</div>
			</div>
		</footer>
	</div>
</div>

<?php wp_footer(); ?>

<!--End of Tawk.to Script-->
</body>
</html>
