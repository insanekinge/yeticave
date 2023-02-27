<?php

require_once 'functions.php';
require_once 'data.php';

$products_hist = null;

if (isset($_COOKIE['products_hist'])) {
    $products_hist = json_decode($_COOKIE['products_hist']);
    foreach ($products_hist as $key => $value) {
        $products_hist[$key] = $products[$value];
    }
}

$page_content = include_template('./templates/history.php', [
    'categories' => $categories,
    'products_hist' => $products_hist,
    'time_to_end' => get_time_to_end(),
]);

$layout_content = include_template('./templates/layout.php', [
    'page_title' => 'YetiCave - История просмотров',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
    'page_content' => $page_content,
    'categories' => $categories
]);

print($layout_content);