FROM trafex/php-nginx:latest

# 🔥 Install the missing iconv extension using Alpine's package manager
USER root
RUN apk add --no-cache php85-iconv

# Copy Composer from the official image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/html

ENV DOCUMENT_ROOT /var/www/html/public

RUN composer install --no-dev --optimize-autoloader

RUN chown -R nobody:nobody /var/www/html/storage /var/www/html/bootstrap/cache

USER nobody

CMD ["/usr/bin/supervisord"]