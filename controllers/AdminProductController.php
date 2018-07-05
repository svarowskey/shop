<?php

    class AdminProductController extends AdminBase
    {

        /**
         * Action для "Управления товарами"
        */
        public function actionIndex()
        {
            //Проверка доступа
            self::checkAdmin();

            //Получаем список товаров
            $productsList = Product::getProductsList();

            //Подключаем вид
            include_once ROOT.'/views/admin/product/index.php';

            return true;
        }

        /**
         * Action для Создания товара
        */
        public function actionCreate()
        {
            //Проверка доступа
            self::checkAdmin();

            //Получаем список категорий для выпадающего списка
            $categoriesList = Category::getCategoriesListAdmin();

            //Обработка формы
            if (isset($_POST['submit'])){
                //Если форма отправлена
                //Получаем данные из формы
                $option['name']             = $_POST['name'];
                $option['code']             = $_POST['article'];
                $option['price']            = $_POST['price'];
                $option['category_id']      = $_POST['category_id'];
                $option['brand']            = $_POST['brand'];
                $option['image']            = $_POST['image'];
                $option['description']      = $_POST['description'];
                $option['availability']     = $_POST['availability'];
                $option['is_new']           = $_POST['is_new'];
                $option['is_recommended']   = $_POST['is_recommended'];
                $option['status']           = $_POST['availability'];

                //Флаг ошибок в форме
                $errors = false;

                //При необходимости можно валидировать значения нужным образом
                if (!isset($option['name']) || empty($option['name'])){
                    $errors = 'Заполните поля!';
                }

                if ($errors == false){
                    //Если ошибок нет
                    //Добавляем новый товар
                    $id = Product::createProduct($option);

                    //Если запись добавлена
                    if ($id){
                        //Проверим, загружалось ли через форму изображение
                        if (is_uploaded_file($_FILES['image']['tmp_name'])){
                            //Если загружалось, переместим его в нужную папку и дадим новое имя
                            move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/upload/images/products/');
                        }
                    }

                    //Перенаправляем администратора на страницу с товарами
                    header('Location: /admin/product');
                }

            }

            //Подключаем вид
            include_once ROOT.'/views/admin/product/create.php';
            return true;
        }

        /**
         * Action для Редактирования товара
        */
        public function actionUpdate($id){
            //Проверка доступа
            self::checkAdmin();

            //Получаем список категорий для выпадающего списка
            $categoriesList = Category::getCategoriesListAdmin();

            //Получаем данные о конкретном товаре
            $product = Product::getProductById($id);

            if (isset($_POST['submit'])){
                //Если форма отправлена
                //Получаем данные из формы
                $option['name']             = $_POST['name'];
                $option['code']             = $_POST['article'];
                $option['price']            = $_POST['price'];
                $option['category_id']      = $_POST['category_id'];
                $option['brand']            = $_POST['brand'];
                $option['image']            = $_POST['image'];
                $option['description']      = $_POST['description'];
                $option['availability']     = $_POST['availability'];
                $option['is_new']           = $_POST['is_new'];
                $option['is_recommended']   = $_POST['is_recommended'];
                $option['status']           = $_POST['availability'];

                //Флаг ошибок в форме
                $errors = false;

                //При необходимости можно валидировать значения нужным образом
                if (!isset($option['name']) || empty($option['name'])){
                    $errors = 'Заполните поля!';
                }

                if ($errors == false){
                    //Если ошибок нет
                    //Сохраняем изменения
                    Product::updateProduct($id, $option);

                    //Если запись добавлена
                    if ($id){
                        //Проверим, загружалось ли через форму изображение
                        if (is_uploaded_file($_FILES['image']['tmp_name'])){
                            //Если загружалось, переместим его в нужную папку и дадим новое имя
                            move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/upload/images/products/{$id}.jpg");
                        }
                    }
                }

                //Перенаправляем администратора на страницу Управления товарами
                header('Location: /admin/product');
            }

            //Подключаем вид
            require_once ROOT.'/views/admin/product/update.php';
            return true;
        }

        /**
         * Action для Удаления товара
        */
        public function actionDelete($id)
        {
            //Проверка доступа
            self::checkAdmin();

            //Обработка формы
            if (isset($_POST['submit'])){
                //Если форма отправлена
                //Удаляем товар
                Product::deleteProductById($id);

                //Перенаправляем администратора на страницу с товарами
                header('Location: /admin/product');
            }

            include_once ROOT.'/views/admin/product/delete.php';

            return true;
        }
    }