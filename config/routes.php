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

        'admin/product/update/([0-9]+)'     => 'adminProduct/update/$1',    //actionUpdate в AdminProductController

        'admin/product/delete/([0-9]+)'     => 'adminProduct/delete/$1',    //actionDelete в AdminProductController

        'admin/product/create'              => 'adminProduct/create',       //actionCreate в AdminProductController

        'admin/product'                     => 'adminProduct/index',        //actionIndex в AdminProductController

        'admin/category/update/([0-9]+)'    => 'adminCategory/update/$1',   //actionUpdate в AdminCategoryController

        'admin/category/delete/([0-9]+)'    => 'adminCategory/delete/$1',   //actionDelete в AdminCategoryController

        'admin/category/create'             => 'adminCategory/create',      //actionCreate в AdminCategoryController

        'admin/category'                    => 'adminCategory/index',       //actionIndex в AdminCategoryController

        'admin/order/update/([0-9]+)'       => 'adminOrder/update/$1',      //actionUpdate в AdminOrderController

        'admin/order/delete/([0-9]+)'       => 'adminOrder/delete/$1',      //actionDelete в AdminOrderController

        'admin/order/view'                  => 'adminOrder/view',           //actionView в AdminOrderController

        'admin/order'                       => 'adminOrder/index',          //actionIndex в AdminOrderController



        //Админпанель
        'admin'                             => 'admin/index',               //actionIndex а AdminController

        'contacts'                          => 'site/contact',              //actionContact в SiteController

        ''                                  => 'site/index',                //actionIndex   в SiteController

);