<?php

/**
 * Partnership section for service pages.
 *
 * @package csie
 */

$csie_partnership_title = get_field('partnership_title');
$csie_partnership_description = get_field('partnership_description');
$csie_partnership_image = get_field('partnership_image');

if (!$csie_partnership_title && !$csie_partnership_description && !$csie_partnership_image) {
	return;
}
?>

<section class="max-w-[1200px] mx-auto px-[15px] lg:px-0 py-[25px] lg:py-[50px]">
	<div class="flex flex-col gap-[30px] lg:flex-row lg:items-center lg:justify-between">
		<!-- Text -->
		<div class="flex flex-col gap-[20px] lg:w-[430px] lg:shrink-0">
			<?php if ($csie_partnership_title) : ?>
				<h2 class="font-bold text-[25px] lg:text-[40px] leading-[1.2] text-[#353535] uppercase">
					<?php echo esc_html($csie_partnership_title); ?>
				</h2>
			<?php endif; ?>

			<?php if ($csie_partnership_description) : ?>
				<p class="text-[14px] lg:text-[16px] leading-[1.2] text-[#606060]">
					<?php echo esc_html($csie_partnership_description); ?>
				</p>
			<?php endif; ?>
		</div>

		<!-- Partner image -->
		<?php if ($csie_partnership_image) : ?>
			<div class="w-full h-auto lg:w-[665px] lg:h-[200px] overflow-hidden">
				<img
					src="<?php echo esc_url($csie_partnership_image['url']); ?>"
					alt="<?php echo esc_attr($csie_partnership_image['alt']); ?>"
					class="w-full h-full object-contain object-left">
			</div>
		<?php endif; ?>
	</div>
</section>