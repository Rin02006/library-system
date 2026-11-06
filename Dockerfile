FROM trafex/php-nginx:latest

# 🔥 Copy Composer from the official image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/html

ENV DOCUMENT_ROOT /var/www/html/public

RUN composer install --no-dev --optimize-autoloader

RUN chown -R nobody:nobody /var/www/html/storage /var/www/html/bootstrap/cache

CMD ["/usr/bin/supervisord"]