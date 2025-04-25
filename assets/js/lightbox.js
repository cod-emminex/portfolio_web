/**
 * Lightbox Script
 * 
 * Implements lightbox functionality for image galleries
 * 
 * @author cod-emminex
 * @date 2025-04-06
 */

(function () {
  'use strict';

  // DOM Elements
  const lightboxTriggers = document.querySelectorAll('.lightbox-trigger');

  /**
   * Initialize lightbox functionality
   */
  function initLightbox() {
    if (!lightboxTriggers.length) return;

    // Add click event listeners to lightbox triggers
    lightboxTriggers.forEach(trigger => {
      trigger.addEventListener('click', openLightbox);
    });
  }

  /**
   * Opens the lightbox
   * @param {Event} e - Click event
   */
  function openLightbox(e) {
    e.preventDefault();

    const imageSrc = this.href || this.dataset.src;
    const caption = this.dataset.caption || '';

    // Create lightbox element
    const lightbox = document.createElement('div');
    lightbox.className = 'lightbox';
    lightbox.setAttribute('role', 'dialog');
    lightbox.setAttribute('aria-modal', 'true');

    // Create lightbox content
    const content = `
            <div class="lightbox-container">
                <button class="lightbox-close" aria-label="Close">&times;</button>
                <img src="${imageSrc}" alt="${caption}" class="lightbox-image">
                ${caption ? `<div class="lightbox-caption">${caption}</div>` : ''}
                <div class="lightbox-controls">
                    <button class="lightbox-prev" aria-label="Previous image">&lsaquo;</button>
                    <button class="lightbox-next" aria-label="Next image">&rsaquo;</button>
                </div>
            </div>
        `;

    lightbox.innerHTML = content;
    document.body.appendChild(lightbox);

    // Prevent body scrolling
    document.body.style.overflow = 'hidden';

    // Add lightbox to DOM
    setTimeout(() => {
      lightbox.classList.add('active');
    }, 10);

    // Setup close button
    const closeButton = lightbox.querySelector('.lightbox-close');
    closeButton.addEventListener('click', () => closeLightbox(lightbox));

    // Setup navigation buttons
    const prevButton = lightbox.querySelector('.lightbox-prev');
    const nextButton = lightbox.querySelector('.lightbox-next');

    if (prevButton && nextButton) {
      setupNavigation(prevButton, nextButton, this);
    }

    // Close on background click
    lightbox.addEventListener('click', function (e) {
      if (e.target === lightbox) {
        closeLightbox(lightbox);
      }
    });

    // Close on ESC key
    document.addEventListener('keydown', function escHandler(e) {
      if (e.key === 'Escape') {
        closeLightbox(lightbox);
        document.removeEventListener('keydown', escHandler);
      }
    });
  }

  /**
   * Sets up previous and next buttons
   * @param {HTMLElement} prevButton - Previous button
   * @param {HTMLElement} nextButton - Next button
   * @param {HTMLElement} currentTrigger - Current trigger element
   */
  function setupNavigation(prevButton, nextButton, currentTrigger) {
    // Get all triggers in the same gallery
    const allTriggers = Array.from(lightboxTriggers);
    const currentIndex = allTriggers.indexOf(currentTrigger);

    // Check if there are previous/next images
    const hasPrev = currentIndex > 0;
    const hasNext = currentIndex < allTriggers.length - 1;

    // Handle visibility
    if (!hasPrev) {
      prevButton.style.display = 'none';
    }

    if (!hasNext) {
      nextButton.style.display = 'none';
    }

    // Add click handlers
    prevButton.addEventListener('click', () => {
      if (hasPrev) {
        closeLightbox(document.querySelector('.lightbox'));
        allTriggers[currentIndex - 1].click();
      }
    });

    nextButton.addEventListener('click', () => {
      if (hasNext) {
        closeLightbox(document.querySelector('.lightbox'));
        allTriggers[currentIndex + 1].click();
      }
    });

    // Keyboard navigation
    document.addEventListener('keydown', function navHandler(e) {
      if (e.key === 'ArrowLeft' && hasPrev) {
        closeLightbox(document.querySelector('.lightbox'));
        allTriggers[currentIndex - 1].click();
        document.removeEventListener('keydown', navHandler);
      }
      else if (e.key === 'ArrowRight' && hasNext) {
        closeLightbox(document.querySelector('.lightbox'));
        allTriggers[currentIndex + 1].click();
        document.removeEventListener('keydown', navHandler);
      }
    });
  }

  /**
   * Closes the lightbox
   * @param {HTMLElement} lightbox - The lightbox element
   */
  function closeLightbox(lightbox) {
    lightbox.classList.remove('active');

    // Remove lightbox after animation
    setTimeout(() => {
      document.body.removeChild(lightbox);
      document.body.style.overflow = '';
    }, 300);
  }

  /**
   * Initialize everything
   */
  function init() {
    initLightbox();
  }

  // Run initialization when DOM is fully loaded
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
