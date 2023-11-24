<?php

require_once 'AjaxMap.php';

/**
 * PostUA functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package PostUA
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function postua_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on PostUA, use a find and replace
		* to change 'postua' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'postua', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'postua' ),
		)
	);

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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'postua_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
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

add_action( 'after_setup_theme', 'postua_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function postua_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'postua_content_width', 640 );
}

add_action( 'after_setup_theme', 'postua_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function postua_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'postua' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'postua' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'postua_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function postua_scripts(): void {

	wp_enqueue_style( 'postua-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'postua-style', 'rtl', 'replace' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.min.css' );
	wp_enqueue_style( 'style-swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css' );
	function google_fonts(): void {
		wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', false );
	}

	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), '3.6.0', false );
	add_action( 'wp_enqueue_scripts', 'google_fonts' );
	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/assets/js/main.js', array(), null, true );
	wp_enqueue_script( 'map-script', get_template_directory_uri() . '/assets/js/map.js', array(), null, true );
	$current_language = get_locale();
	if ( $current_language === 'uk' ) {
		wp_enqueue_script( 'calculator-script', get_template_directory_uri() . '/assets/js/calculator.js', array(), null, true );
	} else {
		wp_enqueue_script( 'calculator-script', get_template_directory_uri() . '/assets/js/calculator-en.js', array(), null, true );
	}
	wp_enqueue_script( 'swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), null, true );
	wp_enqueue_script( 'slider-script', get_template_directory_uri() . '/assets/js/slider.js', array(), null, true );
	wp_enqueue_script( 'slider-script-2', get_template_directory_uri() . '/assets/js/slider-2.js', array(), null, true );
	wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDJ5ewdsCKSkgkJ1fb0rgPbtsnVTMlFD40&callback=initMap&language=uk', array(), null, true );


}

add_action( 'wp_enqueue_scripts', 'postua_scripts' );

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

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page();
}

function register_custom_rest_route() {
	register_rest_route( 'my-namespace/v1', '/locations', array(
		'methods'  => 'GET',
		'callback' => 'get_locations',
	) );
}

add_action( 'rest_api_init', 'register_custom_rest_route' );

function get_locations( $request ) {
	$places = array(// Ваш массив местоположений
	);

	return rest_ensure_response( $places );
}

function custom_promo_code_validation( $result, $tag ) {
	$tag_name = $tag['name'];
	if ( $tag_name == 'promo-code' ) {
		$promo_code = sanitize_text_field( $_POST['promo-code'] );
		if ( ! your_custom_validation_logic( $promo_code ) ) {
			$result->invalidate( $tag, 'There is no such certificate, because this certificate is victorious.' );



		}
	}

	return $result;
}

add_filter( 'wpcf7_validate_text', 'custom_promo_code_validation', 10, 2 );


function your_custom_validation_logic( $promo_code ): bool {
	if ( $promo_code === '' ) {
		return true;
	}
	$args = array(
		'post_type' => 'certificate',
		'name'      => $promo_code,
	);

	$existing_posts = new WP_Query( $args );

	if ( $existing_posts->have_posts() ) {
		$existing_posts->the_post();
		$post_id = get_the_ID();
		$status  = get_post_meta( $post_id, '_certificate_status', true );
		if ( $status === 'active' ) {
			return true;
		} elseif ( $status === 'deactivated' ) {
			return false;
		}
	}

	return false;
}

add_action( 'wpcf7_mail_sent', 'my_custom_cf7_action', 10, 1 );

function my_custom_cf7_action( $contact_form ): void {
	$wpcf7 = WPCF7_ContactForm::get_current();

	if ( $wpcf7->id() == $contact_form->id() ) {
		$promo_code = isset( $_POST['promo-code'] ) ? sanitize_text_field( $_POST['promo-code'] ) : '';

		if ( $promo_code !== '' ) {
			$args           = array(
				'post_type' => 'certificate',
				'name'      => $promo_code,
			);
			$existing_posts = new WP_Query( $args );
			if ( $existing_posts->have_posts() ) {
				$existing_posts->the_post();
				$post_id = get_the_ID();
				update_post_meta( $post_id, '_certificate_status', 'deactivated' );
			}
		}
	}
}


	function dd( $data ) {
		echo '<pre>';
		die( var_dump( $data ) );
		echo '</pre>';
	}
