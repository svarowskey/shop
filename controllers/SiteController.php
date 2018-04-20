<?php
class SiteController
{
    public function actionIndex(){
        $categories = array();
        $categories = Category::getCategoryList();

        $latestsProduct = array();
        $latestsProduct = Product::getLatestProducts(6);

        require_once ROOT.'/views/site/index.php';

        return true;
    }

    public function actionContact(){

        //Определяем необходимые переменные и очищаем их;
        $userEmail = '';
        $userText  = '';
        $result    = false;

        if (isset($_POST['submit'])){

            $userEmail  = $_POST['userEmail'];
            $userText   = $_POST['userText'];

            $errors     = false;

            //Валидация полей
            if(!User::checkEmail($userEmail)){
                $errors[] = 'Неправильный email!';
            }

            //Проверка есть ли ошибки. Если нет ошибок, то отправляем сообщение по параметрам.
            if($errors == false){
                $adminEmail = 'vladimir.svarowski@gmail.com';           //Почтовый адрес, на который будет отправляться почта
                $subject    = 'Тема письма';                            //Тема письма
                $message    = "Текст : {$userText}. От {$userEmail}";   //Текст письма
                $result     = mail($adminEmail, $subject, $message);    //Отправка письма
            }

        }
        require_once ROOT . '/views/site/contact.php';

        return true;

    }
}
