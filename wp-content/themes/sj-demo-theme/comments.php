<?php
/**
 * Handles Comments Rendering.
 * @package SJ_Demo_Theme
 */
?>

<?php
// Prevent direct script access
if (post_password_required()) {
    return;
}
?>

<div class="comments-area">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            if ($comment_count == 1) {
                echo "1 Comment";
            } else {
                echo $comment_count . " Comments";
            }
            ?>
        </h2>

        <ul class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ul',
                'short_ping' => true,
                'avatar_size' => 50,
            ));
            ?>
        </ul>

        <div class="comment-navigation">
            <?php
                paginate_comments_links();
            ?>
        </div>
    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number()) : ?>
        <p class="no-comments"><?php esc_html_e('Comments are closed.',  'sj-demo-theme'); ?></p>
    <?php endif; ?>

    <?php
        comment_form(array(
            'title_reply' => __('Leave a Comment',  'sj-demo-theme'),
            'label_submit' => __('Post Comment',  'sj-demo-theme'),
            'class_submit' => 'submit-button',
            'comment_notes_before' => '',
            'comment_notes_after' => '',
        ));
    ?>
</div>
