<?php

    // Image Slider Settings
    add_settings_section(
        'slider_bin_image_slider_section',
        '',
        null,
        'slider_bin_image_slider_section'
    );

    $image_slider_fields = array(
        'image_slider_width' => array(
            'label' => __('Slider Width', 'slider_bin'),
            'placeholder' => '100%'
        ),
        'image_slider_height' => array(
            'label' => __('Slider Height', 'slider_bin'),
            'placeholder' => '100%'
        ),

// Caption Fields

        'image_slider_caption_position' => array(
            'label' => __('Position', 'slider_bin'),
            'fields' => array(
                'image_slider_caption_position_left' => array(
                    'label' => __('Image Caption Position-Left', 'slider_bin'),
                    'placeholder' => 'Left'
                ),
                'image_slider_caption_position_top' => array(
                    'label' => __('Image Caption Position-Top', 'slider_bin'),
                    'placeholder' => 'Top'
                ),
                'image_slider_caption_position_right' => array(
                    'label' => __('Image Caption Position-Right', 'slider_bin'),
                    'placeholder' => 'Right'
                ),
                'image_slider_caption_position_bottom' => array(
                    'label' => __('Image Caption Position-Bottom', 'slider_bin'),
                    'placeholder' => 'Bottom'
                ),
            )
        ),
        'image_slider_caption_alignment' => array(
            'label' => __('Text Alignment', 'slider_bin'),
            'placeholder' => 'left/center/right'
        ),
        'image_slider_caption_padding' => array(
            'label' => __('Padding', 'slider_bin'),
            'fields' => array(
                'image_slider_caption_padding_left' => array(
                    'placeholder' => 'Left',
                ),
                'image_slider_caption_padding_top' => array(
                    'placeholder' => 'Top',
                ),
                'image_slider_caption_padding_right' => array(
                    'placeholder' => 'Right',
                ),
                'image_slider_caption_padding_bottom' => array(
                    'placeholder' => 'Bottom',
                ),
            )
        ),
        'image_slider_caption_margin' => array(
            'label' => __('Margin', 'slider_bin'),
            'fields' => array(
                'image_slider_caption_margin_left' => array(
                    'placeholder' => 'Left',
                ),
                'image_slider_caption_margin_top' => array(
                    'placeholder' => 'Top',
                ),
                'image_slider_caption_margin_right' => array(
                    'placeholder' => 'Right',
                ),
                'image_slider_caption_margin_bottom' => array(
                    'placeholder' => 'Bottom',
                ),
            )
        ),
        'image_slider_caption_font_size' => array(
            'label' => __('Font Size', 'slider_bin'),
            'placeholder' => '16px'
        ),
        'image_slider_caption_font_weight' => array(
            'label' => __('Font Weight', 'slider_bin'),
            'placeholder' => '400'
        ),
        'image_slider_caption_line_height' => array(
            'label' => __('Line Height', 'slider_bin'),
            'placeholder' => '1.5'
        ),
        'image_slider_caption_color' => array(
            'label' => __('Color', 'slider_bin'),
            'placeholder' => '#ffffff',
            'type' => 'color'
        ),

// Arrow Fields
        'image_slider_left_media_file' => array(
            'label' => __('Select Left Icon', 'slider_bin'),
            'placeholder' => '',
            'type' => 'button'
        ),
        'image_slider_right_media_file' => array(
            'label' => __('Select Right Icon', 'slider_bin'),
            'placeholder' => '',
            'type' => 'button'
        ),
        'image_slider_arrow_position' => array(
            'label' => __('Position', 'slider_bin'),
            'fields' => array(
                'image_slider_arrow_position_left' => array(
                    'placeholder' => 'Left',
                ),
                'image_slider_arrow_position_top' => array(
                    'placeholder' => 'Top',
                ),
                'image_slider_arrow_position_right' => array(
                    'placeholder' => 'Right',
                ),
                'image_slider_arrow_position_bottom' => array(
                    'placeholder' => 'Bottom',
                ),
            )

        ),
        'image_slider_arrow_color' => array(
            'label' => __('Color', 'slider_bin'),
            'placeholder' => '#ffffff',
            'type' => 'color'
        ),
        'image_slider_arrow_opacity' => array(
            'label' => __('Opacity', 'slider_bin'),
            'placeholder' => '0.8'
        ),
        'image_slider_arrow_height' => array(
            'label' => __('Height', 'slider_bin'),
            'placeholder' => '40px'
        ),
        'image_slider_arrow_width' => array(
            'label' => __('Width', 'slider_bin'),
            'placeholder' => '40px'
        ),

// Pagination Fields

        'image_slider_pagination_height' => array(
            'label' => __('Height', 'slider_bin'),
            'placeholder' => '15px'
        ),
        'image_slider_pagination_width' => array(
            'label' => __('width', 'slider_bin'),
            'placeholder' => '15px'
        ),
        'image_slider_pagination_gap' => array(
            'label' => __('Gap', 'slider_bin'),
            'placeholder' => '5px'
        ),
        'image_slider_pagination_color' => array(
            'label' => __('Color', 'slider_bin'),
            'placeholder' => '#8E1616',
            'type' => 'color'
        ),
        'image_slider_pagination_active_color' => array(
            'label' => __('Color On Active', 'slider_bin'),
            'placeholder' => '#D84040',
            'type' => 'color'
        ),

    );

    $image_slider_groups = array(
        'slider_settings' => array(
            'title' => __('Slider Settings', 'slider_bin'),
            'fields' => array(
                'image_slider_width',
                'image_slider_height',
            ),
        ),
        'caption_settings' => array(
            'title' => __('Caption Settings', 'slider_bin'),
            'fields' => array(
                'image_slider_caption_position',
                'image_slider_caption_alignment',
                'image_slider_caption_padding',
                'image_slider_caption_font_size',
                'image_slider_caption_font_weight',
                'image_slider_caption_line_height',
                'image_slider_caption_color',
                'image_slider_caption_margin',
            ),
        ),
        'arrow_settings' => array(
            'title' => __('Arrow Settings', 'slider_bin'),
            'fields' => array(
                'image_slider_left_media_file',
                'image_slider_right_media_file',
                'image_slider_arrow_position',
                'image_slider_arrow_color',
                'image_slider_arrow_opacity',
                'image_slider_arrow_height',
                'image_slider_arrow_width',
            ),
        ),
        'pagination_settings' => array(
            'title' => __('Pagination Settings', 'slider_bin'),
            'fields' => array(
                'image_slider_pagination_height',
                'image_slider_pagination_width',
                'image_slider_pagination_gap',
                'image_slider_pagination_color',
                'image_slider_pagination_active_color',
            ),
        ),
    );

//Registering the fields

    if (!empty($image_slider_groups)) {
        foreach ($image_slider_groups as $group_key => $group) {
            add_settings_section(
                'slider_bin_image_slider_' . $group_key . '_section',
                $group['title'],
                null,
                'slider_bin_image_slider_section'
            );

            foreach ($group['fields'] as $field_id) {
                if (!isset($image_slider_fields[$field_id])) {
                    continue;
                }
                $field = $image_slider_fields[$field_id];

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
                    'slider_bin_image_slider_section',
                    'slider_bin_image_slider_' . $group_key . '_section',
                    $args
                );
            }
        }
    }