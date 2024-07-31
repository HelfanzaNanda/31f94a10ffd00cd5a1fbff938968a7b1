FROM php:8.2-fpm

RUN apt-get update && apt install -y git \
    libpq-dev \
    libzip-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libicu-dev \
    libxml2-dev \
    libssl-dev \
    pkg-config \
    wget \
    unzip \
    nano \
    cron \
    supervisor \
    libonig-dev \
    supervisor \
    tzdata

RUN rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install -j$(nproc) fileinfo iconv intl xml soap opcache pgsql pdo pdo_pgsql pdo_mysql mysqli exif zip\
    && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd\
    && docker-php-ext-install bcmath

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# RUN chmod +x /usr/local/bin/composer

# RUN curl -sL https://deb.nodesource.com/setup_10.x | bash - && \
#     apt install -y nodejs

#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENV TZDATA Asia/Jakarta

WORKDIR /var/www



COPY . .
#COPY ./docker/php/serve.sh /var/www/serve.sh


# CMD pwd && ls
# CMD pwd

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer update

RUN chown -R www-data:www-data /var/www


# RUN /usr/bin/supervisord

EXPOSE 9000
CMD ["php-fpm"]

# usr/bin/supervisord && php-fpm
# CMD ["supervisord", "-c", "/etc/supervisor/supervisord.conf"]

# RUN chmod -R ug+rwx /var/www/storage

#RUN chmod +x /var/www/serve.sh
# COPY docker/supervisord.conf /etc/supervisor/supervisord.conf

# EXPOSE 8000
# CMD php artisan serve --host=0.0.0.0 --port=8000

# Run PHP FPM
# CMD ["php-fpm"]
# USER $user
#CMD ["/var/www/init.sh"]
# CMD ["tail","-f","README.md"]
