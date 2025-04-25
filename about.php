<?php
/**
 * About Page
 * 
 * Page showcasing background, skills, and experience
 * 
 * @author cod-emminex
 * @date 2025-04-06
 */

// Set current page
$currentPage = 'about';

// Load configuration
require_once 'config/config.php';

// Include header
include('components/header.php');
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1>About Me</h1>
        <p class="page-subtitle">Learn about my background and skills</p>
    </div>
</section>

<!-- About Info Section -->
<section class="section section-about-info">
    <div class="container">
        <div class="about-content-grid">
            <div class="about-image" data-aos="fade-right">
                <img src="assets/img/network-3139208.jpg" alt="Profile photo" width="400" height="500" class="rounded-image">
                <div class="experience-badge">
                    <span class="number">5+</span>
                    <span class="text">Years<br>Experience</span>
                </div>
            </div>
            
            <div class="about-content" data-aos="fade-left">
                <h2>Fullstack Engineer with a Passion for Building Exceptional Applications</h2>
                
                <p class="lead">
                    I'm a passionate fullstack engineer specializing in creating robust, scalable applications with modern technologies.
                </p>
                
                <p>
                    With over 2 years of professional experience, I've developed a comprehensive skill set that spans both frontend and backend technologies. My journey in software development began with a strong foundation in computer science and has evolved through hands-on experience with various technologies and methodologies.
                </p>
                
                <p>
                    I pride myself on writing clean, maintainable code that follows best practices and industry standards. My approach to development is user-centered, focusing on creating intuitive interfaces backed by robust, efficient backend systems.
                </p>
                
                <div class="about-list">
                    <div class="about-list-item">
                        <div class="about-icon">
                            <i class="fas fa-laptop-code" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h3>Frontend Excellence</h3>
                            <p>Creating responsive, accessible, and performant user interfaces with modern JavaScript frameworks.</p>
                        </div>
                    </div>
                    
                    <div class="about-list-item">
                        <div class="about-icon">
                            <i class="fas fa-server" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h3>Backend Expertise</h3>
                            <p>Building secure, scalable server-side applications and APIs with Node.js, Express, and PHP.</p>
                        </div>
                    </div>
                    
                    <div class="about-list-item">
                        <div class="about-icon">
                            <i class="fas fa-database" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h3>Database Management</h3>
                            <p>Designing efficient database schemas and implementing optimized queries for both SQL and NoSQL databases.</p>
                        </div>
                    </div>
                    
                    <div class="about-list-item">
                        <div class="about-icon">
                            <i class="fas fa-cogs" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h3>DevOps & Deployment</h3>
                            <p>Implementing CI/CD pipelines and managing cloud deployments with Docker, AWS, and GitHub Actions.</p>
                        </div>
                    </div>
                </div>
                
                <div class="about-cta">
                    <a href="assets/files/resume.pdf" class="btn btn-primary" target="_blank" rel="noopener noreferrer">
                        <i class="fas fa-file-alt" aria-hidden="true"></i>
                        Download Resume
                    </a>
                    
                    <a href="contact.php" class="btn btn-outline">
                        <i class="fas fa-paper-plane" aria-hidden="true"></i>
                        Contact Me
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="section section-skills bg-light">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Technical Skills</h2>
            <p>My expertise in various technologies</p>
        </div>
        
        <div class="skills-tabs" data-aos="fade-up">
            <div class="tabs">
                <button class="tab-btn active" data-tab="frontend">Frontend</button>
                <button class="tab-btn" data-tab="backend">Backend</button>
                <button class="tab-btn" data-tab="database">Database</button>
                <button class="tab-btn" data-tab="devops">DevOps</button>
            </div>
            
            <div class="tab-content-wrapper">
                <div id="frontend" class="tab-content active">
                    <?php 
                        require_once('components/skill-section.php');
                        renderSkillSection("Frontend Development", $config['skills']['frontend']); 
                    ?>
                </div>
                
                <div id="backend" class="tab-content">
                    <?php renderSkillSection("Backend Development", $config['skills']['backend']); ?>
                </div>
                
                <div id="database" class="tab-content">
                    <?php renderSkillSection("Database Management", $config['skills']['database']); ?>
                </div>
                
                <div id="devops" class="tab-content">
                    <?php renderSkillSection("DevOps & Tools", $config['skills']['devops']); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Experience Section -->
