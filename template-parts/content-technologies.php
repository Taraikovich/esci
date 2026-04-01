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

<section class="relative bg-white mb-6.25 lg:mb-12.5">
    <!-- Blue background bar -->
    <div class="absolute left-0 right-0 top-[60px] lg:top-0 h-[349px] bg-[#004f86]"></div>

    <div class="relative max-w-[1200px] mx-auto px-[15px] xl:px-0 overflow-hidden">
        <!-- Desktop layout -->
        <div class="hidden lg:flex justify-between items-start pt-[140px]">
            <!-- Cards -->
            <div class="flex shrink-0">
                <?php foreach ($categories as $i => $cat) : ?>
                    <div class="relative h-[450px] w-[353px] shrink-0<?php echo $i > 0 ? ' -ml-[20px]' : ''; ?>" style="z-index: <?php echo $i; ?>">
                        <!-- Card shape SVG background -->
                        <svg class="absolute inset-0 size-full" viewBox="0 0 353 433" fill="none" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#techCardShadowLg<?php echo $i; ?>)">
                                <path d="M35.3 433C25.6 433 16.1 433 0 433V54.1C0 39.2 0 11.9 0 0C11.1 0 25.6 0 35.3 0H141.2L176.5 54.1H317.7C327.4 54.1 343 54.1 353 54.1V433C340.7 433 327.4 433 317.7 433H35.3Z" fill="<?php echo esc_attr($cat['fill']); ?>" />
                            </g>
                            <defs>
                                <filter id="techCardShadowLg<?php echo $i; ?>" x="-10" y="-10" width="373" height="453" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                    <feOffset />
                                    <feGaussianBlur stdDeviation="5" />
                                    <feComposite in2="hardAlpha" operator="out" />
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.05 0" />
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape" />
                                </filter>
                            </defs>
                        </svg>
                        <!-- Card content -->
                        <div class="relative flex flex-col gap-[20px] px-[40px] pt-[93px] pb-[30px]">
                            <h3 class="text-[24px] font-bold uppercase leading-[1.2] text-[#353535] max-w-[273px]">
                                <?php echo esc_html($cat['title']); ?>
                            </h3>
                            <ul class="flex flex-col gap-[10px]">
                                <?php foreach ($cat['items'] as $item) : ?>
                                    <li class="flex items-center gap-[10px]">
                                        <span class="size-[5px] bg-[#00b1ff] shrink-0"></span>
                                        <span class="text-base leading-[1.2] text-[#606060]"><?php echo esc_html($item); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Building image -->
            <div class="relative -mt-[88px] h-[521px] w-[386px] shrink-0">
                <img
                    src="<?php echo $img_dir; ?>technologies-building.png"
                    alt="<?php esc_attr_e('Modern buildings', 'csie'); ?>"
                    class="absolute inset-0 size-full object-cover">
            </div>
        </div>

        <!-- Mobile Swiper -->
        <div class="lg:hidden pt-[130px]">
            <!-- Swipe hint icon -->
            <div class="flex justify-end mb-[15px]">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.973 15.2208L12.5974 4.92506C12.7202 4.44318 13.0295 4.02984 13.4571 3.77596C13.8846 3.52208 14.3956 3.44846 14.8774 3.57129C15.3593 3.69412 15.7727 4.00334 16.0265 4.43093C16.2804 4.85852 16.354 5.36945 16.2312 5.85132L13.9156 14.9358M14.0699 14.3302L14.6874 11.9077C14.8103 11.4258 15.1195 11.0124 15.5471 10.7586C15.9747 10.5047 16.4856 10.4311 16.9675 10.5539C17.4494 10.6767 17.8627 10.9859 18.1166 11.4135C18.3705 11.8411 18.4441 12.3521 18.3212 12.8339L17.5494 15.8621M18.0125 14.0452C18.1353 13.5633 18.4445 13.15 18.8721 12.8961C19.2997 12.6422 19.8107 12.5686 20.2925 12.6914C20.7744 12.8143 21.1877 13.1235 21.4416 13.5511C21.6955 13.9787 21.7691 14.4896 21.6463 14.9715L21.1832 16.7884" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M21.3374 16.1826C21.4602 15.7007 21.7694 15.2874 22.197 15.0335C22.6246 14.7796 23.1355 14.706 23.6174 14.8288C24.0993 14.9517 24.5126 15.2609 24.7665 15.6885C25.0204 16.1161 25.094 16.627 24.9712 17.1089L23.5818 22.5596C23.0904 24.4871 21.8536 26.1404 20.1432 27.156C18.4328 28.1715 16.3891 28.466 14.4616 27.9747L12.0391 27.3571L12.291 27.4214C11.0874 27.1148 9.97874 26.514 9.06462 25.6731C8.1505 24.8322 7.45955 23.7774 7.0538 22.6035L6.90902 22.1796C6.67889 21.5034 5.94167 18.8525 4.69734 14.2269C4.57044 13.7553 4.63251 13.2529 4.87035 12.8264C5.10818 12.3999 5.50302 12.083 5.97088 11.9432C6.4693 11.7946 7.00301 11.8166 7.48755 12.0055C7.97209 12.1944 8.37979 12.5396 8.64612 12.9863L9.97282 15.2207M5.64714 4.56456C6.74995 4.12206 7.89641 3.79728 9.06745 3.59562M20.1866 5.51532C21.6564 6.34003 22.9934 7.38187 24.1524 8.60564" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
            <div class="swiper csie-technologies-swiper" style="overflow: visible;">
                <div class="swiper-wrapper">
                    <?php foreach ($categories as $i => $cat) : ?>
                        <div class="swiper-slide">
                            <div class="relative h-[400px]">
                                <!-- Card shape SVG background -->
                                <svg class="absolute inset-0 size-full" viewBox="0 0 353 433" fill="none" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#techCardShadowSm<?php echo $i; ?>)">
                                        <path d="M35.3 433C25.6 433 16.1 433 0 433V54.1C0 39.2 0 11.9 0 0C11.1 0 25.6 0 35.3 0H141.2L176.5 54.1H317.7C327.4 54.1 343 54.1 353 54.1V433C340.7 433 327.4 433 317.7 433H35.3Z" fill="<?php echo esc_attr($cat['fill']); ?>" />
                                    </g>
                                    <defs>
                                        <filter id="techCardShadowSm<?php echo $i; ?>" x="-10" y="-10" width="373" height="453" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.05 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                                <!-- Card content -->
                                <div class="relative flex flex-col gap-[20px] px-[30px] pt-[74px] pb-[20px]">
                                    <h3 class="text-[20px] font-bold uppercase leading-[1.2] text-[#353535] max-w-[228px]">
                                        <?php echo esc_html($cat['title']); ?>
                                    </h3>
                                    <ul class="flex flex-col gap-[10px]">
                                        <?php foreach ($cat['items'] as $item) : ?>
                                            <li class="flex items-center gap-[10px]">
                                                <span class="size-[5px] bg-[#00b1ff] shrink-0"></span>
                                                <span class="text-[14px] leading-[1.2] text-[#606060]"><?php echo esc_html($item); ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>