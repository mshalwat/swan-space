# 🚀 IONOS Deploy Now - Quick Start Guide

## What is IONOS Deploy Now?

IONOS Deploy Now is an automated deployment service that:
- ✅ Connects directly to your GitHub repository
- ✅ Automatically detects Laravel framework
- ✅ Builds and deploys on every git push
- ✅ Handles PHP dependencies with Composer
- ✅ Compiles frontend assets automatically
- ✅ Provides free SSL certificates
- ✅ No manual FTP uploads needed!

## 📋 Prerequisites

Before you start:
- [ ] GitHub account (free)
- [ ] IONOS hosting account
- [ ] Domain: swan-space.de configured in IONOS
- [ ] This Laravel project ready to deploy

## 🎯 Step 1: Prepare Your GitHub Repository

### 1.1 Create GitHub Repository

1. Go to: https://github.com/new
2. Repository name: `swan-space-website`
3. Description: `SwanSpace - Digital Solutions for Modern Education`
4. Visibility: Private (recommended) or Public
5. **Do NOT** initialize with README (we already have one)
6. Click **Create repository**

### 1.2 Push Your Code to GitHub

```bash
# Navigate to your project
cd /Users/tarekmshalwat/Downloads/my-laravel-website

# Initialize git (if not already done)
git init

# Add all files
git add .

# Commit
git commit -m "Initial commit - SwanSpace Laravel website"

# Add GitHub remote (replace YOUR_USERNAME)
git remote add origin https://github.com/YOUR_USERNAME/swan-space-website.git

# Push to GitHub
git branch -M main
git push -u origin main
```

### 1.3 Add GitHub Secrets (Important!)

Go to your GitHub repository:
1. Click **Settings** tab
2. Click **Secrets and variables** → **Actions**
3. Click **New repository secret**

Add these secrets:

| Secret Name | Value | Description |
|------------|-------|-------------|
| `IONOS_FTP_HOST` | Your IONOS FTP host | From IONOS panel |
| `IONOS_FTP_USERNAME` | Your FTP username | From IONOS panel |
| `IONOS_FTP_PASSWORD` | Your FTP password | From IONOS panel |
| `IONOS_DB_HOST` | Database host | Usually `localhost` |
| `IONOS_DB_NAME` | Database name | From IONOS panel |
| `IONOS_DB_USERNAME` | Database username | From IONOS panel |
| `IONOS_DB_PASSWORD` | Database password | From IONOS panel |
| `APP_KEY` | Generate with command below | Laravel encryption key |

Generate APP_KEY:
```bash
php artisan key:generate --show
# Copy the output (starts with "base64:")
```

## 🌐 Step 2: Configure IONOS Deploy Now

### 2.1 Access Deploy Now

1. Login to IONOS: https://www.ionos.de
2. Navigate to: **Hosting → Deploy Now**
3. Or direct link: https://www.ionos.com/hosting/deploy-now

### 2.2 Connect GitHub Repository

1. Click **"New Project"** or **"Deploy Now"**
2. Select **"Connect GitHub"**
3. Authorize IONOS to access your GitHub account
4. Select repository: `swan-space-website`
5. Select branch: `main`

### 2.3 Configure Build Settings

Deploy Now will auto-detect Laravel. Verify these settings:

**Framework Detection:**
```
Framework: Laravel
PHP Version: 8.2 or higher
```

**Build Configuration:**
```yaml
Runtime: PHP 8.2
Build Command:
  - composer install --no-dev --optimize-autoloader
  - npm ci
  - npm run build

Install Directory: /
Public Directory: /public
```

**Environment Variables:**
Add these in Deploy Now dashboard:
```
APP_NAME=SwanSpace
APP_ENV=production
APP_DEBUG=false
APP_URL=https://swan-space.de
DB_CONNECTION=mysql
DB_HOST=${IONOS_DB_HOST}
DB_DATABASE=${IONOS_DB_NAME}
DB_USERNAME=${IONOS_DB_USERNAME}
DB_PASSWORD=${IONOS_DB_PASSWORD}
SESSION_DRIVER=database
CACHE_DRIVER=file
QUEUE_CONNECTION=database
```

