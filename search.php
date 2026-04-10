<?php

/**
 * The template for displaying search results.
 *
 * @package csie
 */

get_header(); ?>

<main id="content">
    <section class="py-[25px] lg:py-[50px]">
        <div class="max-w-[1200px] mx-auto px-[15px] xl:px-0">
            <header class="mb-[30px] lg:mb-[50px]">
                <h1 class="bg-gradient-to-r from-[#df4253] to-[#004f86] to-[65%] bg-clip-text text-transparent font-bold text-[27px] lg:text-[55px] leading-[1.2] uppercase">
                    <?php printf(esc_html__('Search Results for: %s', 'csie'), '<span class="text-[#004f86]" style="background: none; -webkit-text-fill-color: #004f86;">' . esc_html(get_search_query()) . '</span>'); ?>
                </h1>
            </header>

            <?php if (have_posts()) : ?>
                <div class="flex flex-col gap-[15px] lg:gap-[20px]">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/content', 'search'); ?>
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
