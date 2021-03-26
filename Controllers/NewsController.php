<?php

include_once ROOT.'/Models/News.php';

class NewsController
{
    public function actionIndex()
    {
        $newsList = array();
        $newsList = News::getNewsList();

        require_once(ROOT.'/Views/news/index.php');

        return true;
    }
    public function actionView($id)
    {
        if ($id){
            $newsItem = News::getNewsItemById($id);

            require_once(ROOT.'/Views/news/view.php');

            return true;
        }

    }
}