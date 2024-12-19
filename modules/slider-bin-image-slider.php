<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>

<div class="slider-wrapper image-slider">
            <div id="arrow-left" class="arrow"></div>
            <div id="slider">
                <?php
                    foreach ($image_slider_data as $index => $image_url) {
                    // Trim and sanitize the image URL
                    $image_url = esc_url(trim($image_url));

                    if ($image_url) { ?>

                    <div class="slide">
                        <img class="slide-image" src="<?php echo $image_url; ?>" alt="<?php echo esc_attr('Slider Image ' . ($index + 1)); ?>">
                    </div>
                <?php }
                else { ?>
                    <p>No slider data available.</p>
                <?php }} ?>
            </div>
            <div id="arrow-right" class="arrow"></div>
        </div>