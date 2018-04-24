<?php

/**
 * Контроллер AdminController
 * Главная страница в админпанели
*/
    class AdminController
    {

        /**
         * Action для стартовой страницы "Панель администратора"
         */
        public function adtionIndex(){
            //Проверка доступа


            //Подключаем вид
            include_once ROOT.'/views/admin/index.php';

            return true;
        }
    }