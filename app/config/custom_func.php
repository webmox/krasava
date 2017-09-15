<?php

//  PRINT_ARR
//================================================================================================
function print_arr($arr){
	echo '<pre>' . print_r($arr, true) . '</pre>';
}

// функция обрезки текста по Словам  --- EN
//================================================================================================
function cut_str($string, $length) {
	$string = strip_tags($string);
	$string = substr($string, 0, $length);
	$string = rtrim($string, "!,.-");
	$string = substr($string, 0, strrpos($string, ' '));
	return $string."… ";
}

// функция обрезки текста по Словам
//================================================================================================
function cut($str, $length){

    $str = strip_tags($str); // Форматируем текст по тегам
    $str = mb_substr($str, 0, $length,'UTF-8'); // обрезаем и работаем со всеми кодировками и указываем исходную кодировку
    $position = mb_strrpos($str, ' ', 'UTF-8'); // определение позиции последнего пробела. Именно по нему и разделяем слова
    $str = mb_substr($str, 0, $position, 'UTF-8'); // Обрезаем переменную по позиции

    return $str;
}

//function get_term_top_most_parent($term_id, $taxonomy){
//	$parent  = get_term_by( 'id', $term_id, $taxonomy);
//	while ($parent->parent != 0){
//		$parent  = get_term_by( 'id', $term_id, $taxonomy);
//	}
//	return $parent;
//}
// so once you have this function you can just loop over the results returned by wp_get_object_terms
function hey_top_parents($taxonomy) {
	$terms =  wp_get_object_terms(get_the_ID(), $taxonomy);
	$top_parent_terms = array();

	if($terms){
		foreach ($terms as $term){
			//get top level parent
			if($term->parent == 0){
				$top_parent_terms[] = $term;
			}
		}
	}
	
	return $top_parent_terms;
} // End of top parents

// Вывод звезд
//================================================================================================

























