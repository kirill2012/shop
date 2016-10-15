<?php

namespace controllers;

class AdminController extends \core\Controller
{
    public function index()
    {
        $title = 'Админка';
        $data = compact('title');
        $this->render($data, 'admin');
    }

    public function categories()
    {
        $categories = \models\Category::all();
        $title = 'Категории';
        $data = compact('title', 'categories');
        $this->render($data, 'admin');
    }

    public function categoryCreate(){
        $title = 'Создать категорию';
        $data = compact('title');
        $this->render($data, 'admin');
    }

    public function storeCategory(){
        $post = new \models\Category();
        $post->title = $_POST['title'];
        $post->text = $_POST['text'];
        $post->save();
        echo '<script type="text/javascript"> window.location.href="' . URL . '/admin/categories"</script>';
    }

    public function editCategory($id = ''){
        $data = \models\Category::find($id);
        $this->render($data, 'admin');
    }

    public function updateCategory($id = ''){
        $post = \models\Category::find($id);
        $post->title = $_POST['title'];
        $post->text = $_POST['text'];
        $post->save();
        echo '<script type="text/javascript"> window.location.href="' . URL . '/admin/categories"</script>';
    }

    public function deleteCategory($id = ''){
        \models\Category::destroy($id);
        echo '<script type="text/javascript"> window.location.href="' . URL . '/admin/categories"</script>';
    }
}