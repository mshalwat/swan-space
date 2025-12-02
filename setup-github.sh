#!/bin/bash

# GitHub Repository Setup Script for SwanSpace
# This script helps you initialize and push your project to GitHub

echo "🚀 SwanSpace - GitHub Setup Script"
echo "===================================="
echo ""

# Colors
GREEN='\033[0;32m'
BLUE='\033[0;34m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Check if git is initialized
if [ ! -d ".git" ]; then
    echo -e "${BLUE}📦 Initializing Git repository...${NC}"
    git init
    echo -e "${GREEN}✓ Git initialized${NC}"
else
    echo -e "${GREEN}✓ Git already initialized${NC}"
fi

# Get GitHub username
echo ""
echo -e "${YELLOW}Enter your GitHub username:${NC}"
read GITHUB_USERNAME

if [ -z "$GITHUB_USERNAME" ]; then
    echo -e "${RED}✗ GitHub username is required${NC}"
    exit 1
fi

# Repository name
REPO_NAME="swan-space-website"
echo ""
echo -e "${BLUE}Repository name: ${REPO_NAME}${NC}"

# Check if remote already exists
if git remote get-url origin > /dev/null 2>&1; then
    echo -e "${YELLOW}⚠ Remote 'origin' already exists${NC}"
    echo -e "${BLUE}Current remote:${NC}"
    git remote get-url origin
    echo ""
    echo -e "${YELLOW}Do you want to update it? (y/n)${NC}"
    read UPDATE_REMOTE

    if [ "$UPDATE_REMOTE" = "y" ]; then
        git remote set-url origin "https://github.com/${GITHUB_USERNAME}/${REPO_NAME}.git"
        echo -e "${GREEN}✓ Remote updated${NC}"
    fi
else
    git remote add origin "https://github.com/${GITHUB_USERNAME}/${REPO_NAME}.git"
    echo -e "${GREEN}✓ Remote added${NC}"
fi

# Add all files
echo ""
echo -e "${BLUE}📦 Adding files to git...${NC}"
git add .

# Check if there are changes to commit
if git diff-index --quiet HEAD -- 2>/dev/null; then
    echo -e "${YELLOW}⚠ No changes to commit${NC}"
else
    # Commit
    echo -e "${BLUE}💾 Creating commit...${NC}"
    git commit -m "Initial commit - SwanSpace Laravel website for swan-space.de"
    echo -e "${GREEN}✓ Changes committed${NC}"
fi

# Rename branch to main (if needed)
CURRENT_BRANCH=$(git branch --show-current)
if [ "$CURRENT_BRANCH" != "main" ]; then
    echo -e "${BLUE}🔄 Renaming branch to 'main'...${NC}"
    git branch -M main
    echo -e "${GREEN}✓ Branch renamed to 'main'${NC}"
fi

# Push to GitHub
echo ""
echo -e "${YELLOW}Ready to push to GitHub!${NC}"
echo -e "${BLUE}Repository: https://github.com/${GITHUB_USERNAME}/${REPO_NAME}${NC}"
echo ""
echo -e "${YELLOW}Make sure you have created this repository on GitHub first!${NC}"
echo -e "${BLUE}Create it here: https://github.com/new${NC}"
echo ""
echo -e "${YELLOW}Push to GitHub now? (y/n)${NC}"
read PUSH_NOW

if [ "$PUSH_NOW" = "y" ]; then
    echo -e "${BLUE}📤 Pushing to GitHub...${NC}"
    git push -u origin main

    if [ $? -eq 0 ]; then
        echo ""
        echo -e "${GREEN}✅ Successfully pushed to GitHub!${NC}"
        echo ""
        echo -e "${BLUE}Next steps:${NC}"
        echo "1. Visit: https://github.com/${GITHUB_USERNAME}/${REPO_NAME}"
        echo "2. Follow GITHUB_DEPLOY_NOW_GUIDE.md for IONOS deployment"
        echo "3. Set up Deploy Now: https://www.ionos.com/hosting/deploy-now"
        echo ""
    else
        echo -e "${RED}✗ Failed to push to GitHub${NC}"
        echo -e "${YELLOW}Make sure the repository exists and you have access${NC}"
    fi
else
    echo ""
    echo -e "${BLUE}To push manually later, run:${NC}"
    echo "git push -u origin main"
fi

echo ""
echo -e "${GREEN}✅ Setup complete!${NC}"
