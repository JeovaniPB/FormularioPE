# Imagen base con PHP
FROM php:8.2-cli

# Instalar Node.js y npm
RUN apt-get update && \
    apt-get install -y curl git unzip && \
    curl -fsSL https://deb.nodesource.com/setup_22.x | bash - && \
    apt-get install -y nodejs && \
    npm install -g npm@11.6.1

# Directorio de trabajo
WORKDIR /app

# Copiar todos los archivos
COPY . .

# Instalar dependencias de Laravel y Node
RUN composer install
RUN npm install

# Exponer puertos que Laravel y Vite usan
EXPOSE 8000 5173

# Comando para iniciar todo
CMD ["concurrently", "\"php artisan serve --host=0.0.0.0 --port=8000\"", "\"npm run dev\""]
