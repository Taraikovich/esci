<?php

/**
 * The header for the theme.
 *
 * @package csie
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-gray-50 text-gray-900 font-sans antialiased'); ?>>
    <?php wp_body_open(); ?>

    <a class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 focus:z-50 focus:bg-white focus:px-4 focus:py-2 focus:rounded focus:shadow" href="#content">
        <?php esc_html_e('Skip to content', 'csie'); ?>
    </a>

    <header class="sticky top-0 z-40 bg-white">
        <!-- Top bar -->
        <div class="max-w-[1200px] mx-auto px-3.75 flex items-center justify-between py-[15px] lg:px-0 lg:pt-5 lg:pb-5">
            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="shrink-0">
                <img
                    src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo.svg'); ?>"
                    alt="<?php bloginfo('name'); ?>"
                    class="h-[30px] w-auto lg:h-10">
            </a>

            <!-- Desktop: Primary Menu -->
            <nav id="csie-primary-nav" class="hidden lg:flex items-center gap-10">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'items_wrap'     => '<ul class="csie-menu flex items-center gap-10 flex-wrap">%3$s</ul>',
                    'depth'          => 0,
                    'fallback_cb'    => false,
                ]);
                ?>
            </nav>

            <!-- Search + Language (centered on mobile) -->
            <div class="flex items-center gap-[15px] lg:gap-5">
                <!-- Search -->
                <button id="csie-search-toggle" type="button" class="shrink-0 text-[#353535] hover:text-[#004f86] transition-colors" aria-label="<?php esc_attr_e('Search', 'csie'); ?>" aria-expanded="false">
                    <svg class="size-[18px]" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.125 2.43C8.44 2.43 9.547 2.884 10.457 3.793C11.368 4.703 11.821 5.81 11.82 7.124C11.82 7.655 11.736 8.154 11.568 8.62C11.4 9.09 11.17 9.504 10.884 9.862L10.784 9.989L15.098 14.302C15.198 14.403 15.252 14.53 15.252 14.7C15.252 14.87 15.198 14.997 15.098 15.098C14.997 15.198 14.87 15.252 14.7 15.252C14.53 15.252 14.403 15.198 14.302 15.098L9.989 10.784L9.862 10.884C9.504 11.17 9.09 11.4 8.62 11.568C8.154 11.736 7.656 11.82 7.125 11.82C5.81 11.82 4.702 11.366 3.793 10.456C2.885 9.547 2.43 8.44 2.43 7.125C2.43 5.81 2.883 4.703 3.793 3.793C4.703 2.884 5.81 2.43 7.125 2.43ZM7.125 3.57C6.14 3.57 5.296 3.916 4.607 4.608C3.919 5.3 3.572 6.142 3.57 7.124C3.569 8.108 3.915 8.951 4.607 9.643C5.3 10.335 6.142 10.682 7.125 10.68C8.11 10.68 8.952 10.335 9.643 9.643C10.334 8.953 10.68 8.11 10.68 7.125C10.68 6.14 10.333 5.297 9.643 4.607C8.954 3.918 8.11 3.571 7.125 3.57Z" fill="currentColor" />
                    </svg>
                </button>

                <!-- Language switcher -->
                <div class="flex items-center gap-[5px] lg:gap-[7px] text-base leading-[1.2]">
                    <a href="#" class="font-bold text-[#004f86]">EN</a>
                    <span class="text-[#353535]">|</span>
                    <a href="#" class="text-[#353535] hover:text-[#004f86] transition-colors">DE</a>
                </div>
            </div>

            <!-- Mobile: Menu button -->
            <button
                id="csie-menu-toggle"
                type="button"
                class="lg:hidden bg-[#004f86] text-white text-sm leading-[1.2] px-[15px] h-[35px] rounded-full flex items-center shrink-0"
                aria-label="<?php esc_attr_e('Toggle menu', 'csie'); ?>"
                aria-expanded="false">
                <span id="csie-menu-label"><?php esc_html_e('menu', 'csie'); ?></span>
            </button>
        </div>

        <!-- Search dropdown -->
        <div id="csie-search-panel" class="grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-in-out border-t border-gray-100 bg-white">
            <div class="overflow-hidden">
                <div class="max-w-[1200px] mx-auto px-4 md:px-[15px] py-4">
                    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="flex gap-3">
                        <input
                            type="search"
                            name="s"
                            id="csie-search-input"
                            placeholder="<?php esc_attr_e('Search...', 'csie'); ?>"
                            value="<?php echo get_search_query(); ?>"
                            class="flex-1 border border-gray-300 rounded-lg px-4 py-2 text-base focus:outline-none focus:ring-2 focus:ring-[#004f86] focus:border-[#004f86] transition">
                        <button type="submit" class="bg-[#004f86] text-white px-6 py-2 rounded-lg hover:bg-[#003a63] transition-colors text-base">
                            <?php esc_html_e('Search', 'csie'); ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Desktop: Secondary Menu (blue bar) -->
        <?php if (has_nav_menu('secondary')) : ?>
            <nav class="hidden lg:block bg-[#004f86] w-full">
                <div class="max-w-[1200px] mx-auto py-3.75 lg:px-0 flex items-center justify-between">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'secondary',
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'depth'          => 1,
                        'fallback_cb'    => false,
                    ]);
                    ?>
                </div>
            </nav>
        <?php endif; ?>

        <!-- Mobile: Dropdown menu -->
        <div id="csie-mobile-menu" class="hidden lg:hidden border-t border-[rgba(0,79,134,0.05)] bg-white">
            <nav class="csie-mobile-nav px-4 py-4">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'items_wrap'     => '<ul class="csie-menu-mobile space-y-3">%3$s</ul>',
                    'depth'          => 0,
                    'fallback_cb'    => false,
                ]);
                ?>
            </nav>
            <?php if (has_nav_menu('secondary')) : ?>
                <nav class="px-4 py-4 space-y-3 border-t bg-[#004f86] border-[rgba(0,79,134,0.1)]">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'secondary',
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'depth'          => 1,
                        'fallback_cb'    => false,
                    ]);
                    ?>
                </nav>
            <?php endif; ?>
        </div>
    </header>