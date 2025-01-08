<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    // Check if required data exists
    if (empty($hero_same_slider_data)) {
        slider_bin_debug_log('Hero same slider data is empty');
        return;
    }

    // Get hero same slider specific settings
$hero_same_options = get_option('slider_bin_hero_same_settings');

// Slider style related options with fallbacks
$slider_width = isset($hero_same_options['hero_same_slider_width']) ? esc_attr($hero_same_options['hero_same_slider_width']) : '100%';
$slider_height = isset($hero_same_options['hero_same_slider_height']) ? esc_attr($hero_same_options['hero_same_slider_height']) : '400px';

/**
 * Background settings
 */
$bg_image_position = isset($hero_same_options['hero_same_bg_image_position']) ? esc_attr($hero_same_options['hero_same_bg_image_position']) : 'center center';
$bg_image_size = isset($hero_same_options['hero_same_bg_image_size']) ? esc_attr($hero_same_options['hero_same_bg_image_size']) : 'cover';
$bg_overlay = isset($hero_same_options['hero_same_bg_overlay']) ? esc_attr($hero_same_options['hero_same_bg_overlay']) : 'true';
$bg_overlay_color = isset($hero_same_options['hero_same_bg_overlay_color']) ? esc_attr($hero_same_options['hero_same_bg_overlay_color']) : '#000000';
$bg_overlay_opacity = isset($hero_same_options['hero_same_bg_overlay_opacity']) ? esc_attr($hero_same_options['hero_same_bg_overlay_opacity']) : '0.5';

/**
 * Content settings
 */
$hero_same_content_position_top = isset($hero_same_options['hero_same_content_position_top']) ? esc_attr($hero_same_options['hero_same_content_position_top']) : '50%';
$hero_same_content_position_left = isset($hero_same_options['hero_same_content_position_left']) ? esc_attr($hero_same_options['hero_same_content_position_left']) : '50%';
$hero_same_content_position_right = isset($hero_same_options['hero_same_content_position_right']) ? esc_attr($hero_same_options['hero_same_content_position_right']) : '50%';
$hero_same_content_position_bottom = isset($hero_same_options['hero_same_content_position_bottom']) ? esc_attr($hero_same_options['hero_same_content_position_bottom']) : '50%';
$content_alignment = isset($hero_same_options['hero_same_content_alignment']) ? esc_attr($hero_same_options['hero_same_content_alignment']) : 'center';
$content_padding = isset($hero_same_options['hero_same_content_padding']) ? esc_attr($hero_same_options['hero_same_content_padding']) : '20px';
$content_margin = isset($hero_same_options['hero_same_content_margin']) ? esc_attr($hero_same_options['hero_same_content_margin']) : '20px';




/**
 * Heading settings
 */
$heading_font_family = isset($hero_same_options['hero_same_heading_font_family']) ? esc_attr($hero_same_options['hero_same_heading_font_family']) : 'Arial, sans-serif';
$heading_font_size = isset($hero_same_options['hero_same_heading_font_size']) ? esc_attr($hero_same_options['hero_same_heading_font_size']) : '32px';
$heading_font_weight = isset($hero_same_options['hero_same_heading_font_weight']) ? esc_attr($hero_same_options['hero_same_heading_font_weight']) : '700';
$heading_line_height = isset($hero_same_options['hero_same_heading_line_height']) ? esc_attr($hero_same_options['hero_same_heading_line_height']) : '1.2';
$heading_color = isset($hero_same_options['hero_same_heading_color']) ? esc_attr($hero_same_options['hero_same_heading_color']) : '#ffffff';
$heading_margin = isset($hero_same_options['hero_same_heading_margin']) ? esc_attr($hero_same_options['hero_same_heading_margin']) : '0 0 20px 0';
$heading_padding = isset($hero_same_options['hero_same_heading_padding']) ? esc_attr($hero_same_options['hero_same_heading_padding']) : '0';

/**
 * Subheading settings
 */
