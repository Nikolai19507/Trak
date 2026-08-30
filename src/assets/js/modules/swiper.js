import Swiper from 'swiper';
import { Autoplay, EffectFade, Navigation, Pagination, Mousewheel, Thumbs, Keyboard } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

import 'swiper/css/effect-fade';

import 'swiper/css/thumbs';


// ================================================================================== home page
document.addEventListener('DOMContentLoaded', () => {
    // heroSwiper
    const heroSwiper = new Swiper(".hero-slider", {
        modules: [Autoplay, EffectFade, Navigation, Pagination, Keyboard],

        loop: true,
        speed: 1000,
        mousewheel: false,
        keyboard: true,

        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },

        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        navigation: {
            nextEl: ".hero-swiper-button-next",
            prevEl: ".hero-swiper-button-prev",
        },
        pagination: {
            el: ".hero-swiper-pagination",
            clickable: true,
        },
    });





    const categoriesSlider = {
        selector: '.categories-slider__swiper',
        prevBtn: '.categories-button-prev',
        nextBtn: '.categories-button-next',
        pagination: '.categories-swiper-pagination',
    }

    const productsSlider = {
        selector: '.products-slider__swiper',
        prevBtn: '.products-button-prev',
        nextBtn: '.products-button-next',
        pagination: '.products-swiper-pagination',
    }

    const newsSlider = {
        selector: '.news-slider__swiper',
        prevBtn: '.news-button-prev',
        nextBtn: '.news-button-next',
        pagination: '.news-swiper-pagination',
    }


    function initCustomSwiper({ selector, prevBtn, nextBtn, pagination }) {
        new Swiper(selector, {
            modules: [Navigation, Pagination],

            slidesPerView: 4,
            spaceBetween: 30,

            navigation: {
                nextEl: nextBtn,
                prevEl: prevBtn,
            },

            pagination: {
                el: pagination,
                type: 'fraction',
            },

            breakpoints: {
                320: { slidesPerView: 1.1, spaceBetween: 10 },
                450: { slidesPerView: 1.4, spaceBetween: 10 },
                620: { slidesPerView: 2, spaceBetween: 10 },
                767: { slidesPerView: 3, spaceBetween: 15 },
                1204: { slidesPerView: 4, spaceBetween: 30 }
            }
        });
    };


    initCustomSwiper(categoriesSlider);
    initCustomSwiper(productsSlider);
    initCustomSwiper(newsSlider);
});

console.log('swiper');




// ===================================================== single-product
// ===================================================== single-product
// ===================================================== single-product

function singleProductSwiper() {

    const swiperGallery = new Swiper('.product-gallery', {
        modules: [Thumbs],
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
    });

    const swiperThumbs = new Swiper('.product-thumbs', {
        modules: [Navigation, Thumbs],
        loop: true,
        spaceBetween: 0,
        direction: 'vertical',
        navigation: {
            nextEl: '.single-product__next',
        },
        thumbs: {
            swiper: swiperGallery,
        },
    });

};
window.addEventListener('DOMContentLoaded', singleProductSwiper);


function schematicProductSwiper() {
    const schematicGallerySwiper = new Swiper('.schematic-gallery', {
        loop: false,
        spaceBetween: 10,
        slidesPerView: 3,
        watchSlidesProgress: true,
        allowTouchMove: false,
    });

    const schematicThumbsSwiper = new Swiper('.schematic-thumbs', {
        modules: [Thumbs],
        loop: false,
        spaceBetween: 0,
        direction: 'horizontal',
        thumbs: {
            swiper: schematicGallerySwiper,
        },
    });
};
window.addEventListener('DOMContentLoaded', schematicProductSwiper);

// =======================================
const similarCard = new Swiper(".similar-slider", {
    modules: [Autoplay, Keyboard],
    slidesPerView: 6,
    spaceBetween: 20,
    loop: true,
    speed: 1000,
    mousewheel: false,
    keyboard: true,

    breakpoints: {
        320: { slidesPerView: 1.1, spaceBetween: 10 },
        450: { slidesPerView: 2, spaceBetween: 10 },
        620: { slidesPerView: 3, spaceBetween: 10 },
        767: { slidesPerView: 4, spaceBetween: 15 },
        1204: { slidesPerView: 6, spaceBetween: 20 }
    }

});