### 2.4 Configure Domain

1. In Deploy Now dashboard, go to **Domains**
2. Click **Add Domain**
3. Enter: `swan-space.de`
4. Enable **HTTPS** (Let's Encrypt SSL)
5. Enable **Force HTTPS redirect**
6. Click **Save**

## 🔧 Step 3: Initial Deployment

### 3.1 Trigger First Deployment

Deploy Now will automatically deploy when you:
1. Complete the setup
2. Or push to the `main` branch

Monitor deployment:
- Go to **Deployments** tab in Deploy Now
- Watch the build logs
- Wait for "Deployment Successful" ✅

### 3.2 Run Post-Deployment Commands

After first deployment, you need to run migrations.

**Option A: Via IONOS SSH** (if available)
```bash
# SSH into your IONOS server
ssh your-username@swan-space.de

# Navigate to deployment directory
cd /path/to/deployment

# Run Laravel commands
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

**Option B: Via Deploy Now Console** (if available)
Some IONOS plans provide a web-based console.

**Option C: Via phpMyAdmin**
1. Access IONOS phpMyAdmin
2. Import your database manually
3. Upload SQL file exported from local

## 🔄 Step 4: Continuous Deployment

Now every time you push to GitHub, Deploy Now will:

1. **Detect Changes** → Push detected on `main` branch
2. **Build** → Install dependencies, compile assets
3. **Test** → Run any configured tests
4. **Deploy** → Deploy to swan-space.de
5. **Notify** → Email notification of success/failure

### Deployment Workflow

```bash
# Make changes locally
# ... edit files ...

# Test locally
npm run build
php artisan test

# Commit and push
git add .
git commit -m "Update hero section design"
git push origin main

# Deploy Now automatically deploys! 🚀
```

## 📊 Step 5: Monitor & Manage

### Deploy Now Dashboard

Access: https://www.ionos.com/hosting/deploy-now/dashboard

**Features:**
- 📈 **Deployments**: View deployment history and logs
- 🌐 **Domains**: Manage domain settings and SSL
- ⚙️ **Settings**: Update environment variables
- 📊 **Analytics**: View deployment metrics
- 🔔 **Notifications**: Configure email/Slack alerts

### Deployment Logs

View real-time logs during deployment:
1. Go to **Deployments** tab
2. Click on active deployment
3. View **Build Logs** and **Deploy Logs**

Common log sections:
```
✓ Cloning repository
✓ Installing Composer dependencies
✓ Installing NPM packages
✓ Building assets with Vite
✓ Deploying to production
✓ Clearing caches
✅ Deployment successful!
```

## 🔐 Step 6: Security Configuration

### Environment Variables (Secure)

Never commit these to Git:
- ✅ Set in Deploy Now dashboard
- ✅ Encrypted at rest
- ✅ Injected during build

### File Permissions

Deploy Now automatically sets:
```
storage/           → 775
bootstrap/cache/   → 775
public/           → 755
```

### SSL Certificate

Deploy Now provides:
- ✅ Free Let's Encrypt SSL
- ✅ Auto-renewal
- ✅ HTTPS redirect
- ✅ HSTS headers

## 🚨 Troubleshooting

### Issue 1: Deployment Failed - Composer Error

**Symptom:** Build fails during `composer install`

**Solution:**
```bash
# Locally, update composer.lock
composer update
git add composer.lock
git commit -m "Update composer dependencies"
git push
```

### Issue 2: Assets Not Loading

**Symptom:** CSS/JS files return 404

**Solutions:**
1. Check `public/build/` exists in deployment
2. Verify build command ran successfully in logs
3. Clear cache: Run `php artisan optimize:clear` via SSH

### Issue 3: Database Connection Error

**Symptom:** "SQLSTATE[HY000] [1045] Access denied"

**Solutions:**
1. Verify database credentials in Deploy Now environment variables
2. Check database host (might not be `localhost`)
3. Ensure database user has proper permissions

### Issue 4: 500 Internal Server Error

**Symptom:** White page with 500 error

**Solutions:**
1. Check Deploy Now logs
2. Verify `.env` variables are set
3. Ensure `APP_KEY` is set correctly
4. Check `storage/logs/laravel.log` via FTP/SSH

### Issue 5: Migrations Not Running

**Symptom:** Database tables don't exist

**Solution:**
Deploy Now doesn't auto-run migrations. You must:
1. SSH into server and run `php artisan migrate --force`
2. Or import database via phpMyAdmin
3. Or add to build commands (risky for production)

## 📝 Best Practices

### 1. Use Branches for Development

```bash
# Create development branch
git checkout -b develop

# Make changes
git add .
git commit -m "New feature"
git push origin develop

# Test on staging (if available)
# Merge to main when ready
git checkout main
git merge develop
git push origin main
```

### 2. Environment-Specific Configs

Create different configs:
- `.env.local` → Local development (not committed)
- `.env.production` → Set in Deploy Now dashboard
- `config/database.php` → Read from env variables

### 3. Optimize for Production

Add to your workflow:
```bash
# Before committing
composer install --optimize-autoloader --no-dev
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 4. Database Backups

- Enable IONOS automatic backups
- Export database before major changes
- Keep local backup before migrations

### 5. Monitor Deployments

- Enable email notifications in Deploy Now
- Review deployment logs regularly
- Set up uptime monitoring (e.g., UptimeRobot)

## 🎉 Success Checklist

After successful deployment:

- [ ] Website accessible: https://swan-space.de
- [ ] English version works: https://swan-space.de/en
- [ ] German version works: https://swan-space.de/de
- [ ] Admin panel accessible: https://swan-space.de/secret-dashboard
- [ ] SSL certificate active (green padlock)
- [ ] All images loading
- [ ] Navigation works
- [ ] Forms submitting
- [ ] Database connected
- [ ] Email sending (test contact form)
- [ ] Mobile responsive
- [ ] Social links working

## 🔗 Useful Links

**IONOS Resources:**
- Deploy Now Dashboard: https://www.ionos.com/hosting/deploy-now
- Deploy Now Docs: https://docs.ionos.space/
- IONOS Help Center: https://www.ionos.de/hilfe
- IONOS Control Panel: https://www.ionos.de

**GitHub Resources:**
- Your Repository: https://github.com/YOUR_USERNAME/swan-space-website
- GitHub Actions: https://github.com/YOUR_USERNAME/swan-space-website/actions
- GitHub Secrets: https://github.com/YOUR_USERNAME/swan-space-website/settings/secrets

**Laravel Resources:**
- Laravel Docs: https://laravel.com/docs
- Laravel Deployment: https://laravel.com/docs/deployment
- Filament Admin: https://filamentphp.com/docs

## 📞 Support

**Deploy Now Support:**
- Documentation: https://docs.ionos.space/
- Email: deploynow-support@ionos.com
- Community: IONOS Deploy Now Discord

**IONOS General Support:**
- Help Center: https://www.ionos.de/hilfe
- Phone: Check your IONOS account for support number
- Live Chat: Available in control panel

---

## 🚀 Quick Commands Reference

```bash
# Push changes to trigger deployment
git add .
git commit -m "Your message"
git push origin main

# Generate new APP_KEY
php artisan key:generate --show

# Clear all caches (via SSH)
php artisan optimize:clear

# Run migrations (via SSH)
php artisan migrate --force

# View deployment logs
# Go to Deploy Now dashboard → Deployments → View logs
```

---

**Deployment Date:** {{ date('Y-m-d') }}
**Domain:** swan-space.de
**Hosting:** IONOS Deploy Now
**Repository:** GitHub (Private)

🎉 **Congratulations! Your SwanSpace website is now live with automated deployments!** 🎉
