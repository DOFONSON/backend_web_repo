<?php
namespace src\Controllers;

use ReflectionObject;
use src\Models\Articles\Article;
use src\Views\View;

class ArticleController{
    public $view;
    public $db;
    public function __construct(){
        $this->view = new View(__DIR__.'/../../templates/');
    }

    public function index(){
        $articles = Article::findAll();
        $this->view->renderHtml('/articles/index',['articles'=>$articles]);
    }

    public function show(int $id){
        $article = Article::getById($id);
        $propertiesName = [];
        $reflector = new ReflectionObject($article);
        $properties = $reflector->getProperties();
        foreach($properties as $property){
            $propertiesName[] = $property->getName();
        }
        var_dump($propertiesName);
        if($article === []){
            $this->view->renderHtml('errors/error',[],404);
            return;
        }
        // var_dump($article);
        // $this->view->renderHtml('articles/show', ['article'=>$article]);
    }
}