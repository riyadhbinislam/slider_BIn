<?php
    // Video Slider Settings
    add_settings_section(
        'slider_bin_video_slider_section',
        '',
        null,
        'slider_bin_video_slider_section'
    );

    $video_slider_fields = array(
        'video_slider_width' => array(
            'label' => __('Slider Width', 'slider_bin'),
            'placeholder' => '100%',
            'type' => 'text'
        ),
        'video_slider_height' => array(
            'label' => __('Slider Height', 'slider_bin'),
            'placeholder' => '400px',
            'type' => 'text'
        ),
        'video_slider_autoplay' => array(
            'label' => __('AutoPlay', 'slider_bin'),
            'placeholder' => 'Yes/No',
            'type' => 'select',
            'options' => array(
                'yes' => 'Yes',
                'no' => 'No'
            )
        ),

// Arrow Settings
        'video_slider_left_media_file' => array(
            'label' => __('Select Left Icon', 'slider_bin'),
            'placeholder' => '',
            'type' => 'button'
        ),
        'video_slider_right_media_file' => array(
            'label' => __('Select Right Icon', 'slider_bin'),
            'placeholder' => '',
            'type' => 'button'
        ),
        'video_slider_arrow_position' => array(
            'label' => __('Position', 'slider_bin'),
            'fields' => array(
                'video_slider_arrow_position_left' => array(
                    'placeholder' => 'Left'
                ),
                'video_slider_arrow_position_top' => array(
                    'placeholder' => 'Top'
                ),
                'video_slider_arrow_position_right' => array(
                    'placeholder' => 'Right'
                ),
                'video_slider_arrow_position_bottom' => array(
                    'placeholder' => 'Bottom'
                ),
            )
        ),
        'video_slider_arrow_color' => array(
            'label' => __('Color', 'slider_bin'),
            'placeholder' => '#ffffff',
            'type' => 'color'
        ),
        'video_slider_arrow_opacity' => array(
            'label' => __('Opacity', 'slider_bin'),
            'placeholder' => '0.8'
        ),
        'video_slider_arrow_width' => array(
            'label' => __('Width', 'slider_bin'),
            'placeholder' => '20px',
            'type' => 'text'
        ),
        'video_slider_arrow_height' => array(
            'label' => __('Height', 'slider_bin'),
            'placeholder' => '20px',
            'type' => 'text'
        ),

// Pagination Settings

        'video_slider_pagination_height' => array(
            'label' => __('Height', 'slider_bin'),
            'placeholder' => '15px'
        ),
        'video_slider_pagination_width' => array(
            'label' => __('width', 'slider_bin'),
            'placeholder' => '15px'
        ),
        'video_slider_pagination_gap' => array(
            'label' => __('Gap', 'slider_bin'),
            'placeholder' => '5px'
        ),
        'video_slider_pagination_color' => array(
            'label' => __('Color', 'slider_bin'),
            'placeholder' => '#8E1616',
            'type' => 'color'
        ),
        'video_slider_pagination_active_color' => array(
            'label' => __('Color On Active', 'slider_bin'),
            'placeholder' => '#D84040',
            'type' => 'color'
        ),

    );

    $vidoe_slider_groups = array(
        'slider_settings' => array(
            'title' => __('Slider Settings', 'slider_bin'),
            'fields' => array(
                'video_slider_width',
                'video_slider_height',
                'video_slider_autoplay',

            ),
        ),
        'arrow_settings' => array(
            'title' => __('Arrow Settings', 'slider_bin'),
            'fields' => array(
                'video_slider_left_media_file',
                'video_slider_right_media_file',
                'video_slider_arrow_width',
                'video_slider_arrow_height',
                'video_slider_arrow_color',
                'video_slider_arrow_opacity',
                'video_slider_arrow_position',
            ),
        ),
        'pagination_settings' => array(
            'title' => __('Pagination Settings', 'slider_bin'),
            'fields' => array(
                'video_slider_pagination_height',
                'video_slider_pagination_width',
                'video_slider_pagination_gap',
                'video_slider_pagination_color',
                'video_slider_pagination_active_color',
            ),
        ),
    );

// Register Video Slider Settings

    if (!empty($vidoe_slider_groups)) {
        foreach ($vidoe_slider_groups as $group_key => $group) {
            add_settings_section(
                'slider_bin_video_slider_' . $group_key . '_section',
                $group['title'],
                null,
                'slider_bin_video_slider_section'
            );

            foreach ($group['fields'] as $field_id) {
                if (!isset($video_slider_fields[$field_id])) {
                    continue;
                }
                $field = $video_slider_fields[$field_id];

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
                    'slider_bin_video_slider_section',
                    'slider_bin_video_slider_' . $group_key . '_section',
                    $args
                );
            }
        }
    }
