<?php

namespace core;

class Controller
{
    public function render($data = array(), $layout = 'main'){

        $method = debug_backtrace()[1]['class'] . DS . debug_backtrace()[1]['function'];

        $method = str_replace('controllers\\','', $method);
        $view = str_replace('Controller','', $method);

        extract($data);
        ob_start();
        require APP . 'views' . DS . $view . '.php';
        $content = ob_get_clean();
        require APP . 'views' . DS . 'layouts' . DS . $layout . '.php';
    }

}