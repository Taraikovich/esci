<?php
/**
 * Template part for displaying page content.
 *
 * @package csie
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="py-[25px] lg:py-[50px]">
        <div class="max-w-[1200px] mx-auto px-[15px] xl:px-0">
            <h1 class="bg-gradient-to-r from-[#df4253] to-[#004f86] to-[65%] bg-clip-text text-transparent font-bold text-[27px] lg:text-[55px] leading-[1.2] uppercase text-center lg:text-left">
                <?php the_title(); ?>
            </h1>
        </div>

        <?php if (has_post_thumbnail()) : ?>
            <div class="w-full h-[400px] lg:h-[480px] mt-[30px] lg:mt-[40px] overflow-hidden">
                <?php the_post_thumbnail('full', ['class' => 'w-full h-full object-cover']); ?>
            </div>
        <?php endif; ?>
    </section>

    <section class="pb-[50px] lg:pb-[80px]">
        <div class="max-w-[1200px] mx-auto px-[15px] xl:px-0">
            <div class="max-w-none text-[#353535] text-[14px] lg:text-[16px] leading-[1.6] [&>p]:mb-4 [&>h2]:text-[20px] [&>h2]:lg:text-[28px] [&>h2]:font-bold [&>h2]:text-[#004f86] [&>h2]:mt-8 [&>h2]:mb-4 [&>h3]:text-[18px] [&>h3]:lg:text-[22px] [&>h3]:font-semibold [&>h3]:text-[#004f86] [&>h3]:mt-6 [&>h3]:mb-3 [&>ul]:list-disc [&>ul]:pl-6 [&>ul]:mb-4 [&>ol]:list-decimal [&>ol]:pl-6 [&>ol]:mb-4 [&>blockquote]:border-l-4 [&>blockquote]:border-[#004f86] [&>blockquote]:pl-4 [&>blockquote]:italic [&>blockquote]:text-[#353535] [&>blockquote]:my-4 [&>pre]:bg-gray-100 [&>pre]:rounded-md [&>pre]:p-4 [&>pre]:overflow-x-auto [&>pre]:mb-4 [&>img]:rounded-md [&>img]:my-4">
                <?php the_content(); ?>
            </div>

            <?php
            wp_link_pages([
                'before' => '<div class="mt-6 flex items-center gap-2 text-sm">' . __('Pages:', 'csie'),
                'after'  => '</div>',
            ]);
            ?>
        </div>
    </section>
</article>
