<?php include ROOT.'/views/layouts/header_admin.php'?>


    <section>
        <div class="container">
            <div class="row">
                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li class="active">Управление заказами</li>
                    </ol>
                </div>

                <h4>Список заказов</h4>

                <br/>

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID заказа</th>
                        <th>Имя покупателя</th>
                        <th>Телефон покупателя</th>
                        <th>Дата оформления заказа</th>
                        <th>Статус заказа</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($orderList as $orderString): ?>

                        <tr>
                            <td><?php echo $orderString['id']; ?></td>
                            <td><?php echo $orderString['user_name']; ?></td>
                            <td><?php echo $orderString['user_phone']; ?></td>
                            <td><?php echo $orderString['date']; ?></td>
                            <td><?php echo $orderString['status']; ?></td>
                            <td><a href="/admin/order/view/<?php echo $orderString['id']; ?>" title="Просмотр"><i class="fa fa-eye"></i></a></td>
                            <td><a href="/admin/order/update/<?php echo $orderString['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square"></i></a></td>
                            <td><a href="/admin/order/delete/<?php echo $orderString['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                        </tr>

                    <?php endforeach ?>
                </table>

            </div>
        </div>
    </section>

<?php include ROOT.'/views/layouts/footer_admin.php'?>