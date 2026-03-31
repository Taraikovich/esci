<?php
/**
 * The template for displaying single posts.
 *
 * @package csie
 */

get_header(); ?>

<main id="content" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'single'); ?>

                <div class="mt-8 flex justify-between items-center border-t border-gray-200 pt-6">
                    <?php
                    the_post_navigation([
                        'prev_text' => '<span class="text-sm text-gray-500">' . __('Previous', 'csie') . '</span><br><span class="text-blue-600 font-medium">%title</span>',
                        'next_text' => '<span class="text-sm text-gray-500">' . __('Next', 'csie') . '</span><br><span class="text-blue-600 font-medium">%title</span>',
                    ]);
                    ?>
                </div>

                <?php
                if (comments_open() || get_comments_number()) {
                    comments_template();
                }
                ?>
            <?php endwhile; ?>
        </div>

        <?php get_sidebar(); ?>
    </div>
</main>

<?php get_footer();
