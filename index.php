<?php
$is_auth = rand(0, 1);
$title = "Главная";
$user_name = 'Slava'; // укажите здесь ваше имя
$category_list = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];
$product_list = [
    [
    'name' => '2014 Rossignol District Snowboard',
    'category' => 'Доски и лыжи',
    'price' => '10999',
    'url' => 'img/lot-1.jpg'
    ],

    [
    'name' => 'DC Ply Mens 2016/2017 Snowboard',
    'category' => 'Доски и лыжи',
    'price' => '159999',
    'url' => 'img/lot-2.jpg'
    ],

    [
    'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
    'category' => 'Крепления',
    'price' => '8000',
    'url' => 'img/lot-3.jpg'
    ],

    [
    'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
    'category' => 'Ботинки',
    'price' => '10999',
    'url' => 'img/lot-4.jpg'
    ],

    [
    'name' => 'Куртка для сноуборда DC Mutiny Charocal',
    'category' => 'Одежда',
    'price' => '7500',
    'url' => 'img/lot-5.jpg'
    ],

    [
    'name' => 'Маска Oakley Canopy',
    'category' => 'Разное',
    'price' => '5400',
    'url' => 'img/lot-6.jpg'
    ]

];

require_once 'functions.php';
$content = render('index', ['product_list' => $product_list]);
print(render('layout',[
    'title' => $title,
    'content' => $content,
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'category_list' => $category_list,
]));

?>

