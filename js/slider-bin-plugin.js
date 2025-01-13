
    function initializeSlider(sliderSelector, settings) {
        const sliderElement = document.querySelector(sliderSelector);
        if (!sliderElement) return;

        let autoSlideInterval;
        const AUTO_SLIDE_DELAY = parseInt(settings.autoplay_timeout);
        const AUTO_SLIDE_SPEED = parseInt(settings.autoplay_speed);
        const AUTO_SLIDE_PAUSE_ON_HOVER = settings.autoplay_pause_on_hover === 'true';

        const sliderImages = sliderElement.querySelectorAll('.slide');
        const arrowLeft = sliderElement.querySelector('.arrow-left');
        const arrowRight = sliderElement.querySelector('.arrow-right');
        let current = 0;

        function reset() {
            sliderImages.forEach(slide => {
                slide.style.display = 'none';
            });
        }

        function init() {
            reset();
            if (sliderImages.length > 0) {
                sliderImages[0].style.display = 'block';
            }
        }

        function slideLeft() {
            reset();
            current = (current === 0) ? sliderImages.length - 1 : current - 1;
            sliderImages[current].style.display = 'block';
        }

        function slideRight() {
            reset();
            current = (current === sliderImages.length - 1) ? 0 : current + 1;
            sliderImages[current].style.display = 'block';
        }

        if (arrowLeft) {
            arrowLeft.addEventListener('click', function () {
                resetAutoSlide();
                slideLeft();
            });
        }

        if (arrowRight) {
            arrowRight.addEventListener('click', function () {
                resetAutoSlide();
                slideRight();
            });
        }

        function startAutoSlide() {
            autoSlideInterval = setInterval(slideRight, AUTO_SLIDE_DELAY);
        }

        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            startAutoSlide();
        }

        // Pause on hover if enabled
        if (AUTO_SLIDE_PAUSE_ON_HOVER) {
            sliderElement.addEventListener('mouseover', () => clearInterval(autoSlideInterval));
            sliderElement.addEventListener('mouseout', startAutoSlide);
        }

        // Initialize and start the slider
        init();
        if (sliderImages.length > 1) {
            startAutoSlide();
        }
    }

    // Initialize all sliders on the page
    document.addEventListener('DOMContentLoaded', function () {
        const sliders = document.querySelectorAll('.slider-wrapper');
        sliders.forEach((slider, index) => {
            const settings = {
                autoplay_timeout: slider.dataset.autoplayTimeout || 5000,
                autoplay_speed: slider.dataset.autoplaySpeed || 500,
                autoplay_pause_on_hover: slider.dataset.pauseOnHover || 'true',
            };

            const uniqueSelector = `#slider-${index}`;
            slider.setAttribute('id', `slider-${index}`);
            initializeSlider(uniqueSelector, settings);
        });
    });