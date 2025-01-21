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
    // $slider_height = isset($options['video_slider_height']) ? esc_attr($options['video_slider_height']) : '700px';

    $video_slider_left_media_file = isset($options['video_slider_left_media_file']) ? esc_attr($options['video_slider_left_media_file']) : SLIDER_BIN_URL . '/assets/icon/arrow-left.png';
    $video_slider_right_media_file = isset($options['video_slider_right_media_file']) ? esc_attr($options['video_slider_right_media_file']) : SLIDER_BIN_URL . '/assets/icon/arrow-right.png';

    $video_slider_arrow_opacity = isset($options['video_slider_arrow_opacity']) ? esc_attr($options['video_slider_arrow_opacity']) : '';
    $video_slider_arrow_width = isset($options['video_slider_arrow_width']) ? esc_attr($options['video_slider_arrow_width']) : '';
    $video_slider_arrow_height = isset($options['video_slider_arrow_height']) ? esc_attr($options['video_slider_left_arrow_height']) : '';

    $video_slider_arrow_position = isset($options['video_slider_arrow_position']) ? esc_attr($options['video_slider_arrow_position']) : array();

    $video_slider_arrow_position_left = isset($video_slider_arrow_position['video_slider_arrow_position_left']) ? esc_attr($video_slider_arrow_position['video_slider_arrow_position_left']) : '0';
    $video_slider_arrow_position_top = isset($video_slider_arrow_position['video_slider_arrow_position_top']) ? esc_attr($video_slider_arrow_position['video_slider_arrow_position_top']) : '50%';
    $video_slider_arrow_position_right = isset($video_slider_arrow_position['video_slider_arrow_position_right']) ? esc_attr($video_slider_arrow_position['video_slider_arrow_position_right']) : '0';
    $video_slider_arrow_position_bottom = isset($video_slider_arrow_position['video_slider_arrow_position_bottom']) ? esc_attr($video_slider_arrow_position['video_slider_arrow_position_bottom']) : 'auto';


    $pagination_height          =isset($video_slider_options['video_slider_pagination_height']) ?esc_attr($video_slider_options['video_slider_pagination_height']) : '15px';
    $pagination_width           =isset($video_slider_options['video_slider_pagination_width']) ?esc_attr($video_slider_options['video_slider_pagination_width']) : '15px';
    $pagination_gap             =isset($video_slider_options['video_slider_pagination_gap']) ?esc_attr($video_slider_options['video_slider_pagination_gap']) : '5px';
    $pagination_color           =isset($video_slider_options['video_slider_pagination_color']) ?esc_attr($video_slider_options['video_slider_pagination_color']) : '#8E1616';
    $pagination_active_color    =isset($video_slider_options['video_slider_pagination_active_color']) ?esc_attr($video_slider_options['video_slider_pagination_active_color']) : '#D84040';

?>


<style>
    .arrow-left {
        width: <?php echo empty($video_slider_arrow_width) ? '40px' : $video_slider_arrow_width; ?>;
        height: <?php echo empty($video_slider_arrow_height) ? '40px' : $video_slider_arrow_height; ?>;
        left: <?php echo empty($video_slider_arrow_position_left) ? '0' : $video_slider_arrow_position_left; ?>;
        top: <?php echo empty($video_slider_arrow_position_top) ? '50%' : $video_slider_arrow_position_top; ?>;
        opacity: <?php echo empty($video_slider_arrow_opacity) ? '1' : $video_slider_arrow_opacity; ?>;
    }

    .arrow-right {
        width:      <?php echo empty($video_slider_arrow_width) ? '40px' : $video_slider_arrow_width; ?>;
        height:     <?php echo empty($video_slider_arrow_height) ? '40px' : $video_slider_arrow_height; ?>;
        right:      <?php echo empty($video_slider_arrow_position_right) ? '0' : $video_slider_arrow_position_right; ?>;
        top:        <?php echo empty($video_slider_arrow_position_top) ? '50%' : $video_slider_arrow_position_top; ?>;
        opacity:    <?php echo empty($video_slider_arrow_opacity) ? '1' : $video_slider_arrow_opacity; ?>;
    }

    .dot{
        height: <?php echo !empty($pagination_height) ? $pagination_height : '15px'; ?>;
        width: <?php echo !empty($pagination_width) ? $pagination_width : '15px'; ?>;
        margin-left:<?php echo !empty($pagination_gap) ? $pagination_gap : '5px'; ?>;
        background-color: <?php echo !empty($pagination_color) ? $pagination_color : '#8E1616'; ?>;
    }

    .dot.active {
        background-color:<?php echo !empty($pagination_active_color) ? $pagination_active_color : '#D84040'; ?> !important;
    }

</style>

<div id="<?php echo esc_attr($unique_id); ?>" class="slider-wrapper video-slider" style="width: <?php echo empty($slider_width) ? '100%' : $slider_width; ?>; ">
    <div id="arrow-left" class="arrow-left" >
        <img src="<?php echo empty($video_slider_left_media_file) ? SLIDER_BIN_URL . '/assets/icon/arrow-left.png' : $video_slider_left_media_file; ?>" alt="">
    </div>


    <div id="slider">
        <?php

        // Render uploaded videos
        if (!empty($slider_bin_videos)) {
            foreach ($slider_bin_videos as $video_url) {
                $video_url = esc_url(trim($video_url));
                if (!empty($video_url)) {
                    ?>
<<<<<<< HEAD
                    <div class="slide media-slide" >
=======
                    <div class="slide media-slide">
>>>>>>> acb32e2d25c816cd0aafbacc0a5cfd4bf7be53b7
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
                        <div class="slide video-slide">
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

    <div id="arrow-right" class="arrow-right">
        <img src="<?php echo empty($video_slider_right_media_file) ? SLIDER_BIN_URL . '/assets/icon/arrow-right.png' : $video_slider_right_media_file; ?>" alt="">
    </div>

    <div class="pagination">
    <?php
    $all_videos = array_merge($slider_bin_videos ?? [], $video_urls ?? []);
    if (!empty($all_videos)): ?>
        <?php foreach ($all_videos as $index => $video_url): ?>
            <span class="dot"  onclick="currentSlide(<?php echo $index + 1; ?>)"></span>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

</div>
