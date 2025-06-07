// public/js/modules/swiper-initializer.js

// --- CHANGE THESE TWO LINES ---
// Import the main Swiper class (default export from 'swiper')
import Swiper from 'swiper';
// Import specific modules (named exports from 'swiper/modules')
import { Navigation, Pagination } from 'swiper/modules';
// --- END CHANGE ---

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

// Register Swiper modules globally once
Swiper.use([Navigation, Pagination]);

/**
 * Initializes Swiper instances on different pages/sections.
 */
function initSwipers() {
  const homePage = document.querySelector('#home-page');
  const productPage = document.querySelector('#product-page');

  // Swiper for Home Page Product Slider
  if (homePage) {
    new Swiper('.product-slider', {
      slidesPerView: 2,
      spaceBetween: 8,
      loop: true,
      breakpoints: {
        320: { slidesPerView: 2, spaceBetween: 8 },
        480: { slidesPerView: 3, spaceBetween: 12 },
        800: { slidesPerView: 4, spaceBetween: 16 },
        1040: { slidesPerView: 4, spaceBetween: 20 },
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
    console.log('Home page product slider initialized.');
  }

  // Swiper for Product Page Image Slider
  if (productPage) {
    new Swiper('.image-swiper', {
      slidesPerView: 1,
      spaceBetween: 8,
      loop: true,
      navigation: {
        nextEl: '.next-img',
        prevEl: '.prev-img',
      },
      breakpoints: {
        601: { slidesPerView: 2, spaceBetween: 20 },
        801: { slidesPerView: 4, spaceBetween: 20 },
      },
    });
    console.log('Product page image slider initialized.');
  }

  // Swiper for Testimonials (can be on home or product page)
  if (homePage || productPage) {
    new Swiper('.testimonial', {
      slidesPerView: 1,
      spaceBetween: 8,
      breakpoints: {
        800: { slidesPerView: 2, spaceBetween: 16 },
        1040: { slidesPerView: 2, spaceBetween: 20 },
      },
    });
    console.log('Testimonials slider initialized.');
  }
}

export default initSwipers;
