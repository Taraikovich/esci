<?php

/**
 * Service page sub-navigation.
 *
 * Shows sibling pages as tabs (ordered by primary menu).
 * If current page is a tab (level 2), shows its children as pill buttons.
 * If current page is a pill (level 3), highlights parent tab and current pill.
 *
 * @package csie
 */

$csie_current_id = get_the_ID();
$csie_ancestors  = get_post_ancestors($csie_current_id);
$csie_depth      = count($csie_ancestors);

if ($csie_depth >= 2) {
	$csie_root_id      = $csie_ancestors[$csie_depth - 1];
	$csie_active_tab   = $csie_ancestors[0];
	$csie_active_pill  = $csie_current_id;
	$csie_pills_parent = $csie_ancestors[0];
} elseif ($csie_depth === 1) {
	$csie_root_id      = $csie_ancestors[0];
	$csie_active_tab   = $csie_current_id;
	$csie_active_pill  = 0;
	$csie_pills_parent = $csie_current_id;
} else {
	$csie_root_id      = $csie_current_id;
	$csie_active_tab   = 0;
	$csie_active_pill  = 0;
	$csie_pills_parent = 0;
}

// Build menu order map from primary menu
$csie_menu_order_map = array();
$csie_menu_locations = get_nav_menu_locations();
if (! empty($csie_menu_locations['primary'])) {
	$csie_menu_items = wp_get_nav_menu_items($csie_menu_locations['primary']);
	if (is_array($csie_menu_items)) {
		foreach ($csie_menu_items as $csie_item) {
			$csie_menu_order_map[(int) $csie_item->object_id] = $csie_item->menu_order;
		}
	}
}

// Get tab-level pages (children of root), sorted by menu order
$csie_tabs = get_pages(array(
	'child_of'    => $csie_root_id,
	'parent'      => $csie_root_id,
	'sort_column' => 'menu_order,post_title',
	'post_status' => 'publish',
));

if (empty($csie_tabs)) {
	return;
}

usort($csie_tabs, function ($a, $b) use ($csie_menu_order_map) {
	$csie_oa = isset($csie_menu_order_map[$a->ID]) ? $csie_menu_order_map[$a->ID] : PHP_INT_MAX;
	$csie_ob = isset($csie_menu_order_map[$b->ID]) ? $csie_menu_order_map[$b->ID] : PHP_INT_MAX;
	return $csie_oa - $csie_ob;
});

// Get pill-level pages only when a tab is active (depth >= 1)
$csie_pills = array();
if ($csie_pills_parent) {
	$csie_pills = get_pages(array(
		'child_of'    => $csie_pills_parent,
		'parent'      => $csie_pills_parent,
		'sort_column' => 'menu_order,post_title',
		'post_status' => 'publish',
	));
	usort($csie_pills, function ($a, $b) use ($csie_menu_order_map) {
		$csie_oa = isset($csie_menu_order_map[$a->ID]) ? $csie_menu_order_map[$a->ID] : PHP_INT_MAX;
		$csie_ob = isset($csie_menu_order_map[$b->ID]) ? $csie_menu_order_map[$b->ID] : PHP_INT_MAX;
		return $csie_oa - $csie_ob;
	});
}
?>

<nav class="bg-white" aria-label="<?php esc_attr_e('Service navigation', 'csie'); ?>">
	<div class="max-w-[1200px] mx-auto px-[15px] xl:px-0">
		<!-- Tabs -->
		<div class="overflow-x-auto scrollbar-hide">
			<ul class="flex gap-[10px] lg:gap-[30px] pt-[30px] border-b border-[#e5e5e5] min-w-max">
				<?php foreach ($csie_tabs as $csie_tab) :
					$csie_is_active = ($csie_tab->ID === $csie_active_tab);
				?>
					<li>
						<a href="<?php echo esc_url(get_permalink($csie_tab->ID)); ?>"
							class="block pb-[15px] text-[14px] font-bold leading-[1.2] uppercase whitespace-nowrap transition-colors <?php echo $csie_is_active ? 'text-[#353535] border-b-[3px] border-[#00b1ff]' : 'text-[#353535] hover:text-[#00b1ff]'; ?>">
							<?php echo esc_html($csie_tab->post_title); ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<?php if (! empty($csie_pills)) : ?>
			<!-- Child pages as pills -->
			<div class="overflow-x-auto scrollbar-hide">
				<div class="flex flex-wrap gap-[10px] py-[30px] min-w-max lg:min-w-0">
					<?php foreach ($csie_pills as $csie_pill) :
						$csie_pill_active = ($csie_pill->ID === $csie_active_pill);
					?>
						<a href="<?php echo esc_url(get_permalink($csie_pill->ID)); ?>"
							class="rounded-full px-[32px] py-[15px] text-[12px] font-medium leading-[1.2] whitespace-nowrap transition-colors <?php echo $csie_pill_active ? 'bg-[#353535] text-white' : 'bg-[#f8f8f8] text-[#353535] hover:bg-[#efefef]'; ?>">
							<?php echo esc_html($csie_pill->post_title); ?>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</nav>