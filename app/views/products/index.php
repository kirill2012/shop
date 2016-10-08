<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">товары</h2>


        <?php foreach ($products as $product): ?>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <a href="/products/view?id=<?=$product->id;?>">
                                <?=$product->name?>
                                <!--
                               <img src="<?=\models\Products::getImage($product->id)?>" alt="" />
                               -->
                            </a>
                            <h2>$<?=$product->price?></h2>
                            <button class="btn btn-default add-to-cart" data-id="<?=$product->id?>">
                                <i class="fa fa-shopping-cart"></i>В корзину
                            </button>
                        </div>
                        <?php if ($product->is_new): ?>
                            <img src="/public/images/home/new.png" class="new" alt="" />
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach;?>

    </div><!--features_items-->
<div align="center"><?=$pagination->get() ?></div>
</div>



<script src="/public/js/jquery-3.1.0.min.js"></script>
<script>
    $(document).ready(function () {

        $('.add-to-cart').on('click', function(){
            var id = $(this).attr("data-id");
            $.ajax({
                type: "GET",
                url: "<?=URL . '/products/addToCart'?>",
                data: {
                    id: id
                },
                success: function(data) {
                    $("#cart-count").text(data);
                }
            });
        });
    });

</script>