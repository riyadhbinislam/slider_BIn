<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>


<div class="slider-slogan">
    <h2 class="slider-title">Heroic Moments, Singular Focus</h2>
    <p class="slider-Subtitle">A seamless video slider with multiple video URLs and previews.</p>
</div>

<div class="video-wrapper-style">
    <!-- Repeatable Group -->
    <div id="video_repeater">
        <p>“Integrate external video URLs, such as YouTube or Vimeo, seamlessly into your project.”</p>
        <?php
        // Retrieve saved video URLs (as an array)
        $video_urls = get_post_meta($post->ID, '_video_urls', true);
        $video_urls = is_array($video_urls) ? $video_urls : []; // Ensure it's an array

        // Display existing video URLs
        if (!empty($video_urls)) {
            foreach ($video_urls as $index => $video_url) {
                ?>
                <div class="video_group">
                    <div class="inner-field-wrapper">
                        <label for="video_url_<?php echo $index; ?>">External Video URL:</label>
                        <input type="url" name="video_urls[]" value="<?php echo esc_url($video_url); ?>" >
                        <button type="button" class="button remove-video">Remove</button>
                    </div>
                </div>
                <?php
            }
        } else {
            // Default empty input for the first video URL
            ?>
            <div class="video_group">
                <div class="inner-field-wrapper">
                    <label for="video_url_0">External Video URL:</label>
                    <input type="url" name="video_urls[]" value="">
                    <button type="button" class="button remove-video">Remove</button>
                </div>
            </div>
            <?php
        }
        ?>

    </div>
    <!-- Button to add more video input fields -->
    <button type="button" class="button" id="add_more_video_repeater" >Add More</button>
</div>


<!-- Upload Videos -->
<div class="inner-field-wrapper">
    <label>Or Select From Media:</label>
    <button type="button" class="button slider-bin-select-videos">Upload Video</button>
    <input type="hidden" id="slider_bin_videos" name="slider_bin_videos" value="<?php echo esc_attr(get_post_meta($post->ID, '_slider_bin_videos', true)); ?>">
</div>

<!-- Preview Video -->
<div id="video_preview" style="margin-top: 15px;">
     <?php
    $uploaded_videos = get_post_meta($post->ID, '_slider_bin_videos', true);
    if (!empty($uploaded_videos)) {
        $uploaded_videos = explode(',', $uploaded_videos);
        foreach ($uploaded_videos as $video_url) {
            echo '<div class="video-wrapper" style="display: inline-block; margin: 10px;">';
            echo '<video src="' . esc_url($video_url) . '" controls style="max-width: 180px; margin-right: 5px; display: inline-block;"></video>';
            echo '<button type="button" class="button remove-video-preview" style="display: block; margin: 0 auto;">Remove</button>';
            echo '</div>';
        }
    }
    ?>
</div>
