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
$slider_width   = isset($hero_same_options['hero_same_slider_width']) ? esc_attr($hero_same_options['hero_same_slider_width']) : '100%';
$slider_height  = isset($hero_same_options['hero_same_slider_height']) ? esc_attr($hero_same_options['hero_same_slider_height']) : '700px';

/**
 * Background settings
 */
$bg_image_position   = isset($hero_same_options['hero_same_bg_image_position']) ? esc_attr($hero_same_options['hero_same_bg_image_position']) : 'center center';
$bg_image_size       = isset($hero_same_options['hero_same_bg_image_size']) ? esc_attr($hero_same_options['hero_same_bg_image_size']) : 'cover';
$bg_overlay          = isset($hero_same_options['hero_same_bg_overlay']) ? esc_attr($hero_same_options['hero_same_bg_overlay']) : 'true';
$bg_overlay_color    = isset($hero_same_options['hero_same_bg_overlay_color']) ? esc_attr($hero_same_options['hero_same_bg_overlay_color']) : '#000000';
$bg_overlay_opacity  = isset($hero_same_options['hero_same_bg_overlay_opacity']) ? esc_attr($hero_same_options['hero_same_bg_overlay_opacity']) : '0.5';

/**
 * Content settings
 */
$hero_same_content_position_top = isset($hero_same_options['hero_same_content_position_top']) ? esc_attr($hero_same_options['hero_same_content_position_top']) : '50%';
$hero_same_content_position_left = isset($hero_same_options['hero_same_content_position_left']) ? esc_attr($hero_same_options['hero_same_content_position_left']) : '50%';
$hero_same_content_position_right = isset($hero_same_options['hero_same_content_position_right']) ? esc_attr($hero_same_options['hero_same_content_position_right']) : '50%';
$hero_same_content_position_bottom = isset($hero_same_options['hero_same_content_position_bottom']) ? esc_attr($hero_same_options['hero_same_content_position_bottom']) : 'auto';
$content_alignment = isset($hero_same_options['hero_same_content_alignment']) ? esc_attr($hero_same_options['hero_same_content_alignment']) : 'center';
$content_padding = isset($hero_same_options['hero_same_content_padding']) ? esc_attr($hero_same_options['hero_same_content_padding']) : '20px';
$content_margin = isset($hero_same_options['hero_same_content_margin']) ? esc_attr($hero_same_options['hero_same_content_margin']) : '20px';




/**
 * Heading settings
 */
$heading_font_family = isset($hero_same_options['hero_same_heading_font_family']) ? esc_attr($hero_same_options['hero_same_heading_font_family']) : 'Arial, sans-serif';
$heading_font_size = isset($hero_same_options['hero_same_heading_font_size']) ? esc_attr($hero_same_options['hero_same_heading_font_size']) : '32px';
$heading_font_weight = isset($hero_same_options['hero_same_heading_font_weight']) ? esc_attr($hero_same_options['hero_same_heading_font_weight']) : '700';
$heading_line_height = isset($hero_same_options['hero_same_heading_line_height']) ? esc_attr($hero_same_options['hero_same_heading_line_height']) : '1.5';
$heading_color = isset($hero_same_options['hero_same_heading_color']) ? esc_attr($hero_same_options['hero_same_heading_color']) : '#ffffff';
$heading_margin = isset($hero_same_options['hero_same_heading_margin']) ? esc_attr($hero_same_options['hero_same_heading_margin']) : '0 0 10px 0';
$heading_padding = isset($hero_same_options['hero_same_heading_padding']) ? esc_attr($hero_same_options['hero_same_heading_padding']) : '0 0 10px 0';

/**
 * Subheading settings
 */
