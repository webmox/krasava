<?php

add_filter('rest_prepare_post', 'prepare_rest', 10, 3);
/**
 * Modify the Better REST API Featured Image response.
 *
 * @param   array  $featured_image  The array of image data.
 * @param   int    $image_id        The image ID.
 *
 * @return  array                   The modified image data.
 */
function prepare_rest($data, $post, $request){

	$_data = $data->data;

	$thumbnail_id = get_post_thumbnail_id( $post->ID );
	$thumbnail300x180 = wp_get_attachment_image_src( $thumbnail_id, '300x180' );

	$_data['fi_300x180'] = $thumbnail300x180[0];
	$data->data = $_data;

	print_arr($_data);
	//return $data;
}