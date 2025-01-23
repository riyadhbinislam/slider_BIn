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
                'type' => 'select',
                'options' => array(
                    'cover' => 'Cover',
                    'contain' => 'Contain',
                    'auto' => 'Auto',
                    '50%' => '50%',
                    '25%' => '25%',
                    '75%' => '75%',
                ),
                'placeholder' => 'cover / contain / auto'
            ),
            'hero_same_bg_overlay_color' => array(
                'label' => __('Background Image Overlay Color', 'slider_bin'),
                'placeholder' => '#000000',
                'type' => 'color'
            ),
            'hero_same_bg_overlay_opacity' => array(
                'label' => __('Background Image Overlay Opacity', 'slider_bin'),
                'placeholder' => '0.5'
            ),

// Heading Fields

            'hero_same_heading_font_family' => array(
                'label' => __('Font Family', 'slider_bin'),
                'placeholder' => 'Arial, sans-serif'
            ),
            'hero_same_heading_font_size' => array(
                'label' => __('Font Size', 'slider_bin'),
                'placeholder' => '32px'
            ),
            'hero_same_heading_font_weight' => array(
                'label' => __('Font Weight', 'slider_bin'),
                'placeholder' => '700'
            ),
            'hero_same_heading_line_height' => array(
                'label' => __('Line Height', 'slider_bin'),
                'placeholder' => '1.2'
            ),
            'hero_same_heading_color' => array(
                'label' => __('Color', 'slider_bin'),
                'placeholder' => '#ffffff',
                'type' => 'color'
            ),
            'hero_same_heading_text_align' => array(
                'label' => __('Text Alignment', 'slider_bin'),
                'placeholder' => 'center',
            ),
            'hero_same_heading_margin' => array(
                'label' => __('Margin', 'slider_bin'),
                'fields' => array(
                    'hero_same_heading_margin_left' => array(
                        'placeholder' => 'Left',
                    ),
                    'hero_same_heading_margin_top' => array(
                        'placeholder' => 'Top',
                    ),
                    'hero_same_heading_margin_right' => array(
                        'placeholder' => 'Right',
                    ),
                    'hero_same_heading_margin_bottom' => array(
                        'placeholder' => 'Bottom',
                    ),
                )

            ),
            'hero_same_heading_padding' => array(
                'label' => __('Padding', 'slider_bin'),
                'fields' => array(
                    'hero_same_heading_padding_left' => array(
                        'placeholder' => 'Left',
                    ),
                    'hero_same_heading_padding_top' => array(
                        'placeholder' => 'Top',
                    ),
                    'hero_same_heading_padding_right' => array(
                        'placeholder' => 'Right',
                    ),
                    'hero_same_heading_padding_bottom' => array(
                        'placeholder' => 'Bottom',
                    ),
                )

            ),

// Subheading Fields

            'hero_same_subheading_font_family' => array(
                'label' => __('Font Family', 'slider_bin'),
                'placeholder' => 'Arial, sans-serif'
            ),
            'hero_same_subheading_font_size' => array(
                'label' => __('Font Size', 'slider_bin'),
                'placeholder' => '18px'
            ),
            'hero_same_subheading_font_weight' => array(
                'label' => __('Font Weight', 'slider_bin'),
                'placeholder' => '400'
            ),
            'hero_same_subheading_line_height' => array(
                'label' => __('Line Height', 'slider_bin'),
                'placeholder' => '1.5'
            ),
            'hero_same_subheading_color' => array(
                'label' => __('Color', 'slider_bin'),
                'placeholder' => '#ffffff',
                'type' => 'color'
            ),
            'hero_same_subheading_margin' => array(
                'label' => __('Margin', 'slider_bin'),
                'fields' => array(
                    'hero_same_subheading_margin_left' => array(
                        'placeholder' => 'Left',
                    ),
                    'hero_same_subheading_margin_top' => array(
                        'placeholder' => 'Top',
                    ),
                    'hero_same_subheading_margin_right' => array(
                        'placeholder' => 'Right',
                    ),
                    'hero_same_subheading_margin_bottom' => array(
                        'placeholder' => 'Bottom',
                    ),
                )

            ),
            'hero_same_subheading_padding' => array(
                'label' => __('Padding', 'slider_bin'),
                'fields' => array(
                    'hero_same_subheading_padding_left' => array(
                        'placeholder' => 'Left',
                    ),
                    'hero_same_subheading_padding_top' => array(
                        'placeholder' => 'Top',
                    ),
                    'hero_same_subheading_padding_right' => array(
                        'placeholder' => 'Right',
                    ),
                    'hero_same_subheading_padding_bottom' => array(
                        'placeholder' => 'Bottom',
                    ),
                )

            ),

