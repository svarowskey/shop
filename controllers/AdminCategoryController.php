<?php

class AdminCategoryController extends AdminBase
{

    /**
     * Action для "Управления товарами"
     */
    public function actionIndex()
    {
        //Проверка доступа
        self::checkAdmin();

        //Получаем список категорий
        $categoriesList = Category::getCategoriesListAdmin();

        //Подключаем вид
        include_once ROOT.'/views/admin/category/index.php';

        return true;
    }

    /**
     * Action для Создания категорий
     */
    public function actionCreate()
    {
        //Проверка доступа
        self::checkAdmin();

        //Обработка формы
        if (isset($_POST['submit'])){
            //Если форма отправлена
            //Получаем данные из формы
            $name       = $_POST['name'];
            $sort_order = $_POST['sort_order'];
            $status     = $_POST['status'];


            //Флаг ошибок в форме
            $errors = false;

            //При необходимости можно валидировать значения нужным образом
            if (!isset($_POST['name']) || empty($_POST['name'])){
                $errors = 'Заполните поля!';
            }

            if ($errors == false){
                //Если ошибок нет
                //Добавляем новую категорию
                Category::createCategory($name,$sort_order,$status);

                //Перенаправляем администратора на страницу с товарами
                header('Location: /admin/category');
            }

        }

        //Подключаем вид
        include_once ROOT.'/views/admin/category/create.php';
        return true;
    }

    /**
     * Action для Редактирования категории
     */
    public function actionUpdate($id){
        //Проверка доступа
        self::checkAdmin();

        //Получаем список категорий для выпадающего списка
        $category = Category::getCategoryByID($id);

        //Обработка формы
        if (isset($_POST['submit'])){
            //Если форма отправлена
            //Получаем данные из формы
            $name       = $_POST['name'];
            $sort_order = $_POST['sort_order'];
            $status     = $_POST['status'];

            //Флаг ошибок в форме
            $errors = false;

            //При необходимости можно валидировать значения нужным образом
            if (!isset($_POST['name']) || empty($_POST['name'])){
                $errors = 'Заполните поля!';
            }

            if ($errors == false){
                //Если ошибок нет
                //Сохраняем изменения
                Category::updateCategory($id, $name, $sort_order, $status);
            }

            //Перенаправляем администратора на страницу Управления категориями
            header('Location: /admin/category');
        }

        //Подключаем вид
        require_once ROOT.'/views/admin/category/update.php';
        return true;
    }

    /**
     * Action для Удаления категории
     */
    public function actionDelete($id)
    {
        //Проверка доступа
        self::checkAdmin();

        //Обработка формы
        if (isset($_POST['submit'])){
            //Если форма отправлена
            //Удаляем категорию
            Category::deleteCategoryById($id);

            //Перенаправляем администратора на страницу с товарами
            header('Location: /admin/category');
        }

        include_once ROOT.'/views/admin/category/delete.php';

        return true;
    }
}