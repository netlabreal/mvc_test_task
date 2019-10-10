<?php
include_once 'core/route.php';

class Controller_Account extends Controller{

    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_Account();

    }

    public function action_login(){
        $error = '';
        if (isset($_SESSION['USERNAME'])){
            Route::redirect('/');
        }
        if(!empty($_POST)){
            $post = $_POST;
            #$this->model->validate(['login', 'pass'], $post);
            if($post['login'] == 'admin' && $post['pass'] == '123'){
                $_SESSION['USERNAME'] = 'admin';
                Route::redirect('/');

            }else{
                $error = 'Ваши логин или пароль некорректны!';
            }
        }
        $this->view->generate('login_view.php', 'template_view.php', ['error'=>$error]);
    }
    public function action_logout(){
        unset($_SESSION['USERNAME']);
        Route::redirect('/');
    }
}
