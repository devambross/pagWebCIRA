# 🚀 Guía de Despliegue en Oracle Cloud Infrastructure (OCI)

Esta guía te llevará paso a paso para desplegar tu aplicación Laravel en Oracle Cloud.

## 📋 Pre-requisitos

- Cuenta de Oracle Cloud (Free Tier disponible)
- Git instalado localmente
- Dominio (opcional, puedes usar la IP pública)

---

## 🖥️ PASO 1: Crear y Configurar Instancia en OCI

### 1.1 Crear Compute Instance

1. Ingresa a [Oracle Cloud Console](https://cloud.oracle.com)
2. Ve a **Compute > Instances > Create Instance**
3. Configura:
   - **Name:** `laravel-cira-server`
   - **Image:** Ubuntu 22.04 (Canonical)
   - **Shape:** VM.Standard.E2.1.Micro (Always Free)
   - **Network:** Usa la VCN predeterminada
   - **SSH Keys:** Genera o sube tu clave pública SSH
4. Descarga la **clave privada** (.key)
5. Crea la instancia y anota la **IP pública**

### 1.2 Configurar Security List

1. Ve a **Networking > Virtual Cloud Networks**
2. Selecciona tu VCN > Security Lists > Default Security List
3. Agrega **Ingress Rules:**

```
Puerto 22  (SSH)   - Source: 0.0.0.0/0
Puerto 80  (HTTP)  - Source: 0.0.0.0/0
Puerto 443 (HTTPS) - Source: 0.0.0.0/0
```

### 1.3 Configurar Firewall en Ubuntu

```bash
# Conectarse a la instancia
ssh -i ruta/a/tu-clave.key ubuntu@TU_IP_PUBLICA

# Configurar firewall (agregar reglas)
sudo iptables -I INPUT -p tcp --dport 80 -j ACCEPT
sudo iptables -I INPUT -p tcp --dport 443 -j ACCEPT

# Guardar reglas permanentemente
sudo apt install iptables-persistent -y
# Durante la instalación, confirma "Yes" para guardar las reglas actuales

# O si ya está instalado, guarda manualmente:
sudo netfilter-persistent save
```

---

## 🔧 PASO 2: Instalar Dependencias en el Servidor

```bash
# Actualizar sistema
sudo apt update && sudo apt upgrade -y

# Instalar Docker
sudo apt install docker.io -y
sudo systemctl start docker
sudo systemctl enable docker

# Instalar Docker Compose
sudo curl -L "https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose

# Verificar instalación
docker --version
docker-compose --version

# Agregar usuario al grupo docker (evitar usar sudo)
sudo usermod -aG docker $USER
newgrp docker

# Instalar Git
sudo apt install git -y
```

---

## 📦 PASO 3: Clonar y Configurar el Proyecto

### 3.1 Clonar el Repositorio

```bash
# En el servidor
cd ~
git clone https://github.com/devambross/pagWebCIRA.git
cd pagWebCIRA
```

### 3.2 Configurar Variables de Entorno

```bash
# Copiar archivo de producción
cp src/.env.production src/.env

# Editar configuraciones importantes
nano src/.env
```

**Modificar estas líneas en el archivo `.env`:**

```env
APP_URL=http://TU_IP_PUBLICA_O_DOMINIO

# Cambiar contraseñas seguras
DB_PASSWORD=TU_PASSWORD_SEGURA_AQUI

# Si tienes dominio configurado
APP_URL=http://tudominio.com
```

### 3.3 Actualizar Configuración de Nginx

```bash
# Editar configuración de nginx
nano nginx/default.prod.conf
```

Cambiar `server_name` por tu IP o dominio:
```nginx
server_name TU_IP_PUBLICA;  # o tudominio.com
```

### 3.4 Actualizar docker-compose para producción

```bash
# Usar el archivo de producción como predeterminado
cp docker-compose.prod.yml docker-compose.yml

# Editar si es necesario
nano docker-compose.yml
```

Actualizar la referencia del archivo nginx:
```yaml
volumes:
  - ./nginx/default.prod.conf:/etc/nginx/conf.d/default.conf
```

---

## 🚀 PASO 4: Ejecutar el Despliegue

### 4.1 Dar permisos al script de deploy

```bash
chmod +x deploy.sh
```

### 4.2 Ejecutar despliegue automatizado

```bash
./deploy.sh
```

Este script automáticamente:
- ✅ Construye las imágenes Docker
- ✅ Levanta los contenedores
- ✅ Instala dependencias de Composer
- ✅ Genera APP_KEY
- ✅ Ejecuta migraciones
- ✅ Optimiza Laravel
- ✅ Configura permisos

### 4.3 Verificar que todo esté funcionando

```bash
# Ver estado de contenedores
docker ps

# Ver logs en tiempo real
docker-compose logs -f

# Verificar conectividad a MySQL
docker exec laravel_CIRA_prod php artisan migrate:status
```

---

## 🌐 PASO 5: Acceder a tu Aplicación

Abre tu navegador y ve a:
```
http://TU_IP_PUBLICA
```

¡Tu aplicación Laravel debería estar en línea! 🎉

---

## 🔒 PASO 6: Configurar SSL/HTTPS (Opcional pero Recomendado)

### 6.1 Instalar Certbot

```bash
sudo apt install certbot python3-certbot-nginx -y
```

### 6.2 Obtener Certificado SSL

```bash
# Primero, detén nginx temporalmente
docker-compose stop web

# Obtén el certificado (requiere que tengas un dominio apuntando a tu IP)
sudo certbot certonly --standalone -d tudominio.com -d www.tudominio.com

# Los certificados se guardarán en /etc/letsencrypt/live/tudominio.com/
```

### 6.3 Copiar Certificados al Proyecto

```bash
# Crear directorio para SSL
mkdir -p nginx/ssl

# Copiar certificados
sudo cp /etc/letsencrypt/live/tudominio.com/fullchain.pem nginx/ssl/
sudo cp /etc/letsencrypt/live/tudominio.com/privkey.pem nginx/ssl/
sudo chmod 644 nginx/ssl/*
```

### 6.4 Actualizar Configuración de Nginx

Edita `nginx/default.prod.conf` y descomenta la sección SSL, luego:

```bash
docker-compose restart web
```

### 6.5 Renovación Automática

```bash
# Agregar cron job para renovar automáticamente
sudo crontab -e

# Agregar esta línea (renueva cada 12 horas)
0 */12 * * * certbot renew --quiet && docker-compose restart web
```

---

## 📝 Comandos Útiles

### Gestión de Contenedores

```bash
# Ver logs
docker-compose logs -f

# Reiniciar servicios
docker-compose restart

# Detener todo
docker-compose down

# Reconstruir imágenes
docker-compose build --no-cache

# Acceder al contenedor de Laravel
docker exec -it laravel_CIRA_prod bash
```

### Comandos de Laravel

```bash
# Ejecutar migraciones
docker exec laravel_CIRA_prod php artisan migrate

# Limpiar caché
docker exec laravel_CIRA_prod php artisan cache:clear
docker exec laravel_CIRA_prod php artisan config:clear
docker exec laravel_CIRA_prod php artisan route:clear
docker exec laravel_CIRA_prod php artisan view:clear

# Optimizar para producción
docker exec laravel_CIRA_prod php artisan optimize
```

### Actualizar Código

```bash
# En el servidor
cd ~/pagWebCIRA
git pull origin main
./deploy.sh
```

---

## 🔍 Solución de Problemas

### Error: "500 Internal Server Error"

```bash
# Verificar permisos
docker exec laravel_CIRA_prod chmod -R 775 storage bootstrap/cache
docker exec laravel_CIRA_prod chown -R www-data:www-data storage bootstrap/cache

# Limpiar y reoptimizar
docker exec laravel_CIRA_prod php artisan config:clear
docker exec laravel_CIRA_prod php artisan cache:clear
docker exec laravel_CIRA_prod php artisan optimize
```

### Error: "Connection refused" a MySQL

```bash
# Verificar que MySQL esté corriendo
docker ps | grep mysql

# Reiniciar contenedor de base de datos
docker-compose restart db

# Verificar logs
docker logs laravel_db_prod
```

### No se puede acceder desde el navegador

```bash
# 1. Verificar Security List en OCI Console
# Asegúrate de tener regla de ingress para puerto 80

# 2. Configurar firewall de Ubuntu
sudo iptables -I INPUT -p tcp --dport 80 -j ACCEPT
sudo iptables -I INPUT -p tcp --dport 443 -j ACCEPT
sudo netfilter-persistent save

# 3. Verificar que nginx esté escuchando en el puerto 80
docker exec laravel_nginx_prod netstat -tuln | grep 80

# 4. Verificar que los contenedores estén corriendo
docker ps

# 5. Ver logs de nginx
docker logs laravel_nginx_prod
```

---

## 📊 Monitoreo y Mantenimiento

### Logs

```bash
# Ver todos los logs
docker-compose logs

# Logs de Laravel
docker exec laravel_CIRA_prod tail -f storage/logs/laravel.log

# Logs de Nginx
docker logs laravel_nginx_prod -f
```

### Backups de Base de Datos

```bash
# Crear backup
docker exec laravel_db_prod mysqldump -u laravel -p laravel > backup_$(date +%Y%m%d).sql

# Restaurar backup
docker exec -i laravel_db_prod mysql -u laravel -p laravel < backup_20241111.sql
```

---

## 📚 Recursos Adicionales

- [Documentación de Laravel](https://laravel.com/docs)
- [Oracle Cloud Documentation](https://docs.oracle.com/en-us/iaas/Content/home.htm)
- [Docker Compose Documentation](https://docs.docker.com/compose/)

---

## ✅ Checklist de Despliegue

- [ ] Instancia de OCI creada
- [ ] Security List configurado (puertos 22, 80, 443)
- [ ] Docker y Docker Compose instalados
- [ ] Repositorio clonado
- [ ] Archivo `.env` configurado correctamente
- [ ] Script `deploy.sh` ejecutado
- [ ] Aplicación accesible desde el navegador
- [ ] SSL configurado (opcional)
- [ ] Backups programados (opcional)

---

**¡Felicidades! Tu aplicación Laravel está ahora en producción en Oracle Cloud.** 🎉
