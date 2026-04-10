<?php

/**
 * Contact form section for locations page.
 *
 * @package csie
 */

$csie_contact_title = get_field('contact_title');
$csie_contact_form_id = get_field('contact_form_id');
$csie_contact_image = get_field('contact_image');
?>

<section id="contact-form" class="scroll-mt-[120px] max-w-[1200px] mx-auto px-[15px] xl:px-0 py-[25px] lg:py-[50px]">
	<div class="flex flex-col gap-[30px] lg:flex-row lg:items-stretch lg:gap-[40px]">
		<!-- Left: title + form -->
		<div class="flex flex-col gap-[30px] lg:gap-[50px] lg:w-[463px] lg:shrink-0 lg:justify-between">
			<?php if ($csie_contact_title) : ?>
				<h2 class="bg-gradient-to-r from-[#df4253] to-[#004f86] to-[65%] bg-clip-text text-transparent font-bold text-[25px] lg:text-[55px] leading-[1.2] uppercase">
					<?php echo esc_html($csie_contact_title); ?>
				</h2>
			<?php endif; ?>

			<?php if ($csie_contact_form_id) : ?>
				<div class="csie-contact-form">
					<?php echo do_shortcode('[contact-form-7 id="' . intval($csie_contact_form_id) . '"]'); ?>
				</div>
			<?php endif; ?>
		</div>

		<!-- Right: image -->
		<?php if ($csie_contact_image) : ?>
			<div class="w-full h-[215px] lg:h-auto lg:flex-1 overflow-hidden">
				<img
					src="<?php echo esc_url($csie_contact_image['url']); ?>"
					alt="<?php echo esc_attr($csie_contact_image['alt']); ?>"
					class="w-full h-full object-cover">
			</div>
		<?php endif; ?>
	</div>
</section>