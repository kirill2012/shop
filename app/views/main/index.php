           <div class="col-sm-8 col-sm-offset-2 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Категории</h2>
                    <?php foreach ($categories as $category){?>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="/products/?category=<?=$category->id?>">
                                        <h4><?=$category->name?></h4>
                                        <img src="<?=\models\Category::getImage($category->id)?>" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>


                </div><!--features_items-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Рекомендуемые товары</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">

                                <?php foreach ($products as $product){?>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <a href="/products/view?id=<?=$product->id;?>">
                                                        <p><?=$product->name?></p>
                                                    <!--
                                                    <img src="<?=\models\Products::getImage($product->id)?>" alt="" />
                                                    -->
                                                    </a>
                                                    <h2>$<?=$product->price?></h2>

                                                    <button class="btn btn-default add-to-cart" data-id="<?=$product->id?>">
                                                        <i class="fa fa-shopping-cart"></i>В корзину
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php }?>


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