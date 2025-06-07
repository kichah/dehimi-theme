/**
 * Handles the navigation toggle functionality and ARIA attributes.
 */
function setupNavbar() {
  const primaryNav = document.querySelector('#primary-navigation');
  const navToggle = document.querySelector('.icons'); // Assuming this is your toggle button
  const closeIcon = document.querySelector('.nav-close'); // Icon for closing
  const menuIcon = document.querySelector('.nav-open'); // Icon for opening

  // Exit if essential elements are not found
  if (!primaryNav || !navToggle || !closeIcon || !menuIcon) {
    // console.warn('Navbar elements not found. Navbar script not initialized.');
    return;
  }

  navToggle.addEventListener('click', () => {
    primaryNav.classList.toggle('hide');
    closeIcon.classList.toggle('hidden');
    menuIcon.classList.toggle('hidden');

    // Corrected ARIA logic:
    if (primaryNav.classList.contains('hide')) {
      navToggle.setAttribute('aria-expanded', 'false'); // Toggle button indicates nav is NOT expanded
      primaryNav.setAttribute('aria-hidden', 'true'); // Nav content is hidden
    } else {
      navToggle.setAttribute('aria-expanded', 'true'); // Toggle button indicates nav IS expanded
      primaryNav.setAttribute('aria-hidden', 'false'); // Nav content is visible
    }
  });

  /**
   * Updates the aria-hidden attribute on primaryNav based on screen size.
   * Assumes primaryNav is hidden on mobile by default (e.g., via CSS).
   */
  function updateAriaHiddenOnResize() {
    // Check if the current screen size is mobile (less than or equal to 768px)
    const isMobile = window.matchMedia('(max-width: 768px)').matches;

    // Set aria-hidden to 'true' if it's a mobile screen (nav is assumed hidden by CSS)
    // Set aria-hidden to 'false' if it's not a mobile screen (nav is assumed visible by CSS)
    primaryNav.setAttribute('aria-hidden', isMobile.toString()); // Ensure attribute is 'true' or 'false' string

    // On resize, ensure the toggle button's state reflects the menu's actual visibility
    // If on desktop (not mobile), menu is visible, so aria-expanded should be true
    if (!isMobile) {
      navToggle.setAttribute('aria-expanded', 'true');
      primaryNav.classList.remove('hide'); // Ensure nav is visible on desktop
      closeIcon.classList.add('hidden'); // Hide close icon
      menuIcon.classList.remove('hidden'); // Show menu icon
    } else {
      // On mobile, if nav is currently expanded, keep it. Otherwise, hide it visually.
      // This ensures smooth transition if user resizes while nav is open.
      if (navToggle.getAttribute('aria-expanded') === 'true') {
        // Nav is open, ensure classes match
        primaryNav.classList.remove('hide');
        closeIcon.classList.remove('hidden');
        menuIcon.classList.add('hidden');
      } else {
        // Nav is closed or default state
        primaryNav.classList.add('hide');
        closeIcon.classList.add('hidden');
        menuIcon.classList.remove('hidden');
      }
    }
  }

  // Initial call to set ARIA attributes correctly on page load
  updateAriaHiddenOnResize();
  // Listen for window resize events to update ARIA attributes
  window.addEventListener('resize', updateAriaHiddenOnResize);
}

export default setupNavbar;
