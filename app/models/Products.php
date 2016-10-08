<?php

namespace models;


class Products extends \core\Model
{
    public static function getImage($id)
    {
        $path = '/public/images/products/';
        if ( file_exists(ROOT . $path . $id . '.jpg') ){
            return $path . $id . '.jpg';
        }elseif( file_exists(ROOT . $path . $id . '.jpeg') ){
            return $path . $id . '.jpeg';
        }elseif( file_exists(ROOT . $path . $id . '.png') ){
            return $path . $id . '.png';
        }

        return $path . 'no-image.jpg';
    }

    public static function getAvailabilityText($availability)
    {
        switch ($availability) {
            case '1':
                return 'В наличии';
                break;
            case '0':
                return 'Под заказ';
                break;
        }
    }
}