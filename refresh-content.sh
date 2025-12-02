#!/bin/bash

# SwanSpace Content Refresh Script
# Run this after editing content in the admin panel to see changes immediately

echo "🔄 Refreshing website content..."
echo ""

# Clear view cache
php artisan view:clear
echo "✅ View cache cleared"

# Clear application cache
php artisan cache:clear
echo "✅ Application cache cleared"

# Clear config cache (in case you changed any config)
php artisan config:clear
echo "✅ Config cache cleared"

echo ""
echo "✨ Content refreshed! Reload your browser to see changes."
echo "💡 Tip: Use Cmd+Shift+R (Mac) or Ctrl+Shift+R (Windows) for hard reload"
