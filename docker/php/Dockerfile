# Використовуємо офіційний образ PHP 8.3
FROM php:8.3-fpm

# Оновлюємо та встановлюємо необхідні системні залежності
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl zip pdo pdo_mysql bcmath sockets opcache

# Встановлюємо Node.js та npm через nvm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Перевіряємо версії Node.js та npm, щоб переконатися, що вони встановлені
RUN node -v && npm -v

# Встановлення Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Чистка кешу apt
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Встановлення прав на виконання Composer
RUN chmod +x /usr/bin/composer

# Вказуємо робочу директорію
WORKDIR /var/www/html

# Відкриваємо порт для прослуховування (не обов'язково, тільки для dev-середовища)
EXPOSE 9000

# Запуск PHP-FPM
CMD ["php-fpm"]