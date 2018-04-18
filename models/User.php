<?php


class User
{
    //Добавление данных пользователя в базу данных (регистрация)
    public static function register($name, $email, $password)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO user (name, email, password) '
                .'VALUES (:name, :email, :password)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }

    //Проверка поля "имя". Не меньше, чем 2 символа
    public static function checkName($name){
        if(strlen($name) >= 2){
            return true;
        }
        return false;
    }

    //Проверка поля "email"
    public static function checkEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    //Проверка поля "пароль". Не меньше, чем 6 символов
    public static function checkPassword($password){
        if (strlen($password) >=6){
            return true;
        }
        return false;
    }

    //Проверка использования email
    public static function checkEmailExists($email){
        $db  = Db::getConnection();
        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn()){
            return true;
        }

        return false;
    }
}