<?php
/**
 * Template part for displaying posts in loops.
 *
 * @package csie
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('rounded-[20px] overflow-hidden bg-white border border-[#e5e5e5] flex flex-col'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>" class="block">
            <?php the_post_thumbnail('large', ['class' => 'w-full h-[200px] object-cover']); ?>
        </a>
    <?php endif; ?>

    <div class="p-[20px] lg:p-[25px] flex flex-col flex-1">
        <?php
        $csie_categories = get_the_category();
        if ($csie_categories) : ?>
            <div class="mb-[10px] flex flex-wrap gap-[8px]">
                <?php foreach ($csie_categories as $csie_cat) : ?>
                    <a href="<?php echo esc_url(get_category_link($csie_cat->term_id)); ?>" class="text-[12px] font-medium text-[#004f86] hover:text-[#00b1ff] uppercase tracking-wide transition-colors">
                        <?php echo esc_html($csie_cat->name); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <h2 class="text-[18px] lg:text-[20px] font-bold leading-[1.2] mb-[10px]">
            <a href="<?php the_permalink(); ?>" class="text-[#353535] hover:text-[#004f86] transition-colors">
                <?php the_title(); ?>
            </a>
        </h2>

        <div class="flex items-center gap-[8px] text-[13px] text-[#888] mb-[15px]">
            <span><?php echo esc_html(get_the_author()); ?></span>
            <span>&middot;</span>
            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
            <?php if (! post_password_required() && comments_open()) : ?>
                <span>&middot;</span>
                <?php comments_popup_link(
                    __('0 Comments', 'csie'),
                    __('1 Comment', 'csie'),
                    __('% Comments', 'csie'),
                    'hover:text-[#004f86] transition-colors'
                ); ?>
            <?php endif; ?>
        </div>

        <div class="text-[#353535] text-[14px] leading-[1.6] mb-[15px] flex-1">
            <?php the_excerpt(); ?>
        </div>

        <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-[#004f86] hover:text-[#00b1ff] font-medium text-[14px] transition-colors">
            <?php esc_html_e('Read More', 'csie'); ?>
            <svg class="w-[10px] h-[16px] ml-[8px] rotate-90" viewBox="0 0 11.5 17.5" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.75 16.75V0.75M5.75 0.75L10.75 5.84086M5.75 0.75L0.75 5.84086" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </div>
</article>
