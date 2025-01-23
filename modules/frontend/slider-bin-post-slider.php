<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    $post_slider_options = get_option('slider_bin_post_slider_settings');
    // Slider style related options with fallbacks
    $slider_width = isset($post_slider_options['post_slider_width']) ? esc_attr($post_slider_options['post_slider_width']) : '100%';
    $slider_height = isset($post_slider_options['post_slider_height']) ? esc_attr($post_slider_options['post_slider_height']) : '700px';

    /**
     * Background settings
     */
    $bg_image_position = isset($post_slider_options['post_slider_bg_image_position']) ? esc_attr($post_slider_options['post_slider_bg_image_position']) : 'center center';
    $bg_image_size = isset($post_slider_options['post_slider_bg_image_size']) ? esc_attr($post_slider_options['post_slider_bg_image_size']) : 'cover';
    $bg_overlay = isset($post_slider_options['post_slider_bg_overlay']) ? esc_attr($post_slider_options['post_slider_bg_overlay']) : 'true';
    $bg_overlay_color = isset($post_slider_options['post_slider_bg_overlay_color']) ? esc_attr($post_slider_options['post_slider_bg_overlay_color']) : '#000000';
    $bg_overlay_opacity = isset($post_slider_options['post_slider_bg_overlay_opacity']) ? esc_attr($post_slider_options['post_slider_bg_overlay_opacity']) : '0.6';

    /**
     * Content settings
     */

    $post_slider_content_position = isset($post_slider_options['post_slider_content_position']) ? esc_attr($post_slider_options['post_slider_content_position']) : array();

    $post_slider_content_position_top = isset($post_slider_content_position['post_slider_content_position_top']) ? esc_attr($post_slider_content_position['post_slider_content_position_top']) : '50%';
    $post_slider_content_position_left = isset($post_slider_content_position['post_slider_content_position_left']) ? esc_attr($post_slider_content_position['post_slider_content_position_left']) : 'auto';
    $post_slider_content_position_right = isset($post_slider_content_position['post_slider_content_position_right']) ? esc_attr($post_slider_content_position['post_slider_content_position_right']) : 'auto';
    $post_slider_content_position_bottom = isset($post_slider_content_position['post_slider_content_position_bottom']) ? esc_attr($post_slider_content_position['post_slider_content_position_bottom']) : 'auto';


    $post_slider_content_padding = isset($post_slider_options['post_slider_content_padding']) ? esc_attr($post_slider_options['post_slider_content_padding']) : array();

    $content_padding_left = isset($post_slider_content_padding['post_slider_content_padding_left']) ? esc_attr($post_slider_content_padding['post_slider_content_padding_left']) : '20px';
    $content_padding_top = isset($post_slider_content_padding['post_slider_content_padding_top']) ? esc_attr($post_slider_content_padding['post_slider_content_padding_top']) : '0';
    $content_padding_right = isset($post_slider_content_padding['post_slider_content_padding_right']) ? esc_attr($post_slider_content_padding['post_slider_content_padding_right']) : '20px';
    $content_padding_bottom = isset($post_slider_content_padding['post_slider_content_padding_bottom']) ? esc_attr($post_slider_content_padding['post_slider_content_padding_bottom']) : '0';

    $post_slider_content_margin = isset($post_slider_options['post_slider_content_margin']) ? esc_attr($post_slider_options['post_slider_content_margin']) : array();

    $content_margin_left    = isset($post_slider_content_margin['post_slider_content_margin_left']) ? esc_attr($post_slider_content_margin['post_slider_content_margin_left']) : '0';
    $content_margin_top     = isset($post_slider_content_margin['post_slider_content_margin_top']) ? esc_attr($post_slider_content_margin['post_slider_content_margin_top']) : '0';
    $content_margin_right   = isset($post_slider_content_margin['post_slider_content_margin_right']) ? esc_attr($post_slider_content_margin['post_slider_content_margin_right']) : '0';
    $content_margin_bottom  = isset($post_slider_content_margin['post_slider_content_margin_bottom']) ? esc_attr($post_slider_content_margin['post_slider_content_margin_bottom']) : '0';


    $content_alignment = isset($post_slider_options['post_slider_content_alignment']) ? esc_attr($post_slider_options['post_slider_content_alignment']) : 'center';

    /**
     * Heading settings
     */
    $heading_font_family = isset($post_slider_options['post_slider_heading_font_family']) ? esc_attr($post_slider_options['post_slider_heading_font_family']) : 'Arial, sans-serif';
    $heading_font_size = isset($post_slider_options['post_slider_heading_font_size']) ? esc_attr($post_slider_options['post_slider_heading_font_size']) : '32px';
    $heading_font_weight = isset($post_slider_options['post_slider_heading_font_weight']) ? esc_attr($post_slider_options['post_slider_heading_font_weight']) : '700';
    $heading_line_height = isset($post_slider_options['post_slider_heading_line_height']) ? esc_attr($post_slider_options['post_slider_heading_line_height']) : '1.5';
    $heading_color = isset($post_slider_options['post_slider_heading_color']) ? esc_attr($post_slider_options['post_slider_heading_color']) : '#ffffff';

    $heading_margin = isset($post_slider_options['post_slider_heading_margin']) ? esc_attr($hero_same_options['post_slider_heading_margin']) : array();

    $heading_margin_left    = isset($heading_margin['post_slider_heading_margin_left']) ? esc_attr($heading_margin['post_slider_heading_margin_left']) : '0';
    $heading_margin_top     = isset($heading_margin['post_slider_heading_margin_top']) ? esc_attr($heading_margin['post_slider_heading_margin_top']) : '0';
    $heading_margin_right   = isset($heading_margin['post_slider_heading_margin_right']) ? esc_attr($heading_margin['post_slider_heading_margin_right']) : '0';
    $heading_margin_bottom  = isset($heading_margin['post_slider_heading_margin_bottom']) ? esc_attr($heading_margin['post_slider_heading_margin_bottom']) : '10px';

    $heading_padding = isset($post_slider_options['post_slider_heading_padding']) ? esc_attr($post_slider_options['post_slider_heading_padding']) : array();

    $heading_padding_left    = isset($heading_padding['post_slider_heading_padding_left']) ? esc_attr($heading_padding['post_slider_heading_padding_left']) : '0';
    $heading_padding_top     = isset($heading_padding['post_slider_heading_padding_top']) ? esc_attr($heading_padding['post_slider_heading_padding_top']) : '0';
    $heading_padding_right   = isset($heading_padding['post_slider_heading_padding_right']) ? esc_attr($heading_padding['post_slider_heading_padding_right']) : '0';
    $heading_padding_bottom  = isset($heading_padding['post_slider_heading_padding_bottom']) ? esc_attr($heading_padding['post_slider_heading_padding_bottom']) : '10px';


    /**
     * Subheading / Excerpt settings
     */
    $excerpt_font_family = isset($post_slider_options['post_slider_subheading_font_family']) ? esc_attr($post_slider_options['post_slider_subheading_font_family']) : 'Arial, sans-serif';
    $excerpt_font_size = isset($post_slider_options['post_slider_subheading_font_size']) ? esc_attr($post_slider_options['post_slider_subheading_font_size']) : '18px';
    $excerpt_font_weight = isset($post_slider_options['post_slider_subheading_font_weight']) ? esc_attr($post_slider_options['post_slider_subheading_font_weight']) : '400';
    $excerpt_line_height = isset($post_slider_options['post_slider_subheading_line_height']) ? esc_attr($post_slider_options['post_slider_subheading_line_height']) : '1.5';
    $excerpt_color = isset($post_slider_options['post_slider_subheading_color']) ? esc_attr($post_slider_options['post_slider_subheading_color']) : '#ffffff';

    $excerpt_margin = isset($post_slider_options['post_slider_subheading_margin']) ? esc_attr($post_slider_options['post_slider_subheading_margin']) : '0 0 10px 0';
    $excerpt_padding = isset($post_slider_options['post_slider_subheading_padding']) ? esc_attr($post_slider_options['post_slider_subheading_padding']) : '0 0 10px 0';

    $subheading_margin = isset($post_slider_options['post_slider_subheading_margin']) ? esc_attr($post_slider_options['post_slider_subheading_margin']) : array();

    $excerpt_margin_left    = isset($subheading_margin['post_slider_subheading_margin_left']) ? esc_attr($subheading_margin['post_slider_subheading_margin_left']) : '0';
    $excerpt_margin_top     = isset($subheading_margin['post_slider_subheading_margin_top']) ? esc_attr($subheading_margin['post_slider_subheading_margin_top']) : '0';
    $excerpt_margin_right   = isset($subheading_margin['post_slider_subheading_margin_right']) ? esc_attr($subheading_margin['post_slider_subheading_margin_right']) : '0';
    $excerpt_margin_bottom  = isset($subheading_margin['post_slider_subheading_margin_bottom']) ? esc_attr($subheading_margin['post_slider_subheading_margin_bottom']) : '10px';


    $subheading_padding = isset($post_slider_options['post_slider_subheading_padding']) ? esc_attr($post_slider_options['post_slider_subheading_padding']) : array();

    $excerpt_padding_left    = isset($subheading_padding['post_slider_subheading_padding_left']) ? esc_attr($subheading_padding['post_slider_subheading_padding_left']) : '0';
    $excerpt_padding_top     = isset($subheading_padding['post_slider_subheading_padding_top']) ? esc_attr($subheading_padding['post_slider_subheading_padding_top']) : '0';
    $excerpt_padding_right   = isset($subheading_padding['post_slider_subheading_padding_right']) ? esc_attr($subheading_padding['post_slider_subheading_padding_right']) : '0';
    $excerpt_padding_bottom  = isset($subheading_padding['post_slider_subheading_padding_bottom']) ? esc_attr($subheading_padding['post_slider_subheading_padding_bottom']) : '10px';


    /**
     * Button settings
     */
    $button_font_family = isset($post_slider_options['post_slider_button_font_family']) ? esc_attr($post_slider_options['post_slider_button_font_family']) : 'Arial, sans-serif';
    $button_font_weight = isset($post_slider_options['post_slider_button_font_weight']) ? esc_attr($post_slider_options['post_slider_button_font_weight']) : '400';
    $button_font_size = isset($post_slider_options['post_slider_button_font_size']) ? esc_attr($post_slider_options['post_slider_button_font_size']) : '16px';
    $button_color = isset($post_slider_options['post_slider_button_color']) ? esc_attr($post_slider_options['post_slider_button_color']) : '#ffffff';


    $button_bg_color = isset($post_slider_options['post_slider_button_bg_color']) ? esc_attr($post_slider_options['post_slider_button_bg_color']) : '#ff5733';
    $button_border_color = isset($post_slider_options['post_slider_button_border_color']) ? esc_attr($post_slider_options['post_slider_button_border_color']) : '#ff5733';
    $button_border_width = isset($post_slider_options['post_slider_button_border_width']) ? esc_attr($post_slider_options['post_slider_button_border_width']) : '1px';
    $button_border_style = isset($post_slider_options['post_slider_button_border_style']) ? esc_attr($post_slider_options['post_slider_button_border_style']) : 'solid';
    $button_border_radius = isset($post_slider_options['post_slider_button_border_radius']) ? esc_attr($post_slider_options['post_slider_button_border_radius']) : '5px';
    $button_box_shadow = isset($post_slider_options['post_slider_button_box_shadow']) ? esc_attr($post_slider_options['post_slider_button_box_shadow']) : 'none';
    $button_text_align = isset($post_slider_options['post_slider_button_text_align']) ? esc_attr($post_slider_options['post_slider_button_text_align']) : 'center';
    $button_text_decoration = isset($post_slider_options['post_slider_button_text_decoration']) ? esc_attr($post_slider_options['post_slider_button_text_decoration']) : 'none';
    $button_target = isset($post_slider_options['post_slider_button_target']) ? esc_attr($post_slider_options['post_slider_button_target']) : '_self';

    $button_padding              = isset($post_slider_options['post_slider_button_padding']) ? esc_attr($post_slider_options['post_slider_button_padding']) : array();

    $button_padding_left         = isset($button_padding['post_slider_button_padding_left']) ? esc_attr($button_padding['post_slider_button_padding_left']) : '35px';
    $button_padding_top          = isset($button_padding['post_slider_button_padding_top']) ? esc_attr($button_padding['post_slider_button_padding_top']) : '15px';
    $button_padding_right        = isset($button_padding['post_slider_button_padding_right']) ? esc_attr($button_padding['post_slider_button_padding_right']) : '35px';
    $button_padding_bottom       = isset($button_padding['post_slider_button_padding_bottom']) ? esc_attr($button_padding['post_slider_button_padding_bottom']) : '15px';


    $button_margin               = isset($post_slider_options['post_slider_button_margin']) ? esc_attr($post_slider_options['post_slider_button_margin']) : array();
    $button_margin_left          = isset($button_margin['post_slider_button_margin_left']) ? esc_attr($button_margin['post_slider_button_margin_left']) : 'auto';
    $button_margin_top           = isset($button_margin['post_slider_button_margin_top']) ? esc_attr($button_margin['post_slider_button_margin_top']) : '30px';
    $button_margin_right         = isset($button_margin['post_slider_button_margin_right']) ? esc_attr($button_margin['post_slider_button_margin_right']) : 'auto';
    $button_margin_bottom        = isset($button_margin['post_slider_button_margin_bottom']) ? esc_attr($button_margin['post_slider_button_margin_bottom']) : '0';


    /**
     * Arrow settings
     */
    $post_slider_left_media_file = isset($post_slider_options['post_slider_left_media_file']) ? esc_attr($post_slider_options['post_slider_left_media_file']) : SLIDER_BIN_URL . '/assets/icon/arrow-left.png';
    $post_slider_right_media_file = isset($post_slider_options['post_slider_right_media_file']) ? esc_attr($post_slider_options['post_slider_right_media_file']) : SLIDER_BIN_URL . '/assets/icon/arrow-right.png';

    $post_slider_arrow_position = isset($post_slider_options['post_slider_arrow_position']) ? esc_attr($post_slider_options['post_slider_arrow_position']) : array();

    $post_slider_arrow_position_left = isset($post_slider_arrow_position['post_slider_arrow_position_left']) ? esc_attr($post_slider_arrow_position['post_slider_arrow_position_left']) : '0';
    $post_slider_arrow_position_top = isset($post_slider_arrow_position['post_slider_arrow_position_top']) ? esc_attr($post_slider_arrow_position['post_slider_arrow_position_top']) : '50%';
    $post_slider_arrow_position_right = isset($post_slider_arrow_position['post_slider_arrow_position_right']) ? esc_attr($post_slider_arrow_position['post_slider_arrow_position_right']) : '0';
    $post_slider_arrow_position_bottom = isset($post_slider_arrow_position['post_slider_arrow_position_bottom']) ? esc_attr($post_slider_arrow_position['post_slider_arrow_position_bottom']) : 'auto';

    $post_slider_arrow_color = isset($post_slider_options['post_slider_right_arrow_color']) ? esc_attr($post_slider_options['post_slider_right_arrow_color']) : '#ffffff';
    $post_slider_arrow_opacity = isset($post_slider_options['post_slider_right_arrow_opacity']) ? esc_attr($post_slider_options['post_slider_right_arrow_opacity']) : '1';
    $post_slider_arrow_height = isset($post_slider_options['post_slider_right_arrow_height']) ? esc_attr($post_slider_options['post_slider_right_arrow_height']) : '40px';
    $post_slider_arrow_width = isset($post_slider_options['post_slider_right_arrow_width']) ? esc_attr($post_slider_options['post_slider_right_arrow_width']) : '40px';

    $pagination_height          =isset($post_slider_options['post_slider_pagination_height']) ?esc_attr($post_slider_options['post_slider_pagination_height']) : '15px';
    $pagination_width           =isset($post_slider_options['post_slider_pagination_width']) ?esc_attr($post_slider_options['post_slider_pagination_width']) : '15px';
    $pagination_gap             =isset($post_slider_options['post_slider_pagination_gap']) ?esc_attr($post_slider_options['post_slider_pagination_gap']) : '5px';
    $pagination_color           =isset($post_slider_options['post_slider_pagination_color']) ?esc_attr($post_slider_options['post_slider_pagination_color']) : '#8E1616';
    $pagination_active_color    =isset($post_slider_options['post_slider_pagination_active_color']) ?esc_attr($post_slider_options['post_slider_pagination_active_color']) : '#D84040';

