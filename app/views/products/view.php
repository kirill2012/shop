<div class="col-sm-9 padding-right">
    <div class="product-details"><!--product-details-->
        <div class="row">
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="<?=\models\Products::getImage($product->id)?>" alt="" />
                </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->

                    <?php if ($product->is_new): ?>
                        <img src="/public/images/product-details/new.jpg" class="newarrival" alt="" />
                    <?php endif; ?>

                    <h2><?=$product->name?></h2>
                    <p>Код товара: <?=$product->code?></p>
                                <span>
                                    <span>US $<?=$product->price ?></span>
                                    <a href="/products/addToCart?id=<?=$product->id?>"
                                       class="btn btn-default add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>В корзину
                                    </a>
                                </span>
                    <p><b>Наличие:</b> <?= \models\Products::getAvailabilityText($product->availability)?></p>
                </div><!--/product-information-->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <br/>
                <h5>Описание товара</h5>
                <?php echo $product->description ?>
            </div>
        </div>
    </div><!--/product-details-->