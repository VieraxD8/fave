
const slides = document.querySelectorAll('.slide');
const leftBtn = document.getElementById('left');
const rightBtn = document.getElementById('right');
const indicators = document.querySelectorAll(".indicator");
let autoSlideInterval;

let activeSlide = 0;
let isAutoSliding = true;

// Definir la función que avanza a la siguiente diapositiva
function nextSlide() {
    activeSlide++;

    if (activeSlide > slides.length - 1) {
        activeSlide = 0;
    }

    setActiveSlide();
}

function startAutoSlide() {
    autoSlideInterval = setInterval(() => {
        if (isAutoSliding) {
            nextSlide();
        }
    }, 15000);
}

// Iniciar el slider automáticamente
startAutoSlide();

rightBtn.addEventListener('click', () => {
    isAutoSliding = false;
    nextSlide();
    isAutoSliding = true;
});

leftBtn.addEventListener('click', () => {
    isAutoSliding = false;
    activeSlide--;

    if (activeSlide < 0) {
        activeSlide = slides.length - 1;
    }

    setActiveSlide();
    isAutoSliding = true;
});

function setActiveSlide() {
    slides.forEach((slide) => slide.classList.remove('active'));
    slides[activeSlide].classList.add('active');

    indicators.forEach((indicator, index) => {
        indicator.classList.toggle("active", index === activeSlide);
    });
}

indicators.forEach((indicator, index) => {
    indicator.addEventListener('click', () => {
        isAutoSliding = false;
        activeSlide = index;
        setActiveSlide();
        isAutoSliding = true;
    });
});



/*mostrar aimation de textos*/ 

function handleIntersect(entries, observer) {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('actividad');
        }
    });
}

const options = {
    root: null,
    rootMargin: '0px',
    threshold: 0.3,
};

const observer = new IntersectionObserver(handleIntersect, options);

slides.forEach((slide) => {
    observer.observe(slide);
});