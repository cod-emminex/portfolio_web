<?php
/**
 * Site Footer Component
 * 
 * @author cod-emminex
 * @date 2025-04-06
 */

// Include config if not already included
if (!isset($config)) {
    require_once 'config/config.php';
}
?>
    </main>
    
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-info">
                    <div class="footer-logo">
                        <img 
                            src="<?php echo $config['site']['logo-dark']; ?>" 
                            alt="<?php echo $config['site']['name']; ?>"
                            width="150"
                            height="35"
                        >
                    </div>
                    <p class="footer-tagline"><?php echo $config['site']['tagline']; ?></p>
                    <p class="footer-description">Building scalable, maintainable, and performant web applications with modern technologies.</p>
                    
                    <div class="footer-social">
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
                
                <div class="footer-links">
                    <div class="footer-nav">
                        <h3>Navigation</h3>
                        <ul>
                            <?php foreach ($config['navigation'] as $item): ?>
                                <li><a href="<?php echo $item['url']; ?>"><?php echo $item['name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    
                    <div class="footer-contact">
                        <h3>Contact</h3>
                        <ul>
                            <li><a href="mailto:<?php echo htmlspecialchars($config['site']['email']); ?>">Email: <?php echo htmlspecialchars($config['site']['email']); ?></a></li>
                            <li><a href="contact.php" class="arrow">Get in touch</a></li>
                            <li><a href="assets/files/resume.pdf" target="_blank" rel="noopener noreferrer">Download Resume</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo $config['site']['year']; ?> <?php echo htmlspecialchars($config['site']['name']); ?>. All rights reserved.</p>
                <p class="footer-credits">Made with <span class="heart">❤</span> and modern web technologies</p>
            </div>
        </div>
    </footer>

    <!-- Back to top button -->
    <button id="back-to-top" class="back-to-top" aria-label="Back to top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/main.js"></script>
    <?php if (isset($extraScripts)) echo $extraScripts; ?>
</body>
</html>
