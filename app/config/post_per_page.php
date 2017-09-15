<?php

function custom_posts_per_page( $wp_query ) {
	if ( is_search() ) {
		$wp_query->set( 'posts_per_page', 9 );
	}
}

add_action( 'pre_get_posts', 'custom_posts_per_page' );