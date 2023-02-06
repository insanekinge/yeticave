<?php
$is_auth = rand(0, 1);
$title = "Главная";
$user_name = 'Slava'; // укажите здесь ваше имя
$category_list = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];
$product_list = require 'data.php';

require_once 'functions.php';
$content = render('index', ['product_list' => $product_list]);
print(render('layout',[
    'title' => $title,
    'content' => $content,
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'category_list' => $category_list,
]));