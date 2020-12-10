<?php
$slider1 = esc_url(butterbelly_get_option('inkthemes_slideimage1'));
$slider2 = esc_url(butterbelly_get_option('inkthemes_slideimage2'));
$slider3 = esc_url(butterbelly_get_option('inkthemes_slideimage3'));
$slider4 = esc_url(butterbelly_get_option('inkthemes_slideimage4'));
$slider5 = esc_url(butterbelly_get_option('inkthemes_slideimage5'));
$slider6 = esc_url(butterbelly_get_option('inkthemes_slideimage6'));

$slider_flag = false;
if ($slider1 || $slider2 || $slider3 || $slider4 || $slider5 || $slider6) {
    $slider_flag = true;
}
//default slider
$slider_default = array();
$slider_default['slider1'] = array(
    'butterbelly_slider_img' => esc_url(BUTTERBELLY_DIR_URI . 'assets/images/slider1.jpg'),
    'butterbelly_slider_heading' => wp_kses_post(__('Showcase Your Multiple Images', 'butterbelly')),
    'butterbelly_slider_desc' => wp_kses_post(__('This is a fullwidth slider where you can showcase your multiple business images. You can showcase maximum of 6 images. The recommended size of the images is 1600 px x 825 px.', 'butterbelly')),
    'butterbelly_slider_link' => '#',
    'butterbelly_slider_alt' => wp_kses_post(__('slider 1', 'butterbelly')),
    'butterbelly_slider_button' => wp_kses_post(__('Read More', 'butterbelly'))
);
$sliders = array();
//Slider when users fill the option
$sliders['slider1'] = array(
    'butterbelly_slider_img' => esc_url(butterbelly_get_option('inkthemes_slideimage1')),
    'butterbelly_slider_heading' => wp_kses_post(butterbelly_get_option('inkthemes_sliderheading1')),
    'butterbelly_slider_desc' => wp_kses_post(butterbelly_get_option('inkthemes_sliderdes1')),
    'butterbelly_slider_link' => esc_url(butterbelly_get_option('inkthemes_Sliderlink1')),
    'butterbelly_slider_alt' => wp_kses_post(__('slider 1', 'butterbelly')),
    'butterbelly_slider_button' => wp_kses_post(butterbelly_get_option('inkthemes_slider_button1'))
);
$sliders['slider2'] = array(
    'butterbelly_slider_img' => esc_url(butterbelly_get_option('inkthemes_slideimage2')),
    'butterbelly_slider_heading' => wp_kses_post(butterbelly_get_option('inkthemes_sliderheading2')),
    'butterbelly_slider_desc' => wp_kses_post(butterbelly_get_option('inkthemes_sliderdes2')),
    'butterbelly_slider_link' => esc_url(butterbelly_get_option('inkthemes_Sliderlink2')),
    'butterbelly_slider_alt' => wp_kses_post(__('slider 2', 'butterbelly')),
    'butterbelly_slider_button' => wp_kses_post(butterbelly_get_option('inkthemes_slider_button2'))
);
$sliders['slider3'] = array(
    'butterbelly_slider_img' => esc_url(butterbelly_get_option('inkthemes_slideimage3')),
    'butterbelly_slider_heading' => wp_kses_post(butterbelly_get_option('inkthemes_sliderheading3')),
    'butterbelly_slider_desc' => wp_kses_post(butterbelly_get_option('inkthemes_sliderdes3')),
    'butterbelly_slider_link' => esc_url(butterbelly_get_option('inkthemes_Sliderlink3')),
    'butterbelly_slider_alt' => wp_kses_post(__('slider 3', 'butterbelly')),
    'butterbelly_slider_button' => wp_kses_post(butterbelly_get_option('inkthemes_slider_button3'))
);
$sliders['slider4'] = array(
    'butterbelly_slider_img' => esc_url(butterbelly_get_option('inkthemes_slideimage4')),
    'butterbelly_slider_heading' => wp_kses_post(butterbelly_get_option('inkthemes_sliderheading4')),
    'butterbelly_slider_desc' => wp_kses_post(butterbelly_get_option('inkthemes_sliderdes4')),
    'butterbelly_slider_link' => esc_url(butterbelly_get_option('inkthemes_Sliderlink4')),
    'butterbelly_slider_alt' => wp_kses_post(__('slider 4', 'butterbelly')),
    'butterbelly_slider_button' => wp_kses_post(butterbelly_get_option('inkthemes_slider_button4'))
);
$sliders['slider5'] = array(
    'butterbelly_slider_img' => esc_url(butterbelly_get_option('inkthemes_slideimage5')),
    'butterbelly_slider_heading' => wp_kses_post(butterbelly_get_option('inkthemes_sliderheading5')),
    'butterbelly_slider_desc' => wp_kses_post(butterbelly_get_option('inkthemes_sliderdes5')),
    'butterbelly_slider_link' => esc_url(butterbelly_get_option('inkthemes_Sliderlink5')),
    'butterbelly_slider_alt' => wp_kses_post(__('slider 5', 'butterbelly')),
    'butterbelly_slider_button' => wp_kses_post(butterbelly_get_option('inkthemes_slider_button5'))
);
$sliders['slider6'] = array(
    'butterbelly_slider_img' => esc_url(butterbelly_get_option('inkthemes_slideimage6')),
    'butterbelly_slider_heading' => wp_kses_post(butterbelly_get_option('inkthemes_sliderheading6')),
    'butterbelly_slider_desc' => wp_kses_post(butterbelly_get_option('inkthemes_sliderdes6')),
    'butterbelly_slider_link' => esc_url(butterbelly_get_option('inkthemes_Sliderlink6')),
    'butterbelly_slider_alt' => wp_kses_post(__('slider 6', 'butterbelly')),
    'butterbelly_slider_button' => wp_kses_post(butterbelly_get_option('inkthemes_slider_button6'))
);


