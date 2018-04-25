<?php

/**
 * Контроллер AdminController
 * Главная страница в админпанели
*/
    class AdminController extends AdminBase
    {

        /**
         * Action для стартовой страницы "Панель администратора"
         */
        public function actionIndex(){
            //Проверка доступа
            self::checkAdmin();

            //Подключаем вид
            include_once ROOT.'/views/admin/index.php';

            return true;
        }
    }