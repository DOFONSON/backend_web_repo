<?php
namespace src\Controllers;
use src\Views\View;
use src\Services\Db;


class ArticleController{
    public $view;
    public $db;
    public function __construct(){
        $this->view = new View(__DIR__.'/../../templates/');
        $this->db = new Db;
    }
}