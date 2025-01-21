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
$hero_same_content_position = isset($hero_same_options['hero_same_content_position']) ? esc_attr($hero_same_options['hero_same_content_position']) : array();

$hero_same_content_position_top = isset($hero_same_content_position['hero_same_content_position_top']) ? esc_attr($hero_same_content_position['hero_same_content_position_top']) : '50%';
$hero_same_content_position_left = isset($hero_same_content_position['hero_same_content_position_left']) ? esc_attr($hero_same_content_position['hero_same_content_position_left']) : '50%';
$hero_same_content_position_right = isset($hero_same_content_position['hero_same_content_position_right']) ? esc_attr($hero_same_content_position['hero_same_content_position_right']) : 'auto';
$hero_same_content_position_bottom = isset($hero_same_content_position['hero_same_content_position_bottom']) ? esc_attr($hero_same_content_position['hero_same_content_position_bottom']) : 'auto';


$content_alignment = isset($hero_same_options['hero_same_content_alignment']) ? esc_attr($hero_same_options['hero_same_content_alignment']) : 'center';

$content_padding = isset($hero_same_options['hero_same_content_padding']) ? esc_attr($hero_same_options['hero_same_content_padding']) : array();

$content_padding_left = isset($content_padding['hero_same_content_padding_left']) ? esc_attr($hero_same_options['hero_same_content_padding_left']) : '20px';
$content_padding_top = isset($content_padding['hero_same_content_padding_top']) ? esc_attr($hero_same_options['hero_same_content_padding_top']) : '20px';
$content_padding_right = isset($content_padding['hero_same_content_padding_right']) ? esc_attr($hero_same_options['hero_same_content_padding_right']) : '20px';
$content_padding_bottom = isset($content_padding['hero_same_content_padding_bottom']) ? esc_attr($hero_same_options['hero_same_content_padding_bottom']) : '20px';

$content_margin = isset($hero_same_options['hero_same_content_margin']) ? esc_attr($hero_same_options['hero_same_content_margin']) : array();

$content_margin_left    = isset($content_margin['hero_same_content_margin_left']) ? esc_attr($hero_same_options['hero_same_content_margin_left']) : '20px';
$content_margin_top     = isset($content_margin['hero_same_content_margin_top']) ? esc_attr($hero_same_options['hero_same_content_margin_top']) : '20px';
$content_margin_right   = isset($content_margin['hero_same_content_margin_right']) ? esc_attr($hero_same_options['hero_same_content_margin_right']) : '20px';
$content_margin_bottom  = isset($content_margin['hero_same_content_margin_bottom']) ? esc_attr($hero_same_options['hero_same_content_margin_bottom']) : '20px';




/**
 * Heading settings
 */
$heading_font_family = isset($hero_same_options['hero_same_heading_font_family']) ? esc_attr($hero_same_options['hero_same_heading_font_family']) : 'Arial, sans-serif';
$heading_font_size = isset($hero_same_options['hero_same_heading_font_size']) ? esc_attr($hero_same_options['hero_same_heading_font_size']) : '32px';
$heading_font_weight = isset($hero_same_options['hero_same_heading_font_weight']) ? esc_attr($hero_same_options['hero_same_heading_font_weight']) : '700';
$heading_line_height = isset($hero_same_options['hero_same_heading_line_height']) ? esc_attr($hero_same_options['hero_same_heading_line_height']) : '1.5';
$heading_color = isset($hero_same_options['hero_same_heading_color']) ? esc_attr($hero_same_options['hero_same_heading_color']) : '#ffffff';

$heading_margin = isset($hero_same_options['hero_same_heading_margin']) ? esc_attr($hero_same_options['hero_same_heading_margin']) : array();

