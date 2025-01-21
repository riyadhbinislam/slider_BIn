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
            'type' => 'select',
            'options'   => array(
                'auto' => __('Auto', 'slider_bin'),
                'cover' => __('Cover', 'slider_bin'),
                'contain' => __('Contain', 'slider_bin'),
                '25% 25%' => __('25% 25%', 'slider_bin'),
                '50% 50%' => __('50% 50%', 'slider_bin'),
                '75% 75%' => __('75% 75%', 'slider_bin'),
                '100% 100%' => __('100% 100%', 'slider_bin'),
            ),
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

// Content Settings Fields

        'post_slider_content_position' => array(
            'label' => __('Position', 'slider_bin'),
            'fields' => array(
                'post_slider_content_position_left' => array(
                    'placeholder' => 'Left'
                ),
                'post_slider_content_position_top' => array(
                    'placeholder' => 'Top'
                ),
                'post_slider_content_position_right' => array(
                    'placeholder' => 'Right'
                ),
                'post_slider_content_position_bottom' => array(
                    'placeholder' => 'Bottom'
                ),
            ),
        ),
        'post_slider_content_alignment' => array(
            'label' => __('Alignment', 'slider_bin'),
            'placeholder' => 'center'
        ),
        'post_slider_content_padding' => array(
            'label' => __('Padding', 'slider_bin'),
            'fields' => array(
                'post_slider_content_padding_left' => array(
                    'placeholder' => 'Left'
                ),
                'post_slider_content_padding_top' => array(
                    'placeholder' => 'Top'
                ),
                'post_slider_content_padding_right' => array(
                    'placeholder' => 'Right'
                ),
                'post_slider_content_padding_bottom' => array(
                    'placeholder' => 'Bottom'
                ),
            ),
        ),
        'post_slider_content_margin' => array(
            'label' => __('Margin', 'slider_bin'),
            'fields' => array(
                'post_slider_content_margin_left' => array(
                    'placeholder' => 'Left'
                ),
                'post_slider_content_margin_top' => array(
                    'placeholder' => 'Top'
                ),
                'post_slider_content_margin_right' => array(
                    'placeholder' => 'Right'
                ),
                'post_slider_content_margin_bottom' => array(
                    'placeholder' => 'Bottom'
                ),
            ),
        ),

// Heading Settings Fields

        'post_slider_heading_font_family' => array(
            'label' => __('Font Family', 'slider_bin'),
            'placeholder' => 'Arial, sans-serif'
        ),
        'post_slider_heading_font_size' => array(
            'label' => __('Font Size', 'slider_bin'),
            'placeholder' => '32px'
        ),
        'post_slider_heading_font_weight' => array(
            'label' => __('Font Weight', 'slider_bin'),
            'placeholder' => '700'
        ),
        'post_slider_heading_line_height' => array(
            'label' => __('Line Height', 'slider_bin'),
            'placeholder' => '1.2'
        ),
        'post_slider_heading_color' => array(
            'label' => __('Color', 'slider_bin'),
            'placeholder' => '#ffffff',
            'type' => 'color'
        ),
        'post_slider_heading_margin' => array(
            'label' => __('Margin', 'slider_bin'),
            'fields' => array(
                'post_slider_heading_margin_left' => array(
                    'placeholder' => 'Left'
                ),
                'post_slider_heading_margin_top' => array(
                    'placeholder' => 'Top'
                ),
                'post_slider_heading_margin_right' => array(
                    'placeholder' => 'Right'
                ),
                'post_slider_heading_margin_bottom' => array(
                    'placeholder' => 'Bottom'
                ),
            ),
        ),
        'post_slider_heading_padding' => array(
            'label' => __('Padding', 'slider_bin'),
            'fields' => array(
                'post_slider_heading_padding_left' => array(
                    'placeholder' => 'Left'
                ),
                'post_slider_heading_padding_top' => array(
                    'placeholder' => 'Top'
                ),
                'post_slider_heading_padding_right' => array(
                    'placeholder' => 'Right'
                ),
                'post_slider_heading_padding_bottom' => array(
                    'placeholder' => 'Bottom'
                ),
            ),
        ),

