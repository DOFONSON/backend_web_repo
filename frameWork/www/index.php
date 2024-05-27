<?php
    //Файл отвечает за роутинг, то есть за определение того, какой контроллер и какой метод нужно вызвать в зависимости от запроса, полученного от клиента.
    //Мы делаем автозагрузку классов, чтобы PHP мог автоматически загружать классы, когда они используются в коде
    spl_autoload_register(function (string $className){
        require('../'.str_replace('\\', '/', $className).'.php');
    });

    $pageFound = false; // Найдена ли траница
    $url = $_GET['route'] ?? ""; // Получаем данные (из массива GET ищем значение ключа route), иначе пустая строка
    $routes = require('../src/routes.php'); //Загружает массив роутов из файла routes.php. Каждый роут представляет собой пару, где ключ - это регулярное выражение, соответствующее URL, а значение - это массив, содержащий имя контроллера и имя метода, который нужно вызвать.
    foreach($routes as $pattern => $controllerAndAction){
        preg_match($pattern, $url, $matches);
        if (!empty($matches)){ // Проверяет соответствует url регулярке роута и если да, то страница найдена, иначе сообзение, что страница не найдена
            $pageFound = true;
            unset($matches[0]);
            $controller = new $controllerAndAction[0];
            $action = $controllerAndAction[1];
            $controller->$action(...$matches);
        }
    }
    if (!$pageFound) echo 'Страница не найдена';
    // $user = new src\Models\Users\User('ivan');
    // $article = new src\Models\Articles\Article('title', 'text', $user);
    // var_dump($article); 

    // if (isset($_GET['name']) && !empty($_GET['name'])){
    //     $controller->sayHello($_GET['name']);
    // }else $controller->main();

    // echo '<br>'.$_GET['route'];