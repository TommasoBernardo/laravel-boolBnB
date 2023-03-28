var swiper = new Swiper(".mySwiper", {
    loop: true,
    spaceBetween: 5,
    slidesPerView: 5,
    freeMode: true,
    watchSlidesProgress: true,

});
var swiper2 = new Swiper(".mySwiper2", {
    loop: true,
    spaceBetween: 10,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiper,
    },

    keyboard: {
        enabled: true,
        onlyInViewport: false,
    },

    effect: 'fade',
    fadeEffect: {
        crossFade: true
    },
});
