<?php

/**
 * Why Cooperate section for company page.
 *
 * @package csie
 */

$csie_coop_title      = get_field('cooperation_title');
$csie_coop_text_left  = get_field('cooperation_text_left');
$csie_coop_text_right = get_field('cooperation_text_right');
$csie_coop_image_1    = get_field('cooperation_image_1');
$csie_coop_image_2    = get_field('cooperation_image_2');
$pattern_url          = esc_url(get_template_directory_uri() . '/assets/img/footer-pattern.png');
?>

<section class="bg-[#004f86] relative overflow-hidden">
	<!-- Pattern overlay -->
	<img
		src="<?php echo $pattern_url; ?>"
		alt="" aria-hidden="true"
		class="absolute inset-0 w-full h-full object-cover pointer-events-none">

	<div class="relative max-w-[1200px] mx-auto px-[15px] lg:px-0 py-[50px] lg:py-[100px]">
		<!-- Mobile: single column -->
		<div class="flex flex-col gap-[30px] lg:hidden">
			<?php if ($csie_coop_title) : ?>
				<h2 class="font-bold text-[25px] leading-[1.2] uppercase text-white">
					<?php echo esc_html($csie_coop_title); ?>
				</h2>
			<?php endif; ?>

			<?php if ($csie_coop_text_left) : ?>
				<div class="flex flex-col gap-[10px] text-[14px] leading-[1.2] text-white [&>p]:mb-0">
					<?php echo wp_kses_post($csie_coop_text_left); ?>
				</div>
			<?php endif; ?>

			<?php if ($csie_coop_image_1) : ?>
				<div class="h-[200px] overflow-hidden">
					<img
						src="<?php echo esc_url($csie_coop_image_1['url']); ?>"
						alt="<?php echo esc_attr($csie_coop_image_1['alt']); ?>"
						class="w-full h-full object-cover">
				</div>
			<?php endif; ?>

			<?php if ($csie_coop_text_right) : ?>
				<div class="flex flex-col gap-[10px] text-[14px] leading-[1.2] text-white [&>p]:mb-0">
					<?php echo wp_kses_post($csie_coop_text_right); ?>
				</div>
			<?php endif; ?>
		</div>

		<!-- Desktop: complex grid layout -->
		<div class="hidden lg:grid lg:grid-cols-[430px_285px_430px] lg:gap-x-[28px]">
			<!-- Row 1: Title + Image 1 (tall, spans 2 rows) + Image 2 -->
			<div class="flex flex-col gap-[20px] text-white">
				<?php if ($csie_coop_title) : ?>
					<h2 class="font-bold text-[40px] leading-[1.2] uppercase">
						<?php echo esc_html($csie_coop_title); ?>
					</h2>
				<?php endif; ?>

				<?php if ($csie_coop_text_left) : ?>
					<div class="flex flex-col gap-[10px] text-[16px] leading-[1.2] [&>p]:mb-0">
						<?php echo wp_kses_post($csie_coop_text_left); ?>
					</div>
				<?php endif; ?>
			</div>

			<?php if ($csie_coop_image_1) : ?>
				<div class="row-span-2 h-[421px] overflow-hidden">
					<img
						src="<?php echo esc_url($csie_coop_image_1['url']); ?>"
						alt="<?php echo esc_attr($csie_coop_image_1['alt']); ?>"
						class="w-full h-full object-cover">
				</div>
			<?php endif; ?>

			<div class="flex flex-col gap-[26px]">
				<?php if ($csie_coop_image_2) : ?>
					<div class="h-[229px] overflow-hidden">
						<img
							src="<?php echo esc_url($csie_coop_image_2['url']); ?>"
							alt="<?php echo esc_attr($csie_coop_image_2['alt']); ?>"
							class="w-full h-full object-cover">
					</div>
				<?php endif; ?>

				<?php if ($csie_coop_text_right) : ?>
					<div class="flex flex-col gap-[10px] text-[16px] leading-[1.2] text-white [&>p]:mb-0">
						<?php echo wp_kses_post($csie_coop_text_right); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>