if (!$slider_flag) {
    $sliders = array_merge($sliders, $slider_default);
}
?>
<div class="slider-container">
    <input type="hidden" id="txt_slidespeed" value="<?php if (butterbelly_get_option('inkthemes_slide_speed') != '') { ?> <?php echo stripslashes(butterbelly_get_option('inkthemes_slide_speed')); ?>
           <?php } else { ?>3000<?php } ?>"/>  
    <div class="slider-wrapper">
        <!--Start Slider Wrapper-->
        <div class="flexslider">
            <ul class="slides">
                <?php
                if (!empty($sliders)) {
                    foreach ($sliders as $key => $slider) {
                        if (!empty($slider['butterbelly_slider_img'])) {
                            ?>
                            <li>
                                <a href="<?php
                                echo $slider['butterbelly_slider_link']
                                ?>" >
                                    <img  src="<?php echo $slider['butterbelly_slider_img']; ?>" alt="<?php echo $slider['butterbelly_slider_alt']; ?>"/></a>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="flex-caption-wrapper">
                                                <div class="flex-caption-left-tri"></div>
                                                <div class="flex-caption-right-tri"></div>
                                                <div class="flex-caption">
                                                    <?php if ($slider['butterbelly_slider_heading'] != '') { ?>
                                                        <h1><a href="<?php
                                                            echo $slider['butterbelly_slider_link'];
                                                            ?>"><?php
                                                                   $ink_head1 = $slider['butterbelly_slider_heading'];
                                                                   echo substr($ink_head1, 0, 80);
                                                                   if (strlen($ink_head1) > 80)
                                                                       echo "...";
                                                                   ?></a></h1>
                                                        <?php
                                                    }
                                                    if ($slider['butterbelly_slider_desc'] != '') {
                                                        ?>
                                                        <p>					   
                                                            <?php
                                                            $ink_desc1 = $slider['butterbelly_slider_desc'];
                                                            echo substr($ink_desc1, 0, 250);
                                                            if (strlen($ink_desc1) > 250)
                                                                echo "...";
                                                            ?>
                                                        </p>
                                                        <?php
                                                    }
                                                    if ($slider['butterbelly_slider_button'] != '') {
                                                        ?>
                                                        <a class="slider-readmore" href="<?php
                                                        echo $slider['butterbelly_slider_link'];
                                                        ?>"><span class="sl_rd_more"><?php echo $slider['butterbelly_slider_button']; ?></span><span class="glyphicon glyphicon-download"></span></a>
                                                       <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                        }
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<div class="clear"></div>

