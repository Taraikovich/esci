<?php

/**
 * About section for the front page.
 *
 * @package csie
 */

$about_items = get_field('about_items');

if (! $about_items) {
    return;
}

$pattern_url = esc_url(get_template_directory_uri() . '/assets/img/pattern-research.png');
?>

<section class="relative bg-[#f8f8f8] overflow-hidden py-[70px] lg:py-[100px]">
    <!-- Decorative pattern -->
    <img
        src="<?php echo $pattern_url; ?>"
        alt=""
        class="absolute inset-0 size-full object-cover pointer-events-none"
        aria-hidden="true">

    <div class="relative max-w-[1200px] mx-auto px-[15px] xl:px-0">
        <!-- Desktop: row, Mobile: column -->
        <div class="flex flex-col lg:flex-row gap-[50px] lg:gap-[20px] items-flex-start">
            <?php foreach ($about_items as $item) : ?>
                <div class="group flex flex-col items-center gap-[20px] w-full lg:w-1/3">
                    <div class="flex items-center justify-center size-[52px] bg-[#00b1ff] transition-transform duration-500 group-hover:scale-130">
                        <span class="text-[20px] lg:text-[24px] font-bold uppercase leading-[1.2] text-white">
                            <?php echo esc_html($item['about_number']); ?>
                        </span>
                    </div>
                    <p class="text-[14px] lg:text-base font-medium leading-[1.2] text-[#353535] text-center max-w-[350px]">
                        <?php echo esc_html($item['about_text']); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>