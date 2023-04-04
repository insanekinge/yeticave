<?php
// подключаем библиотеку функций
require 'app/common.php';


// запрет для незарегистрированный
if (! isset($_SESSION['user'])) {
    http_response_code(403);
    exit();
}

// подключаем данные

$fields = [
    'lot-name' => 'Введите наименование лота',
    'category' => 'Выберите категорию',
    'message' => 'Напишите описание лота',
    'lot-rate' => 'Введите начальную цену',
    'lot-step' => 'Введите шаг ставки',
    'lot-date' => 'Введите дату завершения торгов'
];


// обработка формы
$error_count = 0;
foreach ($fields as $k => $val) {
    $add_data[$k]['value'] = '';
    $error = false;
    if (isset($_POST[$k])) {
        $data[$k] = strip_tags(trim($_POST[$k]));
        if ($data[$k]) {
            $addd_data[$k]['value'] = $data[$k];
            if (($k == 'lot-rate' || $k == 'lot-step') && !is_numeric($data[$k])) {
                $error = true;
            }
        }
        else {
            $error = true;
        }
    }
    if ($error) {
        $error_count ++;
        $add_data[$k]['invalid'] = 'form__item--invalid';
        $add_data['error'][$k] = $add_data['error'][$k] ?? $val;
    }
    else {
        $add_data[$k]['invalid'] = '';
        $add_data['error'][$k] = '';
    }
    // $add_data[$k]['value'] = $data[$k];
}

// отдельная проверка даты окончания торгов
if (isset($data['lot-date']) && $data['lot-date']) {
    $data['lot-date'] = strtotime($data['lot-date']);
    if ($data['lot-date'] - $time < 86400) {
        $error_count ++;
        $add_data['lot-date']['invalid'] = ' form__item--invalid';
        $add_data['error']['lot-date'] = 'Выберите период больше суток!';
    }
}
// сохранение файла
require 'app/save_img.php';
$add_data['uploaded'] = $uploaded_class;
$add_data['error']['img'] = $file_error;

// выбранная категория
foreach ($categories_list as $k => $val) {
    if ($error_count && $data['category'] == $k) {
        $add_data[$k . '-sel'] = ' selected';
    }
    else {
        $add_data[$k . '-sel'] = '';
    }
}
// обработка ошибок
if ($error_count) {
    $add_data['error_main'] = 'Пожалуйста, исправьте ошибки в форме.';
    $add_data['invalid'] = ' form--invalid';
    $layout_data['title'] = 'Есть ошибки';
    
}
else {
    if (! isset($_POST['lot-name'])) {
        $add_data['invalid'] = '';
        $add_data['error_main'] = '';
    }
    else {
       
        // запись в БД
        $sql = 'INSERT INTO lots ('
        . 'name, description, price, step, img, category, '
        . 'category_id, user_id) VALUES (?, ?, ?, ?, ?, ?, ?)';
        
        $query_data = [
            $data['lot-name'],
            $data['message'],
            floor($data['lot-rate']),
            floor($data['lot-step']),
            $_SESSION['url'],
            $data['category'],
            $_SESSION['user']['id']
        ];
        // var_dump($_POST);

        $result = db_get_prepare_stmt($link, $sql, $query_data);
        if (! $result) {
            $query_errors[] = 'Регистрация невозможна по техническим причинам.';
        }
        else {
            header('Location: lot.php?id=' . mysqli_insert_id($link));
            unset($_SESSION['url']);
            exit();
        }
    }
}

// получаем HTML-код тела страницы
$add_data['categories_list'] = $categories_list;
$layout_data['content'] = include_template('add', $add_data);

// получаем итоговый HTML-код
$layout_data['title'] = 'Добавление лота';
print(layout($layout_data, $query_errors));
