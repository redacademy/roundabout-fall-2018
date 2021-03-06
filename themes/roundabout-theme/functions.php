<?php
/**
 * RED Starter Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RED_Starter_Theme
 */

if ( ! function_exists( 'red_starter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function red_starter_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html( 'Primary Menu' ),
	) );

	// Switch search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
endif; // red_starter_setup
add_action( 'after_setup_theme', 'red_starter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function red_starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'red_starter_content_width', 640 );
}
add_action( 'after_setup_theme', 'red_starter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function red_starter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html( 'Sidebar' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'red_starter_widgets_init' );

/**
 * Filter the stylesheet_uri to output the minified CSS file.
 */
function red_starter_minified_css( $stylesheet_uri, $stylesheet_dir_uri ) {
	if ( file_exists( get_template_directory() . '/build/css/style.min.css' ) ) {
		$stylesheet_uri = $stylesheet_dir_uri . '/build/css/style.min.css';
	}

	return $stylesheet_uri;
}
add_filter( 'stylesheet_uri', 'red_starter_minified_css', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function red_starter_scripts() {
	wp_enqueue_style( 'red-starter-style', get_stylesheet_uri() );
	wp_enqueue_style ('font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');


	wp_enqueue_script( 'red-starter-navigation', get_template_directory_uri() . '/build/js/navigation.min.js', array(), '20151215', true );
	wp_enqueue_script( 'red-starter-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.min.js', array(), '20151215', true );
	wp_enqueue_script( 'profiles', get_template_directory_uri() . '/build/js/profiles.min.js', array(), '20151215', true );
	wp_enqueue_script( 'load-content', get_template_directory_uri() . '/build/js/load-content.min.js', array(), '20151215', true );
	wp_enqueue_script( 'donation-id', get_template_directory_uri() . '/build/js/donation-id.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'red_starter_scripts' );
/**
 * Enqueue jquery.
 */
function include_jquery_script()
{

   wp_deregister_script('jquery');
   wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);

}
add_action('wp_enqueue_scripts', 'include_jquery_script');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

function split_to_sections($content) {
	$pagename = get_the_title();

	if($pagename != 'Our services' && $pagename !='About' && $pagename != 'Roundabout Dramatherapy') {
		return $content;
	}

	$sections = explode( '<h2>', $content );
	$final_sections = array();

	foreach ( $sections as $section ) {
		if(trim($section) != '') {
			$final_sections[] = '<section><h2>'.$section.'</section>';
		}
	}
	$split_content = implode('', $final_sections);
	return  $split_content;
}

add_filter('the_content', 'split_to_sections');


/**
 * Register widget area for footer.
 */
function tutsplus_widgets_init() {
 
    // First footer widget area, located in the footer. Empty by default.
  register_sidebar( array(
        'name' => __( 'Footer Widget Area', 'tutsplus' ),
        'id' => 'first-footer-widget-area',
        'description' => __( 'The first footer widget area', 'tutsplus' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );      
}
 
// Register sidebars by running tutsplus_widgets_init() on the widgets_init hook.
add_action( 'widgets_init', 'tutsplus_widgets_init' );


// Remove "Archive:" from the archive title
add_filter('get_the_archive_title', function ($title) {
    return preg_replace('/^\w+: /', '', $title);
});


function recent_posts($no_posts = 1, $excerpts = true) {

	global $wpdb;
 
	$request = "SELECT ID, post_title, post_excerpt FROM $wpdb->posts WHERE post_status = 'publish' AND post_type='stories' ORDER BY post_date DESC LIMIT $no_posts";
 
	$posts = $wpdb->get_results($request);
	$output = '';
	if($posts) {
 
				foreach ($posts as $posts) {
						$post_title = stripslashes($posts->post_title);
						$permalink = get_permalink($posts->ID);
 
						$output .= '<li><h2><a href="' . $permalink . '" rel="bookmark" title="Permanent Link: ' . htmlspecialchars($post_title, ENT_COMPAT) . '">' . htmlspecialchars($post_title) . '</a></h2>';
 
						if($excerpts) {
								$output.= '<br />' . stripslashes($posts->post_excerpt);
						}
 
						$output .= '</li>';
				}
 
		} else {
				$output .= '<li>No posts found</li>';
		}
 
	echo $output;
 }