// Subheading Settings Fields

        'post_slider_subheading_font_family' => array(
            'label' => __('Font Family', 'slider_bin'),
            'placeholder' => 'Arial, sans-serif'
        ),
        'post_slider_subheading_font_size' => array(
            'label' => __('Font Size', 'slider_bin'),
            'placeholder' => '18px'
        ),
        'post_slider_subheading_font_weight' => array(
            'label' => __('Font Weight', 'slider_bin'),
            'placeholder' => '400'
        ),
        'post_slider_subheading_line_height' => array(
            'label' => __('Line Height', 'slider_bin'),
            'placeholder' => '1.5'
        ),
        'post_slider_subheading_color' => array(
            'label' => __('Color', 'slider_bin'),
            'placeholder' => '#ffffff',
            'type' => 'color'
        ),
        'post_slider_subheading_margin' => array(
            'label' => __('Margin', 'slider_bin'),
            'fields' => array(
                'post_slider_subheading_margin_left' => array(
                    'placeholder' => 'Left'
                ),
                'post_slider_subheading_margin_top' => array(
                    'placeholder' => 'Top'
                ),
                'post_slider_subheading_margin_right' => array(
                    'placeholder' => 'Right'
                ),
                'post_slider_subheading_margin_bottom' => array(
                    'placeholder' => 'Bottom'
                ),
            ),
        ),
        'post_slider_subheading_padding' => array(
            'label' => __('Padding', 'slider_bin'),
            'fields' => array(
                'post_slider_subheading_padding_left' => array(
                    'placeholder' => 'Left'
                ),
                'post_slider_subheading_padding_top' => array(
                    'placeholder' => 'Top'
                ),
                'post_slider_subheading_padding_right' => array(
                    'placeholder' => 'Right'
                ),
                'post_slider_subheading_padding_bottom' => array(
                    'placeholder' => 'Bottom'
                ),
            ),
        ),

// Arrow Settings Fields

        'post_slider_arrow_position' => array(
            'label' => __('Position', 'slider_bin'),
            'fields' => array(
                'post_slider_left_arrow_position_left' => array(
                    'placeholder' => 'Left'
                ),
                'post_slider_left_arrow_position_top' => array(
                    'placeholder' => 'Top'
                ),
                'post_slider_left_arrow_position_right' => array(
                    'placeholder' => 'Right'
                ),
                'post_slider_left_arrow_position_bottom' => array(
                    'placeholder' => 'Bottom'
                ),
            ),
        ),
        'post_slider_arrow_color' => array(
            'label' => __('Color', 'slider_bin'),
            'placeholder' => '#ffffff',
            'type' => 'color'
        ),
        'post_slider_arrow_opacity' => array(
            'label' => __('Opacity', 'slider_bin'),
            'placeholder' => '0.8'
        ),
        'post_slider_arrow_height' => array(
            'label' => __('Height', 'slider_bin'),
            'placeholder' => '40px'
        ),
        'post_slider_arrow_width' => array(
            'label' => __('Width', 'slider_bin'),
            'placeholder' => '40px'
        ),
        'post_slider_left_media_file' => array(
                'label' => __('Select Left Icon', 'slider_bin'),
                'placeholder' => '',
                'type' => 'button'
        ),
        'post_slider_right_media_file' => array(
            'label' => __('Select Right Icon', 'slider_bin'),
            'placeholder' => '',
            'type' => 'button'
        ),

