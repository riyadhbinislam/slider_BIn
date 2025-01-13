<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Slider_Bin_Shortcode {
    public function __construct() {
        add_shortcode('slider_bin', [$this, 'slider_bin_shortcode']);
    }


    // public function slider_bin_shortcode($atts) {
    //     // Enqueue required assets
    //     wp_enqueue_style('slider-bin-style');
    //     wp_enqueue_script('slider-bin-script');

    //     $atts = shortcode_atts(array(
    //         'id' => '',
    //     ), $atts);

    //     // Validate slider ID
    //     if (empty($atts['id'])) {
    //         return __('No slider ID provided.', 'slider_bin');
    //     }

    //     $post_id = intval($atts['id']);
    //     if (get_post_type($post_id) !== 'slider_post') {
    //         return __('Invalid slider ID.', 'slider_bin');
    //     }

    //     // Fetch slider type
    //     $slider_type = get_post_meta($post_id, '_slider_type', true);
    //     if (empty($slider_type)) {
    //         return __('No slider type specified.', 'slider_bin');
    //     }

    //     // Start output buffering
    //     ob_start();

    //     try {
    //         switch ($slider_type) {
    //             case 'hero_same':
    //                 $this->render_hero_same_slider($post_id);
    //                 break;
    //             case 'hero_separate':
    //                 $this->render_hero_separate_slider($post_id);
    //                 break;
    //             case 'image':
    //                 $this->render_image_slider($post_id);
    //                 break;
    //             case 'post':
    //                 $this->render_post_slider($post_id);
    //                 break;
    //             case 'video':
    //                 $this->render_video_slider($post_id);
    //                 break;
    //             default:
    //                 ob_end_clean();
    //                 return __('Invalid slider type.', 'slider_bin');
    //         }
    //     } catch (Exception $e) {
    //         ob_end_clean();
    //         if (WP_DEBUG) {
    //             return 'Error: ' . $e->getMessage();
    //         }
    //         return __('An error occurred while rendering the slider.', 'slider_bin');
    //     }

    //     return ob_get_clean();
    // }

    /**
     * Render Hero Same Heading Slider
     */

     public function slider_bin_shortcode($atts) {
        // Enqueue required assets
        wp_enqueue_style('slider-bin-style');
        wp_enqueue_script('slider-bin-script');

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
        if (empty($slider_type)) {
            return __('No slider type specified.', 'slider_bin');
        }

        // Generate a unique ID for this slider
        $unique_id = 'slider_bin_' . $post_id . '_' . uniqid();

        // Pass the unique ID to the template
        ob_start();
        try {
            switch ($slider_type) {
                case 'hero_same':
                    $this->render_hero_same_slider($post_id, $unique_id);
                    break;
                case 'hero_separate':
                    $this->render_hero_separate_slider($post_id, $unique_id);
                    break;
                case 'image':
                    $this->render_image_slider($post_id, $unique_id);
                    break;
                case 'post':
                    $this->render_post_slider($post_id, $unique_id);
                    break;
                case 'video':
                    $this->render_video_slider($post_id, $unique_id);
                    break;
                default:
                    ob_end_clean();
                    return __('Invalid slider type.', 'slider_bin');
            }
        } catch (Exception $e) {
            ob_end_clean();
            if (WP_DEBUG) {
                return 'Error: ' . $e->getMessage();
            }
            return __('An error occurred while rendering the slider.', 'slider_bin');
        }

        return ob_get_clean();
    }

     private function render_hero_same_slider($post_id, $unique_id) {
        // Get the hero same slider data
        $hero_same_slider_data = get_post_meta($post_id, '_hero_same_slider_data', true);

        // If there's no data, return a default message
        if (!$hero_same_slider_data) {
            throw new Exception('No hero same slider data found.');
        }
        // Pass the unique ID to the template
        set_query_var('unique_id', $unique_id);
        require SLIDER_BIN_PATH . 'modules/frontend/slider-bin-hero-same-heading-slider.php';
    }

    /**
     * Render Hero Separate Heading Slider
     */

     private function render_hero_separate_slider($post_id, $unique_id) {
        $hero_separate_slider_data = get_post_meta($post_id, '_hero_separate_slider_data', true);

        if (!is_array($hero_separate_slider_data) || empty($hero_separate_slider_data)) {
            echo __('No hero separate slider data found.', 'slider_bin');
            return;
        }
        // Pass the unique ID to the template
        set_query_var('unique_id', $unique_id);
        require SLIDER_BIN_PATH . 'modules/frontend/slider-bin-hero-separate-heading-slider.php';
    }

    /**
     * Render Image Slider
     */

     private function render_image_slider($post_id, $unique_id) {
        // Get image urls
        $image_slider_data = get_post_meta($post_id, '_slider_bin_image_slider', true);
        // Get captions
        $image_captions = get_post_meta($post_id, '_slider_bin_image_captions', true) ?: array();

        if (is_string($image_slider_data)) {
            $image_slider_data = explode(',', $image_slider_data);
        }

        if (!is_array($image_slider_data) || empty($image_slider_data)) {
            echo __('No images found for this slider.', 'slider_bin');
            return;
        }

        // Pass the unique ID to the template
        set_query_var('unique_id', $unique_id);

        include SLIDER_BIN_PATH . 'modules/frontend/slider-bin-image-slider.php';
    }

    /**
     * Render Post Slider
     */
    private function render_post_slider($post_id, $unique_id) {
        $post_slider_data = get_post_meta($post_id, '_post_slider_data', true);

        if (!is_array($post_slider_data)) {
            $post_slider_data = array();
        }
        // Pass the unique ID to the template
        set_query_var('unique_id', $unique_id);
        include SLIDER_BIN_PATH . 'modules/frontend/slider-bin-post-slider.php';
    }
    /**
     * Render Video Slider
     */

     private function render_video_slider($post_id, $unique_id) {
        // Get video URLs from post meta
        $video_urls = get_post_meta($post_id, '_video_urls', true);
        $slider_bin_videos = get_post_meta($post_id, '_slider_bin_videos', true);

        // Debug log before processing
        if (WP_DEBUG) {
            error_log('Raw video_urls: ' . print_r($video_urls, true));
            error_log('Raw slider_bin_videos: ' . print_r($slider_bin_videos, true));
        }

        // Convert string to array if necessary
        if (is_string($video_urls)) {
            $video_urls = array_filter(explode(',', $video_urls));
        }

        if (is_string($slider_bin_videos)) {
            $slider_bin_videos = array_filter(explode(',', $slider_bin_videos));
        }

        // Ensure we have arrays
        $video_urls = is_array($video_urls) ? array_filter($video_urls) : array();
        $slider_bin_videos = is_array($slider_bin_videos) ? array_filter($slider_bin_videos) : array();

        // Debug log after processing
        if (WP_DEBUG) {
            error_log('Processed video_urls: ' . print_r($video_urls, true));
            error_log('Processed slider_bin_videos: ' . print_r($slider_bin_videos, true));
        }

        if (empty($video_urls) && empty($slider_bin_videos)) {
            return __('No videos found for this slider.', 'slider_bin');
        }

        // Make variables available to template
        set_query_var('video_urls', $video_urls);
        set_query_var('slider_bin_videos', $slider_bin_videos);

        // Pass the unique ID to the template
        set_query_var('unique_id', $unique_id);

        // Include the template
        include SLIDER_BIN_PATH . 'modules/frontend/slider-bin-video-slider.php';
    }


}