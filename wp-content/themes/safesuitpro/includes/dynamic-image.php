<?php

/**
 * Augmentation to the $_SERVER['DOCUMENT_ROOT'] functionality, because it cannot be relied on to provide the right path
 * in cases where there is URL rewriting at play.
 *
 * @param  $path
 * @return mixed|string
 */
function butterbelly_document_root($path) {
    if (@file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . $path)) {
        return $_SERVER['DOCUMENT_ROOT'];
    }
    $parts = array_diff(explode('/', $_SERVER['SCRIPT_FILENAME']), explode('/', $_SERVER['DOCUMENT_ROOT']));
    $new_path = $_SERVER['DOCUMENT_ROOT'];
    foreach ($parts as $part) {
        $new_path .= '/' . $part;
        if (@file_exists($new_path . '/' . $path)) {
            return $new_path;
        }
    }
    if (!isset($_SERVER['DOCUMENT_ROOT'])) {
        $new_path = str_replace("/", "\\", $_SERVER['ORIG_PATH_INFO']);
        $new_path = str_replace($new_path, "", $_SERVER['SCRIPT_FILENAME']);
        if (@file_exists($new_path . '/' . $path)) {
            return $new_path;
        }
    }
    return false;
}

/**
 * This function resizes images It takes image source,
 * width height and quality as a parameter
 * This function is based on the approach described by
 * Victor Teixeira here: http://core.trac.wordpress.org/ticket/15311.
 * @param  $img_url
 * @param  $width
 * @param  $height
 * @param bool $crop
 * @param  $quality
 * @return array with image URL, width and height
 */
if ((function_exists('is_multisite') && is_multisite()) || ($single_site = true)) {

    function butterbelly_image_resize($img_url, $width, $height, $crop = true, $quality = 100) {
        if (empty($img_url) && $img_url == '') {
            return;
        }
        $upload_dir = wp_upload_dir();

        $newfile = $upload_dir['basedir'];
        $newsubdir = '/thumb-cache';
        $upload_path = $newfile . $newsubdir;
        if (isset($file_path['host'])) {
            $file_path = $file_path['host'];
        } else {
            $file_path = '';
        }

        if (!file_exists($upload_path)) {
            wp_mkdir_p($upload_path);
        }
        $file_path = parse_url($img_url);
        if ($_SERVER['HTTP_HOST'] != $file_path && $file_path != '') {
            $remote_file_info = pathinfo($file_path['path']);
            if (isset($remote_file_info['extension'])) {
                $remote_file_extension = $remote_file_info['extension'];
            } else {
                $remote_file_extension = 'jpg';
            }
            $remote_file_extension = strtolower($remote_file_extension);
            $file_base = md5($img_url) . '.' . $remote_file_extension;
            $copy_to_file = $upload_dir['path'] . '/' . $file_base;
            if (!file_exists($copy_to_file)) {
                $unique_filename = wp_unique_filename($upload_dir['path'], $file_base);
                $remote_content = wp_remote_request($img_url, array('sslverify' => false));
                if (is_wp_error($remote_content)) {
                    $copy_to_file = '';
                } else {
                    wp_upload_bits($unique_filename, null, $remote_content['body']);
                    $copy_to_file = $upload_dir['path'] . '/' . $unique_filename;
                }
            }
            $file_path = $copy_to_file;
        } else {
            $expath = $file_path['path'];
            $string = $expath;
            $find = '/files/';
            $findit = strpos($string, $find);
            if ($findit === false) {
                $file_path = butterbelly_document_root($file_path['path']) . $file_path['path'];
            } else {
                $expath = $file_path['path'];
                $nefilepath = explode("/files", $expath);
                $newpathdir = $nefilepath[1];
                $filepath1 = $newfile . $newpathdir;
                $file_path = $filepath1;
            }
        }
        if (!file_exists($file_path)) {
            $resized_image = array(
                'url' => $img_url,
                'width' => $width,
                'height' => $height
            );
            return $resized_image;
        }
        $orig_size = @getimagesize($file_path);
        $source[0] = $img_url;
        $source[1] = $orig_size[0];
        $source[2] = $orig_size[1];
        $file_info = pathinfo($file_path);
        if (isset($file_info['extension'])) {
            $extension = '.' . $file_info['extension'];
            if ($extension == '.png' && $quality != null) {
                $quality = floor(0.09 * $quality);
            }
        }
        $crop_str = $crop ? '-crop' : '-nocrop';
        $quality_str = $quality != null ? '-' . $quality : '';
        $cropped_img_path = $upload_path . '/' . $file_info['filename'] . '-' . md5($file_path) . '-' . $width . 'x' . $height . $quality_str . $crop_str . $extension;

        $suffix = md5($file_path) . '-' . $width . 'x' . $height . $quality_str . $crop_str;

        if ($source[1] > $width || $source[2] > $height) {
            if (file_exists($cropped_img_path)) {
                $cropped_img_url = str_replace($upload_dir['basedir'], $upload_dir['baseurl'], $cropped_img_path);
                $resized_image = array(
                    'url' => $cropped_img_url,
                    'width' => $width,
                    'height' => $height
                );
                return $resized_image;
            }
            if ($crop == false) {
                $proportional_size = wp_constrain_dimensions($source[1], $source[2], $width, $height);
                $resized_img_path = $upload_path . '/' . $file_info['filename'] . '-' . md5($file_path) . '-' . $proportional_size[0] . 'x' . $proportional_size[1] . $quality_str . $crop_str . $extension;
                $suffix = md5($file_path) . '-' . $proportional_size[0] . 'x' . $proportional_size[1] . $quality_str . $crop_str;
                if (file_exists($resized_img_path)) {
                    $resized_img_url = str_replace($upload_dir['basedir'], $upload_dir['baseurl'], $resized_img_path);
                    $resized_image = array(
                        'url' => $resized_img_url,
                        'width' => $proportional_size[0],
                        'height' => $proportional_size[1]
                    );
                    return $resized_image;
                }
            }
            $img = wp_get_image_editor($file_path);

            if (is_wp_error($img)) {
                $resized_image = array(
                    'url' => $source[0],
                    'width' => $source[1],
                    'height' => $source[2]
                );
            } else {
                $old_size = $img->get_size();
                $resize = $img->resize($width, $height, $crop);
                if ($resize !== FALSE) {
                    $new_size = $img->get_size();
                }
                $cropped_img_url = str_replace($upload_dir['basedir'], $upload_dir['baseurl'], $cropped_img_path);
                $img->save($cropped_img_path);
                $resized_image = array(
                    'url' => $cropped_img_url,
                    'width' => $new_size['width'],
                    'height' => $new_size['height']
                );
            }


            return $resized_image;
        }
        $resized_image = array(
            'url' => $source[0],
            'width' => $source[1],
            'height' => $source[2]
        );
        return $resized_image;
    }

}

