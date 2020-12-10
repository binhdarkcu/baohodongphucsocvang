<?php

class InkOption_Framwork_OptionSetup
{

    /**
     * Set the value of option type. Possible values are single_row or multi_row
     *
     * @var type
     */
    var $option_type = '';

    /**
     * function to set the options type
     * for single row option (save all the options value in single row (in Array)) : single_row
     * for multi row option (save each option in separate row in options table) : multi_row
     */
    function __construct()
    {
        $this->option_type = 'single_row';
//        $this->option_type = 'multi_row';
    }

    static function get_type()
    {
        $obj = new InkOption_Framwork_OptionSetup();

        return $obj->option_type;
    }

    /**
     * Retrive the option array from option.php file if exists
     *
     * @return type option array
     */
    static function get_default_options()
    {
        $options = null;
        if (!$options) {
            // Load options from options.php file (if it exists)
            $location = apply_filters('options_framework_location', array('/includes/inkoption-framework/options.php'));
            if ($optionsfile = locate_template($location)) {
                $maybe_options = require_once $optionsfile;
                if (is_array($maybe_options)) {
                    $options = $maybe_options;
                } else {
                    if (function_exists('inkoption_framework_options')) {
                        $options = inkoption_framework_options();
                    }
                }
            }

            // Allow setting/manipulating options via filters
            $options = apply_filters('of_options', $options);
        }

        return $options;
    }

    /**
     * Get the option value from database by name
     *
     * @param string $option_name
     * @return mixed
     */
    static function get_option_value($option_name)
    {
        $option_type = self::get_type();
        if ($option_type == 'single_row') {
            $option_row_name = inkoption_framework_option_name();
            $options = get_option($option_row_name);

            return isset($options[$option_name]) ? $options[$option_name] : '';
        } else {
            return get_option($option_name);
        }
    }

    /**
     * Function to update the option value to database
     *
     * @param string $option_name
     * @param mixed $option_value
     */
    static function update_option_value($option_name, $option_value = '')
    {
        $option_type = self::get_type();
        if ($option_type == 'single_row') {
            $option_row_name = inkoption_framework_option_name();
            $options = get_option($option_row_name);
            $options[$option_name] = $option_value;
            update_option($option_row_name, $options);
        } else {
            update_option($option_name, $option_value);
        }
    }

    /**
     * function to get all the options value if $option_type is single row
     *
     */
    static function get_options_value()
    {
        $option_type = self::get_type();
        $option_row_name = inkoption_framework_option_name();
        if ($option_type == 'single_row') {
            return get_option($option_row_name);
        } else {
            $options = inkoption_framework_options();
            $option_values = array();
            foreach ($options as $option) {
                if (isset($option['id'])) {
                    $option_values[$option['id']] = get_option($option['id']);
                }
            }

            return $option_values;
        }
    }

}
