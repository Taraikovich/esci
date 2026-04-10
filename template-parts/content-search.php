<?php
/**
 * Template part for displaying results in search pages.
 *
 * @package csie
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('rounded-[20px] border border-[#e5e5e5] p-[20px] lg:p-[25px]'); ?>>
    <h2 class="text-[18px] lg:text-[20px] font-bold leading-[1.2] mb-[10px]">
        <a href="<?php the_permalink(); ?>" class="text-[#353535] hover:text-[#004f86] transition-colors">
            <?php the_title(); ?>
        </a>
    </h2>

    <div class="flex items-center gap-[8px] text-[13px] text-[#888] mb-[10px]">
        <span><?php echo esc_html(get_post_type_object(get_post_type())->labels->singular_name); ?></span>
        <span>&middot;</span>
        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
    </div>

    <div class="text-[#353535] text-[14px] leading-[1.6]">
        <?php the_excerpt(); ?>
    </div>
</article>