/**
 * This function gets attachment id and resizes it
 * @param type $attach_id
 * @param type $img_url
 * @param type $width
 * @param type $height
 * @param type $crop
 * @param type $jpeg_quality
 * @return type
 */
function butterbelly_thumbnail_resize($attach_id = null, $img_url = null, $width, $height, $crop = false, $jpeg_quality = 90) {
    if ($attach_id) {
        $image_src = wp_get_attachment_image_src($attach_id, 'full');
        $file_path = get_attached_file($attach_id);
    } else if ($img_url) {
        $file_path = parse_url($img_url);
        $file_path = ltrim($file_path['path'], '/');
        $file_path = rtrim(ABSPATH, '/') . $file_path['path'];
        $orig_size = getimagesize($file_path);
        $image_src[0] = $img_url;
        $image_src[1] = $orig_size[0];
        $image_src[2] = $orig_size[1];
    }
    $file_info = pathinfo($file_path);

    if (!(isset($file_info['dirname']) && $file_info['dirname'] != '' && isset($file_info['filename']) && $file_info['filename'] != '')) {
        return;
    }
    if (isset($file_info['extension']) && $file_info['extension'] != '') {
        $file_info_ext = $file_info['extension'];
    } else {
        $file_info_ext = '';
    }
    $extension = '.' . $file_info_ext;
    $no_ext_path = $file_info['dirname'] . '/' . $file_info['filename'];
    $cropped_img_path = $no_ext_path . '-' . $width . 'x' . $height . $extension;
    if ($image_src[1] > $width || $image_src[2] > $height) {
        if (file_exists($cropped_img_path)) {
            $cropped_img_url = str_replace(basename($image_src[0]), basename($cropped_img_path), $image_src[0]);
            $vt_image = array(
                'url' => $cropped_img_url,
                'width' => $width,
                'height' => $height
            );
            return $vt_image;
        }
        if ($crop == false) {
            $proportional_size = wp_constrain_dimensions($image_src[1], $image_src[2], $width, $height);
            $resized_img_path = $no_ext_path . '-' . $proportional_size[0] . 'x' . $proportional_size[1] . $extension;
            if (file_exists($resized_img_path)) {
                $resized_img_url = str_replace(basename($image_src[0]), basename($resized_img_path), $image_src[0]);
                $vt_image = array(
                    'url' => $resized_img_url,
                    'width' => $proportional_size[0],
                    'height' => $proportional_size[1]
                );
                return $vt_image;
            }
        }
        $img = wp_get_image_editor($file_path);
        if (!is_wp_error($img)) {
            $old_size = $img->get_size();
            $resize = $img->resize($width, $height, $crop);
            if ($resize !== FALSE) {
                $new_size = $img->get_size();
            }
            $path = str_replace(basename($image_src[0]), '', $image_src[0]);
            $filename = $img->generate_filename('final' . $width, $path . '/', NULL);
            $image_detail = $img->save($filename);
        }
        $new_img = str_replace(basename($image_src[0]), basename($image_detail['path']), $image_src[0]);
        $vt_image = array(
            'url' => $new_img,
            'width' => $image_detail['width'],
            'height' => $image_detail['height']
        );
        return $vt_image;
    }
    $vt_image = array(
        'url' => $image_src[0],
        'width' => $image_src[1],
        'height' => $image_src[2]
    );
    return $vt_image;
}

?>