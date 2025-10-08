# Imagen base
FROM node:22

# Directorio de trabajo
WORKDIR /app

# Copiar todo el proyecto al contenedor
COPY . .

# Ver qué hay en el contenedor 
RUN ls -la /app

# Instalar dependencias desde la carpeta correcta (raíz del proyecto)
RUN npm install

# Comando para iniciar la app
CMD ["npm", "run", "dev-all"]
