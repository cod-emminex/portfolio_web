<?php
/**
 * Homepage
 * 
 * Landing page showcasing skills and featured projects
 * 
 * @author cod-emminex
 * @date 2025-04-06
 */

// Set current page
$currentPage = 'home';

// Load configuration
require_once 'config/config.php';

// Include header
include('components/header.php');

// Get featured projects (first 3 projects)
$featuredProjects = array_slice($config['projects'], 0, 3);
?>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-background">
        <div class="hero-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>
    </div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title" data-aos="fade-up">
                    <span class="greeting">Welcome to</span>
                    <span class="name">The Emminex Stack</span>
                </h1>
                <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">Fullstack Engineer</p>
                <p class="hero-description" data-aos="fade-up" data-aos-delay="200">
                    I build scalable, maintainable, and performant web applications using modern technologies and best practices.
                </p>
                <div class="hero-actions" data-aos="fade-up" data-aos-delay="300">
                    <a href="projects.php" class="btn btn-primary btn-large">View Projects</a>
                    <a href="contact.php" class="btn btn-outline btn-large">Get In Touch</a>
                </div>
            </div>
            <div class="hero-image" data-aos="fade-left">
                <img src="assets/img/network-3139208.jpg" alt="Web development illustration" width="1000" height="700">
            </div>
        </div>
        
        <div class="hero-scroll">
            <a href="#about" class="scroll-indicator" aria-label="Scroll to About section">
                <span class="scroll-arrow"></span>
                <span class="scroll-text">Scroll</span>
            </a>
        </div>
    </div>
</section>

<!-- About Overview Section -->
<section class="section section-about" id="about">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>About Me</h2>
            <p>A brief introduction to who I am and what I do</p>
        </div>
        
        <div class="about-grid">
            <div class="about-content" data-aos="fade-up">
                <p class="lead">
                    I'm a passionate fullstack developer with expertise in creating robust web applications that deliver exceptional user experiences.
                </p>
                
                <p>
                    With over 2 years of experience in software development, I've worked across various industries to deliver solutions that solve real-world problems. I specialize in frontend technologies like React and Next.js, backed by powerful server-side implementations using Node.js, Express, Express, Python and PHP.
                </p>
                
                <p>
                    My approach involves writing clean, maintainable code that follows industry best practices. I'm committed to continuous learning and staying updated with the latest technologies and development methodologies.
                </p>
                
                <div class="about-actions">
                    <a href="about.php" class="btn btn-primary">Learn More</a>
                    <a href="assets/files/resume.pdf" class="btn btn-outline" target="_blank" rel="noopener noreferrer">
                        <i class="fas fa-file-alt" aria-hidden="true"></i>
                        Download Resume
                    </a>
                </div>
            </div>
            
            <div class="about-stats" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card">
                    <div class="stat-number" data-count="5">0</div>
                    <div class="stat-label">Years of Experience</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-number" data-count="30">0</div>
                    <div class="stat-label">Projects Completed</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-number" data-count="15">0</div>
                    <div class="stat-label">Happy Clients</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-number" data-count="10">0</div>
                    <div class="stat-label">Technologies Mastered</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section class="section section-skills bg-light">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>My Skills</h2>
            <p>Technologies and tools I work with</p>
        </div>
        
        <div class="skills-grid">
            <div class="skills-category-wrapper" data-aos="fade-up">
                <div class="skills-icon">
                    <i class="fas fa-code" aria-hidden="true"></i>
                </div>
                <h3>Frontend Development</h3>
                <div class="skills-tags">
                    <span class="skill-tag">HTML5/CSS3</span>
                    <span class="skill-tag">JavaScript</span>
                    <span class="skill-tag">TypeScript</span>
                    <span class="skill-tag">React</span>
                    <span class="skill-tag">Next.js</span>
                    <span class="skill-tag">Redux</span>
                    <span class="skill-tag">SASS/SCSS</span>
                    <span class="skill-tag">Tailwind CSS</span>
                </div>
            </div>
            
            <div class="skills-category-wrapper" data-aos="fade-up" data-aos-delay="100">
                <div class="skills-icon">
                    <i class="fas fa-server" aria-hidden="true"></i>
                </div>
                <h3>Backend Development</h3>
                <div class="skills-tags">
                    <span class="skill-tag">Node.js</span>
                    <span class="skill-tag">Express</span>
                    <span class="skill-tag">PHP</span>
                    <span class="skill-tag">Python</span>
                    <span class="skill-tag">REST APIs</span>
                    <span class="skill-tag">GraphQL</span>
                    <span class="skill-tag">Authentication</span>
                </div>
            </div>
            
            <div class="skills-category-wrapper" data-aos="fade-up" data-aos-delay="200">
                <div class="skills-icon">
                    <i class="fas fa-database" aria-hidden="true"></i>
                </div>
                <h3>Database & Storage</h3>
                <div class="skills-tags">
                    <span class="skill-tag">MongoDB</span>
                    <span class="skill-tag">PostgreSQL</span>
                    <span class="skill-tag">MySQL</span>
                    <span class="skill-tag">Redis</span>
                    <span class="skill-tag">Firebase</span>
                    <span class="skill-tag">AWS S3</span>
                </div>
            </div>
            
            <div class="skills-category-wrapper" data-aos="fade-up" data-aos-delay="300">
                <div class="skills-icon">
                    <i class="fas fa-cogs" aria-hidden="true"></i>
                </div>
                <h3>DevOps & Tools</h3>
                <div class="skills-tags">
                    <span class="skill-tag">Git/GitHub</span>
                    <span class="skill-tag">Docker</span>
                    <span class="skill-tag">CI/CD</span>
                    <span class="skill-tag">AWS</span>
                    <span class="skill-tag">Jest</span>
                    <span class="skill-tag">Webpack</span>
                </div>
            </div>
        </div>
        
        <div class="section-footer" data-aos="fade-up">
            <a href="about.php#skills" class="btn btn-outline">View All Skills</a>
        </div>
    </div>
