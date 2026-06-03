<?php

/**
 * Hero section for the front page.
 *
 * @package csie
 */
?>

<section class="flex flex-col items-center lg:h-[calc(100vh-130px)] lg:overflow-hidden">
    <!-- Title -->
    <h1 class="py-12.5 px-4 text-center uppercase font-bold leading-[1.2] text-[27px] lg:text-[clamp(32px,3.4vw,40px)] lg:py-3 lg:shrink-0">
        <span class="bg-gradient-to-r from-[#df4253] to-[#004f86] to-[65%] bg-clip-text text-transparent">
            <?php echo esc_html(get_field('hero-h1')); ?>
        </span>
        <span class="text-[#353535] max-w-177.5">
            <?php echo esc_html(get_field('hero-subtitle')); ?>
        </span>
    </h1>

    <!-- Team photo -->
    <div class="w-full lg:flex-1 lg:min-h-0">
        <img
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/hero-team.jpg'); ?>"
            alt="<?php esc_attr_e('CS&IE Data Consulting team', 'csie'); ?>"
            class="w-full h-auto object-cover lg:h-full">
    </div>
</section>