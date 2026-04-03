<?php

/**
 * Microsoft Dynamics 365 section for the front page.
 *
 * @package csie
 */

$cards = [
    [
        'title' => __('Powerful', 'csie'),
        'text'  => __('A powerful foundation that is purpose-built for five industries: manufacturing, distribution, retail, services, and public sector, along with comprehensive, core ERP functionality for financial, human resources and operations management. All packaged in a single global solution thus giving customers a rapid time to value.', 'csie'),
        'image' => 'dynamics-powerful.png',
    ],
    [
        'title' => __('Agile', 'csie'),
        'text'  => __('Agility through a set of unified natural models that serve as a library of business processes reflecting real-world situations. This enables customers to easily modify their organizations and processes to meet their changing business needs. Increase opportunities and reduce risk with an easy-to-use solution.', 'csie'),
        'image' => 'dynamics-agile.png',
    ],
    [
        'title' => __('Simple', 'csie'),
        'text'  => __('Agility through a set of unified natural models that serve as a library of business processes reflecting real-world situations. This enables customers to easily modify their organizations and processes to meet their changing business needs. Increase opportunities and reduce risk with an easy-to-use solution.', 'csie'),
        'image' => 'dynamics-simple.png',
    ],
];

$img_dir = esc_url(get_template_directory_uri() . '/assets/img/');
?>

<section class="bg-white pt-[30px] pb-0 lg:py-[50px]">
    <div class="max-w-[1200px] mx-auto px-[15px] xl:px-0">
        <!-- Title -->
        <h2 class="text-[25px] lg:text-[40px] font-bold uppercase leading-[1.2] text-[#353535] mb-[30px] lg:mb-[50px]">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#df4253] to-[#004f86]"><?php esc_html_e('Microsoft Dynamics 365', 'csie'); ?></span>
            <?php echo esc_html__('- Powerfully Simple', 'csie'); ?>
        </h2>

        <!-- Cards -->
        <div class="flex flex-wrap gap-[10px] lg:gap-[20px]">
            <?php foreach ($cards as $card) : ?>
                <div class="group bg-[#f8f8f8] flex flex-col gap-[20px] p-[25px] lg:p-[30px] w-full sm:w-[330px] lg:w-[calc(33.333%-14px)]">
                    <!-- Card header -->
                    <div class="flex items-center justify-between">
                        <h3 class="text-[20px] lg:text-[24px] font-bold uppercase leading-[1.2] text-[#353535]">
                            <?php echo esc_html($card['title']); ?>
                        </h3>
                        <div class="relative w-[70px] h-[60px] lg:w-[125px] lg:h-[106px] shrink-0">
                            <div class="absolute left-0 top-0 size-[29px] lg:size-[52px] bg-[#00b1ff]"></div>
                            <div class="absolute right-0 bottom-0 size-[29px] lg:size-[52px] bg-[#004f86]"></div>
                            <img
                                src="<?php echo $img_dir . esc_attr($card['image']); ?>"
                                alt="<?php echo esc_attr($card['title']); ?>"
                                class="absolute inset-0 m-auto w-[49px] h-[49px] lg:w-[86px] lg:h-[87px] object-contain transition-transform duration-500 group-hover:scale-120">
                        </div>
                    </div>
                    <!-- Card text -->
                    <p class="text-[14px] lg:text-base leading-[1.2] text-[#606060]">
                        <?php echo esc_html($card['text']); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>