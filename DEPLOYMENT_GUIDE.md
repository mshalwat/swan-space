# Deployment Guide for IONOS (swan-space.de)

## Prerequisites
- IONOS hosting account with SSH access
- Domain: swan-space.de
- FTP/SFTP credentials from IONOS
- Database credentials from IONOS

## Step 1: Prepare Your Application

### 1.1 Update Environment Configuration
Update your `.env` file for production:

```env
APP_NAME="SwanSpace"
APP_ENV=production
APP_KEY=base64:YOUR_PRODUCTION_KEY_HERE
APP_DEBUG=false
APP_TIMEZONE=UTC
APP_URL=https://swan-space.de

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=YOUR_IONOS_DB_HOST
DB_PORT=3306
DB_DATABASE=YOUR_IONOS_DATABASE_NAME
DB_USERNAME=YOUR_IONOS_DB_USERNAME
DB_PASSWORD=YOUR_IONOS_DB_PASSWORD

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=swan-space.de

CACHE_DRIVER=file
QUEUE_CONNECTION=database

MAIL_MAILER=smtp
MAIL_HOST=smtp.ionos.de
MAIL_PORT=587
MAIL_USERNAME=your-email@swan-space.de
MAIL_PASSWORD=your-email-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@swan-space.de
MAIL_FROM_NAME="SwanSpace"
```

### 1.2 Build Production Assets
```bash
npm run build
```

### 1.3 Optimize Laravel
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Step 2: IONOS Configuration

### 2.1 .htaccess for Root Directory
Create/update `.htaccess` in your web root to point to Laravel's public directory:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

### 2.2 Public Directory .htaccess
The `public/.htaccess` file should already exist with Laravel defaults. Ensure it has:

