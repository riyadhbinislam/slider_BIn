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
    $content_position_top = isset($post_slider_options['post_slider_content_position_top']) ? esc_attr($post_slider_options['post_slider_content_position_top']) : '50%';
    $content_position_left = isset($post_slider_options['post_slider_content_position_left']) ? esc_attr($post_slider_options['post_slider_content_position_left']) : '50%';
    $content_position_right = isset($post_slider_options['post_slider_content_position_right']) ? esc_attr($post_slider_options['post_slider_content_position_right']) : '50%';
    $content_position_bottom = isset($post_slider_options['post_slider_content_position_bottom']) ? esc_attr($post_slider_options['post_slider_content_position_bottom']) : 'auto';
    $content_padding = isset($post_slider_options['post_slider_content_padding']) ? esc_attr($post_slider_options['post_slider_content_padding']) : '0 80px';
    $content_margin = isset($post_slider_options['post_slider_content_margin']) ? esc_attr($post_slider_options['post_slider_content_margin']) : '0';
    $content_alignment = isset($post_slider_options['post_slider_content_alignment']) ? esc_attr($post_slider_options['post_slider_content_alignment']) : 'center';

    /**
     * Heading settings
     */
    $heading_font_family = isset($post_slider_options['post_slider_heading_font_family']) ? esc_attr($post_slider_options['post_slider_heading_font_family']) : 'Arial, sans-serif';
    $heading_font_size = isset($post_slider_options['post_slider_heading_font_size']) ? esc_attr($post_slider_options['post_slider_heading_font_size']) : '32px';
    $heading_font_weight = isset($post_slider_options['post_slider_heading_font_weight']) ? esc_attr($post_slider_options['post_slider_heading_font_weight']) : '700';
    $heading_line_height = isset($post_slider_options['post_slider_heading_line_height']) ? esc_attr($post_slider_options['post_slider_heading_line_height']) : '1.5';
    $heading_color = isset($post_slider_options['post_slider_heading_color']) ? esc_attr($post_slider_options['post_slider_heading_color']) : '#ffffff';
    $heading_margin = isset($post_slider_options['post_slider_heading_margin']) ? esc_attr($post_slider_options['post_slider_heading_margin']) : '0 0 10px 0';
    $heading_padding = isset($post_slider_options['post_slider_heading_padding']) ? esc_attr($post_slider_options['post_slider_heading_padding']) : '0 0 10px 0';

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

    /**
     * Button settings
     */
    $button_font_family = isset($post_slider_options['post_slider_button_font_family']) ? esc_attr($post_slider_options['post_slider_button_font_family']) : 'Arial, sans-serif';
    $button_font_weight = isset($post_slider_options['post_slider_button_font_weight']) ? esc_attr($post_slider_options['post_slider_button_font_weight']) : '400';
    $button_font_size = isset($post_slider_options['post_slider_button_font_size']) ? esc_attr($post_slider_options['post_slider_button_font_size']) : '16px';
    $button_color = isset($post_slider_options['post_slider_button_color']) ? esc_attr($post_slider_options['post_slider_button_color']) : '#ffffff';
    $button_padding = isset($post_slider_options['post_slider_button_padding']) ? esc_attr($post_slider_options['post_slider_button_padding']) : '10px 35px';
    $button_margin = isset($post_slider_options['post_slider_button_margin']) ? esc_attr($post_slider_options['post_slider_button_margin']) : '0 20px 0 0';
    $button_bg_color = isset($post_slider_options['post_slider_button_bg_color']) ? esc_attr($post_slider_options['post_slider_button_bg_color']) : '#ff5733';
    $button_border_color = isset($post_slider_options['post_slider_button_border_color']) ? esc_attr($post_slider_options['post_slider_button_border_color']) : '#ff5733';
    $button_border_width = isset($post_slider_options['post_slider_button_border_width']) ? esc_attr($post_slider_options['post_slider_button_border_width']) : '1px';
    $button_border_style = isset($post_slider_options['post_slider_button_border_style']) ? esc_attr($post_slider_options['post_slider_button_border_style']) : 'solid';
    $button_border_radius = isset($post_slider_options['post_slider_button_border_radius']) ? esc_attr($post_slider_options['post_slider_button_border_radius']) : '5px';
    $button_box_shadow = isset($post_slider_options['post_slider_button_box_shadow']) ? esc_attr($post_slider_options['post_slider_button_box_shadow']) : 'none';
    $button_text_align = isset($post_slider_options['post_slider_button_text_align']) ? esc_attr($post_slider_options['post_slider_button_text_align']) : 'center';
    $button_text_decoration = isset($post_slider_options['post_slider_button_text_decoration']) ? esc_attr($post_slider_options['post_slider_button_text_decoration']) : 'none';
    $button_target = isset($post_slider_options['post_slider_button_target']) ? esc_attr($post_slider_options['post_slider_button_target']) : '_self';

    /**
     * Arrow settings
     */
    $post_slider_left_media_file = isset($post_slider_options['post_slider_left_media_file']) ? esc_attr($post_slider_options['post_slider_left_media_file']) : '/wp-content/plugins/slider-bin/assets/icon/Arrow-Left.svg';
    $post_slider_right_media_file = isset($post_slider_options['post_slider_right_media_file']) ? esc_attr($post_slider_options['post_slider_right_media_file']) : '/wp-content/plugins/slider-bin/assets/icon/Arrow-Right.svg';

    $post_slider_left_arrow_position_top = isset($post_slider_options['post_slider_left_arrow_position_top']) ? esc_attr($post_slider_options['post_slider_left_arrow_position_top']) : '50%';
    $post_slider_left_arrow_position_left = isset($post_slider_options['post_slider_left_arrow_position_left']) ? esc_attr($post_slider_options['post_slider_left_arrow_position_left']) : '0';
    $post_slider_left_arrow_position_right = isset($post_slider_options['post_slider_left_arrow_position_right']) ? esc_attr($post_slider_options['post_slider_left_arrow_position_right']) : 'auto';
    $post_slider_left_arrow_position_bottom = isset($post_slider_options['post_slider_left_arrow_position_bottom']) ? esc_attr($post_slider_options['post_slider_left_arrow_position_bottom']) : 'auto';
    $post_slider_left_arrow_color = isset($post_slider_options['post_slider_left_arrow_color']) ? esc_attr($post_slider_options['post_slider_left_arrow_color']) : '#ffffff';
    $post_slider_left_arrow_opacity = isset($post_slider_options['post_slider_left_arrow_opacity']) ? esc_attr($post_slider_options['post_slider_left_arrow_opacity']) : '1';
    $post_slider_left_arrow_height = isset($post_slider_options['post_slider_left_arrow_height']) ? esc_attr($post_slider_options['post_slider_left_arrow_height']) : '40px';
    $post_slider_left_arrow_width = isset($post_slider_options['post_slider_left_arrow_width']) ? esc_attr($post_slider_options['post_slider_left_arrow_width']) : '40px';
    $post_slider_right_arrow_position_top = isset($post_slider_options['post_slider_right_arrow_position_top']) ? esc_attr($post_slider_options['post_slider_right_arrow_position_top']) : '50%';
    $post_slider_right_arrow_position_left = isset($post_slider_options['post_slider_right_arrow_position_left']) ? esc_attr($post_slider_options['post_slider_right_arrow_position_left']) : 'auto';
    $post_slider_right_arrow_position_right = isset($post_slider_options['post_slider_right_arrow_position_right']) ? esc_attr($post_slider_options['post_slider_right_arrow_position_right']) : '0';
    $post_slider_right_arrow_position_bottom = isset($post_slider_options['post_slider_right_arrow_position_bottom']) ? esc_attr($post_slider_options['post_slider_right_arrow_position_bottom']) : 'auto';
    $post_slider_right_arrow_color = isset($post_slider_options['post_slider_right_arrow_color']) ? esc_attr($post_slider_options['post_slider_right_arrow_color']) : '#ffffff';
    $post_slider_right_arrow_opacity = isset($post_slider_options['post_slider_right_arrow_opacity']) ? esc_attr($post_slider_options['post_slider_right_arrow_opacity']) : '1';
    $post_slider_right_arrow_height = isset($post_slider_options['post_slider_right_arrow_height']) ? esc_attr($post_slider_options['post_slider_right_arrow_height']) : '40px';
    $post_slider_right_arrow_width = isset($post_slider_options['post_slider_right_arrow_width']) ? esc_attr($post_slider_options['post_slider_right_arrow_width']) : '40px';

    $pagination_height          =isset($post_slider_options['post_slider_pagination_height']) ?esc_attr($post_slider_options['post_slider_pagination_height']) : '15px';
    $pagination_width           =isset($post_slider_options['post_slider_pagination_width']) ?esc_attr($post_slider_options['post_slider_pagination_width']) : '15px';
    $pagination_gap             =isset($post_slider_options['post_slider_pagination_gap']) ?esc_attr($post_slider_options['post_slider_pagination_gap']) : '5px';
    $pagination_color           =isset($post_slider_options['post_slider_pagination_color']) ?esc_attr($post_slider_options['post_slider_pagination_color']) : '#8E1616';
    $pagination_active_color    =isset($post_slider_options['post_slider_pagination_active_color']) ?esc_attr($post_slider_options['post_slider_pagination_active_color']) : '#D84040';




