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
| Dynamics | `content-dynamics.php` | ACF: `dynamics_title`, `dynamics_title_suffix`, `dynamics_cards` (repeater: `card_title`, `card_text`, `card_image`) |
| Technologies | `content-technologies.php` | ACF: `technologies_categories` (repeater: `category_title`, `category_bg_color`, `category_items` wysiwyg) |
| About | `content-about.php` | ACF: `about_items` (repeater: `about_number`, `about_text`) |
| Automation | `content-automation.php` | ACF: `automation_title`, `automation_description`, `automation_button_text`, `automation_button_link`, `automation_cards` (repeater: `card_title`, `card_text`) |
| Research | `content-research.php` | ACF: `research_title`, `research_cards` (repeater: `card_title`, `card_description` wysiwyg, `card_items` wysiwyg) |
| Partners | `content-partners.php` | ACF: `partners_title`, `partners_items` (repeater: `partner_logo` image, `partner_name`) |

## ACF

- Плагин: ACF Pro
- Группа полей **"Home page"** (ID 127) — привязана к шаблону `front-page.php`, страница Home (ID 133)
- Группа полей **"Service page"** (ID 194) — привязана к шаблону `service-page.php`
- Все секции главной страницы на ACF

### Правила создания ACF-полей через WP-CLI

**Структура группы полей Service Page:**
Поля организованы по секциям через Tab-поля. Каждая секция имеет свой Tab, внутри которого лежат поля этой секции.

**Создание Tab-поля (для организации секций в админке):**
```bash
wp post create --post_type=acf-field --post_title='Tab Name' --post_excerpt='tab_slug' \
  --post_name='field_tab_slug_001' --post_parent=GROUP_ID --post_status=publish --menu_order=N \
  --post_content='a:8:{s:10:"aria-label";s:0:"";s:4:"type";s:3:"tab";s:12:"instructions";s:0:"";s:8:"required";i:0;s:17:"conditional_logic";i:0;s:7:"wrapper";a:3:{s:5:"width";s:0:"";s:5:"class";s:0:"";s:2:"id";s:0:"";}s:9:"placement";s:3:"top";s:8:"endpoint";i:0;}'
```

**Обязательные правила:**
1. Каждое поле — это `wp post create --post_type=acf-field`
2. `post_excerpt` = имя поля (slug), используется в `get_field('slug')`
3. `post_name` = уникальный field_key (формат: `field_prefix_name_001`)
4. `post_parent` = ID группы полей (194 для Service Page) или ID repeater-поля для sub-fields
5. При заполнении данных нужно создавать **два** мета-поля:
   - `wp post meta update PAGE_ID field_name "value"` — само значение
   - `wp post meta update PAGE_ID _field_name "field_key"` — reference-мета (связь с ACF)
6. Без reference-меты (`_field_name`) ACF не увидит значение через `get_field()`

**Типы полей и их `post_content` (serialized array):**

| Тип | `type` в массиве | Return format | Примечания |
|-----|-------------------|---------------|------------|
| Text | `text` | — | Простые заголовки |
| Textarea | `textarea` | — | Описания, `new_lines` => `br` для автопереносов |
| Image | `image` | `array` | Возвращает массив с `url`, `alt`, `width`, `height`. В БД хранится attachment ID |
| WYSIWYG | `wysiwyg` | — | Для текста со ссылками и HTML. `toolbar` => `basic`, `media_upload` => `0` |
| Select | `select` | `value` | Для выбора варианта (напр. `dark`/`light` стиль карточки) |
| URL | `url` | — | Для ссылок |
| Repeater | `repeater` | — | Карточки. Sub-fields создаются с `post_parent` = ID repeater-поля |

**Repeater — заполнение данных:**
```bash
# Количество строк
wp post meta update PAGE_ID repeater_name COUNT
wp post meta update PAGE_ID _repeater_name 'field_key_of_repeater'

# Каждая строка (нумерация с 0)
wp post meta update PAGE_ID repeater_name_0_subfield_name "value"
wp post meta update PAGE_ID _repeater_name_0_subfield_name 'field_key_of_subfield'
```

**Image-поле — заполнение:**
```bash
# Импорт в медиабиблиотеку
IMG_ID=$(wp media import /path/to/image.png --title='Title' --porcelain)
# Сохраняем attachment ID (не URL!)
wp post meta update PAGE_ID image_field_name "$IMG_ID"
wp post meta update PAGE_ID _image_field_name 'field_key'
```

**Именование полей — по секциям:**
- Поля секции группируются по префиксу: `partnership_title`, `partnership_description`, `partnership_image`
- Sub-fields repeater'ов: `card_title`, `card_text`, `card_image`, `card_link`, `card_content`, `card_style`

**Организация полей — Tab на каждую секцию:**
- Перед полями каждой секции создаётся Tab-поле для группировки в админке
- Tab → поля секции → следующий Tab → поля следующей секции
- Порядок `menu_order`: Tab идёт первым, затем поля секции по порядку
- Пример: Tab "Hero" (order 0) → `service_title` (order 1) → `service_description` (order 2) → Tab "Partnership" (order 3) → `partnership_title` (order 4) → ...

## Страница услуги (service-page.php)

Секции загружаются через `get_template_part()`:

| Секция | Файл | ACF-поля |
|--------|------|----------|
| Breadcrumbs | `content-breadcrumbs.php` | — (динамически из иерархии страниц) |
| Hero | `content-service-hero.php` | `service_title`, `service_description`, `service_hero_image` (image/array) |
| Partnership | `content-service-partnership.php` | `partnership_title`, `partnership_description`, `partnership_image` (image/array) |
| Specialization | `content-service-specialization.php` | `specialization_title`, `specialization_text`, `specialization_image` (image/array) |
| Uniqueness | `content-service-uniqueness.php` | `uniqueness_title`, `uniqueness_description`, `uniqueness_cards` (repeater: `card_title`, `card_text`, `card_image`) |
| Experience | `content-service-experience.php` | `experience_title`, `experience_cards` (repeater: `card_title`, `card_text`) |
| Research | `content-service-research.php` | `research_title`, `research_description`, `research_cards` (repeater: `card_title`, `card_content` wysiwyg, `card_style` select dark/light) |
| Solutions | `content-service-solutions.php` | `solutions_title`, `solutions_description` (wysiwyg), `solutions_cards` (repeater: `card_title`, `card_text`, `card_link`) |
| PTM | `content-service-ptm.php` | `ptm_title`, `ptm_description` (wysiwyg) |

## Swiper-слайдеры

Слайдеры в `src/js/app.js`, брейкпоинт десктопа — `1024px`:

**Главная:**
- `.csie-services-swiper` — 1 → 3 слайда, touch отключён на десктопе
- `.csie-automation` — 1.2 → 4 слайда, spaceBetween: -20
- `.csie-research-swiper` — 1 → 3 слайда, gap 20px
- `.csie-technologies-swiper` — 1 → 2 слайда

**Service Page:**
- `.csie-solutions-swiper` — 1.2 → 4 слайда, spaceBetween: -20 (clip-path карточки с наплыванием)
- `.csie-experience-swiper` — 1.2 слайда на мобилке, на десктопе Swiper отключён (enabled: false), раскладка через CSS flex-wrap 3 колонки с margin-top: -50px для нижнего ряда
- `.csie-uniqueness-swiper` — Grid: мобилка 1×3, десктоп 3×2 (модуль Grid)
- `.csie-service-research-swiper` — 1 → 2 слайда

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
