<?php

/* Скрывайте версию WordPress https://hostiq.com.ua/blog/17-ways-to-secure-wordpress/
//================================================================================================
* Hide WP version strings from scripts and styles
* @return {string} $src
* @filter script_loader_src
* @filter style_loader_src
*/

function fjarrett_remove_wp_version_strings( $src ) {
	global $wp_version;
	parse_str(parse_url($src, PHP_URL_QUERY), $query);
	if ( !empty($query['ver']) && $query['ver'] === $wp_version ) {
		$src = remove_query_arg('ver', $src);
	}
	return $src;
}

add_filter('script_loader_src', 'fjarrett_remove_wp_version_strings');
add_filter('style_loader_src', 'fjarrett_remove_wp_version_strings');
add_filter('the_generator', 'wpmudev_remove_version');
add_filter('login_errors', create_function('$a', "return null;"));
add_filter('show_admin_bar', '__return_false');
/* Hide WP version strings from generator meta tag */
function wpmudev_remove_version() {
	return '';
}
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rel_canonical');
