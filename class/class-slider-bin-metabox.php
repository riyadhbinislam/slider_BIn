<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


class Slider_Bin_Metabox {

    public function __construct() {
        add_action('add_meta_boxes', [$this, 'add_meta_boxes']);
        add_action('save_post', [$this, 'save_meta_box_data']);
    }

    public function add_meta_boxes() {
        add_meta_box(
            'slider_bin_options',
            __('Slider Options', 'slider_bin'),
            [$this, 'meta_box_callback'],
            'slider_post',
            'normal',
            'high'
        );
        // Add shortcode meta box
        add_meta_box(
            'slider_bin_shortcode',
            __('Slider Shortcode', 'slider_bin'),
            [$this, 'shortcode_meta_box_callback'],
            'slider_post',
            'side',
            'high'
        );
    }

    //Add Meta Box For Post Shortcode
    //So User Can Copy it from Add screen
    public function shortcode_meta_box_callback($post) {
        $shortcode = "[slider_bin id='{$post->ID}']";
        ?>
        <div class="slider-shortcode-wrap">
            <input type="text" value="<?php echo esc_attr($shortcode); ?>" readonly onclick="this.select()" class="widefat slider-shortcode-input">
            <button class="button button-secondary copy-shortcode" data-shortcode="<?php echo esc_attr($shortcode); ?>" style="margin-top: 8px;">
                <?php _e('Copy', 'slider_bin'); ?>
            </button>
        </div>
        <?php
        // Add translations for the copy button
        wp_localize_script('slider-bin-copy', 'sliderBinCopy', [
            'copyText' => __('Copy', 'slider_bin'),
            'copiedText' => __('Copied!', 'slider_bin')
        ]);
    }

    public function meta_box_callback($post) {
        // Retrieve current slider type
        $slider_type = get_post_meta($post->ID, '_slider_type', true);

        // Add nonce for security
        wp_nonce_field('slider_bin_save_meta_box_data', 'slider_bin_nonce');

        // Check for saved repeater data for separate fields
        $hero_field_data = get_post_meta($post->ID, '_hero_field_option', true);
        $post_slider_data = get_post_meta($post->ID, '_post_slider_data', true);
        $image_slider_data = get_post_meta($post->ID, '_slider_bin_image_slider', true);
        $video_slider_data = get_post_meta($post->ID, '_slider_bin_videos', true);

        ?>
        <div id="slider_type_wrapper">
            <label for="slider_type"><?php _e('Select Slider Type - ', 'slider_bin'); ?></label>
            <select id="slider_type" name="slider_type">
                <option value="hero_same" <?php selected($slider_type, 'hero_same'); ?>>Hero With Single Heading</option>
                <option value="hero_separate" <?php selected($slider_type, 'hero_separate'); ?>>Hero With Multiple Heading</option>
                <option value="image" <?php selected($slider_type, 'image'); ?>>Image Slider</option>
                <option value="post" <?php selected($slider_type, 'post'); ?>>Post Slider</option>
                <option value="video" <?php selected($slider_type, 'video'); ?>>Video Slider</option>
            </select>
        </div>

        <div id="slider_fields">
            <div id="hero_same_fields" class="slider-fields" <?php echo ($slider_type === 'hero_same' ? '' : 'style="display:none;"'); ?>>
                <?php include SLIDER_BIN_PATH . 'modules/backend/slider-bin-hero-same-heading-slider.php'; ?>
            </div>
            <div id="hero_separate_fields" class="slider-fields" <?php echo ($slider_type === 'hero_separate' ? '' : 'style="display:none;"'); ?>>
                <?php include SLIDER_BIN_PATH . 'modules/backend/slider-bin-hero-separate-heading-slider.php'; ?>
            </div>
            <div id="image_fields" class="slider-fields" <?php echo ($slider_type === 'image' ? '' : 'style="display:none;"'); ?>>
                <?php include SLIDER_BIN_PATH . 'modules/backend/slider-bin-image-slider.php'; ?>
            </div>
            <div id="post_fields" class="slider-fields" <?php echo ($slider_type === 'post' ? '' : 'style="display:none;"'); ?>>
                <?php include SLIDER_BIN_PATH . 'modules/backend/slider-bin-post-slider.php'; ?>
            </div>
            <div id="video_fields" class="slider-fields" <?php echo ($slider_type === 'video' ? '' : 'style="display:none;"'); ?>>
                <?php include SLIDER_BIN_PATH . 'modules/backend/slider-bin-video-slider.php'; ?>
            </div>
        </div>

        <?php
    }

