FROM php:8.2-cli

WORKDIR /app

# مكتبات النظام + Node.js لبناء ملفات CSS/JS
RUN apt-get update && apt-get install -y \
    unzip zip git curl libpq-dev libicu-dev libzip-dev \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql intl zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# تثبيت حزم PHP
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist --no-interaction

# تثبيت حزم Node
COPY package.json package-lock.json ./
RUN npm install

# نسخ المشروع
COPY . .

RUN composer dump-autoload --optimize --no-dev --no-scripts \
    && php artisan package:discover --ansi \
    && npm run build \
    && rm -rf node_modules

EXPOSE 8080

# عند التشغيل: start.sh يرحّل قاعدة البيانات ويشغّل السيرفر
CMD ["sh", "start.sh"]
