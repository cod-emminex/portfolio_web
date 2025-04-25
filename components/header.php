<?php
/**
 * Site Header Component
 * 
 * @author cod-emminex
 * @date 2025-04-06
 */

// Include config if not already included
if (!isset($config)) {
    require_once 'config/config.php';
}

// Determine current page
$currentPage = $currentPage ?? 'home';
$pageMeta = getPageMeta($currentPage);
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $pageMeta['description']; ?>">
    
    <!-- OpenGraph Tags -->
    <meta property="og:title" content="<?php echo $pageMeta['title']; ?>">
    <meta property="og:description" content="<?php echo $pageMeta['description']; ?>">
    <meta property="og:url" content="<?php echo $config['site']['url']; ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo $config['site']['url']; ?>/assets/img/og-image.jpg">
    
    <title><?php echo $pageMeta['title']; ?></title>
    
    <!-- Preload Critical Assets -->
    <link rel="preload" href="assets/fonts/inter.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="assets/css/styles.css" as="style">
	<link rel="preload" href="assets/js/main.js" as="script">
    <link rel="preload" href="assets/img/logo/logo.png" as="image">
    
    <!-- Favicons -->
    <link rel="icon" href="assets/img/favicon/favicon.ico" sizes="any">
    <link rel="icon" href="assets/img/favicon/favicon-16x16.png" type="image/png" sizes="16x16">
    <link rel="icon" href="assets/img/favicon/favicon-32x32.png" type="image/png" sizes="32x32">
    <link rel="apple-touch-icon" href="assets/img/favicon/apple-touch-icon.png">
    <link rel="manifest" href="site.webmanifest">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    
    <!-- Theme Color -->
    <meta name="theme-color" content="#4f46e5">
</head>
<body class="page-<?php echo $currentPage; ?>">
    <!-- Skip link for accessibility -->
    <a href="#main-content" class="skip-link">Skip to main content</a>
    
    <!-- Header -->
    <header class="header" id="header">
        <div class="container">
            <div class="header-content">
                <a href="index.php" class="logo" aria-label="<?php echo $config['site']['name']; ?> - Homepage">
                    <div class="logo-img">
                        <img 
                            src="<?php echo $config['site']['logo']; ?>" 
                            alt="<?php echo $config['site']['name']; ?>" 
                            width="180"
                            height="40"
                        >
                    </div>
                </a>
                
                <button class="menu-toggle" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="main-nav">
                    <span class="menu-toggle-bar"></span>
                    <span class="menu-toggle-bar"></span>
                    <span class="menu-toggle-bar"></span>
                </button>
                
                <nav class="main-nav" id="main-nav">
                    <ul class="nav-list">
                        <?php foreach ($config['navigation'] as $item): ?>
                            <li class="nav-item <?php echo $currentPage === $item['id'] ? 'active' : ''; ?>">
                                <a href="<?php echo $item['url']; ?>" class="nav-link">
                                    <?php echo $item['name']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main id="main-content">
