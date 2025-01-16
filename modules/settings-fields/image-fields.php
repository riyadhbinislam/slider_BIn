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
        'image_slider_caption_position_top' => array(
            'label' => __('Image Caption Position-Top', 'slider_bin'),
            'placeholder' => '10px'
        ),
        'image_slider_caption_position_left' => array(
            'label' => __('Image Caption Position-Left', 'slider_bin'),
            'placeholder' => '10px'
        ),
        'image_slider_caption_position_right' => array(
            'label' => __('Image Caption Position-Right', 'slider_bin'),
            'placeholder' => '10px'
        ),
        'image_slider_caption_position_bottom' => array(
            'label' => __('Image Caption Position-Bottom', 'slider_bin'),
            'placeholder' => '10px'
        ),
        'image_slider_caption_alignment' => array(
            'label' => __('Image Caption Alignment', 'slider_bin'),
            'placeholder' => 'left/center/right'
        ),
        'image_slider_caption_padding' => array(
            'label' => __('Image Caption Padding', 'slider_bin'),
            'placeholder' => '10px'
        ),
        'image_slider_caption_margin' => array(
            'label' => __('Image Caption Margin', 'slider_bin'),
            'placeholder' => '10px'
        ),
        'image_slider_caption_font_size' => array(
            'label' => __('Image Caption Font Size', 'slider_bin'),
            'placeholder' => '16px'
        ),
        'image_slider_caption_font_weight' => array(
            'label' => __('Image Caption Font Weight', 'slider_bin'),
            'placeholder' => '400'
        ),
        'image_slider_caption_line_height' => array(
            'label' => __('Image Caption Line Height', 'slider_bin'),
            'placeholder' => '1.5'
        ),
        'image_slider_caption_color' => array(
            'label' => __('Image Caption Color', 'slider_bin'),
            'placeholder' => '#ffffff',
            'type' => 'color'
        ),
        'image_slider_left_arrow_position_left' => array(
            'label' => __('Left Arrow Position-Left', 'slider_bin'),
            'placeholder' => '10% or 10px'
        ),
        'image_slider_left_arrow_position_top' => array(
            'label' => __('Left Arrow Position-Top', 'slider_bin'),
            'placeholder' => '10% or 10px'
        ),
        'image_slider_left_arrow_position_right' => array(
            'label' => __('Left Arrow Position-Right', 'slider_bin'),
            'placeholder' => '10% or 10px'
        ),
        'image_slider_left_arrow_position_bottom' => array(
            'label' => __('Left Arrow Position-Bottom', 'slider_bin'),
            'placeholder' => '10% or 10px'
        ),
        'image_slider_left_arrow_color' => array(
            'label' => __('Left Arrow Color', 'slider_bin'),
            'placeholder' => '#ffffff',
            'type' => 'color'
        ),
        'image_slider_left_arrow_opacity' => array(
            'label' => __('Left Arrow Opacity', 'slider_bin'),
            'placeholder' => '0.8'
        ),
        'image_slider_left_arrow_height' => array(
            'label' => __('Left Arrow Height', 'slider_bin'),
            'placeholder' => '40px'
        ),
        'image_slider_left_arrow_width' => array(
            'label' => __('Left Arrow Width', 'slider_bin'),
            'placeholder' => '40px'
        ),
        'image_slider_right_arrow_position_left' => array(
            'label' => __('Right Arrow Position-Left', 'slider_bin'),
            'placeholder' => '10% or 10px'
        ),
        'image_slider_right_arrow_position_top' => array(
            'label' => __('Right Arrow Position-Top', 'slider_bin'),
            'placeholder' => '10% or 10px'
        ),
        'image_slider_right_arrow_position_right' => array(
            'label' => __('Right Arrow Position-Right', 'slider_bin'),
            'placeholder' => '10% or 10px'
        ),
        'image_slider_right_arrow_position_bottom' => array(
            'label' => __('Right Arrow Position-Bottom', 'slider_bin'),
            'placeholder' => '10% or 10px'
        ),
        'image_slider_right_arrow_color' => array(
            'label' => __('Right Arrow Color', 'slider_bin'),
            'placeholder' => '#ffffff',
            'type' => 'color'
        ),
        'image_slider_right_arrow_opacity' => array(
            'label' => __('Right Arrow Opacity', 'slider_bin'),
            'placeholder' => '0.8'
        ),
        'image_slider_right_arrow_height' => array(
            'label' => __('Right Arrow Height', 'slider_bin'),
            'placeholder' => '40px'
        ),
        'image_slider_right_arrow_width' => array(
            'label' => __('Right Arrow Width', 'slider_bin'),
            'placeholder' => '40px'
        ),
        'image_slider_left_media_file' => array(
                'label' => __('Select or Choose Left Icon', 'slider_bin'),
                'placeholder' => '',
                'type' => 'button'
        ),
        'image_slider_right_media_file' => array(
            'label' => __('Select or Choose Right Icon', 'slider_bin'),
            'placeholder' => '',
            'type' => 'button'
        ),
        'image_slider_pagination_height' => array(
            'label' => __('Pagination Height', 'slider_bin'),
            'placeholder' => '15px'
        ),
        'image_slider_pagination_width' => array(
            'label' => __('Pagination width', 'slider_bin'),
            'placeholder' => '15px'
        ),
        'image_slider_pagination_gap' => array(
            'label' => __('Pagination Gap', 'slider_bin'),
            'placeholder' => '5px'
        ),
        'image_slider_pagination_color' => array(
            'label' => __('Pagination Color', 'slider_bin'),
            'placeholder' => '#8E1616',
            'type' => 'color'
        ),
        'image_slider_pagination_active_color' => array(
            'label' => __('Pagination Color On Active', 'slider_bin'),
            'placeholder' => '#D84040',
            'type' => 'color'
        ),

    );

    $image_slider_groups = array(
        'caption_settings' => array(
            'title' => __('Caption Settings', 'slider_bin'),
            'fields' => array(
                'image_slider_width',
                'image_slider_height',
                'image_slider_caption_position_top',
                'image_slider_caption_position_left',
                'image_slider_caption_position_right',
                'image_slider_caption_position_bottom',
                'image_slider_caption_alignment',
                'image_slider_caption_padding',
                'image_slider_caption_margin',
                'image_slider_caption_font_size',
                'image_slider_caption_font_weight',
                'image_slider_caption_line_height',
                'image_slider_caption_color',
            ),
        ),
        'arrow_settings' => array(
            'title' => __('Arrow Settings', 'slider_bin'),
            'fields' => array(
                'image_slider_left_media_file',
                'image_slider_right_media_file',
                'image_slider_left_arrow_position_left',
                'image_slider_left_arrow_position_top',
                'image_slider_left_arrow_position_right',
                'image_slider_left_arrow_position_bottom',
                'image_slider_left_arrow_color',
                'image_slider_left_arrow_opacity',
                'image_slider_left_arrow_height',
                'image_slider_left_arrow_width',
                'image_slider_right_arrow_position_left',
                'image_slider_right_arrow_position_top',
                'image_slider_right_arrow_position_right',
                'image_slider_right_arrow_position_bottom',
                'image_slider_right_arrow_color',
                'image_slider_right_arrow_opacity',
                'image_slider_right_arrow_height',
                'image_slider_right_arrow_width',
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
                    continue; // Skip fields not defined in $image_slider_fields
                }
                $field = $image_slider_fields[$field_id];

                add_settings_field(
                    $field_id,
                    $field['label'],
                    array($this, 'render_settings_field'),
                    'slider_bin_image_slider_section',
                    'slider_bin_image_slider_' . $group_key . '_section',
                    array(
                        'id' => $field_id,
                        'placeholder' => $field['placeholder'],
                        'type' => isset($field['type']) ? $field['type'] : 'text'
                    )
                );
            }
        }
    }
