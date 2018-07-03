<?php include ROOT.'/views/layouts/header_admin.php'?>


    <section>
        <div class="container">
            <div class="row">
                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Панель администратора</a></li>
                        <li><a href="/admin/category">Управление заказами</a></li>
                        <li class="active">Редактирование заказа</li>
                    </ol>
                </div>

                <h4>Редактирование заказа #<?php echo $order['id']; ?></h4>
                <br/>


                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="#" method="post">

                            <p>Имя клиента</p>
                            <input type="text" name="user_name" placeholder="" value="<?php echo $order['user_name']; ?>">

                            <br/>

                            <p>Телефон клиента</p>
                            <input type="text" name="user_phone" placeholder="" value="<?php echo $order['user_phone']; ?>">

                            <br/>

                            <p>Комментарий клиента</p>
                            <input type="text" name="user_comment" placeholder="" value="<?php echo $order['user_comment']; ?>">

                            <br/>

                            <p>Дата оформления заказа</p>
                            <input type="text" name="date" placeholder="" value="<?php echo $order['date']; ?>">

                            <br/>

                            <p>Статус</p>
                            <select name="status">
                                <option value="1"<?php if($order['status'] == 1) echo 'selected="selected"'?>><?php echo Order::getStatusText('1'); ?></option>
                                <option value="2"<?php if($order['status'] == 2) echo 'selected="selected"'?>><?php echo Order::getStatusText('2'); ?></option>
                                <option value="3"<?php if($order['status'] == 3) echo 'selected="selected"'?>><?php echo Order::getStatusText('3'); ?></option>
                                <option value="4"<?php if($order['status'] == 4) echo 'selected="selected"'?>><?php echo Order::getStatusText('4'); ?></option>
                            </select>

                            <br/><br/>

                            <input type="submit" name="submit" class="btn btn-default" value="Сохранить изменения">
                        </form>
                    </div>
                </div>
                <br/>
            </div>
        </div>
    </section>

<?php include ROOT.'/views/layouts/footer_admin.php'?>