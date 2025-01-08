<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    // Get hero separate slider specific settings
        $hero_separate_options = get_option('slider_bin_hero_separate_settings');

        // Slider style related options with fallbacks
        $slider_width = isset($hero_separate_options['hero_separate_slider_width']) ? esc_attr($hero_separate_options['hero_separate_slider_width']) : '100%';
        $slider_height = isset($hero_separate_options['hero_separate_slider_height']) ? esc_attr($hero_separate_options['hero_separate_slider_height']) : '400px';

        /**
         * Background settings
         */
        $bg_image_position = isset($hero_separate_options['hero_separate_bg_image_position']) ? esc_attr($hero_separate_options['hero_separate_bg_image_position']) : 'center center';
        $bg_image_size = isset($hero_separate_options['hero_separate_bg_image_size']) ? esc_attr($hero_separate_options['hero_separate_bg_image_size']) : 'cover';
        $bg_overlay = isset($hero_separate_options['hero_separate_bg_overlay']) ? esc_attr($hero_separate_options['hero_separate_bg_overlay']) : 'true';
        $bg_overlay_color = isset($hero_separate_options['hero_separate_bg_overlay_color']) ? esc_attr($hero_separate_options['hero_separate_bg_overlay_color']) : '#000000';
        $bg_overlay_opacity = isset($hero_separate_options['hero_separate_bg_overlay_opacity']) ? esc_attr($hero_separate_options['hero_separate_bg_overlay_opacity']) : '0.5';

        /**
         * Content settings
         */
        $content_position_top = isset($hero_separate_options['hero_separate_content_position_top']) ? esc_attr($hero_separate_options['hero_separate_content_position_top']) : '10%';
        $content_position_left = isset($hero_separate_options['hero_separate_content_position_left']) ? esc_attr($hero_separate_options['hero_separate_content_position_left']) : '10%';
        $content_position_right = isset($hero_separate_options['hero_separate_content_position_right']) ? esc_attr($hero_separate_options['hero_separate_content_position_right']) : '10%';
        $content_position_bottom = isset($hero_separate_options['hero_separate_content_position_bottom']) ? esc_attr($hero_separate_options['hero_separate_content_position_bottom']) : '10%';
        $content_alignment = isset($hero_separate_options['hero_separate_content_alignment']) ? esc_attr($hero_separate_options['hero_separate_content_alignment']) : 'center';
        $content_padding = isset($hero_separate_options['hero_separate_content_padding']) ? esc_attr($hero_separate_options['hero_separate_content_padding']) : '20px';
        $content_margin = isset($hero_separate_options['hero_separate_content_margin']) ? esc_attr($hero_separate_options['hero_separate_content_margin']) : '20px';

        /**
         * Heading settings
         */
        $heading_font_family = isset($hero_separate_options['hero_separate_heading_font_family']) ? esc_attr($hero_separate_options['hero_separate_heading_font_family']) : 'Arial, sans-serif';
        $heading_font_size = isset($hero_separate_options['hero_separate_heading_font_size']) ? esc_attr($hero_separate_options['hero_separate_heading_font_size']) : '32px';
        $heading_font_weight = isset($hero_separate_options['hero_separate_heading_font_weight']) ? esc_attr($hero_separate_options['hero_separate_heading_font_weight']) : '700';
        $heading_line_height = isset($hero_separate_options['hero_separate_heading_line_height']) ? esc_attr($hero_separate_options['hero_separate_heading_line_height']) : '1.2';
        $heading_color = isset($hero_separate_options['hero_separate_heading_color']) ? esc_attr($hero_separate_options['hero_separate_heading_color']) : '#ffffff';
        $heading_margin = isset($hero_separate_options['hero_separate_heading_margin']) ? esc_attr($hero_separate_options['hero_separate_heading_margin']) : '0 0 20px 0';
        $heading_padding = isset($hero_separate_options['hero_separate_heading_padding']) ? esc_attr($hero_separate_options['hero_separate_heading_padding']) : '0';

        /**
         * Subheading settings
         */
        $subheading_font_size = isset($hero_separate_options['hero_separate_subheading_font_size']) ? esc_attr($hero_separate_options['hero_separate_subheading_font_size']) : '18px';
        $subheading_font_weight = isset($hero_separate_options['hero_separate_subheading_font_weight']) ? esc_attr($hero_separate_options['hero_separate_subheading_font_weight']) : '400';
        $subheading_line_height = isset($hero_separate_options['hero_separate_subheading_line_height']) ? esc_attr($hero_separate_options['hero_separate_subheading_line_height']) : '1.5';
        $subheading_color = isset($hero_separate_options['hero_separate_subheading_color']) ? esc_attr($hero_separate_options['hero_separate_subheading_color']) : '#ffffff';
        $subheading_margin = isset($hero_separate_options['hero_separate_subheading_margin']) ? esc_attr($hero_separate_options['hero_separate_subheading_margin']) : '0 0 30px 0';
        $subheading_padding = isset($hero_separate_options['hero_separate_subheading_padding']) ? esc_attr($hero_separate_options['hero_separate_subheading_padding']) : '0';

    /**
         * Arrow settings
         */
        $hero_separate_arrow_left = isset($hero_separate_options['hero_separate_arrow_left']) ? esc_attr($hero_separate_options['hero_separate_arrow_left']) : 'Icon-1';
        $hero_separate_arrow_right = isset($hero_separate_options['hero_separate_arrow_right']) ? esc_attr($hero_separate_options['hero_separate_arrow_right']) : 'Icon-1';
        $hero_separate_left_arrow_position_left = isset($hero_separate_options['hero_separate_left_arrow_position_left']) ? esc_attr($hero_separate_options['hero_separate_left_arrow_position_left']) : '10%';
        $hero_separate_left_arrow_position_top = isset($hero_separate_options['hero_separate_left_arrow_position_top']) ? esc_attr($hero_separate_options['hero_separate_left_arrow_position_top']) : '10%';
        $hero_separate_left_arrow_position_right = isset($hero_separate_options['hero_separate_left_arrow_position_right']) ? esc_attr($hero_separate_options['hero_separate_left_arrow_position_right']) : '10%';
        $hero_separate_left_arrow_position_bottom = isset($hero_separate_options['hero_separate_left_arrow_position_bottom']) ? esc_attr($hero_separate_options['hero_separate_left_arrow_position_bottom']) : '10%';
        $hero_separate_left_arrow_color = isset($hero_separate_options['hero_separate_left_arrow_color']) ? esc_attr($hero_separate_options['hero_separate_left_arrow_color']) : '#ffffff';
        $hero_separate_left_arrow_opacity = isset($hero_separate_options['hero_separate_left_arrow_opacity']) ? esc_attr($hero_separate_options['hero_separate_left_arrow_opacity']) : '0.8';
        $hero_separate_left_arrow_height = isset($hero_separate_options['hero_separate_left_arrow_height']) ? esc_attr($hero_separate_options['hero_separate_left_arrow_height']) : '40px';
        $hero_separate_left_arrow_width = isset($hero_separate_options['hero_separate_left_arrow_width']) ? esc_attr($hero_separate_options['hero_separate_left_arrow_width']) : '40px';
        $hero_separate_right_arrow_position_left = isset($hero_separate_options['hero_separate_right_arrow_position_left']) ? esc_attr($hero_separate_options['hero_separate_right_arrow_position_left']) : '10%';
        $hero_separate_right_arrow_position_top = isset($hero_separate_options['hero_separate_right_arrow_position_top']) ? esc_attr($hero_separate_options['hero_separate_right_arrow_position_top']) : '10%';
        $hero_separate_right_arrow_position_right = isset($hero_separate_options['hero_separate_right_arrow_position_right']) ? esc_attr($hero_separate_options['hero_separate_right_arrow_position_right']) : '10%';
        $hero_separate_right_arrow_position_bottom = isset($hero_separate_options['hero_separate_right_arrow_position_bottom']) ? esc_attr($hero_separate_options['hero_separate_right_arrow_position_bottom']) : '10%';
        $hero_separate_right_arrow_color = isset($hero_separate_options['hero_separate_right_arrow_color']) ? esc_attr($hero_separate_options['hero_separate_right_arrow_color']) : '#ffffff';
        $hero_separate_right_arrow_opacity = isset($hero_separate_options['hero_separate_right_arrow_opacity']) ? esc_attr($hero_separate_options['hero_separate_right_arrow_opacity']) : '0.8';
        $hero_separate_right_arrow_height = isset($hero_separate_options['hero_separate_right_arrow_height']) ? esc_attr($hero_separate_options['hero_separate_right_arrow_height']) : '40px';
        $hero_separate_right_arrow_width = isset($hero_separate_options['hero_separate_right_arrow_width']) ? esc_attr($hero_separate_options['hero_separate_right_arrow_width']) : '40px';

        /**
         * Button settings
         */
        $button_width = isset($hero_separate_options['hero_separate_button_width']) ? esc_attr($hero_separate_options['hero_separate_button_width']) : '200px';
        $button_padding = isset($hero_separate_options['hero_separate_button_padding']) ? esc_attr($hero_separate_options['hero_separate_button_padding']) : '10px 20px';
        $button_font_size = isset($hero_separate_options['hero_separate_button_font_size']) ? esc_attr($hero_separate_options['hero_separate_button_font_size']) : '14px';
        $button_color = isset($hero_separate_options['hero_separate_button_color']) ? esc_attr($hero_separate_options['hero_separate_button_color']) : '#ffffff';
        $button_bg_color = isset($hero_separate_options['hero_separate_button_bg_color']) ? esc_attr($hero_separate_options['hero_separate_button_bg_color']) : '#ff5733';
        $button_border_color = isset($hero_separate_options['hero_separate_button_border_color']) ? esc_attr($hero_separate_options['hero_separate_button_border_color']) : '#ff5733';
        $button_border_width = isset($hero_separate_options['hero_separate_button_border_width']) ? esc_attr($hero_separate_options['hero_separate_button_border_width']) : '1px';
        $button_border_style = isset($hero_separate_options['hero_separate_button_border_style']) ? esc_attr($hero_separate_options['hero_separate_button_border_style']) : 'solid';
        $button_border_radius = isset($hero_separate_options['hero_separate_button_border_radius']) ? esc_attr($hero_separate_options['hero_separate_button_border_radius']) : '5px';
        $button_box_shadow = isset($hero_separate_options['hero_separate_button_box_shadow']) ? esc_attr($hero_separate_options['hero_separate_button_box_shadow']) : '0px 4px 6px #888888';
        $button_text_align = isset($hero_separate_options['hero_separate_button_text_align']) ? esc_attr($hero_separate_options['hero_separate_button_text_align']) : 'center';
        $button_text_decoration = isset($hero_separate_options['hero_separate_button_text_decoration']) ? esc_attr($hero_separate_options['hero_separate_button_text_decoration']) : 'none';
        $button_font_family = isset($hero_separate_options['hero_separate_button_font_family']) ? esc_attr($hero_separate_options['hero_separate_button_font_family']) : 'Arial, sans-serif';
        $button_font_weight = isset($hero_separate_options['hero_separate_button_font_weight']) ? esc_attr($hero_separate_options['hero_separate_button_font_weight']) : '400';
        $button_target = isset($hero_separate_options['hero_separate_button_target']) ? esc_attr($hero_separate_options['hero_separate_button_target']) : '_self';
