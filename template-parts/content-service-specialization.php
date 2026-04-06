<?php

/**
 * Specialization section for service pages.
 *
 * @package csie
 */

$csie_spec_title = get_field('specialization_title');
$csie_spec_text = get_field('specialization_text');
$csie_spec_image = get_field('specialization_image');

if (!$csie_spec_title && !$csie_spec_text && !$csie_spec_image) {
	return;
}
?>

<section class="bg-[#004f86] relative overflow-hidden">
	<!-- Pattern overlay -->
	<img
		src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/footer-pattern.png'); ?>"
		alt="" aria-hidden="true"
		class="absolute inset-0 w-full h-full object-cover pointer-events-none">

	<div class="relative max-w-[1200px] mx-auto px-[15px] lg:px-0 py-[50px] lg:py-[100px]">
		<div class="flex flex-col gap-[30px] lg:flex-row lg:gap-[100px]">
			<!-- Text -->
			<div class="flex flex-col gap-[20px] text-white lg:w-[430px] lg:shrink-0">
				<?php if ($csie_spec_title) : ?>
					<h2 class="font-bold text-[25px] lg:text-[40px] leading-[1.2] uppercase">
						<?php echo esc_html($csie_spec_title); ?>
					</h2>
				<?php endif; ?>

				<?php if ($csie_spec_text) : ?>
					<div class="flex flex-col gap-[10px] text-[14px] lg:text-[16px] leading-[1.2]">
						<?php
						$csie_spec_paragraphs = preg_split('/\n\s*\n/', $csie_spec_text);
						foreach ($csie_spec_paragraphs as $csie_paragraph) :
							$csie_paragraph = trim($csie_paragraph);
							if ($csie_paragraph) :
						?>
								<p><?php echo esc_html($csie_paragraph); ?></p>
						<?php
							endif;
						endforeach;
						?>
					</div>
				<?php endif; ?>
			</div>

			<!-- Photo -->
			<?php if ($csie_spec_image) : ?>
				<div class="h-[211px] lg:w-[285px] lg:h-[211px] overflow-hidden">
					<img
						src="<?php echo esc_url($csie_spec_image['url']); ?>"
						alt="<?php echo esc_attr($csie_spec_image['alt']); ?>"
						class="w-full h-full object-cover">
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>