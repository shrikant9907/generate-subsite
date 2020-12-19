<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Invalid request.' );
}

// Register Custom Post Type
function custom_post_type_agl_abandoned() {

	$labels = array(
		'name'                  => _x( 'Abandoned', 'Post Type General Name', 'autogenlp' ),
		'singular_name'         => _x( 'Abandoned', 'Post Type Singular Name', 'autogenlp' ),
		'menu_name'             => __( 'Abandoned', 'autogenlp' ),
		'name_admin_bar'        => __( 'Abandoned', 'autogenlp' ),
		'archives'              => __( 'Item Archives', 'autogenlp' ),
		'attributes'            => __( 'Item Attributes', 'autogenlp' ),
		'parent_item_colon'     => __( 'Parent Item:', 'autogenlp' ),
		'all_items'             => __( 'All Items', 'autogenlp' ),
		'add_new_item'          => __( 'Add New Item', 'autogenlp' ),
		'add_new'               => __( 'Add New', 'autogenlp' ),
		'new_item'              => __( 'New Item', 'autogenlp' ),
		'edit_item'             => __( 'Edit Item', 'autogenlp' ),
		'update_item'           => __( 'Update Item', 'autogenlp' ),
		'view_item'             => __( 'View Item', 'autogenlp' ),
		'view_items'            => __( 'View Items', 'autogenlp' ),
		'search_items'          => __( 'Search Item', 'autogenlp' ),
		'not_found'             => __( 'Not found', 'autogenlp' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'autogenlp' ),
		'featured_image'        => __( 'Featured Image', 'autogenlp' ),
		'set_featured_image'    => __( 'Set featured image', 'autogenlp' ),
		'remove_featured_image' => __( 'Remove featured image', 'autogenlp' ),
		'use_featured_image'    => __( 'Use as featured image', 'autogenlp' ),
		'insert_into_item'      => __( 'Insert into item', 'autogenlp' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'autogenlp' ),
		'items_list'            => __( 'Items list', 'autogenlp' ),
		'items_list_navigation' => __( 'Items list navigation', 'autogenlp' ),
		'filter_items_list'     => __( 'Filter items list', 'autogenlp' ),
	);
	$args = array(
		'label'                 => __( 'Abandoned', 'autogenlp' ),
		'description'           => __( 'Post Type Description', 'autogenlp' ),
		'labels'                => $labels,
		'supports'              => array('title'),
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
		'show_in_rest'          => true,
	);
	register_post_type( 'agl_abandoned', $args );

}
add_action( 'init', 'custom_post_type_agl_abandoned', 0 );

/*
* Register meta boxes.
*/
function aglp_abandoned_register_meta_boxes() {
    add_meta_box( 'abandoned-meta-box', __( 'User Details', 'autogen-lp' ), 'aglp_abandoneds_cb', 'agl_abandoned' );
}
add_action( 'add_meta_boxes', 'aglp_abandoned_register_meta_boxes' );
 
/*
 * Meta box display callback.
*/
function aglp_abandoneds_cb( $post ) {

	$surviralLpData		=	get_post_meta($post->ID, 'lp_template_data', true);

	$usr = get_user_by('email', $surviralLpData['user_email']);
	$account = 'no';

	if ($usr)  {
		$account = 'yes';
	}
	echo '<div class="meta-box-ui">';
    echo '<p><label>Name:</label> '.$surviralLpData['user_name'].'</p>';
    echo '<p><label>Email:</label> '.$surviralLpData['user_email'].'</p>';
    echo '<p><label>Is Verified?:</label> '.$surviralLpData['user_everified'].'</p>';
	echo '<p><label>Account Created:</label> '.$account.'</p>';
	if ($account == 'yes') {
		echo '<p><label>User ID:</label> '.$usr->ID.'</p>';
	}
	echo '</div>';
}