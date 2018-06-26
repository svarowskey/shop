<?php include ROOT.'/views/layouts/header_admin.php'?>


    <section>
        <div class="container">
            <div class="row">
                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Панель администратора</a></li>
                        <li><a href="/admin/category">Управление категориями</a></li>
                        <li class="active">Удаление категории</li>
                    </ol>
                </div>

                <h4>Удалить категорию #<?php echo $id; ?></h4>
                <br/>
                <p>Вы действительно хотите удалить эту категорию?</p>
                <br/>
                    <form method="post">
                        <input type="submit" name="submit" value="Удалить">
                    </form>

                <br/>

            </div>
        </div>
    </section>

<?php include ROOT.'/views/layouts/footer_admin.php'?>