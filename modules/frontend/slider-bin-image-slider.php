<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    $options = get_option('slider_bin_image_slider_settings');

    $slider_width = isset($options['image_slider_width']) ? esc_attr($options['image_slider_width']) : '100%';
    $slider_height = isset($options['image_slider_height']) ? esc_attr($options['image_slider_height']) : '100%';
    // Caption settings
    $caption_top = isset($options['image_slider_caption_position_top']) ? esc_attr($options['image_slider_caption_position_top']) : '10px';
    $caption_left = isset($options['image_slider_caption_position_left']) ? esc_attr($options['image_slider_caption_position_left']) : '10px';
    $caption_right = isset($options['image_slider_caption_position_right']) ? esc_attr($options['image_slider_caption_position_right']) : '10px';
    $caption_bottom = isset($options['image_slider_caption_position_bottom']) ? esc_attr($options['image_slider_caption_position_bottom']) : '10px';
    $caption_align = isset($options['image_slider_caption_alignment']) ? esc_attr($options['image_slider_caption_alignment']) : 'left';
    $caption_padding = isset($options['image_slider_caption_padding']) ? esc_attr($options['image_slider_caption_padding']) : '10px';
    $caption_margin = isset($options['image_slider_caption_margin']) ? esc_attr($options['image_slider_caption_margin']) : '10px';
    $caption_font_size = isset($options['image_slider_caption_font_size']) ? esc_attr($options['image_slider_caption_font_size']) : '16px';
    $caption_font_weight = isset($options['image_slider_caption_font_weight']) ? esc_attr($options['image_slider_caption_font_weight']) : '400';
    $caption_line_height = isset($options['image_slider_caption_line_height']) ? esc_attr($options['image_slider_caption_line_height']) : '1.5';
    $caption_color = isset($options['image_slider_caption_color']) ? esc_attr($options['image_slider_caption_color']) : '#ffffff';

    // Arrow settings
    $left_arrow_left = isset($options['image_slider_left_arrow_position_left']) ? esc_attr($options['image_slider_left_arrow_position_left']) : '10px';
    $left_arrow_top = isset($options['image_slider_left_arrow_position_top']) ? esc_attr($options['image_slider_left_arrow_position_top']) : '50%';
    $left_arrow_bottom = isset($options['image_slider_left_arrow_position_bottom']) ? esc_attr($options['image_slider_left_arrow_position_bottom']) : '50%';
    $left_arrow_right = isset($options['image_slider_left_arrow_position_right']) ? esc_attr($options['image_slider_left_arrow_position_right']) : '10px';
    $left_arrow_color = isset($options['image_slider_left_arrow_color']) ? esc_attr($options['image_slider_left_arrow_color']) : '#ffffff';
    $left_arrow_opacity = isset($options['image_slider_left_arrow_opacity']) ? esc_attr($options['image_slider_left_arrow_opacity']) : '0.8';
    $left_arrow_height = isset($options['image_slider_left_arrow_height']) ? esc_attr($options['image_slider_left_arrow_height']) : '40px';
    $left_arrow_width = isset($options['image_slider_left_arrow_width']) ? esc_attr($options['image_slider_left_arrow_width']) : '40px';

    $right_arrow_right = isset($options['image_slider_right_arrow_position_right']) ? esc_attr($options['image_slider_right_arrow_position_right']) : '10px';
    $right_arrow_top = isset($options['image_slider_right_arrow_position_top']) ? esc_attr($options['image_slider_right_arrow_position_top']) : '50%';
    $right_arrow_bottom = isset($options['image_slider_right_arrow_position_bottom']) ? esc_attr($options['image_slider_right_arrow_position_bottom']) : '50%';
    $right_arrow_left = isset($options['image_slider_right_arrow_position_left']) ? esc_attr($options['image_slider_right_arrow_position_left']) : '10px';
    $right_arrow_color = isset($options['image_slider_right_arrow_color']) ? esc_attr($options['image_slider_right_arrow_color']) : '#ffffff';
    $right_arrow_opacity = isset($options['image_slider_right_arrow_opacity']) ? esc_attr($options['image_slider_right_arrow_opacity']) : '0.8';
    $right_arrow_height = isset($options['image_slider_right_arrow_height']) ? esc_attr($options['image_slider_right_arrow_height']) : '40px';
    $right_arrow_width = isset($options['image_slider_right_arrow_width']) ? esc_attr($options['image_slider_right_arrow_width']) : '40px';

    $image_slider_arrow_left = isset($options['image_slider_arrow_left']) ? esc_attr($options['image_slider_arrow_left']) : '';
    $image_slider_arrow_right = isset($options['image_slider_arrow_right']) ? esc_attr($options['image_slider_arrow_right']) : '';