<section class="section section-experience">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Work Experience</h2>
            <p>My professional journey</p>
        </div>
        
        <div class="timeline" data-aos="fade-up">
            <div class="timeline-item">
                <div class="timeline-marker">
                    <i class="fas fa-briefcase" aria-hidden="true"></i>
                </div>
                
                <div class="timeline-content">
                    <div class="timeline-date">2023 - Present</div>
                    <h3>Senior Fullstack Engineer</h3>
                    <div class="timeline-company">TechInnovate Solutions</div>
                    <p>Leading development of enterprise web applications using React, Node.js, and PostgreSQL. Managing a team of 5 developers and implementing best practices for code quality and deployment.</p>
                    <ul class="timeline-highlights">
                        <li>Architected and implemented a customer management platform that improved client efficiency by 40%</li>
                        <li>Led the migration from monolith to microservices architecture</li>
                        <li>Implemented CI/CD pipelines that reduced deployment time by 70%</li>
                        <li>Mentored junior developers through code reviews and pair programming</li>
                    </ul>
                    <div class="timeline-tech">
                        <span class="tech-tag">React</span>
                        <span class="tech-tag">Node.js</span>
                        <span class="tech-tag">PostgreSQL</span>
                        <span class="tech-tag">Docker</span>
                        <span class="tech-tag">AWS</span>
                    </div>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-marker">
                    <i class="fas fa-briefcase" aria-hidden="true"></i>
                </div>
                
                <div class="timeline-content">
                    <div class="timeline-date">2021 - 2023</div>
                    <h3>Fullstack Developer</h3>
                    <div class="timeline-company">WebScale Applications Inc.</div>
                    <p>Developed and maintained web applications for clients in various industries using modern JavaScript frameworks and PHP backend systems.</p>
                    <ul class="timeline-highlights">
                        <li>Built real-time analytics dashboard processing over 1 million events daily</li>
                        <li>Implemented responsive designs that increased mobile conversions by 35%</li>
                        <li>Optimized database queries that improved application performance by 60%</li>
                    </ul>
                    <div class="timeline-tech">
                        <span class="tech-tag">React</span>
                        <span class="tech-tag">PHP</span>
                        <span class="tech-tag">MySQL</span>
                        <span class="tech-tag">Redis</span>
                        <span class="tech-tag">REST APIs</span>
                    </div>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-marker">
                    <i class="fas fa-briefcase" aria-hidden="true"></i>
                </div>
                
                <div class="timeline-content">
                    <div class="timeline-date">2019 - 2021</div>
                    <h3>Frontend Developer</h3>
                    <div class="timeline-company">Digital Solutions Group</div>
                    <p>Specialized in creating responsive user interfaces and implementing frontend functionality for web applications.</p>
                    <ul class="timeline-highlights">
                        <li>Developed UI components for a healthcare management system serving 10,000+ users</li>
                        <li>Implemented accessibility improvements that achieved WCAG 2.1 AA compliance</li>
                        <li>Built reusable component library that increased development efficiency by 25%</li>
                    </ul>
                    <div class="timeline-tech">
                        <span class="tech-tag">JavaScript</span>
                        <span class="tech-tag">React</span>
                        <span class="tech-tag">SASS/SCSS</span>
                        <span class="tech-tag">Webpack</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Education Section -->
<section class="section section-education bg-light">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Education & Certifications</h2>
            <p>Academic background and professional development</p>
        </div>
        
        <div class="education-grid">
            <div class="education-card" data-aos="fade-up">
                <div class="education-icon degree">
                    <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                </div>
                
                <div class="education-content">
                    <h3>BSc. in Biochemistry</h3>
                    <div class="education-meta">
                        <span class="education-institution">University of Lagos</span>
                        <span class="education-date">2018 - 2024</span>
                    </div>
                    <p>Graduated with second class upper. Acquired various knowledge in Biochemistry, including Biotechnology, Bioinformatics, Nutrition, Toxicology, e.t.c.</p>
                </div>
            </div>
            
            <div class="education-card" data-aos="fade-up" data-aos-delay="100">
                <div class="education-icon cert">
                    <i class="fas fa-certificate" aria-hidden="true"></i>
                </div>
                
                <div class="education-content">
                    <h3>Software Engineering Certification</h3>
                    <div class="education-meta">
                        <span class="education-institution">ALX School of Africa</span>
                        <span class="education-date">2022</span>
                    </div>
                    <p>Professional certification in designing distributed systems and deploying applications on AWS infrastructure.</p>
                </div>
            </div>
            
            <div class="education-card" data-aos="fade-up" data-aos-delay="200">
                <div class="education-icon certi">
                    <i class="fas fa-laptop-code" aria-hidden="true"></i>
                </div>
                
                <div class="education-content">
                    <h3>Professional Scrum Master</h3>
                    <div class="education-meta">
                        <span class="education-institution">Scrum.org</span>
                        <span class="education-date">2021</span>
                    </div>
                    <p>Certification in Scrum methodologies and agile project management practices.</p>
                </div>
            </div>
            
            <div class="education-card" data-aos="fade-up" data-aos-delay="300">
                <div class="education-icon course">
                    <i class="fas fa-book" aria-hidden="true"></i>
                </div>
                
                <div class="education-content">
                    <h3>Advanced React Patterns</h3>
                    <div class="education-meta">
                        <span class="education-institution">Frontend Masters</span>
                        <span class="education-date">2023</span>
                    </div>
                    <p>Comprehensive course on advanced React patterns, performance optimization, and state management.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section section-cta">
    <div class="container">
        <div class="cta-content" data-aos="fade-up">
            <h2>Interested in working together?</h2>
            <p>Let's discuss how I can help with your next project.</p>
            <div class="cta-actions">
                <a href="contact.php" class="btn btn-primary btn-medium">Get In Touch</a>
                <a href="projects.php" class="btn btn-primary btn-medium">View My Projects</a>
            </div>
        </div>
    </div>
</section>

<?php
// Include footer
include('components/footer.php');
?>
