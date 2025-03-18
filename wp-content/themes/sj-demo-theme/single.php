<?php
/**
 * Handles Individual Blog Posts Page Rendering.
 * @package SJ_Demo_Theme
 */
?>

<div class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article>
            <h1><?php the_title(); ?></h1>
            <p><strong>Published on:</strong> <?php echo get_the_date(); ?> by <?php the_author(); ?></p>

            <?php the_content(); ?>

            <div class="post-navigation">
                <div class="prev"><?php previous_post_link(); ?></div>
                <div class="next"><?php next_post_link(); ?></div>
            </div>

            <div class="comments-section">
                <?php comments_template(); ?>
            </div>
        </article>
    <?php endwhile; else : ?>
        <p><?php esc_html_e('This post does not exist.', 'sj-demo-theme'); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>