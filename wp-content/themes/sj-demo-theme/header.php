<?php
/**
 * The header of the theme
 * @package SJ_Demo_Theme
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header id="sj-header" class="site-header grid-container">
    <div class="navbar">
        <div class="logo">
            <?php  if ( has_custom_logo() ) { 
                the_custom_logo();?>
            <?php  } else { ?>
                <h1><a href="<?php home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
            <?php  } ?>
        </div>

        <!-- Displays the Header Menu -->
        <nav>
            <?php wp_nav_menu(array('theme_location' => 'primary-menu')); ?>
        </nav>

        <button class="menu-toggle" onclick="toggleMenu()">&#9776;</button>
    </div>
</header>
