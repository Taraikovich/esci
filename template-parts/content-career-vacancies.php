<?php

/**
 * Vacancies accordion section for career page.
 *
 * @package csie
 */

$csie_vacancy_title       = get_field('vacancy_title');
$csie_vacancy_description = get_field('vacancy_description');
$csie_vacancy_button_text = get_field('vacancy_button_text');
$csie_vacancy_items       = get_field('vacancy_items');
?>

<section class="max-w-[1200px] mx-auto px-[15px] xl:px-0 py-[25px] lg:py-[50px]">
	<!-- Header: title + description -->
	<div class="flex flex-col gap-[25px] lg:flex-row lg:gap-[50px] lg:items-start">
		<?php if ($csie_vacancy_title) : ?>
			<h2 class="font-bold text-[25px] lg:text-[40px] leading-[1.2] text-[#353535] uppercase lg:shrink-0">
				<?php echo esc_html($csie_vacancy_title); ?>
			</h2>
		<?php endif; ?>

		<?php if ($csie_vacancy_description) : ?>
			<div class="text-[14px] lg:text-[16px] leading-[1.2] text-[#606060] [&>p]:mb-[10px] [&>p:last-child]:mb-0 [&_a]:text-[#00b1ff] [&_a]:font-semibold">
				<?php echo wp_kses_post($csie_vacancy_description); ?>
			</div>
		<?php endif; ?>
	</div>

	<!-- Accordion -->
	<?php if ($csie_vacancy_items) : ?>
		<div class="csie-vacancy-accordion mt-[50px]">
			<?php foreach ($csie_vacancy_items as $csie_index => $csie_vacancy) : ?>
				<div class="csie-vacancy-item border-t border-[#d9d9d9]<?php echo $csie_index === array_key_last($csie_vacancy_items) ? ' border-b' : ''; ?>">
					<!-- Header row -->
					<button type="button" class="csie-vacancy-toggle w-full flex items-center justify-between py-[20px] lg:py-[30px] cursor-pointer">
						<span class="bg-gradient-to-r from-[#df4253] to-[#004f86] to-[65%] bg-clip-text text-transparent font-bold text-[18px] lg:text-[24px] leading-[1.2] uppercase text-left">
							<?php echo esc_html($csie_vacancy['vacancy_name']); ?>
						</span>
						<span class="csie-vacancy-icon shrink-0 w-[18px] h-[18px] lg:w-[22px] lg:h-[22px] ml-[15px]">
							<svg class="csie-icon-plus w-full h-full" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<line x1="11" y1="0" x2="11" y2="22" stroke="#004f86" stroke-width="2"/>
								<line x1="0" y1="11" x2="22" y2="11" stroke="#004f86" stroke-width="2"/>
							</svg>
							<svg class="csie-icon-minus w-full h-full" viewBox="0 0 22 2" fill="none" xmlns="http://www.w3.org/2000/svg">
								<line x1="0" y1="1" x2="22" y2="1" stroke="#004f86" stroke-width="2"/>
							</svg>
						</span>
					</button>

					<!-- Expandable content -->
					<div class="csie-vacancy-content">
						<div class="flex flex-col gap-[30px] lg:flex-row lg:items-start pb-[20px] lg:pb-[30px]">
							<!-- Left: Location + Conditions -->
							<div class="flex flex-col gap-[20px] lg:w-[170px] lg:shrink-0">
								<?php if ($csie_vacancy['vacancy_location']) : ?>
									<div class="flex flex-col gap-[15px]">
										<h3 class="font-bold text-[16px] lg:text-[18px] leading-[1.2] text-[#353535] uppercase">
											<?php echo esc_html__('Location', 'csie'); ?>
										</h3>
										<div class="csie-vacancy-list text-[14px] lg:text-[16px] leading-[1.2] text-[#606060]">
											<?php echo wp_kses_post($csie_vacancy['vacancy_location']); ?>
										</div>
									</div>
								<?php endif; ?>

								<?php if ($csie_vacancy['vacancy_conditions']) : ?>
									<div class="flex flex-col gap-[15px]">
										<h3 class="font-bold text-[16px] lg:text-[18px] leading-[1.2] text-[#353535] uppercase">
											<?php echo esc_html__('Conditions', 'csie'); ?>
										</h3>
										<div class="csie-vacancy-list text-[14px] lg:text-[16px] leading-[1.2] text-[#606060]">
											<?php echo wp_kses_post($csie_vacancy['vacancy_conditions']); ?>
										</div>
									</div>
								<?php endif; ?>
							</div>

							<!-- Middle: Requirements -->
							<?php if ($csie_vacancy['vacancy_requirements']) : ?>
								<div class="flex flex-col gap-[15px] lg:flex-1">
									<h3 class="font-bold text-[16px] lg:text-[18px] leading-[1.2] text-[#353535] uppercase">
										<?php echo esc_html__('Requirements', 'csie'); ?>
									</h3>
									<div class="csie-vacancy-list text-[14px] lg:text-[16px] leading-[1.2] text-[#606060]">
										<?php echo wp_kses_post($csie_vacancy['vacancy_requirements']); ?>
									</div>
								</div>
							<?php endif; ?>

							<!-- Right: Button -->
							<?php if ($csie_vacancy_button_text && $csie_vacancy['vacancy_link']) : ?>
								<a href="<?php echo esc_url($csie_vacancy['vacancy_link']); ?>"
								   class="flex items-center justify-between w-full lg:w-[220px] h-[50px] bg-[#004f86] hover:bg-[#00b1ff] transition-colors rounded-[500px] px-[32px] shrink-0 lg:self-end">
									<span class="text-white text-[16px] font-medium leading-[1.2]">
										<?php echo esc_html($csie_vacancy_button_text); ?>
									</span>
									<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/arrow-right-white.svg'); ?>" alt="" class="w-[16px] h-[10px]">
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</section>
