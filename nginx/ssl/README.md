# Configuración de SSL para Oracle Cloud
# Este directorio almacenará los certificados SSL

## Para obtener certificados SSL gratuitos con Let's Encrypt:

1. Detén nginx temporalmente:
   ```bash
   docker-compose stop web
   ```

2. Instala Certbot:
   ```bash
   sudo apt install certbot -y
   ```

3. Obtén el certificado:
   ```bash
   sudo certbot certonly --standalone -d tudominio.com -d www.tudominio.com
   ```

4. Copia los certificados aquí:
   ```bash
   sudo cp /etc/letsencrypt/live/tudominio.com/fullchain.pem ./
   sudo cp /etc/letsencrypt/live/tudominio.com/privkey.pem ./
   sudo chmod 644 ./*
   ```

5. Reinicia nginx:
   ```bash
   docker-compose restart web
   ```

## Renovación automática

Agrega un cron job:
```bash
sudo crontab -e
```

Agrega esta línea:
```
0 */12 * * * certbot renew --quiet && docker-compose restart web
```
