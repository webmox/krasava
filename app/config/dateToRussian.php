<?php
// http://wp-notes.ru/wordpress/vyivod-datyi-na-russkom/

function dateToRussian($date) {
  $month = array(
    "january"=>"января",
    "february"=>"февраля",
    "march"=>"марта",
    "april"=>"апреля",
    "may"=>"мая",
    "june"=>"июня",
    "july"=>"июля",
    "august"=>"августа",
    "september"=>"сентября",
    "october"=>"октября",
    "november"=>"ноября",
    "december"=>"декабря"
  );
  $days = array(
    "monday"=>"Понедельник",
    "tuesday"=>"Вторник",
    "wednesday"=>"Среда",
    "thursday"=>"Четверг",
    "friday"=>"Пятница",
    "saturday"=>"Суббота",
    "sunday"=>"Воскресенье"
  );
  return str_replace(array_merge(array_keys($month), array_keys($days)), array_merge($month, $days), strtolower($date));
}

//echo dateToRussian(get_the_date());