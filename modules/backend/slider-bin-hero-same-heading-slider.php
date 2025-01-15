<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>

<?php
    // Retrieve the saved meta data
    global $post;
    // Retrieve the saved meta data
    $hero_same_slider_data = get_post_meta($post->ID, '_hero_same_slider_data', true);

    // Default empty values if the meta data is missing
    $hero_heading = isset($hero_same_slider_data['heading']) ? esc_attr($hero_same_slider_data['heading']) : '';
    $hero_subheading = isset($hero_same_slider_data['subheading']) ? esc_attr($hero_same_slider_data['subheading']) : '';
    $hero_button_link = isset($hero_same_slider_data['button_link']) ? esc_url($hero_same_slider_data['button_link']) : '';
    $hero_button_text = isset($hero_same_slider_data['button_text']) ? esc_attr($hero_same_slider_data['button_text']) : '';
    $hero_images_array = [];

    // Check if saved images exist and are an array
    if (!empty($hero_same_slider_data['images']) && is_array($hero_same_slider_data['images'])) {
        $hero_images_array = array_map('esc_url', $hero_same_slider_data['images']);
    }
?>


<div class="hero_group">
    <?php wp_nonce_field('hero_same_slider_nonce', 'hero_same_slider_nonce'); ?>
    <div class="inner-field-wrapper">
        <label for="hero_same_heading">Heading:</label>
        <input type="text"
            name="hero_same_heading"
            id="hero_same_heading"
            value="<?php echo esc_attr($hero_heading); ?>"
            placeholder="Enter Hero Heading">
    </div>

    <div class="inner-field-wrapper">
        <label for="hero_same_subheading">Sub-Heading:</label>
        <input type="text"
            name="hero_same_subheading"
            id="hero_same_subheading"
            value="<?php echo esc_attr($hero_subheading); ?>"
            placeholder="Enter Hero sub-Heading">
    </div>

    <div class="inner-field-wrapper">
        <label for="hero_same_button_link">Button Link:</label>
        <input type="text"
            name="hero_same_button_link"
            id="hero_same_button_link"
            value="<?php echo esc_url($hero_button_link); ?>"
            placeholder="www.example.com">
    </div>

    <div class="inner-field-wrapper">
        <label for="hero_same_button_text">Button Text:</label>
        <input type="text"
            name="hero_same_button_text"
            id="hero_same_button_text"
            value="<?php echo esc_attr($hero_button_text); ?>"
            placeholder="Enter CTA Button Text">
    </div>

    <div class="inner-field-wrapper">
        <label for="hero_images">Images</label>
        <button type="button" class="button slider-bin-select-images">Upload Images</button>
        <input type="hidden"
            name="hero_images"
            id="hero_images"
            value="<?php echo esc_attr(implode(',', $hero_images_array)); ?>">
    </div>
    <div id="hero_image_slider_preview" class="image-preview">
        <?php if (!empty($hero_images_array)): ?>
            <?php foreach ($hero_images_array as $image_url): ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="Preview Image" style="max-width: 100px; margin: 5px;">
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<div class="slider-preview-wrapper">
    <?php if (!empty($hero_same_slider_data)):
    $post_id = get_the_ID();

    // Generate a unique ID for this slider preview
    $unique_id = 'slider_bin_' . $post_id . '_' . uniqid();
 ?>
        <span class="tag">Preview</span>
        <div class="slider-preview">
            <?php include SLIDER_BIN_PATH . 'modules/frontend/slider-bin-hero-same-heading-slider.php';?>
        </div>
    <?php endif; ?>
</div>
