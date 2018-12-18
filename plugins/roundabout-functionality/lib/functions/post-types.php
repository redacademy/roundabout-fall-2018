<?php
/**
 * POST TYPES
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_post_type
 */

// Custom Post Type for the NEWS Page

function news_init() {
    // Set up NEWS labels
    $labelsnews = array(
        'name'                  => _x( 'News', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'News', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'News', 'text_domain' ),
        'name_admin_bar'        => __( 'news', 'text_domain' ),
        'archives'              => __( 'Item Archives', 'text_domain' ),
        'attributes'            => __( 'Item Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent News:', 'text_domain' ),
        'all_items'             => __( 'All News', 'text_domain' ),
        'add_new_item'          => __( 'Add News', 'text_domain' ),
        'add_new'               => __( 'Add News', 'text_domain' ),
        'new_item'              => __( 'New Item', 'text_domain' ),
        'edit_item'             => __( 'Edit News', 'text_domain' ),
        'update_item'           => __( 'Update News', 'text_domain' ),
        'view_item'             => __( 'View News', 'text_domain' ),
        'view_items'            => __( 'View Items', 'text_domain' ),
        'search_items'          => __( 'Search news', 'text_domain' ),
        'not_found'             => __( 'No news found', 'text_domain' ),
        'not_found_in_trash'    => __( 'No news found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    
    // Register NEWS post type
    $args = array(
        'label' => __( 'news', 'text_domain' ),
	    'description' => __( 'News information pages.', 'text_domain' ),
        'labels' => $labelsnews,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'comments', 'custom-fields'),
		'taxonomies' => array( 'post_tag' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 4,
        'show_in_admin_bar' => true,
	    'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true, // needed for Gutenberg to work!
        'template_lock' => 'all', // or 'insert' to allow moving blocks
        'hierarchical' => false,
        'query_var' => true,
        'menu_icon' => 'dashicons-format-aside',

        'template' => array(
            array( 'core/paragraph', array(
                'placeholder' => 'Add the description for your news here...',
            ) ),
        ),
    );
    register_post_type( 'news', $args );
}
add_action( 'init', 'news_init' );




// Custom Post Type for the STORIES Page

function stories_init() {
    // Set up STORIES labels
    $labelsstories = array(
        'name'                  => _x( 'Stories', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Story', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Stories', 'text_domain' ),
        'name_admin_bar'        => __( 'stories', 'text_domain' ),
        'archives'              => __( 'Item Archives', 'text_domain' ),
        'attributes'            => __( 'Item Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Stories:', 'text_domain' ),
        'all_items'             => __( 'All Stories', 'text_domain' ),
        'add_new_item'          => __( 'Add New Story', 'text_domain' ),
        'add_new'               => __( 'Add Story', 'text_domain' ),
        'new_item'              => __( 'New Item', 'text_domain' ),
        'edit_item'             => __( 'Edit Story', 'text_domain' ),
        'update_item'           => __( 'Update Story', 'text_domain' ),
        'view_item'             => __( 'View Story', 'text_domain' ),
        'view_items'            => __( 'View Stories', 'text_domain' ),
        'search_items'          => __( 'Search stories', 'text_domain' ),
        'not_found'             => __( 'No stories found', 'text_domain' ),
        'not_found_in_trash'    => __( 'No stories found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    
    // Register STORIES post type
    $args = array(
        'label' => __( 'stories', 'text_domain' ),
	    'description' => __( 'Stories information pages.', 'text_domain' ),
        'labels' => $labelsstories,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'comments', 'custom-fields'),
		'taxonomies' => array( 'categories','post_tag' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 4,
        'show_in_admin_bar' => true,
	    'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true, // needed for Gutenberg to work!
        'template_lock' => 'all', // or 'insert' to allow moving blocks
        'hierarchical' => false,
        'query_var' => true,
        'menu_icon' => 'dashicons-book',

        'template' => array(
            array( 'core/paragraph', array(
                'placeholder' => 'Add your story description here...',
            ) ),
        ),
    );
    register_post_type( 'stories', $args );
}
add_action( 'init', 'stories_init' );

/**
  * Create custom "Team Members" post type
**/
function team_members() {
    // Set up TEAM MEMBER labels
	$labels = array(
		'name'                  => _x( 'Team Members', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Team Members', 'text_domain' ),
		'name_admin_bar'        => __( 'Team Members', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Member:', 'text_domain' ),
		'all_items'             => __( 'All Members', 'text_domain' ),
		'add_new_item'          => __( 'Add New Member', 'text_domain' ),
		'add_new'               => __( 'New Member', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Member', 'text_domain' ),
		'update_item'           => __( 'Update Member', 'text_domain' ),
		'view_item'             => __( 'View Member', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Members', 'text_domain' ),
		'not_found'             => __( 'No Members found', 'text_domain' ),
		'not_found_in_trash'    => __( 'No Members found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    // Register TEAM MEMBER post type
	$args = array(
		'label'                 => __( 'Team Members', 'text_domain' ),
		'description'           => __( 'Team Members information pages.', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'menu_icon'             => 'dashicons-welcome-learn-more',
	);
	register_post_type( 'member', $args ); 

}
add_action( 'init', 'team_members', 0 );




/**
  * Create custom "Supporters Members" post type
**/
function supporters_members() {
    // Set up Supporters MEMBER labels
	$labelsSupporters = array(
		'name'                  => _x( 'Supporters Members', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Supporter Member', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Supporters Members', 'text_domain' ),
		'name_admin_bar'        => __( 'Supporters Members', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Member:', 'text_domain' ),
		'all_items'             => __( 'All Members', 'text_domain' ),
		'add_new_item'          => __( 'Add New Member', 'text_domain' ),
		'add_new'               => __( 'New Member', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Member', 'text_domain' ),
		'update_item'           => __( 'Update Member', 'text_domain' ),
		'view_item'             => __( 'View Member', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Members', 'text_domain' ),
		'not_found'             => __( 'No Members found', 'text_domain' ),
		'not_found_in_trash'    => __( 'No Members found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    // Register Supporters MEMBER post type
	$argsSupporters = array(
		'label'                 => __( 'Supporters Members', 'text_domain' ),
		'description'           => __( 'Supporters Members information pages.', 'text_domain' ),
		'labels'                => $labelsSupporters,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'menu_icon'             => 'dashicons-heart',
	);
	register_post_type( 'supporter', $argsSupporters ); 

}
add_action( 'init', 'supporters_members', 0 );
