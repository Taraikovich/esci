<?php
/**
 * The template for displaying comments.
 *
 * @package csie
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="mt-8 bg-white rounded-lg shadow-sm p-6 lg:p-8">
    <?php if (have_comments()) : ?>
        <h2 class="text-2xl font-bold mb-6">
            <?php
            $csie_comment_count = get_comments_number();
            printf(
                esc_html(_n('%d Comment', '%d Comments', $csie_comment_count, 'csie')),
                intval($csie_comment_count)
            );
            ?>
        </h2>

        <?php the_comments_navigation(); ?>

        <div class="space-y-6">
            <?php
            wp_list_comments([
                'style'       => 'div',
                'short_ping'  => true,
                'avatar_size' => 48,
            ]);
            ?>
        </div>

        <?php the_comments_navigation(); ?>

        <?php if (! comments_open()) : ?>
            <p class="mt-6 text-gray-500 text-sm"><?php esc_html_e('Comments are closed.', 'csie'); ?></p>
        <?php endif; ?>
    <?php endif; ?>

    <?php
    comment_form([
        'class_form'   => 'mt-6 space-y-4',
        'class_submit' => 'bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors font-medium cursor-pointer',
        'comment_field' => '<p class="comment-form-comment"><label for="comment" class="block text-sm font-medium text-gray-700 mb-1">' . __('Comment', 'csie') . '</label><textarea id="comment" name="comment" cols="45" rows="6" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" required></textarea></p>',
    ]);
    ?>
</div>
