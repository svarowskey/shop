<?php

    class AdminProductController extends AdminBase
    {

        /**
         * Action для "Управления товарами"
        */
        public function actionIndex()
        {
            //Проверка доступа
            self::checkAdmin();

            //Получаем список товаров
            $productsList = Product::getProductsList();

            //Подключаем вид
            include_once ROOT.'/views/admin/product/index.php';

            return true;
        }
    }