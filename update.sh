#!/bin/bash

echo "🚀 Iniciando actualización de la aplicación CIRA..."

# Colores para mensajes
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# Verificar que estamos en el directorio correcto
if [ ! -f "docker-compose.yml" ]; then
    echo -e "${RED}Error: No se encuentra docker-compose.yml${NC}"
    echo "Asegúrate de estar en el directorio del proyecto"
    exit 1
fi

# 1. Preservar APP_KEY antes de actualizar
echo -e "${YELLOW}🔐 Preservando configuración sensible...${NC}"
if [ -f "src/.env" ]; then
    CURRENT_APP_KEY=$(grep "^APP_KEY=" src/.env | cut -d '=' -f2)
    if [ ! -z "$CURRENT_APP_KEY" ]; then
        echo -e "${GREEN}✓ APP_KEY guardado${NC}"
    fi
fi

# 2. Descargar últimos cambios de GitHub
echo -e "${YELLOW}📥 Descargando cambios desde GitHub...${NC}"
git pull origin main

if [ $? -ne 0 ]; then
    echo -e "${RED}Error al descargar cambios de GitHub${NC}"
    exit 1
fi

# 3. Restaurar APP_KEY si se perdió o está vacío
if [ ! -z "$CURRENT_APP_KEY" ]; then
    CURRENT_KEY_IN_FILE=$(grep "^APP_KEY=" src/.env | cut -d '=' -f2)
    if [ -z "$CURRENT_KEY_IN_FILE" ] || [ "$CURRENT_KEY_IN_FILE" = "" ]; then
        sed -i "s|^APP_KEY=.*|APP_KEY=$CURRENT_APP_KEY|" src/.env
        echo -e "${GREEN}✓ APP_KEY restaurado${NC}"
    fi
fi

# 4. Verificar si hay cambios en dependencias
echo -e "${YELLOW}📦 Verificando dependencias...${NC}"

# Si cambió composer.json, instalar dependencias
if git diff HEAD@{1} --name-only | grep -q "src/composer.json"; then
    echo -e "${YELLOW}Instalando dependencias de Composer...${NC}"
    docker exec laravel_CIRA_prod composer install --no-dev --optimize-autoloader
fi

# Si cambió package.json, instalar y compilar assets
if git diff HEAD@{1} --name-only | grep -q "src/package.json"; then
    echo -e "${YELLOW}Instalando dependencias de npm...${NC}"
    docker exec laravel_CIRA_prod npm install
    echo -e "${YELLOW}Compilando assets...${NC}"
    docker exec laravel_CIRA_prod npm run build
fi

# 5. Ejecutar migraciones si hay nuevas
echo -e "${YELLOW}🗄️  Verificando migraciones...${NC}"
if git diff HEAD@{1} --name-only | grep -q "src/database/migrations"; then
    echo -e "${YELLOW}Ejecutando migraciones...${NC}"
    docker exec laravel_CIRA_prod php artisan migrate --force
fi

# 6. Limpiar cache de Laravel
echo -e "${YELLOW}🧹 Limpiando cache...${NC}"
docker exec laravel_CIRA_prod php artisan config:clear
docker exec laravel_CIRA_prod php artisan cache:clear
docker exec laravel_CIRA_prod php artisan view:clear
docker exec laravel_CIRA_prod php artisan route:clear

# 7. Optimizar para producción
echo -e "${YELLOW}⚡ Optimizando aplicación...${NC}"
docker exec laravel_CIRA_prod php artisan config:cache
docker exec laravel_CIRA_prod php artisan route:cache
docker exec laravel_CIRA_prod php artisan view:cache

# 8. Reiniciar contenedor de aplicación
echo -e "${YELLOW}🔄 Reiniciando aplicación...${NC}"
docker-compose restart app

# 9. Verificar estado
echo -e "${YELLOW}✅ Verificando estado de contenedores...${NC}"
sleep 3
docker ps --format "table {{.Names}}\t{{.Status}}" | grep laravel

# Obtener IP del servidor
SERVER_IP=$(curl -s ifconfig.me 2>/dev/null || echo "TU_IP")

echo ""
echo -e "${GREEN}✅ ¡Actualización completada exitosamente!${NC}"
echo ""
echo -e "${GREEN}🌐 Tu aplicación está disponible en: http://${SERVER_IP}${NC}"
echo ""
echo -e "${YELLOW}📝 Comandos útiles:${NC}"
echo "  - Ver logs: docker-compose logs -f"
echo "  - Ver estado: docker ps"
echo "  - Acceder al contenedor: docker exec -it laravel_CIRA_prod bash"
echo ""
