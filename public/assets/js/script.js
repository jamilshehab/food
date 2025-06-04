AOS.init({
    duration: 1200,
});
const swiper = new Swiper(".swiper-container", {
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    speed: 1000,
});