$subheading_font_family = isset($hero_same_options['hero_same_subheading_font_family']) ? esc_attr($hero_same_options['hero_same_subheading_font_family']) : 'Arial, sans-serif';
$subheading_font_size = isset($hero_same_options['hero_same_subheading_font_size']) ? esc_attr($hero_same_options['hero_same_subheading_font_size']) : '18px';
$subheading_font_weight = isset($hero_same_options['hero_same_subheading_font_weight']) ? esc_attr($hero_same_options['hero_same_subheading_font_weight']) : '400';
$subheading_line_height = isset($hero_same_options['hero_same_subheading_line_height']) ? esc_attr($hero_same_options['hero_same_subheading_line_height']) : '1.5';
$subheading_color = isset($hero_same_options['hero_same_subheading_color']) ? esc_attr($hero_same_options['hero_same_subheading_color']) : '#ffffff';
$subheading_margin = isset($hero_same_options['hero_same_subheading_margin']) ? esc_attr($hero_same_options['hero_same_subheading_margin']) : '0 0 30px 0';
$subheading_padding = isset($hero_same_options['hero_same_subheading_padding']) ? esc_attr($hero_same_options['hero_same_subheading_padding']) : '0';

/**
 * Arrow settings
 */
$hero_same_arrow_left = isset($hero_same_options['hero_same_arrow_left']) ? esc_attr($hero_same_options['hero_same_arrow_left']) : 'Icon-1';
$hero_same_arrow_right = isset($hero_same_options['hero_same_arrow_right']) ? esc_attr($hero_same_options['hero_same_arrow_right']) : 'Icon-1';
$hero_same_left_arrow_position_left = isset($hero_same_options['hero_same_left_arrow_position_left']) ? esc_attr($hero_same_options['hero_same_left_arrow_position_left']) : '10%';
$hero_same_left_arrow_position_top = isset($hero_same_options['hero_same_left_arrow_position_top']) ? esc_attr($hero_same_options['hero_same_left_arrow_position_top']) : '10%';
$hero_same_left_arrow_position_right = isset($hero_same_options['hero_same_left_arrow_position_right']) ? esc_attr($hero_same_options['hero_same_left_arrow_position_right']) : '10%';
$hero_same_left_arrow_position_bottom = isset($hero_same_options['hero_same_left_arrow_position_bottom']) ? esc_attr($hero_same_options['hero_same_left_arrow_position_bottom']) : '10%';
$hero_same_left_arrow_color = isset($hero_same_options['hero_same_left_arrow_color']) ? esc_attr($hero_same_options['hero_same_left_arrow_color']) : '#ffffff';
$hero_same_left_arrow_opacity = isset($hero_same_options['hero_same_left_arrow_opacity']) ? esc_attr($hero_same_options['hero_same_left_arrow_opacity']) : '0.8';
$hero_same_left_arrow_height = isset($hero_same_options['hero_same_left_arrow_height']) ? esc_attr($hero_same_options['hero_same_left_arrow_height']) : '40px';
$hero_same_left_arrow_width = isset($hero_same_options['hero_same_left_arrow_width']) ? esc_attr($hero_same_options['hero_same_left_arrow_width']) : '40px';
$hero_same_right_arrow_position_left = isset($hero_same_options['hero_same_right_arrow_position_left']) ? esc_attr($hero_same_options['hero_same_right_arrow_position_left']) : '10%';
$hero_same_right_arrow_position_top = isset($hero_same_options['hero_same_right_arrow_position_top']) ? esc_attr($hero_same_options['hero_same_right_arrow_position_top']) : '10%';
$hero_same_right_arrow_position_right = isset($hero_same_options['hero_same_right_arrow_position_right']) ? esc_attr($hero_same_options['hero_same_right_arrow_position_right']) : '10%';
$hero_same_right_arrow_position_bottom = isset($hero_same_options['hero_same_right_arrow_position_bottom']) ? esc_attr($hero_same_options['hero_same_right_arrow_position_bottom']) : '10%';
$hero_same_right_arrow_color = isset($hero_same_options['hero_same_right_arrow_color']) ? esc_attr($hero_same_options['hero_same_right_arrow_color']) : '#ffffff';
$hero_same_right_arrow_opacity = isset($hero_same_options['hero_same_right_arrow_opacity']) ? esc_attr($hero_same_options['hero_same_right_arrow_opacity']) : '0.8';
$hero_same_right_arrow_height = isset($hero_same_options['hero_same_right_arrow_height']) ? esc_attr($hero_same_options['hero_same_right_arrow_height']) : '40px';
$hero_same_right_arrow_width = isset($hero_same_options['hero_same_right_arrow_width']) ? esc_attr($hero_same_options['hero_same_right_arrow_width']) : '40px';



/**
 * Button settings
 */
