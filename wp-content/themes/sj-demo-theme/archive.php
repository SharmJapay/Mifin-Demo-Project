<?php
/**
 * Handles Archive Page Rendering.
 * @package SJ_Demo_Theme
 */
?>

<?php get_header(); ?>

    <main id="primary" class="site-main">
        <h1>
            <?php
            if (is_category()) {
                single_cat_title();
            } elseif (is_tag()) {
                single_tag_title();
            } elseif (is_author()) {
                the_post();
                echo 'Posts by ' . get_the_author();
                rewind_posts();
            } elseif (is_day()) {
                echo 'Archive for ' . get_the_date();
            } elseif (is_month()) {
                echo 'Archive for ' . get_the_date('F Y');
            } elseif (is_year()) {
                echo 'Archive for ' . get_the_date('Y');
            } else {
                echo 'Archives';
            }
            ?>
        </h1>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><?php the_excerpt(); ?></p>
            </article>
        <?php endwhile; else : ?>
            <p><?php esc_html_e('No posts found', 'sj-demo-theme'); ?></p>
        <?php endif; ?>

        <div class="pagination">
            <?php the_posts_pagination(); ?>
        </div>
    </main><!-- #main -->

<?php get_footer(); ?>