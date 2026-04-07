<?php

/**
 * Info section for imprint page.
 *
 * @package csie
 */

$csie_imprint_title       = get_field('imprint_title');
$csie_imprint_image       = get_field('imprint_image');
$csie_imprint_company     = get_field('imprint_company_name');
$csie_imprint_address     = get_field('imprint_address');
$csie_imprint_phone       = get_field('imprint_phone');
$csie_imprint_email       = get_field('imprint_email');
$csie_imprint_manager     = get_field('imprint_manager_name');
$csie_imprint_vat         = get_field('imprint_vat_number');
$csie_imprint_vat_note    = get_field('imprint_vat_note');
$csie_imprint_reg         = get_field('imprint_registration_number');
?>

<section class="max-w-[1200px] mx-auto px-[15px] xl:px-0 py-[25px] lg:py-[50px]">
	<?php if ($csie_imprint_title) : ?>
		<h1 class="bg-gradient-to-r from-[#df4253] to-[#004f86] to-[65%] bg-clip-text text-transparent font-bold text-[27px] lg:text-[55px] leading-[1.2] uppercase">
			<?php echo esc_html($csie_imprint_title); ?>
		</h1>
	<?php endif; ?>

	<div class="flex flex-col gap-[30px] xl:flex-row lg:gap-[78px] lg:items-center mt-[25px] lg:mt-[50px]">
		<!-- Left: Company info -->
		<div class="flex flex-col gap-[20px] lg:gap-0 lg:justify-between lg:h-[242px] lg:w-[284px] lg:shrink-0">
			<div class="flex flex-col gap-[10px]">
				<?php if ($csie_imprint_company) : ?>
					<h2 class="font-bold text-[18px] leading-[1.2] text-[#353535] uppercase">
						<?php echo esc_html($csie_imprint_company); ?>
					</h2>
				<?php endif; ?>
				<?php if ($csie_imprint_address) : ?>
					<span class="font-medium text-[16px] leading-[1.2] text-[#00b1ff]">
						<?php echo esc_html($csie_imprint_address); ?>
					</span>
				<?php endif; ?>
			</div>

			<div class="flex flex-col gap-[30px]">
				<?php if ($csie_imprint_phone) : ?>
					<div class="flex gap-[10px] items-center">
						<span class="font-bold text-[18px] leading-[1.2] text-[#353535] uppercase">
							<?php echo esc_html__('Phone:', 'csie'); ?>
						</span>
						<a href="tel:<?php echo esc_attr(str_replace(' ', '', $csie_imprint_phone)); ?>" class="font-medium text-[16px] leading-[1.2] text-[#00b1ff]">
							<?php echo esc_html($csie_imprint_phone); ?>
						</a>
					</div>
				<?php endif; ?>
				<?php if ($csie_imprint_email) : ?>
					<div class="flex gap-[10px] items-center">
						<span class="font-bold text-[18px] leading-[1.2] text-[#353535] uppercase">
							<?php echo esc_html__('E-Mail:', 'csie'); ?>
						</span>
						<a href="mailto:<?php echo esc_attr($csie_imprint_email); ?>" class="font-medium text-[16px] leading-[1.2] text-[#00b1ff]">
							<?php echo esc_html($csie_imprint_email); ?>
						</a>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<!-- Center: Image -->
		<?php if ($csie_imprint_image) : ?>
			<div class="h-[242px] lg:w-[450px] lg:shrink-0 overflow-hidden">
				<img
					src="<?php echo esc_url($csie_imprint_image['url']); ?>"
					alt="<?php echo esc_attr($csie_imprint_image['alt']); ?>"
					class="w-full h-full object-cover">
			</div>
		<?php endif; ?>

		<!-- Right: Legal info -->
		<div class="flex flex-col gap-[30px]">
			<?php if ($csie_imprint_manager) : ?>
				<div class="flex flex-col gap-[10px]">
					<h2 class="font-bold text-[18px] leading-[1.2] text-[#353535] uppercase">
						<?php echo esc_html__('General Manager', 'csie'); ?>
					</h2>
					<span class="text-[16px] leading-[1.2] text-[#606060]">
						<?php echo esc_html($csie_imprint_manager); ?>
					</span>
				</div>
			<?php endif; ?>

			<?php if ($csie_imprint_vat) : ?>
				<div class="flex flex-col gap-[10px]">
					<h2 class="font-bold text-[18px] leading-[1.2] text-[#353535] uppercase">
						<?php echo esc_html__('VAT Number', 'csie'); ?>
					</h2>
					<span class="text-[16px] leading-[1.2] text-[#606060]">
						<?php echo esc_html($csie_imprint_vat); ?>
					</span>
					<?php if ($csie_imprint_vat_note) : ?>
						<span class="text-[16px] leading-[1.2] text-[#606060]">
							<?php echo esc_html($csie_imprint_vat_note); ?>
						</span>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if ($csie_imprint_reg) : ?>
				<div class="flex flex-col gap-[10px]">
					<h2 class="font-bold text-[18px] leading-[1.2] text-[#353535] uppercase">
						<?php echo esc_html__('Company Registration Number', 'csie'); ?>
					</h2>
					<span class="text-[16px] leading-[1.2] text-[#606060]">
						<?php echo esc_html($csie_imprint_reg); ?>
					</span>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>