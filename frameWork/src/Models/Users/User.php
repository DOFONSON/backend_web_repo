<?php

namespace src\Models\Users; // Создаём новое пронстранство имён

use src\Models\ActiveRecordEntity; // Импортируем класс  ActiveRecordEntity

class User extends ActiveRecordEntity{ // Создаём класс пользователя, который наследуется от класса ActiveRecordEntity

    protected $nickname; // Перечисляем защищённые свойства
    protected $email;
    protected $isConfirmed;
    protected $role;
    protected $passwordHash;
    protected $authToken;
    protected $createdAt;

    public function getNickname(){ // Функции для получения данных у пользователя
        return $this->nickname;
    }
    public function getEmail(){
        return $this->email;
    }
    
    protected static function getTableName(){ // Защищённое свойство для получения имени таблицы для работы с бд
        return 'users';
    }
}