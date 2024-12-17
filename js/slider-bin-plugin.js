var sliderImages = document.querySelectorAll('.slide'),
    arrowLeft = document.querySelector('#arrow-left'),
    arrowRight = document.querySelector('#arrow-right'),
    current = 0,
    autoSlideInterval,
    AUTO_SLIDE_DELAY = 5000; // 5 seconds

function reset() {
    for (let i = 0; i < sliderImages.length; i++) {
        sliderImages[i].style.display = 'none';
    }
}

function init() {
    reset();
    sliderImages[0].style.display = 'block';
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

arrowLeft.addEventListener('click', function () {
    resetAutoSlide();
    slideLeft();
});

arrowRight.addEventListener('click', function () {
    resetAutoSlide();
    slideRight();
});

function startAutoSlide() {
    autoSlideInterval = setInterval(slideRight, AUTO_SLIDE_DELAY);
}

function resetAutoSlide() {
    clearInterval(autoSlideInterval);
    startAutoSlide();
}

// Initialize Slider
init();
startAutoSlide();