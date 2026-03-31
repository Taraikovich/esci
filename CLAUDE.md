# csie — WordPress Theme

Универсальная классическая WordPress PHP-тема с Tailwind CSS v4 и Vite.

## Команды

```bash
npm run dev      # Watch-режим (Vite пересобирает при изменениях)
npm run build    # Продакшн-сборка CSS/JS в dist/
```

## Сборка

- **Vite** собирает `src/js/app.js` (точка входа) → `dist/assets/app-[hash].css` + `dist/assets/app-[hash].js`
- **Tailwind CSS v4** подключён через `@tailwindcss/vite` плагин
- Манифест `dist/.vite/manifest.json` читается в `functions.php` хелпером `csie_vite_asset()`
- После любых изменений в `src/` нужно запустить `npm run build`

## Структура

```
style.css              — метаданные темы (без стилей, только WP-заголовок)
functions.php          — csie_setup(), csie_scripts(), csie_widgets_init(), csie_vite_asset()
header.php / footer.php — обёртка страницы, навигация, footer-виджеты
index.php              — главный шаблон (fallback)
single.php             — одиночный пост
page.php               — статическая страница (full-width, без sidebar)
archive.php            — архивы (категории, теги, даты, авторы)
search.php             — результаты поиска
404.php                — страница не найдена
comments.php           — комментарии
sidebar.php            — основной сайдбар (sidebar-1)
template-parts/        — переиспользуемые части шаблонов
src/css/app.css        — точка входа CSS (Tailwind v4)
src/js/app.js          — точка входа JS (импортирует CSS, mobile nav toggle)
vite.config.js         — конфиг сборки
```

## Соглашения

- Все PHP-функции с префиксом `csie_`
- Text domain: `csie` — все строки в `__()` / `_e()` / `esc_html_e()`
- Экранирование: `esc_html()`, `esc_url()`, `esc_attr()` для вывода
- PHP-файлы без закрывающего `?>`
- Стилизация через Tailwind-классы прямо в шаблонах
- Типографика контента (`the_content()`) — через CSS arbitrary variants `[&>p]:mb-4` и т.д.

## Меню и сайдбары

- Меню: `primary` (шапка), `footer` (подвал)
- Сайдбары: `sidebar-1` (основной), `sidebar-footer-1/2/3` (три колонки в footer)
- Tailwind-классы для ссылок меню применяются через фильтр `nav_menu_link_attributes`

## Добавление нового шаблона

1. Создать PHP-файл в корне (например `front-page.php`)
2. Использовать `get_header()` / `get_footer()` / `get_sidebar()`
3. Контент вынести в `template-parts/content-*.php`
4. Запустить `npm run build` чтобы Tailwind подхватил новые классы
