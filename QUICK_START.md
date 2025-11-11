# 🚀 Guía Rápida de Despliegue - Oracle Cloud

## Archivos Importantes Creados

1. **`.env.production`** - Variables de entorno para producción
2. **`docker-compose.prod.yml`** - Configuración Docker optimizada para producción
3. **`nginx/default.prod.conf`** - Configuración Nginx con soporte SSL
4. **`deploy.sh`** - Script automatizado de despliegue
5. **`DEPLOYMENT.md`** - Documentación completa paso a paso

## 📝 Pasos Resumidos

### 1. En Oracle Cloud Console
- Crea una VM Ubuntu 22.04
- Configura Security List (puertos 22, 80, 443)
- Guarda tu clave SSH

### 2. En tu Servidor (SSH)
```bash
# Conectar
ssh -i tu-clave.key ubuntu@TU_IP

# Instalar Docker
sudo apt update && sudo apt install docker.io docker-compose git -y
sudo usermod -aG docker $USER

# Clonar proyecto
git clone https://github.com/devambross/pagWebCIRA.git
cd pagWebCIRA

# Configurar
cp src/.env.production src/.env
nano src/.env  # Editar APP_URL y contraseñas

# Desplegar
chmod +x deploy.sh
./deploy.sh
```

### 3. Acceder
```
http://TU_IP_PUBLICA
```

## ⚙️ Configuraciones a Personalizar

### En `src/.env`:
- `APP_URL` → Tu IP pública o dominio
- `DB_PASSWORD` → Contraseña segura
- Configuración de email si lo usas

### En `nginx/default.prod.conf`:
- `server_name` → Tu IP o dominio

### En `docker-compose.prod.yml`:
- Contraseñas de MySQL (si deseas cambiarlas)

## 🔧 Comandos Útiles

```bash
# Ver estado
docker ps

# Ver logs
docker-compose logs -f

# Reiniciar
docker-compose restart

# Actualizar código
git pull && ./deploy.sh

# Acceder al contenedor
docker exec -it laravel_CIRA_prod bash
```

## 📖 Documentación Completa
Ver **DEPLOYMENT.md** para instrucciones detalladas paso a paso.

## 🆘 Problemas Comunes

**No puedo acceder desde el navegador**
- Verifica Security List en OCI
- Ejecuta: `sudo iptables -I INPUT -p tcp --dport 80 -j ACCEPT`
- Guarda reglas: `sudo apt install iptables-persistent -y`

**Error 500**
```bash
docker exec laravel_CIRA_prod chmod -R 775 storage bootstrap/cache
docker exec laravel_CIRA_prod php artisan cache:clear
```

**Base de datos no conecta**
- Verifica que las contraseñas en `.env` coincidan con `docker-compose.yml`
