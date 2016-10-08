<?php

namespace core;


class Cart
{

    public static function addProduct($id, $cnt)
    {
        if(empty($_SESSION['products'])){
            $_SESSION['products'] = array();
        }
        if (key_exists($id, $_SESSION['products'])){
            $_SESSION['products'][$id] += $cnt;
        }else{
            $_SESSION['products'][$id] = $cnt;
        }
        return self::countItems();
    }

    public static function deleteProduct($id)
    {
        unset($_SESSION['products'][$id]);
    }

    public static function clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }

    public static function countItems()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count += $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }
}