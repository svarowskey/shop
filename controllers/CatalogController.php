<?php

    include_once ROOT.'/models/Category.php';
    include_once ROOT.'/models/Product.php';

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

        public function actionCategory($categoryId)
        {
            $categories = array();
            $categories = Category::getCategoryList();

            $categoryProducts = array();
            $categoryProducts = Product::getProductListByCategory($categoryId);

            require_once ROOT.'/views/catalog/category.php';

            return true;
        }
    }