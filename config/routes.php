<?php
    return array(

        //Товары

        'product/([0-9]+)'                  => 'product/view/$1',           //actionView в ProductController

        'catalog/page-([0-9]+)'             => 'catalog/index/$1',          //actionIndex в CatalogController

        'catalog'                           => 'catalog/index',             //actionIndex в CatalogController

        'category/([0-9]+)/page-([0-9]+)'   => 'catalog/category/$1/$2',

        'category/([0-9]+)'                 => 'catalog/category/$1',


        //Пользователь

        'user/register'                     => 'user/register',

        'user/login'                        => 'user/login',                //actionLogin   в UserController

        'user/logout'                       => 'user/logout',               //actionLogout  в UserController

        'cabinet/edit'                      => 'cabinet/edit',              //actionEdit    в CabinetController

        'cabinet'                           => 'cabinet/index',             //actionIndex   в CabinetController


        //Корзина

        'cart/delete/([0-9]+)'              => 'cart/delete/$1',            //actionDelete в CartController

        'cart/add'                          => 'cart/add',                  //actionAdd     в CartController

        'cart/addAjax'                      => 'cart/addAjax',              //actionAddAjax в CartController

        'cart/checkout'                     => 'cart/checkout',             //actionCheckout в CartController

        'cart'                              => 'cart/index',                //actionIndex   в CartController


        //Админпанель Управление товарами

        'admin/product/delete/([0-9]+)'     => 'adminProduct/delete/$1',    //actionDelete в AdminProductController

        'admin/product/create'              => 'adminProduct/create',       //actionDelete в AdminProductController

        'admin/product'                     => 'adminProduct/index',        //actionIndex в AdminProductController



        //Админпанель
        'admin'                             => 'admin/index',               //actionIndex а AdminController

        'contacts'                          => 'site/contact',              //actionContact в SiteController

        ''                                  => 'site/index',                //actionIndex   в SiteController

);