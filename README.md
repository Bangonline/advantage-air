# Advantage Air WordPress Theme

Custom WordPress theme for Advantage Air, built on the Underscores starter theme with WooCommerce integration, SCSS compilation, and custom functionality.

---

## Repository & Deployment

**GitHub Repository**: https://github.com/Bangonline/advantage-air

### Branch & Environment

| Branch | Environment | WP Engine Install | Auto-Deploy |
|--------|-------------|-------------------|-------------|
| `main` | Production | `advantageair1` | ✅ Yes |

**Note:** This site has no staging environment - all commits to `main` deploy directly to production.

### Deployment Workflow

**Complete deployment guide:** `docs/standards/PROCESSES/WPENGINE_DEPLOYMENT.md`

**Deploy to Production:**
```bash
git checkout main
# Make changes
git add .
git commit -m "Your changes"
git push origin main  # Auto-deploys to advantageair1 (live site)
```

### GitHub Actions

- `.github/workflows/deploy-production.yml` - Auto-deploys `main` → advantageair1

**What gets deployed:**
- All theme files except: `node_modules/`, `src/`, `.storybook/`, hidden files
- Compiled assets are included
- Source files (SCSS, Storybook) are excluded from deployment

---

## Local Development

### Prerequisites

- Local by Flywheel or similar WordPress local environment
- Node.js and npm (if using build tools)

### Setup

1. **Clone repository:**
   ```bash
   git clone https://github.com/Bangonline/advantage-air.git
   cd advantage-air
   ```

2. **Install theme** in WordPress:
   - Copy to `wp-content/themes/bang-digital/`
   - Activate in WordPress admin

### SCSS Development

The theme uses SCSS for styling with automatic compilation:

- **Source files**: `/scss/` directory
- **Compiled output**: `/css/` directory (tracked in Git)
- **Local compilation**: Via WP-SCSS plugin when SCSS files are modified
- **Staging/Production**: Uses pre-compiled CSS files (included in repository)

**Important**: After modifying SCSS files locally, ensure the compiled CSS is committed to Git for deployment.

---

## Features

- **Custom Logo, Header, and Background**: Easily set your own branding and background
- **Post Thumbnails**: Featured images for posts and pages
- **HTML5 Markup**: Modern, semantic templates
- **Multiple Navigation Menus**: Primary, top, smart aircon, support, and legal menus
- **Widget Areas**: Sidebar support for widgets
- **WooCommerce Integration**: Custom styles, product gallery features (zoom, swipe, lightbox)
- **SCSS/SASS Workflow**: Source styles in `scss/`, compiled CSS in `css/`
- **Custom JavaScript**: Scripts for navigation, accordions, tabs, Swiper, and Google Maps integration
- **Translation Ready**: Place translation files in the `languages/` directory

---

## Important Notes

**WP Rocket Conflicts:**
The following WP Rocket settings conflict with this theme:
- File Optimisation > JavaScript Files > Combine JavaScript Files - Breaks Accordions
- File Optimisation > JavaScript Files > Load JavaScript Deferred - Breaks Google Maps
- File Optimisation > JavaScript Files > Delay JavaScript Execution

---

## File Structure

```
bang-digital/
├── .github/workflows/       # GitHub Actions deployment
├── css/                     # Compiled CSS (tracked in git)
├── scss/                    # SCSS source files
├── js/                      # JavaScript files
├── woocommerce/             # WooCommerce template overrides
├── template-parts/          # Template components
├── inc/                     # PHP includes
├── languages/               # Translation files
├── functions.php            # Theme functionality
├── style.css               # Theme header (required by WordPress)
└── README.md               # This file
```

---

## WP Engine Environment

### Production (advantageair1)
- **URL**: www.advantageair.com.au (or production URL)
- **Purpose**: Live site
- **Branch**: `main`
- **Auto-deploy**: Yes

**⚠️ Important:** There is no staging environment. All changes deploy directly to production. Test thoroughly locally before pushing.

---

## Git Workflow Best Practices

1. **Test locally** before committing (no staging environment)
2. **Commit compiled CSS** along with SCSS changes:
   ```bash
   # After modifying SCSS and testing locally
   git add scss/ css/
   git commit -m "Update styles"
   ```
3. **Create feature branches** for larger changes:
   ```bash
   git checkout -b feature/new-feature
   # Work on feature, test thoroughly
   git push origin feature/new-feature
   # Create PR to main (review before merging)
   ```

---

## Troubleshooting

**Deployment Issues:**
1. Check [GitHub Actions](https://github.com/Bangonline/advantage-air/actions) logs
2. Review `docs/standards/PROCESSES/WPENGINE_DEPLOYMENT.md`
3. Verify WPEngine environment name in workflow file

**Common Issues:**
- Files not deploying → Check `.github/workflows/deploy-production.yml` configuration
- Permission denied → Verify SSH keys in WPEngine SSH Gateway
- CSS/JS not updating → Ensure compiled assets are committed to git
- See full troubleshooting guide in standards documentation

---

## Support

For issues or questions, contact Bang Digital development team.

**Repository**: https://github.com/Bangonline/advantage-air

---

## Credits

- Based on [Underscores](https://underscores.me/), (C) 2012-2020 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
- [normalize.css](https://necolas.github.io/normalize.css/), (C) 2012-2018 Nicolas Gallagher and Jonathan Neal, [MIT](https://opensource.org/licenses/MIT)

---

**Last Updated**: January 2026
**Deployment Status**: Production Active (No Staging)
