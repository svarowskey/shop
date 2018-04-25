<?php
    class CatalogController
    {
        public function actionIndex($page = 1)
        {
            //Получаем общее количество товаров
            $total = Product::getCountAllProducts();

            //Список категорий для левого меню
            $categories = Category::getCategoryList();

            //Список последних товаров
            $latestsProduct = Product::getProductsForCatalog($page);

            //Список товаров для слайдера
            $sliderProducts = Product::getRecommendedProducts();

            //Создаем объект Pagination - постраничная навигация
            $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

            require_once ROOT.'/views/catalog/index.php';

            return true;
        }

        public function actionCategory($categoryId, $page = 1)
        {
            $categories = array();
            $categories = Category::getCategoryList();

            $categoryProducts = array();
            $categoryProducts = Product::getProductListByCategory($categoryId, $page);

            $total = Product::getTotalProductsInCategory($categoryId);

            //Создаем объект Pagination - постраничная навигация
            $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

            require_once ROOT.'/views/catalog/category.php';

            return true;
        }
    }