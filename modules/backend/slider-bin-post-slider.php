<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

<div class="slider-slogan">
    <h2 class="slider-title">Catch Up on Our Most Engaging Reads</h2>
    <p class="slider-subtitle">Let your stories shine—slide through your top posts in style.</p>
</div>

<div id="post_repeater">
    <?php
    $saved_post_slider_data = get_post_meta($post->ID, '_post_slider_data', true);

    if ($saved_post_slider_data && is_array($saved_post_slider_data)) {
        foreach ($saved_post_slider_data as $slider_data) { ?>
            <div class="post_group">
                <div class="inner-field-wrapper">
                    <label for="post_url">Select Blog:</label>
                    <select name="post_url[]" class="post-select" data-group-index="0">
                        <option value="">Select Post</option>
                        <?php
                        $posts = get_posts(['post_type' => 'post', 'post_status' => 'publish']);
                        foreach ($posts as $post_option) {
                             // Store both ID and permalink as data attributes
                            $selected = ($post_option->ID == $slider_data['url']) ? 'selected' : '';
                            echo sprintf(
                                '<option value="%d" data-permalink="%s" %s>%s</option>',
                                esc_attr($post_option->ID),
                                esc_url(get_permalink($post_option->ID)),
                                $selected,
                                esc_html($post_option->post_title)
                            );
                        }
                        ?>
                    </select>
                    <input type="hidden" name="post_permalink[]" value="<?php echo esc_url(get_permalink($post_option->ID)); ?>">
                </div>

                <div class="inner-field-wrapper">
                    <label for="post_heading">Heading:</label>
                    <input type="text" name="post_heading[]" value="<?php echo esc_attr($slider_data['heading']); ?>" placeholder="Enter Heading">
                </div>

                <div class="inner-field-wrapper">
                    <label for="post_subheading">Sub-Heading:</label>
                    <textarea name="post_subheading[]" placeholder="Enter Subheading"><?php echo esc_textarea($slider_data['subheading']); ?></textarea>
                </div>

                <div class="inner-field-wrapper">
                    <label for="post_image">Image:</label>
                    <button type="button" class="button slider-bin-select-image">Upload Image</button>
                    <input type="hidden" name="post_image[]" value="<?php echo esc_attr($slider_data['image']); ?>">
                </div>

                <div class="image-preview">
                    <?php if (!empty($slider_data['image'])) { ?>
                        <img src="<?php echo esc_url($slider_data['image']); ?>" style="max-width: 100px; margin: 5px;">
                    <?php } ?>
                </div>
                <button type="button" class="button remove-repeater">Remove</button>
            </div>
        <?php }
    } else { ?>
        <div class="post_group">
            <div class="inner-field-wrapper">
                <label for="post_url">Select Blog:</label>
                <select name="post_url[]" class="post-select" data-group-index="0">
                    <option value="">Select Post</option>
                    <?php
                    $posts = get_posts(['post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => -1]);
                    foreach ($posts as $post_option) {
                        echo sprintf(
                            '<option value="%d" data-permalink="%s">%s</option>',
                            esc_attr($post_option->ID),
                            esc_url(get_permalink($post_option->ID)),
                            esc_html($post_option->post_title)
                        );
                    }
                    ?>
                </select>
                <input type="hidden" name="post_permalink[]" value="<?php echo esc_url(get_permalink($post_option->ID)); ?>">
            </div>

            <div class="inner-field-wrapper">
                <label for="post_heading">Heading:</label>
                <input type="text" name="post_heading[]" placeholder="Enter Heading" value="">
            </div>

            <div class="inner-field-wrapper">
                <label for="post_subheading">Sub-Heading:</label>
                <textarea name="post_subheading[]" placeholder="Enter Subheading"></textarea>
            </div>

            <div class="inner-field-wrapper">
                <label for="post_image">Image:</label>
                <button type="button" class="button slider-bin-select-image">Upload Image</button>
                <input type="hidden" name="post_image[]" value="">
            </div>

            <div class="image-preview"></div>
            <button type="button" class="button remove-repeater">Remove</button>
        </div>
    <?php } ?>
</div>
<button type="button" class="button" id="add_more_repeater" style="display:block; margin:30px auto;">Add More</button>