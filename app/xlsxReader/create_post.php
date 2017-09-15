<?php

// Создаем запросы
//======================================================================================================================

//del_all_post('news');
//create_post('news');

//del_all_post('news');
//del_all_post('bookmakers');
//del_all_post('forecasts');
//del_all_post('bonus');
//
function create_post($acf_field) {
    // Получаем id файла $acf_file_id['id']
    $acf_file_id = get_field($acf_field, 'option');
    if (!$acf_file_id) return false;
    // Получаем масив данных c файла
    $xlsx_data = get_xlsx($acf_field);
    // Формируем масив запросов
    $array_query_data = array();

    foreach ($xlsx_data as $key => $row) {
        // Удаляем все пробелы в начале строки массивов
        array_walk($row, 'trim_value');
//        print_arr($row);

        if($acf_field == "bookmakers") {
//          $content = $row['name'];
        }

		$date = random_date();

        // Параметры
        $post_author   = 1;
        $post_date     = $date->format('Y-m-d h:i:s');
        $post_date_gmt = get_gmt_from_date($date->format('Y-m-d h:i:s'));
        $post_content  = isset($content) ? $content : NULL;
        $post_title    = wp_strip_all_tags($row['name']);
        $post_status   = 'publish';
        $post_name     = sanitize_title($row['name']);
        $post_type     = $acf_field;
        $post_excerpt  = $acf_file_id['id']; // ID файла acf
        // Формируем масив запросов
        $array_query_data[] = "('$post_author','$post_date','$post_date_gmt','$post_content','$post_title','$post_status','$post_name','$post_type','$post_excerpt')";

        // Количество итераций
//        if ($key > 5) break;
    }

    // Создаем посты и получаем их id
    $id_new_posts = insert_post($array_query_data, $acf_field, $acf_file_id['id']);


    // Запросы на обновление ACF
    $array_query_update_acf = array();
    foreach ($id_new_posts as $key => $id_post) {
        array_walk($xlsx_data[$key], 'trim_value');
        //-------------------------------------------------

        $data_acf = array();

        // BOOKMAKERS
        if ($acf_field == "bookmakers") {

            $data_acf[0]['key']   = 'год_основания';
            $data_acf[0]['value'] = $xlsx_data[$key]['foundations'];
            //---------------------------------------------------------
            $data_acf[1]['key']   = 'страна';
            $data_acf[1]['value'] = $xlsx_data[$key]['country'];
            //---------------------------------------------------------
            $data_acf[2]['key']   = 'языки';
            $data_acf[2]['value'] = $xlsx_data[$key]['languages'];
            //---------------------------------------------------------
            $data_acf[3]['key']   = 'валюты_счетов';
            $data_acf[3]['value'] = $xlsx_data[$key]['currency'];
            //---------------------------------------------------------
            $data_acf[4]['key']   = 'лицензия';
            $data_acf[4]['value'] = $xlsx_data[$key]['license'];
            //---------------------------------------------------------
            $data_acf[5]['key']   = 'направления';
            $data_acf[5]['value'] = $xlsx_data[$key]['directions'];
            //---------------------------------------------------------
            $data_acf[6]['key']   = 'бонусы_на_первый_депозит';
            $data_acf[6]['value'] = $xlsx_data[$key]['start_bonus'];
            //---------------------------------------------------------
            $data_acf[7]['key']   = 'android';
            $data_acf[7]['value'] = $xlsx_data[$key]['android'];
            //---------------------------------------------------------
            $data_acf[8]['key']   = 'apple';
            $data_acf[8]['value'] = $xlsx_data[$key]['apple'];
            //---------------------------------------------------------
            $data_acf[9]['key']   = 'способы_ввода';
            $data_acf[9]['value'] = $xlsx_data[$key]['input'];
            //---------------------------------------------------------
            $data_acf[10]['key']   = 'способы_вывода';
            $data_acf[10]['value'] = $xlsx_data[$key]['output'];
            //---------------------------------------------------------
            $data_acf[11]['key']   = 'ставки_live';
            $data_acf[11]['value'] = $xlsx_data[$key]['live_rate'];
            //---------------------------------------------------------
            $data_acf[12]['key']   = 'видеотрансляция_матчей';
            $data_acf[12]['value'] = $xlsx_data[$key]['video'];
            //---------------------------------------------------------
            $data_acf[13]['key']   = 'минимальная_ставка';
            $data_acf[13]['value'] = $xlsx_data[$key]['min_rate'];
            //---------------------------------------------------------
            $data_acf[14]['key']   = 'максимальная_ставка';
            $data_acf[14]['value'] = $xlsx_data[$key]['max_rate'];
            //---------------------------------------------------------
            $data_acf[15]['key']   = 'виртуальный_спорт';
            $data_acf[15]['value'] = $xlsx_data[$key]['virt_sports'];
            //---------------------------------------------------------
            $data_acf[16]['key']   = 'mob_ver';
            $data_acf[16]['value'] = $xlsx_data[$key]['mob_ver'];
            //---------------------------------------------------------
            $data_acf[17]['key']   = 'адрес_сайта';
            $data_acf[17]['value'] = $xlsx_data[$key]['site'];
            //---------------------------------------------------------
            $data_acf[18]['key']   = 'контакты';
            $data_acf[18]['value'] = $xlsx_data[$key]['contacts'];
            //---------------------------------------------------------
            $data_acf[19]['key']   = 'минимальный_депозит';
            $data_acf[19]['value'] = $xlsx_data[$key]['min_deposit'];
            //---------------------------------------------------------
	        $data_acf[20]['key']   = 'рейтинг';
	        $data_acf[20]['value'] = 5.3;
        }

        // Формируем масив запросов
        foreach ($data_acf as $acf) {
            $array_query_update_acf[] = "('$id_post','$acf[key]','$acf[value]')";
        }
        // Формируем масив запросов
//        $array_query_update_acf[] = "('$id_post','$post_meta_key','$post_meta_value')";
//        $array_query_update_acf[] = "('$id_post','$post_meta_key2','$post_meta_value2')";
    }
    update_post_fields($array_query_update_acf);
}



