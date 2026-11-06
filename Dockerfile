FROM trafex/php-nginx:latest

# Install the missing iconv extension
USER root
RUN apk add --no-cache php85-iconv

# Copy Composer from the official image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/html

ENV DOCUMENT_ROOT /var/www/html/public
ENV COMPOSER_MEMORY_LIMIT=-1

# 🔥 Use --no-scripts to prevent memory spikes during installation
RUN composer install --no-dev --no-scripts --optimize-autoloader --prefer-dist

# Generate the autoloader and run Laravel scripts AFTER composer finishes
RUN composer dump-autoload --optimize
RUN php artisan package:discover --ansi

RUN chown -R nobody:nobody /var/www/html/storage /var/www/html/bootstrap/cache

USER nobody

CMD ["/entrypoint.sh"]