<div class="wrap">
	<?php
//	echo get_option( 'colorway_license_activation_cache' );
//	echo 'Activation:<br/>';
//	echo get_option('colorway_is_activated');
//	echo 'License:<br/>';
//	echo get_option('colorway_license_key');
//	echo 'Server Ip:<br/>';
//	echo @$_SERVER['SERVER_ADDR'];
//	echo '<br/>Is localhost: ';
//	echo InkThemes_License::is_localhost();
	?>
	<h2 class="title"><?php _e( 'Theme activation', self::THEME_SLUG ); ?></h2>
	<?php if ( InkThemes_License::is_activated() ) { ?>
		<div class="updated"><p><?php _e( 'Your theme is activated.', self::THEME_SLUG ); ?></p></div>
	<?php } else { ?>
		<div style="display: none;" class="updated"></div>
	<?php } ?>
	<form id="inkthemes_setting_form" method="post">
		<?php wp_nonce_field( 'inkthemes_license', 'inkthemes_license_nonce' ); ?>		
		<p><?php _e( 'Activate the theme by entering license key. You will get the license key from our <a target="new" href="http://inkthemes.com/members/member/index">members area</a>.', self::THEME_SLUG ); ?></p>
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><?php _e( 'Theme License Key', self::THEME_SLUG ); ?></th>
				<td>
					<input class="regular-text code" id="inkthemes_license_key" type="text" name="inkthemes_license_key" value="<?php echo esc_attr( get_option( InkThemes_License::THEME_SLUG . '_license_key' ) ); ?>" />
					<p class="description" id="home-description"><?php _e( 'Enter your license key from <a target="new" href="http://inkthemes.com/members/member/index">members area</a>.', self::THEME_SLUG ); ?></p>
					<p style="display:none;" class="error"></p>
				</td>
			</tr>
		</table>
		<p><?php submit_button( __( 'Activate License', self::THEME_SLUG ), 'primary', 'activate_license', false ); ?>
			<input class="button-secondary delete" type="button" name="reset_license" id="reset_license" value="Reset License"/></p>
	</form>
</div>