<?php
/**
 * meatball functions and definitions
 *
 * @package meatball
 */

if ( ! isset( $content_width ) ) {
	$content_width = 765;
}


require get_template_directory() . '/libs/vt-resizer.php';

if ( ! function_exists( 'meatball_blog_thumbnail' ) ) :

function meatball_blog_hero_image($postID) {
	$url = get_post_meta( $postID, 'blog_hero_image', true );
	return $url;
}

function meatball_blog_thumbnail($postID, $width, $height) {
	$hero_img = meatball_blog_hero_image($postID);
	// $thumb_img = vt_resize('', $hero_img, $width, $height, true);
	// echo $thumb_img;

	// return $thumb_img;

	$image = wp_get_image_editor( $hero_img );
	if ( ! is_wp_error( $image ) ) {
	    $image->resize( $width, $height, false );
	    $saved_image = $image->save( 'new_image.jpg' );
			var_dump($saved_image);

	}


}


endif;

function custom_excerpt_length( $length ) {
	return 10;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

function the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '';
	} else {
		echo $excerpt;
	}
}

if ( ! function_exists( 'meatball_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function meatball_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on meatball, use a find and replace
	 * to change 'meatball' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'meatball', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'jetpack-responsive-videos' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'blog-thumbnail', 400, 240, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'meatball' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'meatball_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // meatball_setup
add_action( 'after_setup_theme', 'meatball_setup' );


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function meatball_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'meatball' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'meatball_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function meatball_scripts() {
	// wp_enqueue_style( 'meatball-style', get_stylesheet_uri() );

	wp_enqueue_style( 'meatball-style', get_template_directory_uri() . '/css/main.css'  );

	// wp_enqueue_script( 'meatball-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	// wp_enqueue_script( 'meatball-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'meatball_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
