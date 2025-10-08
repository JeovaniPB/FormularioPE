# Imagen base: Node + PHP
FROM node:22

# Instalar PHP y extensiones necesarias
RUN apt-get update && \
    apt-get install -y php php-cli php-mbstring php-xml php-bcmath unzip git curl && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Directorio de trabajo
WORKDIR /app

# Copiar todo el proyecto al contenedor
COPY . .

RUN ls -la /app

# Instalar dependencias de Node
RUN npm install

# Exponer los puertos que usan Laravel y Vite
EXPOSE 8000 5173

# Comando para iniciar la app
CMD ["npx", "concurrently", "php artisan serve --host=0.0.0.0 --port=8000", "npm run dev"]