    public function save_meta_box_data($post_id) {

        // Check if our nonce is set.
        if (!isset($_POST['slider_bin_nonce'])) {
            return;
        }

        // Verify that the nonce is valid.
        if (!wp_verify_nonce($_POST['slider_bin_nonce'], 'slider_bin_save_meta_box_data')) {
            return;
        }

        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        // Check the user's permissions.
        if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return;
            }
        } else {
            if (!current_user_can('edit_post', $post_id)) {
                return;
            }
        }

        // Save slider type
        if (isset($_POST['slider_type'])) {
            update_post_meta($post_id, '_slider_type', sanitize_text_field($_POST['slider_type']));
        }

        // Save Post Slider fields
        if (isset($_POST['slider_type']) && $_POST['slider_type'] === 'post') {

            // Get all the post data arrays
            $post_images = isset($_POST['post_image']) ? (array)$_POST['post_image'] : [];
            $post_headings = isset($_POST['post_heading']) ? (array)$_POST['post_heading'] : [];
            $post_subheadings = isset($_POST['post_subheading']) ? (array)$_POST['post_subheading'] : [];
            $post_urls = isset($_POST['post_url']) ? (array)$_POST['post_url'] : [];

            // Prepare slider data
            $post_slider_data = [];
            for ($i = 0; $i < count($post_images); $i++) {
                $selected_post_id = isset($post_urls[$i]) ? absint($post_urls[$i]) : 0;

                // Only add if we have valid data
                if ($selected_post_id || !empty($post_images[$i]) || !empty($post_headings[$i]) || !empty($post_subheadings[$i])) {
                    $post_slider_data[] = [
                        'image' => sanitize_text_field($post_images[$i] ?? ''),
                        'heading' => sanitize_text_field($post_headings[$i] ?? ''),
                        'subheading' => sanitize_textarea_field($post_subheadings[$i] ?? ''),
                        'url' => $selected_post_id,
                        'permalink' => get_permalink($selected_post_id)
                    ];
                }
            }

            // Update the post meta with the new post slider data
            if (!empty($post_slider_data)) {
                $update_result = update_post_meta($post_id, '_post_slider_data', $post_slider_data);

                // Verify the save
                $saved_data = get_post_meta($post_id, '_post_slider_data', true);
                error_log('Retrieved saved data: ' . print_r($saved_data, true));
            } else {
                error_log('No post slider data to save');
            }
        }

        // Save Hero Same Heading Slider fields
        if (isset($_POST['slider_type']) && $_POST['slider_type'] === 'hero_same') {
            // Get the post ID
            $post_id = isset($_POST['post_ID']) ? intval($_POST['post_ID']) : 0;
            if (!$post_id) {
                return; // Invalid post ID
            }

            // Sanitize text fields
            $hero_heading = isset($_POST['hero_same_heading']) ? sanitize_text_field($_POST['hero_same_heading']) : '';
            $hero_subheading = isset($_POST['hero_same_subheading']) ? sanitize_textarea_field($_POST['hero_same_subheading']) : '';
            $hero_button_link = isset($_POST['hero_same_button_link']) && is_string($_POST['hero_same_button_link'])
                ? esc_url_raw($_POST['hero_same_button_link'])
                : '';
            $hero_button_text = isset($_POST['hero_same_button_text']) ? sanitize_text_field($_POST['hero_same_button_text']) : '';

            // Handle the images
            $hero_images        = isset($_POST['hero_images']) ? $_POST['hero_images'] : '';
            $hero_images_array  = [];

            // Check if images are already an array
            if (is_array($hero_images)) {
                $hero_images_array = array_map('esc_url_raw', $hero_images);
            } elseif (is_string($hero_images)) {
                // If images are a string (comma-separated), convert it to an array
                $hero_images_array = array_map('esc_url_raw', explode(',', $hero_images));
            }

            // Structure the data as an array to store in post meta
            $hero_same_slider_data = [
                'heading'      => $hero_heading,
                'subheading'   => $hero_subheading,
                'button_link'  => $hero_button_link,
                'button_text'  => $hero_button_text,
                'images'       => $hero_images_array,
            ];

            // Save the structured data
            update_post_meta($post_id, '_hero_same_slider_data', $hero_same_slider_data);

            // Optional debugging
            $hero_same_slider_data = get_post_meta($post_id, '_hero_same_slider_data', true);
            error_log('Retrieved Hero Same Heading Slider Data: ' . print_r($hero_same_slider_data, true));
        }

        // Save Hero Separate Heading Slider fields
        if (isset($_POST['slider_type']) && $_POST['slider_type'] === 'hero_separate') {
            // Get the post ID
            $post_id = isset($_POST['post_ID']) ? intval($_POST['post_ID']) : 0;
            if (!$post_id) {
                return; // Invalid post ID
            }

            // Ensure all repeater fields are arrays
            $hero_images = isset($_POST['hero_image']) ? (array) $_POST['hero_image'] : [];
            $hero_headings = isset($_POST['hero_heading']) ? (array) $_POST['hero_heading'] : [];
            $hero_subheadings = isset($_POST['hero_subheading']) ? (array) $_POST['hero_subheading'] : [];
            $hero_button_links = isset($_POST['hero_button_link']) ? (array) $_POST['hero_button_link'] : [];
            $hero_button_texts = isset($_POST['hero_button_text']) ? (array) $_POST['hero_button_text'] : [];
            $hero_image_urls = isset($_POST['hero_image_url']) ? (array) $_POST['hero_image_url'] : [];

            $hero_separate_data = [];

            // Get the maximum count of all arrays to ensure we process all data
            $count = max([
                count($hero_images),
                count($hero_headings),
                count($hero_subheadings),
                count($hero_button_links),
                count($hero_button_texts),
                count($hero_image_urls)
            ]);

            // Loop through each field group and build an array
            for ($i = 0; $i < $count; $i++) {
                // Only add if we have at least one non-empty value
                if (!empty($hero_images[$i]) || !empty($hero_image_urls[$i]) ||
                    !empty($hero_headings[$i]) || !empty($hero_subheadings[$i]) ||
                    !empty($hero_button_links[$i]) || !empty($hero_button_texts[$i])) {

                    $hero_separate_data[] = [
                        'image' => isset($hero_images[$i]) ? sanitize_text_field($hero_images[$i]) : '',
                        'heading' => isset($hero_headings[$i]) ? sanitize_text_field($hero_headings[$i]) : '',
                        'subheading' => isset($hero_subheadings[$i]) ? sanitize_textarea_field($hero_subheadings[$i]) : '',
                        'button_link' => isset($hero_button_links[$i]) ? esc_url_raw($hero_button_links[$i]) : '',
                        'button_text' => isset($hero_button_texts[$i]) ? sanitize_text_field($hero_button_texts[$i]) : '',
                        'image_url' => isset($hero_image_urls[$i]) ? esc_url_raw($hero_image_urls[$i]) : '',
                    ];
                }
            }

            // Only update if we have data
            if (!empty($hero_separate_data)) {
                update_post_meta($post_id, '_hero_separate_slider_data', $hero_separate_data);

                // Debug log
                error_log('Saved hero separate data: ' . print_r($hero_separate_data, true));
            } else {
                // If no data, check if we should delete the meta
                $existing_data = get_post_meta($post_id, '_hero_separate_slider_data', true);
                if (!empty($existing_data)) {
                    delete_post_meta($post_id, '_hero_separate_slider_data');
                }
                error_log('No hero separate data to save');
            }
        }

        // Save Image Slider fields
        if ('image' === $_POST['slider_type']) {
            if (isset($_POST['slider_bin_image_slider'])) {
                update_post_meta($post_id, '_slider_bin_image_slider', sanitize_text_field($_POST['slider_bin_image_slider']));

                // Save image captions
                if (isset($_POST['image_captions']) && is_array($_POST['image_captions'])) {
                    $captions = array_map('sanitize_text_field', $_POST['image_captions']);
                    update_post_meta($post_id, '_slider_bin_image_captions', $captions);
                } else {
                    delete_post_meta($post_id, '_slider_bin_image_captions');
                }
            }
        }

        // Save Video Slider fields
        if ('video' === $_POST['slider_type']) {
            // Save multiple video URLs
            if (isset($_POST['video_urls']) && is_array($_POST['video_urls'])) {
                $video_urls = array_map('esc_url_raw', $_POST['video_urls']);
                update_post_meta($post_id, '_video_urls', $video_urls);
            }
            // Save uploaded video URLs
            if (isset($_POST['slider_bin_videos'])) {
                update_post_meta($post_id, '_slider_bin_videos', sanitize_text_field($_POST['slider_bin_videos']));
            }
        }
    }
}

// Initialize the class
new Slider_Bin_Metabox();