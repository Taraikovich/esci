<?php
/**
 * The template for displaying 404 pages.
 *
 * @package csie
 */

get_header(); ?>

<main id="content" class="max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-20 lg:pt-16 lg:pb-28">
    <!-- Gradient Title -->
    <h1 class="text-[28px] lg:text-[55px] font-bold uppercase leading-[1.2] text-center lg:text-left mb-8 lg:mb-12 bg-gradient-to-r from-[#df4253] to-[#004f86] to-[65%] bg-clip-text text-transparent">
        <?php esc_html_e('Oops... it seems we got lost in the data!', 'csie'); ?>
    </h1>

    <!-- Content: Image + Text -->
    <div class="flex flex-col lg:flex-row gap-8 lg:gap-16 lg:items-stretch">
        <!-- Image -->
        <div class="w-full lg:w-[590px] shrink-0 overflow-hidden">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/404-office.png'); ?>"
                 alt="<?php esc_attr_e('Office', 'csie'); ?>"
                 class="w-full h-auto lg:h-full object-cover" />
        </div>

        <!-- Text + Button -->
        <div class="flex flex-col gap-12 lg:justify-between text-center lg:text-left">
            <div class="flex flex-col gap-5">
                <h2 class="text-[24px] font-bold uppercase leading-[1.2] text-[#353535]">
                    <?php esc_html_e('404 - page not found', 'csie'); ?>
                </h2>
                <p class="text-[18px] leading-[1.2] text-[#606060]">
                    <?php esc_html_e('The page you are looking for does not exist or has been moved. The link might be outdated or there could be a typo in the URL', 'csie'); ?>
                </p>
            </div>

            <a href="<?php echo esc_url(home_url('/')); ?>"
               class="inline-flex items-center justify-between w-full lg:w-[220px] h-[50px] px-8 bg-[#004f86] text-white rounded-full hover:bg-[#003d6a] transition-colors">
                <span class="text-[16px] font-medium leading-[1.2]">
                    <?php esc_html_e('Back to home', 'csie'); ?>
                </span>
                <svg width="18" height="12" viewBox="0 0 17.5 11.5" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.75 5.75H16.75M16.75 5.75L11.6591 0.75M16.75 5.75L11.6591 10.75" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </div>
</main>

<?php get_footer();
