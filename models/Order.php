<?php
class Order
{
    //Сохранение заказа

    public static function save($userName, $userPhone, $userComment, $userId, $products){
        $products = json_encode($products);
         $db = Db::getConnection();
         $sql = 'INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products) '
         .'VALUES (:user_name, :user_phone, :user_comment, :user_id, :products)';
         $result = $db->prepare($sql);
         $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
         $result->bindParam('user_phone', $userPhone, PDO::PARAM_STR);
         $result->bindParam('user_comment', $userComment, PDO::PARAM_STR);
         $result->bindParam('user_id', $userId, PDO::PARAM_STR);
         $result->bindParam('products', $products, PDO::PARAM_STR);
         return $result->execute();
    }

    /**
     * Возвращает массив со списком заказов
     * @return array
     */
    public static function getOrderList(){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM product_order ORDER BY ID ASC ");
        $orderList = array();
        $i = 0;
        while ($row = $result->fetch()){
            $orderList[$i]['id']            = $row['id'];
            $orderList[$i]['user_name']     = $row['user_name'];
            $orderList[$i]['user_phone']    = $row['user_phone'];
            $orderList[$i]['date']          = $row['date'];
            $orderList[$i]['status']        = $row['status'];
            $i++;
        }
        return $orderList;
    }

    /**
     * Возвращает данные по определенному заказу
     * @return array
     */
    public static function getOrderById($id){

        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM product_order WHERE id = '$id'");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetch();

    }

    /**
     * Возвращает текстовое значение статуса заказа
     * @param  $status
     * @return string
     */
    public static function getStatusText($status)
    {
        switch ($status){
            case '1':
                return 'Новый заказ';
                break;
            case '2':
                return 'В обработке';
                break;
            case '3':
                return 'Доставляется';
                break;
            case '4':
                return 'Закрыт';
                break;
            default:
                return 'default';
                break;
        }
    }

    /**
     * Функция удаления заказа по id
     * @param $id
     * @return bool
     */
    public static function deleteOrderById($id)
    {
        //Подключаем бд
        $db = Db::getConnection();

        //Запрос
        $sql = 'DELETE FROM product_order WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(id,$id,PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updateOrder($id, $options)
    {
        //Подключение к бд
        $db = Db::getConnection();

        //Запрос к бд
        $sql = "UPDATE product_order
                SET
                    user_phone = :user_phone,
                    user_comment = :user_comment,
                    date = :date,
                    status = :status
                WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(id,$id);
        $result->bindParam(user_phone,$options['user_phone']);
        $result->bindParam(user_comment,$options['user_comment']);
        $result->bindParam(date,$options['date']);
        $result->bindParam(status,$options['status']);

    }
}