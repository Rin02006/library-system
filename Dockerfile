FROM trafex/php-nginx:latest

# Install the missing iconv extension
USER root
RUN apk add --no-cache php85-iconv

# Copy Composer from the official image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/html

ENV DOCUMENT_ROOT /var/www/html/public

RUN composer install --no-dev --optimize-autoloader

RUN chown -R nobody:nobody /var/www/html/storage /var/www/html/bootstrap/cache

USER nobody

# 🔥 This is the correct command to start nginx and php-fpm
CMD ["/entrypoint.sh"]