?>
<style>
    #arrow-left svg {
        width: <?php echo $left_arrow_width; ?>;
        height: <?php echo $left_arrow_height; ?>;
        fill: <?php echo $left_arrow_color; ?>;
        path: <?php echo $left_arrow_color; ?>;
        stroke: <?php echo $left_arrow_color; ?>;
        opacity: <?php echo $left_arrow_opacity; ?>;
    }

    #arrow-right svg {
        width: <?php echo $right_arrow_width; ?>;
        height: <?php echo $right_arrow_height; ?>;
        fill: <?php echo $right_arrow_color; ?>;
        path: <?php echo $right_arrow_color; ?>;
        stroke: <?php echo $right_arrow_color; ?>;
        opacity: <?php echo $right_arrow_opacity; ?>;
    }
</style>

<div class="slider-wrapper image-slider" style="width: <?php echo $slider_width; ?>;">
    <div id="arrow-left" class="arrow" style="left: <?php echo $left_arrow_left; ?>; top: <?php echo $left_arrow_top; ?>; right: <?php echo $right_arrow_right; ?>; bottom: <?php echo $right_arrow_bottom; ?>; opacity: <?php echo $left_arrow_opacity; ?>; ">
        <?php
            $svg_path = $image_slider_arrow_left;
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
    <div id="slider" style="background-color: <?php echo $slider_bg_color; ?>;">
        <?php
            foreach ($image_slider_data as $index => $image_url) {
            // Trim and sanitize the image URL
            $image_url = esc_url(trim($image_url));

            if ($image_url) {
                // Get caption for this image
                $caption = isset($image_captions[$image_url]) ? esc_html($image_captions[$image_url]) : '';
            ?>
            <div class="slide"style="height: <?php echo $slider_height; ?>;">
                <img class="slide-image" src="<?php echo $image_url; ?>" alt="<?php echo esc_attr('Slider Image ' . ($index + 1)); ?>" style="height: <?php echo $slider_height; ?>; width: <?php echo $slider_width; ?>;">

                <?php if (!empty($caption)) : ?>
                    <p class="slide-caption" style="color: <?php echo $caption_color; ?>; font-size: <?php echo $caption_font_size; ?>; font-weight: <?php echo $caption_font_weight; ?>; line-height: <?php echo $caption_line_height; ?>; padding: <?php echo $caption_padding; ?>; margin: <?php echo $caption_margin; ?>; text-align: <?php echo $caption_align; ?>; top: <?php echo $caption_top; ?>; left: <?php echo $caption_left; ?>; right: <?php echo $caption_right; ?>; bottom: <?php echo $caption_bottom; ?>;">
                        <?php echo $caption; ?>
                    </p>
                <?php endif; ?>
            </div>
        <?php }
        else { ?>
            <p>No slider data available.</p>
        <?php }} ?>
    </div>
    <div id="arrow-right" class="arrow" style="right: <?php echo $right_arrow_right; ?>; top: <?php echo $right_arrow_top; ?>; left: <?php echo $right_arrow_left; ?>; bottom: <?php echo $right_arrow_bottom; ?>; opacity: <?php echo $right_arrow_opacity; ?>; ">
    <?php
            $svg_path = $image_slider_arrow_right;
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
</div>