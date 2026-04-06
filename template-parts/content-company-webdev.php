<?php

/**
 * Web Development section for company page.
 *
 * @package csie
 */

$csie_wd_title       = get_field('webdev_title');
$csie_wd_description = get_field('webdev_description');
$csie_wd_highlight   = get_field('webdev_highlight');
$csie_wd_list        = get_field('webdev_list');
$csie_wd_image       = get_field('webdev_image');
$csie_wd_text_right  = get_field('webdev_text_right');
$csie_wd_footer_text = get_field('webdev_footer_text');
$csie_wd_button_text = get_field('webdev_button_text');
$csie_wd_button_link = get_field('webdev_button_link');
?>

<section class="py-[50px] lg:py-[100px]">
	<div class="max-w-[1200px] mx-auto px-[15px] lg:px-0">
		<!-- Title -->
		<?php if ($csie_wd_title) : ?>
			<h2 class="bg-gradient-to-r from-[#df4253] to-[#004f86] to-[18%] bg-clip-text text-transparent font-bold text-[25px] lg:text-[40px] leading-[1.2] uppercase mb-[15px] lg:mb-[50px]">
				<?php echo esc_html($csie_wd_title); ?>
			</h2>
		<?php endif; ?>

		<!-- Content: 3 columns on desktop -->
		<div class="flex flex-col lg:flex-row gap-[30px] lg:gap-[33px]">
			<!-- Left column -->
			<div class="lg:w-[343px] lg:shrink-0 flex flex-col gap-[20px] lg:gap-[25px]">
				<?php if ($csie_wd_description) : ?>
					<p class="text-[14px] lg:text-[16px] leading-[1.2] text-[#606060]">
						<?php echo esc_html($csie_wd_description); ?>
					</p>
				<?php endif; ?>

				<div class="flex flex-col gap-[15px]">
					<?php if ($csie_wd_highlight) : ?>
						<p class="text-[14px] lg:text-[16px] leading-[1.2] text-[#00b1ff]">
							<?php echo esc_html($csie_wd_highlight); ?>
						</p>
					<?php endif; ?>

					<?php if ($csie_wd_list) : ?>
						<div class="flex flex-col gap-[10px] text-[14px] leading-[1.2] text-[#606060] [&>ul]:list-none [&>ul]:p-0 [&>ul]:m-0 [&>ul]:flex [&>ul]:flex-col [&>ul]:gap-[10px] [&>ul>li]:flex [&>ul>li]:items-center [&>ul>li]:gap-[10px] [&>ul>li]:before:content-[''] [&>ul>li]:before:size-[5px] [&>ul>li]:before:bg-[#00b1ff] [&>ul>li]:before:shrink-0">
							<?php echo wp_kses_post($csie_wd_list); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>

			<!-- Center image -->
			<?php if ($csie_wd_image) : ?>
				<div class="w-full lg:w-[278px] h-[250px] lg:h-[417px] shrink-0 overflow-hidden">
					<img
						src="<?php echo esc_url($csie_wd_image['url']); ?>"
						alt="<?php echo esc_attr($csie_wd_image['alt']); ?>"
						class="w-full h-full object-cover">
				</div>
			<?php endif; ?>

			<!-- Right column -->
			<div class="lg:w-[514px] flex flex-col gap-[20px] lg:justify-between">
				<?php if ($csie_wd_text_right) : ?>
					<div class="text-[14px] lg:text-[16px] leading-[1.2] text-[#606060] [&>p]:mb-[10px] [&>p:last-child]:mb-0">
						<?php echo wp_kses_post($csie_wd_text_right); ?>
					</div>
				<?php endif; ?>

				<div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-[30px]">
					<?php if ($csie_wd_footer_text) : ?>
						<p class="text-[14px] lg:text-[16px] leading-[1.2] text-[#606060] lg:w-[265px]">
							<?php echo esc_html($csie_wd_footer_text); ?>
						</p>
					<?php endif; ?>

					<?php if ($csie_wd_button_link) : ?>
						<a href="<?php echo esc_url($csie_wd_button_link); ?>" class="flex items-center justify-between bg-[#004f86] rounded-full h-[50px] px-8 w-full lg:w-[172px] shrink-0 group hover:bg-[#00b1ff] transition-colors">
							<span class="text-white text-base font-medium leading-[1.2]"><?php echo esc_html($csie_wd_button_text); ?></span>
							<svg class="w-[10px] h-[16px] rotate-90" viewBox="0 0 11.5 17.5" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M5.75 16.75V0.75M5.75 0.75L10.75 5.84086M5.75 0.75L0.75 5.84086" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
