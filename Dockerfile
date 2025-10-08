# Imagen base
FROM node:22

# Definir directorio de trabajo
WORKDIR /app

# Copiar package.json y package-lock.json 
COPY package*.json ./

# Instalar dependencias
RUN npm install

# Copiar el resto del proyecto
COPY . .

# Comando para iniciar la app
CMD ["npm", "start"]
