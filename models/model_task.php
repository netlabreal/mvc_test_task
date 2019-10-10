<?php
include_once 'lib/db.php';
class Model_Task extends Model{
    public function get_data()
    {

    }
    public function validate($input, $post){
        $rez = true;
        // Проверка на непустоту
        foreach ($input as $k){
            if($post[$k]==''){$rez = false;}
        }
        return $rez;
    }
    public function add($data){
        // Проверка статусса
        if(!isset($data['status'])){
            $data['status']=0;
        }
        else{
            $data['status']=1;
        }
        // Обрамляем все параметры
        $cleaned = array_map("htmlspecialchars", $data);
        $db = new Db();
        $r = $db->query('INSERT INTO tasks (name, email, task, status, edit) VALUES (:name, :email, :task, :status, :edit)', $cleaned);
        return $r;
    }
    public function edit($data){
        // Проверка статусса
        if(!isset($data['status'])){
            $data['status']=0;
        }
        else{
            $data['status']=1;
        }
        // Проверка на редактирование задачи
        if($data['last_task'] != $data['task']){
            $data['edit'] = 1;
        }
        else{
            $data['edit'] = 0;

        }
        unset($data['last_task']);
        // Обрамляем все параметры
        $cleaned = array_map("htmlspecialchars", $data);

        $db = new Db();
        $r = $db->query('UPDATE tasks SET name=:name, email=:email, task=:task, status=:status, edit=:edit WHERE id=:id', $cleaned);
        return $r;
    }
    public function get_item($id){
        $db = new Db();
        $r = $db->row('select * from tasks where id=:id', ['id'=>$id]);
        return $r;
    }
}