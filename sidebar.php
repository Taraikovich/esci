<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package csie
 */

if (! is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside class="space-y-6" role="complementary">
    <?php dynamic_sidebar('sidebar-1'); ?>
</aside>
