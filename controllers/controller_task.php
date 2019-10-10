<?php

include_once 'core/route.php';

class Controller_Task extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_Task();

    }

    public function action_add()
    {
        $error=''; $message = '';
        if (!empty($_POST)) {
            $post = $_POST;
            if($this->model->validate(['name', 'email', 'task'], $post)){
                $this->model->add($post);
                Route::redirect('/');
                #$message = 'Ваша задача была успешно добавлена!';
            }
            else{
                $error = 'Данные некорректны!';
            }

        }
        $data = ['error'=>$error, 'message'=>$message];
        $this->view->generate('add_task_view.php', 'template_view.php', $data);
    }
    public function action_edit($id)
    {
        if (isset($_SESSION['USERNAME'])) {
            $error = '';
            if ($id == '') {
                Route::redirect('/');
            } else {
                $res = $this->model->get_item($id);
                if (!empty($res)) {
                } else {
                    Route::redirect('/');
                }
            }

            if (!empty($_POST)) {
                $post = $_POST;

                if ($this->model->validate(['name', 'email', 'task'], $post)) {
                    $this->model->edit($post);
                    Route::redirect('/');
                } else {
                    $error = 'Данные некорректны!';
                }

            }
            $data = ['id' => $id, 'error' => $error, 'res' => $res];

            $this->view->generate('edit_task_view.php', 'template_view.php', $data);
        }
        else{
            Route::redirect('/account/login');
        }
    }
}