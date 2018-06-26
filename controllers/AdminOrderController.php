<?php

class AdminOrderController
{

    /**
     * Action для "Управления заказами"
     */
    public function actionIndex()
    {
        //Проверка доступа
        //self::checkAdmin();

        //Получаем список товаров
        $orderList = Order::getOrderList();

        //Подключаем вид
        include_once ROOT.'/views/admin/order/index.php';

        return true;
    }

    /**
     *  Action для страницы "Просмотр заказа"
     */


}