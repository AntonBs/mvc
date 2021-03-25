<?php


class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath= ROOT.'/Config/routes.php';
        $this->routes = include($routesPath);
    }
    /**
     * Returns request string
     * @return string
     */
    private function getURI(){
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'],'/');
        }
    }
    public function run()
    {
        // Получить строку запроса

        $uri = $this->getURI();

        //Проверить наличие такого запроса в routes.php

        foreach ($this->routes as $uriPattern => $path){

            //Сравнение $uriPattern и $path
            if (preg_match("~$uriPattern~",$uri)){
                //Определить какой контроллер
                //и action обабатывают зарос
                $segments = explode('/',$path);
                //array_shift - берем первый елемент масива и удаляем его из масива
                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action'.ucfirst(array_shift($segments));


//                echo '<br>Класс: '.$controllerName;
//                echo '<br>Метод: '.$actionName;

                //Подключение файла класса- контроллера
                $controllerFile = ROOT. '/Controllers/'. $controllerName .'.php';

                if (file_exists($controllerFile)){
                    include_once($controllerFile);
                }

                //Создать объект, вызвать метода (action)
                $controllerObject = new $controllerName;
                $result = $controllerObject->$actionName();
                if ($result != null){
                    break;
                }
            }

        }


    }
}