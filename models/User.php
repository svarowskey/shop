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

    //Проверка существование пользователя в базе
    public static function checkUserData($email, $password){
        $db  = Db::getConnection();
        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if($user){
            return $user['id'];
        }

        return false;
    }

    //Запоминаем пользователя (сессия)
    public static function auth($userId){
        $_SESSION['user'] = $userId;
    }

    //Проверяем войден ли пользователь
    public static function checkLogged(){
        //Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])){
            return $_SESSION['user'];
        }

        //Если сессии нет, перенаправляем пользователя на страницу входа
        header("Location: /user/login");
    }

    //Проверяем гость на сайте или нет
    public static function isGuest(){
        if (isset($_SESSION['user'])){
            return false;
        }
        return true;
    }

    public static function getUserById($id)
    {
        $idProduct = intval($id);
        if($idProduct)
        {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM user WHERE id = :id';
            $result = $db->prepare($sql);
            $result->bindParam('id', $id, PDO::PARAM_INT);

            //Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }

    }

    public static function edit($id, $name, $password)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE user 
                SET name = :name, password = :password
                WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }
}