$button_width = isset($hero_same_options['hero_same_button_width']) ? esc_attr($hero_same_options['hero_same_button_width']) : '200px';
$button_padding = isset($hero_same_options['hero_same_button_padding']) ? esc_attr($hero_same_options['hero_same_button_padding']) : '10px 20px';
$button_margin = isset($hero_same_options['hero_same_button_margin']) ? esc_attr($hero_same_options['hero_same_button_margin']) : '0';
$button_font_size = isset($hero_same_options['hero_same_button_font_size']) ? esc_attr($hero_same_options['hero_same_button_font_size']) : '14px';
$button_color = isset($hero_same_options['hero_same_button_color']) ? esc_attr($hero_same_options['hero_same_button_color']) : '#ffffff';
$button_bg_color = isset($hero_same_options['hero_same_button_bg_color']) ? esc_attr($hero_same_options['hero_same_button_bg_color']) : '#ff5733';
$button_border_color = isset($hero_same_options['hero_same_button_border_color']) ? esc_attr($hero_same_options['hero_same_button_border_color']) : '#ff5733';
$button_border_width = isset($hero_same_options['hero_same_button_border_width']) ? esc_attr($hero_same_options['hero_same_button_border_width']) : '1px';
$button_border_style = isset($hero_same_options['hero_same_button_border_style']) ? esc_attr($hero_same_options['hero_same_button_border_style']) : 'solid';
$button_border_radius = isset($hero_same_options['hero_same_button_border_radius']) ? esc_attr($hero_same_options['hero_same_button_border_radius']) : '5px';
$button_box_shadow = isset($hero_same_options['hero_same_button_box_shadow']) ? esc_attr($hero_same_options['hero_same_button_box_shadow']) : '0px 4px 6px #888888';
$button_text_align = isset($hero_same_options['hero_same_button_text_align']) ? esc_attr($hero_same_options['hero_same_button_text_align']) : 'center';
$button_text_decoration = isset($hero_same_options['hero_same_button_text_decoration']) ? esc_attr($hero_same_options['hero_same_button_text_decoration']) : 'none';
$button_font_family = isset($hero_same_options['hero_same_button_font_family']) ? esc_attr($hero_same_options['hero_same_button_font_family']) : 'Arial, sans-serif';
$button_font_weight = isset($hero_same_options['hero_same_button_font_weight']) ? esc_attr($hero_same_options['hero_same_button_font_weight']) : '400';
$button_target = isset($hero_same_options['hero_same_button_target']) ? esc_attr($hero_same_options['hero_same_button_target']) : '_self';
?>

<style>
    #slider::before {
        background-color: <?php echo $bg_overlay_color;  ?> !important;
        opacity: <?php echo $bg_overlay_opacity; ?> !important;
    }

    #arrow-left svg {
        width: <?php echo $hero_same_left_arrow_width; ?>;
        height: <?php echo $hero_same_left_arrow_height; ?>;
        color: <?php echo $hero_same_left_arrow_color; ?>;
        fill: <?php echo $hero_same_left_arrow_color; ?>;
        path: <?php echo $hero_same_left_arrow_color; ?>;
        stroke: <?php echo $hero_same_left_arrow_color; ?>;
        opacity: <?php echo $hero_same_left_arrow_opacity; ?>;
    }

    #arrow-right svg {
        width: <?php echo $hero_same_right_arrow_width; ?>;
        height: <?php echo $hero_same_right_arrow_height; ?>;
        color: <?php echo $hero_same_right_arrow_color; ?>;
        fill: <?php echo $hero_same_right_arrow_color; ?>;
        path: <?php echo $hero_same_right_arrow_color; ?>;
        stroke: <?php echo $hero_same_right_arrow_color; ?>;
        opacity: <?php echo $hero_same_right_arrow_opacity; ?>;
    }

</style>

