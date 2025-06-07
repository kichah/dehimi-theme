/**
 * Handles the tab switching functionality on the product page.
 */
function setupProductTabs() {
  const productPage = document.querySelector('#product-page');

  if (!productPage) {
    return; // Exit if product page element is not present
  }

  const opt1 = productPage.querySelector('.option-1'); // E.g., Details tab button
  const theDescription = productPage.querySelector('.the-description'); // Content for details
  const productTestimonial = productPage.querySelector('.product-testimonial'); // Content for testimonials
  const opt2 = productPage.querySelector('.option-2'); // E.g., Testimonials tab button

  // Exit if any critical tab elements are missing within the product page
  if (!opt1 || !theDescription || !productTestimonial || !opt2) {
    // console.warn('Product page tab elements not found. Tab script not initialized.');
    return;
  }

  opt1.addEventListener('click', (e) => {
    if (e.target.tagName === 'A') {
      // Prevent default only if it's an anchor tag
      e.preventDefault();
    }
    opt1.classList.add('active');
    opt2.classList.remove('active');
    theDescription.classList.remove('option'); // Assuming 'option' hides content
    productTestimonial.classList.add('option');
  });

  opt2.addEventListener('click', (e) => {
    if (e.target.tagName === 'A') {
      // Prevent default only if it's an anchor tag
      e.preventDefault();
    }
    opt2.classList.add('active');
    opt1.classList.remove('active');
    theDescription.classList.add('option');
    productTestimonial.classList.remove('option');
  });
}

export default setupProductTabs;
