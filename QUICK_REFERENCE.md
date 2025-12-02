# 🚀 SwanSpace Deployment - Quick Reference Card

## 📦 Project Information

**Project Name:** SwanSpace
**Domain:** swan-space.de
**Framework:** Laravel 12 + Vite + Tailwind CSS v4
**Admin Panel:** Filament v3
**Languages:** English (/en) & German (/de)

---

## 🔑 Admin Credentials

**URL:** https://swan-space.de/secret-dashboard
**Email:** info@swan-schule.com
**Password:** De0345127!

---

## 🎯 Deployment Methods

### Method 1: IONOS Deploy Now (Recommended) ⭐

**Advantages:**
- ✅ Automated deployment on git push
- ✅ No manual FTP uploads
- ✅ Free SSL certificate
- ✅ Built-in CI/CD pipeline
- ✅ GitHub integration

**Setup Time:** ~15 minutes

**Steps:**
```bash
# 1. Run setup script
./setup-deploy-now.sh

# 2. Push to GitHub
git push origin main

# 3. Connect on IONOS
https://www.ionos.com/hosting/deploy-now

# 4. Configure domain and deploy!
```

**Full Guide:** `IONOS_DEPLOY_NOW_GUIDE.md`

---

### Method 2: Manual FTP Deployment

**Advantages:**
- ✅ No GitHub required
- ✅ Direct control
- ✅ Works on all IONOS plans

**Setup Time:** ~30-45 minutes

**Steps:**
1. Build assets: `npm run build`
2. Upload via FTP (FileZilla, Cyberduck)
3. Configure .env on server
4. Run migrations via SSH

**Full Guide:** `DEPLOYMENT_GUIDE.md`

---

### Method 3: GitHub Actions + FTP

**Advantages:**
- ✅ Automated like Deploy Now
- ✅ Custom workflow control
- ✅ Works without Deploy Now

**Setup Time:** ~20 minutes

**Configuration:** Already set up in `.github/workflows/deploy.yml`

**Full Guide:** `README.md` → Deployment section

---

## 📋 Essential Commands

### Local Development
```bash
# Start servers
php artisan serve --port=8000
npm run dev

# Clear caches
php artisan optimize:clear

# Database
php artisan migrate:fresh --seed
```

### Production Deployment
```bash
# Build for production
npm run build
composer install --no-dev --optimize-autoloader

# Optimize Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Git Workflow
```bash
# Commit and deploy
git add .
git commit -m "Your message"
git push origin main
# → Triggers auto-deployment if using Deploy Now or GitHub Actions
```

---

## 🔧 Configuration Files

| File | Purpose |
|------|---------|
| `.env` | Environment variables (local) |
| `.env.production.example` | Production template |
| `.htaccess.root` | Apache config for root |
| `public/.htaccess` | Laravel routing |
| `.github/workflows/deploy.yml` | GitHub Actions CI/CD |
| `tailwind.config.js` | Space theme config |
| `vite.config.js` | Asset compilation |

---

## 🌐 Important URLs

### Live Site
- **Main:** https://swan-space.de
- **English:** https://swan-space.de/en
- **German:** https://swan-space.de/de
- **Admin:** https://swan-space.de/secret-dashboard

### IONOS
- **Deploy Now:** https://www.ionos.com/hosting/deploy-now
- **Control Panel:** https://www.ionos.de
- **Help Center:** https://www.ionos.de/hilfe

### Development
- **Local:** http://127.0.0.1:8000
- **Local Admin:** http://127.0.0.1:8000/secret-dashboard

---

## 🗄️ Database Configuration

### Local (SQLite)
```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```

### Production (MySQL - IONOS)
```env
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

**Get credentials from:** IONOS Control Panel → Databases

---

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

---

## 🎨 Design System

### Colors
- Space Black: `#0a0e27`
- Cosmic Purple: `#5b21b6`
- Nebula Pink: `#ec4899`
- Cyan Bright: `#06b6d4`

