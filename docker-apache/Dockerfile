# Use the official PHP image with Apache
FROM php:7.4-apache

# Install PostgreSQL development libraries for pdo_pgsql
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PostgreSQL extension for PHP
# RUN docker-php-ext-install pdo pdo_pgsql

# Copy HTML/PHP files to the Apache document root
COPY html/ /var/www/html/

# Make run script executable
COPY run-apache.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/run-apache.sh

# Expose port 80 for Apache
EXPOSE 80

# Start Apache server
CMD ["run-apache.sh"]

