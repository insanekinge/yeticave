<?php
// $is_auth = rand(0, 1);

// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');

$time = $_SERVER['REQUEST_TIME'];
$expires = $time + 60*60*24*30;

$name = $_SESSION['name'];

// подключаем данные лотов
require 'data_lots.php';

// общие данные сайта
$layout_data = [
    'title' => 'Главная',
    'user_name' => 'Slava',
    'user_avatar' => 'img/',
    'categories_list' => $categories_list,
    'index_link' => 'href="/" '
];

// данные главной страницы
$index_data = [
    'categories_list' => $categories_list,
    'announcements_list' => $lots_list
];