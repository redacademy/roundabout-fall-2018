<?php
/**
 * POST TYPES
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_post_type
 */

// Custom Post Type for the NEWS Page

function news_init() {
    // set up NEWS labels
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
    
    // register post type
    $args = array(
        'label' => __( 'news', 'text_domain' ),
	    'description' => __( 'News information pages.', 'text_domain' ),
        'labels' => $labelsnews,
        'supports' => array('title', 'editor', 'thumbnail', 'comments', 'custom-fields'),
		'taxonomies' => array( 'category', 'post_tag' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 4,
        'show_in_admin_bar' => true,
	    'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => 'news',
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
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