FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip \
    zip \
    libpng-dev \
    libzip-dev

RUN docker-php-ext-install pdo pdo_mysql mysqli gd

# Install Node.js 22
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN npm install
RUN npm run build

CMD php artisan serve --host=0.0.0.0 --port=$PORT