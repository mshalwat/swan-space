# 🦢 SwanSpace - Digital Solutions for Modern Education

A complete Laravel website with full admin panel, space-themed design, and dual-language support. Ready to deploy on **IONOS** with domain **swan-space.de**.

## 🌟 Features

- ✨ **Space-Themed Design**: Animated stars, floating nebulas, glass morphism effects
- 🌍 **Dual Language**: Full English and German support (EN/DE routes)
- 🦢 **SwanSpace Logo**: Custom animated logo with glow effects
- 🚀 **Animated Space Swan**: Floating swan in hero with cosmic particles
- 📱 **Responsive Design**: Mobile-first approach, perfect on all devices
- 🎛️ **Filament Admin Panel**: Complete CMS at `/secret-dashboard`
- 🔐 **Production Ready**: Security features, SSL support, optimized
- 📧 **Contact Form**: Integrated with validation
- 🔗 **Social Links**: Facebook and LinkedIn integration
- **Modern Stack**: Laravel 12.x, Blade, Tailwind CSS v4, Alpine.js, Filament v3

## 📋 Requirements

- PHP >= 8.2
- Composer
- Node.js >= 18
- SQLite or MySQL

## 🛠️ Installation

### 1. Install Dependencies

```bash
composer install
npm install
```

### 2. Run Migrations and Seeders

```bash
php artisan migrate:fresh --seed
```

### 3. Build Assets

```bash
npm run build
# Or for development:
npm run dev
```

### 4. Start Server

```bash
php artisan serve
```

Visit: <http://localhost:8000>

## � Deployment to IONOS (swan-space.de)

### Option 1: GitHub + Deploy Now (Recommended - Automated)

**📖 Full Guide:** [GITHUB_DEPLOY_NOW_GUIDE.md](GITHUB_DEPLOY_NOW_GUIDE.md)

1. Push code to GitHub using `./setup-github.sh`
2. Connect to IONOS Deploy Now
3. Configure environment variables
4. Automatic deployment on every push!

### Option 2: Manual FTP Deployment

**📖 Full Guide:** [DEPLOYMENT_GUIDE.md](DEPLOYMENT_GUIDE.md)

# Swan Schule Website (Laravel)

This repository contains the Swan Space marketing website built with Laravel, Filament (admin panel), Tailwind CSS, and Vite. It includes multilingual content (EN/DE), dynamic sections sourced from the database, and an admin panel for managing content.

## Features

- Laravel 12 with PHP 8.5+
- Filament Admin Panel (secret dashboard)
- Tailwind CSS + Vite bundling
- Multilingual pages: English `/en`, German `/de`
- Content managed via database sections (hero, about, services, testimonials, etc.)

## Getting Started

Follow these steps to set up the project locally.

### 1) Clone the repository

```bash
git clone <YOUR_GITHUB_REPO_URL>.git
cd my-laravel-website
```

### 2) Install dependencies

• PHP dependencies (Composer):

```bash
composer install
```

• Node.js dependencies (Vite/Tailwind):

```bash
npm install
```

### 3) Configure environment

Create your environment file from the example:

```bash
cp .env.example .env
```

Update `.env` with your local database credentials, for example for SQLite:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/my-laravel-website/database/database.sqlite
```

Or for MySQL/PostgreSQL, set the appropriate host/user/password.

### 4) Generate application key

```bash
php artisan key:generate
```

### 5) Set up the database and run migrations

Create the database (for SQLite):

```bash
touch database/database.sqlite
```

Run migrations and seeders:

```bash
php artisan migrate --force
php artisan db:seed
```

Optional: Rerun everything fresh if needed

```bash
php artisan migrate:fresh --seed --force
```

### 6) Start the local servers

Start the Laravel server:

```bash
php artisan serve --host=127.0.0.1 --port=8000
```

In a separate terminal, start Vite for assets:

```bash
npm run dev
```

Visit:

- [http://127.0.0.1:8000/en](http://127.0.0.1:8000/en)
- [http://127.0.0.1:8000/de](http://127.0.0.1:8000/de)
- Admin (Filament): [http://127.0.0.1:8000/secret-dashboard](http://127.0.0.1:8000/secret-dashboard)

## Project Structure

- `app/` — Laravel application code (controllers, models, providers)
- `resources/views/` — Blade templates and components
- `resources/css`, `resources/js` — Tailwind/Vite assets
- `routes/` — Web and console routes
- `database/` — Migrations, seeders, factories
- `public/` — Public entry (`index.php`) and built assets

## Admin & Content Management

- Admin panel is available at `/secret-dashboard` (Filament v3)
- Homepage reads from `ContentSection` entries by `section_type` and `language`
- To see edits reflected: update the relevant content sections, then clear caches if needed

```bash
php artisan optimize:clear
```

## Deployment Notes

- Ensure correct `.env` for production (database, app URL, mail, cache)
- Build assets before deployment:

```bash
npm run build
```

- Configure web server to serve `public/` as the document root

## License

MIT License. See `LICENSE` if present.

