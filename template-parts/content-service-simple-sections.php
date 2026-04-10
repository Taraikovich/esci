<?php

/**
 * Simple sections (repeater) for service pages.
 *
 * @package csie
 */

$csie_sections = get_field('simple_sections');

if (!$csie_sections) {
	return;
}
?>

<section class="relative pt-[20px] pb-[50px] overflow-hidden">
	<!-- Pattern -->
	<img
		src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/pattern-research.png'); ?>"
		alt="" aria-hidden="true"
		class="absolute inset-0 w-full h-full object-cover pointer-events-none opacity-60">

	<div class="relative max-w-[1200px] mx-auto px-[15px] xl:px-0 flex flex-col gap-10">
		<?php foreach ($csie_sections as $csie_section) : ?>
			<div class="group">
				<?php if ($csie_section['section_title'] || $csie_section['section_icon']) : ?>
					<div class="flex items-center justify-between mb-[20px]">
						<?php if ($csie_section['section_title']) : ?>
							<h2 class="font-bold text-[25px] lg:text-[40px] leading-[1.2] uppercase">
								<span class="bg-gradient-to-r from-[#df4253] to-[#004f86] to-[65%] bg-clip-text text-transparent">
									<?php echo esc_html($csie_section['section_title']); ?>
								</span>
							</h2>
						<?php endif; ?>

						<div class="relative w-[30px] h-[25px] lg:w-[50px] lg:h-[42px] shrink-0">
								<div class="absolute left-0 top-0 size-[12px] lg:size-[20px] bg-[#00b1ff] transition-colors duration-500 group-hover:bg-[#004f86]"></div>
								<div class="absolute right-0 bottom-0 size-[12px] lg:size-[20px] bg-[#004f86] transition-colors duration-500 group-hover:bg-[#00b1ff]"></div>
								<?php if ($csie_section['section_icon']) : ?>
									<img
										src="<?php echo esc_url($csie_section['section_icon']['url']); ?>"
										alt="<?php echo esc_attr($csie_section['section_icon']['alt']); ?>"
										class="absolute inset-0 m-auto w-[20px] h-[20px] lg:w-[34px] lg:h-[34px] object-contain transition-transform duration-500 group-hover:scale-120">
								<?php endif; ?>
							</div>
					</div>
				<?php endif; ?>

				<?php if ($csie_section['section_content']) : ?>
					<div class="text-[14px] lg:text-[16px] leading-[1.5] text-[#606060] [&>p]:mb-[15px] [&>p:last-child]:mb-0 [&>ul]:list-none [&>ul]:space-y-[10px] [&_li]:pl-[15px] [&_li]:relative [&_li]:before:content-[''] [&_li]:before:absolute [&_li]:before:left-0 [&_li]:before:top-[7px] [&_li]:before:size-[5px] [&_li]:before:bg-[#00b1ff] [&>h3]:text-[18px] [&>h3]:lg:text-[24px] [&>h3]:font-bold [&>h3]:text-[#353535] [&>h3]:mb-[10px] [&>h3]:uppercase [&_a]:text-[#00b1ff] [&_a]:font-medium [&_a]:hover:underline">
						<?php echo $csie_section['section_content']; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</div>
</section>