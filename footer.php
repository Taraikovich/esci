<?php

/**
 * The footer for the theme.
 *
 * @package csie
 */
?>

<footer class="flex flex-col items-center gap-5 pb-5">
    <!-- Blue footer section -->
    <div class="relative w-full bg-[#004f86] overflow-hidden">
        <!-- Pattern overlay -->
        <div class="absolute inset-0 pointer-events-none">
            <img
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/footer-pattern.png'); ?>"
                alt=""
                class="w-full h-full object-cover">
        </div>

        <!-- Footer content -->
        <div class="relative max-w-[1200px] mx-auto px-4 md:px-[15px] py-[70px] lg:py-[100px]">
            <!-- Logo + Button row -->
            <div class="flex flex-col items-center gap-10 lg:flex-row lg:items-center lg:justify-between">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img
                        src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo-white.png'); ?>"
                        alt="<?php bloginfo('name'); ?>"
                        class="h-[60px] w-auto">
                </a>
                <!-- Button: hidden on mobile, shown on desktop in top row -->
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="hidden lg:flex items-center justify-between bg-white rounded-full h-[50px] px-8 w-[220px] group hover:bg-[#00b1ff] transition-colors">
                    <span class="text-[#004f86] group-hover:text-white text-base font-medium leading-[1.2] transition-colors"><?php esc_html_e('Work with us', 'csie'); ?></span>
                    <svg class="w-[10px] h-[16px] rotate-90" viewBox="0 0 11.5 17.5" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.75 16.75V0.75M5.75 0.75L10.75 5.84086M5.75 0.75L0.75 5.84086" stroke="#004F86" class="group-hover:stroke-white transition-colors" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>

            <!-- Links columns -->
            <div class="mt-10 lg:mt-[50px] flex flex-col items-center gap-[30px] lg:flex-row lg:items-start lg:justify-between text-white leading-[1.2]">
                <!-- Contact Us -->
                <div class="flex flex-col gap-[15px] lg:gap-5 items-center lg:items-start">
                    <h3 class="text-[20px] font-bold uppercase"><?php esc_html_e('Contact Us', 'csie'); ?></h3>
                    <div class="flex flex-col gap-5 items-center lg:items-start text-base">
                        <div class="flex flex-col gap-[10px] items-center lg:items-start">
                            <p class="font-bold"><?php esc_html_e('Austria', 'csie'); ?></p>
                            <div class="flex flex-col gap-[5px] font-medium items-center lg:items-start">
                                <a href="tel:+43192091278" class="hover:underline">+43 1 92 91 278</a>
                                <a href="mailto:at@csie-data.com" class="hover:underline">at@csie-data.com</a>
                            </div>
                        </div>
                        <div class="flex flex-col gap-[10px] items-center lg:items-start">
                            <p class="font-bold"><?php esc_html_e('United Kingdom', 'csie'); ?></p>
                            <div class="flex flex-col gap-[5px] font-medium items-center lg:items-start">
                                <a href="tel:+448450542960" class="hover:underline">+44 845 05 429 60</a>
                                <a href="mailto:uk@csie-data.com" class="hover:underline">uk@csie-data.com</a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                wp_nav_menu([
                    'theme_location' => 'footer',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'depth'          => 2,
                    'walker'         => new Csie_Footer_Walker(),
                    'fallback_cb'    => false,
                ]);
                ?>

                <!-- Mobile: Button at bottom -->
                <div class="mt-10 flex justify-center lg:hidden">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="flex items-center justify-between bg-white rounded-full h-[50px] px-5 w-full max-w-[330px] group hover:bg-[#00b1ff] transition-colors">
                        <span class="text-[#004f86] group-hover:text-white text-sm font-medium leading-[1.2] transition-colors"><?php esc_html_e('Work with us', 'csie'); ?></span>
                        <svg class="w-[8px] h-[14px] rotate-90" viewBox="0 0 11.5 17.5" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.75 16.75V0.75M5.75 0.75L10.75 5.84086M5.75 0.75L0.75 5.84086" stroke="#004F86" class="group-hover:stroke-white transition-colors" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <p class="text-[#004f86] text-sm lg:text-base font-medium leading-[1.2] text-center px-4">
        <?php
        /* translators: %s: current year */
        printf(esc_html__('Copyright &copy; 1995-%s CS&IE Data Consulting GmbH. All rights reserved.', 'csie'), esc_html(date('Y')));
        ?>
    </p>
</footer>

<?php wp_footer(); ?>
</body>

</html>