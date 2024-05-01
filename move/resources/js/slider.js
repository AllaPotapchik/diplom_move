const slider = document.querySelector('.slider');
let slideIndex = 0;
const totalSlides = 3; // Общее количество слайдов

function scrollToSlide(index) {

    slider.style.transition = 'transform 0.5s ease'; // Добавляем плавную анимацию
    slider.style.transform = `translateX(-${index * 100}vh)`;

}

document.addEventListener('wheel', (e) => {
    if (e.deltaY > 0) {
        slideIndex++;
    } else {
        slideIndex--;
    }
    if (slideIndex < 0) {
        slideIndex = 0;
    } else if (slideIndex >= totalSlides) {
        slideIndex = totalSlides - 1;
    }
    scrollToSlide(slideIndex);
});

// Убираем анимацию после завершения перехода
slider.addEventListener('transitionend', () => {
    slider.style.transition = '';
});
