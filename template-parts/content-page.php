<?php
/**
 * Template part for displaying page content.
 *
 * @package csie
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-lg shadow-sm p-6 lg:p-8'); ?>>
    <h1 class="text-3xl font-bold mb-6"><?php the_title(); ?></h1>

    <?php if (has_post_thumbnail()) : ?>
        <div class="mb-6">
            <?php the_post_thumbnail('full', ['class' => 'w-full rounded-md']); ?>
        </div>
    <?php endif; ?>

    <div class="max-w-none [&>p]:mb-4 [&>h2]:text-2xl [&>h2]:font-bold [&>h2]:mt-8 [&>h2]:mb-4 [&>h3]:text-xl [&>h3]:font-semibold [&>h3]:mt-6 [&>h3]:mb-3 [&>ul]:list-disc [&>ul]:pl-6 [&>ul]:mb-4 [&>ol]:list-decimal [&>ol]:pl-6 [&>ol]:mb-4 [&>blockquote]:border-l-4 [&>blockquote]:border-gray-300 [&>blockquote]:pl-4 [&>blockquote]:italic [&>blockquote]:text-gray-600 [&>blockquote]:my-4 [&>pre]:bg-gray-100 [&>pre]:rounded-md [&>pre]:p-4 [&>pre]:overflow-x-auto [&>pre]:mb-4 [&>img]:rounded-md [&>img]:my-4">
        <?php the_content(); ?>
    </div>

    <?php
    wp_link_pages([
        'before' => '<div class="mt-6 flex items-center gap-2 text-sm">' . __('Pages:', 'csie'),
        'after'  => '</div>',
    ]);
    ?>
</article>
