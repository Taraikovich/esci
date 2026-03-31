<?php
/**
 * Template part for displaying single post content.
 *
 * @package csie
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-lg shadow-sm p-6 lg:p-8'); ?>>
    <?php
    $csie_categories = get_the_category();
    if ($csie_categories) : ?>
        <div class="mb-3">
            <?php foreach ($csie_categories as $csie_cat) : ?>
                <a href="<?php echo esc_url(get_category_link($csie_cat->term_id)); ?>" class="text-xs font-medium text-blue-600 hover:text-blue-800 uppercase tracking-wide mr-2">
                    <?php echo esc_html($csie_cat->name); ?>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <h1 class="text-3xl font-bold mb-4"><?php the_title(); ?></h1>

    <div class="flex flex-wrap items-center gap-3 text-sm text-gray-500 mb-6">
        <span><?php echo esc_html(get_the_author()); ?></span>
        <span>&middot;</span>
        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
        <?php if (! post_password_required() && comments_open()) : ?>
            <span>&middot;</span>
            <?php comments_popup_link(
                __('0 Comments', 'csie'),
                __('1 Comment', 'csie'),
                __('% Comments', 'csie'),
                'text-gray-500 hover:text-blue-600'
            ); ?>
        <?php endif; ?>
    </div>

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

    <?php
    $csie_tags = get_the_tags();
    if ($csie_tags) : ?>
        <div class="mt-6 pt-6 border-t border-gray-200 flex flex-wrap gap-2">
            <?php foreach ($csie_tags as $csie_tag) : ?>
                <a href="<?php echo esc_url(get_tag_link($csie_tag->term_id)); ?>" class="inline-block bg-gray-100 text-gray-700 text-sm px-3 py-1 rounded-full hover:bg-gray-200 transition-colors">
                    #<?php echo esc_html($csie_tag->name); ?>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</article>
