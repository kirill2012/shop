<?php

namespace controllers;


class MainController extends \core\Controller
{
    public function index(){
        $categories = \models\Category::all();
        $products = \models\Products::where('is_recomended', '=', 1)->get();
        $title = 'Main';
        $data = compact('categories', 'products', 'title');
        $this->render($data, 'second');
    }

    public function contact()
    {
        $userEmail = false;
        $userText = false;
        $result = false;

        if (isset($_POST['submit'])) {
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];

            $adminEmail = 'k.yevchenko@ukr.net';
            $message = "Текст: {$userText}. От {$userEmail}";
            $subject = 'Тема письма';
            $result = mail($adminEmail, $subject, $message);
            $result = true;
        }

        $title = 'Контакты';
        $data = compact('title', 'userEmail', 'userText', 'result');
        $this->render($data, 'second');
    }

    public function send(){

        $userEmail = $_POST['userEmail'];
        $userText = $_POST['userText'];

        $adminEmail = 'k.yevchenko@ukr.net';
        $message = "Текст: {$userText}. От {$userEmail}";
        $subject = 'Тема письма';
        if ( mail($adminEmail, $subject, $message) ){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function register(){
        $title = 'Регистрация';
        $data = compact('title');
        $this->render($data, 'second');
    }

    public function store(){
        $user = new \models\Users();
        $user->username = $_POST['name'];
        $user->email = $_POST['email'];
        $user->hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $user->save();
        echo '<script type="text/javascript"> window.location.href="' . URL . '/login"</script>';
    }

    public function login(){
        $title = 'Авторизация';
        $data = compact('title');
        $this->render($data, 'second');
    }

    public function logout(){
        \core\Session::stop();
        echo '<script type="text/javascript"> window.location.href="' . URL . '"</script>';
    }

    public function check(){

        if ($_POST['funct'] == 'name') {
            $user = \models\Users::where('username', '=', $_POST['username'])->first();
            if ($user['username']) {
                echo 1;
            } else {
                echo 0;
            }
        }elseif ($_POST['funct'] == 'email') {
            $user = \models\Users::where('email', '=', $_POST['email'])->first();
            if ($user['username']){
                echo 1;
            }else {
                echo 0;
            }
        }elseif($_POST['funct'] == 'pass'){
            $user = \models\Users::where('username', '=', $_POST['username'])
                ->first();
            if(password_verify($_POST['password'], $user['hash'])){
                $_SESSION['username'] = $user['username'];
                $_SESSION['admin'] = $user['admin'];
                echo 1;
            }else {
                echo 0;
            }
        }
    }
}