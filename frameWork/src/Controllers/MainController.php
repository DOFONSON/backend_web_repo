<?php
namespace src\Controllers; // Создаём новое простраство имён
use src\Views\View; // Импортируем класс View

class MainController{ // Создаём класс MainController
    public $view; // Публичное поле view
    public function __construct(){  // Фнкция конструктор, которая в поле view записывает класс View
        $this->view = new View(__DIR__.'/../../templates/');
    }
    public function main(){ // Создаём функцию, которая формирует страницу главной части сайта, передавая в шаблон массив статей
        // var_dump($_SERVER);
        $articles = [
            ['title'=>'new article title','text'=>'new text'],
            ['title'=>'old article title','text'=>'old text']
        ];
        $this->view->renderHtml('main/main', ['articles'=>$articles]); 
    }

    public function sayHello(string $name){ // Создаём функцию, которая будет выводить страницу с приветствием 
        $this->view->renderHtml('main/hello', ['name'=>$name]);
    }

    public function sayBye(string $name){ // Создаём функцию, которая будет выводить страницу с прощанием 
        $this->view->renderHtml('main/bye', ['name'=>$name]);
    }
}