<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class InkOption_Framwork {

    var $version = 1.0;
    var $path = '';
    var $path_uri = '';

    const THEME_SLUG = 'butterbelly';
    const THEME_NAME = 'butterbelly-Pro';

    function __construct() {
        $this->path = get_template_directory() . '/includes/inkoption-framework/';
        $this->path_uri = get_template_directory_uri() . '/includes/inkoption-framework/';
    }

    static function Init() {
        $obj = new self();
        include($obj->path . 'class-options-setup.php');
        include($obj->path . 'options.php');
        add_action('admin_head', array($obj, 'options_admin_head'));
        add_action('admin_menu', array($obj, 'framework_page'));
        add_action('admin_enqueue_scripts', array($obj, 'scripts'));
        add_action('wp_ajax_of_ajax_post_action', array($obj, 'option_ajax_callback'));
        $obj->reset();
    }

    function scripts() {
        $currentScreen = get_current_screen();
        if (str_replace('toplevel_page_', '', $currentScreen->id) == 'inkthemes_framework') {
            add_action("admin_print_scripts-$currentScreen->id", array($this, 'css'));
            add_action("admin_print_scripts-$currentScreen->id", array($this, 'js'));
            wp_enqueue_style('inkoption-settingstyle', $this->path_uri . 'css/setting-style.css');
            wp_enqueue_script('colorway-license-js', $this->path_uri . 'js/license-activation.js', array('jquery'));
        }
    }

    function css() {
        wp_enqueue_style('inkoption-themeoption', $this->path_uri . 'css/option-style.css');
        wp_enqueue_style('wp-color-picker');
    }

    function js() {
        wp_enqueue_script('inkoption-input-mask', $this->path_uri . 'js/jquery.maskedinput-1.2.2.js');
        wp_enqueue_script('inkoption-ajaxupload', $this->path_uri . 'js/ajaxupload.js', array('jquery'));
        wp_enqueue_script('inkoption-init-js', $this->path_uri . 'js/initjs.js', array('jquery', 'wp-color-picker'));
        if (isset($_REQUEST['reset'])) {
            $is_reset = true;
        } else {
            $is_reset = false;
        }
        $ajax_url = admin_url("admin-ajax.php");
        if (isset($_REQUEST['page']) && $_REQUEST['page'] == 'inkthemes_framework') {
            $ajax_type = 'options';
        } else {
            $ajax_type = '';
        }
        wp_localize_script('inkoption-init-js', 'inkoption_obj', array('ajax_type' => $ajax_type, 'ajax_url' => $ajax_url, 'is_reset' => $is_reset));
    }

    function framework_page() {
        add_menu_page(__('InkThemes', self::THEME_SLUG), __('InkThemes', self::THEME_SLUG), 'edit_theme_options', 'inkthemes_framework', array($this, 'theme_option_interface'), $this->path_uri . 'images/setting-icon.png', 58);
        //add_submenu_page( 'inkthemes_framework', __( 'Theme Activation', self::THEME_SLUG ), __( 'Theme Activation', self::THEME_SLUG ), 'edit_theme_options', 'inkoption-setting', array( $this, 'framework_interface' ) );
        add_submenu_page('inkthemes_framework', __('Theme Options', self::THEME_SLUG), __('Theme Options', self::THEME_SLUG), 'edit_theme_options', 'inkthemes_framework', array($this, 'theme_option_interface'));
        //remove_submenu_page('inkthemes_framework', 'inkthemes_framework');
    }

    function framework_interface() {
        include($this->path . 'template/framework.php');
    }

    function theme_option_interface() {
        include($this->path . 'template/theme-option.php');
    }

    function reset() {
        if (isset($_REQUEST['page']) && $_REQUEST['page'] == 'inkthemes_framework') {
            if (isset($_REQUEST['of_save']) && 'reset' == $_REQUEST['of_save']) {
                $options = InkOption_Framwork_OptionSetup::get_default_options();
                $this->reset_options($options, 'inkthemes_framework');
                header("Location: admin.php?page=inkthemes_framework&reset=true");
                die;
            }
        }
    }

    function option_ajax_callback() {
        global $wpdb; // this is how you get access to the database
        check_ajax_referer('theme-update-option', 'option_nonce');
        $save_type = $_POST['type'];
        //Uploads
        if ($save_type == 'upload') {
            $clickedID = $_POST['data']; // Acts as the name
            $filename = $_FILES[$clickedID];
            $filename['name'] = preg_replace('/[^a-zA-Z0-9._\-]/', '', $filename['name']);
            $override['test_form'] = false;
            $override['action'] = 'wp_handle_upload';
            $uploaded_file = wp_handle_upload($filename, $override);
            $response = array();
            if (isset($uploaded_file) && ($uploaded_file['type'] == 'image/gif' || $uploaded_file['type'] == 'image/jpeg' || $uploaded_file['type'] == 'image/pjpeg' || $uploaded_file['type'] == 'image/png' || $uploaded_file['type'] == 'image/svg+xml' ) || $uploaded_file['type'] == 'image/x-icon') {
                $upload_tracking[] = $clickedID;
                InkOption_Framwork_OptionSetup::update_option_value($clickedID, $uploaded_file['url']);
                if (!empty($uploaded_file['error'])) {
                    $response['error'] = __('Upload Error: ', self::THEME_SLUG ) . $uploaded_file['error'];
                } else {
                    $response['url'] = $uploaded_file['url'];
                }
            } else {
                $response['error'] = __('Unsupported filetype uploaded.', self::THEME_SLUG);
            } // Is the Response
            echo json_encode($response);
            die();
        } elseif ($save_type == 'image_reset') {
            $id = $_POST['data']; // Acts as the name
            InkOption_Framwork_OptionSetup::update_option_value($id, '');
        } elseif ($save_type == 'options' OR $save_type == 'framework') {
            $data = $_POST['data'];
            parse_str($data, $output);
            $options = InkOption_Framwork_OptionSetup::get_default_options();
            foreach ($options as $option_array) {

                if (isset($option_array['id'])) { // Non - Headings...
                    $type = $option_array['type'];
                    $id = $option_array['id'];
                    $new_value = '';

                    if (isset($output[$id])) {
                        $new_value = $output[$option_array['id']];
                    }
                    if (is_array($type)) {
                        foreach ($type as $array) {
                            if ($array['type'] == 'text') {
                                $id = $array['id'];
                                $std = $array['std'];
                                $new_value = $output[$id];
                                if ($new_value == '') {
                                    $new_value = $std;
                                }
                                InkOption_Framwork_OptionSetup::update_option_value($id, stripslashes($new_value));
                            }
                        }
                    } elseif ($new_value == '' && $type == 'checkbox') { // Checkbox Save
                        InkOption_Framwork_OptionSetup::update_option_value($id, 'false');
                    } elseif ($new_value == 'true' && $type == 'checkbox') { // Checkbox Save
                        InkOption_Framwork_OptionSetup::update_option_value($id, 'true');
                    } elseif ($type == 'multicheck') { // Multi Check Save
                        $option_options = $option_array['options'];

                        foreach ($option_options as $options_id => $options_value) {

                            $multicheck_id = $id . "_" . $options_id;

                            if (!isset($output[$multicheck_id])) {
                                InkOption_Framwork_OptionSetup::update_option_value($multicheck_id, 'false');
                            } else {
                                InkOption_Framwork_OptionSetup::update_option_value($multicheck_id, 'true');
                            }
                        }
                    } elseif ($type == 'typography') {

                        $typography_array = array();

                        $typography_array['size'] = $output[$option_array['id'] . '_size'];

                        $typography_array['face'] = stripslashes($output[$option_array['id'] . '_face']);

                        $typography_array['style'] = $output[$option_array['id'] . '_style'];

                        $typography_array['color'] = $output[$option_array['id'] . '_color'];

                        InkOption_Framwork_OptionSetup::update_option_value($id, $typography_array);
                    } elseif ($type == 'border') {

                        $border_array = array();

                        $border_array['width'] = $output[$option_array['id'] . '_width'];

                        $border_array['style'] = $output[$option_array['id'] . '_style'];

                        $border_array['color'] = $output[$option_array['id'] . '_color'];

                        InkOption_Framwork_OptionSetup::update_option_value($id, $border_array);
                    } elseif ($type != 'upload_min') {
                        InkOption_Framwork_OptionSetup::update_option_value($id, stripslashes($new_value));
                    }
                }
            }
        }
        die();
    }

    function reset_options($options, $page = '') {
        $option_type = InkOption_Framwork_OptionSetup::get_type();
        if ($option_type == 'single_row') {
            $option_name = inkoption_framework_option_name();
            delete_option($option_name);
        } else {
            foreach ($options as $option) {
                delete_option($option['id']);
            }
        }
    }

    function options($options) {
//		if ( !InkThemes_License::is_localhost() ) {
//			if ( !InkThemes_License::is_activated() ) {
//				wp_die( __( 'Your theme license is not activated. Please activate it from <a href="' . admin_url( '/admin.php?page=inkoption-setting' ) . '">here</a> to get complete option of this theme.', self::THEME_SLUG ) );
//			}
//		}
        $counter = 0;
        $menu = '';
        $output = '';
        $settings = InkOption_Framwork_OptionSetup::get_options_value();
        foreach ($options as $value) {

            $counter++;
            $val = '';
            //Start Heading
            if ($value['type'] != "heading") {
                $class = '';
                if (isset($value['class'])) {
                    $class = $value['class'];
                }
                $output .= '<div class="section section-' . $value['type'] . ' ' . $class . '">' . "\n";
                $output .= '<h3 class="heading">' . $value['name'] . '</h3>' . "\n";
                $output .= '<div class="option">' . "\n" . '<div class="controls">' . "\n";
            }
            //End Heading
            $select_value = '';
            switch ($value['type']) {

                case 'text':
                    $val = $value['std'];
                    $std = isset($settings[$value['id']]) ? $settings[$value['id']] : '';
                    if ($std != "") {
                        $val = $std;
                    }
                    $output .= '<input class="of-input" name="' . esc_attr($value['id']) . '" id="' . esc_attr($value['id']) . '" type="' . esc_attr($value['type']) . '" value="' . esc_attr($val) . '" />';
                    break;

                case 'select':
                    $output .= '<select class="of-input" name="' . esc_attr($value['id']) . '" id="' . esc_attr($value['id']) . '">';

                    $select_value = isset($settings[$value['id']]) ? $settings[$value['id']] : '';

                    foreach ($value['options'] as $option) {

                        $selected = '';

                        if ($select_value != '') {
                            if ($select_value == $option) {
                                $selected = ' selected="selected"';
                            }
                        } else {
                            if (isset($value['std']))
                                if ($value['std'] == $option) {
                                    $selected = ' selected="selected"';
                                }
                        }

                        $output .= '<option' . esc_attr($selected) . '>';
                        $output .= esc_html($option);
                        $output .= '</option>';
                    }
                    $output .= '</select>';

                    break;
                case 'select2':
                    $output .= '<select class="of-input" name="' . esc_attr($value['id']) . '" id="' . esc_attr($value['id']) . '">';

                    $select_value = isset($settings[$value['id']]) ? $settings[$value['id']] : '';

                    foreach ($value['options'] as $option => $name) {

                        $selected = '';

                        if ($select_value != '') {
                            if ($select_value == $option) {
                                $selected = ' selected="selected"';
                            }
                        } else {
                            if (isset($value['std']))
                                if ($value['std'] == $option) {
                                    $selected = ' selected="selected"';
                                }
                        }

                        $output .= '<option' . $selected . ' value="' . esc_attr($option) . '">';
                        $output .= esc_html($name);
                        $output .= '</option>';
                    }
                    $output .= '</select>';

                    break;
                case 'textarea':

                    $cols = '8';
                    $ta_value = '';

                    if (isset($value['std'])) {

                        $ta_value = $value['std'];

                        if (isset($value['options'])) {
                            $ta_options = $value['options'];
                            if (isset($ta_options['cols'])) {
                                $cols = $ta_options['cols'];
                            } else {
                                $cols = '8';
                            }
                        }
                    }

                    $std = isset($settings[$value['id']]) ? $settings[$value['id']] : '';
                    if ($std != "") {
                        $ta_value = stripslashes($std);
                    }
                    $output .= '<textarea class="of-input" name="' . esc_attr($value['id']) . '" id="' . esc_attr($value['id']) . '" cols="' . $cols . '" rows="8">' . esc_textarea($ta_value) . '</textarea>';


                    break;
                case "radio":

                    $select_value = isset($settings[$value['id']]) ? $settings[$value['id']] : '';

                    foreach ($value['options'] as $key => $option) {
                        $checked = '';
                        if ($select_value != '') {
                            if ($select_value == $key) {
                                $checked = ' checked';
                            }
                        } else {
                            if ($value['std'] == $key) {
                                $checked = ' checked';
                            }
                        }
                        $output .= '<input class="of-input of-radio" type="radio" name="' . esc_attr($value['id']) . '" value="' . esc_attr($key) . '" ' . $checked . ' />' . $option . '<br />';
                    }

                    break;
                case "checkbox":

                    $std = $value['std'];

                    $saved_std = isset($settings[$value['id']]) ? $settings[$value['id']] : '';

                    $checked = '';

                    if (!empty($saved_std)) {
                        if ($saved_std == 'true') {
                            $checked = 'checked="checked"';
                        } else {
                            $checked = '';
                        }
                    } elseif ($std == 'true') {
                        $checked = 'checked="checked"';
                    } else {
                        $checked = '';
                    }
                    $output .= '<input type="checkbox" class="checkbox of-input" name="' . esc_attr($value['id']) . '" id="' . esc_attr($value['id']) . '" value="true" ' . $checked . ' />';
                    break;
                case "multicheck":

                    $std = $value['std'];

                    foreach ($value['options'] as $key => $option) {

                        $of_key = $value['id'] . '_' . $key;

                        $saved_std = isset($settings[$value['id']]) ? $settings[$value['id']] : '';

                        if (!empty($saved_std)) {
                            if ($saved_std == 'true') {
                                $checked = 'checked="checked"';
                            } else {
                                $checked = '';
                            }
                        } elseif ($std == $key) {
                            $checked = 'checked="checked"';
                        } else {
                            $checked = '';
                        }
                        $output .= '<input type="checkbox" class="checkbox of-input" name="' . esc_attr($of_key) . '" id="' . esc_attr($of_key) . '" value="true" ' . $checked . ' /><label for="' . esc_attr($of_key) . '">' . esc_html($option) . '</label><br />';
                    }
                    break;
                case "upload":
                    $value['std'] = '';
                    if (isset($value['std'])) {
                        $output .= $this->uploader_option($value['id'], $value['std'], null);
                    }
                    break;
                case "upload_min":

                    $output .= $this->uploader_option($value['id'], $value['std'], 'min');

                    break;
                case "color":
                    $val = $value['std'];
                    $stored = isset($settings[$value['id']]) ? $settings[$value['id']] : '';
                    if ($stored != "") {
                        $val = $stored;
                    }
                    $output .= '<div id="' . esc_attr($value['id']) . '_picker" class="colorSelector"><div></div></div>';
                    $output .= '<input class="of-color" name="' . esc_attr($value['id']) . '" id="' . esc_attr($value['id']) . '" type="text" value="' . esc_attr($val) . '" />';
                    break;

                case "typography":

                    $default = $value['std'];

                    $typography_stored = isset($settings[$value['id']]) ? $settings[$value['id']] : '';

                    /* Font Size */
                    $val = $default['size'];
                    if ($typography_stored['size'] != "") {
                        $val = $typography_stored['size'];
                    }
                    $output .= '<select class="of-typography of-typography-size" name="' . esc_attr($value['id']) . '_size" id="' . esc_attr($value['id']) . '_size">';
                    for ($i = 9; $i < 71; $i++) {
                        if ($val == $i) {
                            $active = 'selected="selected"';
                        } else {
                            $active = '';
                        }
                        $output .= '<option value="' . esc_attr($i) . '" ' . $active . '>' . esc_html($i) . 'px</option>';
                    }
                    $output .= '</select>';

                    /* Font Face */
                    $val = $default['face'];
                    if ($typography_stored['face'] != "")
                        $val = $typography_stored['face'];
                    $font01 = '';
                    $font02 = '';
                    $font03 = '';
                    $font04 = '';
                    $font05 = '';
                    $font06 = '';
                    $font07 = '';
                    $font08 = '';
                    $font09 = '';
                    if (strpos($val, 'Arial, sans-serif') !== false) {
                        $font01 = 'selected="selected"';
                    }
                    if (strpos($val, 'Verdana, Geneva') !== false) {
                        $font02 = 'selected="selected"';
                    }
                    if (strpos($val, 'Trebuchet') !== false) {
                        $font03 = 'selected="selected"';
                    }
                    if (strpos($val, 'Georgia') !== false) {
                        $font04 = 'selected="selected"';
                    }
                    if (strpos($val, 'Times New Roman') !== false) {
                        $font05 = 'selected="selected"';
                    }
                    if (strpos($val, 'Tahoma, Geneva') !== false) {
                        $font06 = 'selected="selected"';
                    }
                    if (strpos($val, 'Palatino') !== false) {
                        $font07 = 'selected="selected"';
                    }
                    if (strpos($val, 'Helvetica') !== false) {
                        $font08 = 'selected="selected"';
                    }

                    $output .= '<select class="of-typography of-typography-face" name="' . esc_attr($value['id']) . '_face" id="' . esc_attr($value['id']) . '_face">';
                    $output .= '<option value="Arial, sans-serif" ' . $font01 . '>Arial</option>';
                    $output .= '<option value="Verdana, Geneva, sans-serif" ' . $font02 . '>Verdana</option>';
                    $output .= '<option value="&quot;Trebuchet MS&quot;, Tahoma, sans-serif"' . $font03 . '>Trebuchet</option>';
                    $output .= '<option value="Georgia, serif" ' . $font04 . '>Georgia</option>';
                    $output .= '<option value="&quot;Times New Roman&quot;, serif"' . $font05 . '>Times New Roman</option>';
                    $output .= '<option value="Tahoma, Geneva, Verdana, sans-serif"' . $font06 . '>Tahoma</option>';
                    $output .= '<option value="Palatino, &quot;Palatino Linotype&quot;, serif"' . $font07 . '>Palatino</option>';
                    $output .= '<option value="&quot;Helvetica Neue&quot;, Helvetica, sans-serif" ' . $font08 . '>Helvetica*</option>';
                    $output .= '</select>';

                    /* Font Weight */
                    $val = $default['style'];
                    if ($typography_stored['style'] != "") {
                        $val = $typography_stored['style'];
                    }
                    $normal = '';
                    $italic = '';
                    $bold = '';
                    $bolditalic = '';
                    if ($val == 'normal') {
                        $normal = 'selected="selected"';
                    }
                    if ($val == 'italic') {
                        $italic = 'selected="selected"';
                    }
                    if ($val == 'bold') {
                        $bold = 'selected="selected"';
                    }
                    if ($val == 'bold italic') {
                        $bolditalic = 'selected="selected"';
                    }

                    $output .= '<select class="of-typography of-typography-style" name="' . esc_attr($value['id']) . '_style" id="' . esc_attr($value['id']) . '_style">';
                    $output .= '<option value="normal" ' . $normal . '>Normal</option>';
                    $output .= '<option value="italic" ' . $italic . '>Italic</option>';
                    $output .= '<option value="bold" ' . $bold . '>Bold</option>';
                    $output .= '<option value="bold italic" ' . $bolditalic . '>Bold/Italic</option>';
                    $output .= '</select>';

                    /* Font Color */
                    $val = $default['color'];
                    if ($typography_stored['color'] != "") {
                        $val = $typography_stored['color'];
                    }
                    $output .= '<div id="' . esc_attr($value['id']) . '_color_picker" class="colorSelector"><div></div></div>';
                    $output .= '<input class="of-color of-typography of-typography-color" name="' . esc_attr($value['id']) . '_color" id="' . esc_attr($value['id']) . '_color" type="text" value="' . esc_attr($val) . '" />';
                    break;

                case "border":

                    $default = $value['std'];

                    $border_stored = isset($settings[$value['id']]) ? $settings[$value['id']] : '';

                    /* Border Width */
                    $val = $default['width'];
                    if ($border_stored['width'] != "") {
                        $val = $border_stored['width'];
                    }
                    $output .= '<select class="of-border of-border-width" name="' . esc_attr($value['id']) . '_width" id="' . esc_attr($value['id']) . '_width">';
                    for ($i = 0; $i < 21; $i++) {
                        if ($val == $i) {
                            $active = 'selected="selected"';
                        } else {
                            $active = '';
                        }
                        $output .= '<option value="' . $i . '" ' . $active . '>' . $i . 'px</option>';
                    }
                    $output .= '</select>';

                    /* Border Style */
                    $val = $default['style'];
                    if ($border_stored['style'] != "") {
                        $val = $border_stored['style'];
                    }
                    $solid = '';
                    $dashed = '';
                    $dotted = '';
                    if ($val == 'solid') {
                        $solid = 'selected="selected"';
                    }
                    if ($val == 'dashed') {
                        $dashed = 'selected="selected"';
                    }
                    if ($val == 'dotted') {
                        $dotted = 'selected="selected"';
                    }

                    $output .= '<select class="of-border of-border-style" name="' . esc_attr($value['id']) . '_style" id="' . esc_attr($value['id']) . '_style">';
                    $output .= '<option value="solid" ' . $solid . '>Solid</option>';
                    $output .= '<option value="dashed" ' . $dashed . '>Dashed</option>';
                    $output .= '<option value="dotted" ' . $dotted . '>Dotted</option>';
                    $output .= '</select>';

                    /* Border Color */
                    $val = $default['color'];
                    if ($border_stored['color'] != "") {
                        $val = $border_stored['color'];
                    }
                    $output .= '<div id="' . $value['id'] . '_color_picker" class="colorSelector"><div></div></div>';
                    $output .= '<input class="of-color of-border of-border-color" name="' . esc_attr($value['id']) . '_color" id="' . esc_attr($value['id']) . '_color" type="text" value="' . esc_attr($val) . '" />';
                    break;

                case "images":
                    $i = 0;
                    $select_value = isset($settings[$value['id']]) ? $settings[$value['id']] : '';

                    foreach ($value['options'] as $key => $option) {
                        $i++;
                        $checked = '';
                        $selected = '';
                        if ($select_value != '') {
                            if ($select_value == $key) {
                                $checked = ' checked';
                                $selected = 'of-radio-img-selected';
                            }
                        } else {
                            if ($value['std'] == $key) {
                                $checked = ' checked';
                                $selected = 'of-radio-img-selected';
                            } elseif ($i == 1 && !isset($select_value)) {
                                $checked = ' checked';
                                $selected = 'of-radio-img-selected';
                            } elseif ($i == 1 && $value['std'] == '') {
                                $checked = ' checked';
                                $selected = 'of-radio-img-selected';
                            } else {
                                $checked = '';
                            }
                        }

                        $output .= '<span>';
                        $output .= '<input type="radio" id="of-radio-img-' . esc_attr($value['id']) . $i . '" class="checkbox of-radio-img-radio" value="' . esc_attr($key) . '" name="' . esc_attr($value['id']) . '" ' . $checked . ' />';
                        $output .= '<div class="of-radio-img-label">' . $key . '</div>';
                        $output .= '<img src="' . esc_url($option) . '" alt="" class="of-radio-img-img ' . $selected . '" onClick="document.getElementById(\'of-radio-img-' . esc_attr($value['id']) . $i . '\').checked = true;" />';
                        $output .= '</span>';
                    }

                    break;

                case "info":
                    $default = $value['std'];
                    $output .= $default;
                    break;

                case "heading":

                    if ($counter >= 2) {
                        $output .= '</div>' . "\n";
                    }
                    $jquery_click_hook = preg_replace('/[^a-zA-Z0-9._\-]/', '', strtolower($value['name']));
                    $jquery_click_hook = "of-option-" . $jquery_click_hook;
                    $menu .= '<li><a title="' . esc_attr($value['name']) . '" href="#' . esc_attr($jquery_click_hook) . '">' . esc_attr($value['name']) . '</a></li>';
                    $output .= '<div class="group" id="' . esc_attr($jquery_click_hook) . '"><h2>' . esc_html($value['name']) . '</h2>' . "\n";
                    break;
            }

            // if TYPE is an array, formatted into smaller inputs... ie smaller values
            if (is_array($value['type'])) {
                foreach ($value['type'] as $array) {

                    $id = $array['id'];
                    $std = $array['std'];
                    $select_value = isset($settings[$id]) ? $settings[$id] : '';

                    if ($saved_std != $std) {
                        $std = $saved_std;
                    }
                    $meta = $array['meta'];

                    if ($array['type'] == 'text') { // Only text at this point
                        $output .= '<input class="input-text-small of-input" name="' . $id . '" id="' . $id . '" type="text" value="' . $std . '" />';
                        $output .= '<span class="meta-two">' . $meta . '</span>';
                    }
                }
            }
            if ($value['type'] != "heading") {
                if ($value['type'] != "checkbox") {
                    $output .= '<br/>';
                }
                if (!isset($value['desc'])) {
                    $explain_value = '';
                } else {
                    $explain_value = $value['desc'];
                }
                $output .= '</div><div class="explain">' . $explain_value . '</div>' . "\n";
                $output .= '<div class="clear"> </div></div></div>' . "\n";
            }
        }
        $output .= '</div>';
        return array($output, $menu);
    }

    function uploader_option($id, $std, $mod) {
        //$uploader .= '<input type="file" id="attachement_'.$id.'" name="attachement_'.$id.'" class="upload_input"></input>';
        //$uploader .= '<span class="submit"><input name="save" type="submit" value="Upload" class="button upload_save" /></span>';
        $uploader = '';
        $settings = InkOption_Framwork_OptionSetup::get_options_value();
        $upload = isset($settings[$id]) ? $settings[$id] : '';
        if ($mod != 'min') {
            $val = $std;
            if ($upload != "") {
                $val = isset($settings[$id]) ? $settings[$id] : '';
            }
            $uploader .= '<input class=\'of-input\' name=\'' . $id . '\' id=\'' . $id . '_upload\' type=\'text\' value=\'' . str_replace("'", "", $val) . '\' />';
        }
        $uploader .= '<div class="upload_button_div"><span class="button image_upload_button" id="' . $id . '">Upload Image</span>';

        if (!empty($upload)) {
            $hide = '';
        } else {
            $hide = 'hide';
        }

        $uploader .= '<span class="button image_reset_button ' . $hide . '" id="reset_' . $id . '" title="' . $id . '">Remove</span>';
        $uploader .='</div>' . "\n";
        $uploader .= '<div class="clear"></div>' . "\n";
        $findme = 'wp-content/uploads';
        $imgvideocheck = strpos($upload, $findme);
        if ((!empty($upload)) && ($imgvideocheck === true)) {
            $uploader .= '<a class="of-uploaded-image" href="' . $upload . '">';
            $uploader .= '<img class="of-option-image" id="image_' . $id . '" src="' . $upload . '" alt="" />';
            $uploader .= '</a>';
        }
        $uploader .= '<div class="clear"></div>' . "\n";
        return $uploader;
    }

    function options_admin_head() {
        //Tweaked the message on theme activate
        ?>
        <script type="text/javascript">
            jQuery(function () {

                var message = '<p><?php _e('This theme comes with an ', self::THEME_SLUG); ?><a href="<?php echo admin_url('admin.php?page=inkthemes_framework'); ?>"><?php _e('options panel</a> to configure settings. This theme also supports widgets, please visit the ', self::THEME_SLUG); ?><a href="<?php echo admin_url('widgets.php'); ?>"><?php _e('widgets settings page</a> to configure them.', self::THEME_SLUG); ?></p>';
                jQuery('.themes-php #message2').html(message);

            });
        </script>
        <?php
    }

}

InkOption_Framwork::Init();
