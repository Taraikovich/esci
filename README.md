# csie — WordPress Theme

A clean, modern, universal WordPress theme powered by **Tailwind CSS v4**, **Vite**, and **ACF Pro**.

## Requirements

- PHP 7.4+
- WordPress 6.0+
- Node.js 18+ and npm
- [ACF Pro](https://www.advancedcustomfields.com/pro/) plugin (required — all content on the home and service pages is driven by ACF)
- WP-CLI (recommended, used for provisioning ACF fields)

## Local setup

The theme expects a local WordPress install at `/home/wordpress/www`. WP-CLI commands are run with:

```bash
wp --path=/home/wordpress/www --allow-root
```

### 1. Clone into the themes directory

```bash
cd /home/wordpress/www/wp-content/themes
git clone <repo-url> csie
cd csie
```

### 2. Install dependencies

```bash
npm install
```

### 3. Build assets

```bash
npm run build
```

This produces hashed files in `dist/assets/` and a manifest at `dist/.vite/manifest.json`. The manifest is read by `csie_vite_asset()` in `functions.php` so the theme can enqueue the correct files.

### 4. Activate the theme

In `wp-admin → Appearance → Themes`, or via WP-CLI:

```bash
wp --path=/home/wordpress/www --allow-root theme activate csie
```

### 5. Install and activate ACF Pro

ACF Pro is required. Install the plugin and activate it before working with the home or service page templates.

### 6. Register menus

The theme uses three menu locations:

- `primary` — main header navigation
- `secondary` — blue bar beneath the header
- `footer` — footer columns (rendered via `Csie_Footer_Walker`)

Create menus in `Appearance → Menus` and assign them to the matching locations.

## Development workflow

### Watch mode

```bash
npm run dev
```

Vite rebuilds CSS/JS on every change in `src/`. You still need to refresh the browser — there is no HMR for PHP templates.

### Production build

```bash
npm run build
```

Always run `npm run build` after editing any file in `src/` (especially when adding Tailwind classes in PHP templates — Tailwind v4 scans source files at build time, so new classes won't exist until you rebuild).

### Deploy

Two helper scripts are available (inspect them before first use to match your environment):

```bash
npm run deploy:local   # deploy to a local target
npm run deploy         # deploy to remote
```

## Project structure

```
style.css              Theme metadata (WP header only, no styles)
functions.php          Setup, enqueues, helpers (csie_vite_asset, csie_is_light_color)
header.php / footer.php
front-page.php         Home page (Template name: Front Page)
service-page.php       Service page template
page.php / single.php / archive.php / search.php / 404.php
comments.php / sidebar.php
template-parts/        Section partials (content-*.php)
inc/                   Reserved for future includes
src/
  css/app.css          Tailwind v4 entry, Min Sans font-face
  js/app.js            Swiper sliders, mobile menu, search, submenus
assets/
  fonts/               Min Sans (100–900, WOFF2)
  img/                 Logos, patterns, photos, partner marks
vite.config.js
```

## Editing pages

- **Home page** — ACF field group "Home page" (ID 127), bound to `front-page.php` / page "Home" (ID 133).
- **Service pages** — ACF field group "Service page" (ID 194), bound to `service-page.php`.

See [CLAUDE.md](CLAUDE.md) for the full section/field map and the WP-CLI recipes for creating ACF fields, repeaters, and image fields (including the required `_field_name` reference meta).

## Conventions

- All PHP functions are prefixed with `csie_`
- Text domain: `csie` — wrap strings in `__()`, `_e()`, `esc_html_e()`
- Escape every output: `esc_html()`, `esc_url()`, `esc_attr()`
- PHP files omit the closing `?>`
- Style with Tailwind utility classes directly in templates
- Style `the_content()` output with arbitrary variants (`[&>p]:mb-4`, etc.)
- Use inline `style=""` for dynamic colors coming from ACF color_picker (not Tailwind classes)

## Adding a new template

1. Create a PHP file in the theme root (e.g. `front-page.php`) with the appropriate `Template Name:` header.
2. Wrap the output in `get_header()` / `get_footer()` (and `get_sidebar()` where needed).
3. Break content into `template-parts/content-*.php` partials loaded via `get_template_part()`.
4. Run `npm run build` so Tailwind picks up any new utility classes.
