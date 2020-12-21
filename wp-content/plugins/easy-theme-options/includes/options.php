<?php

/* ----------------------------------------
* To retrieve a value use: $eto_options[$prefix.'var']
----------------------------------------- */

$prefix = 'eto_';

/* ----------------------------------------
* Create the TABS
----------------------------------------- */

$eto_custom_tabs = array(
		array(
			'label'=> __('Màu sắc', 'eto'),
			'id'	=> $prefix.'general'
		),
		array(
			'label'=> __('Logo và liên kết', 'eto'),
			'id'	=> $prefix.'logo_and_link'
		),
		array(
			'label'=> __('Liên hệ', 'eto'),
			'id'	=> $prefix.'contact'
		),
		array(
			'label'=> __('Số lượng sản phẩm', 'eto'),
			'id'	=> $prefix.'number_products'
		),
		array(
			'label'=> __('Footer', 'eto'),
			'id'	=> $prefix.'footer'
		),
	);

/* ----------------------------------------
* Options Field Array
----------------------------------------- */

$eto_custom_meta_fields = array(

	/* -- TAB 1 -- */
	array(
		'id'	=> $prefix.'general', // Use data in $eto_custom_tabs
		'type'	=> 'tab_start'
	),

	array(
		'label'=> 'Màu sắc trang',
		'id'	=> 'color_of_page',
		'type'	=> 'colorpicker'
	),
	array(
		'label'=> 'Màu sắc Header',
		'id'	=> 'header_top_color',
		'type'	=> 'colorpicker'
	),
	array(
		'label'=> 'Màu Sub Header',
		'id'	=> 'sub_header_top_color',
		'type'	=> 'colorpicker'
	),
	array(
		'label'=> 'Màu Hộp thoại liên lạc',
		'id'	=> 'contact_float_color',
		'type'	=> 'colorpicker'
	),

	array(
		'type'	=> 'tab_end'
	),
	/* -- /TAB 1 -- */

	/* -- TAB 2 -- */
	array(
		'id'	=> $prefix.'logo_and_link', // Use data in $eto_custom_tabs
		'type'	=> 'tab_start'
	),

	array(
		'label'=> 'Facebook',
		'desc'	=> 'Liên kết tới facebook của shop',
		'id'	=> 'url_facebook',
		'type'	=> 'text'
	),
	array(
		'label'=> 'Google',
		'desc'	=> 'Liên kết tài khoản google của shop',
		'id'	=> 'url_google',
		'type'	=> 'text'
	),
	array(
		'label'=> 'Twitter',
		'desc'	=> 'Liên kết twitter của shop',
		'id'	=> 'url_twitter',
		'type'	=> 'text'
	),
	array(
		'label'=> 'LinkedIn',
		'desc'	=> 'Liên kết LinkedIn của shop',
		'id'	=> 'url_linkedin',
		'type'	=> 'text'
	),
	array(
		'label'	=> 'Logo Header',
		'desc'	=> 'Logo của shop',
		'id'	=> 'logo_header',
		'type'	=> 'image'
	),
	array(
		'label'	=> 'No avatar',
		'desc'	=> 'Khi người dùng không có ảnh đại diện',
		'id'	=> 'no_avatar',
		'type'	=> 'image'
	),

	array(
		'type'	=> 'tab_end'
	),
	/* -- /TAB 2 -- */

	/* -- TAB 3 -- */
	array(
		'id'	=> $prefix.'contact', // Use data in $eto_custom_tabs
		'type'	=> 'tab_start'
	),

	array(
		'label'=> 'Form Hổ trợ',
		'id1'	=> 'support_name',
		'id2'	=> 'support_phone',
		'type'	=> 'repeatable',
	),
	array(
		'label'=> 'Facebook Chat',
		'id'	=> 'facebook_chat',
		'type'	=> 'text'
	),
	array(
		'label'=> 'Zalo Chat',
		'id'	=> 'zalo_chat',
		'type'	=> 'text'
	),
	array(
		'label'=> 'Địa chỉ',
		'id'	=> 'address_info',
		'type'	=> 'text'
	),
	array(
		'label'=> 'Google Map',
		'id'	=> 'google_map',
		'type'	=> 'textarea'
	),
	array(
		'label'=> 'Copy Right',
		'id'	=> 'copy_right',
		'type'	=> 'text'
	),

	array(
		'type'	=> 'tab_end'
	),
	/* -- /TAB 3 -- */

	/* -- TAB 4 -- */
	array(
		'id'	=> $prefix.'number_products', // Use data in $eto_custom_tabs
		'type'	=> 'tab_start'
	),

	array(
		'label'=> 'Sản phẩm mới',
		'id'	=> 'amount_product_home_new',
		'type'	=> 'text'
	),
	array(
		'label'=> 'Sản phẩm Danh Mục',
		'id'	=> 'amount_product_categories',
		'type'	=> 'text'
	),

	array(
		'type'	=> 'tab_end'
	),
	/* -- /TAB 4 -- */

	/* -- TAB 5 -- */
	array(
		'id'	=> $prefix.'footer', // Use data in $eto_custom_tabs
		'type'	=> 'tab_start'
	),
	
	array(
		'label'=> 'Tiêu đề cột 1',
		'id'	=> 'first_col_title',
		'type'	=> 'text'
	),
	array(
		'label'=> 'Nội dung cột 1',
		'id'	=> 'first_col_detail',
		'type'	=> 'textarea'
	),
	array(
		'label'=> 'Tiêu đề cột 2',
		'id'	=> 'sec_col_title',
		'type'	=> 'text'
	),
	array(
		'label'=> 'Nội dung cột 2',
		'id'	=> 'sec_col_detail',
		'type'	=> 'textarea'
	),
	array(
		'label'=> 'Tiêu đề cột 3',
		'id'	=> 'third_col_title',
		'type'	=> 'text'
	),
	array(
		'label'=> 'Nội dung cột 3',
		'id'	=> 'third_col_detail',
		'type'	=> 'textarea'
	),
	array(
		'type'	=> 'tab_end'
	)
	/* -- /TAB 5 -- */
);

?>
