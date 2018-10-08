<?php

/* 
 * Activate processes
 */

add_action( 'init', 'cptui_register_my_cpts_transaction' );

// Custom post type: Transaction for keeping track of successful strip transactions
function cptui_register_my_cpts_transaction() {

	/**
	 * Post Type: Transaction.
	 */

	$labels = array(
		"name" => __( 'Transaction', 'twentyseventeen' ),
		"singular_name" => __( 'Transactions', 'twentyseventeen' ),
	);

	$args = array(
		"label" => __( 'Transaction', 'twentyseventeen' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => false,
		"show_in_menu_string" => "",
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "transaction", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor" ),
                "capabilities" => array(
            		"create_posts" => false
        	)	
	);

	register_post_type( "transaction", $args );
}



?>