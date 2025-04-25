/**
 * FAQ Accordion Script
 * 
 * Implements accordion functionality for the FAQ section
 * 
 * @author cod-emminex
 * @date 2025-04-06
 */

(function () {
  'use strict';

  // DOM Elements
  const faqItems = document.querySelectorAll('.faq-item');

  /**
   * Initialize FAQ accordion functionality
   */
  function initFAQ() {
    if (!faqItems.length) return;

    // Add click event listeners to FAQ questions
    faqItems.forEach(item => {
      const question = item.querySelector('.faq-question');

      if (question) {
        question.addEventListener('click', toggleFAQ);
      }
    });
  }

  /**
   * Toggle FAQ open/closed state
   * @param {Event} e - Click event
   */
  function toggleFAQ() {
    const faqItem = this.closest('.faq-item');
    const isActive = faqItem.classList.contains('active');

    // Close all FAQs first
    faqItems.forEach(item => {
      item.classList.remove('active');
      const icon = item.querySelector('.faq-icon i');
      if (icon) {
        icon.className = 'fas fa-plus';
      }
    });

    // If the clicked item wasn't active, open it
    if (!isActive) {
      faqItem.classList.add('active');
      const icon = faqItem.querySelector('.faq-icon i');
      if (icon) {
        icon.className = 'fas fa-minus';
      }
    }
  }

  /**
   * Initialize everything
   */
  function init() {
    initFAQ();
  }

  // Run initialization when DOM is fully loaded
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
