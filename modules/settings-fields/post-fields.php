<?php

    // Post Slider Settings
    add_settings_section(
        'slider_bin_post_slider_section',
        '',
        null,
        'slider_bin_post_slider_section'
    );

    // Post Slider Settings

    $post_slider_fields = array(
        'post_slider_width' => array(
            'label' => __('Slider Width', 'slider_bin'),
            'placeholder' => '100%'
        ),
        'post_slider_height' => array(
            'label' => __('Slider Height', 'slider_bin'),
            'placeholder' => '100%'
        ),
        'post_slider_bg_image_position' => array(
            'label' => __('Background Image Position', 'slider_bin'),
            'placeholder' => 'center center'
        ),
        'post_slider_bg_image_size' => array(
            'label' => __('Background Image Size', 'slider_bin'),
            'placeholder' => 'cover'
        ),
        'post_slider_bg_overlay' => array(
            'label' => __('Background Image Overlay', 'slider_bin'),
            'placeholder' => 'true/false'
        ),
        'post_slider_bg_overlay_color' => array(
            'label' => __('Background Image Overlay Color', 'slider_bin'),
            'placeholder' => '#000000',
            'type' => 'color'
        ),
        'post_slider_bg_overlay_opacity' => array(
            'label' => __('Background Image Overlay Opacity', 'slider_bin'),
            'placeholder' => '0.5'
        ),
        'post_slider_content_position_top' => array(
            'label' => __('Content Position-Top', 'slider_bin'),
            'placeholder' => '10% or 10px'
        ),
        'post_slider_content_position_left' => array(
            'label' => __('Content Position-Left', 'slider_bin'),
            'placeholder' => '10% or 10px'
        ),
        'post_slider_content_position_right' => array(
            'label' => __('Content Position-Right', 'slider_bin'),
            'placeholder' => '10% or 10px'
        ),
        'post_slider_content_position_bottom' => array(
            'label' => __('Content Position-Bottom', 'slider_bin'),
            'placeholder' => '10% or 10px'
        ),
        'post_slider_content_alignment' => array(
            'label' => __('Content Alignment', 'slider_bin'),
            'placeholder' => 'center'
        ),
        'post_slider_content_padding' => array(
            'label' => __('Content Padding', 'slider_bin'),
            'placeholder' => '0 0 20px 0'
        ),
        'post_slider_content_margin' => array(
            'label' => __('Content Margin', 'slider_bin'),
            'placeholder' => '0 0 20px 0'
        ),
        'post_slider_heading_font_family' => array(
            'label' => __('Heading Font Family', 'slider_bin'),
            'placeholder' => 'Arial, sans-serif'
        ),
        'post_slider_heading_font_size' => array(
            'label' => __('Heading Font Size', 'slider_bin'),
            'placeholder' => '32px'
        ),
        'post_slider_heading_font_weight' => array(
            'label' => __('Heading Font Weight', 'slider_bin'),
            'placeholder' => '700'
        ),
        'post_slider_heading_line_height' => array(
            'label' => __('Heading Line Height', 'slider_bin'),
            'placeholder' => '1.2'
        ),
        'post_slider_heading_color' => array(
            'label' => __('Heading Color', 'slider_bin'),
            'placeholder' => '#ffffff',
            'type' => 'color'
        ),
        'post_slider_heading_margin' => array(
            'label' => __('Heading Margin', 'slider_bin'),
            'placeholder' => '0 0 20px 0'
        ),
        'post_slider_heading_padding' => array(
            'label' => __('Heading Padding', 'slider_bin'),
            'placeholder' => '0 0 20px 0'
        ),
        'post_slider_subheading_font_family' => array(
            'label' => __('Excerpt Font Family', 'slider_bin'),
            'placeholder' => 'Arial, sans-serif'
        ),
        'post_slider_subheading_font_size' => array(
            'label' => __('Excerpt Font Size', 'slider_bin'),
            'placeholder' => '18px'
        ),
        'post_slider_subheading_font_weight' => array(
            'label' => __('Excerpt Font Weight', 'slider_bin'),
            'placeholder' => '400'
        ),
        'post_slider_subheading_line_height' => array(
            'label' => __('Excerpt Line Height', 'slider_bin'),
            'placeholder' => '1.5'
        ),
        'post_slider_subheading_color' => array(
            'label' => __('Excerpt Color', 'slider_bin'),
            'placeholder' => '#ffffff',
            'type' => 'color'
        ),
        'post_slider_subheading_margin' => array(
            'label' => __('Excerpt Margin', 'slider_bin'),
            'placeholder' => '0 0 30px 0'
        ),
        'post_slider_subheading_padding' => array(
            'label' => __('Excerpt Padding', 'slider_bin'),
            'placeholder' => '0'
        ),
        'post_slider_left_arrow_position_left' => array(
            'label' => __('Left Arrow Position-Left', 'slider_bin'),
            'placeholder' => '10% or 10px'
        ),
        'post_slider_left_arrow_position_top' => array(
            'label' => __('Left Arrow Position-Top', 'slider_bin'),
            'placeholder' => '10% or 10px'
        ),
        'post_slider_left_arrow_position_right' => array(
            'label' => __('Left Arrow Position-Right', 'slider_bin'),
            'placeholder' => '10% or 10px'
        ),
        'post_slider_left_arrow_position_bottom' => array(
            'label' => __('Left Arrow Position-Bottom', 'slider_bin'),
            'placeholder' => '10% or 10px'
        ),
        'post_slider_left_arrow_color' => array(
            'label' => __('Left Arrow Color', 'slider_bin'),
            'placeholder' => '#ffffff',
            'type' => 'color'
        ),
        'post_slider_left_arrow_opacity' => array(
            'label' => __('Left Arrow Opacity', 'slider_bin'),
            'placeholder' => '0.8'
        ),
        'post_slider_left_arrow_height' => array(
            'label' => __('Left Arrow Height', 'slider_bin'),
            'placeholder' => '40px'
        ),
        'post_slider_left_arrow_width' => array(
            'label' => __('Left Arrow Width', 'slider_bin'),
            'placeholder' => '40px'
        ),
        'post_slider_right_arrow_position_left' => array(
            'label' => __('Right Arrow Position-Left', 'slider_bin'),
            'placeholder' => '10% or 10px'
        ),
        'post_slider_right_arrow_position_top' => array(
            'label' => __('Right Arrow Position-Top', 'slider_bin'),
            'placeholder' => '10% or 10px'
        ),
        'post_slider_right_arrow_position_right' => array(
            'label' => __('Right Arrow Position-Right', 'slider_bin'),
            'placeholder' => '10% or 10px'
        ),
        'post_slider_right_arrow_position_bottom' => array(
            'label' => __('Right Arrow Position-Bottom', 'slider_bin'),
            'placeholder' => '10% or 10px'
        ),
        'post_slider_right_arrow_color' => array(
            'label' => __('Right Arrow Color', 'slider_bin'),
            'placeholder' => '#ffffff',
            'type' => 'color'
        ),
        'post_slider_right_arrow_opacity' => array(
            'label' => __('Right Arrow Opacity', 'slider_bin'),
            'placeholder' => '0.8'
        ),
        'post_slider_right_arrow_height' => array(
            'label' => __('Right Arrow Height', 'slider_bin'),
            'placeholder' => '40px'
        ),
        'post_slider_left_media_file' => array(
                'label' => __('Select or Choose Left Icon', 'slider_bin'),
                'placeholder' => '',
                'type' => 'button'
        ),
        'post_slider_right_media_file' => array(
            'label' => __('Select or Choose Right Icon', 'slider_bin'),
            'placeholder' => '',
            'type' => 'button'
        ),
        'post_slider_arrow_right' => array(
            'label' => __('Right Arrow Style', 'slider_bin'),
            'placeholder' => '',
            'type' => 'select',
        ),
        'post_slider_button_padding' => array(
            'label' => __( 'Button Padding', 'slider_bin'),
            'placeholder' => '10px 20px 10px 20px'
        ),
        'post_slider_button_margin' => array(
            'label' => __('Button Margin', 'slider_bin'),
            'placeholder' => '0 0 20px 0'
        ),
        'post_slider_button_font_size' => array(
            'label' => __('Button Font Size', 'slider_bin'),
            'placeholder' => '14px'
        ),
        'post_slider_button_color' => array(
            'label' => __('Button Font Color', 'slider_bin'),
            'placeholder' => '#ffffff',
            'type' => 'color'
        ),
        'post_slider_button_bg_color' => array(
            'label' => __('Button Background Color', 'slider_bin'),
            'placeholder' => '#ff5733',
            'type' => 'color'
        ),
        'post_slider_button_border_color' => array(
            'label' => __('Border Color', 'slider_bin'),
            'placeholder' => '#ff5733',
            'type' => 'color'
        ),
        'post_slider_button_border_width' => array(
            'label' => __('Border Width', 'slider_bin'),
            'placeholder' => '1px'
        ),
        'post_slider_button_border_style' => array(
            'label' => __('Border Style', 'slider_bin'),
            'placeholder' => 'solid/dotted/dashed'
        ),
        'post_slider_button_border_radius' => array(
            'label' => __('Border Radius', 'slider_bin'),
            'placeholder' => '5px'
        ),
        'post_slider_button_box_shadow' => array(
            'label' => __('Button Box Shadow', 'slider_bin'),
            'placeholder' => '0px 4px 6px #888888'
        ),
        'post_slider_button_text_align' => array(
            'label' => __('Button Text Align', 'slider_bin'),
            'placeholder' => 'center'
        ),
        'post_slider_button_text_decoration' => array(
            'label' => __('Button Text Decoration', 'slider_bin'),
            'placeholder' => 'none'
        ),
        'post_slider_button_font_family' => array(
            'label' => __('Button Font Family', 'slider_bin'),
            'placeholder' => 'Arial, sans-serif'
        ),
        'post_slider_button_font_weight' => array(
            'label' => __('Button Font Weight', 'slider_bin'),
            'placeholder' => '400'
        ),
        'post_slider_button_target' => array(
            'label' => __('Button Target', 'slider_bin'),
            'placeholder' => '_self'
        ),
        'post_slider_pagination_height' => array(
            'label' => __('Pagination Height', 'slider_bin'),
            'placeholder' => '15px'
        ),
        'post_slider_pagination_width' => array(
            'label' => __('Pagination width', 'slider_bin'),
            'placeholder' => '15px'
        ),
        'post_slider_pagination_gap' => array(
            'label' => __('Pagination Gap', 'slider_bin'),
            'placeholder' => '5px'
        ),
        'post_slider_pagination_color' => array(
            'label' => __('Pagination Color', 'slider_bin'),
            'placeholder' => '#8E1616',
            'type' => 'color'
        ),
        'post_slider_pagination_active_color' => array(
            'label' => __('Pagination Color On Active', 'slider_bin'),
            'placeholder' => '#D84040',
            'type' => 'color'
        ),

    );

    $post_slider_groups = array(
        'background_settings' => array(
            'title' => __('Background Settings', 'slider_bin'),
            'fields' => array(
                'post_slider_width',
                'post_slider_height',
                'post_slider_bg_image_size',
                'post_slider_bg_image_position',
                'post_slider_bg_overlay',
                'post_slider_bg_overlay_color',
                'post_slider_bg_overlay_opacity',
            ),
        ),
        'content_settings' => array(
            'title' => __('Content Settings', 'slider_bin'),
            'fields' => array(
                'post_slider_content_position_top',
                'post_slider_content_position_left',
                'post_slider_content_position_right',
                'post_slider_content_position_bottom',
                'post_slider_content_alignment',
                'post_slider_content_margin',
                'post_slider_content_padding',
            ),
        ),
        'heading_settings' => array(
            'title' => __('Heading Settings', 'slider_bin'),
            'fields' => array(
                'post_slider_heading_font_family',
                'post_slider_heading_font_size',
                'post_slider_heading_font_weight',
                'post_slider_heading_line_height',
                'post_slider_heading_color',
                'post_slider_heading_margin',
                'post_slider_heading_padding',
            ),
        ),
        'subheading_settings' => array(
            'title' => __('Excerpt Settings', 'slider_bin'),
            'fields' => array(
                'post_slider_subheading_font_family',
                'post_slider_subheading_font_size',
                'post_slider_subheading_font_weight',
                'post_slider_subheading_line_height',
                'post_slider_subheading_color',
                'post_slider_subheading_margin',
                'post_slider_subheading_padding',
            ),
        ),
        'button_settings' => array(
            'title' => __('Button Settings', 'slider_bin'),
            'fields' => array(
                'post_slider_button_font_family',
                'post_slider_button_font_weight',
                'post_slider_button_font_size',
                'post_slider_button_color',
                'post_slider_button_padding',
                'post_slider_button_margin',
                'post_slider_button_bg_color',
                'post_slider_button_border_color',
                'post_slider_button_border_width',
                'post_slider_button_border_style',
                'post_slider_button_border_radius',
                'post_slider_button_box_shadow',
                'post_slider_button_text_align',
                'post_slider_button_text_decoration',
                'post_slider_button_target',
            ),
        ),
        'arrow_settings' => array(
            'title' => __('Arrow Settings', 'slider_bin'),
            'fields' => array(
                'post_slider_right_media_file',
                'post_slider_left_media_file',
                'post_slider_left_arrow_position_top',
                'post_slider_left_arrow_position_left',
                'post_slider_left_arrow_position_right',
                'post_slider_left_arrow_position_bottom',
                'post_slider_left_arrow_color',
                'post_slider_left_arrow_opacity',
                'post_slider_left_arrow_width',
                'post_slider_left_arrow_height',
                'post_slider_right_arrow_position_top',
                'post_slider_right_arrow_position_left',
                'post_slider_right_arrow_position_right',
                'post_slider_right_arrow_position_bottom',
                'post_slider_right_arrow_color',
                'post_slider_right_arrow_opacity',
                'post_slider_right_arrow_width',
                'post_slider_right_arrow_height',
            ),
        ),
        'pagination_settings' => array(
            'title' => __('Pagination Settings', 'slider_bin'),
            'fields' => array(
                'post_slider_pagination_height',
                'post_slider_pagination_width',
                'post_slider_pagination_gap',
                'post_slider_pagination_color',
                'post_slider_pagination_active_color',
            ),
        ),
    );

    if (!empty($post_slider_groups)) {
        foreach ($post_slider_groups as $group_key => $group) {
            add_settings_section(
                'slider_bin_post_slider_' . $group_key . '_section',
                $group['title'],
                null,
                'slider_bin_post_slider_section'
            );

            foreach ($group['fields'] as $field_id) {
                if (!isset($post_slider_fields[$field_id])) {
                    continue; // Skip fields not defined in $post_slider_fields
                }
                $field = $post_slider_fields[$field_id];

                add_settings_field(
                    $field_id,
                    $field['label'],
                    array($this, 'render_settings_field'),
                    'slider_bin_post_slider_section',
                    'slider_bin_post_slider_' . $group_key . '_section',
                    array(
                        'id' => $field_id,
                        'placeholder' => $field['placeholder'],
                        'type' => isset($field['type']) ? $field['type'] : 'text'
                    )
                );
            }
        }
    }