$heading_margin_left    = isset($heading_margin['hero_same_heading_margin_left']) ? esc_attr($heading_margin['hero_same_heading_margin_left']) : '0';
$heading_margin_top     = isset($heading_margin['hero_same_heading_margin_top']) ? esc_attr($heading_margin['hero_same_heading_margin_top']) : '0';
$heading_margin_right   = isset($heading_margin['hero_same_heading_margin_right']) ? esc_attr($heading_margin['hero_same_heading_margin_right']) : '0';
$heading_margin_bottom  = isset($heading_margin['hero_same_heading_margin_bottom']) ? esc_attr($heading_margin['hero_same_heading_margin_bottom']) : '10px';

$heading_padding = isset($hero_same_options['hero_same_heading_padding']) ? esc_attr($hero_same_options['hero_same_heading_padding']) : array();

$heading_padding_left    = isset($heading_padding['hero_same_heading_padding_left']) ? esc_attr($heading_padding['hero_same_heading_padding_left']) : '0';
$heading_padding_top     = isset($heading_padding['hero_same_heading_padding_top']) ? esc_attr($heading_padding['hero_same_heading_padding_top']) : '0';
$heading_padding_right   = isset($heading_padding['hero_same_heading_padding_right']) ? esc_attr($heading_padding['hero_same_heading_padding_right']) : '0';
$heading_padding_bottom  = isset($heading_padding['hero_same_heading_padding_bottom']) ? esc_attr($heading_padding['hero_same_heading_padding_bottom']) : '10px';

/**
 * Subheading settings
 */
$subheading_font_family = isset($hero_same_options['hero_same_subheading_font_family']) ? esc_attr($hero_same_options['hero_same_subheading_font_family']) : 'Arial, sans-serif';
$subheading_font_size = isset($hero_same_options['hero_same_subheading_font_size']) ? esc_attr($hero_same_options['hero_same_subheading_font_size']) : '18px';
$subheading_font_weight = isset($hero_same_options['hero_same_subheading_font_weight']) ? esc_attr($hero_same_options['hero_same_subheading_font_weight']) : '400';
$subheading_line_height = isset($hero_same_options['hero_same_subheading_line_height']) ? esc_attr($hero_same_options['hero_same_subheading_line_height']) : '1.5';
$subheading_color = isset($hero_same_options['hero_same_subheading_color']) ? esc_attr($hero_same_options['hero_same_subheading_color']) : '#ffffff';

$subheading_margin = isset($hero_same_options['hero_same_subheading_margin']) ? esc_attr($hero_same_options['hero_same_subheading_margin']) : array();

$subheading_margin_left    = isset($subheading_margin['hero_same_subheading_margin_left']) ? esc_attr($subheading_margin['hero_same_subheading_margin_left']) : '0';
$subheading_margin_top     = isset($subheading_margin['hero_same_subheading_margin_top']) ? esc_attr($subheading_margin['hero_same_subheading_margin_top']) : '0';
$subheading_margin_right   = isset($subheading_margin['hero_same_subheading_margin_right']) ? esc_attr($subheading_margin['hero_same_subheading_margin_right']) : '0';
$subheading_margin_bottom  = isset($subheading_margin['hero_same_subheading_margin_bottom']) ? esc_attr($subheading_margin['hero_same_subheading_margin_bottom']) : '10px';


$subheading_padding = isset($hero_same_options['hero_same_subheading_padding']) ? esc_attr($hero_same_options['hero_same_subheading_padding']) : array();

$subheading_padding_left    = isset($subheading_padding['hero_same_subheading_padding_left']) ? esc_attr($subheading_padding['hero_same_subheading_padding_left']) : '0';
$subheading_padding_top     = isset($subheading_padding['hero_same_subheading_padding_top']) ? esc_attr($subheading_padding['hero_same_subheading_padding_top']) : '0';
$subheading_padding_right   = isset($subheading_padding['hero_same_subheading_padding_right']) ? esc_attr($subheading_padding['hero_same_subheading_padding_right']) : '0';
$subheading_padding_bottom  = isset($subheading_padding['hero_same_subheading_padding_bottom']) ? esc_attr($subheading_padding['hero_same_subheading_padding_bottom']) : '10px';

/**
 * Arrow settings
 */
