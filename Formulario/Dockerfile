# Imagen base
FROM node:22

# Directorio de trabajo
WORKDIR /app

# Copiar todo
COPY . .

# Ver qué hay en el contenedor
RUN ls -la /app
RUN ls -la /app/Formulario

# Instalar dependencias desde la carpeta correcta
WORKDIR /app/Formulario
RUN npm install

# Volver al directorio raíz del contenedor
WORKDIR /app

# Comando para iniciar la app
CMD ["npm", "run", "dev-all"]
