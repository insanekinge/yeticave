<?php
require 'app/common.php';

//получаем идентификатор лота
$id = isset($_GET['id']) ? $_GET['id'] : 1;
if (! isset($lots_list[$id])){
    http_response_code(404);
    exit();
}

// var_dump($link);

// описание лота
$result = mysqli_query($link, 'SELECT description, price FROM lots WHERE id = ' . $id);
// var_dump($result);
if (!$result) {
    $query_errors[] = 'Нет доступа к описанию лота.';
}
else{
    $lots_list[$id] = array_merge($lots_list[$id], mysqli_fetch_assoc($result));
}

$bet_step = $lots_list[$id]['step'] ?? 500; 
$price = $lots_list[$id]['price'];

//получаем историю ставок для лота
$bets = [];
$result = mysqli_query($link, 'SELECT bets.id, price, user_id, name FROM users LEFT JOIN bets on users.id = bets.user_id WHERE lot_id = '. $id .' AND bets.id = bets.user_id;');
if (! $result) {
    $query_errors[] = 'Нет доступа к ставкам.';
}
else {
    while ($row = mysqli_fetch_assoc($result)) {
        $bets[] = [
            'name' => $row['name'],
            'price' => $row['price'],
        ];
        //автор лота не может делать ставку
        if(isset($_SESSION['user']) && $row['user_id'] == $_SESSION['user']['id']){
            $_SESSION['bet_done'][$row['user_id']] = true;
        }
    }
    $count = mysqli_num_rows($result);
}

//максимальная цена
foreach ($bets as $k => $val) {
    if ($val['price'] >$price) {
        $price = $val['price'];
    }
}

//добавление ставки
$bet_min = 0;
if (isset($_POST['cost'])) {
    $cost_min = $price + $bet_step;
    if (is_numeric($_POST['cost']) && $_POST['cost'] > $cost_min) {
        $cost = floor($_POST['cost']);
    }
    else{
        $cost = $cost_min;
    }
    //пишем новую ставку в базу
    $result = mysqli_query($link, 'INSERT INTO bets SET create_ts = ' . $time
    . ', price = ' . $cost . ', lot_id = ' . $id . ',bet_min = ' . $bet_min . ', user_id = ' . $_SESSION['user']['id']);
    if(! $result) {
        $query_errors[] = 'Невозможно записать ставку.';
    }
    else{
        //запрет на повторную ставку для лота
        if (! isset($_SESSION['bet_done'])){
            $_SESSION['bet_done'][$id] = true;
        }
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }
}

//свой ли лот
$self = false;
if (isset($_SESSION['user']) && $lots_list[$id]['user_id'] == $_SESSION['user']['id']) {
    $self = true;
}

//получаем HTML-код тела страницы
$layout_data['content'] = include_template('lot', [
    'id' => $id,
    'categories_list' => $categories_list,
    'lots_list' => $lots_list,
    'bets' => $bets,
    'count' => $count,
    'price' => $price,
    'expire' => $lots_list[$id]['expire_ts'],
    'expired' => ($lots_list[$id]['expire_ts'] - $time > 0),
    'bet_min' => $bet_min,
    'img' => $img,
    'real' => $real,
    'empty' => isset($_SESSION['bet_done'][$id]) ? false : true,
    'self' => $self
]);

//получаем итоговый HTML-код
$layout_data['title'] = $lots_list[$id]['name'];
print(layout($layout_data, $query_errors));