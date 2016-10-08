<?php

namespace models;


class Users extends \core\Model
{
    public function posts()
    {
        return $this->hasMany('/Models/Posts');
    }
}