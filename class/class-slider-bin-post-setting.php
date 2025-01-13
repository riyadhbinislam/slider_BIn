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
                                submit_button(__('Save Settings', 'slider_bin'));
                                ?>
                            </form>

                            <!-- Clear Button for Hero Same -->
                            <form method="post" action="" class="clear-saved-settings">
                                <?php wp_nonce_field('slider_bin_settings', 'slider_bin_settings_nonce'); ?>
                                <input type="hidden" name="action" value="clear_hero_same_settings">
                                <?php submit_button(__('Clear Settings', 'slider_bin'), 'secondary', 'clear_hero_same_settings'); ?>
                            </form>
                        </div>

                        <!-- Hero Separate Heading Slider Settings -->
                        <div class="slider-type-settings" id="hero-separate-settings" <?php echo $selected_type === 'hero_separate' ? '' : 'style="display: none;"'; ?>>
                            <h3><?php _e('Hero Separate Heading Slider Setting', 'slider_bin'); ?></h3>

                            <form action="options.php" method="post">
                                <?php
                                settings_fields('slider_bin_hero_separate_settings');
                                do_settings_sections('slider_bin_hero_separate_section');
                                submit_button(__('Save Settings', 'slider_bin'));
                                ?>
                            </form>
                            <!-- Clear Button for Hero Separate -->
                            <form method="post" action="">
                                <?php wp_nonce_field('slider_bin_settings', 'slider_bin_settings_nonce'); ?>
                                <input type="hidden" name="action" value="clear_hero_separate_settings">
                                <?php submit_button(__('Clear Settings', 'slider_bin'), 'secondary', 'clear_hero_separate_settings'); ?>
                            </form>
                        </div>

                        <!-- Image Slider Settings -->
                        <div class="slider-type-settings" id="image-slider-settings" <?php echo $selected_type === 'image' ? '' : 'style="display: none;"'; ?>>
                            <h3><?php _e('Image Slider Setting', 'slider_bin'); ?></h3>
                            <form action="options.php" method="post">

                                <?php
                                settings_fields('slider_bin_image_slider_settings');
                                do_settings_sections('slider_bin_image_slider_section');
                                submit_button(__('Save Settings', 'slider_bin'));
                                ?>

                            </form>
                            <!-- Clear Button for Image Slider -->
                            <form method="post" action="">
                                <?php wp_nonce_field('slider_bin_settings', 'slider_bin_settings_nonce'); ?>
                                <input type="hidden" name="action" value="clear_image_slider_settings">
                                <?php submit_button(__('Clear Settings', 'slider_bin'), 'secondary', 'clear_image_slider_settings'); ?>
                            </form>
                        </div>

                        <!-- Post Slider Settings -->
                        <div class="slider-type-settings" id="post-slider-settings" <?php echo $selected_type === 'post' ? '' : 'style="display: none;"'; ?>>
                            <h3><?php _e('Post Slider Setting', 'slider_bin'); ?></h3>
                            <form action="options.php" method="post">

                                <?php
                                settings_fields('slider_bin_post_slider_settings');
                                do_settings_sections('slider_bin_post_slider_section');
                                submit_button(__('Save Settings', 'slider_bin'));
                                ?>

                            </form>
                            <!-- Clear Button for Post Slider -->
                            <form method="post" action="">
                                <?php wp_nonce_field('slider_bin_settings', 'slider_bin_settings_nonce'); ?>
                                <input type="hidden" name="action" value="clear_post_slider_settings">
                                <?php submit_button(__('Clear Settings', 'slider_bin'), 'secondary', 'clear_post_slider_settings'); ?>
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
                                submit_button(__('Save Settings', 'slider_bin'));
                                ?>

                            </form>
                            <!-- Clear Button for Video Slider -->
                            <form method="post" action="">
                                <?php wp_nonce_field('slider_bin_settings', 'slider_bin_settings_nonce'); ?>
                                <input type="hidden" name="action" value="clear_video_slider_settings">
                                <?php submit_button(__('Clear Settings', 'slider_bin'), 'secondary', 'clear_video_slider_settings'); ?>
                            </form>
                        </div>

                        <script>
                            // Hide all elements with the class "form-table" on page load
                            document.querySelectorAll('.form-table').forEach((element) => {
                                element.style.display = 'none';
                            });

                            // Toggle settings form fields
                            document.querySelectorAll('h2').forEach(h2 => {
                                h2.style.cursor = 'pointer'; // Ensure the cursor is a pointer
                                h2.addEventListener('click', () => {
                                    const formTable = h2.nextElementSibling; // Get the next sibling (the table)

                                    // Close all other form-tables
                                    document.querySelectorAll('.form-table').forEach(table => {
                                        if (table !== formTable) {
                                            table.style.display = 'none'; // Hide other tables
                                        }
                                    });

                                    // Toggle the clicked formTable
                                    if (formTable && formTable.classList.contains('form-table')) {
                                        const isHidden = window.getComputedStyle(formTable).display === 'none';
                                        formTable.style.display = isHidden ? 'table' : 'none'; // Toggle display
                                    }
                                });
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>

        <?php
        // Handle the clear settings actions
        if (isset($_POST['action'])) {
            check_admin_referer('slider_bin_settings', 'slider_bin_settings_nonce');
            switch ($_POST['action']) {
                case 'clear_hero_same_settings':
                    delete_option('slider_bin_hero_same_settings');
                    echo '<div class="updated"><p>' . __('Hero Same Settings cleared.', 'slider_bin') . '</p></div>';
                    break;
                case 'clear_hero_separate_settings':
                    delete_option('slider_bin_hero_separate_settings');
                    echo '<div class="updated"><p>' . __('Hero Separate Settings cleared.', 'slider_bin') . '</p></div>';
                    break;
                case 'clear_image_slider_settings':
                    delete_option('slider_bin_image_slider_settings');
                    echo '<div class="updated"><p>' . __('Image Slider Settings cleared.', 'slider_bin') . '</p></div>';
                    break;
                case 'clear_post_slider_settings':
                    delete_option('slider_bin_post_slider_settings');
                    echo '<div class="updated"><p>' . __('Post Slider Settings cleared.', 'slider_bin') . '</p></div>';
                    break;
                case 'clear_video_slider_settings':
                    delete_option('slider_bin_video_slider_settings');
                    echo '<div class="updated"><p>' . __('Video Slider Settings cleared.', 'slider_bin') . '</p></div>';
                    break;
            }
        }

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
        include SLIDER_BIN_PATH . 'modules/settings-fields/hero-same-fields.php';
        include SLIDER_BIN_PATH . 'modules/settings-fields/hero-separate-fields.php';
        include SLIDER_BIN_PATH . 'modules/settings-fields/image-fields.php';
        include SLIDER_BIN_PATH . 'modules/settings-fields/post-fields.php';
        include SLIDER_BIN_PATH . 'modules/settings-fields/video-fields.php';

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
        }elseif ($type === 'button') {
             // Hidden input for storing the media URL
            printf(
                '<input type="hidden" id="%1$s_media" name="%2$s[%1$s]" value="%3$s" class="media-file-input">',
                esc_attr($id),
                esc_attr($settings_group),
                esc_attr($value)
            );

            printf(
                '<button type="button" id="%1$s" class="button media-file-selector" data-settings-group="%2$s">%3$s</button>',
                esc_attr($id),
                esc_attr($settings_group),
                esc_html(__('Select Media File', 'slider_bin'))
            );

            // Preview area for the selected media
             if ($value) {
                printf(
                    '<div class="media-preview"><img src="%1$s" alt="%2$s" style="max-width: 100%%; height: auto;" /></div>',
                    esc_url($value),
                    esc_attr(__('Selected Media', 'slider_bin'))
                );
            } else {
                echo '<div class="media-preview">' . esc_html(__('No media selected', 'slider_bin')) . '</div>';
            }
        }
    }

}
// Instantiated in your main plugin file:
function slider_bin_init_post_setting() {
    return Slider_Bin_Post_Setting::get_instance();
}

