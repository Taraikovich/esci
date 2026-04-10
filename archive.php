<?php

/**
 * The template for displaying archive pages.
 *
 * @package csie
 */

get_header(); ?>

<main id="content">
    <section class="py-[25px] lg:py-[50px]">
        <div class="max-w-[1200px] mx-auto px-[15px] xl:px-0">
            <header class="mb-[30px] lg:mb-[50px]">
                <?php the_archive_title('<h1 class="bg-gradient-to-r from-[#df4253] to-[#004f86] to-[65%] bg-clip-text text-transparent font-bold text-[27px] lg:text-[55px] leading-[1.2] uppercase">', '</h1>'); ?>
                <?php the_archive_description('<div class="text-[#353535] text-[14px] lg:text-[16px] leading-[1.6] mt-[15px]">', '</div>'); ?>
            </header>

            <?php if (have_posts()) : ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[20px] lg:gap-[30px]">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/content', get_post_type()); ?>
                    <?php endwhile; ?>
                </div>

                <div class="mt-[30px] lg:mt-[50px] flex justify-center">
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
    </section>
</main>

<?php get_footer();
