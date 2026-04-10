<?php

/**
 * The service page template.
 *
 * Template name: Service Page (simple)
 * @package csie
 */

get_header(); ?>

<main id="content">
    <div class="max-w-[1200px] mx-auto px-[15px] xl:px-0 pt-8">
        <?php get_template_part('template-parts/content', 'breadcrumbs'); ?>
    </div>

    <?php get_template_part('template-parts/content', 'service-hero'); ?>
    <?php get_template_part('template-parts/content', 'service-nav'); ?>
    <?php get_template_part('template-parts/content', 'service-simple-sections'); ?>
</main>

<?php get_footer();
