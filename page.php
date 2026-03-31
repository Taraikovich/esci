<?php
/**
 * The template for displaying pages.
 *
 * @package csie
 */

get_header(); ?>

<main id="content" class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/content', 'page'); ?>

        <?php
        if (comments_open() || get_comments_number()) {
            comments_template();
        }
        ?>
    <?php endwhile; ?>
</main>

<?php get_footer();
