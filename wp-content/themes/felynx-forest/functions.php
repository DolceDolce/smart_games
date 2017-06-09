<?php
/**
 * Felynx Forest functions and definitions
 *
 * @package Felynx_Forest
 * @since Felynx Forest 1.0
 */

if ( ! isset( $content_width ) ) {
	$content_width = 800; // size of .container
}

function felynx_setup() {
	// Text domain
	load_theme_textdomain( 'felynx-forest', get_template_directory() . '/languages' );

	// Theme support
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	add_theme_support( 'post-thumbnails' );

	// Editor style
	add_editor_style( 'css/custom-editor-style.css' );

	// Menus
	register_nav_menu( 'primary', __( 'Primary menu', 'felynx-forest' ) );
	register_nav_menu( 'social', __( 'Social icons', 'felynx-forest' ) );
}
add_action( 'after_setup_theme', 'felynx_setup' );

function felynx_scripts() {
	wp_enqueue_script(
		'main',
		get_stylesheet_directory_uri() . '/js/main.js',
		array( 'jquery' ), '0.7', true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Load Font Awesome
	wp_enqueue_style('font-awesome', '//opensource.keycdn.com/fontawesome/4.6.1/font-awesome.min.css');

	// Load main css according to color scheme
	$color_scheme = get_theme_mod( 'color_scheme' );
	if ( empty ( $color_scheme ) ) {
		$color_scheme = 'green';
	}
	wp_register_style( 'style', get_stylesheet_directory_uri() . '/css/' . $color_scheme . '.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'style' );

	// Load style.css to facilitate customization
	wp_enqueue_style( 'custom-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'felynx_scripts');

function felynx_hack_title( $title )
{
	if( empty( $title ) ) {
		return get_bloginfo( 'name' ) . ' &#183; ' . get_bloginfo( 'description' );
	}
	return $title;
}
add_filter( 'wp_title', 'felynx_hack_title' );

function felynx_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'felynx_excerpt_length', 999 );

function felynx_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'felynx_excerpt_more' );

function felynx_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Footer widget area', 'felynx-forest' ),
		'id' => 'sidebar-footer',
		'description'	=> __( 'Add widgets here to appear in your footer.', 'felynx-forest' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => __( 'Author widget area', 'felynx-forest' ),
		'id' => 'sidebar-author',
		'description'	=> __( 'Add widgets here to appear below the author avatar and name.', 'felynx-forest' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'felynx_widgets_init' );

require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/walker.php';

?>