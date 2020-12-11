<?php
/**
 * supermarket-ecommerce functions and definitions
 *
 * @package WordPress
 * @subpackage supermarket-ecommerce
 * @since 1.0
 */

function supermarket_ecommerce_setup() {

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-background', $defaults = array(
    'default-color'          => '',
    'default-image'          => '',
    'default-repeat'         => '',
    'default-position-x'     => '',
    'default-attachment'     => '',
    'wp-head-callback'       => '_custom_background_cb',
    'admin-head-callback'    => '',
    'admin-preview-callback' => ''
	));

	add_image_size( 'supermarket-ecommerce-featured-image', 2000, 1200, true );

	add_image_size( 'supermarket-ecommerce-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'supermarket-ecommerce' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	* Enable support for Post Formats.
	*
	* See: https://codex.wordpress.org/Post_Formats
	*/
	add_theme_support( 'post-formats', array('image','video','gallery','audio') );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', supermarket_ecommerce_fonts_url() ) );

	// Theme Activation Notice
	global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'supermarket_ecommerce_activation_notice' );
	}

}
add_action( 'after_setup_theme', 'supermarket_ecommerce_setup' );

// Notice after Theme Activation
function supermarket_ecommerce_activation_notice() {
	echo '<div class="notice notice-success is-dismissible start-notice">';
		echo '<h3>'. esc_html__( 'Welcome to Luzuk!!', 'supermarket-ecommerce' ) .'</h3>';
		echo '<p>'. esc_html__( 'Thank you for choosing Supermarket Ecommerce theme. It will be our pleasure to have you on our Welcome page to serve you better.', 'supermarket-ecommerce' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=supermarket_ecommerce_guide' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'supermarket-ecommerce' ) .'</a></p>';
	echo '</div>';
}

function supermarket_ecommerce_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'supermarket-ecommerce' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'supermarket-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 2', 'supermarket-ecommerce' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'supermarket-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'supermarket-ecommerce' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'supermarket-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'supermarket-ecommerce' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'supermarket-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'supermarket-ecommerce' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'supermarket-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'supermarket-ecommerce' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'supermarket-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'supermarket-ecommerce' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'supermarket-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'supermarket_ecommerce_widgets_init' );

function supermarket_ecommerce_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

//Enqueue scripts and styles.
function supermarket_ecommerce_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'supermarket-ecommerce-fonts', supermarket_ecommerce_fonts_url(), array(), null );

	// CUSTOM CSS
	wp_enqueue_style( 'custom-style', get_template_directory_uri().'/assets/css/custom-style.css' );
	wp_enqueue_style( 'custom-login', get_template_directory_uri().'/assets/css/custom-login.css' );



	//Bootstarp

	// Theme stylesheet.
	wp_enqueue_style( 'supermarket-ecommerce-basic-style', get_stylesheet_uri() );

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'supermarket-ecommerce-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'supermarket-ecommerce-style' ), '1.0' );
		wp_style_add_data( 'supermarket-ecommerce-ie9', 'conditional', 'IE 9' );
	}
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'supermarket-ecommerce-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'supermarket-ecommerce-style' ), '1.0' );
	wp_style_add_data( 'supermarket-ecommerce-ie8', 'conditional', 'lt IE 9' );

	//font-awesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'supermarket-ecommerce-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$supermarket_ecommerce_l10n=array();

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'supermarket-ecommerce-navigation-jquery', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$supermarket_ecommerce_l10n['expand']         = __( 'Expand child menu', 'supermarket-ecommerce' );
		$supermarket_ecommerce_l10n['collapse']       = __( 'Collapse child menu', 'supermarket-ecommerce' );
	}

	wp_enqueue_script( 'supermarket-ecommerce-navigation-jquery', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'supermarket-ecommerce-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/assets/js/jquery.superfish.js', array('jquery') ,'',true);

	/**
	 * Login
	 */
	wp_enqueue_script( 'custom-login', get_template_directory_uri() . '/assets/js/custom.login.js', array('jquery') ,'',true);



	wp_localize_script( 'supermarket-ecommerce-skip-link-focus-fix', 'supermarket_ecommerceScreenReaderText', $supermarket_ecommerce_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


	wp_enqueue_style( 'autoptimize', get_template_directory_uri().'/assets/css/autoptimize.css' );
}
add_action( 'wp_enqueue_scripts', 'supermarket_ecommerce_scripts' );

