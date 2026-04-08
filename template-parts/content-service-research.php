<?php

/**
 * Research section for service pages.
 *
 * @package csie
 */

$csie_research_title = get_field('research_title');
$csie_research_desc = get_field('research_description');
$csie_research_cards = get_field('research_cards');

if (!$csie_research_title) {
	return;
}
?>

<section class="py-[50px] lg:py-[100px] bg-white">
	<div class="max-w-[1200px] mx-auto px-[15px] xl:px-0">
		<!-- Header -->
		<div class="flex flex-col gap-[15px] lg:gap-[20px] mb-[30px] lg:mb-[50px]">
			<?php if ($csie_research_title) : ?>
				<div class="flex items-center justify-between">
					<h2 class="font-bold text-[25px] lg:text-[40px] leading-[1.2] uppercase">
						<span class="bg-gradient-to-r from-[#df4253] to-[#004f86] to-[18%] bg-clip-text text-transparent">
							<?php echo esc_html($csie_research_title); ?>
						</span>
					</h2>
					<svg class="w-[30px] h-[30px] shrink-0 lg:hidden" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M9.973 15.2208L12.5974 4.92506C12.7202 4.44318 13.0295 4.02984 13.4571 3.77596C13.8846 3.52208 14.3956 3.44846 14.8774 3.57129C15.3593 3.69412 15.7727 4.00334 16.0265 4.43093C16.2804 4.85852 16.354 5.36945 16.2312 5.85132L13.9156 14.9358M14.0699 14.3302L14.6874 11.9077C14.8103 11.4258 15.1195 11.0124 15.5471 10.7586C15.9747 10.5047 16.4856 10.4311 16.9675 10.5539C17.4494 10.6767 17.8627 10.9859 18.1166 11.4135C18.3705 11.8411 18.4441 12.3521 18.3212 12.8339L17.5494 15.8621M18.0125 14.0452C18.1353 13.5633 18.4445 13.15 18.8721 12.8961C19.2997 12.6422 19.8107 12.5686 20.2925 12.6914C20.7744 12.8143 21.1877 13.1235 21.4416 13.5511C21.6955 13.9787 21.7691 14.4896 21.6463 14.9715L21.1832 16.7884" stroke="#353535" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M21.3374 16.1827C21.4602 15.7008 21.7694 15.2875 22.197 15.0336C22.6246 14.7797 23.1355 14.7061 23.6174 14.829C24.0993 14.9518 24.5126 15.261 24.7665 15.6886C25.0204 16.1162 25.094 16.6271 24.9712 17.109L23.5818 22.5597C23.0904 24.4872 21.8536 26.1406 20.1432 27.1561C18.4328 28.1716 16.3891 28.4661 14.4616 27.9748L12.0391 27.3573L12.291 27.4215C11.0874 27.1149 9.97874 26.5142 9.06462 25.6732C8.1505 24.8323 7.45955 23.7775 7.0538 22.6036L6.90902 22.1797C6.67889 21.5036 5.94167 18.8527 4.69734 14.227C4.57044 13.7554 4.63251 13.253 4.87035 12.8265C5.10818 12.4 5.50302 12.0831 5.97088 11.9433C6.4693 11.7948 7.00301 11.8167 7.48755 12.0056C7.97209 12.1946 8.37979 12.5397 8.64612 12.9864L9.97282 15.2208M5.64714 4.56469C6.74995 4.12218 7.89641 3.7974 9.06745 3.59574M20.1866 5.51544C21.6564 6.34015 22.9934 7.382 24.1524 8.60576" stroke="#353535" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</div>
			<?php endif; ?>

			<?php if ($csie_research_desc) : ?>
				<p class="text-[14px] lg:text-[16px] leading-[1.2] text-[#606060]">
					<?php echo esc_html($csie_research_desc); ?>
				</p>
			<?php endif; ?>
		</div>

		<!-- Cards Swiper -->
		<?php if ($csie_research_cards) : ?>
			<div class="swiper csie-service-research-swiper">
				<div class="swiper-wrapper">
					<?php foreach ($csie_research_cards as $csie_card) :
						$csie_is_dark = ('dark' === $csie_card['card_style']);
					?>
						<div class="swiper-slide">
							<div class="relative overflow-hidden p-[25px] lg:p-[30px] h-full <?php echo $csie_is_dark ? 'bg-[#004f86]' : 'bg-[#f8f8f8]'; ?>">
								<!-- Pattern -->
								<img
									src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/pattern-research.png'); ?>"
									alt="" aria-hidden="true"
									class="absolute bottom-0 left-0 w-full h-[442px] object-cover pointer-events-none <?php echo $csie_is_dark ? 'opacity-10' : 'opacity-100'; ?>">

								<div class="relative flex flex-col gap-[20px]">
									<h3 class="text-[20px] lg:text-[24px] font-bold uppercase leading-[1.2] <?php echo $csie_is_dark ? 'text-white' : 'text-[#353535]'; ?>">
										<?php echo esc_html($csie_card['card_title']); ?>
									</h3>

									<div class="text-[14px] lg:text-[16px] leading-[1.2] <?php echo $csie_is_dark ? 'text-white' : 'text-[#606060]'; ?> [&>p]:mb-[15px] [&>ul]:list-none [&>ul]:space-y-[10px] [&_li]:pl-[15px] [&_li]:relative [&_li]:before:content-[''] [&_li]:before:absolute [&_li]:before:left-0 [&_li]:before:top-[7px] [&_li]:before:size-[5px] <?php echo $csie_is_dark ? '[&_li]:before:bg-white' : '[&_li]:before:bg-[#00b1ff]'; ?> [&_a]:text-[#00b1ff] [&_a]:font-medium [&_a]:hover:underline">
										<?php echo $csie_card['card_content']; ?>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>