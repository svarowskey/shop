<?php

    class CartController
    {
        public function actionAdd($id, $count = 1){
            //Добавляем товар в корзину
            Cart::addProduct($id, $count);

            //Возвращаем пользователя на страницу
            $referrer = $_SERVER['HTTP_REFERER'];
            header("Location: $referrer");
        }

        public function actionAddAjax($id, $count = 1){
            //Добавляем товар в корзину с помощью Ajax
            echo '('.Cart::addProduct($id, $count).')';
            return true;
        }

        public function actionIndex(){
            $categories = array();
            $categories = Category::getCategoryList();

            $productsInCart = false;

            //Получаем массив товаров
            $productsInCart = Cart::get_products();

            if ($productsInCart){
                //Получаем полную инфомрацию о товарах для списка
                $productsIds = array_keys($productsInCart);
                $products    = Product::getProductsByIds($productsIds);

                //Получаем общую стоимость товаров
                $totalPrice = Cart::getTotalPrice($products);
            }

            require_once ROOT.'/views/cart/index.php';

            return true;
        }

        public function actionCheckout(){

            //Список категорий для левого меню
            $categories = array();
            $categories = Category::getCategoryList();


            //Статус успешного оформления заказа
            $result = false;

            //Форма отправлена?
            if (isset($_POST['submit'])){
                //Форма отправлена? - Да

                //Считываем данные формы
                $userName       = $_POST['userName'];
                $userPhone      = $_POST['userPhone'];
                $userComment    = $_POST['userComment'];

                //Валидация полей
                $errors = false;
                if (!User::checkName($userName)){
                    $errors[] = 'Неправильное имя!';
                }


                //Форма заполнена корректно?
                if ($errors == false){
                    //Форма заполнена корректно? - Да
                    //Сохраним заказ в базе данных

                    //Собираем информацию о заказе
                    $productsInCart = Cart::get_products();
                    if (User::isGuest()){
                        $userId = false;
                    } else {
                        $userId = User::checkLogged();
                    }

                    //Сохраняем заказ в БД
                    $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);

                    if ($result){
                        //Оповещаем администратора о новом заказе
                        $adminEmail = 'vladimir.svarowski@gmail.com';
                        $message    = 'http://vladimir-svarows.myjino.ru/admin/orders';
                        $subject    = 'Новый заказ';
                        mail($adminEmail, $subject, $message);

                        //Очищаем корзину
                        Cart::clear();
                    }

                } else {
                    //Форма заполнена корректно? - Нет

                    //Итоги: общая стоимость и количество товаров
                    $productsInCart = Cart::get_products();
                    $productsIds    = array_keys($productsInCart);
                    $products       = Product::getProductsByIds($productsIds);
                    $totalPrice     = Cart::getTotalPrice($products);
                    $totalQuantity  = Cart::countItems();
                }

            } else {
                //Форма отправлена? - Нет

                $productsInCart = Cart::get_products();

                //В корзине есть товары?
                if($productsInCart == false){
                    //В корзине есть товары? - Нет
                    //Перенаправляем пользователя на главную страницу
                    header("Location: /");
                } else {
                    //В корзине есть товары? - Да

                    //Итоги: общая стоимость и количество товаров
                    $productsIds    = array_keys($productsInCart);
                    $products       = Product::getProductsByIds($productsIds);
                    $totalPrice     = Cart::getTotalPrice($products);
                    $totalQuantity  = Cart::countItems();

                    $userName       = false;
                    $userPhone      = false;
                    $userComment    = false;

                    //Пользователь авторизован?
                    if (User::isGuest()){
                        //Пользователь авторизован? - Нет
                        //Значения в форме остаются пустыми
                    } else {
                        //Пользователь авторизован? - Да
                        //Получаем данные о пользователе из БД по id
                        $userId = User::checkLogged();
                        $user   = User::getUserById($userId);
                        //Подставляем в форму
                        $userName = $user['name'];
                    }
                }
            }
            require_once ROOT.'/views/cart/checkout.php';

            return true;
        }
    }