### Fonts
- **Headings:** Poppins (600, 700, 800, 900)
- **Body:** Nunito (300, 400, 500, 600, 700, 800)

### Key Features
- Glass morphism effects
- 3D card stacks
- Animated space swan
- 50+ twinkling stars
- Floating nebula effects

---

## 🚨 Troubleshooting Quick Fixes

### 500 Error
```bash
php artisan key:generate
chmod -R 775 storage bootstrap/cache
```

### CSS/JS Not Loading
```bash
npm run build
php artisan optimize:clear
```

### Database Connection Failed
```bash
# Check .env credentials
# Verify database exists in IONOS panel
# Test connection via phpMyAdmin
```

### Blank Page
```bash
# Check storage/logs/laravel.log
php artisan optimize:clear
chmod -R 775 storage
```

---

## 📁 Directory Permissions

Required permissions for production:
```bash
storage/              → 775 (or 777)
bootstrap/cache/      → 775 (or 777)
public/              → 755
public/build/        → 755
public/images/       → 755
```

---

## 🔐 Security Checklist

- [ ] `APP_DEBUG=false` in production
- [ ] Strong `APP_KEY` generated
- [ ] Database credentials secured
- [ ] `.env` file not committed to Git
- [ ] SSL certificate active (HTTPS)
- [ ] Admin password changed from default
- [ ] File permissions set correctly
- [ ] Error logs monitored regularly

---

## 📦 CMS Features

### Content Management
- **ContentSections:** Hero, About, Services, Stats (12 sections)
- **Services:** 6 editable services with icons
- **Testimonials:** Client reviews with ratings
- **Pages:** Additional CMS pages (optional)

### Admin Panel Access
1. Login: https://swan-space.de/secret-dashboard
2. Edit content via Filament resources
3. Changes appear immediately on site

---

## 🔄 Update Workflow

### Making Changes
```bash
# 1. Edit code locally
# 2. Test locally
php artisan serve
npm run dev

# 3. Build for production
npm run build

# 4. Commit and push
git add .
git commit -m "Update feature X"
git push origin main

# 5. Auto-deployment happens! ✅
# (if using Deploy Now or GitHub Actions)
```

### Emergency Rollback
```bash
# Via Git
git revert HEAD
git push origin main

# Or via IONOS Deploy Now
# Dashboard → Deployments → Rollback to previous
```

---

## 📞 Support Contacts

**IONOS Support:**
- Help: https://www.ionos.de/hilfe
- Deploy Now: deploynow-support@ionos.com

**Laravel Resources:**
- Docs: https://laravel.com/docs
- Filament: https://filamentphp.com/docs

---

## ✅ Pre-Deployment Checklist

- [ ] All code committed to Git
- [ ] `npm run build` executed successfully
- [ ] Database seeded with content
- [ ] `.env` production values prepared
- [ ] IONOS database created
- [ ] Domain DNS configured
- [ ] SSL certificate enabled
- [ ] Admin credentials tested locally

---

## 📊 Performance Optimization

### Caching
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Asset Optimization
```bash
npm run build
# Vite automatically minifies and optimizes
```

### Database
```bash
php artisan db:seed --class=ContentSectionSeeder
# Populate with optimized content
```

---

## 🎉 Success Verification

After deployment, verify:
1. ✅ Site loads: https://swan-space.de
2. ✅ Both languages work (/en, /de)
3. ✅ Admin panel accessible
4. ✅ SSL active (green padlock)
5. ✅ Images display correctly
6. ✅ Navigation functional
7. ✅ Contact form submits
8. ✅ Mobile responsive
9. ✅ Social links work
10. ✅ No console errors

---

**Last Updated:** December 1, 2025
**Version:** 1.0.0
**Deployed By:** _______________

---

💫 **SwanSpace - Transforming Education Through Innovation** 💫
