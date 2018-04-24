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
                                        <a href="/category/<?php echo $categoryItem['id'];?>">
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
                    <h2 class="title text-center">Последние товары</h2>

                    <?php foreach ($latestsProduct as $latestsProductItem): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center product-item-main-page">
                                        <img src="/template/images/shop/<?php echo $latestsProductItem['image']; ?>" alt="" />
                                        <h2><?php echo $latestsProductItem['price']; ?></h2>
                                        <p>
                                            <a href="/product/<?php echo $latestsProductItem['id']?>"><?php echo $latestsProductItem['name']; ?>
                                            </a>
                                        </p>
                                        <a href="#" data-id="<?php echo $latestsProductItem['id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                    </div>
                                    <?php if ($latestsProductItem['is_new']):?>
                                        <img src="/template/images/home/new.png" class="new" alt="" />
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div><!--features_items-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Рекомендуемые товары</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active recommended-item">
                                <?php foreach ($recommendedProducts as $recommendedProduct): ?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/template/images/shop/<?php echo $recommendedProduct['image']; ?>" alt="" />
                                                <h2><?php echo $recommendedProduct['price']; ?></h2>
                                                <p><?php echo $recommendedProduct['name']; ?></p>
                                                <a href="#" data-id="<?php echo $recommendedProduct['id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="item recommended-item">
                                <?php foreach ($recommendedProductsNext as $recommendedProductNext): ?>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="/template/images/shop/<?php echo $recommendedProductNext['image']; ?>" alt="" />
                                                    <h2><?php echo $recommendedProductNext['price']; ?></h2>
                                                    <p><?php echo $recommendedProductNext['name']; ?></p>
                                                    <a href="#" data-id="<?php echo $recommendedProductNext['id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>

<?php include ROOT.'/views/layouts/footer.php';?>