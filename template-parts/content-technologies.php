<?php

/**
 * Technologies section for the front page.
 *
 * @package csie
 */

$categories = [
    [
        'title' => __('Programming tools and Technologies', 'csie'),
        'fill'  => '#F8F8F8',
        'items' => [
            __('Microsoft .NET Framework', 'csie'),
            __('Microsoft Visual C++', 'csie'),
            __('Microsoft Visual C#', 'csie'),
            __('Microsoft Visual Basic', 'csie'),
            __('Microsoft Visual Basic .NET', 'csie'),
            __('ASP', 'csie'),
            __('ASP.NET', 'csie'),
            __('Web Services', 'csie'),
        ],
    ],
    [
        'title' => __('Database System', 'csie'),
        'fill'  => '#FFFFFF',
        'items' => [
            __('Microsoft SQL Server', 'csie'),
            __('Microsoft Analysis Services', 'csie'),
            __('Microsoft Reporting Services', 'csie'),
            __('Microsoft Access', 'csie'),
            __('Oracle SQL Server', 'csie'),
        ],
    ],
];

$img_dir = esc_url(get_template_directory_uri() . '/assets/img/');
?>

<section class="relative py-12.5 lg:py-25 bg-white before:content-[''] before:block before:absolute before:top-0 before:w-full before:h-[350px] before:bg-[#004F86]">
    <div class="container relative flex justify-between items-end re mx-auto lg:max-w-300 px-3.75 lg:px-0 overflow-hidden">
        <div>
            <div class="swiper csie-technologies-swiper w-[320px] lg:w-[660px] h-fit" style="overflow: visible;">
                <div class="swiper-wrapper">
                    <?php foreach ($categories as $category) : ?>
                        <div class="swiper-slide">
                            <div>
                                <div class="tag w-[360px] min-h-[460px] pt-20 px-10 pb-10"
                                    style="background-color: <?php echo esc_attr($category['fill']); ?>; clip-path: polygon(125px 0%, 155px 40px, 100% 40px, 100% 100%, 0 100%, 0% 0%, 0 0)">
                                    <h4 class="text-[#222] text-2xl font-bold uppercase leading-[1.2] mb-5"><?php echo esc_html($category['title']); ?></h4>
                                    <ul class="flex flex-col gap-2.5 text-base not-italic font-normal text-[#606060] list-none">
                                        <?php foreach ($category['items'] as $item) : ?>
                                            <li class="flex items-center gap-2.5"><span class="size-1.25 shrink-0 bg-[#00b1ff]"></span><?php echo esc_html($item); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="w-[390px] h-[520px] z-10 hidden lg:block">
            <img
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/technologies-building.png'); ?>"
                alt="<?php esc_attr_e('CS&IE Data Consulting team', 'csie'); ?>"
                class="w-full h-full object-cover">
        </div>
    </div>
</section>