?>
<style>
    #slider::before {
        background-color: <?php echo $bg_overlay_color; ?> !important;
        opacity: <?php echo $bg_overlay_opacity; ?> !important;
    }
    #arrow-left{
        width: <?php echo $hero_separate_left_arrow_width; ?>;
        height: <?php echo $hero_separate_left_arrow_height; ?>;
    }
    #arrow-right{
        width: <?php echo $hero_separate_right_arrow_width; ?>;
        height: <?php echo $hero_separate_right_arrow_height; ?>;
    }

    #arrow-left svg {
        width: <?php echo $hero_separate_left_arrow_width; ?>;
        height: <?php echo $hero_separate_left_arrow_height; ?>;
        color: <?php echo $hero_separate_left_arrow_color; ?>;
        fill: <?php echo $hero_separate_left_arrow_color; ?>;
        path: <?php echo $hero_separate_left_arrow_color; ?>;
        stroke: <?php echo $hero_separate_left_arrow_color; ?>;
        opacity: <?php echo $hero_separate_left_arrow_opacity; ?>;
    }

    #arrow-right svg {
        width: <?php echo $hero_separate_right_arrow_width; ?>;
        height: <?php echo $hero_separate_right_arrow_height; ?>;
        color: <?php echo $hero_separate_right_arrow_color; ?>;
        fill: <?php echo $hero_separate_right_arrow_color; ?>;
        path: <?php echo $hero_separate_right_arrow_color; ?>;
        stroke: <?php echo $hero_separate_right_arrow_color; ?>;
        opacity: <?php echo $hero_separate_right_arrow_opacity; ?>;
    }
