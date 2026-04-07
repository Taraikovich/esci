<?php

/**
 * Business Process Consulting section for company page.
 *
 * @package csie
 */

$csie_cons_title       = get_field('consulting_title');
$csie_cons_description = get_field('consulting_description');
$csie_cons_image       = get_field('consulting_image');
$csie_cons_highlight   = get_field('consulting_highlight');
$csie_cons_list        = get_field('consulting_list');
$csie_cons_text_right  = get_field('consulting_text_right');
$csie_cons_button_text = get_field('consulting_button_text');
$csie_cons_button_link = get_field('consulting_button_link');
?>

<section class="bg-[#f8f8f8] py-[50px] lg:py-[100px]">
	<div class="max-w-[1200px] mx-auto px-[15px] xl:px-0">
		<!-- Title -->
		<?php if ($csie_cons_title) : ?>
			<h2 class="bg-gradient-to-r from-[#df4253] to-[#004f86] to-[18%] bg-clip-text text-transparent font-bold text-[25px] lg:text-[40px] leading-[1.2] uppercase mb-[30px] lg:mb-[50px]">
				<?php echo esc_html($csie_cons_title); ?>
			</h2>
		<?php endif; ?>

		<!-- White card -->
		<div class="bg-white p-[20px] lg:px-[40px] lg:py-[30px] flex flex-col gap-[20px] lg:gap-[25px]">
			<?php if ($csie_cons_description) : ?>
				<p class="text-[14px] lg:text-[16px] leading-[1.2] text-[#606060]">
					<?php echo esc_html($csie_cons_description); ?>
				</p>
			<?php endif; ?>

			<!-- Image + List + Right text -->
			<div class="flex flex-col xl:flex-row gap-[30px] lg:gap-[40px]">
				<?php if ($csie_cons_image) : ?>
					<div class="w-full lg:w-[506px] h-[150px] lg:h-[234px] shrink-0 overflow-hidden">
						<img
							src="<?php echo esc_url($csie_cons_image['url']); ?>"
							alt="<?php echo esc_attr($csie_cons_image['alt']); ?>"
							class="w-full h-full object-cover">
					</div>
				<?php endif; ?>

				<div class="flex flex-col lg:flex-row gap-[20px] lg:gap-[39px] lg:flex-1">
					<!-- List column -->
					<div class="flex flex-col gap-[15px] lg:w-[250px] lg:shrink-0">
						<?php if ($csie_cons_highlight) : ?>
							<p class="text-[14px] lg:text-[16px] leading-[1.2] text-[#00b1ff]">
								<?php echo esc_html($csie_cons_highlight); ?>
							</p>
						<?php endif; ?>

						<?php if ($csie_cons_list) : ?>
							<div class="flex flex-col gap-[10px] text-[14px] leading-[1.2] text-[#606060] [&>ul]:list-none [&>ul]:p-0 [&>ul]:m-0 [&>ul]:flex [&>ul]:flex-col [&>ul]:gap-[10px] [&>ul>li]:flex [&>ul>li]:items-baseline [&>ul>li]:gap-[10px] [&>ul>li]:before:content-[''] [&>ul>li]:before:size-[5px] [&>ul>li]:before:bg-[#00b1ff] [&>ul>li]:before:shrink-0 [&>ul>li]:before:mt-[5px]">
								<?php echo wp_kses_post($csie_cons_list); ?>
							</div>
						<?php endif; ?>
					</div>

					<!-- Right text + button -->
					<div class="flex flex-col gap-[15px] lg:justify-between">
						<?php if ($csie_cons_text_right) : ?>
							<div class="text-[14px] leading-[1.2] text-[#606060] [&>p]:mb-[10px] [&>p:last-child]:mb-0 [&_a]:underline [&_a]:hover:text-[#00b1ff]">
								<?php echo wp_kses_post($csie_cons_text_right); ?>
							</div>
						<?php endif; ?>

						<?php if ($csie_cons_button_link) : ?>
							<a href="<?php echo esc_url($csie_cons_button_link); ?>" class="flex items-center justify-between bg-[#004f86] rounded-full h-[50px] px-8 w-[172px] shrink-0 group hover:bg-[#00b1ff] transition-colors">
								<span class="text-white text-base font-medium leading-[1.2]"><?php echo esc_html($csie_cons_button_text); ?></span>
								<svg class="w-[10px] h-[16px] rotate-90" viewBox="0 0 11.5 17.5" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M5.75 16.75V0.75M5.75 0.75L10.75 5.84086M5.75 0.75L0.75 5.84086" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>