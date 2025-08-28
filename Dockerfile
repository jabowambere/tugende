FROM php:8.2-apache

# Enable Apache Rewrite Module
RUN a2enmod rewrite

WORKDIR /var/www/html

# Copy project files
COPY . .

# Tell Apache what to serve as the default page
RUN echo "DirectoryIndex home.php" >> /etc/apache2/apache2.conf

# Expose port
EXPOSE 80

CMD ["apache2-foreground"]
