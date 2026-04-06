<?php

/**
 * Partners section for the front page.
 *
 * @package csie
 */

$partners_title = get_field('partners_title');
$partners       = get_field('partners_items');

if (! $partners) {
    return;
}
?>

<section class="py-[60px] lg:py-[100px] bg-white">
    <div class="max-w-[1200px] mx-auto px-[15px] xl:px-0">
        <?php if ($partners_title) : ?>
            <h2 class="text-[25px] lg:text-[40px] font-bold uppercase leading-[1.2] text-[#353535] text-center mb-[30px] lg:mb-[40px]">
                <?php echo esc_html($partners_title); ?>
            </h2>
        <?php endif; ?>

        <div class="grid grid-cols-3 lg:grid-cols-7 gap-[2px]">
            <?php foreach ($partners as $csie_partner) :
                $logo = $csie_partner['partner_logo'];
            ?>
                <div class="bg-[#f8f8f8] h-[57px] lg:h-[88px] flex items-center justify-center p-[10px] lg:p-[15px]">
                    <?php if ($logo) : ?>
                        <img
                            src="<?php echo esc_url($logo['url']); ?>"
                            alt="<?php echo esc_attr($csie_partner['partner_name']); ?>"
                            class="max-h-full max-w-full object-contain"
                            loading="lazy"
                        >
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
