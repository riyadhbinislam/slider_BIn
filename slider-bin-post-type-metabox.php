<?php
    // Add meta box for Register Slider Post Type
    function slider_bin_add_meta_boxes() {
        add_meta_box(
            'slider_bin_options', // Meta box ID
            __('Slider Options', 'slider_bin'), // Title
            'slider_bin_meta_box_callback', // Callback function
            'slider_post', // Post type
            'normal', // Context
            'high' // Priority
        );
    }

    add_action('add_meta_boxes', 'slider_bin_add_meta_boxes');

    // Meta box callback
    function slider_bin_meta_box_callback($post) {
        // Retrieve current slider type
        $slider_type = get_post_meta($post->ID, '_slider_type', true);

        // Add nonce for security
        wp_nonce_field('slider_bin_save_meta_box_data', 'slider_bin_nonce');

        // Check for saved repeater data for separate fields
        $hero_field_data= get_post_meta($post->ID, '_hero_field_option', true);
        // Retrieve saved Post Slider data
        $post_slider_data = get_post_meta($post->ID, '_post_slider_data', true);
        $image_slider_data = get_post_meta($post->ID, '_slider_bin_image_slider', true);
        $video_slider_data = get_post_meta($post->ID, '_slider_bin_videos', true);

        // Fields
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
            <!-- Hero Slider Same Heading Fields -->
            <div id="hero_same_fields" class="slider-fields" style="display: none;">
                <?php
                    // Retrieve the saved meta data
                    $hero_same_slider_data = get_post_meta($post->ID, '_hero_same_slider_data', true);

                    // Default empty values if the meta data is missing
                    $hero_heading = isset($hero_same_slider_data['heading']) ? esc_attr($hero_same_slider_data['heading']) : '';
                    $hero_subheading = isset($hero_same_slider_data['subheading']) ? esc_attr($hero_same_slider_data['subheading']) : '';
                    $hero_button_link = isset($hero_same_slider_data['button_link']) ? esc_url($hero_same_slider_data['button_link']) : '';
                    $hero_button_text = isset($hero_same_slider_data['button_text']) ? esc_attr($hero_same_slider_data['button_text']) : '';
                ?>
                <div class="slider-slogan">
                    <h2 class="slider-title">Heroic Moments, Singular Focus</h2>
                    <p class="slider-Subtitle">A seamless hero slider with a single heading, subheading, and call-to-action to enhance multiple visuals.</p>
                </div>

                <div class="hero_group">
                    <?php wp_nonce_field('hero_same_slider_nonce', 'hero_same_slider_nonce'); ?>

                    <div class="inner-field-wrapper">
                        <label for="hero_same_heading">Heading:</label>
                        <input type="text" name="hero_same_heading" id="hero_same_heading" value="<?php echo $hero_heading; ?>">
                    </div>

                    <div class="inner-field-wrapper">
                        <label for="hero_same_subheading">Sub-Heading:</label>
                        <input type="text" name="hero_same_subheading" id="hero_same_subheading" value="<?php echo $hero_subheading; ?>">
                    </div>

                    <div class="inner-field-wrapper">
                        <label for="hero_same_button_link">Button Link:</label>
                        <input type="text" name="hero_same_button_link" id="hero_same_button_link" value="<?php echo $hero_button_link; ?>">
                    </div>

                    <div class="inner-field-wrapper">
                        <label for="hero_same_button_text">Button Text:</label>
                        <input type="text" name="hero_same_button_text" id="hero_same_button_text" value="<?php echo $hero_button_text; ?>">
                    </div>

                    <div class="inner-field-wrapper">
                        <label for="hero_images">Images</label>
                        <button type="button" class="button slider-bin-select-images">Upload Images</button>
                        <input type="hidden" name="hero_images" value="">
                    </div>
                    <div id="image_slider_preview" class="image-preview"></div>
                </div>
            </div>

            <!-- Hero Slider Separate Heading Fields -->
            <div id="hero_separate_fields" class="slider-fields" style="display: none;">
                <div class="slider-slogan">
                    <h2 class="slider-title">Empower Every Frame with a Fresh Perspective</h2>
                    <p class="slider-Subtitle">Highlight each hero image with its own heading, subheading, and call-to-action.</p>
                </div>
                <div id="hero_repeater">
                    <div class="hero_group">
                        <div class="inner-field-wrapper">
                            <label for="hero_heading">Heading:</label>
                            <input type="text" name="hero_heading[]" value="">
                        </div>

                        <div class="inner-field-wrapper">
                            <label for="hero_subheading">Sub-Heading:</label>
                            <input type="text" name="hero_subheading[]" value="">
                        </div>

                        <div class="inner-field-wrapper">
                            <label for="hero_button_link">Button Link:</label>
                            <input type="url" name="hero_button_link[]" value="">
                        </div>
                        <div class="inner-field-wrapper">
                            <label for="hero_button_text">Button Text:</label>
                            <input type="text" name="hero_button_text[]" value="">
                        </div>
                        <div class="inner-field-wrapper">
                            <label>Image:</label>
                            <button type="button" class="button slider-bin-select-image">Upload Image</button>
                            <input type="hidden" name="hero_image[]" value="">

                        </div>
                        <div id="image_slider_preview" class="image-preview"></div>
                    </div>
                </div>
                <button class="button" type="button" id="add_more_hero_repeater">Add More</button>
            </div>

            <!-- Post Slider Fields -->
            <div id="post_fields" class="slider-fields" style="display: none;">

                <div class="slider-slogan">
                    <h2 class="slider-title">Catch Up on Our Most Engaging Reads</h2>
                    <p class="slider-Subtitle">Let your stories shine—slide through your top posts in style.</p>
                </div>

                <div id="post_repeater">
                    <!-- Repeatable group -->
                    <div class="post_group">
                        <div class="inner-field-wrapper">
                            <label for="post_url">Blog Post URL:</label>
                            <select name="post_url[]" class="post-select">
                                <option value="">Select Post</option>
                                <?php
                                    $posts = get_posts(array('post_type' => 'post', 'post_status' => 'publish'));
                                    foreach ($posts as $post_option) {
                                        echo '<option value="' . $post_option->ID . '">' . esc_html($post_option->post_title) . '</option>';
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="inner-field-wrapper">
                            <label for="post_heading">Heading:</label>
                            <input type="text" name="post_heading[]" value="">
                        </div>

                        <div class="inner-field-wrapper">
                            <label for="post_subheading">Sub-Heading:</label>
                            <textarea name="post_subheading[]"></textarea>
                        </div>

                        <div class="inner-field-wrapper">
                            <label for="post_image">Image:</label>
                            <button type="button" class="button slider-bin-select-image">Upload Image</button>
                            <input type="hidden" name="post_image[]" value="">
                        </div>
                        <!-- Image Preview -->
                        <div class="image-preview"></div>
                    </div>
                </div>
                <!-- Add button to add more groups -->
                <button type="button" class="button" id="add_more_repeater">Add More</button>

            </div>

            <!-- Image Slider Fields -->
            <div id="image_fields" class="slider-fields" style="display: none;">
                <div class="slider-slogan">
                    <h2 class="slider-title">Let Your Images Speak Louder Than Words</h2>
                    <p class="slider-Subtitle">Highlight your best shots with a dynamic sliding gallery.</p>
                </div>
                <div class="inner-field-wrapper">
                    <label>Images:</label>
                    <button type="button" class="button slider-bin-select-images">Upload Images</button>
                    <input type="hidden" id="slider_bin_image_slider" name="slider_bin_image_slider" value="<?php echo esc_attr(get_post_meta($post->ID, '_slider_bin_image_slider', true)); ?>">
                    <br>
                </div>
                <div id="image_slider_preview" class="image-preview">
                    <?php
                    $image_slider_images = get_post_meta($post->ID, '_slider_bin_image_slider', true);
                    if ($image_slider_images) {
                        $image_slider_images = explode(',', $image_slider_images);
                        foreach ($image_slider_images as $image) {
                            echo '<img src="' . esc_url($image) . '" style="max-width: 100px; margin: 5px;">';
                        }
                    }
                    ?>
                </div>

            </div>

            <!-- Video Slider Fields -->
            <div id="video_fields" class="slider-fields" style="display: none;">
                <div class="slider-slogan">
                    <h2 class="slider-title">Heroic Moments, Singular Focus</h2>
                    <p class="slider-Subtitle">A seamless video slider with multiple video URLs and previews.</p>
                </div>

                <!-- Repeatable Group -->
                <div id="video_repeater">
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
                                    <label for="video_url_<?php echo $index; ?>">Custom Video URL:</label>
                                    <input type="url" name="video_urls[]" value="<?php echo esc_url($video_url); ?>" style="width: 80%;">
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
                                <label for="video_url_0">Custom Video URL:</label>
                                <input type="url" name="video_urls[]" value="" style="width: 80%;">
                                <button type="button" class="button remove-video">Remove</button>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <!-- Button to add more video input fields -->
                <button type="button" class="button" id="add_more_video_repeater">Add More</button>

                <!-- Upload Videos -->
                <div class="inner-field-wrapper">
                    <label for="slider_bin_videos">Select From Media</label>
                    <button type="button" class="button slider-bin-select-videos">Upload Video</button>
                    <input type="hidden" id="slider_bin_videos" name="slider_bin_videos" value="<?php echo esc_attr(get_post_meta($post->ID, '_slider_bin_videos', true)); ?>">
                </div>

                <!-- Preview Video -->
                <div id="video_preview">
                    <?php
                    $uploaded_videos = get_post_meta($post->ID, '_slider_bin_videos', true);
                    if (!empty($uploaded_videos)) {
                        $uploaded_videos = explode(',', $uploaded_videos);
                        foreach ($uploaded_videos as $video_url) {
                            echo '<video src="' . esc_url($video_url) . '" controls style="max-width: 200px; margin-right: 5px; display: inline-block;"></video>';
                        }
                    }
                    ?>
                </div>
            </div>

        </div>

        <?php
    }

    //Save Post Meta
    function slider_bin_save_meta_box_data($post_id) {
        // Verify nonce for security
        if (!isset($_POST['slider_bin_nonce']) || !wp_verify_nonce($_POST['slider_bin_nonce'], 'slider_bin_save_meta_box_data')) {
            return;
        }

        // Auto-save check
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        // Check permissions
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        // Save slider type
        if (isset($_POST['slider_type'])) {
            update_post_meta($post_id, '_slider_type', sanitize_text_field($_POST['slider_type']));
        }

         // Save Hero Same Slider fields

         if (isset($_POST['slider_type']) && $_POST['slider_type'] === 'hero_same') {
            // Get the post ID
            $post_id = isset($_POST['post_ID']) ? intval($_POST['post_ID']) : 0;
            if (!$post_id) {
                return; // Invalid post ID
            }

            // Sanitize text fields
            $hero_heading = isset($_POST['hero_same_heading']) ? sanitize_text_field($_POST['hero_same_heading']) : '';
            $hero_subheading = isset($_POST['hero_same_subheading']) ? sanitize_textarea_field($_POST['hero_same_subheading']) : '';
            //$hero_button_link = isset($_POST['hero_button_link']) ? esc_url_raw($_POST['hero_button_link']) : '';
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
            error_log('Retrieved Hero Same Slider Data: ' . print_r($hero_same_slider_data, true));

        }

        // Save Hero Separate Slider fields

        if (isset($_POST['slider_type']) && $_POST['slider_type'] === 'hero_separate') {
            // Ensure all repeater fields are arrays
            $hero_images        = isset($_POST['hero_image']) ? (array) $_POST['hero_image'] : [];
            $hero_headings      = isset($_POST['hero_heading']) ? (array) $_POST['hero_heading'] : [];
            $hero_subheadings   = isset($_POST['hero_subheading']) ? (array) $_POST['hero_subheading'] : [];
            $hero_button_links  = isset($_POST['hero_button_link']) ? (array) $_POST['hero_button_link'] : [];
            $hero_button_texts  = isset($_POST['hero_button_text']) ? (array) $_POST['hero_button_text'] : [];

            $hero_separate_data = [];
            $count = count($hero_images);

            // Loop through each field group and build an array
            for ($i = 0; $i < $count; $i++) {
                $hero_separate_data[] = [
                    'image' => sanitize_text_field($hero_images[$i] ?? ''),
                    'heading' => sanitize_text_field($hero_headings[$i] ?? ''),
                    'subheading' => sanitize_textarea_field($hero_subheadings[$i] ?? ''),
                    'button_link' => isset($hero_button_links[$i]) && !is_array($hero_button_links[$i])
                        ? esc_url_raw($hero_button_links[$i])
                        : '', // Fallback to empty if invalid
                    'button_text' => sanitize_text_field($hero_button_texts[$i] ?? ''),
                ];
            }

            // Save all fields as a single array
            update_post_meta($post_id, '_hero_separate_slider_data', $hero_separate_data);
        }

        // Save Post Slider fields

        if (isset($_POST['post_image'])) {
            $post_images = $_POST['post_image'];
            $post_headings = $_POST['post_heading'];
            $post_subheadings = $_POST['post_subheading'];
            $post_urls = $_POST['post_url'];

            $post_slider_data = [];
            for ($i = 0; $i < count($post_images); $i++) {
                // Avoid saving empty values
                if (!empty($post_images[$i]) || !empty($post_headings[$i]) || !empty($post_subheadings[$i]) || !empty($post_urls[$i])) {
                    $post_slider_data[] = [
                        'image' => sanitize_text_field($post_images[$i]),
                        'heading' => sanitize_text_field($post_headings[$i]),
                        'subheading' => sanitize_textarea_field($post_subheadings[$i]),
                        'url' => esc_url_raw($post_urls[$i]),
                    ];
                }
            }
            update_post_meta($post_id, '_post_slider_data', $post_slider_data);
        }

        // Save Image Slider fields (if 'image' slider type is selected)
        if ('image' === $_POST['slider_type']) {
            if (isset($_POST['slider_bin_image_slider'])) {
                update_post_meta($post_id, '_slider_bin_image_slider', sanitize_text_field($_POST['slider_bin_image_slider']));
            }
        }

        // Save Video Slider fields (if 'video' slider type is selected)
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

  add_action('save_post', 'slider_bin_save_meta_box_data');
