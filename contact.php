<?php
/**
 * Contact Page
 * 
 * Page with contact form and contact information
 * 
 * @author cod-emminex
 * @date 2025-04-06
 */

// Set current page
$currentPage = 'contact';

// Load configuration
require_once 'config/config.php';

// Include header
include('components/header.php');
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1>Get in Touch</h1>
        <p class="page-subtitle">Let's discuss your project or opportunities</p>
    </div>
</section>

<!-- Contact Section -->
<section class="section section-contact">
    <div class="container">
        <div class="contact-grid">
            <!-- Contact Information -->
            <div class="contact-info" data-aos="fade-right">
                <h2>Contact Information</h2>
                <p class="contact-intro">
                    Feel free to reach out using any of the methods below. I'll get back to you as soon as possible.
                </p>
                
                <div class="contact-methods">
                    <div class="contact-method">
                        <div class="contact-icon">
                            <i class="fas fa-envelope" aria-hidden="true"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Email</h3>
                            <a href="mailto:<?php echo htmlspecialchars($config['site']['email']); ?>">
                                <?php echo htmlspecialchars($config['site']['email']); ?>
                            </a>
                        </div>
                    </div>
                    
                    <div class="contact-method">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Location</h3>
                            <p>San Francisco, CA</p>
                        </div>
                    </div>
                    
                    <div class="contact-method">
                        <div class="contact-icon">
                            <i class="fas fa-clock" aria-hidden="true"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Availability</h3>
                            <p>Monday - Friday, 9am - 5pm PST</p>
                        </div>
                    </div>
                </div>
                
                <div class="social-section">
                    <h3>Connect With Me</h3>
                    <div class="social-icons">
                        <?php if(isset($config['site']['social']['github'])): ?>
                            <a href="<?php echo htmlspecialchars($config['site']['social']['github']); ?>" target="_blank" rel="noopener noreferrer" class="social-icon github" aria-label="GitHub">
                                <i class="fab fa-github" aria-hidden="true"></i>
                            </a>
                        <?php endif; ?>
                        
                        <?php if(isset($config['site']['social']['linkedin'])): ?>
                            <a href="<?php echo htmlspecialchars($config['site']['social']['linkedin']); ?>" target="_blank" rel="noopener noreferrer" class="social-icon linkedin" aria-label="LinkedIn">
                                <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                            </a>
                        <?php endif; ?>
                        
                        <?php if(isset($config['site']['social']['twitter'])): ?>
                            <a href="<?php echo htmlspecialchars($config['site']['social']['twitter']); ?>" target="_blank" rel="noopener noreferrer" class="social-icon twitter" aria-label="Twitter">
                                <i class="fab fa-x-twitter" aria-hidden="true"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="contact-form-wrapper" data-aos="fade-left">
                <?php include('components/contact-form.php'); ?>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="section section-faq bg-light">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Frequently Asked Questions</h2>
            <p>Common questions about working together</p>
        </div>
        
        <div class="faq-grid">
            <div class="faq-item" data-aos="fade-up">
                <div class="faq-question">
                    <h3>What types of projects do you work on?</h3>
                    <div class="faq-icon">
                        <i class="fas fa-plus" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="faq-answer">
                    <p>I specialize in web application development, including e-commerce platforms, content management systems, custom web applications, and responsive websites. I have experience across various industries including healthcare, finance, education, and retail.</p>
                </div>
            </div>
            
            <div class="faq-item" data-aos="fade-up" data-aos-delay="100">
                <div class="faq-question">
                    <h3>What is your typical project process?</h3>
                    <div class="faq-icon">
                        <i class="fas fa-plus" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="faq-answer">
                    <p>My process typically includes the following phases: initial consultation and requirement gathering, planning and architecture design, development with regular updates, testing and quality assurance, deployment, and post-launch support. I believe in maintaining clear communication throughout the project lifecycle.</p>
                </div>
            </div>
            
            <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                <div class="faq-question">
                    <h3>What are your rates?</h3>
                    <div class="faq-icon">
                        <i class="fas fa-plus" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="faq-answer">
                    <p>My rates depend on project complexity, timeline, and specific requirements. I offer both hourly rates and fixed project pricing. I'm happy to provide a detailed quote after understanding your project needs. Please contact me to discuss your specific project for accurate pricing information.</p>
                </div>
            </div>
            
            <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                <div class="faq-question">
                    <h3>How long does a typical project take?</h3>
                    <div class="faq-icon">
                        <i class="fas fa-plus" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="faq-answer">
                    <p>Project timelines vary based on scope and complexity. Small websites might take 2-4 weeks, while complex web applications can take several months. During our initial discussions, I'll provide an estimated timeline based on your specific requirements and project goals.</p>
                </div>
            </div>
            
            <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                <div class="faq-question">
                    <h3>Do you offer maintenance and support?</h3>
                    <div class="faq-icon">
                        <i class="fas fa-plus" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="faq-answer">
                    <p>Yes, I offer ongoing maintenance and support services to ensure your application continues to run smoothly after launch. This includes bug fixes, security updates, performance optimization, and feature enhancements as needed. I offer various maintenance packages tailored to your needs.</p>
                </div>
            </div>
            
            <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                <div class="faq-question">
                    <h3>Are you available for long-term collaboration?</h3>
                    <div class="faq-icon">
                        <i class="fas fa-plus" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="faq-answer">
                    <p>Absolutely! I enjoy building long-term relationships with clients and providing ongoing development and support. Whether you need a full-time developer or periodic assistance with your projects, I'm open to discussing various collaboration models that best suit your needs.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add extra script for FAQ functionality -->
<?php
$extraScripts = '<script src="assets/js/faq.js"></script>';
?>

<?php
// Include footer
include('components/footer.php');
?>
