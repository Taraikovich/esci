<?php
/**
 * The template for displaying pages.
 *
 * @package csie
 */

get_header(); ?>

<main id="content">
    <div class="max-w-[1200px] mx-auto px-[15px] xl:px-0 pt-8">
        <?php get_template_part('template-parts/content', 'breadcrumbs'); ?>
    </div>

    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/content', 'page'); ?>

        <?php if (comments_open() || get_comments_number()) : ?>
            <div class="max-w-[1200px] mx-auto px-[15px] xl:px-0">
                <?php comments_template(); ?>
            </div>
        <?php endif; ?>
    <?php endwhile; ?>
</main>

<?php get_footer();
