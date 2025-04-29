import Swiper from '../public/swiper/swiper-bundle.min.mjs';
console.log('swiper');
// nav bar
const primaryNav = document.querySelector('#primary-navigation');
const navToggle = document.querySelector('.icons');
const close = document.querySelector('.fa-x');
const menu = document.querySelector('.fa-bars');
navToggle.addEventListener('click', () => {
  primaryNav.classList.toggle('hide');
  close.classList.toggle('hidden');
  menu.classList.toggle('hidden');

  if (menu.classList.contains('hidden')) {
    navToggle.setAttribute('aria-expanded', 'true');
    primaryNav.setAttribute('aria-hidden', 'false');
  } else {
    navToggle.setAttribute('aria-expanded', 'false');
    primaryNav.setAttribute('aria-hidden', 'true');
  }
});
function updateAriaHidden() {
  const isMobile = window.matchMedia('(max-width: 768px)').matches;

  primaryNav.setAttribute('aria-hidden', isMobile);
}
updateAriaHidden();
window.addEventListener('resize', updateAriaHidden);
// product page
const productPage = document.querySelector('#product-page');
if (productPage) {
  const opt1 = document.querySelector('.option-1');
  const theDescription = document.querySelector('.the-description');
  const productTestimonial = document.querySelector('.product-testimonial');
  const opt2 = document.querySelector('.option-2');
  opt1.addEventListener('click', (e) => {
    opt1.classList.add('active');
    opt2.classList.remove('active');
    theDescription.classList.remove('option');
    productTestimonial.classList.add('option');
  });
  opt2.addEventListener('click', (e) => {
    opt2.classList.add('active');
    opt1.classList.remove('active');
    theDescription.classList.add('option');
    productTestimonial.classList.remove('option');
  });
}
//swiper
const mainPage = document.querySelector('.main-page');
if (mainPage) {
  const swiperProducts = new Swiper('.product-slider', {
    slidesPerView: 2,
    spaceBetween: 8,
    loop: true,
    breakpoints: {
      // Responsive breakpoints
      320: {
        // when window width is >= 320px
        slidesPerView: 2,
        spaceBetween: 8,
      },
      480: {
        slidesPerView: 3,
        spaceBetween: 12,
      },
      800: {
        // when window width is >= 320px
        slidesPerView: 4,
        spaceBetween: 16,
      },
      1040: {
        // when window width is >= 768px
        slidesPerView: 5,
        spaceBetween: 20,
      },
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
}
if (productPage) {
  console.log('product page');
  const swiperProductPage = new Swiper('.image-swiper', {
    slidesPerView: 1,
    spaceBetween: 8,
    loop: true,
    navigation: {
      nextEl: '.next-img',
      prevEl: '.prev-img',
    },
    breakpoints: {
      // Responsive breakpoints
      720: {
        // when window width is >= 768px
        slidesPerView: 4,
        spaceBetween: 8,
      },
      1040: {
        // when window width is >= 768px
        slidesPerView: 4,
        spaceBetween: 20,
      },
    },
  });
}
if (mainPage || productPage) {
  const swiperTestimonials = new Swiper('.testimonial', {
    slidesPerView: 1,
    spaceBetween: 8, // Add space between slides
    breakpoints: {
      // Responsive breakpoints
      800: {
        // when window width is >= 320px
        slidesPerView: 2,
        spaceBetween: 16,
      },
      1040: {
        // when window width is >= 768px
        slidesPerView: 2,
        spaceBetween: 20,
      },
    },
  });
}
