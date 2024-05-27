<?php

namespace src\Models\Articles; // СОздаём новое пронстранство имён 

use src\Models\ActiveRecordEntity;
use src\Models\Users\User;

    class Article extends ActiveRecordEntity{ // Создаём класс Article, который наследуется от другого класса ActiveRecordEntity
            protected $title; // Перечисляем защищённые свойства
            protected $text;
            protected $authorId;
            protected $createdAt;

        public function getAuthorId(): User // Публичный метод, который возвращает пользователя, найденного по id
        {
            return User::getById($this->authorId);
        }
        public function getTitle() // Возвращает название поста
        {
            return $this->title;
        }
        public function getText() // Возвращает текст поста
        {
            return $this->text;
        }
        public function getCreatedAt() // Возвращает дату создания поста
        {
            return $this->createdAt;
        }

        public function setTitle(string $title){
            $this->title = $title;
        }

        public function setText(string $text){
            $this->text = $text;
        }

        public function setAuthorId(int $authorId){
            $this->authorId = $authorId;
        }


        protected static function getTableName(){
            return 'articles';
        }

    }

    