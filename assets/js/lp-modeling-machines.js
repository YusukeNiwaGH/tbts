// スライド
const mySwiper = new Swiper('.swiper', {
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    loopAdditionalSlides: 1,
    speed: 800,
    grabCursor: true,
    watchSlidesProgress: true,
    pagination: {
    el: '.swiper-pagination',
    clickable: true,
    },
    navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
    },
    breakpoints: {
    769: {
        slidesPerView: 3,
        spaceBetween: 20,
    }
    },
});

// 画面内に入ったら表示
const show_targets = document.querySelectorAll('.show-target');
const className = 'show-anime';

const imageObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add(className);
        imageObserver.unobserve(entry.target);
      }
    });
});

show_targets.forEach((show_target) => {
    imageObserver.observe(show_target);
});