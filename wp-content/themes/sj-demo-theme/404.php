<?php
/**
 * Handles 404 Page Rendering.
 * @package SJ_Demo_Theme
 */
?>

<?php get_header(); ?>

<div class="container">
    <h1>Oops! Page Not Found</h1>
    <p>Sorry, the page you are looking for does not exist. You can go back to the <a href="<?php echo home_url(); ?>">homepage</a> or try searching below:</p>

    <?php get_search_form(); ?>
</div>

<?php get_footer(); ?>
