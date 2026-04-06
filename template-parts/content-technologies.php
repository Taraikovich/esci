<?php

/**
 * Technologies section for the front page.
 *
 * @package csie
 */

$categories = get_field('technologies_categories');

if (! $categories) {
    return;
}
?>

<section class="relative py-12.5 lg:py-25 bg-white before:content-[''] before:block before:absolute before:top-0 before:w-full before:h-[350px] before:bg-[#004F86]">
    <div class="container relative flex justify-between items-end mx-auto lg:max-w-300 px-3.75 lg:px-0 overflow-hidden">
        <div>
            <div class="swiper csie-technologies-swiper w-[320px] lg:w-[660px] h-fit" style="overflow: visible;">
                <div class="swiper-wrapper">
                    <?php foreach ($categories as $category) : ?>
                        <div class="swiper-slide">
                            <div>
                                <div class="tag w-[360px] min-h-[460px] pt-20 px-10 pb-10"
                                    style="background-color: <?php echo esc_attr($category['category_bg_color']); ?>; clip-path: polygon(125px 0%, 155px 40px, 100% 40px, 100% 100%, 0 100%, 0% 0%, 0 0)">
                                    <h4 class="text-[#222] text-2xl font-bold uppercase leading-[1.2] mb-5"><?php echo esc_html($category['category_title']); ?></h4>
                                    <?php if (!empty($category['category_items'])) : ?>
                                        <div class="text-base font-normal text-[#606060] [&_ul]:list-none [&_ul]:p-0 [&_ul]:m-0 [&_ul]:space-y-2.5 [&_li]:relative [&_li]:pl-[15px] [&_li]:before:content-[''] [&_li]:before:absolute [&_li]:before:left-0 [&_li]:before:top-[9px] [&_li]:before:size-1.25 [&_li]:before:bg-[#00b1ff]">
                                            <?php echo wp_kses_post($category['category_items']); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="w-[390px] h-[520px] z-10 hidden lg:block overflow-hidden">
            <img
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/technologies-building.png'); ?>"
                alt="<?php esc_attr_e('CS&IE Data Consulting team', 'csie'); ?>"
                class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
        </div>
    </div>
</section>
