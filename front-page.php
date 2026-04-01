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
</main>

<?php get_footer();