?>


<style>
    .bg-overlay-post::before {
        background-color: <?php echo !empty($bg_overlay_color) ? $bg_overlay_color : '#000000'; ?> !important;
        opacity: <?php echo !empty($bg_overlay_opacity) ? $bg_overlay_opacity : '0.5'; ?> !important;
    }

    .arrow-left {
        width: <?php echo empty($post_slider_arrow_width) ? '40px' : $post_slider_arrow_width; ?>!important;
        height: <?php echo empty($post_slider_arrow_height) ? '40px' : $post_slider_arrow_height; ?>!important;
        left: <?php echo empty($post_slider_arrow_position_left) ? '0' : $post_slider_arrow_position_left; ?>!important;
        top: <?php echo empty($post_slider_arrow_position_top) ? '50%' : $post_slider_arrow_position_top; ?>!important;
        opacity: <?php echo empty($post_slider_arrow_opacity) ? '1' : $post_slider_arrow_opacity; ?>!important;
    }

    .post-slider .slide {

        background-size: <?php echo $bg_image_size; ?>!important;
        background-position: <?php echo $bg_image_position; ?>!important;
        background-repeat: no-repeat!important;

    }

    .slide-content {
        width:100%!important;
        height: fit-!contentimportant;
        top: <?php echo empty($post_slider_content_position_top) ? '50%' : $post_slider_content_position_top; ?>!important;
        left: <?php echo empty($post_slider_content_position_left) ? 'auto' : $post_slider_content_position_top; ?>!important;
        right: <?php echo empty($post_slider_content_position_right) ? 'auto' : $post_slider_content_position_right; ?>!important;
        bottom: <?php echo empty($post_slider_content_position_bottom) ? 'auto' : $post_slider_content_position_bottom; ?>!important;
        align-items: <?php echo empty($content_alignment) ? 'center' : $content_alignment; ?>!important;
        padding-left: <?php echo empty($content_padding_left) ? '10px' : $content_padding_left; ?>!important;
        padding-top: <?php echo empty($content_padding_top) ? '10px' : $content_padding_left; ?>!important;
        padding-right: <?php echo empty($content_padding_right) ? '10px' : $content_padding_left; ?>!important;
        padding-bottom: <?php echo empty($content_padding_bottom) ? '10px' : $content_padding_left; ?>!important;
        margin-left: <?php echo empty($content_margin_left) ? 'auto' : $content_margin_left; ?>!important;
        margin-top: <?php echo empty($content_margin_top) ? '0' : $content_margin_left; ?>!important;
        margin-right: <?php echo empty($content_margin_right) ? 'auto' : $content_margin_left; ?>!important;
        margin-bottom: <?php echo empty($content_margin_bottom) ? '0' : $content_margin_left; ?>!important;
    }

    .content-heading {
        font-family: <?php echo esc_attr(!empty($heading_font_family) ? $heading_font_family : 'Arial, sans-serif'); ?>!important;
        font-size: <?php echo esc_attr(!empty($heading_font_size) ? $heading_font_size : '34px'); ?>!important;
        font-weight: <?php echo esc_attr(!empty($heading_font_weight) ? $heading_font_weight : 'normal'); ?>!important;
        line-height:   <?php echo esc_attr(!empty($heading_line_height) ? $heading_line_height : '1.5'); ?>!important;
        color:         <?php echo esc_attr(!empty($heading_color) ? $heading_color : '#fff'); ?>!important;
        padding-left:  <?php echo esc_attr(!empty($heading_padding_left) ? $heading_padding_left : '0'); ?>!important;
        padding-top:   <?php echo esc_attr(!empty($heading_padding_top) ? $heading_padding_top : '0'); ?>!important;
        padding-right: <?php echo esc_attr(!empty($heading_padding_right) ? $heading_padding_right : '0'); ?>!important;
        padding-bottom:<?php echo esc_attr(!empty($heading_padding_bottom) ? $heading_padding_bottom : '10px'); ?>!important;
        margin-left:   <?php echo esc_attr(!empty($heading_margin_left) ? $heading_margin_left : 'auto'); ?>!important;
        margin-top:    <?php echo esc_attr(!empty($heading_margin_top) ? $heading_margin_top : '0'); ?>!important;
        margin-right:  <?php echo esc_attr(!empty($heading_margin_right) ? $heading_margin_right : 'auto'); ?>!important;
        margin-bottom: <?php echo esc_attr(!empty($heading_margin_bottom) ? $heading_margin_bottom : '0'); ?>!important;
    }

    .content-excerpt {
        font-family: <?php echo empty($excerpt_font_family) ? 'Arial, sans-serif' : $excerpt_font_family; ?>!important;
        font-size: <?php echo empty($excerpt_font_size) ? '22px' : $excerpt_font_size; ?>!important;
        font-weight: <?php echo empty($excerpt_font_weight) ? 'normal' : $excerpt_font_weight; ?>!important;
        line-height: <?php echo empty($excerpt_line_height) ? '1.5' : $excerpt_line_height; ?>!important;
        color: <?php echo empty($excerpt_color) ? '#fff' : $excerpt_color; ?>!important;
        padding-left:   <?php echo esc_attr(!empty($excerpt_padding_left) ? $excerpt_padding_left : '0'); ?>!important;
        padding-top:    <?php echo esc_attr(!empty($excerpt_padding_top) ? $excerpt_padding_top : '0'); ?>!important;
        padding-right:  <?php echo esc_attr(!empty($excerpt_padding_right) ? $excerpt_padding_right : '0'); ?>!important;
        padding-bottom: <?php echo esc_attr(!empty($excerpt_padding_bottom) ? $excerpt_padding_bottom : '10px'); ?>!important;
        margin-left:    <?php echo esc_attr(!empty($excerpt_margin_left) ? $excerpt_margin_left : 'auto'); ?>!important;
        margin-top:     <?php echo esc_attr(!empty($excerpt_margin_top) ? $excerpt_margin_top : '0'); ?>!important;
        margin-right:   <?php echo esc_attr(!empty($excerpt_margin_right) ? $excerpt_margin_right : 'auto'); ?>!important;
        margin-bottom:  <?php echo esc_attr(!empty($excerpt_margin_bottom) ? $excerpt_margin_bottom : '0'); ?>!important;
    }

    .slider-link {
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
        width: <?php echo empty($post_slider_arrow_width) ? '40px' : $post_slider_arrow_width; ?>!important;
        height: <?php echo empty($post_slider_arrow_height) ? '40px' : $post_slider_arrow_height; ?>!important;
        top: <?php echo empty($post_slider_arrow_position_top) ? '50%' : $post_slider_arrow_position_top; ?>!important;
        right: <?php echo empty($post_slider_arrow_position) ? '0' : $post_slider_arrow_position; ?>!important;
        bottom: <?php echo empty($post_slider_arrow_position_bottom) ? 'auto' : $post_slider_arrow_position_bottom; ?>!important;
        opacity: <?php echo empty($post_slider_arrow_opacity) ? '1' : $post_slider_arrow_opacity; ?>!important;
    }

    .dot {
        height: <?php echo !empty($pagination_height) ? $pagination_height : '15px'; ?>!important;
        width: <?php echo !empty($pagination_width) ? $pagination_width : '15px'; ?>!important;
        margin-left: <?php echo !empty($pagination_gap) ? $pagination_gap : '5px'; ?>!important;
        background-color:   <?php echo !empty($pagination_color) ? $pagination_color : '#8E1616'; ?>!important;
    }
    .dot.active {
        background-color:<?php echo !empty($pagination_active_color) ? $pagination_active_color : '#D84040'; ?> !important;
    }
