<?php
require_once('./functions.php');
require_once('./data.php');
// echo '<pre>';

// var_dump($_GET);
// var_dump($product_list[$_GET['id']]);
// echo '</pre>';

$product = null;

if (isset($_GET['index'])) {
    $product = $products[$_GET['index']];

    if (isset($_COOKIE["products_hist"])) {
        $products_hist = json_decode($_COOKIE["products_hist"]);
        array_push($products_hist, $_GET['index']);
        $products_hist = array_unique($products_hist);
        setcookie("products_hist", json_encode($products_hist), strtotime("+ 30 days"), "/");
    } else {
        $products_hist = [$_GET['index']];
        setcookie("products_hist", json_encode($products_hist), strtotime("+ 30 days"), "/");
    }
}

if (!$product) {
    http_response_code(404);
}

$page_content = include_template('./templates/lot.php', [
    'categories' => $categories,
    'product' => $product,
    'time_to_end' => get_time_to_end(),
]);

$layout_content = include_template('./templates/layout.php', [
    'page_title' => 'YetiCave - Страница товара',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
    'page_content' => $page_content,
    'categories' => $categories
]);

print($layout_content);