<?php
    class CatalogController
    {
        public function actionIndex()
        {
            $categories = array();
            $categories = Category::getCategoryList();

            $latestsProduct = array();
            $latestsProduct = Product::getLatestProducts(16);

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