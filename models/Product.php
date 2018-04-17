<?php

class Product
{
    const SHOW_BY_DEFAULT = 10;

    //returns an array of product

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

    public static function getProductListByCategory($categoryId = false)
    {
        if($categoryId)
        {
            $db = Db::getConnection();
            $products = array();
            $result = $db->query("SELECT id, name, price, image, "
            ."is_new FROM product WHERE status = '1' AND "
            ."category_id = '$categoryId'"
            ."LIMIT ".self::SHOW_BY_DEFAULT);

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
}