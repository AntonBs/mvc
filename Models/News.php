<?php

class News
{
    /**
     * Return single news item with specified id
     * @param integer $id
     */
    public static function  getNewsItemById($id)
    {
      $id = intval($id);

      if($id){

          $db = DB::getConnection();

          $result = $db->query('SELECT * from bublication WHERE  id='.$id,PDO::FETCH_ASSOC);

          $newsItem = $result->fetch();

          return $newsItem;
      }

    }



    /**
     * Return an array of news items
     */
    public static function getNewsList()
    {
        //Запрос к БД

        $db = DB::getConnection();

        $newsList = array();

//        $result= $db->query('SELECT id, title, date, short_content'
//                . 'FROM bublication'
//                . 'ORDER BY date DESC'
//                . 'LIMIT 10'
//        );

        $result = $db->query('SELECT * FROM `bublication` WHERE true ORDER BY `date` DESC LIMIT 10 ',PDO::FETCH_ASSOC);
//        var_dump($result);

        $i = 0;

        while ($row = $result->fetch()){
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }
        return $newsList;
    }

}