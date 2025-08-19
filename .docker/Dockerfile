# Sử dụng image php-fpm chính thức với PHP 7.4 (dựa trên Debian)
FROM php:7.4-fpm

# Cài đặt các dependencies hệ thống và locale
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libzip-dev \
    libonig-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libxml2-dev \
    locales \
    && echo "en_US ISO-8859-1" >> /etc/locale.gen \
    && echo "en_US.UTF-8 UTF-8" >> /etc/locale.gen \
    && locale-gen en_US.UTF-8 \
    && rm -rf /var/lib/apt/lists/*

# Thiết lập biến môi trường locale
ENV LANG=en_US.UTF-8
ENV LANGUAGE=en_US:en
ENV LC_ALL=en_US.UTF-8

# Cài đặt các PHP extensions cần thiết cho FuelPHP
RUN docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install \
        gd \
        pdo \
        pdo_mysql \
        opcache \
        zip \
        mbstring \
        bcmath \
        tokenizer \
        json \
        xml

# Cài đặt Composer (copy từ image composer:2 để đảm bảo ổn định)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Thiết lập thư mục làm việc trong container
WORKDIR /var/www/html

# Sao chép toàn bộ source code của bạn vào container
COPY . .

# Cấp quyền thực thi cho file oil
RUN chmod +x oil

# Cài đặt dependencies PHP bằng Composer
RUN composer install --no-dev --ignore-platform-reqs

# Đặt quyền sở hữu cho các thư mục cache, logs và tmp để PHP-FPM có thể ghi
RUN chown -R www-data:www-data /var/www/html/fuel/app/cache \
    && chown -R www-data:www-data /var/www/html/fuel/app/logs \
    && chown -R www-data:www-data /var/www/html/fuel/app/tmp \
    && chmod -R 775 /var/www/html/fuel/app/cache \
    && chmod -R 775 /var/www/html/fuel/app/logs \
    && chmod -R 775 /var/www/html/fuel/app/tmp

# Lệnh để khởi động PHP-FPM khi container chạy
CMD ["php-fpm"]