</style>


<div id="<?php echo esc_attr($unique_id); ?>" class="slider-wrapper post-slider" style="width: <?php echo $slider_width; ?>;">
    <div id="arrow-left" class="arrow-left">
        <img src="<?php echo empty($post_slider_left_media_file) ? SLIDER_BIN_URL . '/assets/icon/arrow-left.png' : $post_slider_left_media_file; ?>" alt="">
    </div>
    <div id="slider" class="bg-overlay-post">
        <?php if (!empty($post_slider_data)) {
            foreach ($post_slider_data as $index => $slide) {
            $image = isset($slide['image']) ? esc_url($slide['image']) : '';
            $heading = isset($slide['heading']) ? esc_html($slide['heading']) : '';
            $subheading = isset($slide['subheading']) ? esc_html($slide['subheading']) : '';
            $permalink = isset($slide['button_link']) ? esc_url($slide['button_link']) : '';
        ?>

        <div class="slide" style="background-image: url('<?php if ($image) { echo $image;} ?>'); height: <?php echo empty($slider_height) ? '700px' : $slider_height; ?>;">
            <div class="slide-content">
                <?php if ($heading) { ?>
                    <h2 class="content-heading"><?php echo $heading; ?></h2>
                <?php } ?>

                <?php if ($subheading) { ?>
                    <p class="content-excerpt"><?php echo $subheading; ?></p>
                <?php } ?>

                <?php if ($permalink) { ?>
                    <a class="slider-link" href="<?php echo $permalink; ?>">Read More</a>
                <?php } ?>
            </div>
        </div>
        <?php }
        } else { ?>
            <p>No slider data available.</p>
        <?php } ?>
    </div>
    <div id="arrow-right" class="arrow-right">
        <img src="<?php echo empty($post_slider_right_media_file) ? SLIDER_BIN_URL . '/assets/icon/arrow-right.png' : $post_slider_right_media_file; ?>" alt="">
    </div>
    <div class="pagination">
        <?php if (!empty($post_slider_data)): ?>
            <?php foreach ($post_slider_data as $index => $post): ?>
                <span class="dot" onclick="currentSlide(<?php echo $index + 1; ?>)"></span>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>