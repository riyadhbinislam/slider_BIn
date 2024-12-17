<?php

        // // Retrieve the saved Hero Slider option
        $hero_field_option = get_post_meta($post->ID, '_hero_field_option', true);
        $hero_heading = get_post_meta($post->ID, '_hero_heading', true);
        $hero_subheading = get_post_meta($post->ID, '_hero_subheading', true);
        $hero_button_link = get_post_meta($post->ID, '_hero_button_link', true);
        $hero_button_text = get_post_meta($post->ID, '_hero_button_text', true);

        // Check for saved repeater data for separate fields
        $hero_slider_data = get_post_meta($post->ID, '_hero_slider_data', true);

?>


  <div id="<?php print '$slider_id';?>">
    <div id="carousel">
      <div class="hideLeft">
          <img class="hero_image" src="https://practice-plugin.local/wp-content/uploads/2024/12/Gallery-9.jpg" alt="Carousel Image 1">
          <div class="slider-content">
            <h2 class="hero_heading"><?php echo esc_html(get_post_meta($post_id, '_hero_heading', true));?></h2>
            <p class="hero_subheading"><?php echo esc_html(get_post_meta($post_id, '_hero_subheading', true));?></p>
            <div class="hero-button-wrapper">
                <a href="<?php echo esc_html(get_post_meta($post_id, '_hero_button_link', true));?>"><button id ="hero_button" class="hero-button-one"><?php echo esc_html(get_post_meta($post_id, '_hero_button_text', true));?></button></a>
            </div>
          </div>
      </div>
      <div class="prevLeftSecond">
          <img class="hero_image" src="https://practice-plugin.local/wp-content/uploads/2024/12/Gallery-9.jpg" alt="Carousel Image 1">
          <div class="slider-content">
            <h2 class="hero_heading"><?php echo esc_html(get_post_meta($post_id, '_hero_heading', true));?></h2>
            <p class="hero_subheading"><?php echo esc_html(get_post_meta($post_id, '_hero_subheading', true));?></p>
            <div class="hero-button-wrapper">
                <a href="<?php echo esc_html(get_post_meta($post_id, '_hero_button_link', true));?>"><button id ="hero_button" class="hero-button-one"><?php echo esc_html(get_post_meta($post_id, '_hero_button_text', true));?></button></a>
            </div>
          </div>
      </div>
      <div class="prev">
          <img class="hero_image" src="https://practice-plugin.local/wp-content/uploads/2024/12/Gallery-9.jpg" alt="Carousel Image 1">
          <div class="slider-content">
            <h2 class="hero_heading"><?php echo esc_html(get_post_meta($post_id, '_hero_heading', true));?></h2>
            <p class="hero_subheading"><?php echo esc_html(get_post_meta($post_id, '_hero_subheading', true));?></p>
            <div class="hero-button-wrapper">
                <a href="<?php echo esc_html(get_post_meta($post_id, '_hero_button_link', true));?>"><button id ="hero_button" class="hero-button-one"><?php echo esc_html(get_post_meta($post_id, '_hero_button_text', true));?></button></a>
            </div>
          </div>
      </div>
      <div class="selected">
          <img class="hero_image" src="https://practice-plugin.local/wp-content/uploads/2024/12/Gallery-9.jpg" alt="Carousel Image 1">
          <div class="slider-content">
            <h2 class="hero_heading"><?php echo esc_html(get_post_meta($post_id, '_hero_heading', true));?></h2>
            <p class="hero_subheading"><?php echo esc_html(get_post_meta($post_id, '_hero_subheading', true));?></p>
            <div class="hero-button-wrapper">
                <a href="<?php echo esc_html(get_post_meta($post_id, '_hero_button_link', true));?>"><button id ="hero_button" class="hero-button-one"><?php echo esc_html(get_post_meta($post_id, '_hero_button_text', true));?></button></a>
            </div>
          </div>
      </div>
      <div class="next">
          <img class="hero_image" src="https://practice-plugin.local/wp-content/uploads/2024/12/Gallery-9.jpg" alt="Carousel Image 1">
          <div class="slider-content">
            <h2 class="hero_heading"><?php echo esc_html(get_post_meta($post_id, '_hero_heading', true));?></h2>
            <p class="hero_subheading"><?php echo esc_html(get_post_meta($post_id, '_hero_subheading', true));?></p>
            <div class="hero-button-wrapper">
                <a href="<?php echo esc_html(get_post_meta($post_id, '_hero_button_link', true));?>"><button id ="hero_button" class="hero-button-one"><?php echo esc_html(get_post_meta($post_id, '_hero_button_text', true));?></button></a>
            </div>
          </div>
      </div>
      <div class="nextRightSecond">
          <img class="hero_image" src="https://practice-plugin.local/wp-content/uploads/2024/12/Gallery-9.jpg" alt="Carousel Image 1">
          <div class="slider-content">
            <h2 class="hero_heading"><?php echo esc_html(get_post_meta($post_id, '_hero_heading', true));?></h2>
            <p class="hero_subheading"><?php echo esc_html(get_post_meta($post_id, '_hero_subheading', true));?></p>
            <div class="hero-button-wrapper">
                <a href="<?php echo esc_html(get_post_meta($post_id, '_hero_button_link', true));?>"><button id ="hero_button" class="hero-button-one"><?php echo esc_html(get_post_meta($post_id, '_hero_button_text', true));?></button></a>
            </div>
          </div>
      </div>
      <div class="hideRight">
          <img class="hero_image" src="https://practice-plugin.local/wp-content/uploads/2024/12/Gallery-9.jpg" alt="Carousel Image 1">
          <div class="slider-content">
            <h2 class="hero_heading">Lorem ipsum dolor sit amet.</h2>
            <p class="hero_subheading"><?php echo esc_html(get_post_meta($post_id, '_hero_subheading', true));?></p>
            <div class="hero-button-wrapper">
                <a href="<?php echo esc_html(get_post_meta($post_id, '_hero_button_link', true));?>"><button id ="hero_button" class="hero-button-one"><?php echo esc_html(get_post_meta($post_id, '_hero_button_text', true));?></button></a>
            </div>
          </div>
      </div>
    </div>
    <div class="buttons">
        <button id="prev" class="ww_button prevButton" data-id="">Prev</button>
        <button id="next" class="ww_button nextButton" data-id="">Next</button>
    </div>
  </div>