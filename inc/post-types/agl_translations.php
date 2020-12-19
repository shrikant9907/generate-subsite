<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Invalid request.' );
}
// Register Custom Fact
function custom_post_type_agl_transactions() {

	$labels = array(
		'name'                  => _x( 'Transactions', 'Transactions General Name', 'agl_transactions' ),
		'singular_name'         => _x( 'Transactions', 'Transactions Singular Name', 'agl_transactions' ),
		'menu_name'             => __( 'Transactions', 'agl_transactions' ),
		'name_admin_bar'        => __( 'Transactions', 'agl_transactions' ),
		'archives'              => __( 'Item Archives', 'agl_transactions' ),
		'attributes'            => __( 'Item Attributes', 'agl_transactions' ),
		'parent_item_colon'     => __( 'Parent Item:', 'agl_transactions' ),
		'all_items'             => __( 'All Items', 'agl_transactions' ),
		'add_new_item'          => __( 'Add New Item', 'agl_transactions' ),	
		'add_new'               => __( 'Add New', 'agl_transactions' ),
		'new_item'              => __( 'New Item', 'agl_transactions' ),
		'edit_item'             => __( 'Edit Item', 'agl_transactions' ),
		'update_item'           => __( 'Update Item', 'agl_transactions' ),
		'view_item'             => __( 'View Item', 'agl_transactions' ),
		'view_items'            => __( 'View Items', 'agl_transactions' ),
		'search_items'          => __( 'Search Item', 'agl_transactions' ),
		'not_found'             => __( 'Not found', 'agl_transactions' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'agl_transactions' ),
		'featured_image'        => __( 'Featured Image', 'agl_transactions' ),
		'set_featured_image'    => __( 'Set featured image', 'agl_transactions' ),
		'remove_featured_image' => __( 'Remove featured image', 'agl_transactions' ),
		'use_featured_image'    => __( 'Use as featured image', 'agl_transactions' ),
		'insert_into_item'      => __( 'Insert into item', 'agl_transactions' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'agl_transactions' ),
		'items_list'            => __( 'Items list', 'agl_transactions' ),
		'items_list_navigation' => __( 'Items list navigation', 'agl_transactions' ),
		'filter_items_list'     => __( 'Filter items list', 'agl_transactions' ),
	);
	$args = array(
		'label'                 => __( 'Transactions', 'agl_transactions' ),
		'description'           => __( 'Transactions Description', 'agl_transactions' ),
		'labels'                => $labels,
		'supports'              => array( 'title'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 7,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'agl_translations', $args );

}
add_action( 'init', 'custom_post_type_agl_transactions', 0 );

/*
* Register meta boxes.
*/
function aglp_translations_register_meta_boxes() {
    add_meta_box( 'translations-meta-box', __( 'Transation Details', 'autogen-lp' ), 'aglp_translations_cb', 'agl_translations' );
}
add_action( 'add_meta_boxes', 'aglp_translations_register_meta_boxes' );
 
/*
 * Meta box display callback.
*/
function aglp_translations_cb( $post ) {

	$transactionData		=	get_post_meta($post->ID, 'payment_info', true);

	if (!$transactionData) 
	return '';

	$usr = get_user_by('email', $surviralLpData['user_email']);
	$account = 'no';

	if ($usr)  {
		$account = 'yes';
	}
	echo '<div class="meta-box-ui">';
	if($transactionData) {
		foreach($transactionData as $tkey => $tvalue) {
			if ($tkey != 'abandand_post_id') {
				$label = str_replace('_', ' ', $tkey);
				echo '<p><label>'.$label.'</label> '.$tvalue.'</p>';
			}
		}
	}
	echo '</div>';
}