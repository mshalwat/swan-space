# Images Directory

This directory contains all images used in the SwanSpace website.

## Structure

```
public/images/
├── logos/
│   └── logo.png          # Main logo (replace with your logo)
├── services/             # Service images (if needed)
├── testimonials/         # Testimonial avatars (if needed)
└── general/              # Other general images
```

## Logo Requirements

### Main Logo (`logos/logo.png`)
- **Format:** PNG (with transparent background recommended)
- **Recommended Size:** 200x200 pixels minimum
- **Aspect Ratio:** Square or wide (will be auto-scaled)
- **Color Mode:** RGB
- **Usage:** Navbar and Footer

### How to Replace the Logo

1. **Prepare your logo:**
   - Export as PNG with transparent background
   - Recommended dimensions: 200x200px or 400x400px
   - Keep file size under 100KB if possible

2. **Replace the file:**
   - Navigate to: `public/images/logos/`
   - Replace `logo.png` with your logo file
   - Keep the filename as `logo.png`

3. **Clear cache:**
   ```bash
   php artisan optimize:clear
   ```

4. **Refresh your browser** to see the new logo

## Additional Image Directories

You can create additional subdirectories as needed:

- `public/images/services/` - For service card images
- `public/images/testimonials/` - For customer avatars
- `public/images/backgrounds/` - For background images
- `public/images/icons/` - For icon images

## Using Images in Code

To reference images in your Blade templates:

```blade
<img src="{{ asset('images/logos/logo.png') }}" alt="Logo">
<img src="{{ asset('images/services/service1.jpg') }}" alt="Service">
```

## Image Optimization Tips

1. **Compress images** before uploading (use tools like TinyPNG)
2. **Use appropriate formats:**
   - PNG for logos and images with transparency
   - JPG for photos
   - SVG for icons and simple graphics
3. **Provide alt text** for accessibility
4. **Consider responsive images** for different screen sizes

---

**Note:** The logo is currently set to display at a height of 48px (h-12) in the navbar and 40px (h-10) in the footer. These sizes are automatically adjusted for different screen sizes.
