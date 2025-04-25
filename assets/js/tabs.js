/**
 * Tab Functionality Script
 * 
 * Implements tab switching for tab-based content sections
 * 
 * @author cod-emminex
 * @date 2025-04-06
 */

(function () {
  'use strict';

  // DOM Elements
  const tabButtons = document.querySelectorAll('.tab-btn');
  const tabContents = document.querySelectorAll('.tab-content');

  /**
   * Initialize tab functionality
   */
  function initTabs() {
    if (!tabButtons.length || !tabContents.length) return;

    // Add click event listeners to tab buttons
    tabButtons.forEach(button => {
      button.addEventListener('click', switchTab);
    });
  }

  /**
   * Switch active tab
   * @param {Event} e - Click event
   */
  function switchTab(e) {
    e.preventDefault();

    // Get the tab target
    const tabId = this.dataset.tab;

    // Remove active class from all buttons and contents
    tabButtons.forEach(btn => btn.classList.remove('active'));
    tabContents.forEach(content => content.classList.remove('active'));

    // Add active class to clicked button and corresponding content
    this.classList.add('active');
    document.getElementById(tabId).classList.add('active');

    // Add tab ID to URL hash for bookmarking
    history.replaceState(null, null, `#${tabId}`);
  }

  /**
   * Check URL hash for tab on page load
   */
  function checkUrlHash() {
    const hash = window.location.hash.substring(1);

    if (hash && document.getElementById(hash)) {
      const tabBtn = document.querySelector(`.tab-btn[data-tab="${hash}"]`);

      if (tabBtn) {
        tabBtn.click();
      }
    }
  }

  /**
   * Initialize everything
   */
  function init() {
    initTabs();
    checkUrlHash();
  }

  // Run initialization when DOM is fully loaded
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
