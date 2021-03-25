<?php

 //Front controller

 //Общие настройки
 ini_set('display_errors',1);
 error_reporting(E_ALL);

 //Подключение файлов
 define('ROOT',dirname(__FILE__));
 require_once (ROOT.'/Components/Router.php');

 //БД


 //Вызов Router
   $router = new Router();
   $router->run();
