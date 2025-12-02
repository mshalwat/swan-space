# 🚀 IONOS Deployment Package for swan-space.de

This package contains everything you need to deploy your SwanSpace website to IONOS hosting.

## 📦 What's Included

1. **DEPLOYMENT_GUIDE.md** - Complete step-by-step deployment instructions
2. **DEPLOYMENT_CHECKLIST.md** - Quick checklist to ensure nothing is missed
3. **.env.production.example** - Production environment template
4. **.htaccess.root** - Apache configuration for root directory
5. **deploy.sh** - Automated deployment script (for SSH access)

## 🎯 Quick Start

### Option 1: Using FTP (Recommended for IONOS Shared Hosting)

1. **Prepare locally:**
   ```bash
   npm run build
   composer install --optimize-autoloader --no-dev
   ```

2. **Create production .env file:**
   - Copy `.env.production.example` to `.env`
   - Update database and email credentials from IONOS

3. **Upload via FTP:**
   - Connect to: `ftp.swan-space.de`
   - Upload all files EXCEPT: `node_modules/`, `.git/`, `tests/`
   - Rename `.htaccess.root` to `.htaccess` in root directory

4. **Set permissions** (via FTP client):
   - `storage/` → 775
   - `bootstrap/cache/` → 775

5. **Run commands** (via SSH if available or IONOS terminal):
   ```bash
   php artisan key:generate
   php artisan migrate --force
   php artisan db:seed --force
   php artisan storage:link
   php artisan optimize
   ```

### Option 2: Using SSH (If Available)

```bash
# Upload files via SFTP first, then SSH into server:
ssh your-username@swan-space.de

# Navigate to project directory
cd /path/to/swan-space.de

# Run deployment script
./deploy.sh
```

## 📋 Pre-Deployment Checklist

- [ ] Domain `swan-space.de` registered and pointing to IONOS
- [ ] IONOS hosting account active
- [ ] Database created in IONOS panel
- [ ] FTP/SSH credentials obtained
- [ ] SSL certificate enabled (Let's Encrypt in IONOS panel)
- [ ] Local testing completed
- [ ] Production `.env` file prepared

## 🔑 Important Information

### Website URLs
- **Main Site:** https://swan-space.de
- **English:** https://swan-space.de/en
- **German:** https://swan-space.de/de
- **Admin Panel:** https://swan-space.de/secret-dashboard

### Admin Credentials
- **Email:** info@swan-schule.com
- **Password:** De0345127!

### IONOS Resources
- **Control Panel:** https://www.ionos.de
- **Help Center:** https://www.ionos.de/hilfe
- **phpMyAdmin:** Available in IONOS control panel

## 📝 Database Configuration

Update these in your production `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=localhost                    # Check IONOS panel
DB_PORT=3306
DB_DATABASE=your_database_name       # From IONOS panel
DB_USERNAME=your_database_user       # From IONOS panel
DB_PASSWORD=your_database_password   # From IONOS panel
```

## 📧 Email Configuration (IONOS SMTP)

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.ionos.de
MAIL_PORT=587
MAIL_USERNAME=noreply@swan-space.de
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@swan-space.de
MAIL_FROM_NAME="SwanSpace"
```

## 🔧 Common Issues

### 500 Internal Server Error
- Missing or incorrect `.env` file
- Wrong file permissions
- Missing APP_KEY (run `php artisan key:generate`)

### CSS/JS Not Loading
- Missing `public/build/` directory
- Missing `.htaccess` in public folder
- Clear cache: `php artisan cache:clear`

### Database Connection Error
- Wrong credentials in `.env`
- Database host might not be `localhost` - check IONOS panel
- Database user lacks permissions

### Blank White Page
- PHP version incompatible (needs PHP 8.2+)
- Missing vendor dependencies
- Check `storage/logs/laravel.log`

## 📞 Support

For IONOS-specific issues:
- **IONOS Support:** https://www.ionos.de/hilfe
- **Phone:** Check your IONOS account for support number

For Laravel/Application issues:
- Check `storage/logs/laravel.log`
- Review DEPLOYMENT_GUIDE.md

## 🎨 Website Features

Your deployed site includes:
- ✅ Dual language support (EN/DE)
- ✅ Filament Admin Panel
- ✅ Space-themed design with SwanSpace logo
- ✅ Animated Space Swan in hero section
- ✅ Glass morphism effects
- ✅ Content management system
- ✅ Service showcase
- ✅ Testimonials
- ✅ Contact form
- ✅ Facebook & LinkedIn social links

## 📁 Directory Structure on Server

```
/
├── .htaccess              # Root redirect to public/
├── .env                   # Production environment
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
│   ├── .htaccess         # Laravel routing
│   ├── index.php
│   ├── build/            # Compiled assets
│   └── images/
├── resources/
├── routes/
├── storage/              # Needs 775 permissions
│   ├── app/
│   ├── framework/
│   └── logs/
├── vendor/
└── artisan
```

## 🔄 Update Process

To update your live site:

1. Make changes locally
2. Test thoroughly
3. Run `npm run build`
4. Upload changed files via FTP
5. SSH into server (if available)
6. Run: `php artisan optimize:clear`

## ✅ Post-Deployment Verification

After deployment, verify:
- [ ] Homepage loads (EN & DE)
- [ ] Admin panel accessible
- [ ] All images display
- [ ] Navigation works
- [ ] Language switcher works
- [ ] Mobile menu functions
- [ ] Contact form works
- [ ] SSL certificate active (https://)
- [ ] Social media links work

---

**Deployment Date:** _________________

**Deployed By:** _________________

**Notes:** _______________________________________________________________

Good luck with your deployment! 🎉
