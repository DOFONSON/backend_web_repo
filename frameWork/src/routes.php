<?php // Массив роутов. Каждый роут представляет собой пару, где ключ - это регулярное выражение, соответствующее определенному URL, а значение - это массив, содержащий имя контроллера и имя метода, которые нужно вызвать
    return [
        '~^$~' => [src\Controllers\MainController::class, 'main'], // Пустой url - метод main класса MainController
        '~hello/(.+)~' => [src\Controllers\MainController::class, 'sayHello'], // hello/что либо - метод sayHello класса MainController
        '~bye/(.+)~' => [src\Controllers\MainController::class, 'byeHello'], // bye/что либо - метод byeHello класса MainController
        '~articles~' => [src\Controllers\ArticleController::class, 'index'], // articles - метод index класса MainController
        '~article/create~'=>[src\Controllers\ArticleController::class, 'create'], // article/create - метод create класса MainController
        '~article/store~'=>[src\Controllers\ArticleController::class, 'store'], // article/store - метод store класса MainController
        '~article/(\d+)~'=>[src\Controllers\ArticleController::class, 'show'], // article/id - метод show класса MainController
        '~article/edit/(\d+)~'=>[src\Controllers\ArticleController::class, 'edit'], // article/edit/id - метод edit класса MainController
        '~article/update/(\d+)~'=>[src\Controllers\ArticleController::class, 'update'], // article/update/id - метод update класса MainController
        '~article/delete/(\d+)~'=>[src\Controllers\ArticleController::class, 'delete'], // article/delete/id - метод delete класса MainController
    ];