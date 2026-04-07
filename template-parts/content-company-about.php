<?php

/**
 * About Us section for company page.
 *
 * @package csie
 */

$csie_about_title       = get_field('about_title');
$csie_about_text_left   = get_field('about_text_left');
$csie_about_text_right  = get_field('about_text_right');
$csie_about_image       = get_field('about_image');
$csie_about_button_text = get_field('about_button_text');
$csie_about_button_link = get_field('about_button_link');
?>

<section class="max-w-[1200px] mx-auto px-[15px] xl:px-0 py-[40px] lg:py-[60px]">
	<!-- Header row: title + button -->
	<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-[40px]">
		<h2 class="font-bold text-[25px] lg:text-[40px] leading-[1.2] uppercase text-[#353535]">
			<?php echo esc_html($csie_about_title); ?>
		</h2>

		<?php if ($csie_about_button_link) : ?>
			<a href="<?php echo esc_url($csie_about_button_link); ?>" class="hidden lg:flex items-center justify-between bg-[#004f86] rounded-full h-[50px] px-8 w-[220px] group hover:bg-[#00b1ff] transition-colors">
				<span class="text-white text-base font-medium leading-[1.2]"><?php echo esc_html($csie_about_button_text); ?></span>
				<svg class="w-[10px] h-[16px] rotate-90" viewBox="0 0 11.5 17.5" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M5.75 16.75V0.75M5.75 0.75L10.75 5.84086M5.75 0.75L0.75 5.84086" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
			</a>
		<?php endif; ?>
	</div>

	<!-- Content: 3-column on desktop, stacked on mobile -->
	<div class="mt-[40px] flex flex-col lg:flex-row gap-[30px] lg:gap-0 lg:justify-between">
		<!-- Left text -->
		<div class="text-[14px] lg:text-[16px] font-normal leading-[1.2] text-[#606060] lg:w-[430px] [&>p]:mb-[1.2em] [&>p:last-child]:mb-0">
			<?php echo wp_kses_post($csie_about_text_left); ?>
		</div>

		<!-- Center image -->
		<?php if ($csie_about_image) : ?>
			<div class="w-full lg:w-[200px] h-[285px] shrink-0">
				<img
					src="<?php echo esc_url($csie_about_image['url']); ?>"
					alt="<?php echo esc_attr($csie_about_image['alt']); ?>"
					class="w-full h-full object-cover">
			</div>
		<?php endif; ?>

		<!-- Right text -->
		<div class="text-[14px] lg:text-[16px] font-normal leading-[1.2] text-[#606060] lg:w-[430px] [&>p]:mb-[1.2em] [&>p:last-child]:mb-0">
			<?php echo wp_kses_post($csie_about_text_right); ?>
		</div>
	</div>

	<!-- Mobile button -->
	<?php if ($csie_about_button_link) : ?>
		<a href="<?php echo esc_url($csie_about_button_link); ?>" class="flex lg:hidden items-center justify-between bg-[#004f86] rounded-full h-[50px] px-8 w-full mt-[40px] group hover:bg-[#00b1ff] transition-colors">
			<span class="text-white text-base font-medium leading-[1.2]"><?php echo esc_html($csie_about_button_text); ?></span>
			<svg class="w-[10px] h-[16px] rotate-90" viewBox="0 0 11.5 17.5" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M5.75 16.75V0.75M5.75 0.75L10.75 5.84086M5.75 0.75L0.75 5.84086" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
			</svg>
		</a>
	<?php endif; ?>
</section>