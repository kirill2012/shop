<?php

namespace controllers;


class ProductsController extends \core\Controller
{
    public function index($category = 0, $page = 1, $perpage=12)
    {
        $total = \models\Products::where('category_id', '=', $category)->count();
        $products = \models\Products::where('category_id', '=', $category)->take($perpage)->skip(($page-1)*$perpage)->get();
        $category = \models\Category::where('id', '=', $category)->first();
        $title = 'Категория '. $category->name;

        $categories = \models\Category::all();

        $pagination = new \core\Pagination($total, $page, $perpage, 'page=');

        $data = compact('products', 'title', 'categories', 'pagination');
        $this->render($data);
    }

    public function view($id)
    {
        $product = \models\Products::where('id', '=', $id)->first();
        $title = $product->name;
        $categories = \models\Category::all();
        $data = compact('product', 'title', 'categories');
        $this->render($data);
    }

    public function cart()
    {
        $categories = \models\Category::all();
        $title = 'Cart';
        $products=[];
        if(isset($_SESSION['products'])){
            foreach($_SESSION['products'] as $id=>$cnt){
                $products[] = \models\Products::where('id', '=', $id)->first();
            }
        }
        $data = compact('categories', 'title', 'products');
        $this->render($data);
    }

    public function addToCart($id, $cnt=1)
    {
        echo \core\Cart::addProduct($id, $cnt);
    }

    public function deleteFromCart($id)
    {
        \core\Cart::deleteProduct($id);

        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");

    }

    public function clearCart()
    {
        \core\Cart::clear();

        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");

    }
}