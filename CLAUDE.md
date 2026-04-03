# csie — WordPress Theme

Универсальная классическая WordPress PHP-тема с Tailwind CSS v4 и Vite.

## Команды

```bash
npm run dev      # Watch-режим (Vite пересобирает при изменениях)
npm run build    # Продакшн-сборка CSS/JS в dist/
```

## Локальный WordPress

- Путь: `/home/wordpress/www`
- WP-CLI: `wp --path=/home/wordpress/www --allow-root`

## Сборка

- **Vite** собирает `src/js/app.js` (точка входа) → `dist/assets/app-[hash].css` + `dist/assets/app-[hash].js`
- **Tailwind CSS v4** подключён через `@tailwindcss/vite` плагин
- Манифест `dist/.vite/manifest.json` читается в `functions.php` хелпером `csie_vite_asset()`
- После любых изменений в `src/` нужно запустить `npm run build`

## Структура

```
style.css              — метаданные темы (без стилей, только WP-заголовок)
functions.php          — csie_setup(), csie_scripts(), csie_widgets_init(), csie_vite_asset(), csie_is_light_color()
header.php             — шапка: логотип, primary menu, secondary menu (синяя полоса), мобильное меню, поиск
footer.php             — подвал: лого, контакты, footer menu (Csie_Footer_Walker), CTA-кнопка
front-page.php         — главная страница (Template name: Front Page)
index.php              — главный шаблон (fallback)
single.php             — одиночный пост (с sidebar)
page.php               — статическая страница (full-width, без sidebar)
archive.php            — архивы (категории, теги, даты, авторы)
search.php             — результаты поиска
404.php                — страница не найдена
comments.php           — комментарии
sidebar.php            — основной сайдбар (sidebar-1)
inc/                   — пока пусто, для будущих includes
template-parts/        — переиспользуемые части шаблонов
src/css/app.css        — точка входа CSS (Tailwind v4, кастомные шрифты Min Sans)
src/js/app.js          — Swiper-слайдеры, мобильное меню, поиск, подменю
vite.config.js         — конфиг сборки
assets/fonts/          — Min Sans (100–900) в WOFF2
assets/img/            — изображения (логотип, паттерны, фото, партнёры)
```

## Главная страница (front-page.php)

Секции загружаются через `get_template_part()`:

| Секция | Файл | Источник данных |
|--------|------|-----------------|
| Hero | `content-hero.php` | ACF: `hero-h1`, `hero-subtitle` |
| Services | `content-services.php` | ACF: `services_title`, `services_button_text`, `services_button_link`, `services_items` (repeater) |
| Dynamics | `content-dynamics.php` | Захардкожен |
| Technologies | `content-technologies.php` | Захардкожен |
| About | `content-about.php` | Захардкожен |
| Automation | `content-automation.php` | Захардкожен |
| Research | `content-research.php` | Захардкожен |
| Partners | `content-partners.php` | Захардкожен |

## ACF

- Плагин: ACF Pro
- Группа полей **"Home page"** — привязана к шаблону `front-page.php`, страница Home (ID 133)
- Поля для hero и services уже на ACF, остальные секции — захардкожены в PHP-массивах
- При добавлении новых ACF-полей через WP-CLI: не забывать `_field_name` → `field_key` reference-мету

## Swiper-слайдеры

4 слайдера в `src/js/app.js`, брейкпоинт десктопа — `1024px`:

- `.csie-services-swiper` — 1 → 3 слайда, touch отключён на десктопе
- `.csie-automation` — 1.2 → 4 слайда
- `.csie-research-swiper` — 1 → 3 слайда, gap 20px
- `.csie-technologies-swiper` — 1 → 2 слайда

## Соглашения

- Все PHP-функции с префиксом `csie_`
- Text domain: `csie` — все строки в `__()` / `_e()` / `esc_html_e()`
- Экранирование: `esc_html()`, `esc_url()`, `esc_attr()` для вывода
- PHP-файлы без закрывающего `?>`
- Стилизация через Tailwind-классы прямо в шаблонах
- Типографика контента (`the_content()`) — через CSS arbitrary variants `[&>p]:mb-4` и т.д.
- Динамические цвета (из ACF color_picker) — через inline `style=`, не Tailwind-классы

## Меню и сайдбары

- Меню: `primary` (шапка), `secondary` (синяя полоса под шапкой), `footer` (подвал)
- Footer-меню рендерится через `Csie_Footer_Walker` — уровень 1 как заголовки колонок, уровень 2 как ссылки
- Сайдбары: `sidebar-1` (основной), `sidebar-footer-1/2/3` (три колонки в footer)
- Tailwind-классы для ссылок меню применяются через фильтр `nav_menu_link_attributes`

## Добавление нового шаблона

1. Создать PHP-файл в корне (например `front-page.php`)
2. Использовать `get_header()` / `get_footer()` / `get_sidebar()`
3. Контент вынести в `template-parts/content-*.php`
4. Запустить `npm run build` чтобы Tailwind подхватил новые классы
