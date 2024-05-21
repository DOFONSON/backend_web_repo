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
        if($article === []){
            $this->view->renderHtml('errors/error',[],404);
            return;
        }
        $this->view->renderHtml('articles/show', ['article'=>$article]);
    }

    public function create()
    {
        $this->view->renderHtml('articles/create');
    }
    public function store(){
        $article = new Article;
        $article->setTitle($_POST['title']);
        $article->setText($_POST['text']);
        $article->setAuthorId($_POST['authorId']);
        $article->save();
    }
}