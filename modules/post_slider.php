<div id="carousel_slider_<?php print '$slider_id';?>">
  <div id="carousel">

    <div class="hideLeft">
      <img src="https://practice-plugin.local/wp-content/uploads/2024/12/Gallery-9.jpg" alt="Carousel Image 1">
      <div class="slider-content">
        <h2 class="slider-heading">Lorem ipsum dolor sit amet.</h2>
        <p class="slider-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit Sed sit</p>
      </div>
    </div>

    <div class="prevLeftSecond">
      <img src="https://practice-plugin.local/wp-content/uploads/2024/12/Gallery-8.jpg" alt="Carousel Image 2">
      <div class="slider-content">
        <h2 class="slider-heading">Lorem ipsum dolor sit amet.</h2>
        <p class="slider-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit Sed sit</p>
      </div>
    </div>

    <div class="prev">
      <img src="https://practice-plugin.local/wp-content/uploads/2024/12/Gallery-7.jpg" alt="Carousel Image 3">
      <div class="slider-content">
        <h2 class="slider-heading">Lorem ipsum dolor sit amet.</h2>
        <p class="slider-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit Sed sit</p>
      </div>
    </div>

    <div class="selected">
      <img src="https://practice-plugin.local/wp-content/uploads/2024/12/Gallery-6.jpg" alt="Carousel Image 4">
      <div class="slider-content">
        <h2 class="slider-heading">Lorem ipsum dolor sit amet.</h2>
        <p class="slider-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit Sed sit</p>
      </div>
    </div>

    <div class="next">
      <img src="https://practice-plugin.local/wp-content/uploads/2024/12/Gallery-5.jpg" alt="Carousel Image 5">
      <div class="slider-content">
        <h2 class="slider-heading">Lorem ipsum dolor sit amet.</h2>
        <p class="slider-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit Sed sit</p>
      </div>
    </div>

    <div class="nextRightSecond">
      <img src="https://practice-plugin.local/wp-content/uploads/2024/12/Gallery-4.jpg" alt="Carousel Image 6">
      <div class="slider-content">
        <h2 class="slider-heading">Lorem ipsum dolor sit amet.</h2>
        <p class="slider-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit Sed sit</p>
      </div>
    </div>

    <div class="hideRight">
      <img src="https://practice-plugin.local/wp-content/uploads/2024/12/Gallery-3.jpg" alt="Carousel Image 7">
      <div class="slider-content">
        <h2 class="slider-heading">Lorem ipsum dolor sit amet.</h2>
        <p class="slider-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit Sed sit</p>
      </div>
    </div>

  </div>
  <div class="buttons">
      <button id="prev" class="ww_button prevButton" data-id="['slider_id']">Prev</button>
      <button id="next" class="ww_button nextButton" data-id="['slider_id']">Next</button>
  </div>
</div>





  <div class="container swiper">
    <div class="slider-wrapper">
      <div class="card-list swiper-wrapper">
        <div class="card-item swiper-slide">
          <img src="images/img-1.jpg" alt="User Image" class="user-image">
          <h2 class="user-name">James Wilson</h2>
          <p class="user-profession">Software Developer</p>
          <button class="message-button">Message</button>
        </div>

        <div class="card-item swiper-slide">
          <img src="images/img-2.jpg" alt="User Image" class="user-image">
          <h2 class="user-name">Sarah Johnson</h2>
          <p class="user-profession">Graphic Designer</p>
          <button class="message-button">Message</button>
        </div>

        <div class="card-item swiper-slide">
          <img src="images/img-3.jpg" alt="User Image" class="user-image">
          <h2 class="user-name">Michael Brown</h2>
          <p class="user-profession">Project Manager</p>
          <button class="message-button">Message</button>
        </div>

        <div class="card-item swiper-slide">
          <img src="images/img-4.jpg" alt="User Image" class="user-image">
          <h2 class="user-name">Emily Davis</h2>
          <p class="user-profession">Marketing Specialist</p>
          <button class="message-button">Message</button>
        </div>

        <div class="card-item swiper-slide">
          <img src="images/img-5.jpg" alt="User Image" class="user-image">
          <h2 class="user-name">Christopher Garcia</h2>
          <p class="user-profession">Data Scientist</p>
          <button class="message-button">Message</button>
        </div>

        <div class="card-item swiper-slide">
          <img src="images/img-6.jpg" alt="User Image" class="user-image">
          <h2 class="user-name">Richard Wilson</h2>
          <p class="user-profession">Product Designer</p>
          <button class="message-button">Message</button>
        </div>
      </div>

      <div class="swiper-pagination"></div>
      <div class="swiper-slide-button swiper-button-prev"></div>
      <div class="swiper-slide-button swiper-button-next"></div>
    </div>
  </div>


</body>

<style>
  /* Importing Google Font - Montserrat */
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Montserrat", sans-serif;
}

body {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: url("images/bg.jpg") #030728 no-repeat center;
}

.slider-wrapper {
  overflow: hidden;
  max-width: 1200px;
  margin: 0 70px 55px;
}

.card-list .card-item {
  height: auto;
  color: #fff;
  user-select: none;
  padding: 35px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  border-radius: 10px;
  backdrop-filter: blur(30px);
  background: rgba(255, 255, 255, 0.2);
  border: 1px solid rgba(255, 255, 255, 0.5);
}

.card-list .card-item .user-image {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  margin-bottom: 40px;
  border: 3px solid #fff;
  padding: 4px;
}

.card-list .card-item .user-profession {
  font-size: 1.15rem;
  color: #e3e3e3;
  font-weight: 500;
  margin: 14px 0 40px;
}

.card-list .card-item .message-button {
  font-size: 1.25rem;
  padding: 10px 35px;
  color: #030728;
  border-radius: 6px;
  font-weight: 500;
  cursor: pointer;
  background: #fff;
  border: 1px solid transparent;
  transition: 0.2s ease;
}

.card-list .card-item .message-button:hover {
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid #fff;
  color: #fff;
}

.slider-wrapper .swiper-pagination-bullet {
  background: #fff;
  height: 13px;
  width: 13px;
  opacity: 0.5;
}

.slider-wrapper .swiper-pagination-bullet-active {
  opacity: 1;
}

.slider-wrapper .swiper-slide-button {
  color: #fff;
  margin-top: -55px;
  transition: 0.2s ease;
}

.slider-wrapper .swiper-slide-button:hover {
  color: #4658ff;
}

@media (max-width: 768px) {
  .slider-wrapper {
    margin: 0 10px 40px;
  }

  .slider-wrapper .swiper-slide-button {
    display: none;
  }
}
</style>

<script>
  const swiper = new Swiper('.slider-wrapper', {
  loop: true,
  grabCursor: true,
  spaceBetween: 30,

  // Pagination bullets
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
    dynamicBullets: true
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // Responsive breakpoints
  breakpoints: {
    0: {
      slidesPerView: 1
    },
    768: {
      slidesPerView: 2
    },
    1024: {
      slidesPerView: 3
    }
  }
});
</script>
</html>
