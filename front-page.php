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
</main>

<?php get_footer();
