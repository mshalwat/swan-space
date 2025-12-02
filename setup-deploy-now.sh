#!/bin/bash

# SwanSpace - Complete Setup Script for IONOS Deploy Now
# This script prepares your project for GitHub and IONOS deployment

set -e  # Exit on error

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
BLUE='\033[0;34m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

echo -e "${BLUE}"
echo "╔═══════════════════════════════════════════════════════════╗"
echo "║         SwanSpace - Deployment Setup Script              ║"
echo "║              IONOS Deploy Now + GitHub                    ║"
echo "╚═══════════════════════════════════════════════════════════╝"
echo -e "${NC}"

# Check if we're in the right directory
if [ ! -f "artisan" ]; then
    echo -e "${RED}Error: This doesn't appear to be a Laravel project directory${NC}"
    echo "Please run this script from your Laravel project root"
    exit 1
fi

echo -e "${BLUE}📋 Step 1: Pre-deployment Checks${NC}"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"

# Check PHP version
echo -n "Checking PHP version... "
PHP_VERSION=$(php -r 'echo PHP_VERSION;')
echo -e "${GREEN}$PHP_VERSION${NC}"

# Check Composer
echo -n "Checking Composer... "
if command -v composer &> /dev/null; then
    COMPOSER_VERSION=$(composer --version | cut -d' ' -f3)
    echo -e "${GREEN}$COMPOSER_VERSION${NC}"
else
    echo -e "${RED}Not found${NC}"
    echo "Please install Composer: https://getcomposer.org/"
    exit 1
fi

# Check Node.js
echo -n "Checking Node.js... "
if command -v node &> /dev/null; then
    NODE_VERSION=$(node --version)
    echo -e "${GREEN}$NODE_VERSION${NC}"
else
    echo -e "${RED}Not found${NC}"
    echo "Please install Node.js: https://nodejs.org/"
    exit 1
fi

# Check npm
echo -n "Checking npm... "
if command -v npm &> /dev/null; then
    NPM_VERSION=$(npm --version)
    echo -e "${GREEN}v$NPM_VERSION${NC}"
else
    echo -e "${RED}Not found${NC}"
    exit 1
fi

# Check Git
echo -n "Checking Git... "
if command -v git &> /dev/null; then
    GIT_VERSION=$(git --version | cut -d' ' -f3)
    echo -e "${GREEN}$GIT_VERSION${NC}"
else
    echo -e "${RED}Not found${NC}"
    echo "Please install Git: https://git-scm.com/"
    exit 1
fi

echo ""
echo -e "${BLUE}📦 Step 2: Installing Dependencies${NC}"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"

echo "Installing Composer dependencies..."
composer install --optimize-autoloader

echo ""
echo "Installing npm dependencies..."
npm install

echo ""
echo -e "${BLUE}🎨 Step 3: Building Production Assets${NC}"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"

npm run build

echo ""
echo -e "${BLUE}🔑 Step 4: Generate Application Key${NC}"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"

if [ ! -f ".env" ]; then
    echo "Creating .env file from .env.example..."
    cp .env.example .env
fi

echo "Generating application key..."
php artisan key:generate

echo ""
echo -e "${YELLOW}📋 Important: Save this APP_KEY for IONOS Deploy Now:${NC}"
APP_KEY=$(php artisan key:generate --show)
echo -e "${GREEN}$APP_KEY${NC}"
echo ""
echo "You'll need to add this as an environment variable in IONOS Deploy Now dashboard"
echo ""

echo -e "${BLUE}🗂️  Step 5: Preparing Git Repository${NC}"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"

# Initialize git if not already done
if [ ! -d ".git" ]; then
    echo "Initializing Git repository..."
    git init
    echo -e "${GREEN}✓ Git repository initialized${NC}"
else
    echo -e "${GREEN}✓ Git repository already exists${NC}"
fi

# Check for GitHub CLI
if command -v gh &> /dev/null; then
    echo -e "${GREEN}✓ GitHub CLI detected${NC}"

    read -p "Would you like to create a GitHub repository now? (y/n): " CREATE_REPO

    if [ "$CREATE_REPO" = "y" ] || [ "$CREATE_REPO" = "Y" ]; then
        echo ""
        echo "Creating GitHub repository..."

        read -p "Repository name (default: swan-space-website): " REPO_NAME
        REPO_NAME=${REPO_NAME:-swan-space-website}

        read -p "Make repository private? (y/n, default: y): " IS_PRIVATE
        IS_PRIVATE=${IS_PRIVATE:-y}

        if [ "$IS_PRIVATE" = "y" ] || [ "$IS_PRIVATE" = "Y" ]; then
            VISIBILITY="--private"
        else
            VISIBILITY="--public"
        fi

        gh repo create "$REPO_NAME" $VISIBILITY --source=. --description="SwanSpace - Digital Solutions for Modern Education"

        echo -e "${GREEN}✓ GitHub repository created${NC}"
    fi
