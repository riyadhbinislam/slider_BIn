<?php
    // Shortcode handler
    function slider_bin_shortcode($atts) {
        $atts = shortcode_atts(array(
            'id' => '',
        ), $atts);

        // Validate slider ID
        if (empty($atts['id'])) {
            return __('No slider ID provided.', 'slider_bin');
        }

        $post_id = intval($atts['id']);
        if (get_post_type($post_id) !== 'slider_post') {
            return __('Invalid slider ID.', 'slider_bin');
        }

        // Fetch slider type
        $slider_type = get_post_meta($post_id, '_slider_type', true);

        // Start output buffering
        ob_start();

        // Render based on slider type
        if ($slider_type === 'hero_same') {
            echo render_hero_same_slider($post_id);
        } elseif ($slider_type === 'hero_separate') {
            echo render_hero_separate_slider($post_id);
        }  elseif ($slider_type === 'image') {
            echo render_image_slider($post_id);
        } elseif ($slider_type === 'post') {
            echo render_post_slider($post_id);
        } elseif ($slider_type === 'video') {
            echo render_video_slider($post_id);
        } else {
            echo __('Invalid slider type.', 'slider_bin');
        }

        return ob_get_clean();
    }

    add_shortcode('slider_bin', 'slider_bin_shortcode');

    /**
     * Render Hero Same Heading Slider
     */

     function render_hero_same_slider($post_id) {
        // Get the hero same slider data
        $hero_same_slider_data = get_post_meta($post_id, '_hero_same_slider_data', true);

        // Debug the retrieved data
        error_log('Frontend Slider Data: ' . print_r($hero_same_slider_data, true));

        // If there's no data, return a default message
        if (empty($hero_same_slider_data)) {
            return __('No hero same slider data found.', 'your-text-domain');
        }

        // Start output buffering
        ob_start();

        // Include the slider module
        include plugin_dir_path(__FILE__) . 'modules/slider-bin-hero-same-heading-slider.php';

        return ob_get_clean();
    }
    /**
     * Render Hero Separate Heading Slider
     */

    function render_hero_separate_slider($post_id) {
        // Fetch Hero Separate Slider Data
        $hero_separate_slider_data = get_post_meta($post_id, '_hero_separate_slider_data', true);

        // Ensure it's an array
        if (!is_array($hero_separate_slider_data)) {
            $hero_separate_slider_data = [];
        }

        // If no valid data exists, return a fallback message
        if (empty($hero_separate_slider_data)) {
            return __('No hero separate slider data available.', 'slider_bin');
        }

        // Start output buffering
        ob_start();
        // Include the slider module
        include plugin_dir_path(__FILE__) . 'modules/slider-bin-hero-separate-heading-slider.php';
        // Return the buffered output
        return ob_get_clean();
    }

    /**
     * Render Image Slider
     */

     function render_image_slider($post_id) {
        // Fetch slider data
        $image_slider_data = get_post_meta($post_id, '_slider_bin_image_slider', true);

        // If the data is a string, split it into an array
        if (is_string($image_slider_data)) {
            $image_slider_data = explode(',', $image_slider_data);
        }

        // If it's still not an array, return a default message
        if (!is_array($image_slider_data) || empty($image_slider_data)) {
            return __('No images found for this slider.', 'slider_bin');
        }

        // Start output buffering
        ob_start();
        // Include the slider module
        include plugin_dir_path(__FILE__) . 'modules/slider-bin-image-slider.php';
        // Return the buffered output
        return ob_get_clean();
    }

    /**
     * Render Post Slider
     */
    function render_post_slider($post_id) {
    // Fetch slider data
    $post_slider_data = get_post_meta($post_id, '_post_slider_data', true);

    // Ensure $post_slider_data is an array
    if (!is_array($post_slider_data)) {
        $post_slider_data = [];
    }

    // Start output buffering
    ob_start();
    // Include the slider module
    include plugin_dir_path(__FILE__) . 'modules/slider-bin-post-slider.php';
    // Return the buffered output
    return ob_get_clean();


}

    /**
     * Render Video Slider
     */

     function render_video_slider($post_id) {
        // Fetch stored video URLs from the '_video_urls' meta field
        $video_urls = get_post_meta($post_id, '_video_urls', true);

        // Fetch the media or related data from the '_slider_bin_videos' meta field
        $slider_bin_videos = get_post_meta($post_id, '_slider_bin_videos', true);

        // Start output buffering
        ob_start();
        // Include the slider module
        include plugin_dir_path(__FILE__) . 'modules/slider-bin-video-slider.php';
        // Return the buffered output
        return ob_get_clean();
    }
?>