$subheading_font_family = isset($hero_same_options['hero_same_subheading_font_family']) ? esc_attr($hero_same_options['hero_same_subheading_font_family']) : 'Arial, sans-serif';
$subheading_font_size = isset($hero_same_options['hero_same_subheading_font_size']) ? esc_attr($hero_same_options['hero_same_subheading_font_size']) : '18px';
$subheading_font_weight = isset($hero_same_options['hero_same_subheading_font_weight']) ? esc_attr($hero_same_options['hero_same_subheading_font_weight']) : '400';
$subheading_line_height = isset($hero_same_options['hero_same_subheading_line_height']) ? esc_attr($hero_same_options['hero_same_subheading_line_height']) : '1.5';
$subheading_color = isset($hero_same_options['hero_same_subheading_color']) ? esc_attr($hero_same_options['hero_same_subheading_color']) : '#ffffff';
$subheading_margin = isset($hero_same_options['hero_same_subheading_margin']) ? esc_attr($hero_same_options['hero_same_subheading_margin']) : '0 0 10px 0';
$subheading_padding = isset($hero_same_options['hero_same_subheading_padding']) ? esc_attr($hero_same_options['hero_same_subheading_padding']) : '0 0 10px 0';

/**
 * Arrow settings
 */
$hero_same_left_media_file = isset($hero_same_options['hero_same_left_media_file']) ? esc_attr($hero_same_options['hero_same_left_media_file']) : '/wp-content/plugins/slider-bin/assets/icon/Arrow-Left.svg';
$hero_same_right_media_file = isset($hero_same_options['hero_same_right_media_file']) ? esc_attr($hero_same_options['hero_same_right_media_file']) : '/wp-content/plugins/slider-bin/assets/icon/Arrow-Right.svg';

$hero_same_left_arrow_position_left = isset($hero_same_options['hero_same_left_arrow_position_left']) ? esc_attr($hero_same_options['hero_same_left_arrow_position_left']) : '0';
$hero_same_left_arrow_position_top = isset($hero_same_options['hero_same_left_arrow_position_top']) ? esc_attr($hero_same_options['hero_same_left_arrow_position_top']) : '50%';
$hero_same_left_arrow_position_right = isset($hero_same_options['hero_same_left_arrow_position_right']) ? esc_attr($hero_same_options['hero_same_left_arrow_position_right']) : 'auto';
$hero_same_left_arrow_position_bottom = isset($hero_same_options['hero_same_left_arrow_position_bottom']) ? esc_attr($hero_same_options['hero_same_left_arrow_position_bottom']) : 'auto';
$hero_same_left_arrow_color = isset($hero_same_options['hero_same_left_arrow_color']) ? esc_attr($hero_same_options['hero_same_left_arrow_color']) : '#ffffff';
$hero_same_left_arrow_opacity = isset($hero_same_options['hero_same_left_arrow_opacity']) ? esc_attr($hero_same_options['hero_same_left_arrow_opacity']) : '1';
$hero_same_left_arrow_height = isset($hero_same_options['hero_same_left_arrow_height']) ? esc_attr($hero_same_options['hero_same_left_arrow_height']) : '40px';
$hero_same_left_arrow_width = isset($hero_same_options['hero_same_left_arrow_width']) ? esc_attr($hero_same_options['hero_same_left_arrow_width']) : '40px';
$hero_same_right_arrow_position_left = isset($hero_same_options['hero_same_right_arrow_position_left']) ? esc_attr($hero_same_options['hero_same_right_arrow_position_left']) : 'auto';
$hero_same_right_arrow_position_top = isset($hero_same_options['hero_same_right_arrow_position_top']) ? esc_attr($hero_same_options['hero_same_right_arrow_position_top']) : '50%';
$hero_same_right_arrow_position_right = isset($hero_same_options['hero_same_right_arrow_position_right']) ? esc_attr($hero_same_options['hero_same_right_arrow_position_right']) : '0';
$hero_same_right_arrow_position_bottom = isset($hero_same_options['hero_same_right_arrow_position_bottom']) ? esc_attr($hero_same_options['hero_same_right_arrow_position_bottom']) : 'auto';
$hero_same_right_arrow_color = isset($hero_same_options['hero_same_right_arrow_color']) ? esc_attr($hero_same_options['hero_same_right_arrow_color']) : '#ffffff';
$hero_same_right_arrow_opacity = isset($hero_same_options['hero_same_right_arrow_opacity']) ? esc_attr($hero_same_options['hero_same_right_arrow_opacity']) : '1';
$hero_same_right_arrow_height = isset($hero_same_options['hero_same_right_arrow_height']) ? esc_attr($hero_same_options['hero_same_right_arrow_height']) : '40px';
$hero_same_right_arrow_width = isset($hero_same_options['hero_same_right_arrow_width']) ? esc_attr($hero_same_options['hero_same_right_arrow_width']) : '40px';



