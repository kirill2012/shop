
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Корзина</h2>

                    <?php if ($products): ?>
                        <p>Вы выбрали такие товары:</p>
                        <table class="table-bordered table-striped table">
                            <tr>
                                <th>Код товара</th>
                                <th>Название</th>
                                <th>Стомость, $</th>
                                <th>Количество, шт</th>
                                <th>Удалить</th>
                            </tr>
                            <?php
                            $totalPrice = 0;
                            foreach ($products as $product): ?>
                                <tr>
                                    <td><?=$product->id?></td>
                                    <td>
                                        <a href="/products/view?id=<?=$product->id?>">
                                            <?php echo $product->name?>
                                        </a>
                                    </td>
                                    <td><?=$product->price?></td>
                                    <td><?=$_SESSION['products'][$product->id]?></td>
                                    <td>
                                        <a href="/products/deleteFromCart?id=<?=$product->id?>">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>

                            <?php
                            $totalPrice += $product->price*$_SESSION['products'][$product->id];
                            endforeach; ?>
                            <tr>
                                <td colspan="4">Общая стоимость, $:</td>
                                <td><?= $totalPrice?></td>
                            </tr>

                        </table>

                        <a class="btn btn-default checkout" href="/products/checkout"><i class="fa fa-shopping-cart"></i> Оформить заказ</a><br>
                        <a class="btn btn-default" href="/products/clearCart"><i class="fa fa-times"></i> Очистить корзину</a>
                    <?php else: ?>
                        <p>Корзина пуста</p>

                        <a class="btn btn-default checkout" href="/"><i class="fa fa-shopping-cart"></i> Вернуться к покупкам</a>
                    <?php endif; ?>
                </div>
            </div>