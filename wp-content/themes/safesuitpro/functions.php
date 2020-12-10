<?php
if (!defined('BUTTERBELLY_DIR')) {
    define('BUTTERBELLY_DIR', get_template_directory() . '/');
}
if (!defined('BUTTERBELLY_DIR_URI')) {
    define('BUTTERBELLY_DIR_URI', get_template_directory_uri() . '/');
}
/**
 * Including all the necessary library files
 */
require_once (BUTTERBELLY_DIR . 'includes/shortcodes.php');
require_once (BUTTERBELLY_DIR . 'includes/dynamic-image.php');
require_once (BUTTERBELLY_DIR . 'includes/gallery-shortcode.php');
require_once (BUTTERBELLY_DIR . 'includes/inkoption-framework/load.php');
/**
 * Including woocommerce products
 */
require_once (BUTTERBELLY_DIR . 'includes/shop_loop.php');

/**
 *  CSS files
 */
function butterbelly_add_stylesheet() {
    if (!is_admin()) {
        wp_enqueue_style('butterbelly-bootstrap', BUTTERBELLY_DIR_URI . 'assets/css/bootstrap.css');
        wp_enqueue_style('butterbelly-font-awesome', BUTTERBELLY_DIR_URI . 'assets/css/font-awesome.css');
        wp_enqueue_style('butterbelly-reset', BUTTERBELLY_DIR_URI . 'assets/css/reset.css');
        wp_enqueue_style('butterbelly-prettyPhoto', BUTTERBELLY_DIR_URI . 'assets/css/prettyPhoto.css');
        wp_enqueue_style('butterbelly-main-style', BUTTERBELLY_DIR_URI . 'style.css');
        wp_enqueue_style('butterbelly-woocommerce', BUTTERBELLY_DIR_URI . 'assets/css/woocommerce.css');
        if (butterbelly_get_option('inkthemes_altstylesheet') != 'teal-green' && butterbelly_get_option('inkthemes_altstylesheet') != NULL) {
            wp_enqueue_style('coloroptions', BUTTERBELLY_DIR_URI . "assets/css/color/" . butterbelly_get_option('inkthemes_altstylesheet') . ".css", '', '', 'all');
        }
        wp_enqueue_style('butterbelly-shortcode', BUTTERBELLY_DIR_URI . 'assets/css/shortcode.css');
        wp_enqueue_style('butterbelly-responsive', BUTTERBELLY_DIR_URI . 'assets/css/responsive.css');
        wp_enqueue_style('butterbelly-mobile-meanmenu-css', BUTTERBELLY_DIR_URI . 'assets/css/meanmenu.css');
        wp_enqueue_style('butterbelly-gallery', BUTTERBELLY_DIR_URI . 'assets/css/gallery.css');
        wp_enqueue_style('butterbelly-zoombox-gallery', BUTTERBELLY_DIR_URI . 'assets/css/zoombox-gal.css');
        if (butterbelly_get_option('inkthemes_lanstylesheet') != 'Default' && butterbelly_get_option('inkthemes_altstylesheet') != NULL) {
            wp_enqueue_style('rtloptions', BUTTERBELLY_DIR_URI . "assets/css/color/" . butterbelly_get_option('inkthemes_lanstylesheet') . ".css", '', '', 'all');
        }
    }
}

add_action('wp_enqueue_scripts', 'butterbelly_add_stylesheet');

/**
 * Javascript files
 */
