<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    $options = get_option('slider_bin_image_slider_settings');

    $slider_width = isset($options['image_slider_width']) ? esc_attr($options['image_slider_width']) : '100%';
    $slider_height = isset($options['image_slider_height']) ? esc_attr($options['image_slider_height']) : '700px';
    // Caption settings
    $caption_top = isset($options['image_slider_caption_position_top']) ? esc_attr($options['image_slider_caption_position_top']) : '50%';
    $caption_left = isset($options['image_slider_caption_position_left']) ? esc_attr($options['image_slider_caption_position_left']) : '50%';
    $caption_right = isset($options['image_slider_caption_position_right']) ? esc_attr($options['image_slider_caption_position_right']) : '50%';
    $caption_bottom = isset($options['image_slider_caption_position_bottom']) ? esc_attr($options['image_slider_caption_position_bottom']) : 'auto';
    $caption_align = isset($options['image_slider_caption_alignment']) ? esc_attr($options['image_slider_caption_alignment']) : 'center';
    $caption_padding = isset($options['image_slider_caption_padding']) ? esc_attr($options['image_slider_caption_padding']) : '0 20px';
    $caption_margin = isset($options['image_slider_caption_margin']) ? esc_attr($options['image_slider_caption_margin']) : '0 auto';
    $caption_font_size = isset($options['image_slider_caption_font_size']) ? esc_attr($options['image_slider_caption_font_size']) : '32px';
    $caption_font_weight = isset($options['image_slider_caption_font_weight']) ? esc_attr($options['image_slider_caption_font_weight']) : '400';
    $caption_line_height = isset($options['image_slider_caption_line_height']) ? esc_attr($options['image_slider_caption_line_height']) : '1.5';
    $caption_color = isset($options['image_slider_caption_color']) ? esc_attr($options['image_slider_caption_color']) : '#FFFF00';

    // Arrow settings
    $left_arrow_left = isset($options['image_slider_left_arrow_position_left']) ? esc_attr($options['image_slider_left_arrow_position_left']) : '0';
    $left_arrow_top = isset($options['image_slider_left_arrow_position_top']) ? esc_attr($options['image_slider_left_arrow_position_top']) : '50%';
    $left_arrow_bottom = isset($options['image_slider_left_arrow_position_bottom']) ? esc_attr($options['image_slider_left_arrow_position_bottom']) : 'auto';
    $left_arrow_right = isset($options['image_slider_left_arrow_position_right']) ? esc_attr($options['image_slider_left_arrow_position_right']) : 'auto';
    $left_arrow_color = isset($options['image_slider_left_arrow_color']) ? esc_attr($options['image_slider_left_arrow_color']) : '#ffffff';
    $left_arrow_opacity = isset($options['image_slider_left_arrow_opacity']) ? esc_attr($options['image_slider_left_arrow_opacity']) : '1';
    $left_arrow_height = isset($options['image_slider_left_arrow_height']) ? esc_attr($options['image_slider_left_arrow_height']) : '40px';
    $left_arrow_width = isset($options['image_slider_left_arrow_width']) ? esc_attr($options['image_slider_left_arrow_width']) : '40px';

    $right_arrow_right = isset($options['image_slider_right_arrow_position_right']) ? esc_attr($options['image_slider_right_arrow_position_right']) : '0';
    $right_arrow_top = isset($options['image_slider_right_arrow_position_top']) ? esc_attr($options['image_slider_right_arrow_position_top']) : '50%';
    $right_arrow_bottom = isset($options['image_slider_right_arrow_position_bottom']) ? esc_attr($options['image_slider_right_arrow_position_bottom']) : 'auto';
    $right_arrow_left = isset($options['image_slider_right_arrow_position_left']) ? esc_attr($options['image_slider_right_arrow_position_left']) : 'auto';
    $right_arrow_color = isset($options['image_slider_right_arrow_color']) ? esc_attr($options['image_slider_right_arrow_color']) : '#ffffff';
    $right_arrow_opacity = isset($options['image_slider_right_arrow_opacity']) ? esc_attr($options['image_slider_right_arrow_opacity']) : '1';
    $right_arrow_height = isset($options['image_slider_right_arrow_height']) ? esc_attr($options['image_slider_right_arrow_height']) : '40px';
    $right_arrow_width = isset($options['image_slider_right_arrow_width']) ? esc_attr($options['image_slider_right_arrow_width']) : '40px';

    $image_slider_left_media_file = isset($options['image_slider_left_media_file']) ? esc_attr($options['image_slider_left_media_file']) : '/wp-content/plugins/slider-bin/assets/icon/Arrow-Left.svg';
    $image_slider_right_media_file = isset($options['image_slider_right_media_file']) ? esc_attr($options['image_slider_right_media_file']) : '/wp-content/plugins/slider-bin/assets/icon/Arrow-Right.svg';

?>


<div id="<?php echo esc_attr($unique_id); ?>" class="slider-wrapper image-slider" style="width: <?php echo $slider_width; ?>;">
    <div id="arrow-left" class="arrow-left" style="
        width: <?php echo empty($left_arrow_width) ? '40px' : $left_arrow_width; ?>;
        height: <?php echo empty($left_arrow_height) ? '40px' : $left_arrow_height; ?>;
        left: <?php echo empty($left_arrow_left) ? '0' : $left_arrow_left; ?>;
        top: <?php echo empty($left_arrow_top) ? '80%' : $left_arrow_top; ?>;
        right: <?php echo empty($left_arrow_right) ? 'auto' : $left_arrow_right; ?>;
        bottom: <?php echo empty($left_arrow_bottom) ? 'auto' : $left_arrow_bottom; ?>;
        opacity: <?php echo empty($left_arrow_opacity) ? '1' : $left_arrow_opacity; ?>;">
        <img src="<?php echo empty($image_slider_left_media_file) ? '' : $image_slider_left_media_file; ?>" alt="">
    </div>
    <div id="slider">
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
                    <p class="slide-caption" style="height:fit-content; color: <?php echo $caption_color; ?>; font-size: <?php echo $caption_font_size; ?>; font-weight: <?php echo $caption_font_weight; ?>; line-height: <?php echo $caption_line_height; ?>; padding: <?php echo $caption_padding; ?>; margin: <?php echo $caption_margin; ?>; text-align: <?php echo $caption_align; ?>; top: <?php echo $caption_top; ?>; left: <?php echo $caption_left; ?>; right: <?php echo $caption_right; ?>; bottom: <?php echo $caption_bottom; ?>;">
                        <?php echo $caption; ?>
                    </p>
                <?php endif; ?>
            </div>
        <?php }
        else { ?>
            <p>No slider data available.</p>
        <?php }} ?>
    </div>
    <div id="arrow-right" class="arrow-right" style="
        width: <?php echo empty($right_arrow_width) ? '40px' : $right_arrow_width; ?>;
        height: <?php echo empty($right_arrow_height) ? '40px' : $right_arrow_height; ?>;
        left: <?php echo empty($right_arrow_left) ? 'auto' : $right_arrow_left; ?>;
        top: <?php echo empty($right_arrow_top) ? '80%' : $right_arrow_top; ?>;
        right: <?php echo empty($right_arrow_right) ? '0' : $right_arrow_right; ?>;
        bottom: <?php echo empty($right_arrow_bottom) ? 'auto' : $right_arrow_bottom; ?>;
        opacity: <?php echo empty($right_arrow_opacity) ? '1' : $right_arrow_opacity; ?>;">
        <img src="<?php echo empty($image_slider_right_media_file) ? '' : $image_slider_right_media_file; ?>" alt="">
    </div>
</div>