<?php

    class Post{
        protected $title;
        protected $text;
        public function __construct(string $title,string $text){
            $this->title = $title;
            $this->text = $text;
        }

        public function setTitle(string $title){
            $this->title = $title;
        }
        public function getTitle(){
            return $this->title;
        }
        public function setText(string $text){
            $this->title = $text;
        }
        public function getText(){
            return $this->text;
        }
    }

    class Lesson extends Post{
        public $homeWork;
        public function __construct(string $title,string $text, string $homeWork){
            parent::__construct($title, $text);
            $this->homeWork = $homeWork;
        }
        public function newText(string $text){
            $this->text = $text;
        }

    }

    $post = new Post('new post', 'new text');
    $lesson = new Lesson('new lesson', 'new text', 'HW');
    echo $lesson->getTitle();
    // var_dump($post);
    echo '<br>';
    // var_dump($lesson);