<?php
/*
Plugin Name:        Slider Bin
Plugin URI:         https://github.com/riyadhbinislam?tab=repositories
Description:        A simple and easy-to-use multi-style slider.
Version:            1.1.0
Requires at Least:  6.7.1
Requires PHP:       7.2
Author:             Riyadh Bin Islam
Author URI:         https://github.com/riyadhbinislam
License:            GNU General Public License v2 or later
License URI:        http://www.gnu.org/licenses/gpl-2.0.html
Update URI:         https://github.com/riyadhbinislam
Text Domain:        slider_bin
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Enqueue Styles and Scripts
    function slider_bin_enqueue_styles() {
        wp_enqueue_style('slider_bin-style', plugins_url('css/slider-bin-style.css', __FILE__), array(), '1.0.0', 'all');

        // Enqueue admin-specific styles
        if (is_admin()) {
            wp_enqueue_style('slider_bin-admin-style', plugins_url('css/slider-bin-admin-style.css', __FILE__), array(), '1.0.0', 'all');
        }
    }

    function slider_bin_enqueue_scripts() {
        wp_enqueue_script('jquery');
        wp_enqueue_script('slider_bin-script', plugins_url('js/slider-bin-plugin.js', __FILE__), array('jquery'), '1.0.0', true);
        wp_enqueue_script('slider_bin-script', plugins_url('js/meta-box.js', __FILE__), array('jquery'), '1.0.0', true);
    }


// Hook for Enqueue Scripts
    add_action('wp_enqueue_scripts', 'slider_bin_enqueue_styles');
    add_action('wp_enqueue_scripts', 'slider_bin_enqueue_scripts');
    add_action('admin_enqueue_scripts', 'slider_bin_enqueue_styles');


//Enqueue Admin Scripts and Localize Admin Data

    function slider_bin_enqueue_admin_scripts($hook) {
    if ('slider_post' !== get_post_type()) {
        return;
    }

    // Enqueue WordPress Media Library
    wp_enqueue_media();

    // Enqueue custom admin script
    wp_enqueue_script('slider-bin-media-script', plugins_url('js/slider-bin-media.js', __FILE__), array('jquery'), '1.0.0', true);

    // Localize script for dynamic data
    wp_localize_script('slider-bin-media-script', 'sliderBinMedia', array(
        'title'    => __('Select Images', 'slider_bin'),
        'button'   => __('Use These Images', 'slider_bin'),
    ));
    }

    add_action('admin_enqueue_scripts', 'slider_bin_enqueue_admin_scripts');


//Register AJAX Action
//For Post SLider
//For Blog Post Data call.

    function get_post_data_ajax() {
        // Validate the request
        if (!isset($_GET['post_id'])) {
            wp_send_json_error(['message' => 'Invalid post ID']);
        }

        $post_id = intval($_GET['post_id']);
        $post = get_post($post_id);

        if (!$post) {
            wp_send_json_error(['message' => 'Post not found']);
        }

        // Get post data
        $title = get_the_title($post_id);
        $excerpt = wp_trim_words(get_the_excerpt($post_id), 30, '...'); // Limit excerpt to 30 words
        $image_url = get_the_post_thumbnail_url($post_id, 'full'); // Fetch full-size image
        $post_url = get_permalink($post_id);

        wp_send_json_success([
            'title' => $title,
            'excerpt' => $excerpt,
            'image_url' => $image_url ? $image_url : '', // Fallback if no image
            'link' =>  $post_url
        ]);
    }
    add_action('wp_ajax_get_post_data', 'get_post_data_ajax');
    add_action('wp_ajax_nopriv_get_post_data', 'get_post_data_ajax');


// Plugin Activation Hook
    function slider_bin_activate_plugin() {
        slider_bin_register_post_type();
        flush_rewrite_rules();
    }

// --------------------------------------******************* Slider Bin Post Type Related Function ********************--------------------------------------
    include plugin_dir_path(__FILE__) . 'slider-bin-post-type.php';
    include plugin_dir_path(__FILE__) . 'slider-bin-post-type-metabox.php';
    include plugin_dir_path(__FILE__) . 'slider-bin-shortcode-handler.php';
// --------------------------------------***************************************--------------------------------------

// Plugin Deactivation Hook
    register_deactivation_hook(__FILE__, 'slider_bin_deactivate');

    function slider_bin_deactivate() {
        // Flush rewrite rules on deactivation.
        flush_rewrite_rules();
    }






