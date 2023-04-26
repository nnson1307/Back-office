FROM richarvey/nginx-php-fpm:1.8.2

# Create source folder & Copy it
RUN mkdir -p /var/www/html/web
COPY . /var/www/html/web
