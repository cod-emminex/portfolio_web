<?php
/**
 * Skill Section Component
 * 
 * Displays a skill category with progress bars
 * 
 * @param string $title The skill category title
 * @param array $skills Array of skill items with name and level
 * @author cod-emminex
 * @date 2025-04-06
 */

function renderSkillSection($title, $skills = []) {
    if (empty($skills)) return;
?>
    <div class="skills-category" data-aos="fade-up">
        <h3><?php echo htmlspecialchars($title); ?></h3>
        
        <div class="skills-list">
            <?php foreach ($skills as $skill): ?>
                <div class="skill-container">
                    <div class="skill-header">
                        <span class="skill-name"><?php echo htmlspecialchars($skill['name']); ?></span>
                        <span class="skill-level"><?php echo $skill['level']; ?>%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" data-progress="<?php echo $skill['level']; ?>"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php
}
?>
