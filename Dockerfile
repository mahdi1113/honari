# استفاده از تصویر پایه PHP با Apache
FROM php:8.2-apache

# نصب افزونه‌های سیستم و PHP مورد نیاز
RUN echo 'Acquire::Check-Valid-Until "false";' > /etc/apt/apt.conf.d/99no-check-valid-until && \
    apt-get update -o Acquire::Check-Valid-Until=false && \
    apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    unzip \
    git \
    wget \
    libexif-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd zip pdo pdo_mysql exif

# نصب Composer
RUN wget -O /tmp/composer-setup.php https://getcomposer.org/installer && \
    php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    rm /tmp/composer-setup.php

# نصب Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# تنظیم مسیر کاری
WORKDIR /var/www/html

# کپی کردن فایل‌های پروژه به داخل کانتینر
COPY . .

# نصب وابستگی‌های پروژه با Composer
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --no-dev --optimize-autoloader

# تنظیمات پایگاه داده و کش
RUN php artisan key:generate && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# کپی کردن پیکربندی Apache به داخل کانتینر
COPY ./apache-config.conf /etc/apache2/sites-available/000-default.conf

# فعال کردن ماژول‌های Apache
RUN a2enmod rewrite

# تغییر مالکیت دایرکتوری‌های مورد نیاز به www-data
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# باز کردن پورت 80 برای Apache
EXPOSE 80

# تنظیم دستورات اجرایی
CMD ["apache2-foreground"]
