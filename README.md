[![Build Status](https://travis-ci.org/Automattic/_s.svg?branch=master)](https://travis-ci.org/Automattic/_s)

Bang Digital
============

Bang Digital is a modern, flexible WordPress theme designed and developed by Bang Digital. It is based on the Underscores starter theme, with enhancements for WooCommerce, custom layouts, and a streamlined development workflow using SASS/SCSS and custom JavaScript.

## Features

- **Custom Logo, Header, and Background**: Easily set your own branding and background.
- **Post Thumbnails**: Featured images for posts and pages.
- **HTML5 Markup**: Modern, semantic templates.
- **Multiple Navigation Menus**: Includes primary, top, smart aircon, support, and legal menus.
- **Widget Areas**: Sidebar support for widgets.
- **Customizer Support**: Live preview and customization of site title, description, and header.
- **WooCommerce Integration**: Custom styles, product gallery features (zoom, swipe, lightbox), and template overrides for a seamless shop experience.
- **SASS/SCSS Workflow**: Source styles in `scss/`, compiled CSS in `css/` automatically via the WP-SCSS plugin.
- **Custom JavaScript**: Scripts for navigation, accordions, tabs, Swiper, and Google Maps integration.
- **Translation Ready**: Place translation files in the `languages/` directory.

## Important Notes
---------------
WP Rocket conflicts with the following settings:
- File Optimisation > JavaScript Files > Combine JavaScript Files - Breaks Accordions
- File Optimisation > JavaScript Files > Load JavaScript Deferred - Breaks Google Maps
- File Optimisation > JavaScript Files > Delay JavaScript Execution

## Installation

### Standard Installation

1. In your WordPress admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload Theme and select the theme's `.zip` file. Click Install Now.
3. Click Activate to use your new theme.

No additional build or installation steps are required.

## Development Workflow

- **SASS Compilation**: Source files are in `scss/`. The [WP-SCSS plugin](https://wordpress.org/plugins/wp-scss/) automatically compiles these to CSS in the `css/` directory. No manual build process or CLI tools are required.
- **Custom JS**: All JavaScript is in the `js/` directory and enqueued as needed.
- **WooCommerce**: Custom templates and styles are in the `woocommerce/` and `css/woocommerce.css` files.

## Credits

- Based on [Underscores](https://underscores.me/), (C) 2012-2020 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
- [normalize.css](https://necolas.github.io/normalize.css/), (C) 2012-2018 Nicolas Gallagher and Jonathan Neal, [MIT](https://opensource.org/licenses/MIT)

## License

This theme is licensed under the GNU General Public License v2 or later. See the LICENSE file for details.
