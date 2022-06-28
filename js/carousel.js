let activeSlider = 0;

const categories = document.querySelectorAll('.category');
let divider;
let categoryDivider;

if (window.innerWidth <= 725) {
    divider = 1;
} else if (window.innerWidth <= 1000 && window.innerHeight > 725) {
    divider = 2;
} else {
    divider = 3;
}

const fetchWindowSize = () => {
    if (window.innerWidth <= 725) {
        divider = 1;
    } else if (window.innerWidth <= 1000 && window.innerHeight > 725) {
        divider = 2;
    } else {
        divider = 3;
    }
}

window.addEventListener('resize', fetchWindowSize());

if (categories.length % divider === 0) {
    categoryDivider = categories.length;
} else {
    categoryDivider = categories.length % divider;
}

const sliderBtnLeft = () => {
    if (activeSlider === 0) {
        const categoryContainer = document.querySelector('.categories');
        activeSlider = categoryDivider;
        categoryContainer.style.transform = `translateX(${(activeSlider - 1) * -100}%)`;  
    } else {
        const categoryContainer = document.querySelector('.categories');
        activeSlider = activeSlider - 1;
        if (activeSlider !== 0) {
            categoryContainer.style.transform = `translateX(${(activeSlider - 1) * -100}%)`;
        } else {
            categoryContainer.style.transform = `translateX(${activeSlider * -100}%)`;
        }
    }
}

const sliderBtnRight = () => {
    if (activeSlider === categoryDivider) {
        const categoryContainer = document.querySelector('.categories');
        activeSlider = 0;
        categoryContainer.style.transform = `translateX(${activeSlider * -100}%)`;  
    } else {
        const categoryContainer = document.querySelector('.categories');
        activeSlider = activeSlider + 1;
        if (activeSlider !== 1) {
            categoryContainer.style.transform = `translateX(${(activeSlider - 1) * -100}%)`;
        } else {
            categoryContainer.style.transform = `translateX(${activeSlider * -100}%)`;
        }

    }
}