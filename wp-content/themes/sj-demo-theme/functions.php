<?php
/**
 * SJ Demo Theme functions and definitions
 * @package SJ_Demo_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function sj_demo_theme_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
    // Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

    // Add WooCommerce Support
    add_theme_support('woocommerce');     

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'sj_demo_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add support for core custom logo.
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

    // Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Theme support for typography.fontSizes.
	add_theme_support( 'editor-font-sizes', array() ); 

	// Theme support for typography.lineHeight.
    add_theme_support( 'custom-line-height' ); 

	// Theme support for spacing.
	add_theme_support( 'custom-spacing' ); 

	// Theme support for color.gradients.
	add_theme_support( 'editor-gradient-presets', array() ); 

	// Add theme support for the block tool. Requires Gutenberg 14.0 or greater for now.
	add_theme_support( 'appearance-tools' ); 

}
add_action( 'after_setup_theme', 'sj_demo_theme_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * @global int $content_width
 */
function sj_demo_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sj_demo_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'sj_demo_theme_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function sj_demo_theme_styles_scripts() {
	// Bootstrap CSS
    wp_enqueue_style(
		'bootstrap-css', 
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css'
	);

	// Theme CSS
	wp_enqueue_style( 
		'sj-demo-theme-base-style', 
		get_stylesheet_uri(), 
		array(), 
		_S_VERSION 
	);

	// Main CSS
	wp_enqueue_style( 
		'sj-demo-theme-style', 
		get_parent_theme_file_uri('/assets/css/sj-demo-theme.css'), 
		array(), 
		_S_VERSION 
	);

	// Responsive CSS
	wp_enqueue_style( 
		'sj-demo-theme-responsive-style', 
		get_parent_theme_file_uri('/assets/css/sj-demo-theme-responsive.css'), 
		array(), 
		_S_VERSION 
	);

	// Jquery
	wp_enqueue_script('jquery');

	// Bootstrap JS
    wp_enqueue_script(
		'bootstrap-js', 
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', 
		array('jquery'), 
		null, 
		true
	);

	// Main Script
	wp_enqueue_script( 
		'sj-demo-theme-script', 
		get_template_directory_uri() . '/assets/js/sj-demo-theme.js', 
		array('jquery'), 
		_S_VERSION, 
		true 
	);
}
add_action( 'wp_enqueue_scripts', 'sj_demo_theme_styles_scripts' );

/**
 * Registering Custom Navigation Menus.
 */
function sj_demo_theme_register_nav_menus () {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu', 'sj-demo-theme' ),
			'footer-menu'  => __( 'Footer Menu', 'sj-demo-theme' ),
		)
	);
}
add_action( 'init', 'sj_demo_theme_register_nav_menus' );

/**
 * Registering Sidebar Menu.
 */
function sj_demo_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar',  'sj-demo-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.',  'sj-demo-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sj_demo_theme_widgets_init' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
* Redirecting user to My Account if not logged in during checkout process
 */
function check_if_logged_in(){
	$pageid = get_option( 'woocommerce_checkout_page_id' );

	if(!is_user_logged_in() && is_page($pageid)) {
		$url = add_query_arg(
			'redirect_to',
			get_permalink($pageid),
			site_url('/my-account/') // your my account url
		);
		wp_redirect($url);
		exit;
	}

	if(is_user_logged_in())	{
		if(is_page(get_option( 'woocommerce_myaccount_page_id' ))) {
			$redirect = $_GET['redirect_to'];
			if (isset($redirect)) {
				echo '<script>window.location.href = "'.$redirect.'";</script>';
			}
		}
	}
}
add_action('template_redirect','check_if_logged_in');


/**
 * Implementing user authentication pop-up if user is not logged-in during checkout
 */

function activate_authentication_popup() {
    if ( !is_user_logged_in()) {
        require get_template_directory() . '/woocommerce/checkout/auth-popup.php';
    }

}
add_action('get_footer', 'activate_authentication_popup');
