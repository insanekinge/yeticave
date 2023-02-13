<?php
require_once './functions.php';
require_once './data.php';

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = $_POST;

    $required_fileds = ['lot-name', 'category', 'message', 'lot-image', 'lot-rate', 'lot-step', 'lot-date'];
    $errors = null;

    foreach ($_POST as $name => $value) {
        if (in_array($name, $required_fileds)) {
            if (!$value) {
                $errors[$name] = true;
            }
        }
    }

    if ($_FILES['lot-image']['name']) {
        $file_name = $_FILES['lot-image']['name'];
        $file_path = __DIR__ . '/img/';
        $tmp_name = $_FILES['lot-image']['tmp_name'];

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $finfo_type = finfo_file($finfo, $tmp_name);

        if ($finfo_type !== 'image/jpeg') {
            $errors['lot-image'] = 'Выберите изображение в формате JPG/JPEG';
        } else {
            move_uploaded_file($_FILES['lot-image']['tmp_name'], $file_path . $file_name);
            $product['image-path'] = 'img/' . $file_name;
        }
    } else {
        $errors['lot-image'] = 'Выберите изображение';
    }

    if ($errors) {
        $page_content = include_template('./templates/add.php', [
            'categories' => $categories,
            'product' => $product,
            'errors' => $errors
        ]);
    } else {
        $page_content = include_template('./templates/lot.php', [
            'categories' => $categories,
            'product' => $product,
            'time_to_end' => get_time_to_end(),
        ]);
    }
} else {
    $page_content = include_template('./templates/add.php', [
        'categories' => $categories,
    ]);
}


$layout_content = include_template('./templates/layout.php', [
    'page_title' => 'YetiCave - Форма добавления лота',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
    'page_content' => $page_content,
    'categories' => $categories
]);

print($layout_content);