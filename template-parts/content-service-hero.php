<?php

/**
 * Hero section for service pages.
 *
 * @package csie
 */

$csie_service_title = get_field('service_title');
$csie_service_description = get_field('service_description');
$csie_hero_image = get_field('service_hero_image');

if (!$csie_service_title) {
	return;
}
?>

<section class="flex flex-col items-center py-[25px] lg:py-[50px]">
	<!-- Text block -->
	<div class="px-[15px] xl:px-0 max-w-[1200px] mx-auto w-full">
		<h1 class="bg-gradient-to-r from-[#df4253] to-[#004f86] to-[65%] bg-clip-text text-transparent font-bold text-[27px] lg:text-[55px] leading-[1.2] uppercase text-center lg:text-left">
			<?php echo esc_html($csie_service_title); ?>

			<?php if ($csie_service_description) : ?>
				<span class="block mt-[15px] lg:mt-0 lg:inline-block text-[14px] lg:text-[16px] font-medium leading-[1.2] text-[#353535] normal-case lg:align-baseline lg:translate-y-[-5px] lg:ml-[15px] lg:max-w-[489px]" style="background: none; -webkit-text-fill-color: #353535;">
					<?php echo esc_html($csie_service_description); ?>
				</span>
			<?php endif; ?>
		</h1>
	</div>

	<!-- Hero image -->
	<div class="w-full h-[400px] lg:h-[480px] mt-[30px] lg:mt-[40px] overflow-hidden">
		<img
			src="<?php echo esc_url($csie_hero_image['url']);
					?>"
			alt="<?php echo esc_attr($csie_hero_image['alt']);
					?>"
			class="w-full h-full object-cover">
	</div>
</section>