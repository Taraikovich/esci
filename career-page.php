<?php

/**
 * The career page template.
 *
 * Template name: Career Page
 * @package csie
 */

get_header(); ?>

<main id="content" class="relative overflow-hidden">
    <!-- Decorative pattern -->
    <div
        class="absolute inset-0 size-full -z-10 pointer-events-none bg-repeat opacity-60"
        style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/assets/img/pattern-research.png'); ?>'); background-size: 80%;"
        aria-hidden="true"></div>

    <div class="max-w-[1200px] mx-auto px-[15px] xl:px-0 pt-8">
        <?php get_template_part('template-parts/content', 'breadcrumbs'); ?>
    </div>

    <?php get_template_part('template-parts/content', 'career-hero'); ?>
    <?php get_template_part('template-parts/content', 'career-vacancies'); ?>
</main>

<?php get_footer();
