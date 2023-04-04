<?php
//Функция-шаблонизатор

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

//Функция представления времени в относительном формате
function time_relative($ts) {
    $time = $_SERVER['REQUEST_TIME'];
    $time_diff = $time - $ts;
    if ($time_diff > 86400) {
        $time_return = date('d.m.Y в H:i', $ts);
    }
    else if ($time_diff > 3600) {
        $time_return = (date('G', $time) - date('G', $ts)) . ' часов назад';
    }
    else {
        $time_return = (intval(date('i', $time)) - intval(date('i', $ts))) . ' минут назад';
    }
    return $time_return;
}

//Функция представления времени действия лота
function remaining($ts) {
    $time_diff = $ts - $_SERVER['REQUEST_TIME'];
    $time_return = '00:00:00';
    if ($time_diff > 0) {
        $hour = floor($time_diff / 3600);
        $min_ts = $time_diff - $hour * 3600;
        $min = floor($min_ts / 60);
        $sec = $time_diff - $hour * 3600 - $min * 60;
        $time_return = sprintf('%02d:%02d:%02d', $hour, $min, $sec);
    }
    return $time_return;
}

// Функция выбора итогового шаблона
function layout($layout_data, $query_errors = []) {
    if ($query_errors) {
        $layout = include_template('error', ['header' => 'Ошибка БД', 'errors' => $query_errors]);
    }
    else {
        $layout = include_template('layout', $layout_data);
    }
    return $layout;
}