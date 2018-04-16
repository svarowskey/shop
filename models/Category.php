<?php

    class Category
    {

        //returns an array of category

        public static function getCategoryList()
        {

            $db = Db::getConnection();

            $categoryList = array();

            $result = $db->query('SELECT id, name FROM category '
            .'ORDER BY sort_order ASC');

            $i = 0;
            while ($row = $result->fetch())
            {
                $categoryList[$i]['id'] = $row['id'];
                $categoryList[$i]['name'] = $row['name'];
                $i++;
            }


            return $categoryList;

        }
    }