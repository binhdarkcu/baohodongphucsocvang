<?php
if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class InkThemes_License extends InkOption_Framwork {

	const API_URL = 'http://inkthemes.com/members/softsale/api';

	var $key = '';
	var $activation_cache = '';
	var $errorMsg = '';
	var $is_error = false;
	var $enable_localhost = false;

	function __construct() {
		$this->key = get_option( self::THEME_SLUG . '_license_key' );
		$this->activation_cache = get_option( self::THEME_SLUG . '_license_activation_cache' );
	}

	static function Init() {
		$obj = new self();
		add_action( 'admin_notices', array( $obj, 'admin_license_notice' ) );
		add_action( 'wp_ajax_inkthemes_activate_license', array( $obj, 'license_verify_callback' ) );
		add_action( 'wp_ajax_inkthemes_reset_license', array( $obj, 'license_reset_callback' ) );
	}

	static function is_localhost() {
		$obj = new InkThemes_License();

		$whitelist = array(
			'127.0.0.1',
			'::1',
			'localhost',
		);

		if ( in_array( $_SERVER['REMOTE_ADDR'], $whitelist ) ) {
			if ( $obj->enable_localhost ) {
				return false;
			}
			return true;
		}
		return false;
	}

	static function is_activated() {
		$is_activated = get_option( self::THEME_SLUG . '_is_activated' );
		$is_licensed = get_option( self::THEME_SLUG . '_license_key' );
		if ( $is_activated && $is_licensed != '' ) {
			return true;
		} else {
			return false;
		}
	}

	function admin_license_notice() {
		$currentScreen = get_current_screen();
		$class = "error";
		$message = '';
		if ( empty( $this->key ) && str_replace( 'inkthemes_page_', '', $currentScreen->id ) != 'inkoption-setting' ) {
			$message = sprintf( '<p><strong>%s</strong></p>', __( "Your theme has not been activated yet.", self::THEME_SLUG ) );
			$message .= sprintf( '<p>%s <a href="' . admin_url( '/admin.php?page=inkoption-setting' ) . '">%s</a></p>', __( "Please pick the license from members area and activate it", self::THEME_SLUG ), __( 'from here', self::THEME_SLUG ) );
			echo"<div class=\"$class\">$message</div>";
		}
	}

	function license_check( $key ) {
		if ( empty( $key ) ) {
			$this->errorMsg = __( 'Please enter a license key', self::THEME_SLUG );
			return false;
		} else {
			$license_key = preg_replace( '/[^A-Za-z0-9-_]/', '', trim( $key ) );
			$checker = new Am_LicenseChecker( $license_key, self::API_URL );
			if ( !$checker->checkLicenseKey() ) { // license key not confirmed by remote server
				$this->errorMsg = $checker->getMessage();
				return false;
			} else { // license key verified! save it into the file
				return $license_key;
			}
		}
	}

	function license_reset_callback() {
		ob_clean();
		$is_delete = $_POST['delete'];
		if ( $is_delete ) {
			delete_option( self::THEME_SLUG . '_license_activation_cache' );
			delete_option( self::THEME_SLUG . '_license_key' );
			delete_option( self::THEME_SLUG . '_is_activated' );
			_e( 'License has been reseted', self::THEME_SLUG );
		}
		die();
	}

	function license_verify_callback() {
		ob_clean();
		error_reporting(0);
		require_once $this->path . 'Am/LicenseChecker.php';
		$response = array();
		$data = $_POST['auth_data'];
		parse_str( $data, $auth_data );

		if ( !wp_verify_nonce( $auth_data['inkthemes_license_nonce'], 'inkthemes_license' ) ) {
			$this->is_error = true;
			$response['error'] = __( 'There is some error.', self::THEME_SLUG );
		}

		$key = $auth_data['inkthemes_license_key'];

		if ( empty( $key ) ) {
			$response['error'] = __( 'Please enter a license key', self::THEME_SLUG );
			$this->is_error = true;
		}

		if ( !$this->is_error ) {
			$license_key = trim( $key );
			if ( !strlen( $license_key ) ) { // we have no saved key? so we need to ask it and verify it
				$is_ok = $this->license_check( $key );
				if ( !$is_ok ) {
					$response['error'] = $this->errorMsg;
					$this->is_error = true;
				}
			}
		}


		if ( !$this->is_error ) {
			// now second, optional stage - check activation and binding of application
			$activation_cache = trim( $this->activation_cache );
			$prev_activation_cache = $activation_cache; // store previous value to detect change
			$checker = new Am_LicenseChecker( $license_key, self::API_URL );
			$ret = empty( $activation_cache ) ?
					$checker->activate( $activation_cache ) : // explictly bind license to new installation
					$checker->checkActivation( $activation_cache ); // just check activation for subscription expriation, etc.

			if ( !$ret ) {
				$response['error'] = "Activation failed: (" . $checker->getCode() . ') ' . $checker->getMessage();
				update_option( self::THEME_SLUG . '_is_activated', false );
				$this->is_error = true;
			} else {
				update_option( self::THEME_SLUG . '_license_key', $license_key );
				// in any case we need to store results to avoid repeative calls to remote api
				if ( $prev_activation_cache != $activation_cache ) {
					update_option( self::THEME_SLUG . '_license_activation_cache', $activation_cache );
				}
				update_option( self::THEME_SLUG . '_is_activated', true );
			}
			$response['response'][] = $checker->getMessage();
			$response['response'][] = $checker->getCode();
		}


		if ( !$this->is_error ) {
			$response['activated'] = __( 'Your license has been activated.', self::THEME_SLUG );
		}

		echo json_encode( $response );
		die();
	}

}

add_action( 'init', array( 'InkThemes_License', 'Init' ) );
