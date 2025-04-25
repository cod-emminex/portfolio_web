<?php
/**
 * Project Detail Page
 * 
 * Displays detailed information about a single project
 * 
 * @author cod-emminex
 * @date 2025-04-06
 */

// Load configuration
require_once 'config/config.php';

// Get project ID from URL
$projectId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Find project data
$project = null;
foreach ($config['projects'] as $p) {
    if ($p['id'] === $projectId) {
        $project = $p;
        break;
    }
}

// Redirect to projects page if project not found
if (!$project) {
    header('Location: projects.php');
    exit;
}

// Set current page (still 'projects' to highlight the right nav item)
$currentPage = 'projects';

// Set page title
$pageTitle = $project['title'] . ' | ' . $config['site']['name'];

// Include header
include('components/header.php');
?>

<!-- Project Hero Section -->
<section class="project-hero">
    <div class="project-hero-bg" style="background-image: url('<?php echo htmlspecialchars($project['image']); ?>')"></div>
    <div class="container">
        <div class="project-hero-content">
            <div class="project-category">
                <?php echo htmlspecialchars(ucfirst($project['category'] ?? 'Project')); ?>
            </div>
            <h1><?php echo htmlspecialchars($project['title']); ?></h1>
            <div class="project-meta">
                <?php if (isset($project['completed'])): ?>
                <div class="meta-item">
                    <i class="far fa-calendar-alt" aria-hidden="true"></i>
                    <span>Completed: <?php echo date('F Y', strtotime($project['completed'])); ?></span>
                </div>
                <?php endif; ?>
                
                <div class="meta-item">
                    <i class="fas fa-code" aria-hidden="true"></i>
                    <span><?php echo count($project['technologies']); ?> Technologies Used</span>
                </div>
            </div>
            
            <div class="project-actions">
                <?php if (isset($project['demo'])): ?>
                <a href="<?php echo htmlspecialchars($project['demo']); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-large">
                    <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                    Live Demo
                </a>
                <?php endif; ?>
                
                <?php if (isset($project['github'])): ?>
                <a href="<?php echo htmlspecialchars($project['github']); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline btn-large">
                    <i class="fab fa-github" aria-hidden="true"></i>
                    View on GitHub
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Project Overview Section -->
<section class="section section-project-overview">
    <div class="container">
        <div class="project-overview-grid">
            <div class="project-content" data-aos="fade-up">
                <h2>Project Overview</h2>
                <div class="project-description">
                    <?php 
                    // Process long description with line breaks
                    $paragraphs = explode("\n\n", $project['long_description']);
                    foreach ($paragraphs as $paragraph) {
                        echo '<p>' . htmlspecialchars($paragraph) . '</p>';
                    }
                    ?>
                </div>
            </div>
            
            <div class="project-sidebar" data-aos="fade-left">
                <div class="sidebar-section">
                    <h3>Technologies Used</h3>
                    <div class="tech-tags">
                        <?php foreach ($project['technologies'] as $tech): ?>
                        <span class="tech-tag"><?php echo htmlspecialchars($tech); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <div class="sidebar-section">
                    <h3>Key Features</h3>
                    <ul class="feature-list">
                        <?php foreach ($project['features'] as $feature): ?>
                        <li><?php echo htmlspecialchars($feature); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Project Gallery Section -->
<?php if (isset($project['gallery']) && !empty($project['gallery'])): ?>
<section class="section section-project-gallery bg-light">
    <div class="container">
        <h2 class="gallery-title" data-aos="fade-up">Project Gallery</h2>
        
        <div class="gallery-grid">
            <?php foreach ($project['gallery'] as $index => $image): ?>
            <div class="gallery-item" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                <a href="<?php echo htmlspecialchars($image['image']); ?>" class="lightbox-trigger" data-caption="<?php echo htmlspecialchars($image['caption']); ?>">
                    <img src="<?php echo htmlspecialchars($image['image']); ?>" alt="<?php echo htmlspecialchars($image['caption']); ?>" loading="lazy">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus" aria-hidden="true"></i>
                    </div>
                </a>
                <div class="gallery-caption"><?php echo htmlspecialchars($image['caption']); ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Other Projects Section -->
<section class="section section-other-projects">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Other Projects</h2>
            <p>Explore more of my work</p>
        </div>
        
        <div class="other-projects-grid">
            <?php 
            $otherProjects = [];
            $count = 0;
            foreach ($config['projects'] as $p) {
                if ($p['id'] !== $project['id']) {
                    $otherProjects[] = $p;
                    $count++;
                }
                
                if ($count >= 3) break;
            }
            
            foreach ($otherProjects as $index => $otherProject): 
                $delay = $index * 100;
            ?>
            <div data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                <?php 
                require_once('components/project-card.php');
                renderProjectCard($otherProject);
                ?>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="section-footer" data-aos="fade-up">
            <a href="projects.php" class="btn btn-primary">View All Projects</a>
        </div>
    </div>
</section>

<!-- Add extra script for lightbox functionality -->
<?php
$extraScripts = '<script src="assets/js/lightbox.js"></script>';
?>

<?php
// Include footer
include('components/footer.php');
?>
