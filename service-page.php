<?php

/**
 * The service page template.
 *
 * Template name: Service Page
 * @package csie
 */

get_header(); ?>

<main id="content">
    <div class="max-w-[1200px] mx-auto px-[15px] lg:px-0 pt-8">
        <?php get_template_part('template-parts/content', 'breadcrumbs'); ?>
    </div>

    <?php get_template_part('template-parts/content', 'service-hero'); ?>
    <?php get_template_part('template-parts/content', 'service-partnership'); ?>
    <?php get_template_part('template-parts/content', 'service-specialization'); ?>
    <?php get_template_part('template-parts/content', 'service-uniqueness'); ?>
    <?php get_template_part('template-parts/content', 'service-experience'); ?>
    <?php get_template_part('template-parts/content', 'service-research'); ?>
    <?php get_template_part('template-parts/content', 'service-solutions'); ?>
    <?php get_template_part('template-parts/content', 'service-ptm'); ?>

</main>

<?php get_footer();
