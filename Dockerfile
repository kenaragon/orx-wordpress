FROM wordpress:latest

# Set environment variables for WordPress
ENV WORDPRESS_DB_HOST=${DB_HOST}
ENV WORDPRESS_DB_USER=${DB_USER}
ENV WORDPRESS_DB_PASSWORD=${DB_PASSWORD}
ENV WORDPRESS_DB_NAME=${DB_NAME}

# Add wp-config.php customizations (use a custom wp-config.php file)
COPY wp-config.php /var/www/html/wp-config.php

# Add any custom plugins, themes, etc.
COPY custom-plugins /var/www/html/wp-content/plugins/
COPY custom-themes /var/www/html/wp-content/themes/

# Set file permissions for WordPress
RUN chown -R www-data:www-data /var/www/html

# Expose the correct ports (WordPress usually runs on port 80)
EXPOSE 80
