<?php

// GET XLSX
//======================================================================================================================

//get_xlsx('добавить_файл');
function get_xlsx($acf_field) {
    // Библиотека
    require_once(dirname(__FILE__) . "/simplexlsx.class.php");
    // Получаем acf поле
    $acf_file = get_field($acf_field, 'option');
    $xlsx = new SimpleXLSX(get_attached_file($acf_file['id']));
    $xlsx = $xlsx->rows();
    // Вытягиваем первый эл. массива
    $xlsx_key = array_shift($xlsx);
    // Формируем правильный масив
    $data = array();
    foreach ($xlsx as $value) {
        $data[] = array_combine($xlsx_key, $value);
    }
//    print_arr($data);
    return $data;
}