/**
 * Project Filtering Script
 * 
 * Handles filtering functionality for the projects page
 * 
 * @author cod-emminex
 * @date 2025-04-06
 */

(function () {
  'use strict';

  // DOM Elements
  const filterButtons = document.querySelectorAll('.filter-btn');
  const projectItems = document.querySelectorAll('.project-item');
  const noResultsMessage = document.querySelector('.no-results');
  const resetFilterButton = document.querySelector('.reset-filter');

  /**
   * Initialize the filtering functionality
   */
  function initFilters() {
    if (!filterButtons.length || !projectItems.length) return;

    // Add click event listeners to filter buttons
    filterButtons.forEach(button => {
      button.addEventListener('click', function () {
        // Remove active class from all buttons
        filterButtons.forEach(btn => btn.classList.remove('active'));

        // Add active class to clicked button
        this.classList.add('active');

        // Get filter value
        const filterValue = this.dataset.filter;

        // Filter projects
        filterProjects(filterValue);
      });
    });

    // Reset filter button
    if (resetFilterButton) {
      resetFilterButton.addEventListener('click', function () {
        // Find "All Projects" button and click it
        const allProjectsBtn = document.querySelector('.filter-btn[data-filter="all"]');
        if (allProjectsBtn) {
          allProjectsBtn.click();
        } else {
          filterProjects('all');
        }
      });
    }
  }

  /**
   * Filter projects based on category
   * @param {string} filterValue - The category to filter by
   */
  function filterProjects(filterValue) {
    let visibleCount = 0;

    // Loop through all project items
    projectItems.forEach(item => {
      const itemCategory = item.dataset.category;

      // If filter is "all" or matches item category, show item
      if (filterValue === 'all' || itemCategory === filterValue) {
        item.style.display = '';
        visibleCount++;

        // Reset animation to trigger it again
        const projectCard = item.querySelector('.project-card');
        if (projectCard) {
          projectCard.classList.remove('aos-animate');
          setTimeout(() => {
            projectCard.classList.add('aos-animate');
          }, 10);
        }
      } else {
        item.style.display = 'none';
      }
    });

    // Show or hide no results message
    if (visibleCount === 0) {
      if (noResultsMessage) {
        noResultsMessage.classList.remove('hidden');
      }
    } else {
      if (noResultsMessage) {
        noResultsMessage.classList.add('hidden');
      }
    }
  }

  /**
   * Initialize everything
   */
  function init() {
    initFilters();
  }

  // Run initialization when DOM is fully loaded
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
