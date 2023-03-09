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
    $time_diff = $time - $ts; // разница текущего и переданного времени
    if ($time_diff > 86400) { // разница более суток
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