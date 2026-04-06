<?php

/**
 * Project Time Management section for service pages.
 *
 * @package csie
 */

$csie_ptm_title = get_field('ptm_title');
$csie_ptm_desc = get_field('ptm_description');

if (!$csie_ptm_title && !$csie_ptm_desc) {
	return;
}
?>

<section class="relative bg-[#f8f8f8] py-[50px] lg:py-[100px] overflow-hidden">
	<!-- Pattern -->
	<img
		src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/pattern-research.png'); ?>"
		alt="" aria-hidden="true"
		class="absolute inset-0 w-full h-full object-cover pointer-events-none">

	<div class="relative max-w-[580px] mx-auto px-[15px] lg:px-0 flex flex-col gap-[30px] lg:gap-[40px] items-center text-center">
		<?php if ($csie_ptm_title) : ?>
			<h2 class="font-bold text-[25px] lg:text-[40px] leading-[1.2] uppercase lg:whitespace-nowrap">
				<span class="bg-gradient-to-r from-[#df4253] to-[#004f86] to-[18%] bg-clip-text text-transparent">
					<?php echo esc_html($csie_ptm_title); ?>
				</span>
			</h2>
		<?php endif; ?>

		<?php if ($csie_ptm_desc) : ?>
			<div class="text-[14px] lg:text-[16px] leading-[1.2] text-[#606060] [&_a]:text-[#00b1ff] [&_a]:font-medium [&_a]:hover:underline">
				<?php echo $csie_ptm_desc; ?>
			</div>
		<?php endif; ?>
	</div>
</section>