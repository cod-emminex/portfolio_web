<?php
/**
 * Project Card Component
 * 
 * Reusable component to display project cards
 * 
 * @param array $project The project data
 * @param bool $featured Whether this is a featured project
 * @author cod-emminex
 * @date 2025-04-06
 */

function renderProjectCard($project, $featured = false) {
    $cardClass = $featured ? 'project-card featured' : 'project-card';
?>
    <article class="<?php echo $cardClass; ?>" data-aos="fade-up">
        <div class="project-image">
            <img 
                src="<?php echo htmlspecialchars($project['image']); ?>" 
                alt="<?php echo htmlspecialchars($project['title']); ?>"
                loading="lazy"
                width="500"
                height="50"
            >
            <div class="project-overlay"></div>
        </div>
        
        <div class="project-details">
            <h3 class="project-title">
                <?php echo htmlspecialchars($project['title']); ?>
            </h3>
            
            <div class="project-meta">
                <?php if (isset($project['completed'])): ?>
                <span class="project-date">
                    <i class="far fa-calendar-alt" aria-hidden="true"></i>
                    <?php echo date('M Y', strtotime($project['completed'])); ?>
                </span>
                <?php endif; ?>
                
                <?php if (isset($project['category'])): ?>
                <span class="project-category">
                    <i class="far fa-folder" aria-hidden="true"></i>
                    <?php echo htmlspecialchars(ucfirst($project['category'])); ?>
                </span>
                <?php endif; ?>
            </div>
            
            <p class="project-description">
                <?php echo htmlspecialchars($project['description']); ?>
            </p>
            
            <div class="project-tech">
                <?php foreach ($project['technologies'] as $tech): ?>
                    <span class="tech-tag"><?php echo htmlspecialchars($tech); ?></span>
                <?php endforeach; ?>
            </div>
            
            <div class="project-actions">
                <a href="project.php?id=<?php echo $project['id']; ?>" class="btn btn-primary">View Details</a>
                
                <?php if (isset($project['demo'])): ?>
                    <a href="<?php echo htmlspecialchars($project['demo']); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline">
                        <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                        Live Demo
                    </a>
                <?php endif; ?>
                
                <?php if (isset($project['github'])): ?>
                    <a href="<?php echo htmlspecialchars($project['github']); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-text">
                        <i class="fab fa-github" aria-hidden="true"></i>
                        GitHub
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </article>
<?php
}
?>
