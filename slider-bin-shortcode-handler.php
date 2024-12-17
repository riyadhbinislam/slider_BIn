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
     * Render Hero Slider
     * Render Hero Same Slider
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
        ?>
        <div class="slider-wrapper hero-same-wrapper">
            <div id="arrow-left" class="arrow"></div>
            <div id="slider">
                <?php if (!empty($hero_same_slider_data['images'])):
                    foreach ($hero_same_slider_data['images'] as $image_url): ?>
                        <div class="slide">
                            <img src="<?php echo esc_url($image_url); ?>" alt="Hero Image">
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="slider-content">
                    <?php if (!empty($hero_same_slider_data['heading'])): ?>
                        <h1><?php echo esc_html($hero_same_slider_data['heading']); ?></h1>
                    <?php endif; ?>

                    <?php if (!empty($hero_same_slider_data['subheading'])): ?>
                        <p><?php echo esc_html($hero_same_slider_data['subheading']); ?></p>
                    <?php endif; ?>

                    <?php if (!empty($hero_same_slider_data['button_text']) && !empty($hero_same_slider_data['button_link'])): ?>
                        <a href="<?php echo esc_url($hero_same_slider_data['button_link']); ?>" class="hero-button">
                            <?php echo esc_html($hero_same_slider_data['button_text']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div id="arrow-right" class="arrow"></div>
        </div>
        <?php
        return ob_get_clean();
    }
    /**
     * Render Hero Slider
     * Render Hero Separate Slider
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
        ?>

        <div class="slider-wrapper hero-separate-wrapper">
            <div id="arrow-left" class="arrow"></div>
            <div id="slider">
                <?php
                foreach ($hero_separate_slider_data as $slide) {
                // Extract slide data with fallbacks
                $image = isset($slide['image']) ? esc_url($slide['image']) : '';
                $heading = isset($slide['heading']) ? esc_html($slide['heading']) : '';
                $subheading = isset($slide['subheading']) ? esc_html($slide['subheading']) : '';
                $button_link = isset($slide['button_link']) ? esc_url($slide['button_link']) : '';
                $button_text = isset($slide['button_text']) ? esc_html($slide['button_text']) : '';
                ?>

                <div class="slide" style="background-image: url('<?php echo esc_url($image); ?>');">
                    <div class="slide-content">
                        <?php if ($heading) { ?>
                            <h1><?php echo $heading; ?></h1>
                        <?php } ?>
                        <?php if ($subheading) { ?>
                            <p><?php echo $subheading; ?></p>
                        <?php } ?>
                        <?php if ($button_text && $button_link) { ?>
                            <a href="<?php echo $button_link; ?>" class="hero-button"><?php echo $button_text; ?></a>
                        <?php } ?>
                    </div>
                </div>

                <?php } ?>
            </div>
            <div id="arrow-right" class="arrow"></div>
        </div>

        <?php
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
        ?>

        <div class="slider-wrapper">
            <div id="arrow-left" class="arrow"></div>
            <div id="slider">
                <?php
                    foreach ($image_slider_data as $index => $image_url) {
                    // Trim and sanitize the image URL
                    $image_url = esc_url(trim($image_url));

                    if ($image_url) { ?>

                    <div class="slide">
                        <img class="slide-image" src="<?php echo $image_url; ?>" alt="<?php echo esc_attr('Slider Image ' . ($index + 1)); ?>">
                    </div>
                <?php }
                else { ?>
                    <p>No slider data available.</p>
                <?php }} ?>
            </div>
            <div id="arrow-right" class="arrow"></div>
        </div>

    <?php
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
    ?>

    <div class="slider-wrapper">
        <div id="arrow-left" class="arrow"></div>
        <div id="slider">
            <?php if (!empty($post_slider_data)) {
                foreach ($post_slider_data as $index => $slide) {
                // Ensure each slide has valid data
                $image = isset($slide['image']) ? esc_url($slide['image']) : '';
                $heading = isset($slide['heading']) ? esc_html($slide['heading']) : '';
                $subheading = isset($slide['subheading']) ? esc_html($slide['subheading']) : '';
                $url = isset($slide['url']) ? esc_url($slide['url']) : '';
            ?>

            <div class="slide" style="background-image: url('<?php if ($image) { echo $image;} ?>');">
                <div class="slide-content">
                    <?php if ($heading) { ?>
                        <h2><?php echo $heading; ?></h2>
                    <?php } ?>
                    <?php if ($subheading) { ?>
                        <p><?php echo $subheading; ?></p>
                    <?php } ?>
                    <?php if ($url) { ?>
                        <a href="<?php echo $url; ?>" class="slider-link">Read More</a>
                    <?php } ?>
                </div>
            </div>
            <?php }
            } else { ?>
                <p>No slider data available.</p>
            <?php } ?>
        </div>
        <div id="arrow-right" class="arrow"></div>
    </div>

    <?php
    // Return the buffered output
    return ob_get_clean();
    }

    /**
     * Render Video Slider
     */

     function render_video_slider($post_id) {

            // Fetch stored video URLs from the '_video_urls' meta field
            $video_urls = get_post_meta($post_id, '_video_urls', true);

            // Fetch the media or related data from the '_slider_bin_videos' meta field (optional)
            $slider_bin_videos = get_post_meta($post_id, '_slider_bin_videos', true);

            // If no video URLs are found, return a default message
            if (empty($video_urls) || !is_array($video_urls)) {
                return __('No videos found for this slider.', 'slider_bin');
            }
       // Start output buffering
       ob_start();
     ?>

    <div class="slider-wrapper">
        <div id="arrow-left" class="arrow"></div>

        <div id="slider">
            <?php
                // Check if '_video_urls' is set and not empty, and render video URLs
                // Loop through each video URL and display it
                if (!empty($video_urls) && is_array($video_urls)) {
                    foreach ($video_urls as $video_url) {
                        $video_url = esc_url(trim($video_url)); // Sanitize and trim the URL
                        if ($video_url) {
                            // Check if URL is a YouTube video
                            if (strpos($video_url, 'youtube.com') !== false) {
                                // Extract YouTube video ID and create embed URL
                                preg_match('/(?:https?:\/\/(?:www\.)?youtube\.com\/(?:[^\/\n\s]+\/\S+|(?:v|e(?:mbed)?)\/([\w-]+)|(?:.*?[?&]v=([\w-]+))))/', $video_url, $matches);
                                $youtube_video_id = isset($matches[1]) ? $matches[1] : '';
                                if ($youtube_video_id) {
                                    $video_url = "https://www.youtube.com/embed/{$youtube_video_id}";
                                }
                            }

                            // Check if URL is a Vimeo video
                            if (strpos($video_url, 'vimeo.com') !== false) {
                                // Extract Vimeo video ID and create embed URL
                                preg_match('/(?:https?:\/\/(?:www\.)?vimeo\.com\/(?:.*\/)?(\d+))/', $video_url, $matches);
                                $vimeo_video_id = isset($matches[1]) ? $matches[1] : '';
                                if ($vimeo_video_id) {
                                    $video_url = "https://player.vimeo.com/video/{$vimeo_video_id}";
                                }
                            }
                            ?>

                            <div class="slide video-slide">
                                <iframe width="100%" height="100%" src="<?php echo $video_url; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>

                            <?php
                        }
                    }
                }
                elseif (!empty($slider_bin_videos)){
                    // If media URLs are stored as a comma-separated string, split them into an array
                    $slider_bin_videos = explode(',', $slider_bin_videos);
                    foreach ($slider_bin_videos as $media_url) {
                        $media_url = esc_url(trim($media_url)); // Sanitize and trim the URL // Check if the media URL is valid
                        if ($media_url) {
                            ?>
                            <div class="slide media-slide">
                               <iframe width="100%" height="auto" src="<?php echo $media_url; ?>"frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                            <?php
                        }
                    }
                }
                else{
                    echo '<p>No videos or media found for this slider.</p>';
                }
            ?>


        </div>

        <div id="arrow-right" class="arrow"></div>
    </div>

    <?php
    // Return the buffered output
    return ob_get_clean();
}

?>