function butterbelly_wp_enqueue_scripts() {
    if (!is_admin()) {
        wp_enqueue_script('butterbelly-ddsmoothmenu', BUTTERBELLY_DIR_URI . 'assets/js/ddsmoothmenu.js', array('jquery'), '', true);
        wp_enqueue_script('butterbelly-slides', BUTTERBELLY_DIR_URI . 'assets/js/jquery.flexslider-min.js', array('jquery'), '', true);
        wp_enqueue_script('butterbelly-smartTab', BUTTERBELLY_DIR_URI . 'assets/js/jquery.smartTab.js', array('jquery'), '', true);
        wp_enqueue_script('butterbelly-validate', BUTTERBELLY_DIR_URI . 'assets/js/jquery.validate.min.js', array('jquery'), '', true);
        wp_enqueue_script('butterbelly-mobile-mean-menu', BUTTERBELLY_DIR_URI . 'assets/js/jquery.meanmenu.min.js', array('jquery'), '', true);
        wp_enqueue_script('butterbelly-captcha-js', 'https://www.google.com/recaptcha/api.js', array('jquery'));
        wp_enqueue_script('butterbelly-masonry-js', BUTTERBELLY_DIR_URI . 'assets/js/masonry.pkgd.min.js', array('jquery'), '', true);
        wp_enqueue_script('butterbelly-gal-zoombox', BUTTERBELLY_DIR_URI . 'assets/js/zoombox.js', array('jquery'), '', true);
        wp_enqueue_script('butterbelly-gal-prettyPhoto', BUTTERBELLY_DIR_URI . 'assets/js/jquery.prettyPhoto.js', array('jquery'), '', true);
        wp_enqueue_script('butterbelly-custom', BUTTERBELLY_DIR_URI . 'assets/js/custom.js', array('jquery'), '', true);
    }
    /**
     * Enqueue comment thread js
     */
    if (is_singular() and get_site_option('thread_comments')) {
        wp_print_scripts('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'butterbelly_wp_enqueue_scripts');

function butterbelly_get_option($name, $default = '') {
    $value = InkOption_Framwork_OptionSetup::get_option_value(esc_attr($name));
    if ($value != '') {
        return $value;
    } else {
        return $default;
    }
}

function butterbelly_update_option($name, $value) {
    return InkOption_Framwork_OptionSetup::update_option_value(esc_attr($name), esc_html($value));
}

function butterbelly_delete_option($name) {
    $options = get_option('inkthemes_options');
    unset($options[$name]);
    return update_option('inkthemes_options', $options);
}

/**
 * Lite To Pro Data Loss Prevention Procedure
 */
$butterbelly_lite_theme_option = array(
    'inkthemes_logo' => 'butterbelly_logo',
    'inkthemes_favicon' => 'butterbelly_favicon',
    'inkthemes_nav' => 'butterbelly_nav',
    'inkthemes_slideimage1' => 'butterbelly_slideimage1',
    'inkthemes_sliderheading1' => 'butterbelly_sliderheading1',
    'inkthemes_Sliderlink1' => 'butterbelly_Sliderlink1',
    'inkthemes_sliderdes1' => 'butterbelly_sliderdes1',
    'inkthemes_slider_button1' => 'butterbelly_slider_button1',
    'inkthemes_blog_heading' => 'inkthemes_blog_heading',
    'inkthemes_blog_desc' => 'inkthemes_blog_desc',
    'inkthemes_fimg1' => 'butterbelly_fimg1',
    'inkthemes_circle_img1' => 'butterbelly_circle_img1',
    'inkthemes_headline1' => 'butterbelly_headline1',
    'inkthemes_firstdesc' => 'butterbelly_firstdesc',
    'inkthemes_feature_link1' => 'butterbelly_feature_link1',
    'inkthemes_fimg2' => 'butterbelly_fimg2',
    'inkthemes_circle_img2' => 'butterbelly_circle_img2',
    'inkthemes_headline2' => 'butterbelly_headline2',
    'inkthemes_seconddesc' => 'butterbelly_seconddesc',
    'inkthemes_feature_link2' => 'butterbelly_feature_link2',
    'inkthemes_fimg3' => 'butterbelly_fimg3',
    'inkthemes_circle_img3' => 'butterbelly_circle_img3',
    'inkthemes_headline3' => 'butterbelly_headline3',
    'inkthemes_thirddesc' => 'butterbelly_thirddesc',
    'inkthemes_feature_link3' => 'butterbelly_feature_link3',
    'inkthemes_customcss' => 'butterbelly_customcss',
    'inkthemes_toprights' => 'butterbelly_topright',
);
$inkthemes_litetopro_data_update = get_option('inkthemes_litetopro_data_update');
if (empty($inkthemes_litetopro_data_update)) {
    $options = get_option('butterbelly_options');
    if (!empty($options)) {
        foreach ($options as $key => $val) {
            $key = array_search($key, $butterbelly_lite_theme_option);
            if ($val != '') {
                butterbelly_update_option($key, $val);
            }
        }
        update_option('inkthemes_litetopro_data_update', '1');
    }
}

function butterbelly_taptocall_bg() {
    $top_gredient = butterbelly_get_option('inkthemes_tapto_backtop');
    $bottom_gredient = butterbelly_get_option('inkthemes_tapto_backbottom');
    $box_shadow = butterbelly_get_option('inkthemes_tapto_box_shadow');
    $text_shadow = butterbelly_get_option('inkthemes_tapto_text_shadow');
    $text_color = butterbelly_get_option('inkthemes_tapto_text_color');
    $border_color = butterbelly_get_option('inkthemes_tapto_border_color');
    $tap_tocall = '';
    $tap_tocall = '<style>';
    $tap_tocall .= '.taptocall a.btn {';
    if ($top_gredient != '') {
        $tap_tocall .= "background: $top_gredient;";
    }
    if ($bottom_gredient != '' && $top_gredient != '') {
        $tap_tocall .= "background: -webkit-gradient(linear, left top, left bottom, from($top_gredient), to($bottom_gredient));";
        $tap_tocall .= "background: -moz-linear-gradient(top, $top_gredient, $bottom_gredient);";
        $tap_tocall .= "background: linear-gradient(to bottom, $top_gredient, $bottom_gredient);";
    }
    if ($box_shadow != '') {
        $tap_tocall .= "-webkit-box-shadow: $box_shadow 0px 2px 0px 0px;";
        $tap_tocall .= "-moz-box-shadow: $box_shadow 0px 2px 0px 0px;";
        $tap_tocall .= "box-shadow: $box_shadow 0px 2px 0px 0px;";
    }
    if ($border_color != '') {
        $tap_tocall .= "border: 1px solid $border_color;";
    }
    if ($text_shadow != '') {
        $tap_tocall .= "text-shadow: $text_shadow 1px 0px 2px;";
    }
    if ($text_color != '') {
        $tap_tocall .= "color: $text_color;";
    }
    $tap_tocall .= '}';
    $tap_tocall .= '.taptocall a.btn:hover {';
    if ($top_gredient != '') {
        $tap_tocall .= "background: $bottom_gredient;";
    }
    if ($bottom_gredient != '' && $top_gredient != '') {
        $tap_tocall .= "background: -webkit-gradient(linear, left top, left bottom, from($bottom_gredient), to($top_gredient));";
        $tap_tocall .= "background: -moz-linear-gradient(top, $bottom_gredient, $top_gredient);";
        $tap_tocall .= "background: linear-gradient(to bottom, $bottom_gredient, $top_gredient);";
    }
    $tap_tocall .= '}';
    $tap_tocall .= '</style>';

    echo $tap_tocall;
}

add_action('wp_head', 'butterbelly_taptocall_bg');

function butterbelly_setup() {
    /**
     * Post thumbnail support
     */
    add_image_size('custom-size', 263);

    add_theme_support('post-thumbnails');
    add_image_size('post_thumbnail', 600, 250, true);
    add_theme_support('title-tag');
    add_theme_support('woocommerce');
    /**
     * Gutenberg Wide Alignment support
     */
    add_theme_support('align-wide');
    /**
     * Automatic feed links support
     */
    add_theme_support('automatic-feed-links');
    /**
     * Intialize language files 
     */
    load_theme_textdomain('butterbelly', get_template_directory() . '/languages');
    register_nav_menu('custom_menu', __('Main Menu', 'butterbelly'));
    register_nav_menu('custom_menu_footer', __('Footer Menu', 'butterbelly'));

    if (!isset($content_width))
        $content_width = 590;
}

add_action('after_setup_theme', 'butterbelly_setup');

function butterbelly_add_menuclass($ulclass) {
    return preg_replace('/<ul>/', '<ul class="ddsmoothmenu">', $ulclass, 1);
}

add_filter('wp_page_menu', 'butterbelly_add_menuclass');

function butterbelly_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'custom_menu', 'container_id' => 'menu', 'menu_class' => 'ddsmoothmenu', 'fallback_cb' => 'butterbelly_nav_fallback'));
    else
        butterbelly_nav_fallback();
}

