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
    $slider_height = isset($options['video_slider_height']) ? esc_attr($options['video_slider_height']) : '400px';

    $left_arrow_style = isset($options['video_slider_arrow_left']) ? esc_attr($options['video_slider_arrow_left']) : '';
    $right_arrow_style = isset($options['video_slider_arrow_right']) ? esc_attr($options['video_slider_arrow_right']) : '';

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
    <style>
        #arrow-left svg {
            width: <?php echo $left_arrow_width; ?>;
            height: <?php echo $left_arrow_height; ?>;
            color: <?php echo $left_arrow_color; ?>;
            fill: <?php echo $left_arrow_color; ?>;
            stroke: <?php echo $left_arrow_color; ?>;
            path: <?php echo $left_arrow_color; ?>;
            opacity: <?php echo $left_arrow_opacity; ?>;
        }

        #arrow-right svg {
            width: <?php echo $right_arrow_width; ?>;
            height: <?php echo $right_arrow_height; ?>;
            color: <?php echo $right_arrow_color; ?>;
            fill: <?php echo $right_arrow_color; ?>;
            stroke: <?php echo $right_arrow_color; ?>;
            path: <?php echo $right_arrow_color; ?>;
            opacity: <?php echo $right_arrow_opacity; ?>;
        }
    </style>
<div class="slider-wrapper video-slider" style="width: <?php echo $slider_width; ?>; ">

    <?php if ((count($video_urls) + count($slider_bin_videos)) > 1): ?>
        <div id="arrow-left" class="arrow" style="left: <?php echo $left_arrow_position_left; ?>; top: <?php echo $left_arrow_position_top; ?>; right: <?php echo $right_arrow_position_right; ?>; bottom: <?php echo $right_arrow_position_bottom; ?>; opacity: <?php echo $left_arrow_opacity; ?>; ">
            <?php
                $svg_path = $left_arrow_style;
                if (filter_var($svg_path, FILTER_VALIDATE_URL)) {
                    // Add arguments to ignore SSL verification for local development
                    $args = array(
                        'sslverify' => false, // Ignore SSL verification
                        'timeout'   => 30
                    );

                    $response = wp_remote_get($svg_path, $args);
                    if (!is_wp_error($response)) {
                        $svg_content = wp_remote_retrieve_body($response);

                        // Add the necessary attributes for sizing and coloring
                        $svg_content = str_replace(
                            '<svg',
                            '<svg width="' . $left_arrow_width . '" height="' . $left_arrow_height . '" style="fill: ' . $left_arrow_color . ';"',
                            $svg_content
                        );

                        // Output the modified SVG
                        echo $svg_content;
                    } else {
                        // Fallback in case of error
                        echo '<img src="' . esc_url($svg_path) . '" alt="Arrow Left" style="width: ' . $left_arrow_width . '; height: ' . $left_arrow_height . ';">';
                    }
                }
            ?>
        </div>
    <?php endif; ?>

    <div id="slider">
        <?php

        // Render uploaded videos
        if (!empty($slider_bin_videos)) {
            foreach ($slider_bin_videos as $video_url) {
                $video_url = esc_url(trim($video_url));
                if (!empty($video_url)) {
                    ?>
                    <div class="slide media-slide" style="height: <?php echo $slider_height; ?>;">
                        <video
                            width="100%"
                            height="100%"
                            autoplay
                            muted
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

                    if (!empty($embed_url)) {
                        ?>
                        <div class="slide video-slide" style="<?php echo $slider_height; ?>;">
                            <iframe
                                width="100%"
                                height="100%"
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


    <?php if ((count($video_urls) + count($slider_bin_videos)) > 1): ?>
        <div id="arrow-right" class="arrow" style="left: <?php echo $right_arrow_position_left; ?>; top: <?php echo $right_arrow_position_top; ?>; right: <?php echo $right_arrow_position_right; ?>; bottom: <?php echo $right_arrow_position_bottom; ?>; opacity: <?php echo $right_arrow_opacity; ?>; ">
            <?php
                $svg_path = $right_arrow_style;
                if (filter_var($svg_path, FILTER_VALIDATE_URL)) {
                    // Add arguments to ignore SSL verification for local development
                    $args = array(
                        'sslverify' => false, // Ignore SSL verification
                        'timeout'   => 30
                    );

                    $response = wp_remote_get($svg_path, $args);
                    if (!is_wp_error($response)) {
                        $svg_content = wp_remote_retrieve_body($response);

                        // Add the necessary attributes for sizing and coloring
                        $svg_content = str_replace(
                            '<svg',
                            '<svg width="' . $right_arrow_width . '" height="' . $right_arrow_height . '" style="fill: ' . $right_arrow_color . ';"',
                            $svg_content
                        );

                        // Output the modified SVG
                        echo $svg_content;
                    } else {
                        // Fallback in case of error
                        echo '<img src="' . esc_url($svg_path) . '" alt="Arrow Right" style="width: ' . $right_arrow_width . '; height: ' . $right_arrow_height . ';">';
                    }
                }
            ?>
        </div>
    <?php endif; ?>
</div>

