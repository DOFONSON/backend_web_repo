<?php
    return [
        '~^$~' => [src\Controllers\MainController::class, 'main'],
        '~hello/(.+)~' => [src\Controllers\MainController::class, 'sayHello'],
        '~article/create~'=>[src\Controllers\ArticleController::class, 'create'],
        '~articles~' => [src\Controllers\ArticleController::class, 'index'],
        '~article/store~'=>[src\Controllers\ArticleController::class, 'store'],
        '~article/(\d+)~'=>[src\Controllers\ArticleController::class, 'show'],
        '~article/edit/(\d+)~'=>[src\Controllers\ArticleController::class, 'show'],
        '~article/update/(\d+)~'=>[src\Controllers\ArticleController::class, 'show'],
        '~article/delete/(\d+)~'=>[src\Controllers\ArticleController::class, 'show'],

    ];