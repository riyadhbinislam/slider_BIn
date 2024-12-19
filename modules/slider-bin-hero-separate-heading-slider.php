<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>

<div class="slider-wrapper hero-separate-wrapper">
            <div id="arrow-left" class="arrow"></div>
            <div id="slider">
                <?php
                foreach ($hero_separate_slider_data as $slide) {
                // Extract slide data with fallbacks
                $image = isset($slide['image']) ? esc_url($slide['image']) : '';
                $heading = isset($slide['heading']) ? esc_html($slide['heading']) : '';
                $subheading = isset($slide['subheading']) ? esc_html($slide['subheading']) : '';
                $button_link = isset($slide['button_link']) ? esc_url($slide['button_link']) : '';
                $button_text = isset($slide['button_text']) ? esc_html($slide['button_text']) : '';
                ?>

                <div class="slide" style="background-image: url('<?php echo esc_url($image); ?>');">
                    <div class="slide-content">
                        <?php if ($heading) { ?>
                            <h1><?php echo $heading; ?></h1>
                        <?php } ?>
                        <?php if ($subheading) { ?>
                            <p><?php echo $subheading; ?></p>
                        <?php } ?>
                        <?php if ($button_text && $button_link) { ?>
                            <a href="<?php echo $button_link; ?>" class="hero-button" target="_blank"><?php echo $button_text; ?></a>
                        <?php } ?>
                    </div>
                </div>

                <?php } ?>
            </div>
            <div id="arrow-right" class="arrow"></div>
        </div>