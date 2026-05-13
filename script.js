function changeSlide(button, direction) {
    const slider = button.closest('.slider');
    const images = slider.querySelectorAll('.slides img');
    let current = 0;

    images.forEach((image, index) => {
        if (image.classList.contains('active')) {
            current = index;
            image.classList.remove('active');
        }
    });

    let next = current + direction;

    if (next < 0) {
        next = images.length - 1;
    }

    if (next >= images.length) {
        next = 0;
    }

    images[next].classList.add('active');
}
