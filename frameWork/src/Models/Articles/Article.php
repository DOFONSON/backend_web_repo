<?php

namespace src\Models\Articles;

use src\Models\ActiveRecordEntity;
use src\Models\Users\User;

    class Article extends ActiveRecordEntity{
            protected $title;
            protected $text;
            protected $authorId;
            protected $createdAt;

        public function getAuthorId(): User
        {
            return User::getById($this->authorId);
        }
        public function getTitle()
        {
            return $this->title;
        }
        public function getText()
        {
            return $this->text;
        }
        public function getCreatedAt()
        {
            return $this->createdAt;
        }

        protected static function getTableName(){
            return 'articles';
        }
    }

    

