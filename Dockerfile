FROM trafex/php-nginx:latest

# Install the missing iconv extension
USER root
RUN apk add --no-cache php85-iconv

# Copy Composer from the official image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/html

ENV DOCUMENT_ROOT /var/www/html/public
ENV COMPOSER_MEMORY_LIMIT=-1

# 🔥 Install dependencies with memory optimization
RUN composer install --no-dev --no-scripts --optimize-autoloader --prefer-dist

# 🔥 Generate autoload and run scripts separately to save memory
RUN composer dump-autoload --optimize
RUN php artisan package:discover --ansi

RUN chown -R nobody:nobody /var/www/html/storage /var/www/html/bootstrap/cache

USER nobody

CMD ["/entrypoint.sh"]