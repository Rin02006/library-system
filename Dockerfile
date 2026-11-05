FROM richarvey/nginx-php-fpm:8.3

COPY . .

ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV REAL_IP_HEADER 1

ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

ENV COMPOSER_ALLOW_SUPERUSER 1

# 🔥 THIS LINE RUNS COMPOSER DURING THE BUILD
RUN composer install --no-dev --optimize-autoloader

CMD ["/start.sh"]