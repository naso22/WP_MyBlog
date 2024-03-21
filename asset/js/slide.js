const swiper = new Swiper(".swiper", {
    loop: true,
    speed: 800,
    slidesPerView: 1.2,
    spaceBetween: 20,
    centeredSlides: true,
    pagination: {
        el: '.swiper-pagination',
    },
    breakpoints: {
        1000: {
            spaceBetween: 70,
            slidesPerView: 2.5,
        },
        700:{
            spaceBetween: 30,
            slidesPerView: 2,
        }
      }
});