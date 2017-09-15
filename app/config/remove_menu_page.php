<?php

add_action( 'admin_menu', 'my_remove_menu_pages' );
function my_remove_menu_pages() {
//	remove_menu_page('index.php');
//	remove_menu_page('upload.php');
	remove_menu_page('edit.php?post_type=page'); // Pages
	remove_menu_page('edit.php');

    //remove_menu_page('edit-comments.php');
	//remove_menu_page('tools.php');
	//remove_menu_page('link-manager.php'); // Links
	//remove_menu_page('plugins.php'); // Plugins
	//remove_menu_page('themes.php'); // Appearance
	//remove_menu_page('users.php'); // Users
	//remove_menu_page('options-general.php'); // Settings
}