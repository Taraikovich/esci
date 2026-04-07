<?php

/**
 * Partnership section for team page.
 *
 * @package csie
 */

$csie_partnership_title = get_field('team_partnership_title');
$csie_partnership_text_left = get_field('team_partnership_text_left');
$csie_partnership_text_right = get_field('team_partnership_text_right');
$csie_partnership_image = get_field('team_partnership_image');
?>

<section class="max-w-[1200px] mx-auto px-[15px] xl:px-0 py-[25px] lg:py-[50px]">
	<div class="flex flex-col lg:flex-row lg:justify-between lg:gap-[50px]">
		<!-- Left content -->
		<div class="flex flex-col lg:flex-1">
			<?php if ($csie_partnership_title) : ?>
				<h2 class="bg-gradient-to-r from-[#df4253] to-[#004f86] to-[65%] bg-clip-text text-transparent font-bold text-[25px] lg:text-[55px] leading-[1.2] uppercase">
					<?php echo esc_html($csie_partnership_title); ?>
				</h2>
			<?php endif; ?>

			<!-- Watermark logo -->
			<div class="opacity-10 my-[20px] lg:my-[30px] w-[330px] xl:w-[673px]">
				<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/csie-watermark.png'); ?>" alt="" class="w-full h-auto">
			</div>

			<!-- Text columns -->
			<div class="flex flex-col gap-[15px] xl:flex-row lg:gap-[30px]">
				<?php if ($csie_partnership_text_left) : ?>
					<p class="text-[14px] lg:text-[16px] leading-[1.2] text-[#606060] lg:w-[345px]">
						<?php echo esc_html($csie_partnership_text_left); ?>
					</p>
				<?php endif; ?>

				<?php if ($csie_partnership_text_right) : ?>
					<p class="text-[14px] lg:text-[16px] leading-[1.2] text-[#606060] lg:w-[298px]">
						<?php echo esc_html($csie_partnership_text_right); ?>
					</p>
				<?php endif; ?>
			</div>
		</div>

		<!-- Image -->
		<?php if ($csie_partnership_image) : ?>
			<div class="mt-[30px] lg:mt-0 w-full h-[435px] lg:w-[454px] lg:h-[599px] lg:shrink-0 overflow-hidden">
				<img
					src="<?php echo esc_url($csie_partnership_image['url']); ?>"
					alt="<?php echo esc_attr($csie_partnership_image['alt']); ?>"
					class="w-full h-full object-cover">
			</div>
		<?php endif; ?>
	</div>
</section>