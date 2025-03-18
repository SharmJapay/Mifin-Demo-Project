<?php
/**
 * Handles Home Page rendering.
 * @package SJ_Demo_Theme
 */
?>

<?php get_header(); ?>

    <main id="primary" class="site-main">
        <h2>Welcome to <?php bloginfo('name'); ?></h2>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </article>
        <?php endwhile; else : ?>
            <p><?php esc_html_e('No content found', 'sj-demo-theme'); ?></p>
        <?php endif; ?>
    </main><!-- #main -->

<?php get_footer(); ?>