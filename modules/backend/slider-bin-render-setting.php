<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>

<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <!-- Add nonce field -->
    <?php wp_nonce_field('slider_bin_settings', 'slider_bin_settings_nonce'); ?>


    <div class="slider-settings-container">
        <!-- Individual Slider Styles -->
            <div class="slider-individual-style">
            <h2><?php _e('Select Slider Type', 'slider_bin'); ?></h2>
            <div class="slider-type-wrap">
                <div class="slider-type-heading">
                    <!-- <h3><?php _e('Slider Type', 'slider_bin'); ?></h3> -->
                    <select name="slider_type" id="slider_type_settings" class="slider-type-select">
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
                    <h3><?php _e('Hero With Same Heading Slider Setting', 'slider_bin'); ?></h3>
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
                    <h3><?php _e('Hero With Separate Heading Slider Setting', 'slider_bin'); ?></h3>

                    <form action="options.php" method="post">
                        <?php
                        settings_fields('slider_bin_hero_separate_settings');
                        do_settings_sections('slider_bin_hero_separate_section');
                        submit_button(__('Save Settings', 'slider_bin'));
                        ?>
                    </form>
                    <!-- Clear Button for Hero Separate -->
                    <form method="post" action="" class="clear-saved-settings">
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
                    <form method="post" action="" class="clear-saved-settings">
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
                    <form method="post" action="" class="clear-saved-settings">
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
                    <form method="post" action="" class="clear-saved-settings">
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