// Создаем пост
//======================================================================================================================
function insert_post($array_for_data, $post_type, $file_id) {
    global $wpdb;
    // Создаем пост по масиву пораметров
    $query_insert_post = "INSERT INTO $wpdb->posts (post_author, post_date, post_date_gmt, post_content, post_title, post_status, post_name, post_type, post_excerpt) VALUES ";
    $query = $query_insert_post . implode(', ', $array_for_data);
    $wpdb->query($query);
    // Выбераем все ID постов
    $query_get_all_ID = "SELECT ID FROM $wpdb->posts WHERE NOT post_status='trash' AND post_type = '$post_type' AND post_excerpt = '$file_id'";

    $return = array_keys($wpdb->get_results($query_get_all_ID, OBJECT_K));

    sort($return);

    return $return;
}

// Обновляем acf fields постов
//======================================================================================================================
function update_post_fields($array_for_acf) {
    global $wpdb;
    // Обновляем acf
    $query_upd_fields = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) VALUES ";
    $query = $query_upd_fields . implode(', ', $array_for_acf);
    $wpdb->query($query);
}

// Удаляем все посты
//======================================================================================================================
function del_all_post($post_type) {
    global $wpdb;
    $count_del = $wpdb->query("DELETE FROM $wpdb->posts WHERE post_type = '$post_type'");
    echo $count_del;
}

// Удаляем все пробелы в начале строки массива + екранируем запятые
//======================================================================================================================
function trim_value(&$value) {
    $value = trim($value);
    $value = str_replace('  ', ' ', $value);
    $value = str_replace('  ', ' ', $value);
    $value = str_replace('  ', ' ', $value);
    $value = str_replace('  ', ' ', $value);
    $value = str_replace('  ', ' ', $value);
    $value = str_replace('  ', ' ', $value);
    $value = str_replace('  ', ' ', $value);
    $value = str_replace('  ', ' ', $value);
    $value = str_replace('  ', ' ', $value);
    $value = str_replace('  ', ' ', $value);
    $value = str_replace('\'', "\'", $value);
}

// Сгенерировать random date
//======================================================================================================================
function random_date() {
	$date = date_create(date('Y-m-d h:i:s'));
	date_modify($date, '-'.rand (1, 5).' hour');
	date_modify($date, '+'.rand (1, 60).' minutes');
	date_modify($date, '+'.rand (1, 60).' seconds');
	return $date;
}

//======================================================================================================================
//getImageURL();
function getImageURL() {
	$wp_upload_dir = wp_upload_dir();
 	$filename  = $wp_upload_dir['basedir'] . '/BK/';
	$arr_name = scandir($filename);
	array_splice($arr_name, 0,2);

//	print_arr($arr_name);
	return $arr_name;
}

//addImage();
function addImage($parent_post_id = 56858, $name = 'pic.jpg') {

	// Подключим нужный файл, если он еще не подключен
	$wp_upload_dir = wp_upload_dir();
	$filename  = $wp_upload_dir['basedir'] . '/BK/'.$name;

//	$parent_post_id = 56858;
//	print_arr($wp_upload_dir);
//	die();

	// Проверим тип поста, который мы будем использовать в поле 'post_mime_type'.
	$filetype = wp_check_filetype( basename( $filename ), null );

	// Подготовим массив с необходимыми данными для вложения.
	$attachment = array(
		'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ),
		'post_mime_type' => $filetype['type'],
		'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
		'post_content'   => '',
		'post_status'    => 'inherit'
	);

	// Insert the attachment.
	$attach_id = wp_insert_attachment($attachment, $filename, $parent_post_id);
	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	// Generate the metadata for the attachment, and update the database record.
	$attach_data = wp_generate_attachment_metadata($attach_id, $filename);
	wp_update_attachment_metadata( $attach_id, $attach_data );
	set_post_thumbnail($parent_post_id, $attach_id);
}














