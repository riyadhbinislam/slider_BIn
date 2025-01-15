<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    // Get variables from query
    $video_urls = get_query_var('video_urls', array());
    $slider_bin_videos = get_query_var('slider_bin_videos', array());

    // Get options
    $options = get_option('slider_bin_video_slider_settings');


    $slider_width = isset($options['video_slider_width']) ? esc_attr($options['video_slider_width']) : '100%';
    $slider_height = isset($options['video_slider_height']) ? esc_attr($options['video_slider_height']) : '700px';

    $video_slider_left_media_file = isset($options['video_slider_left_media_file']) ? esc_attr($options['video_slider_left_media_file']) : '/wp-content/plugins/slider-bin/assets/icon/Arrow-Left.svg';
    $video_slider_right_media_file = isset($options['video_slider_right_media_file']) ? esc_attr($options['video_slider_right_media_file']) : '/wp-content/plugins/slider-bin/assets/icon/Arrow-Right.svg';

    $left_arrow_color = isset($options['video_slider_left_arrow_color']) ? esc_attr($options['video_slider_left_arrow_color']) : '';
    $left_arrow_opacity = isset($options['video_slider_left_arrow_opacity']) ? esc_attr($options['video_slider_left_arrow_opacity']) : '';
    $left_arrow_position_top = isset($options['video_slider_left_arrow_position_top']) ? esc_attr($options['video_slider_left_arrow_position_top']) : '';
    $left_arrow_position_left = isset($options['video_slider_left_arrow_position_left']) ? esc_attr($options['video_slider_left_arrow_position_left']) : '';
    $left_arrow_position_right = isset($options['video_slider_left_arrow_position_right']) ? esc_attr($options['video_slider_left_arrow_position_right']) : '';
    $left_arrow_position_bottom = isset($options['video_slider_left_arrow_position_bottom']) ? esc_attr($options['video_slider_left_arrow_position_bottom']) : '';
    $left_arrow_width = isset($options['video_slider_left_arrow_width']) ? esc_attr($options['video_slider_left_arrow_width']) : '';
    $left_arrow_height = isset($options['video_slider_left_arrow_height']) ? esc_attr($options['video_slider_left_arrow_height']) : '';

    $right_arrow_opacity = isset($options['video_slider_right_arrow_opacity']) ? esc_attr($options['video_slider_right_arrow_opacity']) : '';
    $right_arrow_position_top = isset($options['video_slider_right_arrow_position_top']) ? esc_attr($options['video_slider_right_arrow_position_top']) : '';
    $right_arrow_position_left = isset($options['video_slider_right_arrow_position_left']) ? esc_attr($options['video_slider_right_arrow_position_left']) : '';
    $right_arrow_position_right = isset($options['video_slider_right_arrow_position_right']) ? esc_attr($options['video_slider_right_arrow_position_right']) : '';
    $right_arrow_position_bottom = isset($options['video_slider_right_arrow_position_bottom']) ? esc_attr($options['video_slider_right_arrow_position_bottom']) : '';
    $right_arrow_color = isset($options['video_slider_right_arrow_color']) ? esc_attr($options['video_slider_right_arrow_color']) : '';
    $right_arrow_width = isset($options['video_slider_right_arrow_width']) ? esc_attr($options['video_slider_right_arrow_width']) : '';
    $right_arrow_height = isset($options['video_slider_right_arrow_height']) ? esc_attr($options['video_slider_right_arrow_height']) : '';
?>

