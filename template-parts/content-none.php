<?php
/**
 * Template part for displaying a message when no posts are found.
 *
 * @package csie
 */
?>

<section class="bg-white rounded-lg shadow-sm p-8 text-center">
    <h2 class="text-2xl font-bold mb-4"><?php esc_html_e('Nothing Found', 'csie'); ?></h2>

    <?php if (is_search()) : ?>
        <p class="text-gray-600 mb-6"><?php esc_html_e('Sorry, no results matched your search. Please try again with different keywords.', 'csie'); ?></p>
        <?php get_search_form(); ?>
    <?php else : ?>
        <p class="text-gray-600 mb-6"><?php esc_html_e('It seems we can\'t find what you\'re looking for. Perhaps a search might help.', 'csie'); ?></p>
        <?php get_search_form(); ?>
    <?php endif; ?>
</section>
