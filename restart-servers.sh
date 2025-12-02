#!/bin/bash

# SwanSpace - Server Restart Script
# This script safely restarts Laravel and Vite servers

echo "🔄 Stopping existing servers..."
pkill -9 -f "php artisan serve" 2>/dev/null
pkill -9 -f "vite" 2>/dev/null

echo "⏳ Waiting for processes to stop..."
sleep 3

echo "🧹 Clearing caches..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo "🚀 Starting Laravel server..."
php artisan serve --host=127.0.0.1 --port=8000 > storage/logs/laravel-server.log 2>&1 &
LARAVEL_PID=$!

echo "🚀 Starting Vite dev server..."
npm run dev > storage/logs/vite-server.log 2>&1 &
VITE_PID=$!

echo "⏳ Waiting for servers to start..."
sleep 3

echo ""
echo "✅ Servers started successfully!"
echo ""
echo "📍 Access your website at:"
echo "   - English: http://127.0.0.1:8000/en"
echo "   - German:  http://127.0.0.1:8000/de"
echo "   - Admin:   http://127.0.0.1:8000/secret-dashboard"
echo ""
echo "🔐 Admin Login:"
echo "   - Email:    admin@example.com"
echo "   - Password: password123"
echo ""
echo "📝 Server logs:"
echo "   - Laravel: storage/logs/laravel-server.log"
echo "   - Vite:    storage/logs/vite-server.log"
echo ""
echo "🛑 To stop servers, run: pkill -9 -f 'artisan serve' && pkill -9 -f 'vite'"
echo ""
