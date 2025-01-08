<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>


<div class="slider-slogan">
    <h2 class="slider-title">Let Your Images Speak Louder Than Words</h2>
    <p class="slider-Subtitle">Highlight your best shots with a dynamic sliding gallery.</p>
</div>
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
                <input type="text"
                       class="image-caption"
                       name="image_captions[<?php echo esc_attr($image); ?>]"
                       value="<?php echo $caption; ?>"
                       placeholder="Enter image caption"
                       style="width: 100%; margin: 5px 0;" />
                <button type="button"
                        class="remove-image-button"
                        data-image-url="<?php echo esc_url($image); ?>">
                    Remove
                </button>
            </div>
            <?php
        }
    }
    ?>
</div>