$hero_same_left_media_file = isset($hero_same_options['hero_same_left_media_file']) ? esc_attr($hero_same_options['hero_same_left_media_file']) : SLIDER_BIN_URL . '/assets/icon/arrow-left.png';
$hero_same_right_media_file = isset($hero_same_options['hero_same_right_media_file']) ? esc_attr($hero_same_options['hero_same_right_media_file']) : SLIDER_BIN_URL . '/assets/icon/arrow-right.png';

$hero_same_arrow_position = isset($hero_same_options['hero_same_arrow_position']) ? esc_attr($hero_same_options['hero_same_arrow_position']) : array();

$hero_same_arrow_position_left = isset($hero_same_arrow_position['hero_same_arrow_position_left']) ? esc_attr($hero_same_options['hero_same_left_arrow_position_left']) : '0';
$hero_same_arrow_position_top = isset($hero_same_arrow_position['hero_same_arrow_position_top']) ? esc_attr($hero_same_options['hero_same_left_arrow_position_top']) : '50%';
$hero_same_arrow_position_right = isset($hero_same_arrow_position['hero_same_arrow_position_right']) ? esc_attr($hero_same_options['hero_same_left_arrow_position_right']) : '0';
$hero_same_arrow_position_bottom = isset($hero_same_arrow_position['hero_same_arrow_position_bottom']) ? esc_attr($hero_same_options['hero_same_left_arrow_position_bottom']) : 'auto';

$hero_same_arrow_color = isset($hero_same_options['hero_same_arrow_color']) ? esc_attr($hero_same_options['hero_same_arrow_color']) : '#ffffff';
$hero_same_arrow_opacity = isset($hero_same_options['hero_same_arrow_opacity']) ? esc_attr($hero_same_options['hero_same_arrow_opacity']) : '1';
$hero_same_arrow_height = isset($hero_same_options['hero_same_arrow_height']) ? esc_attr($hero_same_options['hero_same_arrow_height']) : '40px';
$hero_same_arrow_width = isset($hero_same_options['hero_same_arrow_width']) ? esc_attr($hero_same_options['hero_same_arrow_width']) : '40px';


/**
 * Button settings
 */

$button_padding              = isset($hero_same_options['hero_same_button_padding']) ? esc_attr($hero_same_options['hero_same_button_padding']) : array();
$button_padding_left          = isset($button_padding['hero_same_button_padding_left']) ? esc_attr($button_padding['hero_same_button_padding_left']) : '35px';
$button_padding_top           = isset($button_padding['hero_same_button_padding_top']) ? esc_attr($button_padding['hero_same_button_padding_top']) : '15px';
$button_padding_right         = isset($button_padding['hero_same_button_padding_right']) ? esc_attr($button_padding['hero_same_button_padding_right']) : '35px';
$button_padding_bottom        = isset($button_padding['hero_same_button_padding_bottom']) ? esc_attr($button_padding['hero_same_button_padding_bottom']) : '15px';


