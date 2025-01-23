<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

<div id="post_repeater">
    <?php
    $saved_post_slider_data = get_post_meta($post->ID, '_post_slider_data', true);

    if ($saved_post_slider_data && is_array($saved_post_slider_data)) {
        foreach ($saved_post_slider_data as $slider_data) {
            $post_url = isset($slider_data['url']) ? $slider_data['url'] : '';
            $post_images = isset($slider_data['image']) ? $slider_data['image'] : '';
            $post_headings = isset($slider_data['heading']) ? $slider_data['heading'] : '';
            $post_subheadings = isset($slider_data['subheading']) ? $slider_data['subheading'] : '';
                ?>

            <div class="post_group">
                <div class="inner-field-wrapper">
                    <label for="post_heading">Heading:</label>
                    <input type="text" name="post_heading[]" value="<?php echo esc_attr($slider_data['heading']); ?>" placeholder="Enter Heading">
                </div>

                <div class="inner-field-wrapper">
                    <label for="post_subheading">Sub-Heading:</label>
                    <textarea name="post_subheading[]" placeholder="Enter Subheading"><?php echo esc_textarea($slider_data['subheading']); ?></textarea>
                </div>
                <div class="inner-field-wrapper">
                    <label for="post_link">Button Link:</label>
                    <input type="text" name="post_link[]" value="<?php echo esc_textarea($slider_data['button_link']); ?>" placeholder="Enter Button Link">
                </div>

                <div class="inner-field-wrapper">
                    <label for="post_image">Image:</label>
                    <button type="button" class="button slider-bin-select-image">Upload Image</button>
                    <input type="hidden" name="post_image[]" value="<?php echo esc_attr($slider_data['image']); ?>">
                </div>

                <div class="image-preview">
                    <?php if (!empty($slider_data['image']) && filter_var($slider_data['image'], FILTER_VALIDATE_URL)): ?>
                        <img src="<?php echo esc_url($slider_data['image']); ?>" style="max-width: 100px; margin: 5px;">
                    <?php endif; ?>
                </div>
                <button type="button" class="button remove-repeater">Remove</button>

            </div>


        <?php }
    } else { ?>
    <div class="select_post_group">
        <!-- Category Selection -->
        <div class="inner-field-wrapper">
            <label for="post_category">Select Category - </label>
            <select name="post_category[]" class="post-category" id="category_select">
                <option value="">Select Category</option>
                <?php
                $categories = get_categories(['hide_empty' => false]);
                foreach ($categories as $category) {
                    echo sprintf(
                        '<option value="%d">%s</option>',
                        esc_attr($category->term_id),
                        esc_html($category->name)
                    );
                }
                ?>
            </select>
        </div>
        <div class="tag-note"><span>or</span></div>
        <!-- Tag Selection -->
        <div class="inner-field-wrapper">
            <label for="post_tag">Select Tags - </label>
            <select name="post_tag[]" class="post-tag" id="tag_select">
                <option value="">Select Tags</option>
                <?php
                $tags = get_tags(['hide_empty' => false]); // Correct function
                if (!empty($tags)) {
                    foreach ($tags as $tag) {
                        echo sprintf(
                            '<option value="%d">%s</option>',
                            esc_attr($tag->term_id), // Correct property for the tag ID
                            esc_html($tag->name)
                        );
                    }
                }
                ?>
            </select>
        </div>
    </div>

    <?php
} ?>



<div class="slider-preview"></div>

<div class="slider-preview-wrapper">
    <?php
    if (!empty($saved_post_slider_data)): ?>
        <span class="tag">Preview</span>
        <div class="slider-preview">
            <?php include SLIDER_BIN_PATH . 'modules/frontend/slider-bin-post-slider.php';?>
        </div>
    <?php endif; ?>
</div>
</div>
