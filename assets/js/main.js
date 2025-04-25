/**
 * Main JavaScript for Portfolio Website
 * 
 * Contains all interactive functionality for the portfolio
 * 
 * @author cod-emminex
 * @date 2025-04-06
 */

(function () {
  'use strict';

  // DOM Elements
  const header = document.getElementById('header');
  const menuToggle = document.querySelector('.menu-toggle');
  const mainNav = document.getElementById('main-nav');
  const backToTop = document.getElementById('back-to-top');
  const skillBars = document.querySelectorAll('.skill-progress');
  const statNumbers = document.querySelectorAll('.stat-number');
  const contactForm = document.getElementById('contactForm');

  /**
   * Initialize AOS animations
   */
  function initAOS() {
    AOS.init({
      duration: 800,
      easing: 'ease-in-out',
      once: true,
      offset: 100,
    });
  }

  /**
   * Handle scroll effects
   */
  function handleScroll() {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    // Header shadow on scroll
    if (scrollTop > 50) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }

    // Back to top button visibility
    if (scrollTop > 300) {
      backToTop.classList.add('visible');
    } else {
      backToTop.classList.remove('visible');
    }

    // Animate skill bars when in viewport
    skillBars.forEach(bar => {
      if (isElementInViewport(bar) && !bar.classList.contains('animated')) {
        const progress = bar.getAttribute('data-progress');
        setTimeout(() => {
          bar.style.width = `${progress}%`;
          bar.classList.add('animated');
        }, 200);
      }
    });

    // Animate stat counters
    statNumbers.forEach(stat => {
      if (isElementInViewport(stat) && !stat.classList.contains('animated')) {
        animateCounter(stat);
        stat.classList.add('animated');
      }
    });
  }

  /**
   * Check if element is in viewport
   * @param {HTMLElement} el - The element to check
   * @return {Boolean} - True if element is in viewport
   */
  function isElementInViewport(el) {
    const rect = el.getBoundingClientRect();
    return (
      rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.bottom >= 0 &&
      rect.left <= (window.innerWidth || document.documentElement.clientWidth) &&
      rect.right >= 0
    );
  }

  /**
   * Animate number counter
   * @param {HTMLElement} element - The element containing the number
   */
  function animateCounter(element) {
    const target = parseInt(element.getAttribute('data-count'));
    const duration = 1500;
    const start = 0;
    const increment = target / (duration / 16); // 60fps

    let current = start;
    const instance = setInterval(() => {
      current += increment;
      element.textContent = Math.floor(current);

      if (current >= target) {
        element.textContent = target;
        clearInterval(instance);
      }
    }, 16);
  }

  /**
   * Setup mobile navigation
   */
  function setupMobileNav() {
    if (!menuToggle || !mainNav) return;

    menuToggle.addEventListener('click', () => {
      mainNav.classList.toggle('active');
      menuToggle.classList.toggle('active');
      menuToggle.setAttribute('aria-expanded', mainNav.classList.contains('active'));
    });

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
      if (mainNav.classList.contains('active') &&
        !mainNav.contains(e.target) &&
        !menuToggle.contains(e.target)) {
        mainNav.classList.remove('active');
        menuToggle.classList.remove('active');
        menuToggle.setAttribute('aria-expanded', 'false');
      }
    });

    // Close menu when escape key is pressed
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && mainNav.classList.contains('active')) {
        mainNav.classList.remove('active');
        menuToggle.classList.remove('active');
        menuToggle.setAttribute('aria-expanded', 'false');
      }
    });
  }

  /**
   * Setup back to top button
   */
  function setupBackToTop() {
    if (!backToTop) return;

    backToTop.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  }

  /**
   * Setup smooth scroll for anchor links
   */
  function setupSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');

        if (href !== '#') {
          e.preventDefault();
          const targetElement = document.querySelector(href);

          if (targetElement) {
            targetElement.scrollIntoView({
              behavior: 'smooth'
            });

            // Update URL but don't scroll again
            history.pushState(null, null, href);
          }
        }
      });
    });
  }

  /**
   * Setup form validation
   */
  function setupFormValidation() {
    if (!contactForm) return;

    contactForm.addEventListener('submit', function (e) {
      const formFields = contactForm.querySelectorAll('input, textarea');
      let isValid = true;

      formFields.forEach(field => {
        // Remove any existing error messages
        const existingError = field.nextElementSibling;
        if (existingError && existingError.classList.contains('error-message')) {
          existingError.remove();
        }

        if (field.hasAttribute('required') && !field.value.trim()) {
          isValid = false;
          field.classList.add('error');

          // Add error message
          const errorMessage = document.createElement('div');
          errorMessage.classList.add('error-message');
          errorMessage.textContent = 'This field is required';
          field.parentNode.insertBefore(errorMessage, field.nextSibling);
        } else if (field.type === 'email' && field.value.trim()) {
          const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          if (!emailRegex.test(field.value.trim())) {
            isValid = false;
            field.classList.add('error');

            // Add error message
            const errorMessage = document.createElement('div');
            errorMessage.classList.add('error-message');
            errorMessage.textContent = 'Please enter a valid email address';
            field.parentNode.insertBefore(errorMessage, field.nextSibling);
          }
        }

        // Clear error on input
        field.addEventListener('input', function () {
          this.classList.remove('error');
          const errorMsg = this.nextElementSibling;
          if (errorMsg && errorMsg.classList.contains('error-message')) {
            errorMsg.remove();
          }
        });
      });

      if (!isValid) {
        e.preventDefault();
      }
    });
  }

  /**
   * Initialize everything
   */
  function init() {
    // Initialize animations
    initAOS();

    // Setup event handlers
    setupMobileNav();
    setupBackToTop();
    setupSmoothScroll();
    setupFormValidation();

    // Handle initial scroll position
    handleScroll();

    // Add scroll event listener
    window.addEventListener('scroll', handleScroll);

    // Handle resize event
    window.addEventListener('resize', handleScroll);
  }

  // Run initialization when DOM is fully loaded
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
