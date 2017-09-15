<?php

// Прогнозы
//______________________________________________________________________________________________________________________
add_action('init', 'register_post_predictions');

function register_post_predictions() {
	register_post_type('forecasts', array(
		'label'  => null,
		'labels' => array(
			'name'            => __('Прогнозы', 'mes'),
			'singular_name'   => __('Прогнозы', 'mes'),
			'menu_name'       => __('Прогнозы', 'mes'),
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => null,
		'show_in_nav_menus'   => true,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-chart-bar',
		'hierarchical'        => false,
		'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
		'has_archive'         => true,
		'rewrite'             => array('with_front'=>false,'slug'=>false),
		'query_var'           => true,
		'show_in_rest'        => true,
	) );
}


add_action('init', 'create_taxonomy_сhampionships');

function create_taxonomy_сhampionships() {
	$args = array(
		'label'                 => null,
		'labels'                => array(
			'name'              => __('Рубрики прогнозов', 'mes'),
			'singular_name'     => __('Рубрики прогнозов', 'mes'),
			'menu_name'         => __('Рубрики прогнозов', 'mes'),
		),
		'description'           => '',
		'public'                => true,
		'publicly_queryable'    => true,
		'show_in_nav_menus'     => true,
		'show_ui'               => true,
		'show_tagcloud'         => true,
		'hierarchical'          => true,
		'update_count_callback' => '',
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false,
		'_builtin'              => false,
		'show_in_quick_edit'    => null,
		'rest_base'             => 'genre',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
		'show_in_rest'          => true,
	);

	register_taxonomy('forecasts-list', array('forecasts'), $args );
}

// Прогнозы Экспертов
//______________________________________________________________________________________________________________________
add_action('init', 'register_post_bookmakers');

function register_post_bookmakers() {
	register_post_type('bookmakers', array(
		'label'  => null,
		'labels' => array(
			'name'            => __('Рейтинги БК', 'mes'),
			'singular_name'   => __('Рейтинги БК', 'mes'),
			'menu_name'       => __('Рейтинги БК', 'mes'),
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => null,
		'show_in_nav_menus'   => true,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-chart-pie',
		'hierarchical'        => false,
		'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
		'has_archive'         => true,
		'rewrite'             => array('with_front'=>false,'slug'=>false),
		'query_var'           => true,
	) );
}


add_action('init', 'create_taxonomy_bookmakers');

function create_taxonomy_bookmakers() {
	$args = array(
		'label'                 => null,
		'labels'                => array(
			'name'              => __('Рубрики БК', 'mes'),
			'singular_name'     => __('Рубрики БК', 'mes'),
			'menu_name'         => __('Рубрики БК', 'mes'),
		),
		'description'           => '',
		'public'                => true,
		'publicly_queryable'    => true,
		'show_in_nav_menus'     => true,
		'show_ui'               => true,
		'show_tagcloud'         => true,
		'hierarchical'          => true,
		'update_count_callback' => '',
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false,
		'_builtin'              => false,
		'show_in_quick_edit'    => null,
	);

	register_taxonomy('bookmakers-list', array('bookmakers'), $args );
}

// НОВОСТИ
//______________________________________________________________________________________________________________________
add_action('init', 'register_post_news');

function register_post_news() {
	register_post_type('news', array(
		'label'  => null,
		'labels' => array(
			'name'            => __('Новости', 'mes'),
			'singular_name'   => __('Новости', 'mes'),
			'menu_name'       => __('Новости', 'mes'),
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => null,
		'show_in_nav_menus'   => true,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-rss',
		'hierarchical'        => false,
		'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
		'has_archive'         => true,
		'rewrite'             => array('with_front'=>false,'slug'=>false),
		'query_var'           => true,
	) );
}


add_action('init', 'create_taxonomy_news');

function create_taxonomy_news() {
	$args = array(
		'label'                 => null,
		'labels'                => array(
			'name'              => __('Рубрики новостей', 'mes'),
			'singular_name'     => __('Рубрики новостей', 'mes'),
			'menu_name'         => __('Рубрики новостей', 'mes'),
		),
		'description'           => '',
		'public'                => true,
		'publicly_queryable'    => true,
		'show_in_nav_menus'     => true,
		'show_ui'               => true,
		'show_tagcloud'         => true,
		'hierarchical'          => true,
		'update_count_callback' => '',
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false,
		'_builtin'              => false,
		'show_in_quick_edit'    => null,
	);

	register_taxonomy('news-list', array('news'), $args );
}

// Слайдер
//______________________________________________________________________________________________________________________
add_action('init', 'register_post_home_slider');
function register_post_home_slider(){
	register_post_type('slider', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Слайдер', // основное название для типа записи
			'singular_name'      => 'Слайдер', // название для одной записи этого типа
			'add_new'            => 'Добавить слайд', // для добавления новой записи
			'add_new_item'       => 'Добавление слада', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование слайда', // для редактирования типа записи
			'new_item'           => 'Новый слайда', // текст новой записи
			'view_item'          => 'Смотреть слайда', // для просмотра записи этого типа.
			'search_items'       => 'Искать слайд', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Слайды', // название меню
		),
		'description'         => '',
		'public'              => false,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-format-image',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title', 'thumbnail','excerpt'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );
}





















