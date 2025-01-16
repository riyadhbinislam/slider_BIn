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
        'video_slider_left_arrow_position_top' => array(
            'label' => __('Left Arrow Position Top', 'slider_bin'),
            'placeholder' => '20%'
        ),
        'video_slider_left_arrow_position_left' => array(
            'label' => __('Left Arrow Position Left', 'slider_bin'),
            'placeholder' => '20%'
        ),
        'video_slider_left_arrow_position_right' => array(
            'label' => __('Left Arrow Position Right', 'slider_bin'),
            'placeholder' => '20%'
        ),
        'video_slider_left_arrow_position_bottom' => array(
            'label' => __('Left Arrow Position Bottom', 'slider_bin'),
            'placeholder' => '20%'
        ),
        'video_slider_right_arrow_position_top' => array(
            'label' => __('Right Arrow Position Top', 'slider_bin'),
            'placeholder' => '20%'
        ),
        'video_slider_right_arrow_position_left' => array(
            'label' => __('Right Arrow Position Left', 'slider_bin'),
            'placeholder' => '20%'
        ),
        'video_slider_right_arrow_position_right' => array(
            'label' => __('Right Arrow Position Right', 'slider_bin'),
            'placeholder' => '20%'
        ),
        'video_slider_right_arrow_position_bottom' => array(
            'label' => __('Right Arrow Position Bottom', 'slider_bin'),
            'placeholder' => '20%'
        ),
        'video_slider_left_arrow_color' => array(
            'label' => __('Left Arrow Color', 'slider_bin'),
            'placeholder' => '#ffffff',
            'type' => 'color'
        ),
        'video_slider_right_arrow_color' => array(
            'label' => __('Right Arrow Color', 'slider_bin'),
            'placeholder' => '#ffffff',
            'type' => 'color'
        ),
        'video_slider_left_arrow_opacity' => array(
            'label' => __('Left Arrow Opacity', 'slider_bin'),
            'placeholder' => '0.8'
        ),
        'video_slider_right_arrow_opacity' => array(
            'label' => __('Right Arrow Opacity', 'slider_bin'),
            'placeholder' => '0.8'
        ),
        'video_slider_left_media_file' => array(
                'label' => __('Select or Choose Left Icon', 'slider_bin'),
                'placeholder' => '',
                'type' => 'button'
        ),
        'video_slider_right_media_file' => array(
            'label' => __('Select or Choose Right Icon', 'slider_bin'),
            'placeholder' => '',
            'type' => 'button'
        ),
        'video_slider_left_arrow_width' => array(
            'label' => __('Left Arrow Width', 'slider_bin'),
            'placeholder' => '20px',
            'type' => 'text'
        ),
        'video_slider_left_arrow_height' => array(
            'label' => __('Left Arrow Height', 'slider_bin'),
            'placeholder' => '20px',
            'type' => 'text'
        ),
        'video_slider_right_arrow_width' => array(
            'label' => __('Right Arrow Width', 'slider_bin'),
            'placeholder' => '20px',
            'type' => 'text'
        ),
        'video_slider_right_arrow_height' => array(
            'label' => __('Right Arrow Height', 'slider_bin'),
            'placeholder' => '20px',
            'type' => 'text'
        ),
        'video_slider_pagination_height' => array(
            'label' => __('Pagination Height', 'slider_bin'),
            'placeholder' => '15px'
        ),
        'video_slider_pagination_width' => array(
            'label' => __('Pagination width', 'slider_bin'),
            'placeholder' => '15px'
        ),
        'video_slider_pagination_gap' => array(
            'label' => __('Pagination Gap', 'slider_bin'),
            'placeholder' => '5px'
        ),
        'video_slider_pagination_color' => array(
            'label' => __('Pagination Color', 'slider_bin'),
            'placeholder' => '#8E1616',
            'type' => 'color'
        ),
        'video_slider_pagination_active_color' => array(
            'label' => __('Pagination Color On Active', 'slider_bin'),
            'placeholder' => '#D84040',
            'type' => 'color'
        ),

    );

    $vidoe_slider_groups = array(
        'arrow_settings' => array(
            'title' => __('Arrow Settings', 'slider_bin'),
            'fields' => array(
                'video_slider_width',
                'video_slider_height',
                'video_slider_right_media_file',
                'video_slider_left_media_file',
                'video_slider_left_arrow_color',
                'video_slider_left_arrow_opacity',
                'video_slider_left_arrow_position_top',
                'video_slider_left_arrow_position_left',
                'video_slider_left_arrow_position_right',
                'video_slider_left_arrow_position_bottom',
                'video_slider_left_arrow_width',
                'video_slider_left_arrow_height',
                'video_slider_right_arrow_opacity',
                'video_slider_right_arrow_position_top',
                'video_slider_right_arrow_position_left',
                'video_slider_right_arrow_position_right',
                'video_slider_right_arrow_position_bottom',
                'video_slider_right_arrow_color',
                'video_slider_right_arrow_width',
                'video_slider_right_arrow_height',
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

                add_settings_field(
                    $field_id,
                    $field['label'],
                    array($this, 'render_settings_field'),
                    'slider_bin_video_slider_section',
                    'slider_bin_video_slider_' . $group_key . '_section',
                    array(
                        'id' => $field_id,
                        'placeholder' => $field['placeholder'],
                        'type' => isset($field['type']) ? $field['type'] : 'text'
                    )
                );
            }
        }
    }