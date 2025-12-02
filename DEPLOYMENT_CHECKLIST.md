# Quick Deployment Checklist for swan-space.de

## Pre-Deployment (On Your Computer)

- [ ] Run `npm run build` to compile assets
- [ ] Run `composer install --optimize-autoloader --no-dev`
- [ ] Test the application locally
- [ ] Backup your local database: `php artisan db:seed > database_backup.sql`
- [ ] Create a `.env` file with production settings (use `.env.production.example` as template)

## IONOS Setup

### 1. Database Setup
- [ ] Login to IONOS Control Panel: https://www.ionos.de
- [ ] Navigate to: **Hosting → Databases → MySQL Databases**
- [ ] Create new database: `swanspace_db` (or similar)
- [ ] **Note these values:**
  - Database Host: `________________________________________`
  - Database Name: `________________________________________`
  - Database User: `________________________________________`
  - Database Password: `________________________________________`

### 2. Email Setup (Optional)
- [ ] Navigate to: **Email → Email Accounts**
- [ ] Create: `noreply@swan-space.de`
- [ ] **Note SMTP settings:**
  - SMTP Host: `smtp.ionos.de`
  - SMTP Port: `587`
  - Username: `________________________________________`
  - Password: `________________________________________`

### 3. SSL Certificate
- [ ] Navigate to: **Domains → swan-space.de → SSL**
- [ ] Enable **FREE SSL Certificate** (Let's Encrypt)
- [ ] Wait 24-48 hours for activation

## File Upload (Via FTP)

### FTP Connection Details
- Host: `ftp.swan-space.de` or `________________________________________`
- Username: `________________________________________`
- Password: `________________________________________`
- Port: 21 (FTP) or 22 (SFTP)

### Upload These Files/Folders:
- [ ] `app/`
- [ ] `bootstrap/`
- [ ] `config/`
- [ ] `database/`
- [ ] `lang/`
- [ ] `public/` (including `build/` and `images/`)
- [ ] `resources/`
- [ ] `routes/`
- [ ] `storage/` (create `logs/` folder inside)
- [ ] `vendor/` (if not running composer on server)
- [ ] `.env` (with production values)
- [ ] `.htaccess.root` → **rename to `.htaccess`** in root
- [ ] `artisan`
- [ ] `composer.json`
- [ ] `composer.lock`

### DO NOT Upload:
- [ ] ~~`node_modules/`~~ (too large, not needed)
- [ ] ~~`.git/`~~ (version control)
- [ ] ~~`tests/`~~ (optional)
- [ ] ~~`.env.example`~~ (don't overwrite production .env)

## Server Configuration (Via SSH or File Manager)

### 1. Update .env File
```bash
# Edit the .env file on server with your IONOS details:
APP_KEY=          # Run: php artisan key:generate
DB_HOST=          # From IONOS database settings
DB_DATABASE=      # Your database name
DB_USERNAME=      # Your database username
DB_PASSWORD=      # Your database password
MAIL_USERNAME=    # Your email address
MAIL_PASSWORD=    # Your email password
```

### 2. Set Permissions
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### 3. Run Setup Commands
If you have SSH access:
```bash
cd /path/to/swan-space.de
php artisan key:generate
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## DNS Configuration (If Not Done)

- [ ] Login to IONOS Domain Management
- [ ] Navigate to: **Domains → swan-space.de → DNS Settings**
- [ ] Ensure **A Record** points to your hosting IP
- [ ] Ensure **CNAME** for `www` points to `swan-space.de`

## Post-Deployment Testing

- [ ] Visit: `https://swan-space.de/en` (English version)
- [ ] Visit: `https://swan-space.de/de` (German version)
- [ ] Test admin panel: `https://swan-space.de/secret-dashboard`
  - Email: `info@swan-schule.com`
  - Password: `De0345127!`
- [ ] Check all images load (especially logo)
- [ ] Test contact form
- [ ] Check Facebook button in footer
- [ ] Test language switcher
- [ ] Test mobile menu
- [ ] Check all service cards
- [ ] Test all navigation links

## Troubleshooting

### If you see 500 Error:
1. Check `.env` file exists and has correct values
2. Run `php artisan key:generate` if APP_KEY is empty
3. Check file permissions (775 for storage and bootstrap/cache)
4. Check error logs in `storage/logs/laravel.log`

### If CSS/JS not loading:
1. Verify `public/build/` folder exists with compiled files
2. Check `.htaccess` in public directory
3. Run `php artisan cache:clear`

### If database connection fails:
1. Double-check database credentials in `.env`
2. Verify database user has full permissions
3. Test connection via IONOS phpMyAdmin

## Important URLs

- **Website:** https://swan-space.de
- **Admin Panel:** https://swan-space.de/secret-dashboard
- **IONOS Control Panel:** https://www.ionos.de/hosting
- **IONOS Help:** https://www.ionos.de/hilfe

## Admin Credentials

**Filament Admin Panel:**
- URL: https://swan-space.de/secret-dashboard
- Email: info@swan-schule.com
- Password: De0345127!

## Maintenance

### To Update the Site:
1. Upload changed files via FTP
2. Run via SSH: `php artisan optimize:clear`
3. If database changed: `php artisan migrate --force`

### To Update Content:
- Login to admin panel
- Edit sections via ContentSections, Services, or Testimonials resources

---

**Deployment Date:** _______________
**Completed By:** _______________
**Notes:** _______________________________________________________________