$button_margin               = isset($hero_same_options['hero_same_button_margin']) ? esc_attr($hero_same_options['hero_same_button_margin']) : array();
$button_margin_left          = isset($button_margin['hero_same_button_margin_left']) ? esc_attr($button_margin['hero_same_button_margin_left']) : '35px';
$button_margin_top           = isset($button_margin['hero_same_button_margin_top']) ? esc_attr($button_margin['hero_same_button_margin_top']) : '15px';
$button_margin_right         = isset($button_margin['hero_same_button_margin_right']) ? esc_attr($button_margin['hero_same_button_margin_right']) : '35px';
$button_margin_bottom        = isset($button_margin['hero_same_button_margin_bottom']) ? esc_attr($button_margin['hero_same_button_margin_bottom']) : '15px';



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
    #slider{
        position: relative;
    }
    .bg-overlay-hero-same::before {
        background-color: <?php echo !empty($bg_overlay_color) ? $bg_overlay_color : '#000000'; ?> !important;
        opacity: <?php echo !empty($bg_overlay_opacity) ? $bg_overlay_opacity : '0.5'; ?> !important;
    }

    .arrow-left {
        width: <?php echo empty($hero_same_arrow_width) ? '40px' : $hero_same_arrow_width; ?>!important;
        height: <?php echo empty($hero_same_arrow_height) ? '40px' : $hero_same_arrow_height; ?>!important;
        left: <?php echo empty($hero_same_arrow_position_left) ? '0' : $hero_same_arrow_position_left; ?>!important;
        top: <?php echo empty($hero_same_arrow_position_top) ? '50%' : $hero_same_arrow_position_top; ?>!important;
        opacity: <?php echo empty($hero_same_left_arrow_opacity) ? '1' : $hero_same_left_arrow_opacity; ?>!important;
    }
    .slide-hero-img {
        height: <?php echo empty($slider_height) ? '100%' : $slider_height; ?>!important;
        width: <?php echo empty($slider_width) ? '100%' : $slider_width; ?>!important;
        object-fit: cover!important;
        background-size: <?php echo empty($bg_image_size) ? 'cover' : $bg_image_size; ?>!important!important;
        background-position: <?php echo empty($bg_image_position) ? 'center' : $bg_image_position?>!important;
    }

    .slider-content {
        width: 100% !important;
        height: fit-content !important;
        top: <?php echo empty($hero_same_content_position_top) ? '50%' : $hero_same_content_position_top; ?>!important;
        left: <?php echo empty($hero_same_content_position_left) ? '50%' : $hero_same_content_position_left; ?>!important;
        right: <?php echo empty($hero_same_content_position_right) ? '50%' : $hero_same_content_position_right; ?>!important;
        bottom: <?php echo empty($hero_same_content_position_bottom) ? 'auto' : $hero_same_content_position_bottom; ?>!important;
        align-items: <?php echo empty($content_alignment) ? 'center' : $content_alignment; ?>!important;
        padding-left: <?php echo empty($content_padding_left) ? '10px' : $content_padding_left; ?>!important;
        padding-top: <?php echo empty($content_padding_top) ? '10px' : $content_padding_left; ?>!important;
        padding-right: <?php echo empty($content_padding_right) ? '10px' : $content_padding_left; ?>!important;
        padding-bottom: <?php echo empty($content_padding_bottom) ? '10px' : $content_padding_left; ?>!important;
        margin-left: <?php //echo empty($content_margin_left) ? 'auto' : $content_margin_left; ?>!important;
        margin-top: <?php //echo empty($content_margin_top) ? '0' : $content_margin_left; ?>!important;
        margin-right: <?php //echo empty($content_margin_right) ? 'auto' : $content_margin_left; ?>!important;
        margin-bottom: <?php //echo empty($content_margin_bottom) ? '0' : $content_margin_left; ?>!important;
    }

    .content-heading {
        font-family:    <?php echo esc_attr(!empty($heading_font_family) ? $heading_font_family : 'Arial, sans-serif'); ?>!important;
        font-size:      <?php echo esc_attr(!empty($heading_font_size) ? $heading_font_size : '34px'); ?>!important;
        font-weight:    <?php echo esc_attr(!empty($heading_font_weight) ? $heading_font_weight : 'normal'); ?>!important;
        line-height:    <?php echo esc_attr(!empty($heading_line_height) ? $heading_line_height : '1.5'); ?>!important;
        color:          <?php echo esc_attr(!empty($heading_color) ? $heading_color : '#fff'); ?>!important;
        padding-left:   <?php echo esc_attr(!empty($heading_padding_left) ? $heading_padding_left : '0'); ?>!important;
        padding-top:    <?php echo esc_attr(!empty($heading_padding_top) ? $heading_padding_top : '0'); ?>!important;
        padding-right:  <?php echo esc_attr(!empty($heading_padding_right) ? $heading_padding_right : '0'); ?>!important;
        padding-bottom: <?php echo esc_attr(!empty($heading_padding_bottom) ? $heading_padding_bottom : '10px'); ?>!important;
        margin-left:    <?php echo esc_attr(!empty($heading_margin_left) ? $heading_margin_left : 'auto'); ?>!important;
        margin-top:     <?php echo esc_attr(!empty($heading_margin_top) ? $heading_margin_top : '0'); ?>!important;
        margin-right:   <?php echo esc_attr(!empty($heading_margin_right) ? $heading_margin_right : 'auto'); ?>!important;
        margin-bottom:  <?php echo esc_attr(!empty($heading_margin_bottom) ? $heading_margin_bottom : '0'); ?>!important;
    }

    .content-subheading {
        font-family:    <?php echo empty($subheading_font_family) ? 'Arial, sans-serif' : $subheading_font_family; ?>!important;
        font-size:      <?php echo empty($subheading_font_size) ? '22px' : $subheading_font_size; ?>!important;
        font-weight:    <?php echo empty($subheading_font_weight) ? 'normal' : $subheading_font_weight; ?>!important;
        line-height:    <?php echo empty($subheading_line_height) ? '1.5' : $subheading_line_height; ?>!important;
        color:          <?php echo empty($subheading_color) ? '#fff' : $subheading_color; ?>!important;
        padding-left:   <?php echo esc_attr(!empty($subheading_padding_left) ? $subheading_padding_left : '0'); ?>!important;
        padding-top:    <?php echo esc_attr(!empty($subheading_padding_top) ? $subheading_padding_top : '0'); ?>!important;
        padding-right:  <?php echo esc_attr(!empty($subheading_padding_right) ? $subheading_padding_right : '0'); ?>!important;
        padding-bottom: <?php echo esc_attr(!empty($subheading_padding_bottom) ? $subheading_padding_bottom : '10px'); ?>!important;
        margin-left:    <?php echo esc_attr(!empty($subheading_margin_left) ? $subheading_margin_left : 'auto'); ?>!important;
        margin-top:     <?php echo esc_attr(!empty($subheading_margin_top) ? $subheading_margin_top : '0'); ?>!important;
        margin-right:   <?php echo esc_attr(!empty($subheading_margin_right) ? $subheading_margin_right : 'auto'); ?>!important;
        margin-bottom:  <?php echo esc_attr(!empty($subheading_margin_bottom) ? $subheading_margin_bottom : '0'); ?>!important;
    }

    .hero-button {
        background-color:<?php echo empty($button_bg_color) ? '#000' : $button_bg_color; ?>!important;
        border-width:    <?php echo empty($button_border_width) ? '0' : $button_border_width; ?>!important;
        border-style:    <?php echo empty($button_border_style) ? 'none' : $button_border_style; ?>!important;
        border-color:    <?php echo empty($button_border_color) ? '#000' : $button_border_color; ?>!important;
        border-radius:   <?php echo empty($button_border_radius) ? '5px' : $button_border_radius; ?>!important;
        color:           <?php echo empty($button_color) ? '#fff' : $button_color; ?>!important;
        text-align:      <?php echo empty($button_text_align) ? 'center' : $button_text_align; ?>!important;
        text-decoration: <?php echo empty($button_text_decoration) ? 'none' : $button_text_decoration; ?>!important;
        font-size:       <?php echo empty($button_font_size) ? '16px' : $button_font_size; ?>!important;
        font-family:     <?php echo empty($button_font_family) ? 'Arial, sans-serif' : $button_font_family; ?>!important;
        font-weight:     <?php echo empty($button_font_weight) ? 'normal' : $button_font_weight; ?>!important;
        box-shadow:      <?php echo empty($button_box_shadow) ? 'none' : $button_box_shadow; ?>!important;
        padding-left:    <?php echo empty($button_padding_left) ? '35px' : $button_padding_left; ?>!important;
        padding-top:     <?php echo empty($button_padding_top) ? '12px' : $button_padding_top; ?>!important;
        padding-right:   <?php echo empty($button_padding_right) ? '35px' : $button_padding_right; ?>!important;
        padding-bottom:  <?php echo empty($button_padding_bottom) ? '12px' : $button_padding_bottom; ?>!important;
        margin-left:     <?php echo empty($button_margin_left) ? 'auto' : $button_margin_left; ?>!important;
        margin-top:      <?php echo empty($button_margin_top) ? '0' : $button_margin_top; ?>!important;
        margin-right:    <?php echo empty($button_margin_right) ? 'auto' : $button_margin_right; ?>!important;
        margin-bottom:   <?php echo empty($button_margin_bottom) ? '0' : $button_margin_bottom; ?>!important;
    }

    .arrow-right {
        width:      <?php echo empty($hero_same_arrow_width) ? '40px' : $hero_same_arrow_width; ?>!important;
        height:     <?php echo empty($hero_same_arrow_height) ? '40px' : $hero_same_arrow_height; ?>!important;
        right:      <?php echo empty($hero_same_arrow_position_right) ? '0' : $hero_same_arrow_position_right; ?>!important;
        top:        <?php echo empty($hero_same_arrow_position_top) ? '50%' : $hero_same_arrow_position_top; ?>!important;
        opacity:    <?php echo empty($hero_same_left_arrow_opacity) ? '1' : $hero_same_left_arrow_opacity; ?>!important;
    }

    .dot{
        height: <?php echo !empty($pagination_height) ? $pagination_height : '15px'; ?>!important;
        width: <?php echo !empty($pagination_width) ? $pagination_width : '15px'; ?>!important;
        margin-left:<?php echo !empty($pagination_gap) ? $pagination_gap : '5px'; ?>!important;
        background-color: <?php echo !empty($pagination_color) ? $pagination_color : '#8E1616'; ?>!important;
    }

    .dot.active {
        background-color:<?php echo !empty($pagination_active_color) ? $pagination_active_color : '#D84040'; ?> !important;
    }