// Arrow Fields
            'hero_same_arrow_position' => array(
                'label' => __('Arrow Position', 'slider_bin'),
                'fields' => array(
                    'hero_same_arrow_position_left' => array(
                        'placeholder' => 'Left',
                    ),
                    'hero_same_arrow_position_top' => array(
                        'placeholder' => 'Top',
                    ),
                    'hero_same_arrow_position_right' => array(
                        'placeholder' => 'Right',
                    ),
                    'hero_same_arrow_position_bottom' => array(
                        'placeholder' => 'Bottom',
                    ),
                )

            ),
            'hero_same_arrow_opacity' => array(
                'label' => __('Opacity', 'slider_bin'),
                'placeholder' => '0.8'
            ),
            'hero_same_arrow_height' => array(
                'label' => __('Height', 'slider_bin'),
                'placeholder' => '40px'
            ),
            'hero_same_arrow_width' => array(
                'label' => __('Width', 'slider_bin'),
                'placeholder' => '40px'
            ),
            'hero_same_left_media_file' => array(
                'label' => __('Select Left Icon', 'slider_bin'),
                'placeholder' => '',
                'type' => 'button'
            ),
            'hero_same_right_media_file' => array(
                'label' => __('Select Right Icon', 'slider_bin'),
                'placeholder' => '',
                'type' => 'button'
            ),

// Button Fields

            'hero_same_button_padding' => array(
                'label' => __('Padding', 'slider_bin'),
                'fields' => array(
                    'hero_same_button_padding_left' => array(
                        'placeholder' => 'Left',
                    ),
                    'hero_same_button_padding_top' => array(
                        'placeholder' => 'Top',
                    ),
                    'hero_same_button_padding_right' => array(
                        'placeholder' => 'Right',
                    ),
                    'hero_same_button_padding_bottom' => array(
                        'placeholder' => 'Bottom',
                    ),
                )
            ),
            'hero_same_button_margin' => array(
                'label' => __('Margin', 'slider_bin'),
                'fields' => array(
                    'hero_same_button_margin_left' => array(
                        'placeholder' => 'Left',
                    ),
                    'hero_same_button_margin_top' => array(
                        'placeholder' => 'Top',
                    ),
                    'hero_same_button_margin_right' => array(
                        'placeholder' => 'Right',
                    ),
                    'hero_same_button_margin_bottom' => array(
                        'placeholder' => 'Bottom',
                    ),
                )
            ),
            'hero_same_button_font_size' => array(
                'label' => __('Font Size', 'slider_bin'),
                'placeholder' => '14px'
            ),
            'hero_same_button_font_family' => array(
                'label' => __('Font Family', 'slider_bin'),
                'placeholder' => 'Arial, sans-serif'
            ),
            'hero_same_button_font_weight' => array(
                'label' => __('Font Weight', 'slider_bin'),
                'placeholder' => '400'
            ),
            'hero_same_button_color' => array(
                'label' => __('Font Color', 'slider_bin'),
                'placeholder' => '#ffffff',
                'type' => 'color'
            ),
            'hero_same_button_text_decoration' => array(
                'label' => __('Text Decoration', 'slider_bin'),
                'placeholder' => 'none'
            ),
            'hero_same_button_text_align' => array(
                'label' => __('Text Alignment', 'slider_bin'),
                'placeholder' => 'center'
            ),
            'hero_same_button_bg_color' => array(
                'label' => __('Background Color', 'slider_bin'),
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
                'placeholder' => 'solid'
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
                'type' => 'select',
                'options' => array(
                    '_self' => '_self',
                    '_blank' => '_blank'
                ),
                'placeholder' => '_self'
            ),

