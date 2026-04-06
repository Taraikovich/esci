<?php

/**
 * csie theme functions and definitions.
 *
 * @package csie
 */

if (! defined('ABSPATH')) {
    exit;
}

define('CSIE_VERSION', '1.0.0');

/**
 * Theme setup.
 */
function csie_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    register_nav_menus([
        'primary'   => __('Primary Menu', 'csie'),
        'secondary' => __('Secondary Menu', 'csie'),
        'footer'    => __('Footer Menu', 'csie'),
    ]);

    $GLOBALS['content_width'] = 1200;
}
add_action('after_setup_theme', 'csie_setup');

/**
 * Get Vite asset URL from manifest.
 */
function csie_vite_asset($entry, $type = 'file')
{
    static $manifest = null;

    if ($manifest === null) {
        $manifest_path = get_template_directory() . '/dist/.vite/manifest.json';
        if (file_exists($manifest_path)) {
            $manifest = json_decode(file_get_contents($manifest_path), true);
        } else {
            $manifest = false;
        }
    }

    if ($manifest && isset($manifest[$entry])) {
        if ($type === 'css' && isset($manifest[$entry]['css'][0])) {
            return get_template_directory_uri() . '/dist/' . $manifest[$entry]['css'][0];
        }
        return get_template_directory_uri() . '/dist/' . $manifest[$entry]['file'];
    }

    return false;
}

/**
 * Enqueue scripts and styles.
 */
function csie_scripts()
{
    wp_enqueue_style('csie-style', get_stylesheet_uri(), [], CSIE_VERSION);

    $css_url = csie_vite_asset('src/js/app.js', 'css');
    if ($css_url) {
        wp_enqueue_style('csie-app', $css_url, [], CSIE_VERSION);
    }

    $js_url = csie_vite_asset('src/js/app.js');
    if ($js_url) {
        wp_enqueue_script('csie-app', $js_url, [], CSIE_VERSION, true);
    }

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'csie_scripts');

/**
 * Register widget areas.
 */
function csie_widgets_init()
{
    register_sidebar([
        'name'          => __('Sidebar', 'csie'),
        'id'            => 'sidebar-1',
        'description'   => __('Main sidebar widget area.', 'csie'),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-6 p-4 bg-white rounded-lg shadow-sm">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title text-lg font-semibold mb-3">',
        'after_title'   => '</h3>',
    ]);

    for ($i = 1; $i <= 3; $i++) {
        register_sidebar([
            'name'          => sprintf(__('Footer %d', 'csie'), $i),
            'id'            => 'sidebar-footer-' . $i,
            'description'   => sprintf(__('Footer widget area %d.', 'csie'), $i),
            'before_widget' => '<div id="%1$s" class="widget %2$s mb-4">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title text-lg font-semibold mb-3 text-white">',
            'after_title'   => '</h3>',
        ]);
    }
}
add_action('widgets_init', 'csie_widgets_init');

/**
 * Footer menu walker — top-level items as column headings, children as links.
 */
class Csie_Footer_Walker extends Walker_Nav_Menu
{
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        if ($depth === 0) {
            $output .= '<div class="flex flex-col gap-[10px] font-medium text-sm items-center lg:items-start">';
        }
    }

    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        if ($depth === 0) {
            $output .= '</div></div>';
        }
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        if ($depth === 0) {
            $output .= '<div class="flex flex-col gap-[15px] lg:gap-5 lg:max-w-52 items-center lg:items-start">';
            $output .= '<h3 class="text-[20px] font-bold uppercase text-center lg:text-left">' . esc_html($item->title) . '</h3>';
        } else {
            $atts = [];
            $atts['href'] = ! empty($item->url) ? $item->url : '';
            $atts['class'] = 'hover:underline text-center lg:text-left';

            $attributes = '';
            foreach ($atts as $attr => $value) {
                if (! empty($value)) {
                    $attributes .= ' ' . $attr . '="' . esc_attr($value) . '"';
                }
            }

            $output .= '<a' . $attributes . '>' . esc_html($item->title) . '</a>';
        }
    }

    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        // Column closing is handled in end_lvl for top-level items
    }
}

/**
 * Add Tailwind classes to nav menu links.
 */
function csie_nav_menu_link_attributes($atts, $item, $args)
{
    if ($args->theme_location === 'primary') {
        $atts['class'] = 'text-[#353535] hover:text-[#00B1FF] transition-colors text-base leading-[1.2]';
    }
    if ($args->theme_location === 'secondary') {
        $atts['class'] = 'text-white hover:text-white/80 transition-colors text-base leading-[1.2]';
    }
    if ($args->theme_location === 'footer') {
        $atts['class'] = 'text-gray-400 hover:text-white transition-colors';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'csie_nav_menu_link_attributes', 10, 3);

/**
 * Allow SVG uploads.
 */
function csie_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'csie_mime_types');

/**
 * Check if a hex color is light (luminance > 0.5).
 */
function csie_is_light_color($hex)
{
    $hex = ltrim($hex, '#');
    $r = hexdec(substr($hex, 0, 2)) / 255;
    $g = hexdec(substr($hex, 2, 2)) / 255;
    $b = hexdec(substr($hex, 4, 2)) / 255;

    return (0.299 * $r + 0.587 * $g + 0.114 * $b) > 0.6;
}
