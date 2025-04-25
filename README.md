/**
 * Main JavaScript for Portfolio Website
 * 
 * This file handles all the interactive features and animations for the portfolio website.
 * 
 * @author cod-emminex
 * @date 2025-04-06
 */

(function() {
    'use strict';

    // DOM Elements
    const dom = {};

    /**
     * Initialize DOM elements
     */
    function initializeDom() {
        dom.header = document.getElementById('header');
        dom.menuToggle = document.querySelector('.menu-toggle');
        dom.mainNav = document.getElementById('main-nav');
        dom.skillBars = document.querySelectorAll('.skill-progress');
        dom.statNumbers = document.querySelectorAll('.stat-number');
        dom.backToTop = document.getElementById('back-to-top');
        dom.formControls = document.querySelectorAll('.form-control');
        dom.galleryItems = document.querySelectorAll('.gallery-item');
        dom.contactForm = document.getElementById('contactForm');
    }

    /**
     * Initialize AOS (Animate On Scroll) library
     */
    function initializeAos() {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
    }

    /**
     * Handle mobile menu toggle
     */
    function setupMobileMenu() {
        if (!dom.menuToggle || !dom.mainNav) return;

        dom.menuToggle.addEventListener('click', function() {
            this.classList.toggle('active');
            dom.mainNav.classList.toggle('active');
            
            // Toggle aria-expanded attribute for accessibility
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            
            // Prevent body scrolling when menu is open
            document.body.classList.toggle('menu-open');
        });
        
        // Close menu when clicking on a link
        const navLinks = dom.mainNav.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                dom.menuToggle.classList.remove('active');
                dom.mainNav.classList.remove('active');
                dom.menuToggle.setAttribute('aria-expanded', 'false');
                document.body.classList.remove('menu-open');
            });
        });
    }

    /**
     * Handle header scroll effect
     */
    function setupHeaderScroll() {
        if (!dom.header) return;

        const headerScrollEffect = () => {
            if (window.scrollY > 50) {
                dom.header.classList.add('scrolled');
            } else {
                dom.header.classList.remove('scrolled');
            }
        };

        // Initial check
        headerScrollEffect();
        
        // Add scroll event listener with debounce
        window.addEventListener('scroll', debounce(headerScrollEffect, 10));
    }

    /**
     * Handle skill bar animation
     */
    function animateSkillBars() {
        if (!dom.skillBars.length) return;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const progressBar = entry.target;
                    const value = progressBar.getAttribute('data-progress') || 0;
                    progressBar.style.width = value + '%';
                    observer.unobserve(progressBar);
                }
            });
        }, { threshold: 0.2 });

        dom.skillBars.forEach(bar => observer.observe(bar));
    }

    /**
     * Animate stat counters
     */
    function animateStatCounters() {
        if (!dom.statNumbers.length) return;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-count') || '0');
                    const duration = 2000;
                    const start = 0;
                    const startTime = performance.now();

                    const updateCounter = (currentTime) => {
                        const elapsed = currentTime - startTime;
                        const progress = Math.min(elapsed / duration, 1);
                        
                        // Use easeOutQuad easing function for smooth animation
                        const easedProgress = 1 - (1 - progress) * (1 - progress);
                        const currentValue = Math.floor(start + easedProgress * (target - start));
                        
                        counter.textContent = currentValue;

                        if (progress < 1) {
                            requestAnimationFrame(updateCounter);
                        } else {
                            counter.textContent = target;
                        }
                    };

                    requestAnimationFrame(updateCounter);
                    observer.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });

        dom.statNumbers.forEach(counter => observer.observe(counter));
    }

    /**
     * Handle back to top button
     */
    function setupBackToTop() {
        if (!dom.backToTop) return;

        const scrollThreshold = 300;

        const backToTopVisibility = () => {
            if (window.scrollY > scrollThreshold) {
                dom.backToTop.classList.add('visible');
            } else {
                dom.backToTop.classList.remove('visible');
            }
        };

        // Initial check
        backToTopVisibility();
        
        // Add scroll event listener with debounce
        window.addEventListener('scroll', debounce(backToTopVisibility, 100));
        
        // Add click event to scroll back to top
        dom.backToTop.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    /**
     * Form interactions and validation
     */
    function setupFormInteractions() {
        if (!dom.formControls.length) return;

        // Add focus and blur event listeners to form controls
        dom.formControls.forEach(control => {
            // Add active class to parent when focused
            control.addEventListener('focus', function() {
                this.parentNode.classList.add('focused');
            });
            
            // Remove active class from parent when blurred
            control.addEventListener('blur', function() {
                this.parentNode.classList.remove('focused');
                
                // Add filled class if input has value
                if (this.value.trim() !== '') {
                    this.parentNode.classList.add('filled');
                } else {
                    this.parentNode.classList.remove('filled');
                }
            });
            
            // Check for initial value
            if (control.value.trim() !== '') {
                control.parentNode.classList.add('filled');
            }
        });

        // Client-side form validation
        if (dom.contactForm) {
            dom.contactForm.addEventListener('submit', function(e) {
                let isValid = true;
                
                // Check required fields
                const requiredFields = this.querySelectorAll('[required]');
                requiredFields.forEach(field => {
                    // Remove previous error
                    const existingError = field.parentNode.querySelector('.form-error');
                    if (existingError) {
                        existingError.remove();
                    }
                    field.classList.remove('error');
                    
                    if (!field.value.trim()) {
                        isValid = false;
                        field.classList.add('error');
                        
                        // Add error message
                        const errorEl = document.createElement('div');
                        errorEl.className = 'form-error';
                        errorEl.textContent = 'This field is required';
                        field.parentNode.appendChild(errorEl);
                    } else if (field.type === 'email' && !isValidEmail(field.value)) {
                        isValid = false;
                        field.classList.add('error');
                        
                        // Add error message
                        const errorEl = document.createElement('div');
                        errorEl.className = 'form-error';
                        errorEl.textContent = 'Please enter a valid email address';
                        field.parentNode.appendChild(errorEl);
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                }
            });
        }
    }

    /**
     * Set up image gallery lightbox
     */
    function setupGallery() {
        if (!dom.galleryItems.length) return;

        dom.galleryItems.forEach(item => {
            item.addEventListener('click', function() {
                const imageSrc = this.querySelector('img').getAttribute('src');
                const caption = this.querySelector('.gallery-caption')?.textContent || '';
                
                showLightbox(imageSrc, caption);
            });
        });

        function showLightbox(src, caption) {
            // Create lightbox elements
            const lightbox = document.createElement('div');
            lightbox.className = 'lightbox';
            
            const lightboxContent = document.createElement('div');
            lightboxContent.className = 'lightbox-content';
            
            const img = document.createElement('img');
            img.src = src;
            img.className = 'lightbox-image';
            img.alt = caption;
            
            const captionEl = document.createElement('div');
            captionEl.className = 'lightbox-caption';
            captionEl.textContent = caption;
            
            const closeBtn = document.createElement('button');
            closeBtn.className = 'lightbox-close';
            closeBtn.innerHTML = '&times;';
            closeBtn.setAttribute('aria-label', 'Close');
            
            // Assemble lightbox
            lightboxContent.appendChild(img);
            lightboxContent.appendChild(captionEl);
            lightboxContent.appendChild(closeBtn);
            lightbox.appendChild(lightboxContent);
            document.body.appendChild(lightbox);
            
            // Prevent scrolling while lightbox is open
            document.body.style.overflow = 'hidden';
            
            // Add event listeners
            closeBtn.addEventListener('click', closeLightbox);
            lightbox.addEventListener('click', function(e) {
                if (e.target === lightbox) {
                    closeLightbox();
                }
            });
            
            // Close on escape key
            document.addEventListener('keydown', function escKeyHandler(e) {
                if (e.key === 'Escape') {
                    closeLightbox();
                    document.removeEventListener('keydown', escKeyHandler);
                }
            });
            
            function closeLightbox() {
                lightbox.remove();
                document.body.style.overflow = '';
            }
        }
    }

    /**
     * Helper: Debounce function to limit function calls
     */
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    /**
     * Helper: Validate email format
     */
    function isValidEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    /**
     * Initialize everything when DOM is ready
     */
    function init() {
        initializeDom();
        initializeAos();
        setupMobileMenu();
        setupHeaderScroll();
        animateSkillBars();
        animateStatCounters();
        setupBackToTop();
        setupFormInteractions();
        setupGallery();
        
        // Add resize handler
        window.addEventListener('resize', debounce(function() {
            AOS.refresh();
        }, 200));
    }

    // Initialize when DOM content is loaded
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
