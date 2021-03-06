<?php include ROOT.'/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem):?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id'];?>" class="<?php if($categoryId == $categoryItem['id']) echo 'active'; ?>">
                                            <?php echo $categoryItem['name'];?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>

            <div class="col-sm-9 padding-right">

                <div class="features_items"><!--features_items-->
                    <?php if ($productsInCart): ?>
                        <p>Вы выбрали такие товары:</p>
                        <table class="table-bordered table-striped table">
                                <tr>
                                    <th>Товар</th>
                                    <th>Стоимость</th>
                                    <th>Количество, шт</th>
                                    <th>Удалить</th>
                                </tr>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td class="product-image-min">
                                        <img src="/template/images/shop/<?php echo $product['image'];?>">
                                        <a href="/product/<?php echo $product['id']; ?>">
                                            <?php echo $product['name']; ?>
                                        </a>
                                    </td>
                                    <td><?php echo $product['price']; ?></td>
                                    <td><?php echo $productsInCart[$product['id']]; ?></td>
                                    <td class="product-delete"><a href="/cart/delete/<?php echo $product['id']; ?>"><img src="/template/images/delete.png"></img></a></td>
                                </tr>

                            <?php endforeach ?>
                                <tr>
                                    <td colspan="3">Общая стоимость:</td>
                                    <td><?php echo $totalPrice; ?></td>
                                </tr>


                        </table>

                        <a class="btn btn-default checkout" href="/cart/checkout"><i class="fa fa-shopping-cart"></i> Оформить заказ</a>
                    <?php else: ?>
                        <p>Ваша корзина пуста</p>

                        <a class="btn btn-default checkout" href="/"><i class="fa fa-shopping-cart"></i> Вернуться к покупкам</a>
                    <?php endif; ?>

                </div><!--features_items-->
            </div>
        </div>
    </div>
    <br/>
    <br/>
</section>

<?php include ROOT.'/views/layouts/footer.php';?>
