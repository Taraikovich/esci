<?php

/**
 * Company Profile section for company page.
 *
 * @package csie
 */

$csie_profile_title = get_field('profile_title');
$csie_profile_cards = get_field('profile_cards');

if (! $csie_profile_cards) {
    return;
}

$pattern_url = esc_url(get_template_directory_uri() . '/assets/img/services-pattern.png');
?>

<section class="bg-[#f8f8f8] py-[60px] lg:py-[100px]">
    <div class="max-w-[1200px] mx-auto px-[15px] xl:px-0 overflow-hidden">
        <!-- Title -->
        <?php if ($csie_profile_title) : ?>
            <h2 class="bg-gradient-to-r from-[#df4253] to-[#004f86] to-[65%] bg-clip-text text-transparent text-[25px] lg:text-[40px] font-bold uppercase leading-[1.2] mb-[30px] lg:mb-[50px]">
                <?php echo esc_html($csie_profile_title); ?>
            </h2>
        <?php endif; ?>

        <!-- Cards Swiper -->
        <div class="swiper csie-company-profile-swiper" style="overflow: visible;">
            <div class="swiper-wrapper">
                <?php foreach ($csie_profile_cards as $card) :
                    $bg_color   = $card['card_bg_color'] ?: '#004f86';
                    $is_light   = csie_is_light_color($bg_color);
                    $text_color = $is_light ? '#353535' : '#ffffff';
                    $body_color = $is_light ? '#606060' : '#ffffff';
                    $pattern_opacity = $is_light ? '' : 'opacity-10';
                    $card_image = $card['card_image'] ?? null;
                ?>
                    <div class="swiper-slide">
                        <div class="group relative overflow-hidden p-[25px] lg:p-[30px] h-[400px] lg:h-[460px]" style="background-color: <?php echo esc_attr($bg_color); ?>">
                            <!-- Text content -->
                            <div class="relative z-10 flex flex-col gap-[15px] lg:gap-[20px]">
                                <h3 class="text-[20px] lg:text-[24px] font-bold uppercase leading-[1.2]" style="color: <?php echo esc_attr($text_color); ?>">
                                    <?php echo esc_html($card['card_title']); ?>
                                </h3>
                                <div class="text-[14px] lg:text-base leading-[1.2] [&>p]:mb-[1em] [&>p:last-child]:mb-0" style="color: <?php echo esc_attr($body_color); ?>">
                                    <?php echo wp_kses_post($card['card_text']); ?>
                                </div>
                                <?php if ($card_image) : ?>
                                    <div class="inline-block mt-[20px]">
                                        <img
                                            src="<?php echo esc_url($card_image['url']); ?>"
                                            alt="<?php echo esc_attr($card_image['alt']); ?>"
                                            class="h-[80px] lg:h-[102px] w-auto">
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- Decorative pattern -->
                            <img
                                src="<?php echo $pattern_url; ?>"
                                alt=""
                                class="absolute bottom-0 left-1/2 top-1/4 -translate-x-1/2 w-[786px] max-w-none pointer-events-none transition-transform duration-500 group-hover:scale-110 <?php echo esc_attr($pattern_opacity); ?>"
                                aria-hidden="true">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>