```apache
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>

# Force HTTPS
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

## Step 3: Upload Files to IONOS

### Option A: Using FTP/SFTP (FileZilla, Cyberduck)

1. **Connect to IONOS FTP**
   - Host: ftp.swan-space.de (or IP provided by IONOS)
   - Username: Your IONOS FTP username
   - Password: Your IONOS FTP password
   - Port: 21 (FTP) or 22 (SFTP)

2. **Upload ALL files EXCEPT:**
   - `node_modules/` (too large, not needed)
   - `.git/` (version control, not needed)
   - `.env` (upload separately with production values)
   - `storage/logs/*` (will be recreated)

3. **Directory Structure on Server:**
   ```
   /
   ├── .htaccess (root redirects to public)
   ├── app/
   ├── bootstrap/
   ├── config/
   ├── database/
   ├── public/
   │   ├── .htaccess
   │   ├── index.php
   │   ├── build/
   │   └── images/
   ├── resources/
   ├── routes/
   ├── storage/
   ├── vendor/
   ├── .env (production settings)
   ├── artisan
   ├── composer.json
   └── composer.lock
   ```

### Option B: Using SSH/Git (if available)

```bash
# SSH into your IONOS server
ssh your-username@swan-space.de

# Clone your repository
git clone YOUR_REPO_URL swan-space
cd swan-space

# Install dependencies
composer install --optimize-autoloader --no-dev

# Set permissions
chmod -R 755 storage bootstrap/cache
```

## Step 4: Set Directory Permissions

Via FTP or SSH, set these permissions:

```bash
# Storage and cache directories
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# Make sure web server can write
chown -R www-data:www-data storage bootstrap/cache
# Or for IONOS shared hosting:
chmod -R 777 storage
chmod -R 777 bootstrap/cache
```

## Step 5: Configure Database

1. **Create Database in IONOS Panel**
   - Login to IONOS Control Panel
   - Go to: Databases > MySQL Databases
   - Create new database: `swanspace_db`
   - Note the hostname, username, and password

2. **Import Database**

   Via SSH:
   ```bash
   php artisan migrate --force
   php artisan db:seed --force
   ```

   Via phpMyAdmin (IONOS provides this):
   - Export your local database
   - Import to IONOS database via phpMyAdmin

## Step 6: Configure Domain DNS

In IONOS DNS Management:

1. **A Record**
   ```
   Type: A
   Host: @
   Value: YOUR_IONOS_SERVER_IP
   TTL: 3600
   ```

2. **WWW Subdomain**
   ```
   Type: CNAME
   Host: www
   Value: swan-space.de
   TTL: 3600
   ```

3. **SSL Certificate**
   - IONOS provides free SSL (Let's Encrypt)
   - Enable SSL in IONOS Control Panel under Domain settings
   - May take 24-48 hours to propagate

## Step 7: Post-Deployment Commands

Via SSH (or create a deployment script):

```bash
# Navigate to project
cd /path/to/swan-space

# Update dependencies
composer install --optimize-autoloader --no-dev

# Clear and cache
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Rebuild caches
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations
php artisan migrate --force

# Link storage
php artisan storage:link

# Set permissions
chmod -R 775 storage bootstrap/cache
```

## Step 8: Update URLs

Update these files to use your domain:

1. **config/app.php** - Should read from .env
2. **.env** - Set `APP_URL=https://swan-space.de`
3. **Filament Admin Panel** - Access at: `https://swan-space.de/secret-dashboard`

## Step 9: Testing

1. Visit: `https://swan-space.de/en`
2. Visit: `https://swan-space.de/de`
3. Test admin panel: `https://swan-space.de/secret-dashboard`
   - Email: info@swan-schule.com
   - Password: De0345127!

## Common Issues & Solutions

### Issue 1: 500 Internal Server Error
**Solution:**
- Check `.env` file exists and has correct values
- Run: `php artisan key:generate` if APP_KEY is missing
- Check file permissions on `storage/` and `bootstrap/cache/`
- Enable debug temporarily: `APP_DEBUG=true` to see error

### Issue 2: CSS/JS Not Loading
**Solution:**
- Ensure `public/build/` directory exists with compiled assets
- Check `.htaccess` is present in `public/`
- Clear cache: `php artisan cache:clear`
- Run: `npm run build` before deployment

### Issue 3: Database Connection Error
**Solution:**
- Verify database credentials in `.env`
- Check IONOS database hostname (often not localhost)
- Ensure database user has proper privileges
- Test connection via phpMyAdmin

### Issue 4: Blank Page
**Solution:**
- Check PHP version (Laravel 12 requires PHP 8.2+)
- Verify all Composer dependencies installed
- Check storage permissions
- Look at error logs in `storage/logs/`

### Issue 5: Assets 404 Error
**Solution:**
- Run `php artisan storage:link`
- Check `public/images/` directory exists
- Verify `public/build/manifest.json` exists

## Deployment Checklist

- [ ] `.env` file configured for production
- [ ] `APP_DEBUG=false`
- [ ] `APP_URL=https://swan-space.de`
- [ ] Database configured and imported
- [ ] `composer install --no-dev` run
- [ ] `npm run build` completed
- [ ] All files uploaded (except node_modules, .git)
- [ ] Directory permissions set (775 or 777)
- [ ] `.htaccess` files in place
- [ ] Domain DNS configured
- [ ] SSL certificate enabled
- [ ] Admin panel accessible
- [ ] Both `/en` and `/de` routes working
- [ ] Facebook link in footer working
- [ ] SwanSpace logo displaying

## Maintenance Commands

### Update Application
```bash
git pull origin main
composer install --optimize-autoloader --no-dev
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Clear All Caches
```bash
php artisan optimize:clear
```

### View Logs
```bash
tail -f storage/logs/laravel.log
```

## Support Contacts

- **IONOS Support:** https://www.ionos.de/hilfe
- **Laravel Documentation:** https://laravel.com/docs
- **Your Admin Panel:** https://swan-space.de/secret-dashboard

---

**Deployment Date:** {{ date('Y-m-d') }}
**Domain:** swan-space.de
**Hosting:** IONOS.de
