<?php

class AdminOrderController extends AdminBase
{

    /**
     * Action для "Управления заказами"
     */
    public function actionIndex()
    {
        //Проверка доступа
        self::checkAdmin();

        //Получаем список товаров
        $orderList = Order::getOrderList();

        //Подключаем вид
        include_once ROOT.'/views/admin/order/index.php';

        return true;
    }

    /**
     *  Action для страницы "Просмотр заказа"
     */
    public static function actionView($id)
    {
        //Проверка доступа
        self::checkAdmin();

        //Получаем данные о товаре
        $order = Order::getOrderById($id);

        //Получаем массив с идентификаторами и количеством товаров
        $productsQuantity = json_decode($order['products'], true);

        //Получаем массив с идентификаторами товаров
        $productsIds = array_keys($productsQuantity);

        //Получаем список товаров в заказе
        $products = Product::getProductsByIds($productsIds);

        //Подключаем вид
        require_once(ROOT . '/views/admin/order/view.php');
        return true;

    }

    public static function actionUpdate($id)
    {
        //Получаем права доступа
        self::checkAdmin();

        //Получаем заказ
        $order = Order::getOrderById($id);

        if(isset($_POST['submit'])){
            //Если форма отправлена
            //Получаем данные из формы
            $option['user_phone']   = $_POST['user_phone'];
            $option['user_comment'] = $_POST['user_comment'];
            $option['date']         = $_POST['date'];
            $option['status']       = $_POST['status'];

            Order::updateOrder($id, $option);

            //Перенаправляем администратора на страницу с Управления заказами
            header('Location: /admin/order');
        }

        //Подключаем вид
        require_once ROOT.'/views/admin/order/update.php';
        return true;
    }

    /**
     * Action для Удаления заказа
     */
    public function actionDelete($id)
    {
        //Проверка доступа
        self::checkAdmin();

        //Обработка формы
        if (isset($_POST['submit'])){
            //Если форма отправлена
            //Удаляем заказ
            Order::deleteOrderById($id);

            //Перенаправляем администратора на страницу с заказами
            header('Location: /admin/order');
        }

        include_once ROOT.'/views/admin/order/delete.php';

        return true;
    }

}