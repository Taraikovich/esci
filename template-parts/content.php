<?php
/**
 * Template part for displaying posts in loops.
 *
 * @package csie
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-lg shadow-sm p-6 mb-6'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>" class="block mb-4">
            <?php the_post_thumbnail('large', ['class' => 'w-full h-48 object-cover rounded-md']); ?>
        </a>
    <?php endif; ?>

    <?php
    $csie_categories = get_the_category();
    if ($csie_categories) : ?>
        <div class="mb-2">
            <?php foreach ($csie_categories as $csie_cat) : ?>
                <a href="<?php echo esc_url(get_category_link($csie_cat->term_id)); ?>" class="text-xs font-medium text-blue-600 hover:text-blue-800 uppercase tracking-wide">
                    <?php echo esc_html($csie_cat->name); ?>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <h2 class="text-xl font-bold mb-2">
        <a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-blue-600 transition-colors">
            <?php the_title(); ?>
        </a>
    </h2>

    <div class="flex items-center gap-3 text-sm text-gray-500 mb-3">
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

    <div class="text-gray-600 mb-4">
        <?php the_excerpt(); ?>
    </div>

    <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium text-sm transition-colors">
        <?php esc_html_e('Read More', 'csie'); ?>
        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
    </a>
</article>
