<?php

/**
 * The front page template.
 *
 * Template name: Front Page
 * @package csie
 */

get_header(); ?>

<main id="content">
    <?php get_template_part('template-parts/content', 'hero'); ?>
    <?php get_template_part('template-parts/content', 'services'); ?>
    <?php get_template_part('template-parts/content', 'dynamics'); ?>
    <?php get_template_part('template-parts/content', 'technologies'); ?>
    <?php get_template_part('template-parts/content', 'about'); ?>
    <?php get_template_part('template-parts/content', 'automation'); ?>
    <?php get_template_part('template-parts/content', 'research'); ?>
</main>

<?php get_footer();
