<?php
/**
 * Handles Custom Page Rendering.
 * @package SJ_Demo_Theme
 */
?>

<?php get_header(); ?>

<main id="primary" class="site-main">
    <!-- NOTE: For this project, blocks will be mainly used to create contents in the website -->
    <!-- Rendering all the blocks -->
    <?php the_content(); ?>
</main><!-- #main -->

<?php get_footer(); ?>