<?php

/**
 * Абстрактный класс AdminBase содержит общую логику для контроллеров, которые
 * используются в панели администраторв
 */

    abstract class AdminBase
    {


        public static function checkAdmin()
        {
            //Проверям авторизирован ли пользователь. Если нет - перенаправляем на авторизацию.
            $userId = User::checkLogged();

            //Получаем информацию о текущем пользователе
            $user = User::getUserById($userId);


        }
    }