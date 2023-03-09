<?php
require 'functions.php';
require 'data_lots.php';
require 'data.php';

$lots_hist = [
    'remaining' => strtotime('tomorrow midnight')
];
$lots_id = explode(',',$_COOKIE['lots_id']);
foreach($lots_id as $id){
    if($lots_list[$id]){
        $lots_hist[] = $lots_list[$id];
    }
}

// получаем HTML-код тела страницы
$layout_data['content'] = include_template('history', $lots_hist);

// получаем итоговый HTML-код
$layout = include_template('layout', $layout_data);
print ($layout);