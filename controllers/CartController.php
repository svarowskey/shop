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

    }