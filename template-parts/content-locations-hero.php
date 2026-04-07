<?php

/**
 * Hero section for locations page.
 *
 * @package csie
 */

$csie_locations_title = get_field('locations_title');
$csie_locations_description = get_field('locations_description');
$csie_locations_offices = get_field('locations_offices');
?>

<section class="max-w-[1200px] mx-auto px-[15px] xl:px-0 py-[25px] lg:py-[50px]">
	<div class="flex flex-col gap-[30px] lg:flex-row lg:items-start lg:gap-[50px]">
		<!-- Left: title + description -->
		<div class="flex flex-col gap-[20px] lg:w-[347px] lg:shrink-0">
			<?php if ($csie_locations_title) : ?>
				<h1 class="bg-gradient-to-r from-[#df4253] to-[#004f86] to-[65%] bg-clip-text text-transparent font-bold text-[27px] lg:text-[55px] leading-[1.2] uppercase">
					<?php echo esc_html($csie_locations_title); ?>
				</h1>
			<?php endif; ?>

			<?php if ($csie_locations_description) : ?>
				<div class="text-[14px] lg:text-[16px] leading-[1.2] text-[#606060] [&>p]:mb-[10px] [&>p:last-child]:mb-0">
					<?php echo wp_kses_post($csie_locations_description); ?>
				</div>
			<?php endif; ?>
		</div>

		<!-- Right: office cards -->
		<?php if ($csie_locations_offices) : ?>
			<div class="flex flex-col gap-[10px] xl:flex-row lg:gap-[39px]">
				<?php foreach ($csie_locations_offices as $csie_office) : ?>
					<div class="bg-[#f8f8f8] flex flex-col w-full lg:w-[387px]">
						<!-- Photo -->
						<?php if ($csie_office['office_photo']) : ?>
							<div class="w-full h-[200px] lg:h-[318px] overflow-hidden">
								<img
									src="<?php echo esc_url($csie_office['office_photo']['url']); ?>"
									alt="<?php echo esc_attr($csie_office['office_photo']['alt']); ?>"
									class="w-full h-full object-cover">
							</div>
						<?php endif; ?>

						<!-- Info -->
						<div class="flex flex-col gap-[30px] p-[20px] lg:p-[30px]">
							<div class="flex flex-col gap-[14px]">
								<?php if ($csie_office['office_name']) : ?>
									<h2 class="font-bold text-[20px] lg:text-[24px] leading-[1.2] text-[#004f86] uppercase">
										<?php echo esc_html($csie_office['office_name']); ?>
									</h2>
								<?php endif; ?>

								<?php if ($csie_office['office_address']) : ?>
									<div class="text-[14px] leading-[1.2] text-[#606060] [&>p]:mb-[10px] [&>p:last-child]:mb-0">
										<?php echo wp_kses_post($csie_office['office_address']); ?>
									</div>
								<?php endif; ?>
							</div>

							<!-- Contact -->
							<div class="flex flex-col gap-[10px]">
								<?php if ($csie_office['office_phone']) : ?>
									<div class="flex gap-[10px] items-center">
										<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icon-phone.svg'); ?>" alt="" class="w-[20px] h-[20px]">
										<span class="text-[14px] lg:text-[16px] leading-[1.2] text-[#004f86]">
											<?php echo esc_html($csie_office['office_phone']); ?>
										</span>
									</div>
								<?php endif; ?>

								<?php if ($csie_office['office_email']) : ?>
									<div class="flex gap-[10px] items-center">
										<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icon-email.svg'); ?>" alt="" class="w-[20px] h-[16px]">
										<span class="text-[14px] lg:text-[16px] leading-[1.2] text-[#004f86]">
											<?php echo esc_html($csie_office['office_email']); ?>
										</span>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