function butterbelly_nav_fallback() {
    ?>
    <div id="menu">
        <ul class="ddsmoothmenu">
            <?php
            wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
            ?>
        </ul>
    </div>
    <?php
}

function butterbelly_nav_menu_items($items) {
    if (is_home()) {
        $homelink = '<li class="current_page_item">' . '<a href="' . esc_url(home_url('/')) . '">' . __('Home', 'butterbelly') . '</a></li>';
    } else {
        $homelink = '<li>' . '<a href="' . esc_url(home_url('/')) . '">' . __('Home', 'butterbelly') . '</a></li>';
    }
    $items = $homelink . $items;
    return $items;
}

function butterbelly_footer_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'custom_menu_footer', 'container_id' => 'footer_nav', 'menu_class' => 'footer_nav', 'fallback_cb' => 'butterbelly_footer_nav_fallback'));
    else
        butterbelly_footer_nav_fallback();
}

function butterbelly_footer_nav_fallback() {
    ?>
    <div>
        <ul class="footer_nav">
            <?php
            wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
            ?>
        </ul>
    </div>
    <?php
}

add_filter('wp_list_pages', 'butterbelly_nav_menu_items');

/**
 * Adding body background in the theme using function
 */
function butterbelly_body_background() {
    $bg_url = esc_url(butterbelly_get_option('inkthemes_bodybg'));
    if ($bg_url != '') {
        ?>
        <style type="text/css">
            body{ background:fixed url('<?php echo $bg_url; ?>'); }
        </style>
        <?php
    }
}

