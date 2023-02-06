<?php
function render($name, $data){
  ob_start(); 
  $filePath = 'templates' . DIRECTORY_SEPARATOR . $name . '.php';
  if (is_file($filePath)) {
      require $filePath;
  }
  $content = ob_get_contents();
  ob_clean();
  return $content;
}


function timeLeft(){
  date_default_timezone_set('Europe/Moscow');
  {  		
    $ts_midnight = strtotime('tomorrow');             
    $secs_to_midnight = $ts_midnight - time();        
    $hours = floor($secs_to_midnight / 3600);         
    $minutes = floor(($secs_to_midnight % 3600) / 60);
    print("$hours H : $minutes M");                   
  }
}