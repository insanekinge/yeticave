<?php
function include_template($tempalate_path, $data = null){
    if (!file_exists($tempalate_path)) {
        return '';
    }
    ob_start();
    extract($data);
    require_once($tempalate_path);
    return ob_get_clean();
}
function format_price($price)
{
    $result = ceil($price);
    if ($result <= 1000) {
        return $result;
    }
    return number_format($result, 0, '.', ' ');
}

function get_time_to_end()
{
    date_default_timezone_set('Europe/Minsk');
    $ts_to_end = strtotime('tomorrow') - strtotime('now');
    $hours_to_end = floor($ts_to_end / 3600);
    $minutes_to_end = floor(($ts_to_end - ($hours_to_end * 3600)) / 60);
    return $hours_to_end . ':' . $minutes_to_end;
}
// function is_date_valid(string $date) : bool {
//   $format_to_check = 'Y-m-d';
//   $dateTimeObj = date_create_from_format($format_to_check, $date);

//   return $dateTimeObj !== false && array_sum(date_get_last_errors()) === 0;
// }

// function include_template($name, array $data = []) {
//   $name = 'templates/' . $name;
//   $result = '';

//   if (!is_readable($name)) {
//       return $result;
//   }

//   ob_start();
//   extract($data);
//   require $name;

//   $result = ob_get_clean();

//   return $result;
// }
