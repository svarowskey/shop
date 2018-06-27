<?php include ROOT.'/views/layouts/header_admin.php'?>


    <section>
        <div class="container">
            <div class="row">
                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Панель администратора</a></li>
                        <li><a href="/admin/order">Управление заказами</a></li>
                        <li class="active">Удаление заказа</li>
                    </ol>
                </div>

                <h4>Удалить категорию #<?php echo $id; ?></h4>
                <br/>
                <p>Вы действительно хотите удалить этот заказ?</p>
                <br/>
                    <form method="post">
                        <input type="submit" name="submit" value="Удалить">
                    </form>
                <br/>

                <a href="/admin/order/" class="btn btn-default back"><i class="fa fa-arrow-left"></i>Назад</a>
            </div>
        </div>
    </section>

<?php include ROOT.'/views/layouts/footer_admin.php'?>