add_action('wp_head', 'butterbelly_body_background');

/**
 * Breadcrumbs 
 * @global type $post
 * @global type $wp_query
 * @global type $author
 */
function butterbelly_breadcrumbs() {
    $delimiter = '&raquo;';
    $home = __('Home', 'butterbelly'); // text for the 'Home' link
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb
    echo '<h1 id="crumbs">';
    global $post;
    $homeLink = esc_url(home_url());
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
    if (is_category()) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0)
            echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
        echo $before . __('Archive by category', 'butterbelly') . single_cat_title('', false) . '"' . $after;
    }
    elseif (is_day()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('d') . $after;
    } elseif (is_month()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('F') . $after;
    } elseif (is_year()) {
        echo $before . get_the_time('Y') . $after;
    } elseif (is_single() && !is_attachment()) {
        if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } else {
            $cat = get_the_category();
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo $before . get_the_title() . $after;
        }
    } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        echo $before . $post_type->labels->singular_name . $after;
    } elseif (is_attachment()) {
        $parent = get_post($post->post_parent);
        $cat = get_the_category($parent->ID);
        $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_page() && !$post->post_parent) {
        echo $before . get_the_title() . $after;
    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb)
            echo $crumb . ' ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_search()) {
        echo $before . __('Search results for', 'butterbelly') . '"' . get_search_query() . '"' . $after;
    } elseif (is_tag()) {
        echo $before . __('Posts tagged', 'butterbelly') . '"' . single_tag_title('', false) . '"' . $after;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo $before . __('Articles posted by ', 'butterbelly') . $userdata->display_name . $after;
    } elseif (is_404()) {
        echo $before . __('Error 404', 'butterbelly') . $after;
    }
    if (get_query_var('paged')) {
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ' (';
        echo __('Page', 'butterbelly') . ' ' . get_query_var('paged');
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ')';
    }
    echo '</h1>';
}

/**
 * This function thumbnail id and
 * returns thumbnail image
 * @param type $iw
 * @param type $ih 
 */
function butterbelly_get_thumbnail($iw, $ih, $id = "") {
    $permalink = get_permalink($id);
    $thumb = get_post_thumbnail_id();
    $image = butterbelly_thumbnail_resize($thumb, '', $iw, $ih, true, 90);
    if ($thumb) {
        if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
            print "<a href='$permalink'><img class='postimg' src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' /></a>";
        }
    }
}

/**
 * This function gets image width and height and
 * Prints attached images from the post        
 */
