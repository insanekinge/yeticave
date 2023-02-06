<?php
$is_auth = rand(0, 1);
$title = "Главная";
$user_name = 'Slava'; // укажите здесь ваше имя
$category_list = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];
$product_list = require 'data.php';

// echo '<pre>';
// var_dump($_GET);
// var_dump($product_list[$_GET['id']]);

$lot_index = $_GET['id'];
$one_lot = $product_list[$lot_index];

require_once 'functions.php';
$content = render('lot', $one_lot);
print(render('layout',[
    'title' => $title,
    'content' => $content,
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'category_list' => $category_list,
]));