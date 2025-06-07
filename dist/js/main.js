// Import individual modules
import setupNavbar from './modules/navbar.js';
import initSwipers from './modules/swiper-initializer.js';
import setupProductTabs from './modules/product-tabs.js';

// Ensure the DOM is fully loaded before running scripts
document.addEventListener('DOMContentLoaded', () => {
  console.log('DOM Content Loaded. Initializing theme scripts.');
  setupNavbar();
  initSwipers();
  setupProductTabs();
});
