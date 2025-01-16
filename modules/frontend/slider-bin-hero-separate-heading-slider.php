<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    // Get hero separate slider specific settings
        $hero_separate_options = get_option('slider_bin_hero_separate_settings');

        // Slider style related options with fallbacks
        $slider_width = isset($hero_separate_options['hero_separate_slider_width']) ? esc_attr($hero_separate_options['hero_separate_slider_width']) : '100%';
        $slider_height = isset($hero_separate_options['hero_separate_slider_height']) ? esc_attr($hero_separate_options['hero_separate_slider_height']) : '700px';

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
        $content_position_top = isset($hero_separate_options['hero_separate_content_position_top']) ? esc_attr($hero_separate_options['hero_separate_content_position_top']) : '50%';
        $content_position_left = isset($hero_separate_options['hero_separate_content_position_left']) ? esc_attr($hero_separate_options['hero_separate_content_position_left']) : '50%';
        $content_position_right = isset($hero_separate_options['hero_separate_content_position_right']) ? esc_attr($hero_separate_options['hero_separate_content_position_right']) : '50%';
        $content_position_bottom = isset($hero_separate_options['hero_separate_content_position_bottom']) ? esc_attr($hero_separate_options['hero_separate_content_position_bottom']) : 'auto';
        $content_alignment = isset($hero_separate_options['hero_separate_content_alignment']) ? esc_attr($hero_separate_options['hero_separate_content_alignment']) : 'center';
        $content_padding = isset($hero_separate_options['hero_separate_content_padding']) ? esc_attr($hero_separate_options['hero_separate_content_padding']) : '20px';
        $content_margin = isset($hero_separate_options['hero_separate_content_margin']) ? esc_attr($hero_separate_options['hero_separate_content_margin']) : '0 auto';

        /**
         * Heading settings
         */
        $heading_font_family = isset($hero_separate_options['hero_separate_heading_font_family']) ? esc_attr($hero_separate_options['hero_separate_heading_font_family']) : 'Arial, sans-serif';
        $heading_font_size = isset($hero_separate_options['hero_separate_heading_font_size']) ? esc_attr($hero_separate_options['hero_separate_heading_font_size']) : '34px';
        $heading_font_weight = isset($hero_separate_options['hero_separate_heading_font_weight']) ? esc_attr($hero_separate_options['hero_separate_heading_font_weight']) : '700';
        $heading_text_align = isset($hero_separate_options['hero_separate_heading_text_align']) ? esc_attr($hero_separate_options['hero_separate_heading_text_align']) : 'center';
        $heading_line_height = isset($hero_separate_options['hero_separate_heading_line_height']) ? esc_attr($hero_separate_options['hero_separate_heading_line_height']) : '1.5';
        $heading_color = isset($hero_separate_options['hero_separate_heading_color']) ? esc_attr($hero_separate_options['hero_separate_heading_color']) : '#ffffff';
        $heading_margin = isset($hero_separate_options['hero_separate_heading_margin']) ? esc_attr($hero_separate_options['hero_separate_heading_margin']) : '0 0 10px 0';
        $heading_padding = isset($hero_separate_options['hero_separate_heading_padding']) ? esc_attr($hero_separate_options['hero_separate_heading_padding']) : '0 0 10px 0';

        /**
         * Subheading settings
         */
        $subheading_font_size = isset($hero_separate_options['hero_separate_subheading_font_size']) ? esc_attr($hero_separate_options['hero_separate_subheading_font_size']) : '18px';
        $subheading_font_weight = isset($hero_separate_options['hero_separate_subheading_font_weight']) ? esc_attr($hero_separate_options['hero_separate_subheading_font_weight']) : '400';
        $subheading_line_height = isset($hero_separate_options['hero_separate_subheading_line_height']) ? esc_attr($hero_separate_options['hero_separate_subheading_line_height']) : '1.5';
        $subheading_color = isset($hero_separate_options['hero_separate_subheading_color']) ? esc_attr($hero_separate_options['hero_separate_subheading_color']) : '#ffffff';
        $hero_separate_subheading_text_align = isset($hero_separate_options['hero_separate_subheading_text_align']) ? esc_attr($hero_separate_options['hero_separate_subheading_text_align']) : 'center';
        $subheading_margin = isset($hero_separate_options['hero_separate_subheading_margin']) ? esc_attr($hero_separate_options['hero_separate_subheading_margin']) : '0 0 10px 0';
        $subheading_padding = isset($hero_separate_options['hero_separate_subheading_padding']) ? esc_attr($hero_separate_options['hero_separate_subheading_padding']) : '0 0 10px 0';

    /**
         * Arrow settings
         */
        $hero_separate_left_media_file = isset($hero_separate_options['hero_separate_left_media_file']) ? esc_attr($hero_separate_options['hero_separate_left_media_file']) : '/wp-content/plugins/slider-bin/assets/icon/Arrow-Left.svg';
        $hero_separate_right_media_file = isset($hero_separate_options['hero_separate_right_media_file']) ? esc_attr($hero_separate_options['hero_separate_right_media_file']) : '/wp-content/plugins/slider-bin/assets/icon/Arrow-Right.svg';

        $hero_separate_left_arrow_position_left = isset($hero_separate_options['hero_separate_left_arrow_position_left']) ? esc_attr($hero_separate_options['hero_separate_left_arrow_position_left']) : '0';
        $hero_separate_left_arrow_position_top = isset($hero_separate_options['hero_separate_left_arrow_position_top']) ? esc_attr($hero_separate_options['hero_separate_left_arrow_position_top']) : '50%';
        $hero_separate_left_arrow_position_right = isset($hero_separate_options['hero_separate_left_arrow_position_right']) ? esc_attr($hero_separate_options['hero_separate_left_arrow_position_right']) : 'auto';
        $hero_separate_left_arrow_position_bottom = isset($hero_separate_options['hero_separate_left_arrow_position_bottom']) ? esc_attr($hero_separate_options['hero_separate_left_arrow_position_bottom']) : 'auto';
        $hero_separate_left_arrow_color = isset($hero_separate_options['hero_separate_left_arrow_color']) ? esc_attr($hero_separate_options['hero_separate_left_arrow_color']) : '#ffffff';
        $hero_separate_left_arrow_opacity = isset($hero_separate_options['hero_separate_left_arrow_opacity']) ? esc_attr($hero_separate_options['hero_separate_left_arrow_opacity']) : '1';
        $hero_separate_left_arrow_height = isset($hero_separate_options['hero_separate_left_arrow_height']) ? esc_attr($hero_separate_options['hero_separate_left_arrow_height']) : '40px';
        $hero_separate_left_arrow_width = isset($hero_separate_options['hero_separate_left_arrow_width']) ? esc_attr($hero_separate_options['hero_separate_left_arrow_width']) : '40px';
        $hero_separate_right_arrow_position_left = isset($hero_separate_options['hero_separate_right_arrow_position_left']) ? esc_attr($hero_separate_options['hero_separate_right_arrow_position_left']) : 'auto';
        $hero_separate_right_arrow_position_top = isset($hero_separate_options['hero_separate_right_arrow_position_top']) ? esc_attr($hero_separate_options['hero_separate_right_arrow_position_top']) : '50%';
        $hero_separate_right_arrow_position_right = isset($hero_separate_options['hero_separate_right_arrow_position_right']) ? esc_attr($hero_separate_options['hero_separate_right_arrow_position_right']) : '0';
        $hero_separate_right_arrow_position_bottom = isset($hero_separate_options['hero_separate_right_arrow_position_bottom']) ? esc_attr($hero_separate_options['hero_separate_right_arrow_position_bottom']) : 'auto';
        $hero_separate_right_arrow_color = isset($hero_separate_options['hero_separate_right_arrow_color']) ? esc_attr($hero_separate_options['hero_separate_right_arrow_color']) : '#ffffff';
        $hero_separate_right_arrow_opacity = isset($hero_separate_options['hero_separate_right_arrow_opacity']) ? esc_attr($hero_separate_options['hero_separate_right_arrow_opacity']) : '1';
        $hero_separate_right_arrow_height = isset($hero_separate_options['hero_separate_right_arrow_height']) ? esc_attr($hero_separate_options['hero_separate_right_arrow_height']) : '40px';
        $hero_separate_right_arrow_width = isset($hero_separate_options['hero_separate_right_arrow_width']) ? esc_attr($hero_separate_options['hero_separate_right_arrow_width']) : '40px';

        /**
         * Button settings
         */
        // $button_width = isset($hero_separate_options['hero_separate_button_width']) ? esc_attr($hero_separate_options['hero_separate_button_width']) : '200px';
        $button_padding = isset($hero_separate_options['hero_separate_button_padding']) ? esc_attr($hero_separate_options['hero_separate_button_padding']) : '10px 35px';
        $button_font_size = isset($hero_separate_options['hero_separate_button_font_size']) ? esc_attr($hero_separate_options['hero_separate_button_font_size']) : '16px';
        $button_color = isset($hero_separate_options['hero_separate_button_color']) ? esc_attr($hero_separate_options['hero_separate_button_color']) : '#ffffff';
        $button_bg_color = isset($hero_separate_options['hero_separate_button_bg_color']) ? esc_attr($hero_separate_options['hero_separate_button_bg_color']) : '#000';
        $button_border_color = isset($hero_separate_options['hero_separate_button_border_color']) ? esc_attr($hero_separate_options['hero_separate_button_border_color']) : '#000';
        $button_border_width = isset($hero_separate_options['hero_separate_button_border_width']) ? esc_attr($hero_separate_options['hero_separate_button_border_width']) : '1px';
        $button_border_style = isset($hero_separate_options['hero_separate_button_border_style']) ? esc_attr($hero_separate_options['hero_separate_button_border_style']) : 'solid';
        $button_border_radius = isset($hero_separate_options['hero_separate_button_border_radius']) ? esc_attr($hero_separate_options['hero_separate_button_border_radius']) : '5px';
        $button_box_shadow = isset($hero_separate_options['hero_separate_button_box_shadow']) ? esc_attr($hero_separate_options['hero_separate_button_box_shadow']) : 'none';
        $button_text_align = isset($hero_separate_options['hero_separate_button_text_align']) ? esc_attr($hero_separate_options['hero_separate_button_text_align']) : 'center';
        $button_text_decoration = isset($hero_separate_options['hero_separate_button_text_decoration']) ? esc_attr($hero_separate_options['hero_separate_button_text_decoration']) : 'none';
        $button_font_family = isset($hero_separate_options['hero_separate_button_font_family']) ? esc_attr($hero_separate_options['hero_separate_button_font_family']) : 'Arial, sans-serif';
        $button_font_weight = isset($hero_separate_options['hero_separate_button_font_weight']) ? esc_attr($hero_separate_options['hero_separate_button_font_weight']) : '400';
        $button_target = isset($hero_separate_options['hero_separate_button_target']) ? esc_attr($hero_separate_options['hero_separate_button_target']) : '_self';

        $pagination_height          =isset($hero_separate_options['hero_separate_pagination_height']) ?esc_attr($hero_separate_options['hero_separate_pagination_height']) : '15px';
        $pagination_width           =isset($hero_separate_options['hero_separate_pagination_width']) ?esc_attr($hero_separate_options['hero_separate_pagination_width']) : '15px';
        $pagination_gap             =isset($hero_separate_options['hero_separate_pagination_gap']) ?esc_attr($hero_separate_options['hero_separate_pagination_gap']) : '5px';
        $pagination_color           =isset($hero_separate_options['hero_separate_pagination_color']) ?esc_attr($hero_separate_options['hero_separate_pagination_color']) : '#8E1616';
        $pagination_active_color    =isset($hero_separate_options['hero_separate_pagination_active_color']) ?esc_attr($hero_separate_options['hero_separate_pagination_active_color']) : '#D84040';


