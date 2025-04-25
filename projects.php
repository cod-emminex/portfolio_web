<?php
/**
 * Projects Page
 * 
 * Lists all portfolio projects with filtering functionality
 * 
 * @author cod-emminex
 * @date 2025-04-06
 */

// Set current page
$currentPage = 'projects';

// Load configuration
require_once 'config/config.php';

// Get projects
$projects = $config['projects'];

// Extract unique categories for filter
$categories = [];
foreach($projects as $project) {
    if(isset($project['category']) && !empty($project['category']) && !in_array($project['category'], $categories)) {
        $categories[] = $project['category'];
    }
}

// Include header
include('components/header.php');
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1>My Projects</h1>
        <p class="page-subtitle">Showcasing my work and expertise</p>
    </div>
</section>

<!-- Projects Section -->
<section class="section section-projects">
    <div class="container">
        <!-- Filters -->
        <div class="project-filters" data-aos="fade-up">
            <div class="filter-title">Filter by:</div>
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">All Projects</button>
                <?php foreach($categories as $category): ?>
                <button class="filter-btn" data-filter="<?php echo htmlspecialchars(strtolower($category)); ?>">
                    <?php echo htmlspecialchars(ucfirst($category)); ?>
                </button>
                <?php endforeach; ?>
            </div>
        </div>
        
        <!-- Project Grid -->
        <div class="projects-grid">
            <?php 
            foreach ($projects as $index => $project): 
                $category = isset($project['category']) ? strtolower($project['category']) : 'other';
                $delay = ($index % 3) * 100;
            ?>
            <div class="project-item" data-category="<?php echo htmlspecialchars($category); ?>" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                <?php 
                require_once('components/project-card.php');
                renderProjectCard($project, false);
                ?>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- No Results Message -->
        <div class="no-results hidden">
            <div class="no-results-content">
                <i class="fas fa-search" aria-hidden="true"></i>
                <h3>No projects found</h3>
                <p>No projects match your selected filter. Please try another category.</p>
                <button class="btn btn-outline reset-filter">Show All Projects</button>
            </div>
        </div>
    </div>
</section>

<!-- Add extra script for filtering functionality -->
<?php
$extraScripts = '<script src="assets/js/project-filter.js"></script>';
?>

<?php
// Include footer
include('components/footer.php');
?>
