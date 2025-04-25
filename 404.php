<?php
/**
 * 404 Error Page
 * 
 * Custom 404 page for the portfolio website
 * 
 * @author cod-emminex
 * @date 2025-04-06
 */

// Set current page (none, as this is an error page)
$currentPage = '';

// Load configuration
require_once 'config/config.php';

// Set page title
$pageTitle = '404 - Page Not Found | ' . $config['site']['name'];

// Include header
include('components/header.php');
?>

<section class="section section-error">
    <div class="container">
        <div class="error-content" data-aos="fade-up">
            <div class="error-code">404</div>
            <h1>Page Not Found</h1>
            <p>The page you're looking for doesn't exist or has been moved.</p>
            <div class="error-actions">
                <a href="index.php" class="btn btn-primary">Back to Homepage</a>
                <a href="contact.php" class="btn btn-outline">Contact Me</a>
            </div>
        </div>
    </div>
</section>

<style>
    .section-error {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
    
    .error-content {
        max-width: 600px;
    }
    
    .error-code {
        font-size: 10rem;
        font-weight: 700;
        line-height: 1;
        color: var(--primary);
        margin-bottom: var(--space-md);
        background: linear-gradient(135deg, var(--primary), var(--accent));
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    
    .error-content h1 {
        margin-bottom: var(--space-md);
    }
    
    .error-content p {
        color: var(--text-light);
        font-size: var(--text-lg);
        margin-bottom: var(--space-xl);
    }
    
    .error-actions {
        display: flex;
        gap: var(--space-md);
        justify-content: center;
    }
    
    @media (max-width: 576px) {
        .error-code {
            font-size: 6rem;
        }
        
        .error-actions {
            flex-direction: column;
        }
    }
</style>

<?php
// Include footer
include('components/footer.php');
?>
