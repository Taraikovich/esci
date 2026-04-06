<?php

/**
 * Breadcrumbs template part.
 *
 * @package csie
 */

$csie_breadcrumb_ancestors = array_reverse(get_post_ancestors(get_the_ID()));
?>

<nav class="flex items-center gap-[10px]" aria-label="<?php esc_attr_e('Breadcrumbs', 'csie'); ?>">
	<a href="<?php echo esc_url(home_url('/')); ?>" class="text-[16px] font-normal leading-[1.2] text-[#353535] whitespace-nowrap hover:text-[#00b1ff] transition-colors">
		<?php esc_html_e('Home', 'csie'); ?>
	</a>

	<?php foreach ($csie_breadcrumb_ancestors as $csie_ancestor_id) : ?>
		<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/breadcrumb-arrow.svg'); ?>" class="w-[5px] h-[8px]" alt="" aria-hidden="true">
		<a href="<?php echo esc_url(get_permalink($csie_ancestor_id)); ?>" class="text-[16px] font-normal leading-[1.2] text-[#353535] whitespace-nowrap hover:text-[#00b1ff] transition-colors">
			<?php echo esc_html(get_the_title($csie_ancestor_id)); ?>
		</a>
	<?php endforeach; ?>

	<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/breadcrumb-arrow.svg'); ?>" class="w-[5px] h-[8px]" alt="" aria-hidden="true">
	<span class="text-[16px] font-semibold leading-[1.2] text-[#00b1ff] whitespace-nowrap" aria-current="page">
		<?php the_title(); ?>
	</span>
</nav>
