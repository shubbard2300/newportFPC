# Newport FPC WordPress Theme

A custom WordPress theme designed specifically for Newport First Presbyterian Church.

## Description

This theme is built with church websites in mind, featuring:
- Clean, professional design suitable for religious organizations
- Custom post types for Sermons and Events
- Customizable church information (address, phone, email)
- Service times configuration
- Social media integration
- Responsive design for mobile and desktop
- WordPress Customizer integration
- SEO-friendly structure

## Features

### Custom Post Types
- **Sermons**: Manage and display church sermons with custom fields
- **Events**: Church events with date, time, and location fields

### Theme Customization
- Church contact information
- Service times (Sunday and Wednesday)
- Social media links (Facebook, Instagram, YouTube)
- Custom color scheme
- Logo upload support

### Built-in Functionality
- Responsive navigation menu
- Post thumbnails support
- Comment system
- Widget-ready sidebar
- Search functionality
- Custom excerpt lengths
- Google Fonts integration

## Installation

1. Upload the `newport-fpc` folder to your WordPress `/wp-content/themes/` directory
2. Activate the theme through the WordPress admin panel under Appearance > Themes
3. Configure the theme settings through Appearance > Customize

## Theme Setup

### Initial Configuration
1. Go to **Appearance > Customize**
2. Configure the following sections:
   - **Church Information**: Add address, phone, and email
   - **Service Times**: Set Sunday and Wednesday service times
   - **Social Media**: Add your social media URLs
   - **Theme Colors**: Customize primary and accent colors

### Menu Setup
1. Go to **Appearance > Menus**
2. Create a new menu and assign it to the "Primary" location
3. Add pages like Home, About, Sermons, Events, Contact

### Custom Post Types
After activation, you'll see new menu items in your WordPress admin:
- **Sermons**: Add and manage sermon content
- **Events**: Create church events with custom fields for date, time, and location

## File Structure

```
newport-fpc/
├── style.css              # Main stylesheet and theme information
├── index.php              # Main template file
├── functions.php          # Theme functions and features
├── header.php             # Header template
├── footer.php             # Footer template
├── single.php             # Single post template
├── page.php               # Page template
├── inc/                   # Include files
│   ├── template-tags.php  # Custom template functions
│   ├── template-functions.php # Theme enhancement functions
│   └── customizer.php     # WordPress Customizer settings
└── README.md              # This file
```

## Customization

### Colors
The theme uses CSS custom properties for easy color customization:
- Primary Color: Used for headers, navigation, and footer
- Accent Color: Used for links, buttons, and highlights

### Fonts
The theme includes Google Fonts:
- **Open Sans**: For body text and general content
- **Playfair Display**: For headings and decorative text

### Custom CSS
Additional CSS can be added through:
- **Appearance > Customize > Additional CSS**
- Child theme stylesheet (recommended for major customizations)

## Browser Support

This theme supports all modern browsers including:
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## WordPress Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- MySQL 5.6 or higher

## Support

This theme was developed by Eye Appeal Inc for Newport First Presbyterian Church. For support or customization requests, please contact the development team.

## Changelog

### Version 1.0.0
- Initial release
- Custom post types for Sermons and Events
- Theme customizer integration
- Responsive design
- Social media integration
- Church-specific customization options

## License

This theme is developed specifically for Newport First Presbyterian Church. All rights reserved.
