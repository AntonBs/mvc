<?php

// $string = '25-03-2021';
// $pattern= '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';
// $replacement = 'Month: $2, Day: $1, Year: $3';
// echo preg_replace($pattern,$replacement,$string);


 //Front controller

 //Общие настройки
 ini_set('display_errors',1);
 error_reporting(E_ALL);

 //Подключение файлов
 define('ROOT',dirname(__FILE__));
 require_once (ROOT.'/Components/Router.php');
 require_once (ROOT.'/Components/DB.php');
 //БД


 //Вызов Router
   $router = new Router();
   $router->run();
