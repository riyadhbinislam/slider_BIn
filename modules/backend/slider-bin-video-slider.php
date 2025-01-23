<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>

<div class="video-wrapper-style">
    <!-- Repeatable Group -->
    <div id="video_repeater">
        <p>“Integrate external video URLs, such as YouTube or Vimeo, seamlessly into your project.”</p>
        <?php
        // Retrieve saved video URLs (as an array)
        $video_urls = get_post_meta($post->ID, '_video_urls', true);
        $video_urls = is_array($video_urls) ? $video_urls : []; // Ensure it's an array

        // Display existing video URLs
        if (!empty($video_urls)) {
            foreach ($video_urls as $index => $video_url) {
                ?>
                <div class="video_group">
                    <div class="inner-field-wrapper">
                        <label for="video_url_<?php echo $index; ?>">External Video URL:</label>
                        <input type="url" name="video_urls[]" value="<?php echo esc_url($video_url); ?>" >
                        <button type="button" class="button remove-video">Remove</button>
                    </div>
                </div>
                <?php
            }
        } else {
            // Default empty input for the first video URL
            ?>
            <div class="video_group">
                <div class="inner-field-wrapper">
                    <label for="video_url_0">External Video URL:</label>
                    <input type="url" name="video_urls[]" value="">
                    <button type="button" class="button remove-video">Remove</button>
                </div>
            </div>
            <?php
        }
        ?>

    </div>
    <!-- Button to add more video input fields -->
    <button type="button" class="button" id="add_more_video_repeater" >Add More</button>
</div>


<!-- Upload Videos -->
<div class="inner-field-wrapper">
    <label>Or Select From Media:</label>
    <button type="button" class="button slider-bin-select-videos">Upload Video</button>
    <input type="hidden" id="slider_bin_videos" name="slider_bin_videos" value="<?php echo esc_attr(get_post_meta($post->ID, '_slider_bin_videos', true)); ?>">
</div>

<!-- Preview Video -->
<div id="video_preview" style="margin-top: 15px;">
     <?php
    $uploaded_videos = get_post_meta($post->ID, '_slider_bin_videos', true);
    if (!empty($uploaded_videos)) {
        $uploaded_videos = explode(',', $uploaded_videos);
        foreach ($uploaded_videos as $video_url) {
            echo '<div class="video-wrapper" style="display: inline-block; margin: 10px;">';
            echo '<video src="' . esc_url($video_url) . '" controls style="max-width: 180px; margin-right: 5px; display: inline-block;"></video>';
            echo '<button type="button" class="button remove-video-preview" style="display: block; margin: 0 auto;">Remove</button>';
            echo '</div>';
        }
    }
    ?>
</div>


<div class="slider-preview-wrapper">
    <?php
    // Get video URLs from post meta
    $video_urls = get_post_meta($post_id, '_video_urls', true);
    $slider_bin_videos = get_post_meta($post_id, '_slider_bin_videos', true);

    // Convert string to array if necessary
    if (is_string($video_urls)) {
        $video_urls = array_filter(explode(',', $video_urls));
    }

    if (is_string($slider_bin_videos)) {
        $slider_bin_videos = array_filter(explode(',', $slider_bin_videos));
    }

    // Ensure arrays
    $video_urls = is_array($video_urls) ? array_filter($video_urls) : [];
    $slider_bin_videos = is_array($slider_bin_videos) ? array_filter($slider_bin_videos) : [];

    // Generate a unique ID for this slider preview
    $unique_id = 'slider_bin_' . $post_id . '_' . uniqid();

    // Pass the unique ID to the template
    set_query_var('unique_id', $unique_id);

    if ((!empty($slider_bin_videos)) || (!empty($video_urls))) {
        ?>
        <span class="tag">Preview</span>
        <div class="slider-preview">
            <?php
                // Get options
                $options = get_option('slider_bin_video_slider_settings');


                $slider_width = isset($options['video_slider_width']) ? esc_attr($options['video_slider_width']) : '100%';
                $slider_height = isset($options['video_slider_height']) ? esc_attr($options['video_slider_height']) : '700px';

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
                                <div class="slide media-slide" >
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
        </div>
    <?php } ?>