const swiper2 = new Swiper('.collection-points-slider', {
    slidesPerView: 'auto',
    spaceBetween: 30,
    navigation: {
        nextEl: '.custom-button-next',
        prevEl: '.custom-button-prev',
    },
    breakpoints: {
        320: {
            slidesPerView: 'auto',
            spaceBetween: 30,
        },
        768: {
            slidesPerView: 2.3,
        },
        1240: {
            slidesPerView: 3.5,
        },
    }
});