<?php include ROOT.'/views/layouts/header_admin.php'?>


    <section>
        <div class="container">
            <div class="row">
                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Панель администратора</a></li>
                        <li><a href="/admin/product">Управление товарами</a></li>
                        <li class="active">Создание товара</li>
                    </ol>
                </div>

                <h4>Добавить новый товар</h4>
                <br/>


                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="#" method="post" enctype="multipart/form-data">

                            <p>Название товара</p>
                            <input type="text" name="name">

                            <br/>

                            <p>Артикул</p>
                            <input type="text" name="article">

                            <br/>

                            <p>Стоимость</p>
                            <input type="text" name="price">

                            <br/>

                            <p>Категория</p>
                            <select name="category_id">
                                <?php if (is_array($categoriesList)): ?>
                                    <?php foreach ($categoriesList as $category): ?>
                                        <option value="<?php echo $category['id']; ?>">
                                            <?php echo $category['name'];?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>

                            <br/><br/><br/>

                            <p>Производитель</p>
                            <input type="text" name="brand">

                            <br/>

                            <p>Изображение товара</p>
                            <input type="file" name="image">

                            <br/>

                            <p>Детальное описание</p>
                            <textarea name="description"></textarea>

                            <br/><br/>

                            <p>Наличие на складе</p>
                            <select name="availability">
                                <option value="1" selected="selected">Да</option>
                                <option value="0">Нет</option>
                            </select>

                            <br/><br/>

                            <p>Новинка</p>
                            <select name="is_new">
                                <option value="1" selected="selected">Да</option>
                                <option value="0">Нет</option>
                            </select>

                            <br/><br/>

                            <p>Рекомендуемые</p>
                            <select name="is_recommended">
                                <option value="1" selected="selected">Да</option>
                                <option value="0">Нет</option>
                            </select>

                            <br/><br/>

                            <p>Статус</p>
                            <select name="status">
                                <option value="1" selected="selected">Отображается</option>
                                <option value="0">Скрыт</option>
                            </select>

                            <br/><br/>

                            <input type="submit" name="submit" class="btn btn-default" value="Добавить товар">

                            <br/><br/>

                        </form>
                    </div>
                </div>
                <br/>
            </div>
        </div>
    </section>

<?php include ROOT.'/views/layouts/footer_admin.php'?>