else
    echo -e "${YELLOW}⚠ GitHub CLI not found${NC}"
    echo "Install GitHub CLI for easier repository setup: https://cli.github.com/"
    echo ""
    echo "Or manually create a repository at: https://github.com/new"
fi

echo ""
echo -e "${BLUE}📝 Step 6: Git Configuration${NC}"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"

# Check if Git user is configured
GIT_USER=$(git config user.name || echo "")
if [ -z "$GIT_USER" ]; then
    read -p "Enter your Git username: " GIT_USERNAME
    git config user.name "$GIT_USERNAME"
fi

GIT_EMAIL=$(git config user.email || echo "")
if [ -z "$GIT_EMAIL" ]; then
    read -p "Enter your Git email: " USER_EMAIL
    git config user.email "$USER_EMAIL"
fi

echo -e "${GREEN}✓ Git configured${NC}"
echo "  User: $(git config user.name)"
echo "  Email: $(git config user.email)"

echo ""
echo -e "${BLUE}📤 Step 7: Commit and Push to GitHub${NC}"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"

# Add all files
echo "Adding files to Git..."
git add .

# Check if there are changes to commit
if git diff-index --quiet HEAD -- 2>/dev/null; then
    echo -e "${YELLOW}No changes to commit${NC}"
else
    echo "Committing changes..."
    git commit -m "Initial commit - SwanSpace Laravel website ready for IONOS Deploy Now"
    echo -e "${GREEN}✓ Changes committed${NC}"
fi

# Check if we have a remote
if git remote get-url origin &> /dev/null; then
    echo -e "${GREEN}✓ Git remote 'origin' already configured${NC}"

    read -p "Push to GitHub? (y/n): " PUSH_NOW
    if [ "$PUSH_NOW" = "y" ] || [ "$PUSH_NOW" = "Y" ]; then
        echo "Pushing to GitHub..."
        git branch -M main
        git push -u origin main
        echo -e "${GREEN}✓ Pushed to GitHub${NC}"
    fi
else
    echo -e "${YELLOW}⚠ No Git remote configured${NC}"
    echo ""
    echo "After creating your GitHub repository, run:"
    echo -e "${BLUE}git remote add origin https://github.com/YOUR_USERNAME/swan-space-website.git${NC}"
    echo -e "${BLUE}git branch -M main${NC}"
    echo -e "${BLUE}git push -u origin main${NC}"
fi

echo ""
echo -e "${BLUE}🎯 Step 8: Next Steps - IONOS Deploy Now${NC}"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"

echo ""
echo -e "${GREEN}✅ Local setup complete!${NC}"
echo ""
echo "Next steps for IONOS Deploy Now:"
echo ""
echo "1. 🌐 Go to: https://www.ionos.com/hosting/deploy-now"
echo ""
echo "2. 🔗 Click 'New Project' and connect your GitHub account"
echo ""
echo "3. 📦 Select repository: swan-space-website"
echo ""
echo "4. ⚙️  Deploy Now will auto-detect Laravel"
echo ""
echo "5. 🔐 Add these environment variables in Deploy Now dashboard:"
echo -e "   ${YELLOW}APP_KEY${NC}=${GREEN}$APP_KEY${NC}"
echo "   APP_URL=https://swan-space.de"
echo "   DB_CONNECTION=mysql"
echo "   DB_HOST=<from IONOS panel>"
echo "   DB_DATABASE=<from IONOS panel>"
echo "   DB_USERNAME=<from IONOS panel>"
echo "   DB_PASSWORD=<from IONOS panel>"
echo ""
echo "6. 🌍 Configure domain: swan-space.de"
echo ""
echo "7. 🔒 Enable SSL certificate (Let's Encrypt - free)"
echo ""
echo "8. 🚀 Deploy!"
echo ""
echo -e "${BLUE}📚 Documentation:${NC}"
echo "   - Full guide: ./IONOS_DEPLOY_NOW_GUIDE.md"
echo "   - Deployment checklist: ./DEPLOYMENT_CHECKLIST.md"
echo "   - Manual FTP guide: ./DEPLOYMENT_GUIDE.md"
echo ""
echo -e "${BLUE}🔑 Important Credentials:${NC}"
echo "   Admin Panel: https://swan-space.de/secret-dashboard"
echo "   Email: info@swan-schule.com"
echo "   Password: De0345127!"
echo ""
echo -e "${GREEN}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
echo -e "${GREEN}     ✨ SwanSpace is ready for deployment! ✨${NC}"
echo -e "${GREEN}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
echo ""