function supermarket_ecommerce_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'supermarket_ecommerce_front_page_template' );

function supermarket_ecommerce_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function supermarket_ecommerce_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

//footer Link
// define('SUPERMARKET_ECOMMERCE_LIVE_DEMO','https://www.luzuk.com/demo/supermarket-ecommerce/','supermarket-ecommerce');
// define('SUPERMARKET_ECOMMERCE_PRO_DOCS','https://www.luzuk.com/demo/supermarket-ecommerce/documentation/','supermarket-ecommerce');
// define('SUPERMARKET_ECOMMERCE_BUY_NOW','https://www.luzuk.com/themes/wordpress-ecommerce-theme/','supermarket-ecommerce');
// define('SUPERMARKET_ECOMMERCE_SUPPORT','https://wordpress.org/support/theme/supermarket-ecommerce/','supermarket-ecommerce');
// define('SUPERMARKET_ECOMMERCE_CREDIT','https://www.luzuk.com/themes/free-wordpress-ecommerce-theme/','supermarket-ecommerce');

define('TEMPLATE_PATH',get_bloginfo('template_url'));
define('HOME_URL',get_home_url());
define('BlOG_NAME',get_bloginfo('blog_name'));
define('SLOGAN', get_bloginfo('description'));

if ( ! function_exists( 'supermarket_ecommerce_credit' ) ) {
	function supermarket_ecommerce_credit(){
		// echo "<a href=".esc_url(SUPERMARKET_ECOMMERCE_CREDIT)." target='_blank'>".esc_html__('Ecommerce WordPress Theme','supermarket-ecommerce')."</a>";
	}
}

/* Excerpt Limit Begin */
function supermarket_ecommerce_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'supermarket_ecommerce_loop_columns');
	if (!function_exists('supermarket_ecommerce_loop_columns')) {
		function supermarket_ecommerce_loop_columns() {
	return 3; // 3 products per row
	}
}


add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // Return the number of products you wanna show per page.
  $cols = 15;
  return $cols;
}

require get_parent_theme_file_path( '/inc/custom-header.php' );

require get_parent_theme_file_path( '/inc/template-tags.php' );

require get_parent_theme_file_path( '/inc/template-functions.php' );

require get_parent_theme_file_path( '/inc/customizer.php' );

require get_parent_theme_file_path( '/inc/getting-started/getting-started.php' );

function is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php', 'my-account.php'));
}

/* Custom Post Type Start */
function create_posttype() {
  $supports = array(
    'title', // post title
    'thumbnail', // featured images
    );
	register_post_type( 'ads',
  // CPT Options

	array(
	  'labels' => array(
	   'name' => __( 'ads' ),
	   'singular_name' => __( 'Advertisments' )
	  ),
	  'public' => true,
	  'has_archive' => false,
    'rewrite' => array('slug' => 'ads'),
    'supports' => $supports,
	 )
	);
}

