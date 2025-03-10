let currentSlide = 0;
function showSlide(index) {
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;

    // Wrap around the slides
    if (index >= totalSlides) currentSlide = 0;
    if (index < 0) currentSlide = totalSlides - 1;

    slides.forEach((slide, i) => {
        slide.style.transform = `translateX(-${currentSlide * 100}vw)`;
    });
}
function changeSlide(n) {
    currentSlide += n;
    showSlide(currentSlide);
}
document.addEventListener('DOMContentLoaded', () => {
    showSlide(currentSlide);
});
