#!/bin/bash

# SwanSpace Deployment Script for IONOS
# Usage: ./deploy.sh

echo "🚀 Starting deployment for swan-space.de..."

# Colors
GREEN='\033[0;32m'
BLUE='\033[0;34m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# Navigate to project directory
cd "$(dirname "$0")"

echo -e "${BLUE}📦 Installing Composer dependencies...${NC}"
composer install --optimize-autoloader --no-dev

echo -e "${BLUE}🎨 Building frontend assets...${NC}"
npm run build

echo -e "${BLUE}🧹 Clearing caches...${NC}"
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

echo -e "${BLUE}⚡ Optimizing application...${NC}"
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo -e "${BLUE}🗄️  Running migrations...${NC}"
php artisan migrate --force

echo -e "${BLUE}🔗 Creating storage link...${NC}"
php artisan storage:link

echo -e "${BLUE}📁 Setting permissions...${NC}"
chmod -R 775 storage
chmod -R 775 bootstrap/cache

echo -e "${GREEN}✅ Deployment completed successfully!${NC}"
echo -e "${GREEN}🌐 Visit: https://swan-space.de${NC}"
