<?php
/**
 * Bellevie Care functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bellevie_Care
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'belleviecare_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function belleviecare_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Bellevie Care, use a find and replace
		 * to change 'belleviecare' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'belleviecare', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		//add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'primary' => __( 'Primary', 'belleviecare' ),
				'footer' => __( 'Footer', 'belleviecare' ),
			)
		);
		
		add_filter('menu_id', 'my_css_attributes_filter', 100, 1);
		add_filter('menu_class', 'my_css_attributes_filter', 100, 1);
		add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
		add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
		add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
		function my_css_attributes_filter($var) {
 			 return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
		}
		
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'belleviecare_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function belleviecare_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'belleviecare_content_width', 640 );
}
add_action( 'after_setup_theme', 'belleviecare_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function belleviecare_widgets_init() {
	register_sidebar(
		array(
			'name' => esc_html__( 'Hero' ),
			'id'  => 'hero',
			'description' => esc_html__( 'Hero section at the top of the page.', 'belleviecare' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h1>',
			'after_title'   => '</h1>',
		)
	);
	register_sidebar(
		array(
			'name' => esc_html__( 'Row One' ),
			'id'  => 'row-1',
			'description' => esc_html__( 'Add widgets here.', 'belleviecare' ),
			'before_widget' => '<div class="flex">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name' => esc_html__( 'Row Two' ),
			'id'  => 'row-2',
			'description' => esc_html__( 'Add widgets here.', 'belleviecare' ),
			'before_widget' => '<div class="content flex centered padded">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="large">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name' => esc_html__( 'Row Three' ),
			'id'  => 'row-3',
			'description' => esc_html__( 'Add widgets here.', 'belleviecare' ),
			'before_widget' => '<div class="padded">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="large">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name' => esc_html__( 'Row Four' ),
			'id'  => 'row-4',
			'description' => esc_html__( 'Add widgets here.', 'belleviecare' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name' => esc_html__( 'Footer' ),
			'id'  => 'footer',
			'description' => esc_html__( 'Add footer content here. Footer navigation is configured in the Menus section', 'belleviecare' ),
			'before_widget' => '<div class="fifths">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'belleviecare_widgets_init' );

function wps_post_thumbnail_remove_class($output) {
        $output = preg_replace('/class=".*?"/', '', $output);
        return $output;
}
add_filter('post_thumbnail_html', 'wps_post_thumbnail_remove_class');

function excerpt_read_more_link($output) {
	global $post;
	if ($post->post_type != 'services')
  	{
    	$output .= '<p><a href="'. get_permalink($post->ID) . '">read more</a></p>';  
  	}
  	return $output;
}
add_filter('the_excerpt', 'excerpt_read_more_link');

function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

function modify_read_more_link() {
    return '<a class="button ghost" href="' . get_permalink() . '">Read more</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

//Page Slug Body Class
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

/**
 * Enqueue scripts and styles.
 */
function belleviecare_scripts() {
	wp_enqueue_style( 'belleviecare-style', get_stylesheet_uri(), array(), filemtime(get_stylesheet_directory() . '/style.css') );
	wp_style_add_data( 'belleviecare-style', 'rtl', 'replace' );
	wp_enqueue_script('scripts', get_stylesheet_directory_uri().'/js/scripts.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'belleviecare-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if(is_page()){
		global $wp_query;
        $template_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true );
		if($template_name === 'page-contact-us.php' || 'page.php'){
	   	wp_enqueue_script('forms', get_template_directory_uri() .'/js/forms.js');		
		}
   }
}
add_action( 'wp_enqueue_scripts', 'belleviecare_scripts' );


//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

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