<?php
/**
 * Created by PhpStorm.
 * User: Mes
 * Date: 18.07.2017
 * Time: 11:12
 */
function add_svg_to_upload_mimes( $upload_mimes ) {
	$upload_mimes['svg'] = 'image/svg+xml';
	$upload_mimes['svgz'] = 'image/svg+xml';
	return $upload_mimes;
}
add_filter( 'upload_mimes', 'add_svg_to_upload_mimes', 10, 1 );