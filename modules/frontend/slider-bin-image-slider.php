<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    $options = get_option('slider_bin_image_slider_settings');

    $slider_width = isset($options['image_slider_width']) ? esc_attr($options['image_slider_width']) : '100%';
    $slider_height = isset($options['image_slider_height']) ? esc_attr($options['image_slider_height']) : '700px';
    // Caption settings

    $image_slider_caption_position = isset($options['image_slider_caption_position']) ? esc_attr($options['image_slider_caption_position']) : array();

    $image_slider_caption_position_left     = isset($image_slider_caption_position['image_slider_caption_position_left']) ? esc_attr($image_slider_caption_position['image_slider_caption_position_left']) : 'auto';
    $image_slider_caption_position_top      = isset($image_slider_caption_position['image_slider_caption_position_top']) ? esc_attr($image_slider_caption_position['image_slider_caption_position_top']) : '50%';
    $image_slider_caption_position_right    = isset($image_slider_caption_position['image_slider_caption_position_right']) ? esc_attr($image_slider_caption_position['image_slider_caption_position_right']) : 'auto';
    $image_slider_caption_position_bottom   = isset($image_slider_caption_position['image_slider_caption_position_bottom']) ? esc_attr($image_slider_caption_position['image_slider_caption_position_bottom']) : 'auto';

    $caption_align = isset($options['image_slider_caption_alignment']) ? esc_attr($options['image_slider_caption_alignment']) : 'center';

    $image_slider_caption_padding = isset($options['image_slider_caption_padding']) ? esc_attr($options['image_slider_caption_padding']) : array();

    $caption_padding_left      = isset($image_slider_caption_padding['image_slider_caption_padding_left']) ? esc_attr( $image_slider_caption_padding['image_slider_caption_padding_left'] ) : 'auto';
    $caption_padding_top       = isset($image_slider_caption_padding['image_slider_caption_padding_top']) ? esc_attr( $image_slider_caption_padding['image_slider_caption_padding_top'] ) : '0';
    $caption_padding_right     = isset($image_slider_caption_padding['image_slider_caption_padding_right']) ? esc_attr( $image_slider_caption_padding['image_slider_caption_padding_right'] ) : 'auto';
    $caption_padding_bottom    = isset($image_slider_caption_padding['image_slider_caption_padding_bottom']) ? esc_attr( $image_slider_caption_padding['image_slider_caption_padding_bottom'] ) : '0';

    $image_slider_caption_margin = isset($options['image_slider_caption_margin']) ? esc_attr($options['image_slider_caption_margin']) : array();

    $caption_margin_left      = isset($image_slider_caption_margin['image_slider_caption_margin_left']) ? esc_attr( $image_slider_caption_margin['image_slider_caption_margin_left'] ) : 'auto';
    $caption_margin_top       = isset($image_slider_caption_margin['image_slider_caption_margin_top']) ? esc_attr( $image_slider_caption_margin['image_slider_caption_margin_top'] ) : '0';
    $caption_margin_right     = isset($image_slider_caption_margin['image_slider_caption_margin_right']) ? esc_attr( $image_slider_caption_margin['image_slider_caption_margin_right'] ) : 'auto';
    $caption_margin_bottom    = isset($image_slider_caption_margin['image_slider_caption_margin_bottom']) ? esc_attr( $image_slider_caption_margin['image_slider_caption_margin_bottom'] ) : '0';

    $caption_font_size = isset($options['image_slider_caption_font_size']) ? esc_attr($options['image_slider_caption_font_size']) : '32px';
    $caption_font_weight = isset($options['image_slider_caption_font_weight']) ? esc_attr($options['image_slider_caption_font_weight']) : '400';
    $caption_line_height = isset($options['image_slider_caption_line_height']) ? esc_attr($options['image_slider_caption_line_height']) : '1.5';
    $caption_color = isset($options['image_slider_caption_color']) ? esc_attr($options['image_slider_caption_color']) : '#FFFF00';

    // Arrow settings
    $image_slider_left_media_file = isset($options['image_slider_left_media_file']) ? esc_attr($options['image_slider_left_media_file']) : SLIDER_BIN_URL . '/assets/icon/arrow-left.png';
    $image_slider_right_media_file = isset($options['image_slider_right_media_file']) ? esc_attr($options['image_slider_right_media_file']) : SLIDER_BIN_URL . '/assets/icon/arrow-right.png';

    $image_slider_arrow_position = isset($options['image_slider_arrow_position']) ? esc_attr($options['image_slider_arrow_position']) : array();

    $image_slider_arrow_position_left = isset($image_slider_arrow_position['image_slider_arrow_position_left']) ? esc_attr($image_slider_arrow_position['image_slider_arrow_position_left']) : '0';
    $image_slider_arrow_position_top = isset($image_slider_arrow_position['image_slider_arrow_position_top']) ? esc_attr($image_slider_arrow_position['image_slider_arrow_position_top']) : '50%';
    $image_slider_arrow_position_right = isset($image_slider_arrow_position['image_slider_arrow_position_right']) ? esc_attr($image_slider_arrow_position['image_slider_arrow_position_right']) : '0';
    $image_slider_arrow_position_bottom = isset($image_slider_arrow_position['image_slider_arrow_position_bottom']) ? esc_attr($image_slider_arrow_position['image_slider_arrow_position_bottom']) : 'auto';
    $image_slider_arrow_opacity = isset($ptions['image_slider_arrow_opacity']) ? esc_attr($options['image_slider_arrow_opacity']) : '1';
    $image_slider_arrow_height = isset($options['image_slider_arrow_height']) ? esc_attr($options['image_slider_arrow_height']) : '40px';
    $image_slider_arrow_width = isset($options['image_slider_arrow_width']) ? esc_attr($options['image_slider_arrow_width']) : '40px';

    $pagination_height          =isset($options['image_slider_pagination_height']) ?esc_attr($options['image_slider_pagination_height']) : '15px';
    $pagination_width           =isset($options['image_slider_pagination_width']) ?esc_attr($options['image_slider_pagination_width']) : '15px';
    $pagination_gap             =isset($options['image_slider_pagination_gap']) ?esc_attr($options['image_slider_pagination_gap']) : '5px';
    $pagination_color           =isset($options['image_slider_pagination_color']) ?esc_attr($options['image_slider_pagination_color']) : '#8E1616';
    $pagination_active_color    =isset($options['image_slider_pagination_active_color']) ?esc_attr($options['image_slider_pagination_active_color']) : '#D84040';


