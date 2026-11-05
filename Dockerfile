FROM trafex/php-nginx:8.3

COPY . /var/www/html

# Set the web root to Laravel's public folder
ENV DOCUMENT_ROOT /var/www/html/public

# Install composer dependencies
RUN composer install --no-dev --optimize-autoloader

# Laravel needs write access to these folders
RUN chown -R nobody:nobody /var/www/html/storage /var/www/html/bootstrap/cache

CMD ["/usr/bin/supervisord"]