<?php
/**
 * The footer of the theme
 * @package SJ_Demo_Theme
 */
?>

<footer id="sj-footer" class="site-footer grid-container">
    <!-- Displays the Footer Menu -->
    <nav>
        <?php wp_nav_menu(array('theme_location' => 'footer-menu')); ?>
    </nav>

    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.</p>
</footer>

<?php wp_footer(); ?>

</body>
</html>

