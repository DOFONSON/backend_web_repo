<?php

    class User{
        public function __construct(public $name){
        }
        public function getName()
        {
            return $this->name;
        }
    }

    class Article{
        public function __construct(
            public string $title,
            public string $text,
            public User $author
        ){}

        public function getAuthor(): User
        {
            return $this->author;
        }

    }

    class Admin extends User{

    }
    $admin = new Admin('oleg');
    $user = new User('ivan');
    $article = new Article('title', 'text', $admin);
    var_dump($article);

    // echo $article->getAuthor()->getName();