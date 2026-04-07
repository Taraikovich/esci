<?php

/**
 * Hero section for career page.
 *
 * @package csie
 */

$csie_career_title = get_field('career_title');
$csie_career_hero_image = get_field('career_hero_image');
?>

<section class="max-w-[1200px] mx-auto px-[15px] xl:px-0 py-[25px] lg:py-[50px]">
	<?php if ($csie_career_title) : ?>
		<h1 class="bg-gradient-to-r from-[#df4253] to-[#004f86] to-[65%] bg-clip-text text-transparent font-bold text-[27px] lg:text-[55px] leading-[1.2] uppercase">
			<?php echo esc_html($csie_career_title); ?>
		</h1>
	<?php endif; ?>
</section>

<?php if ($csie_career_hero_image) : ?>
	<div class="w-full h-[350px] lg:h-[400px] overflow-hidden">
		<img
			src="<?php echo esc_url($csie_career_hero_image['url']); ?>"
			alt="<?php echo esc_attr($csie_career_hero_image['alt']); ?>"
			class="w-full h-full object-cover">
	</div>
<?php endif; ?>
