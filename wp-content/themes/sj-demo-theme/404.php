<?php
/**
 * Handles 404 Page Rendering.
 * @package SJ_Demo_Theme
 */
?>

<?php get_header(); ?>

    <main id="primary" class="site-main">
        <h1>Oops! Page Not Found</h1>
        <p>Sorry, the page you are looking for does not exist. You can go back to the <a href="<?php home_url(); ?>">homepage</a> or try searching below:</p>

        <?php get_search_form(); ?>
    </main><!-- #main -->

<?php get_footer(); ?>
