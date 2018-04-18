<?php
    return array(

        'product/([0-9]+)'                  => 'product/view/$1',           //actionView в ProductController

        'catalog'                           => 'catalog/index',             //actionIndex в CatalogController

        'category/([0-9)+])/page-([0-9]+)'  => 'catalog/category/$1/$2',

        'category/([0-9)+])'                => 'catalog/category/$1',

        'user/register'                     => 'user/register',

        'user/login'                        => 'user/login',                //actionLogin в UserController

        'user/logout'                       => 'user/logout',               //actionLogout в UserController

        'cabinet/edit'                      => 'cabinet/edit',              //actionEdit в CabinetController

        'cabinet'                           => 'cabinet/index',             //actionIndex в CabinetController

        ''                                  => 'site/index',                //actionIndex в SiteController

    );