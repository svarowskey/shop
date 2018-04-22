<?php
/**
 * Created by PhpStorm.
 * User: kremennoy
 * Date: 20.04.2018
 * Time: 15:41
 */

    class CartController
    {
        public function actionAdd($id){
            //Добавляем товар в корзину
            Cart::addProduct($id);

            //Возвращаем пользователя на страницу
            $referrer = $_SERVER['HTTP_REFERER'];
            header("Location: $referrer");
        }

        public function actionAddAjax($id){
            //Добавляем товар в корзину с помощью Ajax
            echo Cart::addProduct($id);
            return true;
        }

        public function actionIndex(){
            $categories = array();
            $categories = Category::getCategoryList();

            $productsInCart = false;

            //Получаем массив товаров
            $productsInCart = Cart::get_products();

            if ($productsInCart){
                //Получаем полную инфомрацию о товарах для списка
                $productsIds = array_keys($productsInCart);
                $products    = Product::getProductsByIds($productsIds);

                //Получаем общую стоимость товаров
                $totalPrice = Cart::getTotalPrice($products);
            }

            require_once ROOT.'/views/cart/index.php';

            return true;
        }

    }