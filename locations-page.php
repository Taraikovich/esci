<?php

/**
 * The locations page template.
 *
 * Template name: Locations Page
 * @package csie
 */

get_header(); ?>

<main id="content">
    <div class="max-w-[1200px] mx-auto px-[15px] xl:px-0 pt-8">
        <?php get_template_part('template-parts/content', 'breadcrumbs'); ?>
    </div>

    <?php get_template_part('template-parts/content', 'locations-hero'); ?>
    <?php get_template_part('template-parts/content', 'locations-contact'); ?>
</main>

<?php get_footer();
