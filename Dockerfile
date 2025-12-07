FROM php:8.3-fpm

# Cria um grupo e usuário com o UID e GID especificados
ARG UID=1000
ARG GID=1000

# Instala dependências e extensões PHP necessárias
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    dos2unix \
    && docker-php-ext-install pdo_mysql mbstring bcmath pdo_pgsql

# Cria um grupo e um usuário para rodar a aplicação
RUN groupadd -g $GID --non-unique laravel
RUN useradd -u $UID -g laravel --shell /bin/bash --create-home laravel

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configurações adicionais
RUN echo "memory_limit=2G" > /usr/local/etc/php/conf.d/memory-limit.ini

# Copia o script de entrypoint e o torna executável
COPY ./docker/app/entrypoint.sh /usr/local/bin/entrypoint.sh

# Converte o arquivo para o formato Unix e o torna executável
RUN dos2unix /usr/local/bin/entrypoint.sh && chmod +x /usr/local/bin/entrypoint.sh

# Define o entrypoint
ENTRYPOINT ["entrypoint.sh"]

# Define o diretório de trabalho
WORKDIR /var/www/backend

# Muda para o usuário recém-criado
#USER laravel

# Expõe a porta 9000 para o PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]