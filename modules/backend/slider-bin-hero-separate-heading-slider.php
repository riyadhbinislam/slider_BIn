<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>

<div id="hero_repeater">
    <?php
        // Retrieve saved data
        $hero_separate_slider_data = get_post_meta($post->ID, '_hero_separate_slider_data', true);

        if (!empty($hero_separate_slider_data) && is_array($hero_separate_slider_data)) {
            foreach ($hero_separate_slider_data as $index => $group_data) {
                // Extract individual fields for pre-filling
                $image = esc_url($group_data['image'] ?? '');
                $heading = esc_attr($group_data['heading'] ?? '');
                $subheading = esc_textarea($group_data['subheading'] ?? '');
                $button_link = esc_url($group_data['button_link'] ?? '');
                $button_text = esc_attr($group_data['button_text'] ?? '');
                $image_url = esc_url($group_data['image_url'] ?? '');
                ?>
                <div class="hero_group">
                    <div class="inner-field-wrapper">
                        <label for="hero_heading_<?php echo $index; ?>">Heading:</label>
                        <input type="text" name="hero_heading[]" value="<?php echo $heading; ?>" placeholder="Enter heading">
                    </div>

                    <div class="inner-field-wrapper">
                        <label for="hero_subheading_<?php echo $index; ?>">Sub-Heading:</label>
                        <input type="text" name="hero_subheading[]" value="<?php echo $subheading; ?>" placeholder="Enter sub-heading">
                    </div>

                    <div class="inner-field-wrapper">
                        <label for="hero_button_link_<?php echo $index; ?>">Button Link:</label>
                        <input type="url" name="hero_button_link[]" value="<?php echo $button_link; ?>" placeholder="https://example.com">
                    </div>

                    <div class="inner-field-wrapper">
                        <label for="hero_button_text_<?php echo $index; ?>">Button Text:</label>
                        <input type="text" name="hero_button_text[]" value="<?php echo $button_text; ?>" placeholder="Click Me">
                    </div>

                    <div class="inner-field-wrapper">
                        <div class="hero-image-upload-wrapper">
                            <?php if ($image): ?>
                                <div>
                                    <label for="hero_image_<?php echo $index; ?>">Image:</label>
                                    <button type="button" class="button slider-bin-select-hero-image">Upload Image</button>
                                    <input type="hidden" name="hero_image[]" value="<?php echo $image; ?>">
                                </div>
                            <?php elseif ($image_url): ?>
                                <div class="custom-image-url">
                                    <label for="hero_image_url_<?php echo $index; ?>">Image URL:</label>
                                    <input type="url" name="hero_image_url[]" value="<?php echo $image_url; ?>" placeholder="https://example.com/image.jpg">
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="hero-image-preview" style="margin-top: 10px;">
                            <?php if ($image): ?>
                                <img src="<?php echo $image; ?>" alt="Preview" style="max-width: 100px; margin: 5px;">
                            <?php elseif ($image_url): ?>
                                <img src="<?php echo $image_url; ?>" alt="Preview" style="max-width: 100px; margin: 5px;">
                            <?php endif; ?>
                        </div>
                    </div>

                    <button type="button" class="button remove-hero-group">Remove</button>
                </div>
                <?php
            }
        }
        else {
    ?>
        <!--  Empty group template for adding new -->
        <div class="hero_group">
            <div class="inner-field-wrapper">
                <label for="hero_heading">Heading:</label>
                <input type="text" name="hero_heading[]" value="" placeholder="Enter heading">
            </div>

            <div class="inner-field-wrapper">
                <label for="hero_subheading">Sub-Heading:</label>
                <input type="text" name="hero_subheading[]" value="" placeholder="Enter sub-heading">
            </div>

            <div class="inner-field-wrapper">
                <label for="hero_button_link">Button Link:</label>
                <input type="url" name="hero_button_link[]" value="" placeholder="https://example.com">
            </div>

            <div class="inner-field-wrapper">
                <label for="hero_button_text">Button Text:</label>
                <input type="text" name="hero_button_text[]" value="" placeholder="Click Me">
            </div>

            <div class="inner-field-wrapper">
                <div class="hero-image-upload-wrapper">
                    <div>
                        <label for="hero_image">Image:</label>
                        <button type="button" class="button slider-bin-select-hero-image">Upload Image</button>
                        <input type="hidden" name="hero_image[]" value="">
                    </div>

                    <p>or</p>

                    <div class="custom-image-url">
                        <label for="hero_image_url">Image URL:</label>
                        <input type="url" name="hero_image_url[]" value="">
                    </div>
                </div>

                <div class="hero-image-preview" style="margin-top: 10px;"></div>
            </div>

            <button type="button" class="button remove-hero-group">Remove</button>
        </div>
    <?php
        }
    ?>
</div>
<button class="button" type="button" id="add_more_hero_repeater">Add More</button>

<div class="slider-preview-wrapper">
    <?php if (!empty($hero_separate_slider_data)):
       $post_id = get_the_ID();
       // Generate a unique ID for this slider preview
       $unique_id = 'slider_bin_' . $post_id . '_' . uniqid();

        ?>
        <span class="tag">Preview</span>
        <div class="slider-preview">
            <?php include SLIDER_BIN_PATH . 'modules/frontend/slider-bin-hero-separate-heading-slider.php';?>
        </div>
    <?php endif; ?>
</div>
