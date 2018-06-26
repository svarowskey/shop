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

        /**
         * Возвращает категорию по id <br/>
         * @return array <p>Массив данных категории</p>
         */
        public static function getCategoryByID($idCategory)
        {
            $idCategory = intval($idCategory);

            if ($idCategory) {
                //Подключаем БД
                $db = Db::getConnection();

                //Запрос к БД
                $result = $db->query("SELECT * FROM category WHERE id = '$idCategory'");

                $result->setFetchMode(PDO::FETCH_ASSOC);

                return $result->fetch();
            }
        }

        /**
         * Добавляет новую категорию
         * @param array $options <p>Массив с информацией о категории</p>
         * @return integer <p>id добавленной в таблицу записи</p>
         */
        public static function createCategory($name, $sort_order, $status)
        {
            //Подключение БД
            $db = Db::getConnection();

            //Запрос к БД
            $sql = 'INSERT INTO category '
                .'(name, sort_order, status) '
                .'VALUES '
                .'(:name, :sort_order, :status)';


            //Получение и возврат результатов. Используется подготовленный запрос.
            $result = $db->prepare($sql);
            $result->bindParam('name', $name);
            $result->bindParam('sort_order', $sort_order);
            $result->bindParam('status', $status);


            if ($result->execute()){
                //Если запрос выполнен успешно - возвращаем id добавленной записи
                return $db->lastInsertId();
            }

            //Иначе возвращаем 0
            return 0;
        }

        /**
         * Удаляет категорию с указанным id
         * @param integer $id <p>id категории</p>
         * @return boolean <p>Результат выполнения метода</p>
         */
        public static function deleteCategoryById($id)
        {
            //Подключаем базу
            $db = Db::getConnection();

            //Запрос к БД
            $sql = 'DELETE FROM category WHERE id = :id';

            //Получение и возврат результата запроса
            $result = $db->prepare($sql);
            $result->bindParam('id', $id, PDO::PARAM_INT);
            return $result->execute();
        }

        /**
         * Редактирует товар с заданным id
         * @param integer $id <p>id товара</p>
         * @param array $options <p>Массив с информацией о товаре</p>
         * @return boolean <p>Результат выполнения метода</p>
         */
        public static function updateCategory($id, $name, $sort_order, $status)
        {
            //Подключение БД
            $db = Db::getConnection();

            //Запрос к БД
            $sql = "UPDATE category
            SET
                name            = :name,
                sort_order      = :sort_order,
                status          = :status
            WHERE id = :id";

            //Получение и возврат результатов. Используется подготовленный запрос.
            $result = $db->prepare($sql);
            $result->bindParam('id', $id);
            $result->bindParam('name', $name);
            $result->bindParam('sort_order', $sort_order);
            $result->bindParam('status', $status);
            return $result->execute();
        }
    }