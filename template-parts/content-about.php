<?php

/**
 * About section for the front page.
 *
 * @package csie
 */

$about_items = [
    [
        'number' => '01',
        'text'   => __('We have been acquiring our experience and developing products, solutions, and customer projects using Microsoft technologies since 1995', 'csie'),
    ],
    [
        'number' => '02',
        'text'   => __('We are a Microsoft Gold Certified Partner in the competence "Enterprise Resource Planning" (Dynamics 365) and a Microsoft Silver Certified Partner in the competence "Application Development"', 'csie'),
    ],
    [
        'number' => '03',
        'text'   => __('We specialize in Microsoft .NET based development – consulting and programming – and outsourcing services', 'csie'),
    ],
];

$pattern_url = esc_url(get_template_directory_uri() . '/assets/img/pattern-about.png');
?>

<section class="relative bg-[#f8f8f8] overflow-hidden py-[70px] lg:py-[100px] my-6.25 lg:my-12.5">
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
                <div class="flex flex-col items-center gap-[20px] w-full lg:w-1/3">
                    <div class="flex items-center justify-center size-[52px] bg-[#00b1ff]">
                        <span class="text-[20px] lg:text-[24px] font-bold uppercase leading-[1.2] text-white">
                            <?php echo esc_html($item['number']); ?>
                        </span>
                    </div>
                    <p class="text-[14px] lg:text-base font-medium leading-[1.2] text-[#353535] text-center max-w-[350px]">
                        <?php echo esc_html($item['text']); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>