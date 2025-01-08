<?php


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Slider_Bin_Post_Setting {
    private static $instance = null;

    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct() {
        // Prevent duplicate initialization
        if (self::$instance) {
            return;
        }
        self::$instance = $this;

        // Ensure the option exists with a default value
        add_option('slider_bin_selected_type', 'hero_same', '', 'yes');

        $this->init_hooks();
    }

    private function init_hooks() {

        add_action('admin_menu', array($this, 'add_settings_page'));
        add_action('admin_init', array($this, 'register_settings'));
    }

    public function add_settings_page() {
        // Remove any existing menu items first
        remove_submenu_page('edit.php?post_type=slider_post', 'slider_bin_settings');

        // Add the settings page once
        add_submenu_page(
            'edit.php?post_type=slider_post',
            __('Settings', 'slider_bin'),
            __('Settings', 'slider_bin'),
            'manage_options',
            'slider_bin_settings',
            array($this, 'render_settings_page')
        );
    }

    public function render_settings_page() {
        if (!current_user_can('manage_options')) {
            return;
        }
    // Get the currently selected slider type from options
    $selected_type = get_option('slider_bin_selected_type', 'hero_same');

        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <!-- Add nonce field -->
            <?php wp_nonce_field('slider_bin_settings', 'slider_bin_settings_nonce'); ?>


            <div class="slider-settings-container">
                <!-- Individual Slider Styles -->
                    <div class="slider-individual-style">
                    <h2><?php _e('Individual Slider Styles', 'slider_bin'); ?></h2>
                    <div class="slider-type-wrap">
                        <div class="slider-type-heading">
                            <h3><?php _e('Slider Type', 'slider_bin'); ?></h3>
                            <select name="slider_type" id="slider_type" class="slider-type-select">
                                <option value="hero_same"><?php _e('Hero with Same Heading Slider', 'slider_bin'); ?></option>
                                <option value="hero_separate"><?php _e('Hero with Separate Heading Slider', 'slider_bin'); ?></option>
                                <option value="image"><?php _e('Image Slider', 'slider_bin'); ?></option>
                                <option value="post"><?php _e('Post Slider', 'slider_bin'); ?></option>
                                <option value="video"><?php _e('Video Slider', 'slider_bin'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="individual-setting-wrap">
                        <!-- Hero Same Heading Slider Settings -->
                        <div class="slider-type-settings" id="hero-same-settings" <?php echo $selected_type === 'hero_same' ? '' : 'style="display: none;"'; ?>>
                            <h3><?php _e('Hero Same Heading Slider Setting', 'slider_bin'); ?></h3>
                            <form action="options.php" method="post">
                                <?php
                                settings_fields('slider_bin_hero_same_settings');
                                do_settings_sections('slider_bin_hero_same_section');
                                submit_button(__('Save Hero Same Settings', 'slider_bin'));
                                ?>
                            </form>
                        </div>

                        <!-- Hero Separate Heading Slider Settings -->
                        <div class="slider-type-settings" id="hero-separate-settings" <?php echo $selected_type === 'hero_separate' ? '' : 'style="display: none;"'; ?>>
                            <h3><?php _e('Hero Separate Heading Slider Setting', 'slider_bin'); ?></h3>
                            <form action="options.php" method="post">
                            <!-- <form class="slider-settings-form" data-group="slider_bin_hero_separate_settings"> -->
                                <?php
                                settings_fields('slider_bin_hero_separate_settings');
                                do_settings_sections('slider_bin_hero_separate_section');
                                submit_button(__('Save Hero Separate Settings', 'slider_bin'));
                                ?>
                                <!--  -->
                            </form>
                        </div>

                        <!-- Image Slider Settings -->
                        <div class="slider-type-settings" id="image-slider-settings" <?php echo $selected_type === 'image' ? '' : 'style="display: none;"'; ?>>
                            <h3><?php _e('Image Slider Setting', 'slider_bin'); ?></h3>
                            <form action="options.php" method="post">
                            <!-- <form class="slider-settings-form" data-group="slider_bin_image_slider_settings"> -->
                                <?php
                                settings_fields('slider_bin_image_slider_settings');
                                do_settings_sections('slider_bin_image_slider_section');
                                submit_button(__('Save Image Slider Settings', 'slider_bin'));
                                ?>

                            </form>
                        </div>

                        <!-- Post Slider Settings -->
                        <div class="slider-type-settings" id="post-slider-settings" <?php echo $selected_type === 'post' ? '' : 'style="display: none;"'; ?>>
                            <h3><?php _e('Post Slider Setting', 'slider_bin'); ?></h3>
                            <form action="options.php" method="post">
                            <!-- <form class="slider-settings-form" data-group="slider_bin_post_slider_settings"> -->
                                <?php
                                settings_fields('slider_bin_post_slider_settings');
                                do_settings_sections('slider_bin_post_slider_section');
                                submit_button(__('Save Post Slider Settings', 'slider_bin'));
                                ?>

                            </form>
                        </div>

                        <!-- Video Slider Settings -->
                        <div class="slider-type-settings" id="video-slider-settings" <?php echo $selected_type === 'video' ? '' : 'style="display: none;"'; ?>>
                            <h3><?php _e('Video Slider Settings', 'slider_bin'); ?></h3>
                                <form action="options.php" method="post">
                            <form class="slider-settings-form" data-group="slider_bin_video_slider_settings">
                                <?php
                                settings_fields('slider_bin_video_slider_settings');
                                do_settings_sections('slider_bin_video_slider_section');
                                submit_button(__('Save Video Slider Settings', 'slider_bin'));
                                ?>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
    public function register_settings() {
        register_setting('slider_bin_hero_same_settings', 'slider_bin_hero_same_settings');
        register_setting('slider_bin_hero_separate_settings', 'slider_bin_hero_separate_settings');
        register_setting('slider_bin_image_slider_settings', 'slider_bin_image_slider_settings');
        register_setting('slider_bin_post_slider_settings', 'slider_bin_post_slider_settings');
        register_setting('slider_bin_video_slider_settings', 'slider_bin_video_slider_settings');

        /**
         * Individual Slider Styles
         */

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
                'placeholder' => '100%'
            ),
            'hero_same_bg_image_position' => array(
                'label' => __('Background Image Position', 'slider_bin'),
                'placeholder' => 'center center'
            ),
            'hero_same_bg_image_size' => array(
                'label' => __('Background Image Size', 'slider_bin'),
                'placeholder' => 'cover / contain / auto'
            ),
            'hero_same_bg_overlay' => array(
                'label' => __('Background Image Overlay', 'slider_bin'),
                'placeholder' => 'true or false'
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
            'hero_same_arrow_left' => array(
                'label' => __('Left Arrow Style', 'slider_bin'),
                'placeholder' => '',
                'type' => 'select',
            ),
            'hero_same_arrow_right' => array(
                'label' => __('Right Arrow Style', 'slider_bin'),
                'placeholder' => '',
                'type' => 'select',
            ),
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
            )

        );

        $hero_same_groups = array(
            'background_settings' => array(
                'title' => __('Background Settings', 'slider_bin'),
                'fields' => array(
                    'hero_same_slider_width',
                    'hero_same_slider_height',
                    'hero_same_bg_image_size',
                    'hero_same_bg_image_position',
                    'hero_same_bg_overlay',
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
                    'hero_same_arrow_left',
                    'hero_same_arrow_right',
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
                        continue; // Skip fields not defined in $hero_same_fields
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

        // Hero Separate Heading Slider Settings
        add_settings_section(
            'slider_bin_hero_separate_section',
            '',
            null,
            'slider_bin_hero_separate_section'
        );

        $hero_separate_fields = array(
            'hero_separate_slider_width' => array(
                'label' => __('Slider Width', 'slider_bin'),
                'placeholder' => '100%'
            ),
            'hero_separate_slider_height' => array(
                'label' => __('Slider Height', 'slider_bin'),
                'placeholder' => '100%'
            ),
            'hero_separate_bg_image_position' => array(
                'label' => __('Background Image Position', 'slider_bin'),
                'placeholder' => 'center center'
            ),
            'hero_separate_bg_image_size' => array(
                'label' => __('Background Image Size', 'slider_bin'),
                'placeholder' => 'cover / contain / auto'
            ),
            'hero_separate_bg_overlay' => array(
                'label' => __('Background Image Overlay', 'slider_bin'),
                'placeholder' => 'true or false'
            ),
            'hero_separate_bg_overlay_color' => array(
                'label' => __('Background Image Overlay Color', 'slider_bin'),
                'placeholder' => '#000000',
                'type' => 'color'
            ),
            'hero_separate_bg_overlay_opacity' => array(
                'label' => __('Background Image Overlay Opacity', 'slider_bin'),
                'placeholder' => '0.5'
            ),
            'hero_separate_content_position_top' => array(
                'label' => __('Content Position-Top', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_separate_content_position_left' => array(
                'label' => __('Content Position-Left', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_separate_content_position_right' => array(
                'label' => __('Content Position-Right', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_separate_content_position_bottom' => array(
                'label' => __('Content Position-Bottom', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_separate_content_alignment' => array(
                'label' => __('Content Alignment', 'slider_bin'),
                'placeholder' => 'center'
            ),
            'hero_separate_content_padding' => array(
                'label' => __('Content Padding', 'slider_bin'),
                'placeholder' => '0 0 20px 0'
            ),
            'hero_separate_content_margin' => array(
                'label' => __('Content Margin', 'slider_bin'),
                'placeholder' => '0 0 20px 0'
            ),
            'hero_separate_heading_font_size' => array(
                'label' => __('Heading Font Size', 'slider_bin'),
                'placeholder' => '32px'
            ),
            'hero_separate_heading_font_weight' => array(
                'label' => __('Heading Font Weight', 'slider_bin'),
                'placeholder' => '700'
            ),
            'hero_separate_heading_line_height' => array(
                'label' => __('Heading Line Height', 'slider_bin'),
                'placeholder' => '1.2'
            ),
            'hero_separate_heading_color' => array(
                'label' => __('Heading Color', 'slider_bin'),
                'placeholder' => '#ffffff',
                'type' => 'color'
            ),
            'hero_separate_heading_margin' => array(
                'label' => __('Heading Margin', 'slider_bin'),
                'placeholder' => '0 0 20px 0'
            ),
            'hero_separate_heading_padding' => array(
                'label' => __('Heading Padding', 'slider_bin'),
                'placeholder' => '0 0 20px 0'
            ),
            'hero_separate_subheading_font_size' => array(
                'label' => __('Subheading Font Size', 'slider_bin'),
                'placeholder' => '18px'
            ),
            'hero_separate_subheading_font_weight' => array(
                'label' => __('Subheading Font Weight', 'slider_bin'),
                'placeholder' => '400'
            ),
            'hero_separate_subheading_line_height' => array(
                'label' => __('Subheading Line Height', 'slider_bin'),
                'placeholder' => '1.5'
            ),
            'hero_separate_subheading_color' => array(
                'label' => __('Subheading Color', 'slider_bin'),
                'placeholder' => '#ffffff',
                'type' => 'color'
            ),
            'hero_separate_subheading_margin' => array(
                'label' => __('Subheading Margin', 'slider_bin'),
                'placeholder' => '0 0 30px 0'
            ),
            'hero_separate_subheading_padding' => array(
                'label' => __('Subheading Padding', 'slider_bin'),
                'placeholder' => '0 0 30px 0'
            ),
            'hero_separate_left_arrow_position_left' => array(
                'label' => __('Left Arrow Position-Left', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_separate_left_arrow_position_top' => array(
                'label' => __('Left Arrow Position-Top', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_separate_left_arrow_position_right' => array(
                'label' => __('Left Arrow Position-Right', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_separate_left_arrow_position_bottom' => array(
                'label' => __('Left Arrow Position-Bottom', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_separate_left_arrow_color' => array(
                'label' => __('Left Arrow Color', 'slider_bin'),
                'placeholder' => '#ffffff',
                'type' => 'color'
            ),
            'hero_separate_left_arrow_opacity' => array(
                'label' => __('Left Arrow Opacity', 'slider_bin'),
                'placeholder' => '0.8'
            ),
            'hero_separate_left_arrow_height' => array(
                'label' => __('Left Arrow Height', 'slider_bin'),
                'placeholder' => '40px'
            ),
            'hero_separate_left_arrow_width' => array(
                'label' => __('Left Arrow Width', 'slider_bin'),
                'placeholder' => '40px'
            ),
            'hero_separate_right_arrow_position_left' => array(
                'label' => __('Right Arrow Position-Left', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_separate_right_arrow_position_top' => array(
                'label' => __('Right Arrow Position-Top', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_separate_right_arrow_position_right' => array(
                'label' => __('Right Arrow Position-Right', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_separate_right_arrow_position_bottom' => array(
                'label' => __('Right Arrow Position-Bottom', 'slider_bin'),
                'placeholder' => '10% or 10px'
            ),
            'hero_separate_right_arrow_color' => array(
                'label' => __('Right Arrow Color', 'slider_bin'),
                'placeholder' => '#ffffff',
                'type' => 'color'
            ),
            'hero_separate_right_arrow_opacity' => array(
                'label' => __('Right Arrow Opacity', 'slider_bin'),
                'placeholder' => '0.8'
            ),
            'hero_separate_right_arrow_height' => array(
                'label' => __('Right Arrow Height', 'slider_bin'),
                'placeholder' => '40px'
            ),
            'hero_separate_right_arrow_width' => array(
                'label' => __('Right Arrow Width', 'slider_bin'),
                'placeholder' => '40px'
            ),
            'hero_separate_arrow_left' => array(
                'label' => __('Left Arrow Style', 'slider_bin'),
                'placeholder' => '',
                'type' => 'select',
            ),
            'hero_separate_arrow_right' => array(
                'label' => __('Right Arrow Style', 'slider_bin'),
                'placeholder' => '',
                'type' => 'select',
            ),
            'hero_separate_button_padding' => array(
                'label' => __('Button Padding', 'slider_bin'),
                'placeholder' => '10px 20px 10px 20px'
            ),
            'hero_separate_button_margin' => array(
                'label' => __('Button Margin', 'slider_bin'),
                'placeholder' => '30px 0 30px 0'
            ),
            'hero_separate_button_font_size' => array(
                'label' => __('Button Font Size', 'slider_bin'),
                'placeholder' => '14px'
            ),
            'hero_separate_button_font_family' => array(
                'label' => __('Button Font Family', 'slider_bin'),
                'placeholder' => 'Arial, sans-serif'
            ),
            'hero_separate_button_font_weight' => array(
                'label' => __('Button Font Weight', 'slider_bin'),
                'placeholder' => '400'
            ),
            'hero_separate_button_color' => array(
                'label' => __('Button Font Color', 'slider_bin'),
                'placeholder' => '#ffffff',
                'type' => 'color'
            ),
            'hero_separate_button_text_decoration' => array(
                'label' => __('Button Text Decoration', 'slider_bin'),
                'placeholder' => 'none'
            ),
            'hero_separate_button_text_align' => array(
                'label' => __('Button Text Alignment', 'slider_bin'),
                'placeholder' => 'center'
            ),
            'hero_separate_button_bg_color' => array(
                'label' => __('Button Background Color', 'slider_bin'),
                'placeholder' => '#ff5733',
                'type' => 'color'
            ),
            'hero_separate_button_border_color' => array(
                'label' => __('Border Color', 'slider_bin'),
                'placeholder' => '#ff5733',
                'type' => 'color'
            ),
            'hero_separate_button_border_width' => array(
                'label' => __('Border Width', 'slider_bin'),
                'placeholder' => '1px'
            ),
            'hero_separate_button_border_style' => array(
                'label' => __('Border Style', 'slider_bin'),
                'placeholder' => 'solid/dotted/dashed'
            ),
            'hero_separate_button_border_radius' => array(
                'label' => __('Border Radius', 'slider_bin'),
                'placeholder' => '5px'
            ),
            'hero_separate_button_box_shadow' => array(
                'label' => __('Button Box Shadow', 'slider_bin'),
                'placeholder' => '0px 4px 6px #888888'
            ),
            'hero_separate_button_target' => array(
                'label' => __('Button Target', 'slider_bin'),
                'placeholder' => '_self/_blank'
            )
        );

        $hero_separate_groups = array(
            'background_settings' => array(
                'title' => __('Background Settings', 'slider_bin'),
                'fields' => array(
                    'hero_separate_slider_width',
                    'hero_separate_slider_height',
                    'hero_separate_bg_image_size',
                    'hero_separate_bg_image_position',
                    'hero_separate_bg_overlay',
                    'hero_separate_bg_overlay_color',
                    'hero_separate_bg_overlay_opacity',
                ),
            ),
            'content_settings' => array(
                'title' => __('Content Settings', 'slider_bin'),
                'fields' => array(
                    'hero_separate_content_position_top',
                    'hero_separate_content_position_left',
                    'hero_separate_content_position_right',
                    'hero_separate_content_position_bottom',
                    'hero_separate_content_alignment',
                    'hero_separate_content_padding',
                    'hero_separate_content_margin',
                ),
            ),
            'heading_settings' => array(
                'title' => __('Heading Settings', 'slider_bin'),
                'fields' => array(
                    'hero_separate_heading_font_size',
                    'hero_separate_heading_font_weight',
                    'hero_separate_heading_line_height',
                    'hero_separate_heading_color',
                    'hero_separate_heading_margin',
                    'hero_separate_heading_padding',
                ),
            ),
            'subheading_settings' => array(
                'title' => __('Subheading Settings', 'slider_bin'),
                'fields' => array(
                    'hero_separate_subheading_font_size',
                    'hero_separate_subheading_font_weight',
                    'hero_separate_subheading_line_height',
                    'hero_separate_subheading_color',
                    'hero_separate_subheading_margin',
                    'hero_separate_subheading_padding',
                ),
            ),
            'button_settings' => array(
                'title' => __('Button Settings', 'slider_bin'),
                'fields' => array(
                    'hero_separate_button_font_family',
                    'hero_separate_button_font_weight',
                    'hero_separate_button_font_size',
                    'hero_separate_button_color',
                    'hero_separate_button_padding',
                    'hero_separate_button_margin',
                    'hero_separate_button_bg_color',
                    'hero_separate_button_border_style',
                    'hero_separate_button_border_width',
                    'hero_separate_button_border_color',
                    'hero_separate_button_border_radius',
                    'hero_separate_button_box_shadow',
                    'hero_separate_button_text_decoration',
                    'hero_separate_button_text_align',
                    'hero_separate_button_target',
                ),
            ),
            'arrow_settings' => array(
                'title' => __('Arrow Settings', 'slider_bin'),
                'fields' => array(
                    'hero_separate_arrow_left',
                    'hero_separate_arrow_right',
                    'hero_separate_left_arrow_position_left',
                    'hero_separate_left_arrow_position_top',
                    'hero_separate_left_arrow_position_right',
                    'hero_separate_left_arrow_position_bottom',
                    'hero_separate_left_arrow_color',
                    'hero_separate_left_arrow_opacity',
                    'hero_separate_left_arrow_height',
                    'hero_separate_left_arrow_width',
                    'hero_separate_right_arrow_position_left',
                    'hero_separate_right_arrow_position_top',
                    'hero_separate_right_arrow_position_right',
                    'hero_separate_right_arrow_position_bottom',
                    'hero_separate_right_arrow_color',
                    'hero_separate_right_arrow_opacity',
                    'hero_separate_right_arrow_height',
                    'hero_separate_right_arrow_width',
                ),
            ),
        );

        // Register fields dynamically based on groups

        if (!empty($hero_separate_groups)) {
            foreach ($hero_separate_groups as $group_key => $group) {
                add_settings_section(
                    'slider_bin_hero_separate_' . $group_key . '_section',
                    $group['title'],
                    null,
                    'slider_bin_hero_separate_section'
                );

                foreach ($group['fields'] as $field_id) {
                    if (!isset($hero_separate_fields[$field_id])) {
                        continue; // Skip fields not defined in $hero_separate_fields
                    }
                    $field = $hero_separate_fields[$field_id];

                    add_settings_field(
                        $field_id,
                        $field['label'],
                        array($this, 'render_settings_field'),
                        'slider_bin_hero_separate_section',
                        'slider_bin_hero_separate_' . $group_key . '_section',
                        array(
                            'id' => $field_id,
                            'placeholder' => $field['placeholder'],
                            'type' => isset($field['type']) ? $field['type'] : 'text'
                        )
                    );
                }
            }
        }


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
            'image_slider_arrow_left' => array(
                'label' => __('Left Arrow Style', 'slider_bin'),
                'placeholder' => '',
                'type' => 'select',
            ),
            'image_slider_arrow_right' => array(
                'label' => __('Right Arrow Style', 'slider_bin'),
                'placeholder' => '',
                'type' => 'select',
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
                    'image_slider_arrow_left',
                    'image_slider_arrow_right',
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
            'post_slider_right_arrow_width' => array(
                'label' => __('Right Arrow Width', 'slider_bin'),
                'placeholder' => '40px'
            ),
            'post_slider_arrow_left' => array(
                'label' => __('Left Arrow Style', 'slider_bin'),
                'placeholder' => '',
                'type' => 'select',
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
            )

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
                    'post_slider_arrow_left',
                    'post_slider_arrow_right',
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
            'video_slider_arrow_left' => array(
                'label' => __('Left Arrow Style', 'slider_bin'),
                'placeholder' => '',
                'type' => 'select',
            ),
            'video_slider_arrow_right' => array(
                'label' => __('Right Arrow Style', 'slider_bin'),
                'placeholder' => '',
                'type' => 'select',
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
            )
        );

        $vidoe_slider_groups = array(
            'arrow_settings' => array(
                'title' => __('Arrow Settings', 'slider_bin'),
                'fields' => array(
                    'video_slider_width',
                    'video_slider_height',
                    'video_slider_arrow_left',
                    'video_slider_arrow_right',
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
    }

    public function render_settings_field($args) {
        $settings_group = '';
        if (strpos($args['id'], 'hero_same_') === 0) {
            $settings_group = 'slider_bin_hero_same_settings';
        } else if (strpos($args['id'], 'hero_separate_') === 0) {
            $settings_group = 'slider_bin_hero_separate_settings';
        } else if (strpos($args['id'], 'image_slider_') === 0) {
            $settings_group = 'slider_bin_image_slider_settings';
        } else if (strpos($args['id'], 'post_slider_') === 0) {
            $settings_group = 'slider_bin_post_slider_settings';
        } else if (strpos($args['id'], 'video_slider_') === 0) {
            $settings_group = 'slider_bin_video_slider_settings';
        }

        $options = get_option($settings_group, array());
        $id = $args['id'];
        $placeholder = $args['placeholder'];
        $type = $args['type'];
        $value = isset($options[$id]) ? $options[$id] : '';

        if ($type === 'text') {
            printf(
                '<input type="text" id="%1$s" name="%2$s[%1$s]" value="%3$s" placeholder="%4$s" class="regular-text">',
                esc_attr($id),
                esc_attr($settings_group),
                esc_attr($value),
                esc_attr($placeholder)
            );
        } elseif ($type === 'color') {
            printf(
                '<input type="color" id="%1$s" name="%2$s[%1$s]" value="%3$s" placeholder="%4$s" class="regular-text color-picker">',
                esc_attr($id),
                esc_attr($settings_group),
                esc_attr($value),
                esc_attr($placeholder)
            );
        } elseif ($type === 'select' && strpos($id, 'arrow_') !== false) {
            echo '<div class="arrow-style-selector">';
            echo '<div class="custom-dropdown">';

            // Hidden input for storing the value
            printf(
                '<input type="hidden" id="%1$s" name="%2$s[%1$s]" value="%3$s" class="arrow-style-input">',
                esc_attr($id),
                esc_attr($settings_group),
                esc_attr($value)
            );

            // Dropdown selected display
            echo '<div class="dropdown-selected">';
            if ($value) {
                // If the value is already a full URL, use it directly
                if (strpos($value, 'Assets/icon/') !== false) {
                    $icon_url = $value;
                    $icon_name = basename($value, '.svg');
                } else {
                    // Convert old format to URL if needed
                    $icon_name = '';
                    if (strpos($id, '_left') !== false) {
                        switch($value) {
                            case 'left_icon_1': $icon_name = 'Arrow-Left-Bold-Circle'; break;
                            case 'left_icon_2': $icon_name = 'Arrow-Left-Fill-Circle'; break;
                            case 'left_icon_3': $icon_name = 'Arrow-Left-Thin-Circle'; break;
                            case 'left_icon_4': $icon_name = 'Arrow-Left-Thin'; break;
                            case 'left_icon_5': $icon_name = 'Arrow-Left'; break;
                            case 'left_icon_6': $icon_name = 'Left-Button-Arrow'; break;
                        }
                    } else {
                        switch($value) {
                            case 'right_icon_1': $icon_name = 'Arrow-Right-Bold-Circle'; break;
                            case 'right_icon_2': $icon_name = 'Arrow-Right-Fill-Circle'; break;
                            case 'right_icon_3': $icon_name = 'Arrow-Right-Thin-Circle'; break;
                            case 'right_icon_4': $icon_name = 'Arrow-Right-Thin'; break;
                            case 'right_icon_5': $icon_name = 'Arrow-Right'; break;
                            case 'right_icon_6': $icon_name = 'Right-Button-Arrow'; break;
                        }
                    }
                    $icon_url = SLIDER_BIN_URL . 'Assets/icon/' . $icon_name . '.svg';
                }
                echo '<img src="' . esc_url($icon_url) . '" alt="' . esc_attr($icon_name) . '" />';
            } else {
                echo 'Select an option';
            }
            echo '</div>';

            echo '<div class="dropdown-options">';

            if (strpos($id, '_left') !== false) {
                $icons = [
                    SLIDER_BIN_URL . 'Assets/icon/Arrow-Left-Bold-Circle.svg' => 'Arrow-Left-Bold-Circle',
                    SLIDER_BIN_URL . 'Assets/icon/Arrow-Left-Fill-Circle.svg' => 'Arrow-Left-Fill-Circle',
                    SLIDER_BIN_URL . 'Assets/icon/Arrow-Left-Thin-Circle.svg' => 'Arrow-Left-Thin-Circle',
                    SLIDER_BIN_URL . 'Assets/icon/Arrow-Left-Thin.svg' => 'Arrow-Left-Thin',
                    SLIDER_BIN_URL . 'Assets/icon/Arrow-Left.svg' => 'Arrow-Left',
                    SLIDER_BIN_URL . 'Assets/icon/Left-Button-Arrow.svg' => 'Left-Button-Arrow'
                ];
            } else {
                $icons = [
                    SLIDER_BIN_URL . 'Assets/icon/Arrow-Right-Bold-Circle.svg' => 'Arrow-Right-Bold-Circle',
                    SLIDER_BIN_URL . 'Assets/icon/Arrow-Right-Fill-Circle.svg' => 'Arrow-Right-Fill-Circle',
                    SLIDER_BIN_URL . 'Assets/icon/Arrow-Right-Thin-Circle.svg' => 'Arrow-Right-Thin-Circle',
                    SLIDER_BIN_URL . 'Assets/icon/Arrow-Right-Thin.svg' => 'Arrow-Right-Thin',
                    SLIDER_BIN_URL . 'Assets/icon/Arrow-Right.svg' => 'Arrow-Right',
                    SLIDER_BIN_URL . 'Assets/icon/Right-Button-Arrow.svg' => 'Right-Button-Arrow'
                ];
            }

            foreach ($icons as $icon_url => $icon_name) {
                $selected = ($value === $icon_url) ? ' selected' : '';
                echo '<div class="option' . $selected . '" data-value="' . esc_attr($icon_url) . '">';
                echo '<img src="' . esc_url($icon_url) . '" alt="' . esc_attr($icon_name) . '" />';
                echo '<span>' . esc_html($icon_name) . '</span>';
                echo '</div>';
            }

            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }

}
// Instantiated in your main plugin file:
function slider_bin_init_post_setting() {
    return Slider_Bin_Post_Setting::get_instance();
}