?>
<style>
    .bg-overlay-hero-separate::before {
        background-color: <?php echo $bg_overlay_color; ?> !important;
        opacity: <?php echo $bg_overlay_opacity; ?> !important;
    }
    .dot.active {
        background-color:<?php echo !empty($pagination_active_color) ? $pagination_active_color : '#D84040'; ?> !important;
    }

</style>
<div id="<?php echo esc_attr($unique_id); ?>" class="slider-wrapper hero-separate-wrapper"style="width: <?php echo empty($slider_width) ? '100%' : $slider_width; ?>;" >
    <div id="arrow-left" class="arrow-left" style="
        width: <?php echo empty($hero_separate_left_arrow_width) ? '40px' : $hero_separate_left_arrow_width; ?>;
        height: <?php echo empty($hero_separate_left_arrow_height) ? '40px' : $hero_separate_left_arrow_height; ?>;
        left: <?php echo empty($hero_separate_left_arrow_position_left) ? '0' : $hero_separate_left_arrow_position_left; ?>;
        top: <?php echo empty($hero_separate_left_arrow_position_top) ? '50%' : $hero_separate_left_arrow_position_top; ?>;
        right: <?php echo empty($hero_separate_left_arrow_position_right) ? 'auto' : $hero_separate_left_arrow_position_right; ?>;
        bottom: <?php echo empty($hero_separate_left_arrow_position_bottom) ? 'auto' : $hero_separate_left_arrow_position_bottom; ?>;">
        <img src="<?php echo empty($hero_separate_left_media_file) ? '' : $hero_separate_left_media_file; ?>" alt="">
    </div>
    <div id="slider" class="bg-overlay-hero-separate">
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

        <div class="slide" style="width:auto; background-image: url('<?php if ($image) { echo esc_url($image);} elseif ($image_url) { echo esc_url($image_url);} ?>'); height: <?php echo $slider_height; ?>; background-size: <?php echo $bg_image_size; ?>; background-position: <?php echo $bg_image_position; ?>;">
            <div class="slide-content" style="
                                            height: fit-content;
                                            width: 100%;
                                            padding: <?php echo empty($content_padding) ? '10px' : $content_padding; ?>;
                                            margin: <?php echo empty($content_margin) ? '0 auto' : $content_margin; ?>;
                                            text-align: <?php echo empty($content_alignment) ? 'center' : $content_alignment; ?>;
                                            top: <?php echo empty($content_position_top) ? '50%' : $content_position_top; ?>;
                                            left: <?php echo empty($content_position_left) ? 'auto' : $content_position_left; ?>;
                                            right: <?php echo empty($content_position_right) ? 'auto' : $content_position_right; ?>;
                                            bottom: <?php echo empty($content_position_bottom) ? 'auto' : $content_position_bottom; ?>;">
                <?php if ($heading) { ?>
                    <h1 style="
                            font-family: <?php echo empty($heading_font_family) ? 'Arial, sans-serif' : $heading_font_family; ?>;
                            font-size: <?php echo empty($heading_font_size) ? '34px' : $heading_font_size; ?>;
                            font-weight: <?php echo empty($heading_font_weight) ? 'normal' : $heading_font_weight; ?>;
                            line-height: <?php echo empty($heading_line_height) ? '1.5' : $heading_line_height; ?>;
                            color: <?php echo empty($heading_color) ? '#fff' : $heading_color; ?>;
                            margin: <?php echo empty($heading_margin) ? '0 0 10px 0' : $heading_margin; ?>;
                            padding: <?php echo empty($heading_padding) ? '0 0 10px 0' : $heading_padding; ?>;">
                        <?php echo $heading; ?>

                    </h1>
                <?php } ?>
                <?php if ($subheading) { ?>
                    <p style="
                            font-family: <?php echo empty($subheading_font_family) ? 'Arial, sans-serif' : $subheading_font_family; ?>;
                            font-size: <?php echo empty($subheading_font_size) ? '22px' : $subheading_font_size; ?>;
                            font-weight: <?php echo empty($subheading_font_weight) ? 'normal' : $subheading_font_weight; ?>;
                            line-height: <?php echo empty($subheading_line_height) ? '1.5' : $subheading_line_height; ?>;
                            color: <?php echo empty($subheading_color) ? '#fff' : $subheading_color; ?>;
                            margin: <?php echo empty($subheading_margin) ? '0 0 10px 0' : $subheading_margin; ?>;
                            padding: <?php echo empty($subheading_padding) ? '0 0 10px 0' : $subheading_padding; ?>;">
                        <?php echo $subheading; ?>
                    </p>
                <?php } ?>
                <?php if ($button_text && $button_link) { ?>
                    <a
                        class="hero-button"
                        target="<?php echo empty($button_target) ? '_self' : $button_target; ?>"
                        href="<?php echo $button_link; ?>"
                        style="
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
                        <?php echo $button_text; ?>
                    </a>
                <?php } ?>
            </div>
        </div>

        <?php } ?>
    </div>
    <div id="arrow-right" class="arrow-right" style="
        width: <?php echo empty($hero_separate_right_arrow_width) ? '40px' : $hero_separate_right_arrow_width; ?>;
        height: <?php echo empty($hero_separate_right_arrow_height) ? '40px' : $hero_separate_right_arrow_height; ?>;
        left: <?php echo empty($hero_separate_right_arrow_position_left) ? 'auto' : $hero_separate_right_arrow_position_left; ?>;
        top: <?php echo empty($hero_sseparateright_arrow_position_top) ? '50%' : $hero_sseparateright_arrow_position_top; ?>;
        right: <?php echo empty($hero_separate_right_arrow_position_right) ? '0' : $hero_separate_right_arrow_position_right; ?>;
        bottom: <?php echo empty($hero_separate_right_arrow_position_bottom) ? 'auto' : $hero_separate_right_arrow_position_bottom; ?>;
        opacity: <?php echo empty($hero_separate_right_arrow_opacity) ? '1' : $hero_separate_right_arrow_opacity; ?>;">
        <img src="<?php echo empty($hero_separate_right_media_file) ? '' : $hero_separate_right_media_file; ?>" alt="">
    </div>
    <div class="pagination">
    <?php if (!empty($hero_separate_slider_data)): ?>
        <?php foreach ($hero_separate_slider_data as $index => $image_url): ?>
            <span class="dot" style="height: <?php echo !empty($pagination_height) ? $pagination_height : '15px'; ?>;
                                         width: <?php echo !empty($pagination_width) ? $pagination_width : '15px'; ?>;
                                         margin-left:<?php echo !empty($pagination_gap) ? $pagination_gap : '5px'; ?>;
                                         background-color: <?php echo !empty($pagination_color) ? $pagination_color : '#8E1616'; ?>;" onclick="currentSlide(<?php echo $index + 1; ?>)"></span>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
</div>