<?php
namespace src\Controllers; // Объявляем пространство имён 

use ReflectionObject; // Импортируем нужные классы
use src\Models\Articles\Article;
use src\Views\View;

class ArticleController{
    public $view;
    public $db;
    public function __construct(){ // Создаём конструктор для отрисовки страницы
        $this->view = new View(__DIR__.'/../../templates/');
    }

    public function index(){ // Метод, который выводит список всех статей на сайте
        $articles = Article::findAll(); // 
        $this->view->renderHtml('/articles/index',['articles'=>$articles]);
    }

    public function show(int $id){
        $article = Article::getById($id); // Берём из бд таблицу
        if($article === []){ // Если таблица пуста, но выводим экран с ошибкой 404, иначе выводим статью
            $this->view->renderHtml('errors/error',[],404);
            return;
        }
        $this->view->renderHtml('articles/show', ['article'=>$article]);
    }

    public function create() // Метод для перехода на страницу создания статьи
    {
        $this->view->renderHtml('articles/create');
    }
    public function store(){ // Метод создает новую статью на основе данных, переданных в форме, и сохраняет ее в базе данных
        $article = new Article;
        $article->setTitle($_POST['title']);
        $article->setText($_POST['text']);
        $article->setAuthorId($_POST['authorId']);
        $article->save();
        header('Location:student-231/Project/www/articles'); // Перенаправляет пользователя на страницу списка статей
    }
    public function edit(int $id){ // Редактируем нужную нам статью, отображая экран редактирования
        $article = Article::getById($id);
        $this->view->renderHtml('articles/edit',['article'=>$article]);
    }
    public function update(int $id){ // Метод, который обновляет статью
        $article = Article::getById($id);
        $article->setTitle($_POST['title']);
        $article->setText($_POST['text']);
        $article->setAuthorId($_POST['authorId']);
        $article->save();
        header('Location:student-231/Project/www/article/'.$article->getId()); // Отправляем http заголовок
    }
    public function delete(int $id){ // Удаляем статью, находя её id
        $article = Article::getById($id);
        $article->delete();
        // header('Location:student-231/Project/www/articles');
    }
}