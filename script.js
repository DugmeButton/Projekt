function changeSlide(button, direction) {
    const slideshow = button.closest('.slideshow');
    const images = slideshow.querySelectorAll('.slides img');
    let activeIndex = 0;

    images.forEach((image, index) => {
        if (image.classList.contains('active')) {
            activeIndex = index;
            image.classList.remove('active');
        }
    });

    let nextIndex = activeIndex + direction;

    if (nextIndex < 0) {
        nextIndex = images.length - 1;
    }

    if (nextIndex >= images.length) {
        nextIndex = 0;
    }

    images[nextIndex].classList.add('active');
}
