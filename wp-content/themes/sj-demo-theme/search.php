<?php
/**
 * Handles Search Page Rendering.
 * @package SJ_Demo_Theme
 */
?>

<?php get_header(); ?>

<div class="container">
    <h1>Search Results for: "<?php echo get_search_query(); ?>"</h1>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php the_excerpt(); ?></p>
        </article>
    <?php endwhile; ?>

        <div class="pagination">
            <?php the_posts_pagination(); ?>
        </div>

    <?php else : ?>
        <p><?php esc_html_e('No results found. Try searching again:', 'sj-demo-theme'); ?></p>
        <?php get_search_form(); ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>