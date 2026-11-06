FROM trafex/php-nginx:latest

COPY . /var/www/html

ENV DOCUMENT_ROOT /var/www/html/public

RUN composer install --no-dev --optimize-autoloader

RUN chown -R nobody:nobody /var/www/html/storage /var/www/html/bootstrap/cache

CMD ["/usr/bin/supervisord"]