/**
 * Button settings
 */
// $button_width                = isset($hero_same_options['hero_same_button_width']) ? esc_attr($hero_same_options['hero_same_button_width']) : '200px';
$button_padding              = isset($hero_same_options['hero_same_button_padding']) ? esc_attr($hero_same_options['hero_same_button_padding']) : '10px 35px';
$button_margin               = isset($hero_same_options['hero_same_button_margin']) ? esc_attr($hero_same_options['hero_same_button_margin']) : '0 30px 0 0';
$button_font_size            = isset($hero_same_options['hero_same_button_font_size']) ? esc_attr($hero_same_options['hero_same_button_font_size']) : '15px';
$button_color                = isset($hero_same_options['hero_same_button_color']) ? esc_attr($hero_same_options['hero_same_button_color']) : '#ffffff';
$button_bg_color             = isset($hero_same_options['hero_same_button_bg_color']) ? esc_attr($hero_same_options['hero_same_button_bg_color']) : '#000';
$button_border_color         = isset($hero_same_options['hero_same_button_border_color']) ? esc_attr($hero_same_options['hero_same_button_border_color']) : '#000';
$button_border_width         = isset($hero_same_options['hero_same_button_border_width']) ? esc_attr($hero_same_options['hero_same_button_border_width']) : '1px';
$button_border_style         = isset($hero_same_options['hero_same_button_border_style']) ? esc_attr($hero_same_options['hero_same_button_border_style']) : 'solid';
$button_border_radius        = isset($hero_same_options['hero_same_button_border_radius']) ? esc_attr($hero_same_options['hero_same_button_border_radius']) : '5px';
$button_box_shadow           = isset($hero_same_options['hero_same_button_box_shadow']) ? esc_attr($hero_same_options['hero_same_button_box_shadow']) : 'none';
$button_text_align           = isset($hero_same_options['hero_same_button_text_align']) ? esc_attr($hero_same_options['hero_same_button_text_align']) : 'center';
$button_text_decoration      = isset($hero_same_options['hero_same_button_text_decoration']) ? esc_attr($hero_same_options['hero_same_button_text_decoration']) : 'none';
$button_font_family          = isset($hero_same_options['hero_same_button_font_family']) ? esc_attr($hero_same_options['hero_same_button_font_family']) : 'Arial, sans-serif';
$button_font_weight          = isset($hero_same_options['hero_same_button_font_weight']) ? esc_attr($hero_same_options['hero_same_button_font_weight']) : '400';
$button_target               = isset($hero_same_options['hero_same_button_target']) ? esc_attr($hero_same_options['hero_same_button_target']) : '_self';


$pagination_height          =isset($hero_same_options['hero_same_pagination_height']) ?esc_attr($hero_same_options['hero_same_pagination_height']) : '15px';
$pagination_width           =isset($hero_same_options['hero_same_pagination_width']) ?esc_attr($hero_same_options['hero_same_pagination_width']) : '15px';
$pagination_gap             =isset($hero_same_options['hero_same_pagination_gap']) ?esc_attr($hero_same_options['hero_same_pagination_gap']) : '5px';
$pagination_color           =isset($hero_same_options['hero_same_pagination_color']) ?esc_attr($hero_same_options['hero_same_pagination_color']) : '#8E1616';
$pagination_active_color    =isset($hero_same_options['hero_same_pagination_active_color']) ?esc_attr($hero_same_options['hero_same_pagination_active_color']) : '#D84040';




?>

<style>
    .bg-overlay-hero-same::before {
        background-color: <?php echo !empty($bg_overlay_color) ? $bg_overlay_color : '#000000'; ?> !important;
        opacity: <?php echo !empty($bg_overlay_opacity) ? $bg_overlay_opacity : '0.5'; ?> !important;
    }
    .dot.active {
        background-color:<?php echo !empty($pagination_active_color) ? $pagination_active_color : '#D84040'; ?> !important;
    }

</style>