function create_post_tin_tuc() {
	// $supports = array(
	//   'title', // post title
	//   'thumbnail', // featured images
	//   'editor',
	//   'excerpt',
	//   'author',
	//   'comments',
	//   'revisions',
	//   'custom-fields',
	// );
	// register_post_type(
	// 	'news',
	// 	array(
	// 		'labels' => array(
	// 			'name'                => _x( 'Tin tức' ),
	// 			'singular_name'       => _x( 'Tin tức' ),
	// 			'menu_name'           => __( 'Tin tức' ),
	// 			'parent_item_colon'   => __( 'Tin tức' ),
	// 			'all_items'           => __( 'Tất cả tin tức' ),
	// 			'view_item'           => __( 'Xem tin tức' ),
	// 			'add_new_item'        => __( 'Tạo mới tin tức' ),
	// 			'add_new'             => __( 'Tạo mới' ),
	// 			'edit_item'           => __( 'Chỉnh sửatin tức' ),
	// 			'update_item'         => __( 'Cập nhật tin tức' ),
	// 			'search_items'        => __( 'Tìm tin tức' ),
	// 			'not_found'           => __( 'Không tìm ra tin tức' ),
	// 			'not_found_in_trash'  => __( 'Không tìm ra tin tức trong thùng rác' ),
	// 		),
	// 		'public' => true,
	// 		'has_archive' => false,
	// 		'rewrite' => array('slug' => 'tin-tuc-bao-ho'),
	// 		'supports' => $supports,
	// 		'taxonomies' => array( 'genres' ),
	// 		'show_ui'             => true,
	// 		'show_in_menu'        => true,
	// 		'show_in_nav_menus'   => true,
	// 		'show_in_admin_bar'   => true,
	// 		'publicly_queryable'  => true,
	// 		'capability_type'     => 'post',
	// 		'show_in_rest' => true,
	// 	)
	// );
	$supports = array(
		'title', // post title
		'thumbnail', // featured images
		'editor',
		'excerpt',
		'author',
		'comments',
		'revisions',
		'custom-fields',
		);
		register_post_type( 'tin_tuc',
	  // CPT Options

		array(
			'labels' => array(
					'name' => __( 'Tin tức' ),
					'singular_name' => __( 'Tin tức' )
				),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'tin-tuc'),
			'taxonomies' => array( 'genres' ),
			'supports' => $supports,
		)
	);
}

// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
add_action( 'init', 'create_post_tin_tuc' );

add_theme_support('post-thumbnails',array('post','page','ads','tin_tuc'));



add_filter( 'wc_add_to_cart_message_html', 'custom_add_to_cart_message_html', 10, 2 );
function custom_add_to_cart_message_html( $message, $products ) {
    $count = 0;
    foreach ( $products as $product_id => $qty ) {
        $count += $qty;
    }
    // The custom message is just below
    $added_text = sprintf( _n("%s Sản phẩm %s", "%s Sản phẩm %s", $count, "woocommerce" ),
        $count, __("đã được thêm vào giỏ hàng.", "woocommerce") );

    // Output success messages
    if ( 'yes' === get_option( 'woocommerce_cart_redirect_after_add' ) ) {
        $return_to = apply_filters( 'woocommerce_continue_shopping_redirect', wc_get_raw_referer() ? wp_validate_redirect( wc_get_raw_referer(), false ) : wc_get_page_permalink( 'shop' ) );
        $message   = sprintf( '<a href="%s" class="button wc-forward">%s</a> %s', esc_url( $return_to ), esc_html__( 'Continue shopping', 'woocommerce' ), esc_html( $added_text ) );
    } else {
        $message   = sprintf( '<a href="%s" style="margin-left: 8px!important;" class="button wc-forward">%s</a> %s', esc_url( wc_get_page_permalink( 'cart' ) ), esc_html__( 'Xem giỏ hàng', 'woocommerce' ), esc_html( $added_text ) );
    }
    return $message;
}


add_filter( 'auto_update_plugin', '__return_false' );
add_filter( 'auto_update_theme', '__return_false' );

add_action( 'after_setup_theme', 'yourtheme_setup' );

function yourtheme_setup() {
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
}


if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title'  => 'Tùy chỉnh',
		'menu_title' => 'Tùy chỉnh',
		'menu_slug'  => 'theme-general-settings'
	));
	acf_add_options_sub_page(array(
		'page_title'  => 'Màu Sắc',
		'menu_title' => 'Màu Sắc',
		'parent_slug' => 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title'  => 'Logo và liên kết',
		'menu_title' => 'Logo và liên kết',
		'parent_slug' => 'theme-general-settings',
	));
   	acf_add_options_sub_page(array(
		'page_title'  => 'Liên hệ',
		'menu_title' => 'Liên hệ',
		'parent_slug' => 'theme-general-settings',
    ));
   	acf_add_options_sub_page(array(
		'page_title'  => 'Footer',
		'menu_title' => 'Footer',
		'parent_slug' => 'theme-general-settings',
    ));
}

function post_remove ()      //creating functions post_remove for removing menu item
{
   remove_menu_page('edit.php');
}

add_action('admin_menu', 'post_remove');   //adding action for triggering function call
