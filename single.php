<?php
/**
 * The template for displaying single posts.
 *
 * @package csie
 */

get_header(); ?>

<main id="content">
    <div class="max-w-[1200px] mx-auto px-[15px] xl:px-0 pt-8">
        <?php get_template_part('template-parts/content', 'breadcrumbs'); ?>
    </div>

    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/content', 'single'); ?>

        <div class="max-w-[1200px] mx-auto px-[15px] xl:px-0">
            <div class="mt-[30px] flex justify-between items-center border-t border-[#e5e5e5] pt-[25px]">
                <?php
                the_post_navigation([
                    'prev_text' => '<span class="text-[13px] text-[#888]">' . __('Previous', 'csie') . '</span><br><span class="text-[#004f86] font-medium">%title</span>',
                    'next_text' => '<span class="text-[13px] text-[#888]">' . __('Next', 'csie') . '</span><br><span class="text-[#004f86] font-medium">%title</span>',
                ]);
                ?>
            </div>

            <?php if (comments_open() || get_comments_number()) : ?>
                <div class="mt-[30px]">
                    <?php comments_template(); ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endwhile; ?>
</main>

<?php get_footer();