<div id="<?php echo esc_attr($unique_id); ?>" class="slider-wrapper hero-same-wrapper" style="width: <?php echo empty($slider_width) ? '100%' : $slider_width; ?>;">
    <div id="arrow-left" class="arrow-left" style="
        width: <?php echo empty($hero_same_left_arrow_width) ? '40px' : $hero_same_left_arrow_width; ?>;
        height: <?php echo empty($hero_same_left_arrow_height) ? '40px' : $hero_same_left_arrow_height; ?>;
        left: <?php echo empty($hero_same_left_arrow_position_left) ? '0' : $hero_same_left_arrow_position_left; ?>;
        top: <?php echo empty($hero_same_left_arrow_position_top) ? '50%' : $hero_same_left_arrow_position_top; ?>;
        right: <?php echo empty($hero_same_left_arrow_position_right) ? 'auto' : $hero_same_left_arrow_position_right; ?>;
        bottom: <?php echo empty($hero_same_left_arrow_position_bottom) ? 'auto' : $hero_same_left_arrow_position_bottom; ?>;
        opacity: <?php echo empty($hero_same_left_arrow_opacity) ? '1' : $hero_same_left_arrow_opacity; ?>; ">
        <img src="<?php echo empty($hero_same_left_media_file) ? '/wp-content/plugins/slider-bin/Assets/icon/Arrow-Left.svg' : $hero_same_left_media_file; ?>" alt="">


    </div>
    <div id="slider" class="bg-overlay-hero-same">
        <?php if (!empty($hero_same_slider_data['images'])):
            foreach ($hero_same_slider_data['images'] as $image_url): ?>
                <div class="slide" style="height: <?php echo empty($slider_height) ? '700px' : $slider_height; ?>;">
                    <img src="<?php echo esc_url($image_url); ?>" alt="Hero Image" style="height: <?php echo empty($slider_height) ? '100%' : $slider_height; ?>; width: <?php echo empty($slider_width) ? '100%' : $slider_width; ?>; object-fit: <?php echo empty($bg_image_size) ? 'cover' : $bg_image_size; ?>; background-position: <?php echo empty($bg_image_position) ? 'center' : $bg_image_position?>">
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="slider-content" style="
                    height: fit-content;
                    top: <?php echo empty($hero_same_content_position_top) ? '50%' : $hero_same_content_position_top; ?>;
                    left: <?php echo empty($hero_same_content_position_left) ? '50%' : $hero_same_content_position_left; ?>;
                    right: <?php echo empty($hero_same_content_position_right) ? '50%' : $hero_same_content_position_right; ?>;
                    bottom: <?php echo empty($hero_same_content_position_bottom) ? 'auto' : $hero_same_content_position_bottom; ?>;
                    align-items: <?php echo empty($content_alignment) ? 'center' : $content_alignment; ?>;
                    padding: <?php echo empty($content_padding) ? '0 20px' : $content_padding; ?>;
                    margin: <?php echo empty($content_margin) ? '0 0 10px 0' : $content_margin; ?>;">
            <?php if (!empty($hero_same_slider_data['heading'])): ?>
                <h1 style="
                    font-family: <?php echo empty($heading_font_family) ? 'Arial, sans-serif' : $heading_font_family; ?>;
                    font-size: <?php echo empty($heading_font_size) ? '34px' : $heading_font_size; ?>;
                    font-weight: <?php echo empty($heading_font_weight) ? 'normal' : $heading_font_weight; ?>;
                    line-height: <?php echo empty($heading_line_height) ? '1.5' : $heading_line_height; ?>;
                    color: <?php echo empty($heading_color) ? '#fff' : $heading_color; ?>;
                    margin: <?php echo empty($heading_margin) ? '0 auto' : $heading_margin; ?>;
                    padding: <?php echo empty($heading_padding) ? '0 0 10px 0' : $heading_padding; ?>;">
                    <?php echo esc_html($hero_same_slider_data['heading']); ?>
                </h1>
            <?php endif; ?>

            <?php if (!empty($hero_same_slider_data['subheading'])): ?>
                <p style="
                    font-family: <?php echo empty($subheading_font_family) ? 'Arial, sans-serif' : $subheading_font_family; ?>;
                    font-size: <?php echo empty($subheading_font_size) ? '22px' : $subheading_font_size; ?>;
                    font-weight: <?php echo empty($subheading_font_weight) ? 'normal' : $subheading_font_weight; ?>;
                    line-height: <?php echo empty($subheading_line_height) ? '1.5' : $subheading_line_height; ?>;
                    color: <?php echo empty($subheading_color) ? '#fff' : $subheading_color; ?>;
                    margin: <?php echo empty($subheading_margin) ? '0 0 10px 0' : $subheading_margin; ?>;
                    padding: <?php echo empty($subheading_padding) ? '0 0 10px 0' : $subheading_padding; ?>;">
                    <?php echo esc_html($hero_same_slider_data['subheading']); ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($hero_same_slider_data['button_text']) && !empty($hero_same_slider_data['button_link'])): ?>
                <a href="<?php echo esc_url($hero_same_slider_data['button_link']); ?>" class="hero-button" target="<?php echo empty($button_target) ? '_blunk' : $button_target; ?>" style="
                    background-color: <?php echo empty($button_bg_color) ? '#000' : $button_bg_color; ?>;
                    border-width: <?php echo empty($button_border_width) ? '0' : $button_border_width; ?>;
                    border-style: <?php echo empty($button_border_style) ? 'none' : $button_border_style; ?>;
                    border-color: <?php echo empty($button_border_color) ? '#000' : $button_border_color; ?>;
                    border-radius: <?php echo empty($button_border_radius) ? '5px' : $button_border_radius; ?>;
                    color: <?php echo empty($button_color) ? '#fff' : $button_color; ?>;
                    padding: <?php echo empty($button_padding) ? '10px 35px' : $button_padding; ?>;
                    margin: <?php echo empty($button_margin) ? '0 20px 0 0' : $button_margin; ?>;
                    text-align: <?php echo empty($button_text_align) ? 'center' : $button_text_align; ?>;
                    text-decoration: <?php echo empty($button_text_decoration) ? 'none' : $button_text_decoration; ?>;
                    font-size: <?php echo empty($button_font_size) ? '16px' : $button_font_size; ?>;
                    font-family: <?php echo empty($button_font_family) ? 'Arial, sans-serif' : $button_font_family; ?>;
                    font-weight: <?php echo empty($button_font_weight) ? 'normal' : $button_font_weight; ?>;
                    box-shadow: <?php echo empty($button_box_shadow) ? 'none' : $button_box_shadow; ?>;">
                    <?php echo esc_html($hero_same_slider_data['button_text']); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <div id="arrow-right" class="arrow-right" style="
        width: <?php echo empty($hero_same_right_arrow_width) ? '40px' : $hero_same_right_arrow_width; ?>;
        height: <?php echo empty($hero_same_right_arrow_height) ? '40px' : $hero_same_right_arrow_height; ?>;
        left: <?php echo empty($hero_same_right_arrow_position_left) ? 'auto' : $hero_same_right_arrow_position_left; ?>;
        top: <?php echo empty($hero_same_right_arrow_position_top) ? '50%' : $hero_same_right_arrow_position_top; ?>;
        right: <?php echo empty($hero_same_right_arrow_position_right) ? '0' : $hero_same_right_arrow_position_right; ?>;
        bottom: <?php echo empty($hero_same_right_arrow_position_bottom) ? 'auto' : $hero_same_right_arrow_position_bottom; ?>;
        opacity: <?php echo empty($hero_same_right_arrow_opacity) ? '1' : $hero_same_right_arrow_opacity; ?>;">
        <img src="<?php echo empty($hero_same_right_media_file) ? '/wp-content/plugins/slider-bin/Assets/icon/Arrow-Right.svg' : $hero_same_right_media_file; ?>" alt="">
    </div>
    <div class="pagination">
        <?php if (!empty($hero_same_slider_data['images'])):
            foreach ($hero_same_slider_data['images'] as $index => $image_url): ?>
                <span class="dot" style="height: <?php echo !empty($pagination_height) ? $pagination_height : '15px'; ?>;
                                         width: <?php echo !empty($pagination_width) ? $pagination_width : '15px'; ?>;
                                         margin-left:<?php echo !empty($pagination_gap) ? $pagination_gap : '5px'; ?>;
                                         background-color: <?php echo !empty($pagination_color) ? $pagination_color : '#8E1616'; ?>;" onclick="currentSlide(<?php echo $index + 1; ?>)"></span>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>