?>

<style>
    .bg-overlay-post::before {
        background-color: <?php echo $bg_overlay_color;  ?> !important;
        opacity: <?php echo $bg_overlay_opacity; ?> !important;
    }
    .dot.active {
        background-color:<?php echo !empty($pagination_active_color) ? $pagination_active_color : '#D84040'; ?> !important;
    }
</style>


<div id="<?php echo esc_attr($unique_id); ?>" class="slider-wrapper post-slider" style="width: <?php echo $slider_width; ?>;">
    <div id="arrow-left" class="arrow-left" style="
        width: <?php echo empty($post_slider_left_arrow_width) ? '40px' : $post_slider_left_arrow_width; ?>;
        height: <?php echo empty($post_slider_left_arrow_height) ? '40px' : $post_slider_left_arrow_height; ?>;
        left: <?php echo empty($post_slider_left_arrow_position_left) ? '0' : $post_slider_left_arrow_position_left; ?>;
        top: <?php echo empty($post_slider_left_arrow_position_top) ? '50%' : $post_slider_left_arrow_position_top; ?>;
        right: <?php echo empty($post_slider_left_arrow_position_right) ? 'auto' : $post_slider_left_arrow_position_right; ?>;
        bottom: <?php echo empty($post_slider_left_arrow_position_bottom) ? 'auto' : $post_slider_left_arrow_position_bottom; ?>;
        opacity: <?php echo empty($post_slider_left_arrow_opacity) ? 'auto' : $post_slider_left_arrow_opacity; ?>; ">
        <img src="<?php echo empty($post_slider_left_media_file) ? '' : $post_slider_left_media_file; ?>" alt="">
    </div>
    <div id="slider" class="bg-overlay-post">
        <?php if (!empty($post_slider_data)) {
            // print_r($post_slider_data);
            foreach ($post_slider_data as $index => $slide) {
            // Ensure each slide has valid data
            $image = isset($slide['image']) ? esc_url($slide['image']) : '';
            $heading = isset($slide['heading']) ? esc_html($slide['heading']) : '';
            $subheading = isset($slide['subheading']) ? esc_html($slide['subheading']) : '';
            $permalink = isset($slide['permalink']) ? esc_url($slide['permalink']) : '';
        ?>

        <div class="slide" style=" background-image: url('<?php if ($image) { echo $image;} ?>'); background-size: <?php echo $bg_image_size; ?>; background-position: <?php echo $bg_image_position; ?>; background-repeat: no-repeat; height: <?php echo $slider_height; ?>; ">
            <div class="slide-content" style="height:fit-content; top: <?php echo $content_position_top; ?>; left: <?php echo $content_position_left; ?>; right: <?php echo $content_position_right; ?>; bottom: <?php echo $content_position_bottom; ?>; margin: <?php echo $content_margin; ?>; padding: <?php echo $content_padding; ?>; " >
                <?php if ($heading) { ?>
                    <h2 style=" font-family: <?php echo $heading_font_family; ?>; font-size: <?php echo $heading_font_size; ?>; color: <?php echo $heading_color; ?>; font-weight: <?php echo $heading_font_weight; ?>; line-height: <?php echo $heading_line_height; ?>; margin: <?php echo $heading_margin; ?>; padding: <?php echo $heading_padding; ?>; ">
                        <?php echo $heading; ?>
                    </h2>
                <?php } ?>

                <?php if ($subheading) { ?>
                    <p style=" font-family: <?php echo $excerpt_font_family; ?>; font-size: <?php echo $excerpt_font_size; ?>; color: <?php echo $excerpt_color; ?>; font-weight: <?php echo $excerpt_font_weight; ?>; line-height: <?php echo $excerpt_line_height; ?>; margin: <?php echo $excerpt_margin; ?>; padding: <?php echo $excerpt_padding; ?>; ">
                        <?php echo $subheading; ?>
                    </p>
                <?php } ?>

                <?php if ($permalink) { ?>
                    <a class="slider-link" href="<?php echo $permalink; ?>" style="font-family: <?php echo $button_font_family; ?>; font-weight: <?php echo $button_font_weight; ?>; font-size: <?php echo $button_font_size; ?>; color: <?php echo $button_color; ?>; padding: <?php echo $button_padding; ?>; text-align: <?php echo $button_text_align; ?>; text-decoration: <?php echo $button_text_decoration; ?>; background-color: <?php echo $button_bg_color; ?>; border-width: <?php echo $button_border_width; ?>; border-style: <?php echo $button_border_style; ?>; border-color: <?php echo $button_border_color; ?>; border-radius: <?php echo $button_border_radius; ?>; margin: <?php echo $button_margin; ?>; ">
                        Read More
                    </a>
                <?php } ?>
            </div>
        </div>
        <?php }
        } else { ?>
            <p>No slider data available.</p>
        <?php } ?>
    </div>
    <div id="arrow-right" class="arrow-right" style="
        width: <?php echo empty($post_slider_right_arrow_width) ? '40px' : $post_slider_right_arrow_width; ?>;
        height: <?php echo empty($post_slider_right_arrow_height) ? '40px' : $post_slider_right_arrow_height; ?>;
        left: <?php echo empty($post_slider_right_arrow_position_left) ? 'auto' : $post_slider_right_arrow_position_left; ?>;
        top: <?php echo empty($post_slider_right_arrow_position_top) ? '50%' : $post_slider_right_arrow_position_top; ?>;
        right: <?php echo empty($post_slider_right_arrow_position_right) ? '0' : $post_slider_right_arrow_position_right; ?>;
        bottom: <?php echo empty($post_slider_right_arrow_position_bottom) ? 'auto' : $post_slider_right_arrow_position_bottom; ?>;
        opacity: <?php echo empty($post_slider_right_arrow_opacity) ? '1' : $post_slider_right_arrow_opacity; ?>; ">
        <img src="<?php echo empty($post_slider_right_media_file) ? '' : $post_slider_right_media_file; ?>" alt="">
    </div>
    <div class="pagination">
        <?php if (!empty($post_slider_data)): ?>
            <?php foreach ($post_slider_data as $index => $post): ?>
                <span class="dot" style="height: <?php echo !empty($pagination_height) ? $pagination_height : '15px'; ?>;
                                         width: <?php echo !empty($pagination_width) ? $pagination_width : '15px'; ?>;
                                         margin-left:<?php echo !empty($pagination_gap) ? $pagination_gap : '5px'; ?>;
                                         background-color: <?php echo !empty($pagination_color) ? $pagination_color : '#8E1616'; ?>;" onclick="currentSlide(<?php echo $index + 1; ?>)"></span>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>