</style>



<div id="<?php echo esc_attr($unique_id); ?>" class="slider-wrapper hero-same-wrapper" style="width: <?php echo empty($slider_width) ? '100%' : $slider_width; ?>;">
    <div id="arrow-left" class="arrow-left" style=>
        <img src="<?php echo empty($hero_same_left_media_file) ? SLIDER_BIN_URL . '/assets/icon/arrow-left.png' : $hero_same_left_media_file; ?>" alt="">
    </div>
    <div id="slider" class="bg-overlay-hero-same">
        <?php if (!empty($hero_same_slider_data['images'])):
            foreach ($hero_same_slider_data['images'] as $image_url): ?>
                <div class="slide" style="height: <?php echo empty($slider_height) ? '100%' : $slider_height; ?>;">
                    <img class="slide-hero-img" src="<?php echo esc_url($image_url); ?>" alt="Hero Image" >
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="slider-content">
            <?php if (!empty($hero_same_slider_data['heading'])): ?>
                <h1 class="content-heading">
                    <?php echo esc_html($hero_same_slider_data['heading']); ?>
                </h1>
            <?php endif; ?>

            <?php if (!empty($hero_same_slider_data['subheading'])): ?>
                <p class="content-subheading">
                    <?php echo esc_html($hero_same_slider_data['subheading']); ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($hero_same_slider_data['button_text']) && !empty($hero_same_slider_data['button_link'])): ?>
                <a href="<?php echo esc_url($hero_same_slider_data['button_link']); ?>" class="hero-button" target="<?php echo empty($button_target) ? '_self' : $button_target; ?>">
                    <?php echo esc_html($hero_same_slider_data['button_text']); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <div id="arrow-right" class="arrow-right">
        <img src="<?php echo empty($hero_same_right_media_file) ? SLIDER_BIN_URL . '/assets/icon/arrow-right.png' : $hero_same_right_media_file; ?>" alt="">
    </div>
    <div class="pagination">
        <?php if (!empty($hero_same_slider_data['images'])):
            foreach ($hero_same_slider_data['images'] as $index => $image_url): ?>
                <span class="dot" onclick="currentSlide(<?php echo $index + 1; ?>)"></span>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>




