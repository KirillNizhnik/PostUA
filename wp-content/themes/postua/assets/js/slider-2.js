let swiper = new Swiper('#container-news', {
    slidesPerView: 1,
    spaceBetween: 30,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
    },
    autoplay: {
        delay: 3000,
        disableOnInteraction: true,
    },
});