<div class="slider-wrapper hero-same-wrapper" style="width: <?php echo $slider_width; ?>;">
    <div id="arrow-left" class="arrow" style="left:<?php echo $hero_same_left_arrow_position_left; ?>; top:<?php echo $hero_same_left_arrow_position_top; ?>; right:<?php echo $hero_same_left_arrow_position_right; ?>; bottom:<?php echo $hero_same_left_arrow_position_bottom; ?>;">
    <?php
        $svg_path = $hero_same_arrow_left;
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
                    '<svg width="' . $hero_same_left_arrow_width . '" height="' . $hero_same_left_arrow_height . '" style="fill: ' . $hero_same_left_arrow_color . ';"',
                    $svg_content
                );

                // Output the modified SVG
                echo $svg_content;
            } else {
                // Fallback in case of error
                echo '<img src="' . esc_url($svg_path) . '" alt="Arrow Left" style="width: ' . $hero_same_left_arrow_width . '; height: ' . $hero_same_left_arrow_height . ';">';
            }
        }
    ?>
    </div>
    <div id="slider">
        <?php if (!empty($hero_same_slider_data['images'])):
            foreach ($hero_same_slider_data['images'] as $image_url): ?>
                <div class="slide" style="height: <?php echo $slider_height; ?>;">
                    <img src="<?php echo esc_url($image_url); ?>" alt="Hero Image" style="height: <?php echo $slider_height; ?>; width: <?php echo $slider_width; ?>; object-fit: <?php echo $bg_image_size; ?>;">
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="slider-content" style="top: <?php echo $hero_same_content_position_top; ?>; left: <?php echo $hero_same_content_position_left; ?>; right: <?php echo $hero_same_content_position_right; ?>; bottom: <?php echo $hero_same_content_position_bottom; ?>; align-items: <?php echo $content_alignment; ?>; padding: <?php echo $content_padding; ?>; margin: <?php echo $content_margin; ?>;">
            <?php if (!empty($hero_same_slider_data['heading'])): ?>
                <h1 style="font-family: <?php echo $heading_font_family; ?>; font-size: <?php echo $heading_font_size; ?>; font-weight: <?php echo $heading_font_weight; ?>; line-height: <?php echo $heading_line_height; ?>; color: <?php echo $heading_color; ?>; text-align: <?php echo $heading_text_align; ?>; margin: <?php echo $heading_margin; ?>; padding: <?php echo $heading_padding; ?>; ">
                    <?php echo esc_html($hero_same_slider_data['heading']); ?>
                </h1>
            <?php endif; ?>

            <?php if (!empty($hero_same_slider_data['subheading'])): ?>
                <p style="font-family: <?php echo $subheading_font_family; ?>; font-size: <?php echo $subheading_font_size; ?>; font-weight: <?php echo $subheading_font_weight; ?>; line-height: <?php echo $subheading_line_height; ?>; color: <?php echo $sub_heading_color; ?>; text-align: <?php echo $sub_heading_text_align; ?>; margin: <?php echo $subheading_margin; ?>; padding: <?php echo $subheading_margin; ?>;">
                    <?php echo esc_html($hero_same_slider_data['subheading']); ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($hero_same_slider_data['button_text']) && !empty($hero_same_slider_data['button_link'])): ?>
                <a href="<?php echo esc_url($hero_same_slider_data['button_link']); ?>" class="hero-button" target="<?php echo $button_target; ?>" style=" background-color: <?php echo $button_bg_color; ?>; border-width: <?php echo $button_border_width; ?>; border-style: <?php echo $button_border_style; ?>; border-color: <?php echo $button_border_color; ?>; border-radius: <?php echo $button_border_radius; ?>; color: <?php echo $button_color; ?>; padding: <?php echo $button_padding; ?>; margin: <?php echo $button_margin;?>; text-align: <?php echo $button_text_align; ?>; text-decoration: <?php echo $button_text_decoration; ?>; font-size: <?php echo $button_font_size; ?>; font-family: <?php echo $button_font_family; ?>; font-weight: <?php echo $button_font_weight; ?>; box-shadow: <?php echo $button_box_shadow; ?>; ">
                    <?php echo esc_html($hero_same_slider_data['button_text']); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <div id="arrow-right" class="arrow" style="left:<?php echo $hero_same_right_arrow_position_left; ?>; top:<?php echo $hero_same_right_arrow_position_top; ?>; right:<?php echo $hero_same_right_arrow_position_right; ?>; bottom:<?php echo $hero_same_right_arrow_position_bottom; ?>; opacity: <?php echo $hero_same_right_arrow_opacity; ?>; height: <?php echo $hero_same_right_arrow_height; ?>; width: <?php echo $hero_same_right_arrow_width; ?>;">
    <?php
        $svg_path = $hero_same_arrow_right;
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
                    '<svg width="' . $hero_same_right_arrow_width . '" height="' . $hero_same_right_arrow_height . '" style="fill: ' . $hero_same_right_arrow_color . ';"',
                    $svg_content
                );

                // Output the modified SVG
                echo $svg_content;
            } else {
                // Fallback in case of error
                echo '<img src="' . esc_url($svg_path) . '" alt="Arrow Left" style="width: ' . $hero_same_left_arrow_width . '; height: ' . $hero_same_left_arrow_height . ';">';
            }
        }
    ?>
    </div>
    </div>
</div>

