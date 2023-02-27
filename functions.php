<?php
session_start();
// шаблонизатор
function include_template($template_name, $data) {
    $template_file = 'templates/' . $template_name . '.php';
    if (file_exists($template_file)) {
        ob_start();
        include($template_file);
        $output = ob_get_clean();
    }
    else {
        $output = '';
    }
    return $output;
}

// функция для представления времени в относительном формате
function time_relative($ts) {
    $time = $_SERVER['REQUEST_TIME'];
    $time_diff = $time - $ts;
    if ($time_diff > 86400) { 
        $time_return = date('d.m.Y в H:i', $ts);
    }
    else if ($time_diff > 3600) { // разница от часа до суток
        $time_return = (date('G', $time) - date('G', $ts)) . ' часов назад';
    }
    else { // разница менее часа
        $time_return = (intval(date('i', $time)) - intval(date('i', $ts))) . ' минут назад';
    }
    return $time_return;
}
// функция для подсчета времени действия лота
function remaining($ts) {
    $time_diff = $ts - $_SERVER['REQUEST_TIME'];
    $h = floor($time_diff / 3600);
    $min_ts = $time_diff - $h * 3600;
    $min = floor($min_ts / 60);
    $s = $time_diff - $h * 3600 - $min * 60;
    return sprintf('%02d:%02d:%02d', $h, $min, $s);
}


// function is_date_valid(string $date) : bool {
//   $format_to_check = 'Y-m-d';
//   $dateTimeObj = date_create_from_format($format_to_check, $date);

//   return $dateTimeObj !== false && array_sum(date_get_last_errors()) === 0;
// }

// function include_template($name, array $data = []) {
//   $name = 'templates/' . $name;
//   $result = '';

//   if (!is_readable($name)) {
//       return $result;
//   }

//   ob_start();
//   extract($data);
//   require $name;

//   $result = ob_get_clean();

//   return $result;
// }
