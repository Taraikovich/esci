<?php

/**
 * The company page template.
 *
 * Template name: Company Page
 * @package csie
 */

get_header(); ?>

<main id="content">
    <div class="max-w-[1200px] mx-auto px-[15px] xl:px-0 pt-8">
        <?php get_template_part('template-parts/content', 'breadcrumbs'); ?>
    </div>

    <?php get_template_part('template-parts/content', 'company-hero'); ?>
    <?php get_template_part('template-parts/content', 'company-about'); ?>
    <?php get_template_part('template-parts/content', 'company-profile'); ?>
    <?php get_template_part('template-parts/content', 'company-expertise'); ?>
    <?php get_template_part('template-parts/content', 'company-cooperation'); ?>
    <?php get_template_part('template-parts/content', 'company-services'); ?>
    <?php get_template_part('template-parts/content', 'company-dynamics'); ?>
    <?php get_template_part('template-parts/content', 'company-webdev'); ?>
    <?php get_template_part('template-parts/content', 'company-consulting'); ?>
</main>

<?php get_footer();
