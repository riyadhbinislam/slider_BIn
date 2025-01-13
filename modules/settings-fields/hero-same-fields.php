<?php

    // Hero Same Heading Slider Settings
    add_settings_section(
        'slider_bin_hero_same_section',
        __('', 'slider_bin'),
        null,
        'slider_bin_hero_same_section'
    );

    $hero_same_fields = array(
            'hero_same_slider_width' => array(
                'label' => __('Slider Width', 'slider_bin'),
                'placeholder' => '100%'
            ),
            'hero_same_slider_height' => array(
                'label' => __('Slider Height', 'slider_bin'),
                'placeholder' => '700px'
            ),
            'hero_same_bg_image_position' => array(
                'label' => __('Background Image Position', 'slider_bin'),
                'placeholder' => 'center'
            ),
            'hero_same_bg_image_size' => array(
                'label' => __('Background Image Size', 'slider_bin'),
                'placeholder' => 'cover / contain / auto'
            ),
            // 'hero_same_bg_overlay' => array(
            //     'label' => __('Background Image Overlay', 'slider_bin'),
            //     'placeholder' => 'true or false'
            // ),
            'hero_same_bg_overlay_color' => array(
                'label' => __('Background Image Overlay Color', 'slider_bin'),
                'placeholder' => '#000000',
                'type' => 'color'
            ),
            'hero_same_bg_overlay_opacity' => array(
                'label' => __('Background Image Overlay Opacity', 'slider_bin'),
                'placeholder' => '0.5'
            ),
            'hero_same_content_position_top' => array(
                'label' => __('Content Position-Top', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_same_content_position_left' => array(
                'label' => __('Content Position-Left', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_same_content_position_right' => array(
                'label' => __('Content Position-Right', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_same_content_position_bottom' => array(
                'label' => __('Content Position-Bottom', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_same_content_alignment' => array(
                'label' => __('Content Alignment', 'slider_bin'),
                'placeholder' => 'center'
            ),
            'hero_same_content_padding' => array(
                'label' => __('Content Padding', 'slider_bin'),
                'placeholder' => '0 0 20px 0'
            ),
            'hero_same_content_margin' => array(
                'label' => __('Content Margin', 'slider_bin'),
                'placeholder' => '0 0 20px 0'
            ),
            'hero_same_heading_font_family' => array(
                'label' => __('Heading Font Family', 'slider_bin'),
                'placeholder' => 'Arial, sans-serif'
            ),
            'hero_same_heading_font_size' => array(
                'label' => __('Heading Font Size', 'slider_bin'),
                'placeholder' => '32px'
            ),
            'hero_same_heading_font_weight' => array(
                'label' => __('Heading Font Weight', 'slider_bin'),
                'placeholder' => '700'
            ),
            'hero_same_heading_line_height' => array(
                'label' => __('Heading Line Height', 'slider_bin'),
                'placeholder' => '1.2'
            ),
            'hero_same_heading_color' => array(
                'label' => __('Heading Color', 'slider_bin'),
                'placeholder' => '#ffffff',
                'type' => 'color'
            ),
            'hero_same_heading_margin' => array(
                'label' => __('Heading Margin', 'slider_bin'),
                'placeholder' => '0 0 20px 0'
            ),
            'hero_same_heading_padding' => array(
                'label' => __('Heading Padding', 'slider_bin'),
                'placeholder' => '0 0 20px 0'
            ),
            'hero_same_subheading_font_family' => array(
                'label' => __('Heading Font Family', 'slider_bin'),
                'placeholder' => 'Arial, sans-serif'
            ),
            'hero_same_subheading_font_size' => array(
                'label' => __('Subheading Font Size', 'slider_bin'),
                'placeholder' => '18px'
            ),
            'hero_same_subheading_font_weight' => array(
                'label' => __('Subheading Font Weight', 'slider_bin'),
                'placeholder' => '400'
            ),
            'hero_same_subheading_line_height' => array(
                'label' => __('Subheading Line Height', 'slider_bin'),
                'placeholder' => '1.5'
            ),
            'hero_same_subheading_color' => array(
                'label' => __('Subheading Color', 'slider_bin'),
                'placeholder' => '#ffffff',
                'type' => 'color'
            ),
            'hero_same_subheading_margin' => array(
                'label' => __('Subheading Margin', 'slider_bin'),
                'placeholder' => '0 0 30px 0'
            ),
            'hero_same_subheading_padding' => array(
                'label' => __('Subheading Padding', 'slider_bin'),
                'placeholder' => '0 0 30px 0'
            ),
            'hero_same_left_arrow_position_left' => array(
                'label' => __('Left Arrow Position-Left', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_same_left_arrow_position_top' => array(
                'label' => __('Left Arrow Position-Top', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_same_left_arrow_position_right' => array(
                'label' => __('Left Arrow Position-Right', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_same_left_arrow_position_bottom' => array(
                'label' => __('Left Arrow Position-Bottom', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_same_left_arrow_color' => array(
                'label' => __('Left Arrow Color', 'slider_bin'),
                'placeholder' => '#ffffff',
                'type' => 'color'
            ),
            'hero_same_left_arrow_opacity' => array(
                'label' => __('Left Arrow Opacity', 'slider_bin'),
                'placeholder' => '0.8'
            ),
            'hero_same_left_arrow_height' => array(
                'label' => __('Left Arrow Height', 'slider_bin'),
                'placeholder' => '40px'
            ),
            'hero_same_left_arrow_width' => array(
                'label' => __('Left Arrow Width', 'slider_bin'),
                'placeholder' => '40px'
            ),
            'hero_same_right_arrow_position_left' => array(
                'label' => __('Right Arrow Position-Left', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_same_right_arrow_position_top' => array(
                'label' => __('Right Arrow Position-Top', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_same_right_arrow_position_right' => array(
                'label' => __('Right Arrow Position-Right', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_same_right_arrow_position_bottom' => array(
                'label' => __('Right Arrow Position-Bottom', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_same_right_arrow_color' => array(
                'label' => __('Right Arrow Color', 'slider_bin'),
                'placeholder' => '#ffffff',
                'type' => 'color'
            ),
            'hero_same_right_arrow_opacity' => array(
                'label' => __('Right Arrow Opacity', 'slider_bin'),
                'placeholder' => '0.8'
            ),
            'hero_same_right_arrow_height' => array(
                'label' => __('Right Arrow Height', 'slider_bin'),
                'placeholder' => '40px'
            ),
            'hero_same_right_arrow_width' => array(
                'label' => __('Right Arrow Width', 'slider_bin'),
                'placeholder' => '40px'
            ),
            // 'hero_same_arrow_left' => array(
            //     'label' => __('Left Arrow Style', 'slider_bin'),
            //     'placeholder' => '',
            //     'type' => 'select',
            // ),
            // 'hero_same_arrow_right' => array(
            //     'label' => __('Right Arrow Style', 'slider_bin'),
            //     'placeholder' => '',
            //     'type' => 'select',
            // ),
            'hero_same_button_padding' => array(
                'label' => __('Button Padding', 'slider_bin'),
                'placeholder' => '10px 20px 10px 20px'
            ),
            'hero_same_button_margin' => array(
                'label' => __('Button Margin', 'slider_bin'),
                'placeholder' => '30px 0 30px 0'
            ),
            'hero_same_button_font_size' => array(
                'label' => __('Button Font Size', 'slider_bin'),
                'placeholder' => '14px'
            ),
            'hero_same_button_font_family' => array(
                'label' => __('Button Font Family', 'slider_bin'),
                'placeholder' => 'Arial, sans-serif'
            ),
            'hero_same_button_font_weight' => array(
                'label' => __('Button Font Weight', 'slider_bin'),
                'placeholder' => '400'
            ),
            'hero_same_button_color' => array(
                'label' => __('Button Font Color', 'slider_bin'),
                'placeholder' => '#ffffff',
                'type' => 'color'
            ),
            'hero_same_button_text_decoration' => array(
                'label' => __('Button Text Decoration', 'slider_bin'),
                'placeholder' => 'none'
            ),
            'hero_same_button_text_align' => array(
                'label' => __('Button Text Alignment', 'slider_bin'),
                'placeholder' => 'center'
            ),
            'hero_same_button_bg_color' => array(
                'label' => __('Button Background Color', 'slider_bin'),
                'placeholder' => '#ff5733',
                'type' => 'color'
            ),
            'hero_same_button_border_color' => array(
                'label' => __('Border Color', 'slider_bin'),
                'placeholder' => '#ff5733',
                'type' => 'color'
            ),
            'hero_same_button_border_width' => array(
                'label' => __('Border Width', 'slider_bin'),
                'placeholder' => '1px'
            ),
            'hero_same_button_border_style' => array(
                'label' => __('Border Style', 'slider_bin'),
                'placeholder' => 'solid/dotted/dashed'
            ),
            'hero_same_button_border_radius' => array(
                'label' => __('Border Radius', 'slider_bin'),
                'placeholder' => '5px'
            ),
            'hero_same_button_box_shadow' => array(
                'label' => __('Button Box Shadow', 'slider_bin'),
                'placeholder' => '0px 4px 6px #888888'
            ),
            'hero_same_button_target' => array(
                'label' => __('Button Target', 'slider_bin'),
                'placeholder' => '_self/_blank'
            ),
            'hero_same_left_media_file' => array(
                'label' => __('Select or Choose Left Icon', 'slider_bin'),
                'placeholder' => '',
                'type' => 'button'
            ),
            'hero_same_right_media_file' => array(
                'label' => __('Select or Choose Right Icon', 'slider_bin'),
                'placeholder' => '',
                'type' => 'button'
            ),

        );

    $hero_same_groups = array(
        'background_settings' => array(
            'title' => __('Background Settings', 'slider_bin'),
            'fields' => array(
                'hero_same_slider_width',
                'hero_same_slider_height',
                'hero_same_bg_image_size',
                'hero_same_bg_image_position',
                // 'hero_same_bg_overlay',
                'hero_same_bg_overlay_color',
                'hero_same_bg_overlay_opacity',
            ),
        ),
        'content_settings' => array(
            'title' => __('Content Settings', 'slider_bin'),
            'fields' => array(
                'hero_same_content_position_top',
                'hero_same_content_position_left',
                'hero_same_content_position_right',
                'hero_same_content_position_bottom',
                'hero_same_content_alignment',
                'hero_same_content_padding',
                'hero_same_content_margin',
            ),
        ),
        'heading_settings' => array(
            'title' => __('Heading Settings', 'slider_bin'),
            'fields' => array(
                'hero_same_heading_font_family',
                'hero_same_heading_font_size',
                'hero_same_heading_font_weight',
                'hero_same_heading_line_height',
                'hero_same_heading_color',
                'hero_same_heading_margin',
                'hero_same_heading_padding',
            ),
        ),
        'subheading_settings' => array(
            'title' => __('Subheading Settings', 'slider_bin'),
            'fields' => array(
                'hero_same_subheading_font_family',
                'hero_same_subheading_font_size',
                'hero_same_subheading_font_weight',
                'hero_same_subheading_line_height',
                'hero_same_subheading_color',
                'hero_same_subheading_margin',
                'hero_same_subheading_padding',
            ),
        ),
        'button_settings' => array(
            'title' => __('Button Settings', 'slider_bin'),
            'fields' => array(
                'hero_same_button_font_family',
                'hero_same_button_font_weight',
                'hero_same_button_font_size',
                'hero_same_button_color',
                'hero_same_button_padding',
                'hero_same_button_margin',
                'hero_same_button_bg_color',
                'hero_same_button_border_style',
                'hero_same_button_border_width',
                'hero_same_button_border_color',
                'hero_same_button_border_radius',
                'hero_same_button_box_shadow',
                'hero_same_button_text_decoration',
                'hero_same_button_text_align',
                'hero_same_button_target',
            ),
        ),
        'arrow_settings' => array(
            'title' => __('Arrow Settings', 'slider_bin'),
            'fields' => array(
                'hero_same_left_media_file',
                'hero_same_right_media_file',
                'hero_same_left_arrow_position_left',
                'hero_same_left_arrow_position_top',
                'hero_same_left_arrow_position_right',
                'hero_same_left_arrow_position_bottom',
                'hero_same_left_arrow_color',
                'hero_same_left_arrow_opacity',
                'hero_same_left_arrow_height',
                'hero_same_left_arrow_width',
                'hero_same_right_arrow_position_left',
                'hero_same_right_arrow_position_top',
                'hero_same_right_arrow_position_right',
                'hero_same_right_arrow_position_bottom',
                'hero_same_right_arrow_color',
                'hero_same_right_arrow_opacity',
                'hero_same_right_arrow_height',
                'hero_same_right_arrow_width',
            ),
        ),
    );

    // Register fields dynamically based on groups

    if (!empty($hero_same_groups)) {
        foreach ($hero_same_groups as $group_key => $group) {
            add_settings_section(
                'slider_bin_hero_same_' . $group_key . '_section',
                $group['title'],
                null,
                'slider_bin_hero_same_section'
            );

            foreach ($group['fields'] as $field_id) {
                if (!isset($hero_same_fields[$field_id])) {
                    continue;
                }
                $field = $hero_same_fields[$field_id];

                add_settings_field(
                    $field_id,
                    $field['label'],
                    array($this, 'render_settings_field'),
                    'slider_bin_hero_same_section',
                    'slider_bin_hero_same_' . $group_key . '_section',
                    array(
                        'id' => $field_id,
                        'placeholder' => $field['placeholder'],
                        'type' => isset($field['type']) ? $field['type'] : 'text'
                    )
                );
            }
        }
    }