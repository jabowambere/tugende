FROM php:8.2-apache

# Enable Apache Rewrite Module
RUN a2enmod rewrite

# Install mysqli + pdo_mysql extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

WORKDIR /var/www/html

# Copy project files
COPY . .

# Expose port
EXPOSE 80

CMD ["apache2-foreground"]
