<?php
/**
 * Template part for displaying results in search pages.
 *
 * @package csie
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-lg shadow-sm p-6 mb-6'); ?>>
    <h2 class="text-lg font-bold mb-2">
        <a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-blue-600 transition-colors">
            <?php the_title(); ?>
        </a>
    </h2>

    <div class="flex items-center gap-3 text-sm text-gray-500 mb-2">
        <span><?php echo esc_html(get_post_type_object(get_post_type())->labels->singular_name); ?></span>
        <span>&middot;</span>
        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
    </div>

    <div class="text-gray-600 text-sm">
        <?php the_excerpt(); ?>
    </div>
</article>
