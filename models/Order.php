<?php
    class Order
    {
        //Сохранение заказа

        public static function save($userName, $userPhone, $userComment, $products){
            $db = Db::getConnection();

            $sql = 'INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products) '
            .'VALUES (:user_name, :user_phone, :user_comment, :user_id, :products)';

            echo gettype($products);
            echo '<pre>';
            var_dump($products);
            echo '</pre>';

            $products = json_encode($products);

            echo gettype($products);
            echo '<pre>';
            var_dump($products);
            echo '</pre>';

            $result = $db->prepare($sql);
            $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
            $result->bindParam('user_phone', $userPhone, PDO::PARAM_STR);
            $result->bindParam('user_comment', $userComment, PDO::PARAM_STR);
            $result->bindParam('user_id', $userId, PDO::PARAM_STR);
            $result->bindParam('products', $products, PDO::PARAM_STR);

            return $result->execute();
        }
    }