?>
<style>
    .arrow-left {
        width: <?php echo empty($image_slider_arrow_width) ? '40px' : $image_slider_arrow_width; ?>;
        height: <?php echo empty($image_slider_arrow_height) ? '40px' : $image_slider_arrow_height; ?>;
        left: <?php echo empty($image_slider_arrow_position_left) ? '0' : $image_slider_arrow_position_left; ?>;
        top: <?php echo empty($image_slider_arrow_position_top) ? '50%' : $image_slider_arrow_position_top; ?>;
        opacity: <?php echo empty($image_slider_arrow_opacity) ? '1' : $image_slider_arrow_opacity; ?>;
    }

    .slide-caption {
        width:100%;
        height: fit-content;
        top:            <?php echo empty($image_slider_caption_position_top) ? '50%' : $image_slider_caption_position_top; ?>;
        left:           <?php echo empty($image_slider_caption_position_left) ? 'auto' : $image_slider_caption_position_left; ?>;
        right:          <?php echo empty($image_slider_caption_position_right) ? 'auto' : $image_slider_caption_position_right; ?>;
        bottom:         <?php echo empty($image_slider_caption_position_bottom) ? 'auto' : $image_slider_caption_position_bottom; ?>;
        text-align:    <?php echo empty($caption_align) ? 'center' : $caption_align; ?>;
        padding-left:   <?php echo empty($caption_padding_left) ? 'auto' : $caption_padding_left; ?>;
        padding-top:    <?php echo empty($caption_padding_top) ? '0' : $caption_padding_top; ?>;
        padding-right:  <?php echo empty($caption_padding_right) ? 'auto' : $caption_padding_right; ?>;
        padding-bottom: <?php echo empty($caption_padding_bottom) ? '0' : $caption_padding_bottom; ?>;
        margin-left:    <?php echo empty($caption_margin_left) ? 'auto' : $caption_margin_left; ?>;
        margin-top:     <?php echo empty($caption_margin_top) ? '0' : $caption_margin_top; ?>;
        margin-right:   <?php echo empty($caption_margin_right) ? 'auto' : $caption_margin_right; ?>;
        margin-bottom:  <?php echo empty($caption_margin_bottom) ? '0' : $caption_margin_bottom; ?>;
        font-size:      <?php echo esc_attr(!empty($caption_font_size) ? $caption_font_size : '34px'); ?>;
        font-weight:    <?php echo esc_attr(!empty($caption_font_weight) ? $caption_font_weight : 'normal'); ?>;
        line-height:    <?php echo esc_attr(!empty($caption_line_height) ? $caption_line_height : '1.5'); ?>;
        color:          <?php echo esc_attr(!empty($caption_color) ? $caption_color : '#fff'); ?>;
    }


    .arrow-right {
        width:      <?php echo empty($image_slider_arrow_width) ? '40px' : $image_slider_arrow_width; ?>;
        height:     <?php echo empty($image_slider_arrow_height) ? '40px' : $image_slider_arrow_height; ?>;
        right:      <?php echo empty($image_slider_arrow_position_right) ? '0' : $image_slider_arrow_position_right; ?>;
        top:        <?php echo empty($image_slider_arrow_position_top) ? '50%' : $image_slider_arrow_position_top; ?>;
        opacity:    <?php echo empty($image_slider_arrow_opacity) ? '1' : $image_slider_arrow_opacity; ?>;
    }

    .dot{
        height: <?php echo !empty($pagination_height) ? $pagination_height : '15px'; ?>;
        width: <?php echo !empty($pagination_width) ? $pagination_width : '15px'; ?>;
        margin-left:<?php echo !empty($pagination_gap) ? $pagination_gap : '5px'; ?>;
        background-color: <?php echo !empty($pagination_color) ? $pagination_color : '#8E1616'; ?>;
    }

    .dot.active {
        background-color:<?php echo !empty($pagination_active_color) ? $pagination_active_color : '#D84040'; ?> !important;
    }

</style>

<div id="<?php echo esc_attr($unique_id); ?>" class="slider-wrapper image-slider" style="width: <?php echo $slider_width; ?>;">
    <div id="arrow-left" class="arrow-left">
        <img src="<?php echo empty($image_slider_left_media_file) ? SLIDER_BIN_URL . '/assets/icon/arrow-left.png' : $image_slider_left_media_file; ?>" alt="">
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
                    <p class="slide-caption">
                        <?php echo $caption; ?>
                    </p>
                <?php endif; ?>
            </div>
        <?php }
        else { ?>
            <p>No slider data available.</p>
        <?php }} ?>
    </div>
    <div id="arrow-right" class="arrow-right">
        <img src="<?php echo empty($image_slider_right_media_file) ? SLIDER_BIN_URL . '/assets/icon/arrow-right.png' : $image_slider_right_media_file; ?>" alt="">
    </div>
    <div class="pagination">
        <?php if (!empty($image_slider_data)):
            foreach ($image_slider_data as $index => $image_url): ?>
                <span class="dot" onclick="currentSlide(<?php echo $index + 1; ?>)"></span>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>