<div id="<?php echo esc_attr($unique_id); ?>" class="slider-wrapper video-slider" style="width: <?php echo empty($slider_width) ? '100%' : $slider_width; ?>; ">
    <div id="arrow-left" class="arrow-left" style="
        width: <?php echo empty($left_arrow_width) ? '40px' : $left_arrow_width; ?>;
        height: <?php echo empty($left_arrow_height) ? '40px' : $left_arrow_height; ?>;
        left: <?php echo empty($left_arrow_position_left) ? '0' : $left_arrow_position_left; ?>;
        top: <?php echo empty($left_arrow_position_top) ? '50%' : $left_arrow_position_top; ?>;
        right: <?php echo empty($left_arrow_position_right) ? 'auto' : $left_arrow_position_right; ?>;
        bottom: <?php echo empty($left_arrow_position_bottom) ? 'auto' : $left_arrow_position_bottom; ?>;
        opacity: <?php echo empty($left_arrow_opacity) ? '1' : $left_arrow_opacity; ?>; ">
        <img src="<?php echo empty($video_slider_left_media_file) ? '' : $video_slider_left_media_file; ?>" alt="">
    </div>


    <div id="slider">
        <?php

        // Render uploaded videos
        if (!empty($slider_bin_videos)) {
            foreach ($slider_bin_videos as $video_url) {
                $video_url = esc_url(trim($video_url));
                if (!empty($video_url)) {
                    ?>
                    <div class="slide media-slide" style="height: <?php echo empty($slider_height) ? '700px' : $slider_height; ?>;">
                        <video
                            width="100%"
                            height="100%"
                            muted
                            autoplay = "1"
                            loop
                            playsinline
                            style="object-fit: cover;">
                            <source src="<?php echo $video_url; ?>" type="video/mp4">
                            <?php esc_html_e('Your browser does not support the video tag.', 'slider_bin'); ?>
                        </video>
                    </div>
                    <?php
                }
            }
        }

        // Render embedded videos
        if (!empty($video_urls)) {
            foreach ($video_urls as $url) {
                $video_url = esc_url(trim($url));
                if (!empty($video_url)) {
                    // Process YouTube URLs
                    if (strpos($video_url, 'youtube.com') !== false || strpos($video_url, 'youtu.be') !== false) {
                        $video_id = '';
                        if (strpos($video_url, 'youtube.com') !== false) {
                            parse_str(parse_url($video_url, PHP_URL_QUERY), $params);
                            $video_id = $params['v'] ?? '';
                        } else {
                            $video_id = basename(parse_url($video_url, PHP_URL_PATH));
                        }
                        if ($video_id) {
                            $embed_url = "https://www.youtube.com/embed/{$video_id}?autoplay=1&mute=1&controls=0";
                        }
                    }
                    // Process Vimeo URLs
                    elseif (strpos($video_url, 'vimeo.com') !== false) {
                        $vimeo_id = basename(parse_url($video_url, PHP_URL_PATH));
                        if ($vimeo_id) {
                            $embed_url = "https://player.vimeo.com/video/{$vimeo_id}?autoplay=1&muted=1";
                        }
                    }
                    //others Url
                    elseif (strpos($video_url, 'youtube.com') == false || strpos($video_url, 'vimeo.com') == false || strpos($video_url, 'youtu.be') == false) {
                        $embed_url = ($video_url);
                    }



                    if (!empty($embed_url)) {
                        ?>
                        <div class="slide video-slide" style="height: <?php echo empty($slider_height) ? '700px' : $slider_height; ?>;">
                            <iframe
                                width="100%"
                                height="100%"
                                loop
                                src="<?php echo esc_url($embed_url); ?>"
                                frameborder="0"
                                allow="autoplay; encrypted-media"
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                allowfullscreen>
                            </iframe>
                        </div>
                        <?php
                    }
                }
            }
        }
        ?>
    </div>

    <div id="arrow-right" class="arrow-right" style="
        width: <?php echo empty($right_arrow_width) ? '40px' : $right_arrow_width; ?>;
        height: <?php echo empty($right_arrow_height) ? '40px' : $right_arrow_height; ?>;
        left: <?php echo empty($right_arrow_position_left) ? 'auto' : $right_arrow_position_left; ?>;
        top: <?php echo empty($right_arrow_position_top) ? '50%' : $right_arrow_position_top; ?>;
        right: <?php echo empty($right_arrow_position_right) ? '0' : $right_arrow_position_right; ?>;
        bottom: <?php echo empty($right_arrow_position_bottom) ? 'auto' : $right_arrow_position_bottom; ?>;
        opacity: <?php echo empty($right_arrow_opacity) ? '1' : $right_arrow_opacity; ?>;">
        <img src="<?php echo empty($video_slider_right_media_file) ? '' : $video_slider_right_media_file; ?>" alt="">
    </div>

</div>

