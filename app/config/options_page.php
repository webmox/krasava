<?php

if (function_exists('acf_add_options_page')) {

    // IMPORT
    //__________________________________________________________________________________________________________________


//    acf_add_options_sub_page(array(
//        'page_title' => 'Импортировать файл News',
//        'menu_title' => 'Import News',
//        'capability' => 'edit_posts',
//        'parent_slug' => 'edit.php?post_type=news',
//    ));
//    acf_add_options_sub_page(array(
//        'page_title' => 'Импортировать файл Bonus',
//        'menu_title' => 'Import Bonus',
//        'capability' => 'edit_posts',
//        'parent_slug' => 'edit.php?post_type=bonus',
//    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Импортировать файл Bookmakers',
        'menu_title' => 'Import Bookmakers',
        'capability' => 'edit_posts',
        'parent_slug' => 'edit.php?post_type=bookmakers',
    ));
//    acf_add_options_sub_page(array(
//        'page_title' => 'Импортировать файл Forecasts',
//        'menu_title' => 'Import Forecasts',
//        'capability' => 'edit_posts',
//        'parent_slug' => 'edit.php?post_type=forecasts',
//    ));


    // THEME SETTINGS
    //__________________________________________________________________________________________________________________

    acf_add_options_page(array(
        'page_title' 	=> 'Theme Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-settings',
        'capability'	=> 'edit_posts',
        'position'      => 40,
        'redirect'		=> false,
    ));

    // FAQ
    //__________________________________________________________________________________________________________________
//    acf_add_options_sub_page(array(
//        'page_title' => 'Описание БК',
//        'menu_title' => '',
//        'capability' => 'edit_posts',
//        'parent_slug' => 'edit.php?post_type=bookmakers',
//    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Общее описание',
        'menu_title' => '',
        'capability' => 'edit_posts',
        'parent_slug' => 'edit.php?post_type=forecasts',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Описание Новости',
        'menu_title' => '',
        'capability' => 'edit_posts',
        'parent_slug' => 'edit.php?post_type=news',
    ));

}

// XLSX
//______________________________________________________________________________________________________________________

function my_acf_save_post_news( $post_id ) {

    if (isset($_GET['page']) && strpos($_GET['page'], 'acf-options-import') !== false ) {

        $type = explode("-", $_GET['page']);

        // Создаем
        create_post($type['3']);
        // Удаляем
        update_field($type['3'], NULL, 'option');
    }

}
add_action('acf/save_post', 'my_acf_save_post_news', 20);

























