# 🔄 Guía de Actualización de la Aplicación

Esta guía te ayudará a actualizar tu aplicación cuando hagas cambios.

---

## 📝 **Flujo de Trabajo Completo**

### **PASO 1: Hacer cambios en tu PC (Local)**

```powershell
# 1. Editar archivos en VS Code
# - Vistas: src/resources/views/
# - Rutas: src/routes/web.php
# - Controladores: src/app/Http/Controllers/
# - Estilos: src/resources/css/
# - JavaScript: src/resources/js/

# 2. Probar localmente (opcional)
cd src
php artisan serve

# 3. Ver qué archivos cambiaron
git status

# 4. Agregar cambios
git add .

# 5. Hacer commit con mensaje descriptivo
git commit -m "Descripción de los cambios realizados"

# 6. Subir a GitHub
git push origin main
```

---

### **PASO 2: Actualizar en el servidor**

**Opción A: Usando el script automático (Recomendado) 🚀**

```bash
# Conectar por SSH/PuTTY
ssh -i tu-clave.key ubuntu@TU_IP

# Ir al directorio del proyecto
cd ~/pagWebCIRA

# Ejecutar script de actualización
./update.sh
```

**Opción B: Manual**

```bash
# 1. Descargar cambios
git pull origin main

# 2. Limpiar cache
docker exec laravel_CIRA_prod php artisan cache:clear
docker exec laravel_CIRA_prod php artisan view:clear
docker exec laravel_CIRA_prod php artisan config:clear

# 3. Reiniciar
docker-compose restart app

# 4. Verificar
curl localhost
```

---

## 🎯 **Casos Específicos**

### **Agregar una nueva página:**

**Local:**
1. Crear vista: `src/resources/views/mi-pagina.blade.php`
2. Agregar ruta en `src/routes/web.php`:
   ```php
   Route::get('/mi-pagina', function () {
       return view('mi-pagina');
   });
   ```
3. Commit y push

**Servidor:**
```bash
cd ~/pagWebCIRA
./update.sh
```

---

### **Modificar estilos CSS:**

**Local:**
1. Editar `src/resources/css/app.css`
2. Commit y push

**Servidor:**
```bash
cd ~/pagWebCIRA
git pull origin main
docker exec laravel_CIRA_prod npm run build
docker-compose restart app
```

---

### **Agregar nueva migración de base de datos:**

**Local:**
1. Crear migración:
   ```bash
   php artisan make:migration create_nuevatabla_table
   ```
2. Editar archivo en `src/database/migrations/`
3. Commit y push

**Servidor:**
```bash
cd ~/pagWebCIRA
git pull origin main
docker exec laravel_CIRA_prod php artisan migrate --force
```

---

### **Instalar nuevo paquete de Composer:**

**Local:**
1. Agregar paquete:
   ```bash
   composer require nombre/paquete
   ```
2. Commit `composer.json` y `composer.lock`
3. Push

**Servidor:**
```bash
cd ~/pagWebCIRA
git pull origin main
docker exec laravel_CIRA_prod composer install --no-dev
docker-compose restart app
```

---

### **Modificar variables de entorno:**

**Solo en el servidor:**
```bash
# Editar .env
nano src/.env

# Aplicar cambios
docker exec laravel_CIRA_prod php artisan config:clear
docker-compose restart app
```

⚠️ **NO subir el archivo `.env` a GitHub (contiene información sensible)**

---

## 🆘 **Solución de Problemas**

### **Los cambios no se reflejan:**

```bash
# Limpiar TODO el cache
docker exec laravel_CIRA_prod php artisan cache:clear
docker exec laravel_CIRA_prod php artisan config:clear
docker exec laravel_CIRA_prod php artisan view:clear
docker exec laravel_CIRA_prod php artisan route:clear

# Reiniciar contenedores
docker-compose restart

# Limpiar cache del navegador (Ctrl + Shift + R)
```

### **Error después de actualizar:**

```bash
# Ver logs
docker logs laravel_CIRA_prod -f

# Ver logs de Laravel
docker exec laravel_CIRA_prod tail -50 storage/logs/laravel.log

# Revertir cambios si es necesario
git reset --hard HEAD~1
docker-compose restart
```

### **Backup antes de actualizar (recomendado):**

```bash
# Backup de base de datos
docker exec laravel_db_prod mysqldump -u laravel -plaravel_secure_password_2024 laravel > backup_$(date +%Y%m%d_%H%M%S).sql

# Backup de archivos
tar -czf backup_files_$(date +%Y%m%d_%H%M%S).tar.gz src/
```

---

## ✅ **Checklist de Actualización**

- [ ] Hacer cambios en local
- [ ] Probar cambios localmente
- [ ] Hacer commit con mensaje descriptivo
- [ ] Push a GitHub
- [ ] Conectar al servidor
- [ ] Ejecutar `./update.sh`
- [ ] Verificar en el navegador
- [ ] Revisar logs si hay errores

---

## 📚 **Recursos Adicionales**

- **Ver estado del servidor:**
  ```bash
  docker ps
  docker-compose logs -f
  ```

- **Acceder al contenedor:**
  ```bash
  docker exec -it laravel_CIRA_prod bash
  ```

- **Monitorear uso de recursos:**
  ```bash
  docker stats
  ```

---

**Recuerda:** Siempre prueba tus cambios localmente antes de subirlos a producción. 🚀