function butterbelly_get_image($width, $height) {
    $return = false;
    $w = $width;
    $h = $height;
    global $post, $posts;
//This is required to set to Null
    $img_source = '';
    $permalink = get_permalink();
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if (isset($matches [1] [0])) {
        $img_source = $matches [1] [0];
    }
    if ($img_source) {
        $img_path = butterbelly_image_resize($img_source, $w, $h);
        if (!empty($img_path)) {
            if ($return) {
                return "<a href='$permalink'><img src='{$img_path['url']}' class='postimg img-thumbnail' alt='Post Image'/></a>";
            } else {
                echo "<a href='$permalink'><img src='{$img_path['url']}' class='postimg img-thumbnail' alt='Post Image'/></a>";
            }
        }
    }
}

/**
 * For Attachment Page
 * Prints HTML with meta information for the current post (category, tags and permalink).
 */
function butterbelly_posted_in() {
// Retrieves tag list of current post, separated by commas.
    $tag_list = get_the_tag_list('', ', ');
    if ($tag_list) {
        $posted_in = __('This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'butterbelly');
    } elseif (is_object_in_taxonomy(get_post_type(), 'category')) {
        $posted_in = __('This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'butterbelly');
    } else {
        $posted_in = __('Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'butterbelly');
    }
// Prints the string, replacing the placeholders.
    printf(
            $posted_in, get_the_category_list(', '), $tag_list, get_permalink(), the_title_attribute('echo=0')
    );
}

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @uses register_sidebar
 */
function butterbelly_widgets_init() {
    /**
     *  Area 1, located at the top of the sidebar.
     */
    register_sidebar(array(
        'name' => __('Primary Widget Area', 'butterbelly'),
        'id' => 'primary-widget-area',
        'description' => __('The primary widget area', 'butterbelly'),
        'before_widget' => '<div id="%1$s" class="widget_area %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<span class="widget_heading">',
        'after_title' => '</span>',
    ));
    /**
     *  Area 2, Homepage sidebar widget area.
     */
    register_sidebar(array(
        'name' => __('Home Page Sidebar Feature widget area', 'butterbelly'),
        'id' => 'home-page-widget-area',
        'description' => __('The Home Page Sidebar Feature widget area', 'butterbelly'),
        'before_widget' => '<div id="%1$s" class="widget_area %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<span class="widget_heading">',
        'after_title' => '</span>',
    ));
    /**
     *  Area 3, located in the footer. Empty by default.
     */
    register_sidebar(array(
        'name' => __('First Footer Widget Area', 'butterbelly'),
        'id' => 'first-footer-widget-area',
        'description' => __('The first footer widget area', 'butterbelly'),
        'before_widget' => '<div id="%1$s" class="widget_area %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<span class="widget_heading">',
        'after_title' => '</span>',
    ));
    /**
     *  Area 4, located in the footer. Empty by default.
     */
    register_sidebar(array(
        'name' => __('Second Footer Widget Area', 'butterbelly'),
        'id' => 'second-footer-widget-area',
        'description' => __('The second footer widget area', 'butterbelly'),
        'before_widget' => '<div id="%1$s" class="widget_area %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<span class="widget_heading">',
        'after_title' => '</span>',
    ));
    /**
     *  Area 5, located in the footer. Empty by default.
     */
    register_sidebar(array(
        'name' => __('Third Footer Widget Area', 'butterbelly'),
        'id' => 'third-footer-widget-area',
        'description' => __('The third footer widget area', 'butterbelly'),
        'before_widget' => '<div id="%1$s" class="widget_area %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<span class="widget_heading">',
        'after_title' => '</span>',
    ));
    /**
     *  Area 6, located in the footer. Empty by default.
     */
    register_sidebar(array(
        'name' => __('Fourth Footer Widget Area', 'butterbelly'),
        'id' => 'fourth-footer-widget-area',
        'description' => __('The fourth footer widget area', 'butterbelly'),
        'before_widget' => '<div id="%1$s" class="widget_area %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<span class="widget_heading">',
        'after_title' => '</span>',
    ));
}

add_action('widgets_init', 'butterbelly_widgets_init');

/**
 * Pagination
 *
 */
function butterbelly_pagination($pages = '', $range = 2) {
    $showitems = ($range * 2) + 1;
    global $paged;
    if (empty($paged))
        $paged = 1;
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    if (1 != $pages) {
        echo "<ul class='paging'>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link(1) . "'>&laquo;</a></li>";
        if ($paged > 1 && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a></li>";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                echo ($paged == $i) ? "<li><a href='" . get_pagenum_link($i) . "' class='current' >" . $i . "</a></li>" : "<li><a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a></li>";
            }
        }
        if ($paged < $pages && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a></li>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($pages) . "'>&raquo;</a></li>";
        echo "</ul>\n";
    }
}

/**
 *  Add Favicon
 */
function butterbelly_childtheme_favicon() {
    if (butterbelly_get_option('inkthemes_favicon') != '') {
        echo '<link rel="shortcut icon" href="' . butterbelly_get_option('inkthemes_favicon') . '"/>' . "\n";
    } else {
        ?>
        <link rel="shortcut icon" href="<?php echo BUTTERBELLY_DIR_URI . 'assets/images/favicon.ico'; ?>" />
        <?php
    }
}

add_action('wp_head', 'butterbelly_childtheme_favicon');

/**
 *  Show analytics code in footer 
 */
function butterbelly_childtheme_analytics() {
    $output = butterbelly_get_option('inkthemes_analytics');
    if ($output <> "")
        echo stripslashes($output);
}

add_action('wp_head', 'butterbelly_childtheme_analytics');

/**
 *  Custom CSS Styles 
 */
function butterbelly_of_head_css() {
    $output = '';
    $custom_css = butterbelly_get_option('inkthemes_customcss');
    if ($custom_css <> '') {
        $output .= $custom_css . "\n";
    }
    /**
     *  Output styles
     */
    if ($output <> '') {
        $output = "<!-- Custom Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
        echo $output;
    }
}

add_action('wp_head', 'butterbelly_of_head_css');

/**
 * Get category 
 * @param type $cat_name
 * @return type activate support for thumbnails
 */
function butterbelly_get_category_id($cat_name) {
    $term = get_term_by('name', $cat_name, 'category');
    return $term->term_id;
}

/**
 * Trm excerpt
 */
function butterbelly_custom_trim_excerpt($length) {
    global $post;
    $explicit_excerpt = $post->post_excerpt;
    if ('' == $explicit_excerpt) {
        $text = get_the_content('');
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
    } else {
        $text = apply_filters('the_content', $explicit_excerpt);
    }
    $text = strip_shortcodes($text); // optional
    $text = strip_tags($text);
    $excerpt_length = $length;
    $words = explode(' ', $text, $excerpt_length + 1);
    if (count($words) > $excerpt_length) {
        array_pop($words);
        array_push($words, '...');
        $text = implode(' ', $words);
        $text = apply_filters('the_excerpt', $text);
    }
    return $text;
}

function butterbelly_image_post($post_id) {
    add_post_meta($post_id, 'img_key', 'on');
}

/**
 * Trm post title
 */
function butterbelly_the_titlesmall($before = '', $after = '', $echo = true, $length = false) {
    $title = get_the_title();
    if ($length && is_numeric($length)) {
        $title = substr($title, 0, $length);
    }
    if (strlen($title) > 0) {
        $title = apply_filters('butterbelly_the_titlesmall', $before . $title . $after, $before, $after);
        if ($echo)
            echo $title;
        else
            return $title;
    }
}

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title', 'my_fnc', '10');

function my_fnc() {
    $related = get_query_var('related_products');
    if (TRUE == $related) {
        echo woocommerce_get_product_thumbnail('custom-size');    // Our new image size
    } else {
        echo woocommerce_get_product_thumbnail('custom-size');   // Default Image Size
    }
}

/**
 * iframe sanitization
 */
function esc_sanitize_iframe($value) {
    $array = wp_kses_allowed_html('post');
    $allowedtags = array(
        'iframe' => array(
            'width' => array(),
            'height' => array(),
            'frameborder' => array(),
            'scrolling' => array(),
            'src' => array(),
            'marginwidth' => array(),
            'marginheight' => array()
        )
    );
    $data = array_merge($allowedtags, $array);
    $value = wp_kses($value, $data);
    return $value;
}
?>
