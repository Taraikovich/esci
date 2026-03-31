<?php
/**
 * The template for displaying 404 pages.
 *
 * @package csie
 */

get_header(); ?>

<main id="content" class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">
    <div class="bg-white rounded-lg shadow-sm p-8 lg:p-12">
        <p class="text-8xl font-bold text-gray-200 mb-4">404</p>
        <h1 class="text-3xl font-bold mb-4"><?php esc_html_e('Page Not Found', 'csie'); ?></h1>
        <p class="text-gray-600 mb-8"><?php esc_html_e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'csie'); ?></p>

        <div class="mb-8">
            <?php get_search_form(); ?>
        </div>

        <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            <?php esc_html_e('Back to Home', 'csie'); ?>
        </a>
    </div>
</main>

<?php get_footer();