</style>
<div class="slider-wrapper hero-separate-wrapper"style="width: <?php echo $slider_width; ?>;" >
    <div id="arrow-left" class="arrow" style="left:<?php echo $hero_separate_left_arrow_position_left; ?>; top:<?php echo $hero_separate_left_arrow_position_top; ?>; right:<?php echo $hero_separate_left_arrow_position_right; ?>; bottom:<?php echo $hero_separate_left_arrow_position_bottom; ?>;">
        <?php
            $svg_path = $hero_separate_arrow_left;
            if (filter_var($svg_path, FILTER_VALIDATE_URL)) {
                // Add arguments to ignore SSL verification for local development
                $args = array(
                    'sslverify' => false, // Ignore SSL verification
                    'timeout'   => 30
                );

                $response = wp_remote_get($svg_path, $args);
                if (!is_wp_error($response)) {
                    $svg_content = wp_remote_retrieve_body($response);
                    echo $svg_content;
                }
            }
        ?>
    </div>
    <div id="slider">
        <?php
        foreach ($hero_separate_slider_data as $slide) {
            // Extract slide data with fallbacks
            $image = isset($slide['image']) ? esc_url($slide['image']) : '';
            $heading = isset($slide['heading']) ? esc_html($slide['heading']) : '';
            $subheading = isset($slide['subheading']) ? esc_html($slide['subheading']) : '';
            $button_link = isset($slide['button_link']) ? esc_url($slide['button_link']) : '';
            $button_text = isset($slide['button_text']) ? esc_html($slide['button_text']) : '';
            $image_url = isset($slide['image_url']) ? esc_url($slide['image_url']) : '';
        ?>

        <div class="slide" style="background-image: url('<?php if ($image) { echo esc_url($image);} elseif ($image_url) { echo esc_url($image_url);} ?>'); height: <?php echo $slider_height; ?>; background-size: <?php echo $bg_image_size; ?>; background-position: <?php echo $bg_image_position; ?>;">
            <div class="slide-content" style=" padding: <?php echo $content_padding; ?>; margin: <?php echo $content_margin; ?>; text-align: <?php echo $content_alignment; ?>; top: <?php echo $content_position_top; ?>; left: <?php echo $content_position_left; ?>; right: <?php echo $content_position_right; ?>; bottom: <?php echo $content_position_bottom; ?>;">
                <?php if ($heading) { ?>
                    <h1 style=" font-family: <?php echo $heading_font_family; ?>; font-size: <?php echo $heading_font_size; ?>; color: <?php echo $heading_color; ?>; text-align: <?php echo $heading_text_align; ?>; margin: <?php echo $heading_margin; ?>; padding: <?php echo $heading_padding; ?>;">
                        <?php echo $heading; ?>
                    </h1>
                <?php } ?>
                <?php if ($subheading) { ?>
                    <p style=" font-family: <?php echo $subheading_font_family; ?>; font-size: <?php echo $subheading_font_size; ?>; color: <?php echo $subheading_color; ?>; text-align: <?php echo $subheading_text_align; ?>; margin: <?php echo $subheading_margin; ?>; padding: <?php echo $subheading_padding; ?>;">
                        <?php echo $subheading; ?>
                    </p>
                <?php } ?>
                <?php if ($button_text && $button_link) { ?>
                    <a
                        class="hero-button"
                        target="<?php echo $button_target; ?>"
                        href="<?php echo $button_link; ?>"
                        style=" background-color: <?php echo $button_bg_color; ?>; border-width: <?php echo $button_border_width; ?>; border-style: <?php echo $button_border_style; ?>; border-color: <?php echo $button_border_color; ?>; border-radius: <?php echo $button_border_radius; ?>; color: <?php echo $button_color; ?>; padding: <?php echo $button_padding; ?>; text-align: <?php echo $button_text_align; ?>; text-decoration:  <?php echo $button_text_decoration; ?>; font-size: <?php echo $button_font_size; ?>; width: <?php echo $button_width; ?>; box-shadow: <?php echo $button_box_shadow; ?>; font-family: <?php echo $button_font_family; ?>; font-weight: <?php echo $button_font_weight; ?>; ">
                        <?php echo $button_text; ?>
                    </a>
                <?php } ?>
            </div>
        </div>

        <?php } ?>
    </div>
    <div id="arrow-right" class="arrow" style="left:<?php echo $hero_separate_right_arrow_position_left; ?>; top:<?php echo $hero_separate_right_arrow_position_top; ?>; right:<?php echo $hero_separate_right_arrow_position_right; ?>; bottom:<?php echo $hero_separate_right_arrow_position_bottom; ?>;">
        <?php
            $svg_path = $hero_separate_arrow_right;
            if (filter_var($svg_path, FILTER_VALIDATE_URL)) {
                // Add arguments to ignore SSL verification for local development
                $args = array(
                    'sslverify' => false, // Ignore SSL verification
                    'timeout'   => 30
                );

                $response = wp_remote_get($svg_path, $args);
                if (!is_wp_error($response)) {
                    $svg_content = wp_remote_retrieve_body($response);
                    echo $svg_content;
                }
            }
        ?>
    </div>
</div>