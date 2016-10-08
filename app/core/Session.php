<?php

namespace core;

class Session
{
    static public function start()
    {
        session_start();
    }

    static public function stop()
    {
        session_destroy();
    }

    public function get($key){
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public function set($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    static public function delete($key)
    {
        if (isset($_SESSION[$key])){
            unset ($_SESSION[$key]);
        }
        return;
    }
}