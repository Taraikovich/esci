<?php
/**
 * The footer for the theme.
 *
 * @package csie
 */
?>

<footer class="bg-gray-800 text-gray-300 mt-12">
    <?php if (is_active_sidebar('sidebar-footer-1') || is_active_sidebar('sidebar-footer-2') || is_active_sidebar('sidebar-footer-3')) : ?>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <?php dynamic_sidebar('sidebar-footer-1'); ?>
                </div>
                <div>
                    <?php dynamic_sidebar('sidebar-footer-2'); ?>
                </div>
                <div>
                    <?php dynamic_sidebar('sidebar-footer-3'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="border-t border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-sm text-gray-400">
                    &copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'csie'); ?>
                </p>
                <?php if (has_nav_menu('footer')) : ?>
                    <nav class="flex items-center gap-4">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'footer',
                            'container'      => false,
                            'items_wrap'     => '%3$s',
                            'depth'          => 1,
                            'fallback_cb'    => false,
                        ]);
                        ?>
                    </nav>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
