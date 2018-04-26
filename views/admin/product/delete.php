<?php include ROOT.'/views/layouts/header_admin.php'?>


    <section>
        <div class="container">
            <div class="row">
                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Панель администратора</a></li>
                        <li><a href="/admin/product">Управление товарами</a></li>
                        <li class="active">Удаление товара</li>
                    </ol>
                </div>

                <h4>Удалить товар #<?php echo $id; ?></h4>
                <br/>
                <p>Вы действительно хотите удалить этот товар?</p>
                <br/>
                    <form method="post">
                        <input type="submit" name="submit" value="Удалить">
                    </form>

                <br/>

            </div>
        </div>
    </section>

<?php include ROOT.'/views/layouts/footer_admin.php'?>