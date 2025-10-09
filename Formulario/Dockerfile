# Imagen base: Node + PHP
FROM node:22

# Instalar PHP y extensiones necesarias + PostgreSQL
RUN apt-get update && \
    apt-get install -y \
        php php-cli php-mbstring php-xml php-bcmath php-pgsql libpq-dev unzip git curl && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Directorio de trabajo
WORKDIR /app

# Copiar todo el proyecto
COPY . .

# Instalar dependencias de PHP
RUN composer install --no-interaction --optimize-autoloader

# Instalar dependencias de Node
RUN npm install

# Exponer puertos
EXPOSE 8000 5173

# Comando para iniciar la app
CMD ["bash", "-c", "php artisan serve --host=0.0.0.0 --port=8000 & npm run dev"]