// Pagination Fields

            'hero_same_pagination_height' => array(
                'label' => __('Height', 'slider_bin'),
                'placeholder' => '15px'
            ),
            'hero_same_pagination_width' => array(
                'label' => __('width', 'slider_bin'),
                'placeholder' => '15px'
            ),
            'hero_same_pagination_gap' => array(
                'label' => __('Gap', 'slider_bin'),
                'placeholder' => '5px'
            ),
            'hero_same_pagination_color' => array(
                'label' => __('Color', 'slider_bin'),
                'placeholder' => '#8E1616',
                'type' => 'color'
            ),
            'hero_same_pagination_active_color' => array(
                'label' => __('Color On Active', 'slider_bin'),
                'placeholder' => '#D84040',
                'type' => 'color'
            ),

// Content Fields

            'hero_same_content_padding' => array(
                'label' => __('Padding', 'slider_bin'),
                'fields' => array(
                    'hero_same_content_padding_left' => array(
                        'placeholder' => 'Left',
                    ),
                    'hero_same_content_padding_top' => array(
                        'placeholder' => 'Top',
                    ),
                    'hero_same_content_padding_right' => array(
                        'placeholder' => 'Right',
                    ),
                    'hero_same_content_padding_bottom' => array(
                        'placeholder' => 'Bottom',
                    ),
                )

            ),
            'hero_same_content_margin' => array(
                'label' => __('Margin', 'slider_bin'),
                'fields' => array(
                    'hero_same_content_margin_left' => array(
                        'placeholder' => 'Left',
                    ),
                    'hero_same_content_margin_top' => array(
                        'placeholder' => 'Top',
                    ),
                    'hero_same_content_margin_right' => array(
                        'placeholder' => 'Right',
                    ),
                    'hero_same_content_margin_bottom' => array(
                        'placeholder' => 'Bottom',
                    ),
                )

            ),
            'hero_same_content_position' => array(
                'label' => __('Position', 'slider_bin'),
                'fields' => array(
                    'hero_same_content_position_left' => array(
                        'label' => __('Left', 'slider_bin'),
                        'placeholder' => 'Left'
                    ),
                    'hero_same_content_position_top' => array(
                        'label' => __('Top', 'slider_bin'),
                        'placeholder' => 'Top'
                    ),
                    'hero_same_content_position_right' => array(
                        'label' => __('Right', 'slider_bin'),
                        'placeholder' => 'Right'
                    ),
                    'hero_same_content_position_bottom' => array(
                        'label' => __('Bottom', 'slider_bin'),
                        'placeholder' => 'Bottom'
                    ),
                )
            ),
            'hero_same_content_alignment' => array(
                'label' => __('Alignment', 'slider_bin'),
                'placeholder' => 'center'
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
                'hero_same_bg_overlay_color',
                'hero_same_bg_overlay_opacity',
            ),
        ),
        'content_settings' => array(
            'title' => __('Content Settings', 'slider_bin'),
            'fields' => array(
                'hero_same_content_alignment',
                'hero_same_content_position',
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
                'hero_same_heading_text_align',
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
                'hero_same_arrow_position',
                'hero_same_arrow_color',
                'hero_same_arrow_opacity',
                'hero_same_arrow_height',
                'hero_same_arrow_width',
            ),
        ),
        'pagination_settings' => array(
            'title' => __('Pagination Settings', 'slider_bin'),
            'fields' => array(
                'hero_same_pagination_height',
                'hero_same_pagination_width',
                'hero_same_pagination_gap',
                'hero_same_pagination_color',
                'hero_same_pagination_active_color',
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
                    'slider_bin_hero_same_section',
                    'slider_bin_hero_same_' . $group_key . '_section',
                    $args
                );
            }
        }
    }
