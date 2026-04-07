<?php

/**
 * Head members section for team page.
 *
 * @package csie
 */

$csie_heads_title = get_field('team_heads_title');
$csie_heads_members = get_field('team_heads_members');
?>

<section class="max-w-[1200px] mx-auto px-[15px] xl:px-0 py-[25px] lg:py-[50px]">
	<div class="flex flex-col gap-[30px] lg:flex-row lg:items-start">
		<!-- Title -->
		<?php if ($csie_heads_title) : ?>
			<h2 class="bg-gradient-to-r from-[#df4253] to-[#004f86] to-[65%] bg-clip-text text-transparent font-bold text-[25px] lg:text-[55px] leading-[1.2] uppercase lg:w-[373px] lg:shrink-0">
				<?php echo esc_html($csie_heads_title); ?>
			</h2>
		<?php endif; ?>

		<!-- Member cards -->
		<?php if ($csie_heads_members) : ?>
			<div class="flex flex-col gap-[20px] xl:flex-row lg:gap-[39px]">
				<?php foreach ($csie_heads_members as $csie_member) : ?>
					<div class="relative w-full lg:w-[387px] overflow-hidden">
						<!-- Background pattern -->
						<div class="absolute inset-0 bg-[#f8f8f8] -z-10"></div>
						<img
							src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/team-card-pattern.png'); ?>"
							alt="" class="absolute bottom-0 left-0 w-full opacity-100 -z-10 pointer-events-none">

						<!-- Photo -->
						<?php if ($csie_member['member_photo']) : ?>
							<div class="w-full h-[268px] lg:h-[318px] overflow-hidden">
								<img
									src="<?php echo esc_url($csie_member['member_photo']['url']); ?>"
									alt="<?php echo esc_attr($csie_member['member_photo']['alt']); ?>"
									class="w-full h-full object-cover">
							</div>
						<?php endif; ?>

						<!-- Info -->
						<div class="flex flex-col gap-[10px] lg:gap-[14px] px-[15px] py-[25px] lg:p-[30px]">
							<?php if ($csie_member['member_name']) : ?>
								<h3 class="font-bold text-[20px] lg:text-[24px] leading-[1.2] text-[#00b1ff] uppercase">
									<?php echo esc_html($csie_member['member_name']); ?>
								</h3>
							<?php endif; ?>

							<?php if ($csie_member['member_position']) : ?>
								<p class="text-[14px] lg:text-[16px] leading-[1.2] text-[#606060]/50">
									<?php echo esc_html($csie_member['member_position']); ?>
								</p>
							<?php endif; ?>

							<?php if ($csie_member['member_description']) : ?>
								<p class="text-[14px] lg:text-[16px] leading-[1.2] text-[#606060]">
									<?php echo esc_html($csie_member['member_description']); ?>
								</p>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>