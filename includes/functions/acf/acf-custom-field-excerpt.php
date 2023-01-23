<?php

add_filter( 'get_the_excerpt', function ( $excerpt, $post ) {
	if ( ! empty( $excerpt ) ) {
		return $excerpt;
	}

  	// On a specific post type, use an ACF field value as the excerpt.
	if ( $post->post_type === 'post' ) {
		$excerpt = get_field( 'text', $post->ID );
	}

	return $excerpt;
}, 10, 2 );
