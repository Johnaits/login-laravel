FROM php:8.3-fpm

# Instala dependências e extensões PHP necessárias
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring bcmath

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configurações adicionais
RUN echo "memory_limit=2G" > /usr/local/etc/php/conf.d/memory-limit.ini

# Define o diretório de trabalho
WORKDIR /var/www/backend

# Ajusta permissões
RUN chown -R www-data:www-data /var/www
