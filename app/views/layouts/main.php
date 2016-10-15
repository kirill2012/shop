<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?=$title?></title>
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/css/font-awesome.min.css" rel="stylesheet">
    <link href="/public/css/prettyPhoto.css" rel="stylesheet">
    <link href="/public/css/price-range.css" rel="stylesheet">
    <link href="/public/css/animate.css" rel="stylesheet">
    <link href="/public/css/main.css" rel="stylesheet">
    <link href="/public/css/responsive.css" rel="stylesheet">

</head><!--/head-->

<body>
<div class="page-wrapper">


    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +38 097 440 99 07</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> k.yevchenko@ukr.net</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->

        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="/">
                                <!-- <img src="/public/images/home/logo.png" alt="" /> -->
                                <h1>Shop</h1>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="/products/cart"><i class="fa fa-shopping-cart"></i> Корзина
                                        (<span id="cart-count"><?= \core\Cart::countItems() ?></span>)
                                    </a></li>
                                <?php
                                if (!isset($_SESSION['username'])){?>
                                <li><a href="/login"><i class="fa fa-lock"></i> Вход</a></li>
                                <li><a href="/register"><i class="fa fa-pencil"></i>Регистрация</a></li>
                                <?}else{?>
                                <li><a href="#"><i class="fa fa-user"></i><?=$_SESSION['username']?></a></li>
                                <li><a href="/logout"><i class="fa fa-sign-out"></i>Выход</a></li>
                                <?}?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="/">Категории</a></li>
                                <li><a href="/contact">Контакты</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->

    </header><!--/header-->


    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Каталог</h2>
                        <div class="panel-group category-products">
                            <?php
                            foreach ($categories as $category){?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="/products/?category_id=<?=$category->id?>"><?=$category->name?></a></h4>
                                    </div>
                                </div>
                            <?}?>
                        </div>

                    </div>
                </div>
    <?=$content?>
            </div>
        </div>
    </section>


<footer id="footer" class="page-footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2016</p>
                <p class="pull-right">Powered by Yevchenko Kirill</p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->




<script src="/public/js/jquery.cycle2.min.js"></script>
<script src="/public/js/jquery.cycle2.carousel.min.js"></script>
<script src="/public/js/bootstrap.min.js"></script>
<script src="/public/js/jquery.scrollUp.min.js"></script>
<script src="/public/js/price-range.js"></script>
<script src="/public/js/jquery.prettyPhoto.js"></script>
<script src="/public/js/main.js"></script>

</body>
</html>