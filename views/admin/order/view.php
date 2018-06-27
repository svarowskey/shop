<?php include ROOT.'/views/layouts/header_admin.php'?>


    <section>
        <div class="container">
            <div class="row">
                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li><a href="/admin/order">Управление заказами</a></li>
                        <li class="active">Просмотр заказа</li>
                    </ol>
                </div>

                <h5>Информация о заказе</h5>

                <br/>

                <table class="table-admin-small table-bordered table-striped table">
                    <tr>
                        <th>Номер заказа</th>
                        <th><?php echo $order['id']; ?></th>
                    </tr>
                    <tr>
                        <th>Имя клиента</th>
                        <th><?php echo $order['user_name']; ?></th>
                    </tr>
                    <tr>
                        <th>Телефон клиента</th>
                        <th><?php echo $order['user_phone']; ?></th>
                    </tr>
                    <tr>
                        <th>Комментарий клиента</th>
                        <th><?php echo $order['user_comment']; ?></th>
                    </tr>
                    <?php if($order['user_id'] != 0): ?>
                        <tr>
                            <td><b>ID клиента</b></td>
                            <td><?php echo $order['user_id']; ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <th><b>Статус заказа</b></th>
                        <th><?php echo Order::getStatusText($order['status']); ?></th>
                    </tr>
                    <tr>
                        <th><b>Дата заказа</b></th>
                        <th><?php echo $order['date']; ?></th>
                    </tr>
                </table>

                <table class="table-admin-medium table-bordered table-striped table">
                    <tr>
                        <th>ID товара</th>
                        <th>Артикул товара</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Количество</th>
                    </tr>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo $product['id']; ?></td>
                            <td><?php echo $product['code']; ?></td>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo $product['price']; ?></td>
                            <td><?php echo $productsQuantity[$product['id']]; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <a href="/admin/order/" class="btn btn-default back"><i class="fa fa-arrow-left"></i>Назад</a>

            </div>
        </div>
    </section>

<?php include ROOT.'/views/layouts/footer_admin.php'?>