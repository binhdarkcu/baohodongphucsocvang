<?php
/**
 * Function for Gallery shortcode.
 * @param array $attr Attributes of the shortcode.
 * @return string HTML content to display gallery.
 */
remove_shortcode('gallery');
add_shortcode('gallery', 'butterbelly_gallery_shortcode');

function butterbelly_gallery_shortcode($attr) {
    $post = get_post();
    static $instance = 0;
    $instance++;

    if (!empty($attr['ids'])) {
        // 'ids' is explicitly ordered, unless you specify otherwise.
        if (empty($attr['orderby']))
            $attr['orderby'] = 'post__in';
        $attr['include'] = $attr['ids'];
    }

    /*
     *  Allow plugins/themes to override the default gallery template.
     */
    $output = apply_filters('post_gallery', '', $attr);
    if ($output != '')
        return $output;

    /*
     *  We're trusting author input, so let's at least make sure it looks like a valid orderby statement
     */
    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => ''
                    ), $attr));
    $id = intval($id);
    if ('RAND' == $order)
        $orderby = 'none';

    if (!empty($include)) {
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif (!empty($exclude)) {
        $attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
    } else {
        $attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
    }
    if (empty($attachments))
        return '';
    if (is_feed()) {
        $output = "\n";
        foreach ($attachments as $att_id => $attachment)
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }
    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100 / $columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";
    ?>
    <script>
        /**
         * Gallery
         * Prety Photo
         */
        jQuery.noConflict();
        jQuery(document).ready(function () {
            jQuery(".<?php echo $selector ?> a[rel^='prettyPhoto']").prettyPhoto({animation_speed: 'normal', theme: 'light_square', slideshow: 8000, autoplay_slideshow: true});
        });
    </script>
    <?php
    $gallery_style = $gallery_div = '';
    if (apply_filters('use_default_gallery_style', true))
        $gallery_style = "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}%;
			}
			#{$selector} img {
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
		</style>
		<!-- see gallery_shortcode() in wp-includes/media.php -->";
    $size_class = sanitize_html_class($size);
    $gallery_div = "<div id='$selector' class='$selector gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
    $gallery_ul = "<div class='grid-sizer-gal'></div><div class='row thumbnail col-{$columns}'>";
    $output = apply_filters('gallery_style', $gallery_style . "\n\t\t" . $gallery_div . $gallery_ul);
    $i = 0;
    ?>
    <?php
    foreach ($attachments as $gallery_image) {
        $class_name = '';
        $i++;
        switch ($columns) {
            case 1:
                $class_name = "col-1";
                break;
            case 2:
                $class_name = "col-2";
                break;
            case 3:
                $class_name = "col-3";
                break;
            case 4:
                $class_name = "col-4";
                break;
            case 5:
                $class_name = "col-5";
                break;
            case 6:
                $class_name = "col-6";
                break;
            case 7:
                $class_name = "col-7";
                break;
            case 8:
                $class_name = "col-8";
                break;
            case 9:
                $class_name = "col-9";
                break;
        }
        $attachment_img = wp_get_attachment_url($gallery_image->ID);
        $img_source = butterbelly_image_resize($attachment_img, 350, 245);
        $output .= "<div class='$class_name gall-img-section'>";
        $output .= '<a rel="prettyPhoto[gallery2]" alt="' . $gallery_image->post_excerpt . '" href="' . $attachment_img . '">';
        $output .= '<img src="' . $img_source['url'] . '" alt=""/>';
        $output .= '</a>';
//		$output .= "<br style='clear: both;' />";
        $output .= '<a alt="' . $gallery_image->post_excerpt . '" href="' . '?attachment_id=' . $gallery_image->ID . '">';
        $output .= $gallery_image->post_excerpt;
        $output .= '</a>';
        $output .= "</div>";
    }
    $output .= "
	<br style='clear: both;' />
	</div>\n
	</div>"
    ;
    return $output;
}
?>
