<?php
// Standard WordPress config
define('DB_NAME', getenv('WORDPRESS_DB_NAME'));
define('DB_USER', getenv('WORDPRESS_DB_USER'));
define('DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD'));
define('DB_HOST', getenv('WORDPRESS_DB_HOST'));

// Security keys (use appropriate ones for your environment)
define('AUTH_KEY',         'Qkc{U-j/+euo2(E;cJ3qO+id#8SY3tmFPy;pXFfIbiyuEm|eZv<bQ^%,<HT`5G3s');
define('SECURE_AUTH_KEY',  ']9anLjXJQa<V4+^cT2I~k_$;fc|aq|WEP-]av9pqUe/;Y1*sm5hiYqsk?b)j:A;z');
define('LOGGED_IN_KEY',    '1;Z*W6ha(5!.m7D^wjB7{4;jWe`Q?e9zEUR%;uQo|LYJw1Z%8hH1CM,6+d4b|_h|');
define('NONCE_KEY',        'FbYKTTz*~BI#7@BoOnS4B//5bPB_7FQz#IpiE=im+d~6et6rU-]/9V-$P=eHw(-d');

define('AUTH_SALT',        'as9!{<B$M%{mKrzK7ofl$o`73-#zE|pSV+DnPo[g2f6Dqe)Kefj~,kT<AIjD@B}>');
define('SECURE_AUTH_SALT', 'wrP{I)e_w@I]/66`FxB=p8ei0sE+o5G,e${iU5-fhnRyDSNh0-vE]>EL?9zU|Us}');
define('LOGGED_IN_SALT',   'M^nn#UIV5*s*Q^dzsf%`yK%>V-]UC6ya#E-b]G-ITy>k I28+-@1v gEOZ)R9;_O');
define('NONCE_SALT',       'ZA|oj-SlBYI@X~+>,3>c>op@z*F6jiLp,+7c+%$$G;[m{}f+2B)DGQu^WK1QFZ9b');

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