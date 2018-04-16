<?php

    include_once ROOT.'/models/Category.php';
    include_once ROOT.'/models/Product.php';

    class SiteController
    {
        public function actionIndex(){
            $categories = array();
            $categories = Category::getCategoryList();

            $latestsProduct = array();
            $latestsProduct = Product::getLatestProducts(16);

            require_once ROOT.'/views/site/index.php';

            return true;
        }
    }
