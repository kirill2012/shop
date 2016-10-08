<?php

namespace models;


class Category extends \core\Model
{
    public static function getImage($id)
    {
        $path = '/public/images/categories/';

        if ( file_exists(ROOT . $path . $id . '.jpg') ){
            return $path . $id . '.jpg';
        }elseif( file_exists(ROOT . $path . $id . '.jpeg') ){
            return $path . $id . '.jpeg';
        }elseif( file_exists(ROOT . $path . $id . '.png') ){
            return $path . $id . '.png';
        }

        return $path . 'no-image.jpg';
    }
}