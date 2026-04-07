<?php

/**
 * Accordion section for conditions page.
 *
 * @package csie
 */

$csie_conditions_items = get_field('conditions_items');
?>

<?php if ($csie_conditions_items) : ?>
	<section class="max-w-[1200px] mx-auto px-[15px] xl:px-0 py-[25px] lg:py-[50px]">
		<div class="csie-conditions-accordion flex flex-col gap-[30px] lg:gap-[50px]">
			<?php foreach ($csie_conditions_items as $csie_condition) : ?>
				<div class="csie-vacancy-item">
					<!-- Header row -->
					<button type="button" class="csie-vacancy-toggle w-full flex items-center justify-between cursor-pointer">
						<span class="font-bold text-[18px] lg:text-[40px] leading-[1.2] text-[#353535] uppercase text-left">
							<?php echo esc_html($csie_condition['condition_title']); ?>
						</span>
						<span class="csie-vacancy-icon shrink-0 w-[18px] h-[18px] lg:w-[22px] lg:h-[22px] ml-[15px]">
							<svg class="csie-icon-plus w-full h-full" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<line x1="11" y1="0" x2="11" y2="22" stroke="#353535" stroke-width="2"/>
								<line x1="0" y1="11" x2="22" y2="11" stroke="#353535" stroke-width="2"/>
							</svg>
							<svg class="csie-icon-minus w-full h-full" viewBox="0 0 22 2" fill="none" xmlns="http://www.w3.org/2000/svg">
								<line x1="0" y1="1" x2="22" y2="1" stroke="#353535" stroke-width="2"/>
							</svg>
						</span>
					</button>

					<!-- Expandable content -->
					<div class="csie-vacancy-content">
						<div class="pt-[20px] lg:pt-[30px]">
							<div class="csie-conditions-text text-[14px] lg:text-[16px] leading-[1.2] text-[#606060]">
								<?php echo wp_kses_post($csie_condition['condition_content']); ?>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
<?php endif; ?>
