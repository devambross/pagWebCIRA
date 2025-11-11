#!/bin/bash

echo "🚀 Iniciando despliegue de Laravel en Oracle Cloud..."

# Colores para mensajes
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# Verificar que estamos en el directorio correcto
if [ ! -f "docker-compose.prod.yml" ]; then
    echo -e "${RED}Error: No se encuentra docker-compose.prod.yml${NC}"
    exit 1
fi

# 1. Detener contenedores existentes
echo -e "${YELLOW}📦 Deteniendo contenedores existentes...${NC}"
docker-compose -f docker-compose.prod.yml down

# 2. Copiar archivo .env de producción
echo -e "${YELLOW}⚙️  Configurando variables de entorno...${NC}"
if [ ! -f "src/.env" ]; then
    cp src/.env.production src/.env
    echo -e "${GREEN}✓ Archivo .env creado${NC}"
else
    echo -e "${YELLOW}⚠️  El archivo .env ya existe. Asegúrate de que esté configurado correctamente.${NC}"
fi

# 3. Construir imágenes
echo -e "${YELLOW}🔨 Construyendo imágenes Docker...${NC}"
docker-compose -f docker-compose.prod.yml build --no-cache

# 4. Levantar contenedores
echo -e "${YELLOW}🚀 Levantando contenedores...${NC}"
docker-compose -f docker-compose.prod.yml up -d

# 5. Esperar a que MySQL esté listo
echo -e "${YELLOW}⏳ Esperando a que MySQL esté listo...${NC}"
sleep 15

# 6. Instalar dependencias de Composer
echo -e "${YELLOW}📚 Instalando dependencias de Composer...${NC}"
docker exec laravel_CIRA_prod composer install --no-dev --optimize-autoloader

# 7. Generar APP_KEY si no existe
echo -e "${YELLOW}🔑 Generando APP_KEY...${NC}"
docker exec laravel_CIRA_prod php artisan key:generate

# 8. Ejecutar migraciones
echo -e "${YELLOW}🗄️  Ejecutando migraciones de base de datos...${NC}"
docker exec laravel_CIRA_prod php artisan migrate --force

# 9. Optimizar Laravel
echo -e "${YELLOW}⚡ Optimizando Laravel...${NC}"
docker exec laravel_CIRA_prod php artisan config:cache
docker exec laravel_CIRA_prod php artisan route:cache
docker exec laravel_CIRA_prod php artisan view:cache

# 10. Establecer permisos
echo -e "${YELLOW}🔐 Configurando permisos...${NC}"
docker exec laravel_CIRA_prod chmod -R 775 storage bootstrap/cache
docker exec laravel_CIRA_prod chown -R www-data:www-data storage bootstrap/cache

# 11. Compilar assets (si usas Vite)
echo -e "${YELLOW}🎨 Compilando assets...${NC}"
if [ -f "src/package.json" ]; then
    docker exec laravel_CIRA_prod npm install
    docker exec laravel_CIRA_prod npm run build
fi

echo -e "${GREEN}✅ ¡Despliegue completado exitosamente!${NC}"
echo -e "${GREEN}🌐 Tu aplicación está disponible en: http://$(curl -s ifconfig.me)${NC}"
echo ""
echo -e "${YELLOW}📝 Comandos útiles:${NC}"
echo "  - Ver logs: docker-compose -f docker-compose.prod.yml logs -f"
echo "  - Reiniciar: docker-compose -f docker-compose.prod.yml restart"
echo "  - Detener: docker-compose -f docker-compose.prod.yml down"
