function changeSlide(button, direction) {
    const slideshow = button.closest('.slideshow');
    const images = slideshow.querySelectorAll('.slides img');
    let activeIndex = 0;

    images.forEach((img, index) => {
        if (img.classList.contains('active')) {
            activeIndex = index;
            img.classList.remove('active');
        }
    });

    let newIndex = activeIndex + direction;

    if (newIndex < 0) newIndex = images.length - 1;
    if (newIndex >= images.length) newIndex = 0;

    images[newIndex].classList.add('active');
}
