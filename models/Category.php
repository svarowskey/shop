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

        /**
         * Возвращает массив категорий для списка в админпанели <br/>
         * (при этом в результат попадают и включенные и выключенные категории)
         * @return array <p>Массив категорий</p>
        */
        public static function getCategoriesListAdmin()
        {
            //Подключаем БД
            $db = Db::getConnection();

            //Запрос к БД
            $result = $db->query('SELECT * FROM category ORDER BY sort_order ASC');

            //Получение и возврат результатов
            $categoryList = array();
            $i = 0;
            while ($row = $result->fetch()){
                $categoryList[$i]['id']         = $row['id'];
                $categoryList[$i]['name']       = $row['name'];
                $categoryList[$i]['sort_order'] = $row['sort_order'];
                $categoryList[$i]['status']     = $row['status'];
                $i++;
            }

            return $categoryList;
        }
    }