</section>

<!-- Featured Projects Section -->
<section class="section section-projects">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Featured Projects</h2>
            <p>Some of my recent works</p>
        </div>
        
        <div class="projects-grid">
            <?php 
            foreach ($featuredProjects as $index => $project):
                $delay = $index * 100;
                echo '<div data-aos="fade-up" data-aos-delay="'.$delay.'">';
                require_once('components/project-card.php');
                renderProjectCard($project, $index === 0);
                echo '</div>';
            endforeach; 
            ?>
        </div>
        
        <div class="section-footer" data-aos="fade-up">
            <a href="projects.php" class="btn btn-primary">View All Projects</a>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="section section-process">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">My Development Process</h2>
            <p class="section-description">How I approach software development</p>
        </div>

        <div class="process-steps">
            <div class="process-step">
                <div class="step-icon">
                    <i class="fas fa-lightbulb" aria-hidden="true"></i>
                </div>
                <h3>1. Plan & Architect</h3>
                <p>Begin with understanding requirements and designing system architecture focused on maintainability and scalability.</p>
            </div>
            
            <div class="process-step">
                <div class="step-icon">
                    <i class="fas fa-code" aria-hidden="true"></i>
                </div>
                <h3>2. Develop & Test</h3>
                <p>Implement clean, modular code with test-driven development practices to ensure reliability and quality.</p>
            </div>
            
            <div class="process-step">
                <div class="step-icon">
                    <i class="fas fa-rocket" aria-hidden="true"></i>
                </div>
                <h3>3. Deploy & Monitor</h3>
                <p>Utilize CI/CD pipelines for deployment with comprehensive monitoring and performance optimization.</p>
            </div>
            
            <div class="process-step">
                <div class="step-icon">
                    <i class="fas fa-sync" aria-hidden="true"></i>
                </div>
                <h3>4. Iterate & Improve</h3>
                <p>Continuously gather feedback, analyze metrics, and implement improvements following agile methodologies.</p>
            </div>
			</div>
	</div>
</section>

<!-- CTA Section -->
<section class="section section-cta">
    <div class="container">
        <div class="cta-content" data-aos="fade-up">
            <h2>Ready to start your project?</h2>
            <p>Let's work together to bring your ideas to life!</p>
            <div class="cta-actions">
                <a href="contact.php" class="btn btn-primary btn-medium">Get In Touch</a>
                <a href="projects.php" class="btn btn-primary btn-medium">Explore My Work</a>
            </div>
        </div>
    </div>
</section>

<?php
// Include footer
include('components/footer.php');
?>
