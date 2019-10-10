<?php
class Route{
    static function start()
    {
        # По умолчанию
        $controller_name = 'Main';
        $action_name = 'index';
        $id='';

        # Разбиваем строку
        $routes = explode('/', $_SERVER['REQUEST_URI']);
//        var_dump($routes);die;
        // получаем имя контроллера
        if ( !empty($routes[1]) )
        {
            $controller_name = $routes[1];
        }

        // получаем имя экшена
        if ( !empty($routes[2]) )
        {
            $action_name = $routes[2];
        }
        // получаем id
        if ( !empty($routes[3]) )
        {
            $id = $routes[3];
        }


#

        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

        // включаем класс модели
        $model_file = 'models/'.strtolower($model_name).'.php';
        if (file_exists($model_file)) {
            include $model_file;
        }
        // подцепляем файл с классом контроллера
        $controller_file = 'controllers/'.strtolower($controller_name).'.php';
        if (file_exists($controller_file)) {
            include $controller_file;
        }
        else{

        }
        // создаем контроллер
        $controller = new $controller_name;
        $action = $action_name;

        // Проверка на существование метода
        if(method_exists($controller, $action))
        {
            // вызываем
            $controller->$action($id);
        }
        else
        {


        }
    }

    static function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }

    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }

}