// Button Settings Fields

        'post_slider_button_padding' => array(
            'label' => __( 'Padding', 'slider_bin'),
            'fields' => array(
                'post_slider_button_padding_left' => array(
                    'placeholder' => 'Left'
                ),
                'post_slider_button_padding_top' => array(
                    'placeholder' => 'Top'
                ),
                'post_slider_button_padding_right' => array(
                    'placeholder' => 'Right'
                ),
                'post_slider_button_padding_bottom' => array(
                    'placeholder' => 'Bottom'
                ),
            ),
        ),
        'post_slider_button_margin' => array(
            'label' => __('Margin', 'slider_bin'),
            'fields' => array(
                'post_slider_button_margin_left' => array(
                    'placeholder' => 'Left'
                ),
                'post_slider_button_margin_top' => array(
                    'placeholder' => 'Top'
                ),
                'post_slider_button_margin_right' => array(
                    'placeholder' => 'Right'
                ),
                'post_slider_button_margin_bottom' => array(
                    'placeholder' => 'Bottom'
                ),
            ),
        ),
        'post_slider_button_font_size' => array(
            'label' => __('Font Size', 'slider_bin'),
            'placeholder' => '14px'
        ),
        'post_slider_button_color' => array(
            'label' => __('Font Color', 'slider_bin'),
            'placeholder' => '#ffffff',
            'type' => 'color'
        ),
        'post_slider_button_bg_color' => array(
            'label' => __('Background Color', 'slider_bin'),
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
            'type' => 'select',
            'options' => array(
                'none' => __('None', 'slider_bin'),
                'solid' => __('Solid', 'slider_bin'),
                'dotted' => __('Dotted', 'slider_bin'),
                'dashed' => __('Dashed', 'slider_bin'),
                'double' => __('Double', 'slider_bin'),
                'groove' => __('Groove', 'slider_bin'),
                'ridge' => __('Ridge', 'slider_bin'),
                'inset' => __('Inset', 'slider_bin'),
                'outset' => __('Outset', 'slider_bin'),
            ),
        ),
        'post_slider_button_border_radius' => array(
            'label' => __('Border Radius', 'slider_bin'),
            'placeholder' => '5px'
        ),
        'post_slider_button_box_shadow' => array(
            'label' => __('Box Shadow', 'slider_bin'),
            'placeholder' => '0px 4px 6px #888888'
        ),
        'post_slider_button_text_align' => array(
            'label' => __('Text Align', 'slider_bin'),
            'placeholder' => 'center'
        ),
        'post_slider_button_text_decoration' => array(
            'label' => __('Text Decoration', 'slider_bin'),
            'placeholder' => 'none'
        ),
        'post_slider_button_font_family' => array(
            'label' => __('Font Family', 'slider_bin'),
            'placeholder' => 'Arial, sans-serif'
        ),
        'post_slider_button_font_weight' => array(
            'label' => __('Font Weight', 'slider_bin'),
            'placeholder' => '400'
        ),
        'post_slider_button_target' => array(
            'label' => __('Button Target', 'slider_bin'),
            'type' => 'select',
            'options' => array(
                '_self' => __('Self', 'slider_bin'),
                '_blank' => __('Blank', 'slider_bin'),
            ),
        ),

// Pagination Settings Fields

        'post_slider_pagination_height' => array(
            'label' => __('Height', 'slider_bin'),
            'placeholder' => '15px'
        ),
        'post_slider_pagination_width' => array(
            'label' => __('width', 'slider_bin'),
            'placeholder' => '15px'
        ),
        'post_slider_pagination_gap' => array(
            'label' => __('Gap', 'slider_bin'),
            'placeholder' => '5px'
        ),
        'post_slider_pagination_color' => array(
            'label' => __('Color', 'slider_bin'),
            'placeholder' => '#8E1616',
            'type' => 'color'
        ),
        'post_slider_pagination_active_color' => array(
            'label' => __('Color On Active', 'slider_bin'),
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
                'post_slider_content_alignment',
                'post_slider_content_position',
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
                'post_slider_heading_padding',
                'post_slider_heading_margin',
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
                'post_slider_subheading_padding',
                'post_slider_subheading_margin',
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
                'post_slider_arrow_position',
                'post_slider_arrow_color',
                'post_slider_arrow_opacity',
                'post_slider_arrow_width',
                'post_slider_arrow_height',
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

    // Register fields dynamically based on groups

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
                    continue;
                }
                $field = $post_slider_fields[$field_id];

                // Field has no subfields
                $args = array(
                    'id' => $field_id,
                    'label' => isset($field['label']) ? $field['label'] : '',
                    'placeholder' => isset($field['placeholder']) ? $field['placeholder'] : '',
                    'type' => isset($field['type']) ? $field['type'] : 'text',
                );

                // Add options for select type fields
                if (isset($field['type']) && $field['type'] === 'select' && isset($field['options'])) {
                    $args['options'] = $field['options'];
                }

                // Include subfields in args
                if (isset($field['fields']) && is_array($field['fields'])) {
                    $args['fields'] = $field['fields'];
                }

                // Field has subfields
                add_settings_field(
                    $field_id,
                    $field['label'],
                    array($this, 'render_settings_field'),
                    'slider_bin_post_slider_section',
                    'slider_bin_post_slider_' . $group_key . '_section',
                    $args
                );
            }
        }
    }
