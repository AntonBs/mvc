<?php

return array(
//    'mvc/news/([a-z]+)/([0-9]+)' =>'news/view/$1/$2', // mvc временная заглушка для локального сервера
    'news/([0-9]+)' =>'news/view/$1', // Чпу статей news/1, news/2 ..
    'mvc/news' =>'news/index',   // method actionIndex in NewsController
//    'products'=>'product/list', // method actionList in ProductController
//    'news/archive'=>'news/archive',
);