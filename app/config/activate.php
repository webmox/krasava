<?php

add_action('wp', 'custom_maybe_activate_user', 9);
function custom_maybe_activate_user() {
	$template_path = STYLESHEETPATH . '/gfur-activate-template/activate.php';
	$is_activate_page = isset( $_GET['page'] ) && $_GET['page'] == 'gf_activation';

	if( ! file_exists( $template_path ) || ! $is_activate_page  )
		return;

	require_once( $template_path );

	exit();
}