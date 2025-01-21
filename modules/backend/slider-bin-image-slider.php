<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>

<div class="inner-field-wrapper">
    <label>Images:</label>
    <button type="button" class="button slider-bin-select-is-images">Upload Images</button>
    <input type="hidden" id="slider_bin_image_slider" name="slider_bin_image_slider" value="<?php echo esc_attr(get_post_meta($post->ID, '_slider_bin_image_slider', true)); ?>">
    <br>
</div>
<div id="image_slider_preview" class="image-preview">
    <?php
    $image_slider_images = get_post_meta($post->ID, '_slider_bin_image_slider', true);
    $image_captions = get_post_meta($post->ID, '_slider_bin_image_captions', true);

    if ($image_slider_images) {
        $image_slider_images = explode(',', $image_slider_images);
        foreach ($image_slider_images as $index => $image) {
            // Get caption for this specific image
            $caption = '';
            if (is_array($image_captions) && isset($image_captions[$image])) {
                $caption = esc_attr($image_captions[$image]);
            }
            ?>
            <div class="image-preview-container">
                <img src="<?php echo esc_url($image); ?>" style="max-width: 100px; margin: 5px;" />
                <input type="text" class="image-caption" name="image_captions[<?php echo esc_attr($image); ?>]" value="<?php echo $caption; ?>" placeholder="Enter image caption" />
                <button type="button" class="button remove-image-button" style="padding: 5px;" data-image-url="<?php echo esc_url($image); ?>">
                    Remove
                </button>
            </div>
            <?php
        }
    }

    ?>
</div>

<div class="slider-preview-wrapper">
    <?php
        $post_id = get_the_ID();
        // Generate a unique ID for this slider preview
        $unique_id = 'slider_bin_' . $post_id . '_' . uniqid();
        // Get image urls
        $image_slider_data = get_post_meta($post_id, '_slider_bin_image_slider', true);
        // Get captions
        $image_captions = get_post_meta($post_id, '_slider_bin_image_captions', true) ?: array();

        if (is_string($image_slider_data)) {
            $image_slider_data = explode(',', $image_slider_data);
        }

        if (!is_array($image_slider_data) || empty($image_slider_data)) {
            echo __('No images found for this slider.', 'slider_bin');
            return;
        }


    if (!empty($image_slider_data) && array_filter($image_slider_data)):
    ?>
        <span class="tag">Preview</span>
        <div class="slider-preview">
            <?php

                include SLIDER_BIN_PATH . 'modules/frontend/slider-bin-image-slider.php';

            ?>
        </div>
   <?php endif;?>

</div>