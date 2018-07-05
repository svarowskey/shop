<?php

class Product
{
    const SHOW_BY_DEFAULT = 6;

    /**
     * Получение последних товаров
     * @param integer $count <p>Количество последних товаров</p>
     * @return array <p>Массив с последними товарами из БД</p>
    */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);

        $db = Db::getConnection();

        $productsList = array();

        $result = $db->query('SELECT id, name, price, image, is_new FROM product '
                                    .'WHERE status = "1"'
                                    .'ORDER BY id DESC '
                                    .'LIMIT '.$count);

        $i = 0;
        while ($row = $result->fetch()){
            $productsList[$i]['id']     = $row['id'];
            $productsList[$i]['name']   = $row['name'];
            $productsList[$i]['price']  = $row['price'];
            $productsList[$i]['image']  = $row['image'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsList;
    }

    /**
     * Возвращает список рекомендуемых товаров
     * @return array <p>Массив с товарами</p>
     */
    public static function getRecommendedProducts()
    {
        $db = Db::getConnection();

        $productsRecommendedList = array();

        $result = $db->query('SELECT id, name, price, image, is_new FROM product '
            .'WHERE status = "1" AND is_recommended = "1" ORDER BY id DESC');

        $i = 0;
        while ($row = $result->fetch()){
            $productsRecommendedList[$i]['id']     = $row['id'];
            $productsRecommendedList[$i]['name']   = $row['name'];
            $productsRecommendedList[$i]['price']  = $row['price'];
            $productsRecommendedList[$i]['image']  = $row['image'];
            $productsRecommendedList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsRecommendedList;
    }

    /**
     * Возвращает количество всех товаров из БД
     * @return integer <p>Число товаров</p>
     */
    public static function getCountAllProducts(){
        //Подключаемся к базе
        $db = Db::getConnection();

        //Пишем запрос
        $resultQuery = $db->query('SELECT COUNT(*) FROM product WHERE status="1"');
        $result = $resultQuery->fetch();

        return intval($result[0]);
    }

    /**
     * Получение товаров для страницы "Каталог товаров"
     * @param integer $page <p>номер страницы в каталоге</p>
     * @return array <p>Массив товаров</p>
    */
    public static function getProductsForCatalog($page = 1){
        //Конвертируем полученные данные в целое число
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        //Подключаем БД
        $db = Db::getConnection();
        $products = array();

        //Пишем запрос
        $result = $db->query('SELECT * FROM product WHERE status = "1" '
                            .' ORDER BY id ASC LIMIT '.self::SHOW_BY_DEFAULT.' OFFSET '.$offset);
        $i = 0;
        while ($row = $result->fetch()){
            $products[$i]['id']         = $row['id'];
            $products[$i]['name']       = $row['name'];
            $products[$i]['price']      = $row['price'];
            $products[$i]['image']      = $row['image'];
            $products[$i]['is_new']     = $row['is_new'];
            $i++;
        }
        return $products;
    }

    /**
     * Получение списка товаров определенной категории постранично
     * @param integer $categoryId <p>id категории</p>
     * @param integer $page <p>номер страницы</p>
     * @return array <p>Массив товаров</p>
    */
    public static function getProductListByCategory($categoryId = false, $page = 1)
    {
        if($categoryId)
        {
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();
            $products = array();
            $result = $db->query("SELECT id, name, price, image, "
            ."is_new FROM product WHERE status = '1' AND "
            ."category_id = '$categoryId' ORDER BY id ASC "
            ."LIMIT ".self::SHOW_BY_DEFAULT
            ." OFFSET ".$offset);

            $i = 0;
            while ($row = $result->fetch()){
                $products[$i]['id']     = $row['id'];
                $products[$i]['name']   = $row['name'];
                $products[$i]['price']  = $row['price'];
                $products[$i]['image']  = $row['image'];
                $products[$i]['is_new'] = $row['is_new'];
                $i++;
            }

            return $products;
        }
    }

    /**
     * Получение товара по id
     * @param integer $idProduct <p>id товара</p>
     * @return array <p>Массив с данными о товаре</p>
    */
    public static function getProductById($idProduct = false)
    {
        $idProduct = intval($idProduct);
        if($idProduct)
        {
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM product WHERE id = '$idProduct'");
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }

    }

    /**
     * Получение количества всех товаров из определенной категории
     * @param integer $categoryId <p>id категории</p>
     * @return integer <p>количество товаров из определенной категории</p>
    */
    public static function getTotalProductsInCategory($categoryId)
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT count(id) AS count FROM product WHERE status = '1' AND category_id ='".$categoryId."'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

    /**
     * Получение товаров по массиву id
     * @param array $IdsArray <p>Массив с id</p>
     * @return array <p>Массив продуктов</p>
    */
    public static function getProductsByIds($IdsArray){

        $products = array();

        //Подключение БД
        $db = Db::getConnection();

        $idsString = implode(',', $IdsArray);

        $sql = "SELECT * FROM product WHERE status = '1' AND id IN ($idsString)";

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()){
            $products[$i]['id']     = $row['id'];
            $products[$i]['name']   = $row['name'];
            $products[$i]['code']   = $row['code'];
            $products[$i]['price']  = $row['price'];
            $products[$i]['image']  = $row['image'];
            $i++;
        }
        return $products;
    }

    /**
     * Проверка наличия товара
     * 0 - Под заказ, 1 - В наличии
     * @param integer $availability - Статус
     * @return string - Текстовое пояснение
     */
    public static function getAvailability($availability){
        switch ($availability){
            case '1':
                return 'В наличии';
                break;
            case '0':
                return 'Под заказ';
                break;
        }
    }

    /**
     * Возвращает список товаров
     * @return array <p>Массив товаров</p>
    */
    public static function getProductsList(){
        //Подключаем БД
        $db = Db::getConnection();

        //Получение и возвращение результатов
        $result = $db->query('SELECT id, name, price, code FROM product ORDER BY id ASC');
        $productsList = array();
        $i = 0;
        while ($row = $result->fetch()){
            $productsList[$i]['id']     = $row['id'];
            $productsList[$i]['name']   = $row['name'];
            $productsList[$i]['price']  = $row['price'];
            $productsList[$i]['code']   = $row['code'];
            $i++;
        }

        return $productsList;
    }

    /**
     * Удаляет товар с указанным id
     * @param integer $id <p>id товара</p>
     * @return boolean <p>Результат выполнения метода</p>
    */
    public static function deleteProductById($id)
    {
        //Подключаем базу
        $db = Db::getConnection();

        //Запрос к БД
        $sql = 'DELETE FROM product WHERE id = :id';

        //Получение и возврат результата запроса
        $result = $db->prepare($sql);
        $result->bindParam('id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Добавляет новый товар
     * @param array $options <p>Массив с информацией о товаре</p>
     * @return integer <p>id добавленной в таблицу записи</p>
    */
    public static function createProduct($options)
    {
        //Подключение БД
        $db = Db::getConnection();

        //Запрос к БД
        $sql = 'INSERT INTO product '
                .'(name, code, price, category_id, is_new, is_recommended, image, status, description, brand, availability) '
                .'VALUES '
                .'(:name, :code, :price, :category_id, :is_new, :is_recommended, :image, :status, :description, :brand, :availability)';

        if ($options['image'] == null){
            $img = "";
        } else {
            $img = $options['image'];
        }

        //Получение и возврат результатов. Используется подготовленный запрос.
        $result = $db->prepare($sql);
        $result->bindParam('name', $options['name']);
        $result->bindParam('code', $options['code']);
        $result->bindParam('price', $options['price']);
        $result->bindParam('category_id', $options['category_id']);
        $result->bindParam('is_new', $options['is_new']);
        $result->bindParam('is_recommended', $options['is_recommended']);
        $result->bindParam('image', $img);
        $result->bindParam('status', $options['status']);
        $result->bindParam('description', $options['description']);
        $result->bindParam('brand', $options['brand']);
        $result->bindParam('availability', $options['availability']);

        if ($result->execute()){
            //Если запрос выполнен успешно - возвращаем id добавленной записи
            return $db->lastInsertId();
        }

        //Иначе возвращаем 0
        return 0;
    }

    /**
     * Редактирует товар с заданным id
     * @param integer $id <p>id товара</p>
     * @param array $options <p>Массив с информацией о товаре</p>
     * @return boolean <p>Результат выполнения метода</p>
    */
    public static function updateProduct($id, $options)
    {
        //Подключение БД
        $db = Db::getConnection();

        //Запрос к БД
        $sql = "UPDATE product
            SET
                name            = :name,
                code            = :code,
                price           = :price,
                category_id     = :category_id,
                is_new          = :is_new,
                is_recommended  = :is_recommended,
                image           = :image,
                status          = :status,
                description     = :description,
                brand           = :brand,
                availability    = :availability
            WHERE id = :id";

        if ($options['image'] == null){
        $img = "";
    } else {
        $img = $options['image'];
    }
        //Получение и возврат результатов. Используется подготовленный запрос.
        $result = $db->prepare($sql);
        $result->bindParam('id', $id);
        $result->bindParam('name', $options['name']);
        $result->bindParam('code', $options['code']);
        $result->bindParam('price', $options['price']);
        $result->bindParam('category_id', $options['category_id']);
        $result->bindParam('is_new', $options['is_new']);
        $result->bindParam('is_recommended', $options['is_recommended']);
        $result->bindParam('image', $img);
        $result->bindParam('status', $options['status']);
        $result->bindParam('description', $options['description']);
        $result->bindParam('brand', $options['brand']);
        $result->bindParam('availability', $options['availability']);
        return $result->execute();
    }

    public static function getImage($id)
    {
        //Название изображения-пустышки
        $noImage = 'no-image.jpg';

        //Путь к папке с товарами
        $path = '/upload/images/products/';

        //Путь к изображению товара
        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)){
            //Если файл с изображением для товара существует
            //Возвращаем путь к файлу с изображением товара
            return $pathToProductImage;
        }

        return $path . $noImage;
    }
}