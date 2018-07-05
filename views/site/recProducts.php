<div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Рекомендуемые товары</h2>
                    <div class="cycle-slideshow"
                         data-cycle-fx=carousel
                         data-cycle-timeout=5000
                         data-cycle-carousel-visible=3
                         data-cycle-carousel-fluid=true
                         data-cycle-slides="div.item"
                         data-cycle-next="#next"
                         data-cycle-prev="#prev"
                    >
                        <!-- Блоки слайдов -->
                        <?php foreach ($sliderProducts as $sliderProduct):?>
                            <div class="item recommended-item">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo Product::getImage($sliderProduct['id']); ?>" alt="" />
                                            <h2><?php echo $sliderProduct['price']; ?></h2>
                                            <p><?php echo $sliderProduct['name']; ?></p>
                                            <a href="#" data-id="<?php echo $sliderProduct['id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <a class="left recommended-item-control" href="#recommended-item-carousel" id="prev" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" id="next" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
</div><!--/recommended_items-->