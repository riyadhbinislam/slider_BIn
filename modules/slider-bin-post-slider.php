<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>

<div class="slider-wrapper post-slider">
        <div id="arrow-left" class="arrow"></div>
        <div id="slider">
            <?php if (!empty($post_slider_data)) {
                foreach ($post_slider_data as $index => $slide) {
                // Ensure each slide has valid data
                $image = isset($slide['image']) ? esc_url($slide['image']) : '';
                $heading = isset($slide['heading']) ? esc_html($slide['heading']) : '';
                $subheading = isset($slide['subheading']) ? esc_html($slide['subheading']) : '';
                $url = isset($slide['url']) ? esc_url($slide['url']) : '';
            ?>

            <div class="slide" style="background-image: url('<?php if ($image) { echo $image;} ?>');">
                <div class="slide-content">
                    <?php if ($heading) { ?>
                        <h2><?php echo $heading; ?></h2>
                    <?php } ?>
                    <?php if ($subheading) { ?>
                        <p><?php echo $subheading; ?></p>
                    <?php } ?>
                    <?php if ($url) { ?>
                        <a href="<?php echo $url; ?>" class="slider-link">Read More</a>
                    <?php } ?>
                </div>
            </div>
            <?php }
            } else { ?>
                <p>No slider data available.</p>
            <?php } ?>
        </div>
        <div id="arrow-right" class="arrow"></div>
    </div>