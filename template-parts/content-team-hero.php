<?php

/**
 * Hero section for team page.
 *
 * @package csie
 */

$csie_team_title = get_field('team_title');
$csie_team_hero_image = get_field('team_hero_image');
?>

<section class="flex flex-col items-center py-[25px] lg:py-[50px]">
	<!-- Title -->
	<div class="px-[15px] xl:px-0 max-w-[1200px] mx-auto w-full">
		<h1 class="bg-gradient-to-r from-[#df4253] to-[#004f86] to-[65%] bg-clip-text text-transparent font-bold text-[27px] lg:text-[55px] leading-[1.2] uppercase text-center lg:text-left">
			<?php echo esc_html($csie_team_title); ?>
		</h1>
	</div>

	<!-- Hero image -->
	<?php if ($csie_team_hero_image) : ?>
		<div class="w-full h-[400px] lg:h-[480px] mt-[30px] lg:mt-[40px] overflow-hidden">
			<img
				src="<?php echo esc_url($csie_team_hero_image['url']); ?>"
				alt="<?php echo esc_attr($csie_team_hero_image['alt']); ?>"
				class="w-full h-full object-cover object-bottom">
		</div>
	<?php endif; ?>
</section>