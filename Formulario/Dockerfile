# Imagen base
FROM node:22

# Definir directorio de trabajo dentro del contenedor
WORKDIR /app

COPY Formulario/package*.json ./

# Instalar dependencias
RUN npm install

# Copiar el resto del proyecto
COPY . .

# Comando para iniciar la app
CMD ["npm", "run", "dev-all"]
