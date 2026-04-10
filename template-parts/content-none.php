<?php
/**
 * Template part for displaying a message when no posts are found.
 *
 * @package csie
 */
?>

<section class="text-center py-[50px] lg:py-[80px]">
    <h2 class="text-[24px] lg:text-[32px] font-bold text-[#004f86] mb-[15px]"><?php esc_html_e('Nothing Found', 'csie'); ?></h2>

    <?php if (is_search()) : ?>
        <p class="text-[#353535] text-[14px] lg:text-[16px] leading-[1.6] mb-[25px]"><?php esc_html_e('Sorry, no results matched your search. Please try again with different keywords.', 'csie'); ?></p>
        <?php get_search_form(); ?>
    <?php else : ?>
        <p class="text-[#353535] text-[14px] lg:text-[16px] leading-[1.6] mb-[25px]"><?php esc_html_e('It seems we can\'t find what you\'re looking for. Perhaps a search might help.', 'csie'); ?></p>
        <?php get_search_form(); ?>
    <?php endif; ?>
</section>
