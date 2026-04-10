<?php

/**
 * Microsoft Dynamics 365 section for the front page.
 *
 * @package csie
 */

$dynamics_title        = get_field('dynamics_title');
$dynamics_title_suffix = get_field('dynamics_title_suffix');
$cards                 = get_field('dynamics_cards');

if (! $cards) {
    return;
}
?>

<section class="bg-white pt-[30px] pb-0 lg:py-[50px]">
    <div class="max-w-[1200px] mx-auto px-[15px] xl:px-0">
        <!-- Title -->
        <?php if ($dynamics_title || $dynamics_title_suffix) : ?>
            <h2 class="text-[25px] lg:text-[40px] font-bold uppercase leading-[1.2] text-[#353535] mb-[30px] lg:mb-[50px]">
                <?php if ($dynamics_title) : ?>
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#df4253] to-[#004f86]"><?php echo esc_html($dynamics_title); ?></span>
                <?php endif; ?>
                <?php if ($dynamics_title_suffix) : ?>
                    <?php echo esc_html($dynamics_title_suffix); ?>
                <?php endif; ?>
            </h2>
        <?php endif; ?>

        <!-- Cards -->
        <div class="flex flex-wrap gap-[10px] lg:gap-[20px]">
            <?php foreach ($cards as $card) :
                $image = $card['card_image'];
            ?>
                <div class="group bg-[#f8f8f8] flex flex-col gap-[20px] p-[25px] lg:p-[30px] w-full sm:w-[330px] lg:w-[calc(33.333%-14px)]">
                    <!-- Card header -->
                    <div class="flex items-center justify-between">
                        <h3 class="text-[20px] lg:text-[24px] font-bold uppercase leading-[1.2] text-[#353535]">
                            <?php echo esc_html($card['card_title']); ?>
                        </h3>
                        <div class="relative w-[70px] h-[60px] lg:w-[125px] lg:h-[106px] shrink-0">
                            <div class="absolute left-0 top-0 size-[29px] lg:size-[52px] bg-[#00b1ff] transition-colors duration-500 group-hover:bg-[#004f86]"></div>
                            <div class="absolute right-0 bottom-0 size-[29px] lg:size-[52px] bg-[#004f86] transition-colors duration-500 group-hover:bg-[#00b1ff]"></div>
                            <?php if ($image) : ?>
                                <img
                                    src="<?php echo esc_url($image['url']); ?>"
                                    alt="<?php echo esc_attr($card['card_title']); ?>"
                                    class="absolute inset-0 m-auto w-[49px] h-[49px] lg:w-[86px] lg:h-[87px] object-contain transition-transform duration-500 group-hover:scale-120">
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- Card text -->
                    <p class="text-[14px] lg:text-base leading-[1.2] text-[#606060]">
                        <?php echo esc_html($card['card_text']); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
