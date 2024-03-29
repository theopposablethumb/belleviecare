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
			'name' => esc_html__( 'Reviews' ),
			'id'  => 'reviews',
			'description' => esc_html__( 'Add widgets here.', 'belleviecare' ),
			'before_widget' => '<div class="content centered padded">',
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

function modify_read_more_link() {
    return '<a class="button ghost" href="' . get_permalink() . '">Read more...</a>';
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
 
 function my_enqueue_assets() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
function belleviecare_scripts() {
	wp_enqueue_style( 'belleviecare-style', get_stylesheet_uri(), array(), filemtime(get_stylesheet_directory() . '/style.css') );
	wp_style_add_data( 'belleviecare-style', 'rtl', 'replace' );
	wp_enqueue_script('scripts', get_stylesheet_directory_uri().'/js/scripts.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'belleviecare-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if(is_page(array('contact-us', 93, 692, 666))){
		global $wp_query;
	   	wp_enqueue_script('forms', get_template_directory_uri() .'/js/forms.js', array(), _S_VERSION, true);
		wp_enqueue_script('recaptcha', 'https://www.google.com/recaptcha/api.js');
		wp_enqueue_script('location', get_template_directory_uri() .'/js/location.js', array(), _S_VERSION, true);
   } elseif(is_single(1197)){
		wp_enqueue_script('forms', get_template_directory_uri() .'/js/forms.js');
		wp_enqueue_script('recaptcha', 'https://www.google.com/recaptcha/api.js');
	} elseif(is_single(1336)){
		wp_enqueue_script('forms', get_template_directory_uri() .'/js/forms.js');
		wp_enqueue_script('recaptcha', 'https://www.google.com/recaptcha/api.js');
	} elseif(is_category('news')) {
   		global $wp_query;
   		wp_enqueue_script( 'belleviecare-pagination', get_template_directory_uri() . '/js/pagination.js', array(), _S_VERSION, true );
   		wp_localize_script( 'belleviecare-pagination', 'pagination', array('ajaxurl' => admin_url( 'admin-ajax.php' )));
   }  elseif(is_page_template('news.php')) {
   		global $wp_query;
   		wp_enqueue_script( 'belleviecare-pagination', get_template_directory_uri() . '/js/pagination.js', array(), _S_VERSION, true );
   		wp_localize_script( 'belleviecare-pagination', 'pagination', array('ajaxurl' => admin_url( 'admin-ajax.php' ), 'security' => wp_create_nonce( 'load_more_posts' ) ));
   } elseif(is_page_template('page-standards.php')) {
   		wp_enqueue_script( 'modal', get_template_directory_uri() . '/js/modal.js', array(), _S_VERSION, true );
   } elseif(is_page_template('page-faqs.php')) {
   		wp_enqueue_script( 'sliders', get_template_directory_uri() . '/js/sliders.js', array(), _S_VERSION, true );
   } elseif(is_page_template('local-landing-page.php')) {
   		wp_enqueue_script('openLayers', get_template_directory_uri() .'/js/openlayers/ol.js');
   		wp_enqueue_script( 'maps', get_template_directory_uri() . '/js/maps.js', array(), _S_VERSION, true);
		wp_enqueue_script('forms', get_template_directory_uri() .'/js/forms.js', array(), _S_VERSION, true);
		wp_enqueue_script('recaptcha', 'https://www.google.com/recaptcha/api.js');
		wp_enqueue_script('location', get_template_directory_uri() .'/js/location.js', array(), _S_VERSION, true);
   }
}
add_action( 'wp_enqueue_scripts', 'belleviecare_scripts' );

add_filter('script_loader_tag', 'add_defer_tags_to_scripts');
function add_defer_tags_to_scripts($tag){
    $scripts_to_defer = array('recaptcha');
 
    foreach($scripts_to_defer as $current_script){
        if(true == strpos($tag, $current_script))
             return str_replace(' src', ' defer="defer" src', $tag);
    }
    return $tag;
 }
 
 add_filter('script_loader_tag', 'add_async_tags_to_scripts');
function add_async_tags_to_scripts($tag){
    $scripts_to_async = array('recaptcha');
 
    foreach($scripts_to_async as $current_script){
        if(true == strpos($tag, $current_script))
             return str_replace(' src', ' async="async" src', $tag);
    }
    return $tag;
 }

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

//Allow editors to edit Privacy Policy Page
add_action('map_meta_cap', 'custom_manage_privacy_options', 1, 4);
function custom_manage_privacy_options($caps, $cap, $user_id, $args)
{
  if (!is_user_logged_in()) return $caps;

  $user_meta = get_userdata($user_id);
  if (array_intersect(['editor', 'administrator'], $user_meta->roles)) {
    if ('manage_privacy_options' === $cap) {
      $manage_name = is_multisite() ? 'manage_network' : 'manage_options';
      $caps = array_diff($caps, [ $manage_name ]);
    }
  }
  return $caps;
}

function get_ajax_posts() {
	check_ajax_referer('load_more_posts', 'security');
    $paged = $_POST['page'];
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name' => 'news',
        'posts_per_page' => '9',
        'paged' => $paged,
    );
    $news_posts = new WP_Query( $args );
 
  	if ( $news_posts->have_posts() ) :
    	while ( $news_posts->have_posts() ) : $news_posts->the_post();
        	get_template_part( 'template-parts/content', get_post_type() );
        endwhile; 
    endif;
 
    wp_die();
}

add_action('wp_ajax_get_ajax_posts', 'get_ajax_posts');
add_action('wp_ajax_nopriv_get_ajax_posts', 'get_ajax_posts');

function is_child($pageID) { 
	global $post; 
	if( is_page() && ($post->post_parent==$pageID) ) {
               return true;
	} else { 
               return false; 
	}
}

add_filter( 'wpseo_json_ld_output', '__return_false' );

add_action('wp_head', 'structuredData');
function structuredData() {
	global $post;
	get_post_type();
	if( 'job' == get_post_type())  {
		$id = get_the_ID();
		echo '<script type="application/ld+json">
		{
			"@context" : "https://schema.org/",
      		"@type" : "JobPosting",
      		"title" : "' . get_field('job_title') . '",
      		"description" : "<p>' . get_field('job_description') . '</p>",
      		"identifier": {
        		"@type": "PropertyValue",
        		"name": "' . get_bloginfo( $show = 'name', $filter = 'raw' ) . '",
        		"value": "' . $id . '"
      		},
      		"datePosted" : "' . get_the_date('Y-m-d') . '",
      		"applicantLocationRequirements": {
        		"@type": "Country",
        		"name": "UK"
      		},';
      		if (get_field('location')) {
      			echo '"jobLocation": {
    			"@type": "Place",
    			"address": {
      				"@type": "PostalAddress",
      				"addressLocality": "' . get_field('location') . '"
   	 			}
  			},';
      		};
      		echo '"jobLocationType": "' . get_field('location_type') . '",
      		"employmentType": "' . get_field('employment_type') . '",
      		"hiringOrganization" : {
        		"@type" : "Organization",
        		"name" : "' . get_bloginfo( $show = 'name', $filter = 'raw' ) . '",
        		"sameAs" : "' . get_bloginfo( $show = 'url', $filter = 'raw' ) . '",
        		"logo" : "' . esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) ) . '"
      		},
      		"baseSalary": {
        		"@type": "MonetaryAmount",
        		"currency": "GBP",
        		"value": {
          			"@type": "QuantitativeValue",
          			"minValue":' . get_field('salary') . ',';
          			if (get_field('max_salary')) {
          				echo '"maxValue": ' . get_field('max_salary') . ',';
          			};
          			echo '"unitText": "' . get_field('salary_type') . '"
        		}
    		}
    	}
    </script>';
	}
	if ( is_front_page() ) {
		echo '<script type="application/ld+json">
			{
				"@context": "http://schema.org", 
				"@type": "Organization", 
				"description": "Home care tailored to you and your loved ones, helping people to live happily at home. Our local teams are recruited for their personal values and offer a wide range of care services with a focus on wellbeing.", 
				"name": "BelleVie Care", 
				"legalName": "BelleVie Care Ltd",
				"url": "https://www.belleviecare.co.uk", 
				"logo": "https://www.belleviecare.co.uk/wp-content/uploads/2020/10/bellevielogo-sm.png", 
				"founders": [
					{ "@type": "Person", "name": "Trudie Fell", "jobTitle": "Chief Executive Officer" },
					{ "@type": "Person", "name": "Violaine Pierre", "jobTitle": "Chief Operating Officer"}
				],
				"contactPoint": {
					"@type":"ContactPoint", 
					"contactType":"New enquiries",
					"areaServed": [
						{ "@type": "AdministrativeArea", "name": "South Oxfordshire" },
						{ "@type": "AdministrativeArea", "name": "County Durham" },
						{ "@type": "AdministrativeArea", "name": "Tyne and Wear" },
						{ "@type": "AdministrativeArea", "name": "Northumberland" }
					],
					"telephone":["01235 355 570", "0191 313 0189"],
					"email":"info@belleviecare.co.uk"
				},
				"sameAs": [
					"https://www.facebook.com/BellevieCareUK/",
					"https://twitter.com/Bellevie_care/",
					"https://www.instagram.com/belleviecare/",
					"https://www.linkedin.com/company/bellevie/"
				]
			} 
		</script>';
	};
	if (is_page_template('page-faqs.php') ) {
		$queryValues = new WP_Query( array( 'post_type' => 'faq', 'posts_per_page' => -1 ) );
		echo '<script type="application/ld+json">
    			{
      				"@context": "https://schema.org",
      				"@type": "FAQPage",
      				"mainEntity": [';
		while ( $queryValues->have_posts() ) {
    		$queryValues->the_post();
    		if ($queryValues->current_post +1 == $queryValues->post_count) {
    			echo '{ "@type": "Question", "name": " ' . get_the_title() . ' ", "acceptedAnswer": { "@type": "Answer", "text": " ';
    			echo esc_html_e(get_the_content()) . ' "} }';
			} else {
				echo '{ "@type": "Question", "name": " ' . get_the_title() . ' ", "acceptedAnswer": { "@type": "Answer", "text": " ';
    			echo esc_html_e(get_the_content()) . ' "} },';
			}
		}
		echo ']}</script>';
		wp_reset_postdata();
	}
}

add_filter( 'use_widgets_block_editor', '__return_false' );