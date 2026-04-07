<?php

/**
 * Microsoft Dynamics 365 section for company page.
 *
 * @package csie
 */

$csie_dyn_title       = get_field('dynamics_title');
$csie_dyn_subtitle    = get_field('dynamics_subtitle');
$csie_dyn_intro       = get_field('dynamics_intro');
$csie_dyn_image       = get_field('dynamics_image');
$csie_dyn_list        = get_field('dynamics_list');
$csie_dyn_text        = get_field('dynamics_text');
$csie_dyn_button_text = get_field('dynamics_button_text');
$csie_dyn_button_link = get_field('dynamics_button_link');
$pattern_url          = esc_url(get_template_directory_uri() . '/assets/img/footer-pattern.png');
?>

<section class="bg-[#004f86] relative overflow-hidden">
	<!-- Pattern overlay -->
	<img
		src="<?php echo $pattern_url; ?>"
		alt="" aria-hidden="true"
		class="absolute inset-0 w-full h-full object-cover pointer-events-none">

	<div class="relative max-w-[1200px] mx-auto px-[15px] xl:px-0 py-[50px] lg:py-[100px]">
		<!-- Header -->
		<div class="flex flex-col gap-[15px] lg:gap-[20px] mb-[30px] lg:mb-[50px]">
			<?php if ($csie_dyn_title) : ?>
				<h2 class="font-bold text-[25px] lg:text-[40px] leading-[1.2] uppercase text-white">
					<?php echo esc_html($csie_dyn_title); ?>
				</h2>
			<?php endif; ?>

			<?php if ($csie_dyn_subtitle) : ?>
				<p class="text-[14px] lg:text-[16px] leading-[1.2] text-white">
					<?php echo esc_html($csie_dyn_subtitle); ?>
				</p>
			<?php endif; ?>
		</div>

		<!-- White card -->
		<div class="bg-white p-[20px] lg:px-[40px] lg:py-[30px] flex flex-col gap-[25px]">
			<?php if ($csie_dyn_intro) : ?>
				<p class="text-[14px] lg:text-[16px] leading-[1.2] text-[#606060]">
					<?php echo esc_html($csie_dyn_intro); ?>
				</p>
			<?php endif; ?>

			<!-- Image + List -->
			<div class="flex flex-col lg:flex-row gap-[20px] lg:gap-[32px] items-start lg:items-center">
				<?php if ($csie_dyn_image) : ?>
					<div class="w-full lg:w-[483px] shrink-0 overflow-hidden">
						<img
							src="<?php echo esc_url($csie_dyn_image['url']); ?>"
							alt="<?php echo esc_attr($csie_dyn_image['alt']); ?>"
							class="w-full h-auto object-cover">
					</div>
				<?php endif; ?>

				<?php if ($csie_dyn_list) : ?>
					<div class="flex flex-col gap-[10px] text-[14px] leading-[1.2] text-[#606060] [&>ul]:list-none [&>ul]:p-0 [&>ul]:m-0 [&>ul]:flex [&>ul]:flex-col [&>ul]:gap-[10px] [&>ul>li]:flex [&>ul>li]:items-center [&>ul>li]:gap-[10px] [&>ul>li]:before:content-[''] [&>ul>li]:before:size-[5px] [&>ul>li]:before:bg-[#00b1ff] [&>ul>li]:before:shrink-0">
						<?php echo wp_kses_post($csie_dyn_list); ?>
					</div>
				<?php endif; ?>
			</div>

			<!-- Bottom: text + button -->
			<div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-[30px]">
				<?php if ($csie_dyn_text) : ?>
					<div class="text-[14px] lg:text-[16px] leading-[1.2] text-[#606060] lg:max-w-[780px] [&>p]:mb-[10px] [&>p:last-child]:mb-0 [&_a]:text-[#00b1ff] [&_a]:font-medium [&_a]:hover:underline">
						<?php echo wp_kses_post($csie_dyn_text); ?>
					</div>
				<?php endif; ?>

				<?php if ($csie_dyn_button_link) : ?>
					<a href="<?php echo esc_url($csie_dyn_button_link); ?>" class="flex items-center justify-between bg-[#004f86] rounded-full h-[50px] px-8 w-full lg:w-[172px] shrink-0 group hover:bg-[#00b1ff] transition-colors">
						<span class="text-white text-base font-medium leading-[1.2]"><?php echo esc_html($csie_dyn_button_text); ?></span>
						<svg class="w-[10px] h-[16px] rotate-90" viewBox="0 0 11.5 17.5" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M5.75 16.75V0.75M5.75 0.75L10.75 5.84086M5.75 0.75L0.75 5.84086" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>