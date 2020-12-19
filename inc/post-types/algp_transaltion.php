<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Invalid request.' );
}
// Create translation post type
if(!function_exists( 'translation_post_type' )){
    
    function translation_post_type() {        
        $args = array(
            'public' => true,
            'label'  => __( 'Translation', 'autogenlp' ),
        );

        register_post_type( 'algp_transaltion', $args );
    }

    add_action( 'init', 'translation_post_type' );
}