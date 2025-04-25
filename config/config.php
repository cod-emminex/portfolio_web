<?php
/**
 * Site Configuration
 * 
 * Central configuration file for portfolio website
 * 
 * @author cod-emminex
 * @date 2025-04-06
 */

// Site information
$config = [
    'site' => [
        'name' => 'The Emminex Stack',
        'tagline' => 'Fullstack Engineer Portfolio',
        'description' => 'Professional portfolio showcasing fullstack development projects, skills, and experience in building scalable web applications.',
        'email' => 'emminexy@yahoo.com',
        'url' => 'https://emminexstack.com',
        'year' => date('Y'),
		'logo' => 'assets/img/logo/logo.png',
		'logo-dark' => 'assets/img/logo/logo-dark.png',
        'social' => [
            'github' => 'https://github.com/cod-emminex',
            'linkedin' => 'https://linkedin.com/in/cod-emminex',
            'twitter' => 'https://twitter.com/cod_emminex'
        ]
    ],
    
    'navigation' => [
        [
            'id' => 'home',
            'name' => 'Home',
            'url' => 'index.php'
        ],
        [
            'id' => 'about',
            'name' => 'About',
            'url' => 'about.php'
        ],
        [
            'id' => 'projects',
            'name' => 'Projects',
            'url' => 'projects.php'
        ],
        [
            'id' => 'contact',
            'name' => 'Contact',
            'url' => 'contact.php'
        ]
    ],
    
    'skills' => [
        'frontend' => [
            ['name' => 'HTML5/CSS3', 'level' => 95],
            ['name' => 'JavaScript/TypeScript', 'level' => 90],
            ['name' => 'React.js', 'level' => 92],
            ['name' => 'Next.js', 'level' => 88],
            ['name' => 'Redux', 'level' => 85],
            ['name' => 'Responsive Design', 'level' => 95],
            ['name' => 'UI/UX Principles', 'level' => 85]
        ],
        'backend' => [
            ['name' => 'Node.js', 'level' => 90],
            ['name' => 'Express.js', 'level' => 88],
            ['name' => 'PHP', 'level' => 85],
            ['name' => 'Python', 'level' => 80],
            ['name' => 'RESTful APIs', 'level' => 92],
            ['name' => 'GraphQL', 'level' => 78],
            ['name' => 'Authentication', 'level' => 90]
        ],
        'database' => [
            ['name' => 'MongoDB', 'level' => 88],
            ['name' => 'PostgreSQL', 'level' => 85],
            ['name' => 'MySQL', 'level' => 90],
            ['name' => 'Redis', 'level' => 75],
            ['name' => 'Database Design', 'level' => 88]
        ],
        'devops' => [
            ['name' => 'Git/GitHub', 'level' => 95],
            ['name' => 'Docker', 'level' => 80],
            ['name' => 'AWS', 'level' => 75],
            ['name' => 'CI/CD', 'level' => 78],
            ['name' => 'Testing', 'level' => 85]
        ]
    ],
    
    'projects' => [
        [
            'id' => 1,
            'title' => 'E-Commerce Platform',
            'slug' => 'e-commerce-platform',
            'category' => 'fullstack',
            'image' => 'assets/img/network-3139208.jpg',
            'description' => 'A modern e-commerce platform with product catalog, shopping cart, payment processing, delivery system and order management.',
            'long_description' => "This project is a comprehensive e-commerce solution built with scalability in mind. It features a responsive product catalog with filtering and search capabilities, a robust shopping cart system with persistent storage, secure checkout with multiple payment options, and a complete order management dashboard.\n\nThe frontend is built with React and Redux for state management, providing a smooth and intuitive user experience across all devices. The backend API is implemented with Node.js and Express, following RESTful principles with proper error handling and validation.\n\nThe database uses MongoDB for product and user data, with Redis for caching and session management to optimize performance. Security measures include JWT authentication, input sanitization, and protection against common web vulnerabilities.",
            'technologies' => ['React', 'Node.js', 'Express', 'MongoDB', 'Redux', 'JWT', 'Stripe API'],
            'features' => [
                'Responsive product catalog with advanced filtering',
                'User authentication and profile management',
                'Shopping cart with persistent storage',
                'Secure payment processing with Stripe',
                'Order tracking and history',
                'Admin dashboard for inventory management',
                'Product reviews and ratings system'
            ],
            'demo' => 'https://ecommerce-demo.emminexstack.com',
            'github' => 'https://github.com/cod-emminex/ecommerce-platform',
            'completed' => '2024-12-15',
            'gallery' => [
                [
                    'image' => 'assets/img/projects/ecommerce-1.jpg',
                    'caption' => 'Product catalog with filtering'
                ],
                [
                    'image' => 'assets/img/projects/ecommerce-2.jpg',
                    'caption' => 'Shopping cart experience'
                ],
                [
                    'image' => 'assets/img/projects/ecommerce-3.jpg',
                    'caption' => 'Admin dashboard interface'
                ]
            ]
        ],
        [
            'id' => 2,
            'title' => 'Task Management System',
            'slug' => 'task-management-system',
            'category' => 'web application',
            'image' => 'assets/img/network-3139208.jpg',
            'description' => 'A collaborative task management system with real-time updates, project management, and team collaboration features.',
            'long_description' => "This task management system provides teams with powerful tools for organizing work and tracking progress. The application allows users to create projects, assign tasks with deadlines, track time spent, and collaborate with team members through comments and file sharing.\n\nThe frontend is built with React and Context API for state management, with WebSocket integration for real-time updates. The backend uses Node.js with Express, implementing a RESTful API with proper authentication and authorization.\n\nA PostgreSQL database stores the application data with proper relationships and constraints, ensuring data integrity. The system also includes reporting features, allowing managers to generate insights about team productivity and project status.",
            'technologies' => ['React', 'Context API', 'Node.js', 'WebSockets', 'PostgreSQL', 'Docker'],
            'features' => [
                'Project and task management with drag-and-drop interface',
                'Real-time updates and notifications',
                'Team collaboration with comments and file sharing',
                'Time tracking and reporting',
                'Calendar view integration',
                'Mobile-responsive design',
                'Role-based access control'
            ],
            'demo' => 'https://taskmanager-demo.emminexstack.com',
            'github' => 'https://github.com/cod-emminex/task-management-system',
            'completed' => '2024-10-20',
            'gallery' => [
                [
                    'image' => 'assets/img/projects/taskmanager-1.jpg',
                    'caption' => 'Dashboard view with task overview'
                ],
                [
                    'image' => 'assets/img/projects/taskmanager-2.jpg',
                    'caption' => 'Task detail page with comments'
                ],
                [
                    'image' => 'assets/img/projects/taskmanager-3.jpg',
                    'caption' => 'Analytics and reporting features'
                ]
            ]
        ],
        [
            'id' => 3,
            'title' => 'Real Estate Marketplace',
            'slug' => 'real-estate-marketplace',
            'category' => 'fullstack',
            'image' => 'assets/img/network-3139208.jpg',
            'description' => 'A comprehensive real estate platform allowing users to buy, sell, and rent properties with advanced search and mapping features.',
            'long_description' => "This real estate marketplace provides a platform for property buyers, sellers, and renters to connect. It features advanced search capabilities, including map-based property exploration, detailed property listings with photo galleries, virtual tours, and contact features.\n\nThe frontend is built with Next.js for server-side rendering and optimized SEO, essential for real estate listings. It includes interactive maps using the Google Maps API and responsive design for all device types.\n\nThe backend utilizes Node.js with a RESTful API, handling property listings, user accounts, saved searches, and messaging between users. The database is MongoDB with geospatial indexing for efficient location-based searches.",
            'technologies' => ['Next.js', 'TypeScript', 'Node.js', 'MongoDB', 'Google Maps API', 'AWS S3'],
            'features' => [
                'Interactive map-based property search',
                'Advanced filtering by property characteristics',
                'Property listing management for agents and owners',
                'Saved searches and favorited properties',
                'Messaging system between buyers and sellers',
                'Virtual tour integration',
                'Responsive design optimized for mobile house-hunting'
            ],
            'demo' => 'https://realestate-demo.emminexstack.com',
            'github' => 'https://github.com/cod-emminex/real-estate-marketplace',
            'completed' => '2025-02-10',
            'gallery' => [
                [
                    'image' => 'assets/img/projects/realestate-1.jpg',
                    'caption' => 'Map-based property search interface'
                ],
                [
                    'image' => 'assets/img/projects/realestate-2.jpg',
                    'caption' => 'Detailed property listing page'
                ],
                [
                    'image' => 'assets/img/projects/realestate-3.jpg',
                    'caption' => 'Agent dashboard for managing listings'
                ]
            ]
        ],
        [
            'id' => 4,
            'title' => 'Health & Fitness Tracker',
            'slug' => 'health-fitness-tracker',
            'category' => 'mobile application',
            'image' => 'assets/img/projects/project-4.jpg',
            'description' => 'A health and fitness tracking application with workout plans, nutrition logging, and progress visualization.',
            'long_description' => "This health and fitness tracker helps users maintain a healthy lifestyle by tracking workouts, nutrition, and health metrics. The application provides personalized workout recommendations, meal planning assistance, and progress tracking through visual charts and statistics.\n\nThe frontend is developed as a progressive web application (PWA) using React with offline capabilities, allowing users to log workouts even without internet connectivity. It features an intuitive interface with smooth animations and interactive elements.\n\nThe backend API is built with Node.js and Express, handling user data, workout plans, and nutrition information. It integrates with third-party services for nutritional data and exercise demonstrations. User data is stored in MongoDB with proper encryption for sensitive health information.",
            'technologies' => ['React', 'PWA', 'Chart.js', 'Node.js', 'Express', 'MongoDB', 'Nutritionix API'],
            'features' => [
                'Customizable workout plans and tracking',
                'Nutrition diary with calorie and macro counting',
                'Progress visualization with interactive charts',
                'Goal setting and achievement tracking',
                'Social sharing and community features',
                'Offline functionality',
                'Exercise library with demonstration videos'
            ],
            'demo' => 'https://fitness-demo.emminexstack.com',
            'github' => 'https://github.com/cod-emminex/fitness-tracker',
            'completed' => '2024-09-05',
            'gallery' => [
                [
                    'image' => 'assets/img/projects/fitness-1.jpg',
                    'caption' => 'Dashboard with fitness metrics'
                ],
                [
                    'image' => 'assets/img/projects/fitness-2.jpg',
                    'caption' => 'Workout tracking interface'
                ],
                [
                    'image' => 'assets/img/projects/fitness-3.jpg',
                    'caption' => 'Nutrition logging and analysis'
                ]
            ]
        ]
    ]
];

// Page metadata
$meta = [
    'home' => [
        'title' => 'The Emminex Stack - Fullstack Engineer Portfolio',
        'description' => 'Professional portfolio of a skilled fullstack engineer specializing in React, Node.js, and modern web technologies.'
    ],
    'about' => [
        'title' => 'About Me | The Emminex Stack',
        'description' => 'Learn about my journey as a fullstack engineer, my skills, experience, and approach to software development.'
    ],
    'projects' => [
        'title' => 'Projects | The Emminex Stack',
        'description' => 'Explore my portfolio of fullstack development projects showcasing web applications, mobile apps, and more.'
    ],
    'contact' => [
        'title' => 'Contact | The Emminex Stack',
        'description' => 'Get in touch for collaboration opportunities, job inquiries, or to discuss your project ideas.'
    ]
];

// Helper function to get meta information
function getPageMeta($page) {
    global $meta;
    return isset($meta[$page]) ? $meta[$page] : $meta['home'];
}
