<?php

/**
 * Our Services section for company page.
 *
 * @package csie
 */

$csie_os_title       = get_field('our_services_title');
$csie_os_description = get_field('our_services_description');
$csie_os_list        = get_field('our_services_list');
$csie_os_image       = get_field('our_services_image');
$csie_os_cards       = get_field('our_services_cards');
?>

<section class="bg-white py-[60px] lg:py-[100px]">
	<div class="max-w-[1200px] mx-auto px-[15px] xl:px-0">
		<!-- Title -->
		<?php if ($csie_os_title) : ?>
			<h2 class="font-bold text-[25px] lg:text-[40px] leading-[1.2] uppercase text-[#353535] mb-[30px] lg:mb-[50px]">
				<?php echo esc_html($csie_os_title); ?>
			</h2>
		<?php endif; ?>

		<!-- Description + List + Image -->
		<div class="flex flex-col lg:flex-row gap-[30px] lg:gap-[70px]">
			<div class="lg:flex-1">
				<?php if ($csie_os_description) : ?>
					<p class="text-[14px] lg:text-[16px] font-medium leading-[1.2] text-[#353535] mb-[20px]">
						<?php echo esc_html($csie_os_description); ?>
					</p>
				<?php endif; ?>

				<?php if ($csie_os_list) : ?>
					<div class="lg:columns-2 gap-[40px] text-[14px] leading-[1.2] text-[#353535] [&>ul]:list-none [&>ul]:p-0 [&>ul]:m-0 [&>ul]:flex [&>ul]:flex-col [&>ul]:gap-[10px] [&>ul]:mb-[20px] [&>ul>li]:flex [&>ul>li]:items-center [&>ul>li]:gap-[10px] [&>ul>li]:before:content-[''] [&>ul>li]:before:size-[5px] [&>ul>li]:before:bg-[#00b1ff] [&>ul>li]:before:shrink-0">
						<?php echo wp_kses_post($csie_os_list); ?>
					</div>
				<?php endif; ?>
			</div>

			<?php if ($csie_os_image) : ?>
				<div class="w-full lg:w-[400px] h-[286px] shrink-0 overflow-hidden">
					<img
						src="<?php echo esc_url($csie_os_image['url']); ?>"
						alt="<?php echo esc_attr($csie_os_image['alt']); ?>"
						class="w-full h-full object-cover">
				</div>
			<?php endif; ?>
		</div>

		<!-- Technology Cards -->
		<?php if ($csie_os_cards) : ?>
			<div class="mt-[50px] lg:mt-[80px]">
				<!-- Desktop: 3×3 grid -->
				<div class="hidden lg:grid lg:grid-cols-3">
					<?php foreach ($csie_os_cards as $i => $card) :
						$bg_color    = $card['card_bg_color'] ?: '#ffffff';
						$shadow      = ($bg_color === '#ffffff' || $bg_color === '#fff') ? 'shadow-[0_0_10px_0_rgba(0,0,0,0.03)]' : '';
					?>
						<div class="group flex flex-col gap-[15px] p-[25px] lg:p-[30px] min-h-[150px] <?php echo esc_attr($shadow); ?>" style="background-color: <?php echo esc_attr($bg_color); ?>">
							<h3 class="text-[18px] font-bold uppercase leading-[1.2] transition-colors group-hover:text-[#00b1ff]">
								<?php echo esc_html($card['card_title']); ?>
							</h3>
							<p class="text-[14px] lg:text-[16px] leading-[1.2] text-[#606060]">
								<?php echo esc_html($card['card_text']); ?>
							</p>
						</div>
					<?php endforeach; ?>
				</div>

				<!-- Mobile: Swiper with 3 cards per column per slide -->
				<div class="lg:hidden">
					<div class="swiper csie-services-grid-swiper">
						<div class="swiper-wrapper">
							<?php
							$chunks = array_chunk($csie_os_cards, 3);
							foreach ($chunks as $chunk) :
							?>
								<div class="swiper-slide">
									<div class="flex flex-col">
										<?php foreach ($chunk as $card) :
											$bg_color    = $card['card_bg_color'] ?: '#ffffff';
											$title_color = $card['card_title_color'] ?: '#353535';
											$shadow      = ($bg_color === '#ffffff' || $bg_color === '#fff') ? 'shadow-[0_0_10px_0_rgba(0,0,0,0.03)]' : '';
										?>
											<div class="group flex flex-col gap-[15px] p-[25px] min-h-[150px] <?php echo esc_attr($shadow); ?>" style="background-color: <?php echo esc_attr($bg_color); ?>">
												<h3 class="text-[18px] font-bold uppercase leading-[1.2] transition-colors group-hover:!text-[#00b1ff]" style="color: <?php echo esc_attr($title_color); ?>">
													<?php echo esc_html($card['card_title']); ?>
												</h3>
												<p class="text-[14px] leading-[1.2] text-[#606060]">
													<?php echo esc_html($card['card_text']); ?>
												</p>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
						<div class="csie-services-grid-pagination flex justify-center gap-[5px] mt-[20px]"></div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>