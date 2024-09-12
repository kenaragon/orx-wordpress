<?php
// Standard WordPress config
define('DB_NAME', getenv('WORDPRESS_DB_NAME'));
define('DB_USER', getenv('WORDPRESS_DB_USER'));
define('DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD'));
define('DB_HOST', getenv('WORDPRESS_DB_HOST'));

// Security keys (use appropriate ones for your environment)
define('AUTH_KEY', 'your-auth-key');
define('SECURE_AUTH_KEY', 'your-secure-auth-key');
define('LOGGED_IN_KEY', 'your-logged-in-key');
define('NONCE_KEY', 'your-nonce-key');

// Force WordPress to use the correct site URL
$http_host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'wordpress.ortrax.com';
$https = isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ? 'https' : 'http';

// This will dynamically update the WordPress URL based on the domain used in the request
define('WP_HOME', $https . '://' . $http_host);
define('WP_SITEURL', $https . '://' . $http_host);

// Handling reverse proxy (CloudFront and ALB) for HTTPS detection
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}

// Enable debugging for troubleshooting
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

// Ensure filesystem permissions work correctly (especially if using EFS)
define('FS_METHOD', 'direct');