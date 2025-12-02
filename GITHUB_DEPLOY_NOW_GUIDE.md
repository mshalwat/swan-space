# IONOS Deploy Now - GitHub Setup Guide

## 🚀 Deploy Your Laravel App with IONOS Deploy Now

IONOS Deploy Now allows you to automatically deploy your Laravel application directly from GitHub to your IONOS webspace. Every push to your main branch triggers an automatic deployment.

## 📋 Prerequisites

- ✅ GitHub account
- ✅ IONOS hosting account
- ✅ Git installed on your local machine
- ✅ Your Laravel project (SwanSpace)

## Step 1: Create GitHub Repository

### 1.1 Initialize Git Repository (if not already done)

```bash
cd /Users/tarekmshalwat/Downloads/my-laravel-website

# Initialize git
git init

# Add all files
git add .

# Create first commit
git commit -m "Initial commit - SwanSpace Laravel website"
```

### 1.2 Create Repository on GitHub

1. Go to [GitHub](https://github.com) and login
2. Click **"New Repository"** or go to https://github.com/new
3. Repository name: `swan-space-website`
4. Description: `SwanSpace - Digital Solutions for Modern Education`
5. Keep it **Private** (recommended) or Public
6. Do **NOT** initialize with README, .gitignore, or license
7. Click **"Create repository"**

### 1.3 Push to GitHub

```bash
# Add remote repository (replace YOUR_USERNAME)
git remote add origin https://github.com/YOUR_USERNAME/swan-space-website.git

# Rename branch to main (if needed)
git branch -M main

# Push to GitHub
git push -u origin main
```

## Step 2: Setup IONOS Deploy Now

### 2.1 Access Deploy Now

1. Login to IONOS Control Panel: https://www.ionos.de
2. Navigate to: **Deploy Now** section
3. Or visit directly: https://www.ionos.com/hosting/deploy-now

### 2.2 Connect GitHub Repository

1. Click **"New Project"** or **"Deploy from GitHub"**
2. Authorize IONOS to access your GitHub account
3. Select your repository: `swan-space-website`
4. Choose branch: `main`
5. Framework detection: Deploy Now should automatically detect **Laravel**

### 2.3 Configure Build Settings

Deploy Now will auto-detect Laravel, but verify these settings:

**Build Command:**
```bash
composer install --optimize-autoloader --no-dev
npm ci && npm run build
```

**Output Directory:**
```
public
```

**Environment:** PHP 8.2+

## Step 3: Configure Environment Variables

In Deploy Now dashboard, add these environment variables:

### Required Variables

```env
APP_NAME=SwanSpace
APP_ENV=production
APP_KEY=base64:YOUR_KEY_HERE
APP_DEBUG=false
APP_URL=https://swan-space.de

DB_CONNECTION=mysql
DB_HOST=YOUR_IONOS_DB_HOST
DB_PORT=3306
DB_DATABASE=YOUR_DB_NAME
DB_USERNAME=YOUR_DB_USER
DB_PASSWORD=YOUR_DB_PASSWORD

SESSION_DRIVER=database
CACHE_DRIVER=file
QUEUE_CONNECTION=database
```

### Email Configuration (Optional)

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.ionos.de
MAIL_PORT=587
MAIL_USERNAME=noreply@swan-space.de
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@swan-space.de
MAIL_FROM_NAME=SwanSpace
```

### How to Get APP_KEY

On your local machine:
```bash
php artisan key:generate --show
```

Copy the output and add to Deploy Now environment variables.

## Step 4: Configure Database

### 4.1 Create Database in IONOS

1. In IONOS Control Panel: **Databases → MySQL**
2. Create new database: `swanspace_production`
3. Note the credentials:
   - Host
   - Database name
   - Username
   - Password

### 4.2 Import Initial Database

**Option A: Via phpMyAdmin (Easier)**
1. Access phpMyAdmin from IONOS Control Panel
2. Select your database
3. Click **Import**
4. Upload your database export
5. Click **Go**

**Option B: Via Command Line**
```bash
# Export local database first
mysqldump -u root database_name > database_backup.sql

# Import to IONOS (you'll need their MySQL credentials)
mysql -h YOUR_IONOS_HOST -u YOUR_USER -p YOUR_DATABASE < database_backup.sql
```

## Step 5: Setup GitHub Secrets (For GitHub Actions)

If using the GitHub Actions workflow I created (`.github/workflows/deploy.yml`):

1. Go to your GitHub repository
2. Click **Settings** → **Secrets and variables** → **Actions**
3. Click **New repository secret**
4. Add these secrets:

| Secret Name | Value | Description |
|-------------|-------|-------------|
| `APP_NAME` | SwanSpace | Application name |
| `APP_KEY` | base64:YOUR_KEY | From `php artisan key:generate` |
| `APP_URL` | https://swan-space.de | Your domain |
| `DB_HOST` | localhost | IONOS database host |
| `DB_DATABASE` | your_db_name | Database name |
| `DB_USERNAME` | your_db_user | Database username |
| `DB_PASSWORD` | your_db_pass | Database password |
| `FTP_SERVER` | ftp.swan-space.de | IONOS FTP host |
| `FTP_USERNAME` | your_ftp_user | FTP username |
| `FTP_PASSWORD` | your_ftp_pass | FTP password |
| `SSH_HOST` | swan-space.de | SSH host (if available) |
| `SSH_USERNAME` | your_ssh_user | SSH username (if available) |
| `SSH_PASSWORD` | your_ssh_pass | SSH password (if available) |
| `DEPLOY_PATH` | /path/to/site | Full path on server |

## Step 6: Configure .gitignore

Ensure sensitive files are NOT committed to GitHub:

```gitignore
/node_modules
/public/hot
/public/storage
/storage/*.key
/vendor
.env
.env.backup
.env.production
.phpunit.result.cache
Homestead.json
Homestead.yaml
auth.json
npm-debug.log
yarn-error.log
/.fleet
/.idea
/.vscode
```

## Step 7: Deploy

### First Deployment

1. Make a small change in your code (or just add a comment)
2. Commit and push:

```bash
git add .
git commit -m "Deploy to IONOS"
git push origin main
```

3. Deploy Now will automatically:
   - Pull your code
   - Run `composer install`
   - Run `npm run build`
   - Deploy to your IONOS webspace
   - Run Laravel migrations (if configured)

### Monitor Deployment

1. Go to Deploy Now dashboard in IONOS
2. View deployment logs
3. Check for any errors
4. Verify deployment succeeded

## Step 8: Post-Deployment Setup

### 8.1 Run Database Migrations

**Via Deploy Now Console:**
```bash
php artisan migrate --force
php artisan db:seed --force
```

**Via SSH (if available):**
```bash
ssh your-user@swan-space.de
cd /path/to/your/site
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link
php artisan optimize
```

### 8.2 Set File Permissions

```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### 8.3 Create Storage Link

```bash
php artisan storage:link
```

## Step 9: Setup Custom Domain

### 9.1 Configure Domain in IONOS

1. In IONOS Control Panel: **Domains**
2. Select `swan-space.de`
3. Point to your Deploy Now project
4. Enable SSL (Let's Encrypt - FREE)

### 9.2 Update DNS

Ensure these records exist:

```
Type: A
Host: @
Value: YOUR_IONOS_IP
TTL: 3600

Type: CNAME
Host: www
Value: swan-space.de
TTL: 3600
```

## Step 10: Continuous Deployment

Now every time you push to GitHub:

```bash
# Make changes to your code
git add .
git commit -m "Update hero section"
git push origin main
```

**Deploy Now will automatically:**
1. ✅ Pull latest code
2. ✅ Install dependencies
3. ✅ Build assets
4. ✅ Deploy to production
5. ✅ Run migrations (if configured)
6. ✅ Clear caches

## 🎯 Testing Your Deployment

After deployment completes, test:

- [ ] Visit: https://swan-space.de/en
- [ ] Visit: https://swan-space.de/de
- [ ] Admin panel: https://swan-space.de/secret-dashboard
  - Email: info@swan-schule.com
  - Password: De0345127!
- [ ] Check all images load
- [ ] Test navigation
- [ ] Test language switcher
- [ ] Test mobile menu
- [ ] Check Facebook button
- [ ] Test contact form

## 🔧 Troubleshooting

### Deployment Fails

**Check Deploy Now logs:**
1. Open Deploy Now dashboard
2. View deployment history
3. Click on failed deployment
4. Review error logs

**Common issues:**
- Missing environment variables
- Database connection errors
- File permission issues
- Composer/NPM errors

### Database Connection Error

1. Verify database credentials in Deploy Now environment variables
2. Check database host (might not be `localhost`)
3. Ensure database user has proper permissions
4. Test connection via phpMyAdmin

### Assets Not Loading

1. Verify `npm run build` completed successfully
2. Check `public/build/` directory exists
3. Verify `.htaccess` files are in place
4. Clear cache: `php artisan optimize:clear`

### 500 Internal Server Error

1. Check `.env` file has all required variables
2. Verify `APP_KEY` is set
3. Check `storage/logs/laravel.log` for errors
4. Verify file permissions (775 for storage)

## 📚 Useful Commands

### Local Development

```bash
# Start local servers
php artisan serve &
npm run dev &

# Clear all caches
php artisan optimize:clear

# Run migrations
php artisan migrate

# Seed database
php artisan db:seed
```

### Production (via SSH)

```bash
# Navigate to project
cd /path/to/swan-space

# Pull latest from GitHub (if manual)
git pull origin main

# Update dependencies
composer install --no-dev

# Build assets
npm run build

# Run migrations
php artisan migrate --force

# Optimize
php artisan optimize

# Clear caches
php artisan optimize:clear
```

## 🔐 Security Checklist

- [ ] `.env` file is NOT in GitHub (in .gitignore)
- [ ] `APP_DEBUG=false` in production
- [ ] `APP_ENV=production`
- [ ] Strong database passwords
- [ ] SSL certificate enabled
- [ ] GitHub secrets configured (not hardcoded)
- [ ] File permissions set correctly (not 777)

## 📱 Update Workflow

Your standard workflow will be:

1. **Develop locally**
   ```bash
   git checkout -b feature/new-feature
   # Make changes
   git commit -m "Add new feature"
   ```

2. **Test locally**
   ```bash
   php artisan test
   npm run build
   ```

3. **Merge to main**
   ```bash
   git checkout main
   git merge feature/new-feature
   ```

4. **Push to GitHub**
   ```bash
   git push origin main
   ```

5. **Automatic deployment** ✅
   - Deploy Now detects push
   - Runs build process
   - Deploys to production
   - You get notified!

## 🎉 Success!

Your Laravel website is now:
- ✅ Deployed on IONOS
- ✅ Automatically deployed from GitHub
- ✅ Running on swan-space.de
- ✅ Using Deploy Now for CI/CD
- ✅ SSL enabled
- ✅ Production ready!

## 📞 Support

- **Deploy Now Docs:** https://docs.ionos.space/
- **IONOS Help:** https://www.ionos.de/hilfe
- **GitHub Actions Docs:** https://docs.github.com/en/actions
- **Laravel Deployment:** https://laravel.com/docs/deployment

---

**Your Website:** https://swan-space.de
**Admin Panel:** https://swan-space.de/secret-dashboard
**GitHub Repo:** https://github.com/YOUR_USERNAME/swan-space-website
