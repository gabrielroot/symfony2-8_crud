FROM php:7.1-fpm

# Copy existing application directory contents
#COPY . /app

# Set working directory
WORKDIR /var/www/app

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libfontconfig1 libxrender1 \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libwebp-dev libjpeg62-turbo-dev libpng-dev libxpm-dev \
    libfreetype6 \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    wget

RUN wget https://github.com/wkhtmltopdf/wkhtmltopdf/releases/download/0.12.4/wkhtmltox-0.12.4_linux-generic-amd64.tar.xz && \
    tar -xvf wkhtmltox-0.12.4_linux-generic-amd64.tar.xz && \
    cd wkhtmltox/bin/ && \
    mv wkhtmltopdf /usr/bin/wkhtmltopdf && \
    mv wkhtmltoimage /usr/bin/wkhtmltoimage && \
    chmod a+x /usr/bin/wkhtmltopdf && \
    chmod a+x /usr/bin/wkhtmltoimage

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl sockets

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=1.8.5

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory permissions
#COPY --chown=www:www ../../app /var/www/app

RUN chown www:www-data -R /var/www/app
RUN chmod 755 -R /var/www/app
RUN chmod g+s -R  /var/www/app

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]