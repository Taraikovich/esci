<?php
/**
 * The main template file.
 *
 * @package csie
 */

get_header(); ?>

<main id="content" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/content', get_post_type()); ?>
                <?php endwhile; ?>

                <div class="mt-8">
                    <?php
                    the_posts_pagination([
                        'prev_text' => __('&laquo; Previous', 'csie'),
                        'next_text' => __('Next &raquo;', 'csie'),
                        'mid_size'  => 2,
                    ]);
                    ?>
                </div>
            <?php else : ?>
                <?php get_template_part('template-parts/content', 'none'); ?>
            <?php endif; ?>
        </div>

        <?php get_sidebar(); ?>
    </div>
</main>

<?php get_footer();
