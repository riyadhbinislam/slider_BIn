<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>


<div class="slider-wrapper hero-same-wrapper">
            <div id="arrow-left" class="arrow"></div>
            <div id="slider">
                <?php if (!empty($hero_same_slider_data['images'])):
                    foreach ($hero_same_slider_data['images'] as $image_url): ?>
                        <div class="slide">
                            <img src="<?php echo esc_url($image_url); ?>" alt="Hero Image">
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="slider-content">
                    <?php if (!empty($hero_same_slider_data['heading'])): ?>
                        <h1><?php echo esc_html($hero_same_slider_data['heading']); ?></h1>
                    <?php endif; ?>

                    <?php if (!empty($hero_same_slider_data['subheading'])): ?>
                        <p><?php echo esc_html($hero_same_slider_data['subheading']); ?></p>
                    <?php endif; ?>

                    <?php if (!empty($hero_same_slider_data['button_text']) && !empty($hero_same_slider_data['button_link'])): ?>
                        <a href="<?php echo esc_url($hero_same_slider_data['button_link']); ?>" class="hero-button" target="_blank">
                            <?php echo esc_html($hero_same_slider_data['button_text']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div id="arrow-right" class="arrow"></div>
        </div>